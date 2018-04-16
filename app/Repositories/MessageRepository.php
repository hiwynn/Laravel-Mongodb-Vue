<?php
/**
 * Created by PhpStorm.
 * User: WangYN
 * Date: 2018/4/12
 * Time: 17:54
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

}