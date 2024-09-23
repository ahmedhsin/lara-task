@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row">
            <form method="post" action="/notifications" class="m-3 col-12 col-md-6 my-5 shadow p-3 rounded-1 text-dark mx-auto d-flex flex-column">
                @csrf
                <input hidden name="user_id" value="{{app('request')->input('id')}}">
                <div class="row mb-3">
                    <label for="message" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" {{old('message')}} name="message" id="message" required>{{old('message')}}</textarea>
                    </div>
                    @error('message')
                    <p class="fs-6 text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-dark">Send Message</button>
            </form>
        </div>
    </div>
@endsection
