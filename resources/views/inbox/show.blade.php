@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">对话列表</div>
                    <div class="card-body">
                        <form action="/inbox/{{$dialogId}}/store" method="post">
                            {{ csrf_field() }}
                            <div class="from-group">
                                <textarea name="body" class="form-control"></textarea>
                            </div>
                            <div class="from-group" style="padding-top: 20px">
                                <button class="btn btn-success" style="float: right">发送私信</button>
                            </div>
                        </form>
                        <div class="messages-list">
                            @foreach($messages as $message)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="">
                                            <img style="width: 60px;" src="{{ $message->fromUser->avatar }}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="">
                                                {{ $message->fromUser->name }}
                                            </a>
                                        </h4>
                                        <p>
                                            {{ $message->body }}
                                            <span style="float: right">
                                                {{ $message->created_at->format('y-m-d h:i:s') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
