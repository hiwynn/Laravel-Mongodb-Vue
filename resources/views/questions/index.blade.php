@extends('layouts.app')

@section('content')
    <div class="container question-list-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($questions as $question)
                    <div class="card">
                        <div class="media">
                            <div class="media-left">
                                <a href="">
                                    <img width="30" src="{{ $question->user->avatar }}"
                                         alt="{{ $question->user->name }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5>{{ $question->user->name }}</h5>
                            </div>
                        </div>
                        <div class="main-area">
                            <h4 class="media-heading">
                                <a href="/questions/{{$question->id}}">{{ $question->title }}</a>
                            </h4>
                            <recommend-answer question="{{$question->id}}"></recommend-answer>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<style>
    .card-body img {
        width: 100%;
    }
</style>
