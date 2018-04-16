<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Repositories\QuestionRepository;

class QuestionFollowController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->question = $question;
        $this->middleware('auth');
    }

    public function follow($question)
    {
        Auth::user()->followThis($question);
        return back();
    }

    public function follower(Request $request)
    {
        if (user('api')->followed($request->get('question'))) {
            return Response()->json(['followed' => true]);
        }
        return Response()->json(['followed' => false]);
    }

    public function followThisQuestion(Request $request)
    {
        $question = $this->question->byId($request->get('question'));
        $followed = user('api')->followThis($question->id);
        if (count($followed['detached']) > 0) {
            $question->decrement('followers_count');
            return Response()->json(['followed' => false]);
        }
        $question->increment('followers_count');
        return Response()->json(['followed' => true]);
    }
}
