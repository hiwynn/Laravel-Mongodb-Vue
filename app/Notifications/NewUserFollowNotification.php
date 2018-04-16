<?php

namespace App\Notifications;

use App\Channels\SendcloudChannel;
use Auth;
use Illuminate\Bus\Queueable;
use App\Mailer\UserMailer;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Mail;

class NewUserFollowNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', SendcloudChannel::class];
    }

    public function toSendcloud($notifiable)
    {
        $data = [
            'url' => 'http://laravel.local',
            'name' => Auth::guard('api')->user()->name
        ];
        $template = new SendCloudTemplate('zhihu_app_new_user_follow', $data);

        Mail::raw($template, function ($message) use ($notifiable) {
            $message->from('wangyanan1220@foxmail.com', 'Wynn');
            $message->to($notifiable->email);
        });
    }

    public function toDatabase($notifiable)
    {
        return [
            'name' => Auth::guard('api')->user()->name,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
