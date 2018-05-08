<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class SearchController extends Controller
{
    public function search()
    {
        $keyword = request('keyword');
        $results = Question::search($keyword)->get();
        return view('search.index', compact('results'));
    }
}
