<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/topics', function (Request $request) {
    $topics = \App\Topic::select(['id', 'name'])
        ->where('name', 'like', '%' . $request->query('q') . '%')
        ->get();
    return $topics;
});

Route::middleware('api')->post('/question/follower', function (Request $request) {
    $user = Auth::guard('api')->user();
    if ($user->followed($request->get('question'))) {
        return Response()->json(['followed' => true]);
    }
    return Response()->json(['followed' => false]);
});

Route::middleware('api')->post('/question/follow', function (Request $request) {
    $user = Auth::guard('api')->user();
    $question = \App\Question::find($request->get('question'));
    $followed = $user->followThis($question->id);
    if (count($followed['detached']) > 0) {
        $question->decrement('followers_count');
        return Response()->json(['followed' => false]);
    }
    $question->increment('followers_count');
    return Response()->json(['followed' => true]);
});

Route::middleware('auth:api')->get('/user/followers/{id}', 'FollowersController@index');
Route::middleware('auth:api')->post('/user/follow', 'FollowersController@follow');