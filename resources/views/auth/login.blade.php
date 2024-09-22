@extends('layout')
@section('title','Login')
@section('content')
    <div class="contact_us">
        <div class="container">
            <form method="post" action={{route('login.store')}}>
                @csrf
                @if(session('message'))
                    <p class="alert alert-success mt-2">{{session('message')}}</p>
                @endif
                <div class="mb-3">
                    <label>Phone</label>
                    <input class="form-control" name="phone" value="{{old('phone')}}" >
                    @error('phone')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="{{old('password')}}" >
                    @error('password')
                    <p class="alert alert-danger mt-2">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" class="btn btn-success" value="Login">
            </form>
        </div>
    </div>
@endsection
