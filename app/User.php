<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;;
use Naux\Mail\SendCloudTemplate;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $data = [
            'url' => url('password/reset', $token)
        ];
        $template = new SendCloudTemplate('zhihu_app_reset_password', $data);

        Mail::raw($template, function ($message) {
            $message->from('wangyanan1220@foxmail.com', 'Wynn');
            $message->to($this->email);
        });
    }
}
