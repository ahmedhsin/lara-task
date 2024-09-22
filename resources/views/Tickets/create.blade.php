@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/tickets" class="m-3 col-12 col-md-6 my-5 shadow p-3 rounded-1 text-dark mx-auto d-flex flex-column">
                @csrf
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label" >Title</label>
                    <div class="col-sm-10 ">
                        <input type="text" value="{{old('title')}}" name="title" class="form-control" id="title" required>
                    </div>
                    @error('title')
                    <p class="fs-6 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class=" col-sm-10">
                        <select class="form-select" name="type" value="{{old('info')}}" id="type">
                            <option value="request" selected>Request</option>
                            <option value="problem">Problem</option>
                        </select>
                    </div>
                    @error('type')
                    <p class="fs-6 text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="info" class="col-sm-2 col-form-label">Info</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" {{old('info')}} name="info" id="info" required>{{old('info')}}</textarea>
                    </div>
                    @error('info')
                    <p class="fs-6 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Submit Ticket</button>
            </form>
        </div>
    </div>
@endsection
