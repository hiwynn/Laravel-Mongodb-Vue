@extends('layouts.app')

@section('content')
    <div class="container question-list-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($results as $result)
                    <div class="card">
                        <div class="media">
                            <div class="media-left">
                                <a href="">
                                    <img width="30" src="{{ $result->user->avatar }}"
                                         alt="{{ $result->user->name }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5>{{ $result->user->name }}</h5>
                            </div>
                        </div>
                        <div class="main-area">
                            <h4 class="media-heading">
                                <a href="/questions/{{$result->id}}">{{ $result->title }}</a>
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