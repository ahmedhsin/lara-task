@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container m-2">
        <h2>User</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">phone</th>
                <th scope="col">role</th>
                <th scope="col">Created Date</th>
                <th scope="col">controller</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['phone']}}</td>
                    <td>{{$user['role']}}</td>
                    <td>{{$user['created_at']}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
