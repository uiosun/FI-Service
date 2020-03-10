<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::getFromJson('auth.Reset Password Notification'))

            ->line(Lang::getFromJson('我们收到了您试图重置密码的请求，所以给您发送了本邮件。(You are receiving this email because we received a password reset request for your account.)'))

            ->action(Lang::getFromJson('auth.Reset Password'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))

            ->line(Lang::getFromJson('密码重置链接将在 :count 分钟后失效。(This password reset link will expire in :count minutes.)', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))

            ->line(Lang::getFromJson('如果您不希望重置密码，请忽略本邮件。(If you did not request a password reset, no further action is required.)'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
