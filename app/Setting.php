<?php
/**
 * Created by PhpStorm.
 * User: WangYN
 * Date: 2018/4/27
 * Time: 18:03
 */

namespace App;


class Setting
{
    protected $allowed = ['city', 'bio'];
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function merge(array $attribute)
    {
        $settings = array_merge($this->user->settings, array_only($attribute, $this->allowed));
        return $this->user->update(['settings' => $settings]);
    }
}