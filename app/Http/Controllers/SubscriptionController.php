<?php

namespace App\Http\Controllers;

use App\Http\Middleware\isEmployer;
use App\Http\Middleware\notAllowPayment;
use App\Mail\PurchaseMail;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SubscriptionController extends Controller
{
    const MONTHLY_AMOUNT = 100000;
    const YEARLY_AMOUNT = 799000;
    const CURRENCY = 'VND';

    public function __construct()
    {
        $this->middleware(['auth', isEmployer::class, notAllowPayment::class]);
    }

    public function subscribe()
    {
        return view('subscription.index');
    }

    public function pay(Request $request)
    {

        $plans = [
            'monthly' => [
                'name' => 'monthly',
                'description' => 'Gói Tháng',
                'amount' => self::MONTHLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'Gói Năm',
                'amount' => self::YEARLY_AMOUNT,
                'currency' => self::CURRENCY,
                'quantity' => 1,
            ],
        ];


            $selectPlan = null;
            if ($request->is('pay/monthly')) {
                $selectPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            } elseif ($request->is('pay/yearly')) {
                $selectPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }
//            payment success info
            if ($selectPlan) {
                $successURl = URL::signedRoute('payment.success', [
                    'plan' => $selectPlan['name'],
                    'billing_ends' => $billingEnds
                ]);

                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = $successURl;
                $vnp_TmnCode = "83JJLY7F";//Mã website tại VNPAY
                $vnp_HashSecret = "TATHZJFSCIQFUUTZCGNSBWPEBMIZLWRO"; //Chuỗi bí mật

                $vnp_TxnRef = rand(1, 10000); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = $selectPlan['description'];
                $vnp_OrderType = "250006";
                $vnp_Amount = $selectPlan['amount'] * 100;
                $vnp_Locale = "vn";
                $vnp_BankCode = "NCB";
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,

                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }

            }

    }


    public function paymentSuccess(Request $request)
    {
//        update db
        $plan = $request->plan;
        $billingEnds = $request->billing_ends;
        User::where('id', auth()->user()->id)->update([
            'plan' => $plan,
            'billing_ends' => $billingEnds,
            'status' => 'paid',
            'user_trial' => null
        ]);

        try {
            Mail::to(auth()->user())->queue(new PurchaseMail($plan,$billingEnds));

        }catch (\Exception $e) {
            return response()->json($e);
        }


        return redirect()->route('dashboard')->with('success','Thanh toán thành công tài khoản của bạn đã được nâng cấp');
    }
}
