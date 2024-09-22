@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container m-3">
        <h2>Tickets</h2>
        <div class="row">
                <div class="col-8 shadow-sm  my-2">
                    <h3>Title: {{$ticket['title']}}</h3>
                    <p>Author: {{Auth::user()->name}}</p>
                    <p>Mobile: {{Auth::user()->phone}}</p>

                    <p>Type: {{$ticket['type']}}</p>
                    <p style="word-wrap: break-word;overflow-wrap: break-word;">
                    Information: {{$ticket['info']}}</p>
                </div>
        </div>
        <h2>Answers</h2>
        <div class="row">
            @foreach($ticket['comments'] as $comment)
                <div class="col-8 shadow-sm border-1 my-2 p-2 rounded-2 text-white bg-secondary">
                    <p>Author: {{$comment['user']['name']}}</p>
                    <p>Role: {{$comment['user']['role']}}</p>
                    <p style="word-wrap: break-word;overflow-wrap: break-word;">
                        {{$comment['content']}}
                    </p>
                </div>
            @endforeach
        </div>

        <div class="row">
            <form method="post" action="/comments" class="col-12 col-md-6 shadow p-3 rounded-1 text-dark d-flex flex-column">
                @csrf
                <input type="hidden" name="ticket_id" value="{{$ticket['id']}}">
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="content" id="content" required>{{old('content')}}</textarea>
                    </div>
                    @error('content')
                    <p class="fs-6 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Answer</button>
            </form>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
    </div>
@endsection
