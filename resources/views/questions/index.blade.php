@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($questions as $question)
                    <div class="card" style="padding: 15px; margin-bottom: 10px">
                        <div class="media">
                            <div class="media-left" style="margin-right: 12px">
                                <a href="">
                                    <img width="30" src="{{ $question->user->avatar }}"
                                         alt="{{ $question->user->name }}">
                                </a>
                            </div>
                            <div class="media-body" style="margin-top: 3px">
                                <h5 style="margin-bottom: 0">{{ $question->user->name }}</h5>
                            </div>
                        </div>
                        <div>
                            <h4 class="media-heading" style="margin: 8px 0;">
                                <a href="/questions/{{$question->id}}">{{ $question->title }}</a>
                            </h4>
                            <div class="recommend-answer">
                                <span></span>
                                <button type="button"></button>
                            </div>
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
