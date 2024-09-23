@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container m-2">
        <h2>Users Dashboard</h2>
        <form>

        <div class="row row-gap-3 m-2">
               <div class="col-12 col-md-3">
                   <input type="text" class="form-control" name="name" placeholder="Search" />
               </div>
               <div class="col-12 col-md-6 d-flex align-items-center">
                   <p class="mx-1">From</p>
                   <input type="date" class="form-control" name="start_date" />
                   <p class="mx-1">To</p>
                   <input type="date" class="form-control" name="end_date" />
               </div>
               <div class="col-6 col-md-3">
                   <button class="btn btn-dark">Filter</button>
               </div>
        </div>
        </form>

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
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['phone']}}</td>
                    <td>{{$user['role']}}</td>
                    <td>{{$user['created_at']}}</td>
                    <td class="d-md-flex gap-2">
                        <a href="/notifications/create?id={{$user['id']}}" class="btn btn-outline-primary">Send Message</a >
                        <form method="post" class="m-0 p-0" action="/users/{{$user['id']}}" onsubmit="return confirm('are you sure you want to delete?');">
                            @csrf
                            <input  type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-outline-danger">Remove</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
