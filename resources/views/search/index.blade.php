@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($results as $result)
                    <div class="media" style="margin: 10px 0;">
                        <div class="media-left">
                            <a href="">
                                <img width="48" src="{{ $result->user->avatar }}" alt="{{ $result->user->name }}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="/questions/{{$result->id}}">{{ $result->title }}</a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection