<?php

namespace App\Providers;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Tim - Xác Minh Email')
                ->line('Vui lòng nhấp vào nút bên dưới để tiếp tục với tài khoản Tim của bạn.')
                ->action('Xác Minh Email', $url)
                ->line('Nếu bạn không tạo tài khoản, bạn có thể bỏ qua email này.');
        });
    }
}
