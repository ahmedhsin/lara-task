@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container m-3">
        <h2>Tickets</h2>
        <div class="row">
            @foreach($tickets as $ticket)
                <div class="col-8 shadow-sm my-2">
                    <h3>Title: {{$ticket['title']}}</h3>
                    <p>Type: {{$ticket['type']}}</p>
                    <a class="text-decoration-none" href="/tickets/{{$ticket['id']}}">More Info</a>
                    <p style="overflow: hidden">Information: {{$ticket['info']}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
