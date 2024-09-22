@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/auth/login" class="m-3 col-12 col-md-6 my-5 shadow p-3 rounded-1 text-dark mx-auto d-flex flex-column">
                @csrf
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10 ">
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3">
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Sign in</button>
            </form>
        </div>
    </div>
@endsection
