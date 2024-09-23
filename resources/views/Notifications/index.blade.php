@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container m-3">
        <h2>Notifications</h2>
        <form method="post" action="notifications/read">
            @csrf
            <button class="btn btn-dark">Mark All As Read</button>
        </form>
        <div class="row">
            <ul class="list-style-none">
                @if(count($unreadNotifications) > 0)
                    <h6 class="mt-4">New Notifications</h6>

                @endif
                @foreach ($unreadNotifications as $notification)
                    @if($notification['data']['type'] == 'private')
                        <li>Message From Admin: {{$notification['data']['message']}}</li>
                    @endif
                    @if($notification['data']['type'] == 'public')
                            <li>New Answer On: <a href="/tickets/{{$notification['data']['message']}}">Ticket</a></li>
                    @endif
                @endforeach

                @if(count($readNotifications) > 0)
                    <h6 class="mt-5">Old Notifications</h6>
                @endif
                @foreach ($readNotifications as $notification)
                    @if($notification['data']['type'] == 'private')
                        <li>Message From Admin: {{$notification['data']['message']}}</li>
                    @endif
                    @if($notification['data']['type'] == 'public')
                        <li>New Answer On: <a href="/tickets/{{$notification['data']['message']}}">Ticket</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection
