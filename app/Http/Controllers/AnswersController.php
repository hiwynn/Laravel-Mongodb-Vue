<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use App\Http\Requests\StoreAnswerRequest;
use App\Answer;
use Auth;

class AnswersController extends Controller
{
    protected $answer;

    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function store(StoreAnswerRequest $request, $question)
    {
        $answer = $this->answer->create([
            'question_id' => $question,
            'user_id' => Auth::id(),
            'body' => $request->get('body')
        ]);
        $answer->question()->increment('answers_count');

        return back();
    }

    public function recommend($question)
    {
        return Answer::where('question_id', $question)->latest()->first();
    }
}
