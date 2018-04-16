<?php
/**
 * Created by PhpStorm.
 * User: WangYN
 * Date: 2018/4/16
 * Time: 17:33
 */

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }

    public function byId($id)
    {
        return Comment::find($id);
    }
}