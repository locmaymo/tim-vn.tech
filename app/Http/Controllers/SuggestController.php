<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuggestController extends Controller
{
    public function suggest(Request $request)
    {
//        sử dụng openai để đưa ra đề xuất viết nội dung cv cho người dùng với các trường người dùng nhập vào   sử dụng openai api để tạo một form điền vào và gợi ý cho ứng viên một mẫu cv với các trường nhập vào gồm



//       nếu người dùng nhập vào intput name="cv" thì sẽ đưa ra đề xuất viết cv
         if ($request->has('cv')){
             $content = $request->cv;
             $search = "(Viết Bằng Tiếng Việt )
       Viết CV dài tầm 1 trang cho lập trình viên nội dung bám theo format sau:

        Thông tin cá nhân
Đây là phần cơ bản nhất cần có trong bản CV lập trình viên. Bạn cần đảm bảo đầy đủ và sắp xếp các thông tin hợp lý như sau:
•	Họ và tên: Điền thông tin đầy đủ, có thể đính kèm tên nước ngoài nếu bạn đang ứng tuyển tại doanh nghiệp nước ngoài,
•	Vị trí ứng tuyển: Lập trình viên  Java, lập trình viên Backend,...
•	Ngày, tháng, năm sinh
•	Số điện thoại, email liên hệ: Phần thông tin này cần viết chính xác để nhà tuyển dụng có thể liên lạc với bạn.
•	Phần giới thiệu bản thân: Bạn có thể bổ sung thêm đoạn tóm tắt bản thân bằng 2-3 câu ngắn gọn đặt bên dưới hoặc cạnh ảnh đại diện. Đy là phần khá quan trọng tạo dấu ấn cho các nhà tuyển dụng.
Kỹ năng
Thông qua phần thông tin này nhà tuyển dụng có thể thấy được năng lực, khả năng xử lý công việc của ứng viên. Trong phần này bạn nên trình bày những kỹ năng liên quan. Ở phần này, bạn nên đưa ra được cho nhà tuyển dụng thấy các kỹ năng quan trọng như: Ngôn ngữ HTML, CSS3, Javascript, MVC,... Đây sẽ là điểm sáng được các nhà tuyển dụng đánh giá cao và chú ý đến bản cv của bạn hơn.
Chứng chỉ
Những văn bằng, giấy chứng nhận được đưa ra chứng minh những kỹ năng, mức độ am hiểu của ứng viên là dựa trên đánh giá khách quan và đã được kiểm chứng. Để trở thành lập trình viên chuyên nghiệp bạn cần có một số chứng chỉ được cung cấp bởi các trung tâm uy tín có các chương trình đánh giá năng lực thực sự. Với những chứng chỉ này việc thuyết phục các nhà tuyển dụng sẽ phần nào dễ dàng hơn. Lập trình viên chuyên nghiệp sẽ cần đến các chứng chỉ nghiệp vụ như:
•	Chứng chỉ Project management professionals
•	Chứng chỉ google adword
•	Chứng chỉ ngoại ngữ,...
Bạn cũng có thể viết ra những lợi ích mà chứng chỉ mang lại. Những chứng chỉ này sẽ tạo lợi thế cạnh tranh cho bạn so với các ứng viên khác.
Trong phần này bạn cần tối ưu hóa thông tin về trình độ học vấn của mình trong 3 nội dung cơ bản đó là: Nơi đào tạo kèm thời gian theo học, chuyên ngành, xếp loại (khá, tốt, trung bình). Cũng như các phần khác, trình độ học vấn cũng được ghi một cách khoa học dễ nhìn  theo trình tự khoa học, chẳng hạn:
•	Trường đại học Giao thông vận tải (9/2015 -9/2020)
•	Chuyên ngành: Công nghệ thông tin
•	Xếp loại: Giỏi
Kinh nghiệm làm việc
Đây là phần mà bất cứ nhà tuyển dụng nào cũng mong chờ ở các ứng viên. Trong phần này các lập trình viên phải nêu được tổ chức mình từng làm việc, vị trí, các công việc cụ thể tại vị trí cũ và thời gian làm việc tại doanh nghiệp trước đó. Hãy sắp xếp kinh nghiệm, hoạt động trong doanh nghiệp ở vị trí lập trình viên trước đó theo thứ tự từ công việc gần nhất đến công việc xa nhất nhằm tăng sức thuyết phục với nhà tuyển dụng.
Ví dụ:
Công ty XYZ Tech Solutions
Developer Full-stack | Tháng 5/2022 - Hiện tại
Kinh nghiệm làm việc:
•	Phát triển và tối ưu hóa các tính năng chính của ứng dụng web bằng React và Node.js, giúp tăng 30% hiệu suất phản hồi của ứng dụng.
•	Triển khai tích hợp hệ thống thanh toán bằng Stripe, cải thiện đáng kể trải nghiệm mua hàng cho người dùng và giảm 20% lỗi thanh toán.
•	Điều chỉnh cơ sở dữ liệu MongoDB, giúp giảm thiểu 15% thời gian truy vấn dữ liệu và tối ưu hóa hiệu suất hệ thống.
•	Đóng góp vào quá trình Agile Scrum, giúp tăng năng suất và chất lượng phát triển trong dự án nhóm lên 25%.
Công ty ABC Software Solutions
Developer Front-end | Tháng 9/2020 - Tháng 4/2022
Kinh nghiệm làm việc:
•	Đảm nhiệm việc triển khai và phát triển các chức năng giao diện người dùng cho ứng dụng web bằng React, giúp cải thiện UX lên tới 40% theo đánh giá của khách hàng.
•	Đóng góp ý tưởng và tham gia phát triển giao diện dự án lớn, giúp ứng dụng đạt được giải thưởng Best UI/UX Design trong ngành.
•	Tối ưu hóa mã nguồn và cấu trúc CSS, giúp giảm thiểu thời gian tải trang lên 25% và cải thiện tỷ lệ thoát trang (bounce rate) 10%.
•	Xây dựng và duy trì thư viện UI tái sử dụng, giúp tiết kiệm thời gian phát triển và đảm bảo đồng nhất giao diện trên các trang của ứng dụng.
Người tham chiếu. Hãy viết như trên cho tôi với các thông tin như sau: (". $content . ") Viết dưới định dạng html: mục lớn thì thẻ h3 và bold, nội dung thì viết thẻ p, font chữ nunito màu #0C3149 để tôi nhúng đoạn này vào website của tôi.";


         }


       else
       {
           $content = $request->mail;
           $search = "(Viết Bằng Tiếng Việt ) Viết thư email ứng tuyển  có subject, chào hỏi, nội dung, lý do, lời cảm ơn, lời chào trân trọng và tên người gửi. để gửi nhà tuyển dụng  với nội dung với các thông tin tôi cung cấp sau đây: (". $content . ") Viết dưới định dạng html: mục lớn thì thẻ h3 và bold, nội dung thì viết thẻ p, có thẻ br để xuống dòng, font chữ nunito màu #0C3149 để tôi nhúng đoạn này vào website của tôi.";

       }



        $data = Http::withHeaders([
           'Content-Type' => 'application/json',
           'Authorization' => 'Bearer ' .env('OPENAI_API_KEY'),
       ])->post('https://api.openai.com/v1/chat/completions', [
             'model' => 'gpt-3.5-turbo-1106',
             'messages' =>[
                   [
                       "role" => "user",
                       "content" => $search
                   ]
             ],
             'temperature' => 0.9,

             'top_p' => 1,
             'frequency_penalty' => 0.0,
             'presence_penalty' => 0.6,
             'stop' => ["11."],
            ]);
         $result = json_decode($data->getBody());

        return view('ai', ['result' => $result]);
    }

    public function suggestMail(Request $request)
    {
//        sử dụng openai để đưa ra đề xuất viết nội dung cv cho người dùng với các trường người dùng nhập vào   sử dụng openai api để tạo một form điền vào và gợi ý cho ứng viên một mẫu cv với các trường nhập vào gồm
       $search = $request->get;
       $search = "(Viết Bằng Tiếng Việt )

Viết mail đúng chuẩn format email gửi nhà tuyển dụng với nội dung với các thông tin tôi cung cấp sau đây: (". $search . ") Viết dưới định dạng html: mục lớn thì thẻ h3 và bold, nội dung thì viết thẻ p, font chữ nunito màu #0C3149 để tôi nhúng đoạn này vào website của tôi.";


       $data = Http::withHeaders([
           'Content-Type' => 'application/json',
           'Authorization' => 'Bearer ' .env('OPENAI_API_KEY'),
       ])->post('https://api.openai.com/v1/chat/completions', [
           'model' => 'gpt-3.5-turbo-1106',
           'messages' =>[
               [
                   "role" => "user",
                   "content" => $search
               ]
           ],
           'temperature' => 0.9,

           'top_p' => 1,
           'frequency_penalty' => 0.0,
           'presence_penalty' => 0.6,
           'stop' => ["11."],
       ]);
         $result = json_decode($data->getBody());

        return view('ai', ['result' => $result]);
    }

    public function index()
    {
        return view('ai');
    }

}
