<?php
/**
 * Created by PhpStorm.
 * User: WangYN
 * Date: 2018/4/16
 * Time: 18:00
 */

namespace App\Repositories;

use Request;
use App\Topic;

class TopicRepository
{
    public function getTopicsForTagging(Request $request)
    {
        return Topic::select(['id', 'name'])
            ->where('name', 'like', '%' . $request->query('q') . '%')
            ->get();
    }
}