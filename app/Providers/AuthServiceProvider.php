<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

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
                ->greeting(__('auth.send_email.title'))
                ->subject(__('auth.send_email.subject'))
                ->line(__('auth.send_email.first_line', ['name' => Auth::user()->name, 'app' => env('APP_NAME')]))
                ->action(__('auth.send_email.action'), $url)
                ->line(__('auth.send_email.description'));
        });
    }
}
