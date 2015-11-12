<!-- resources/views/auth/login.blade.php -->
@extends('layouts.master')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <div class="panel-body">

        <form method="POST" action="{{ url('/auth/login')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" id="password">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Login</button>
                <a class="btn btn-primary" href="{{ url('/password/email') }}">Forgot Password</a>
            </div>
            <div class="form-group">
                <a class="btn btn-block btn-social btn-facebook" href="{{ url('/login/facebook') }}">
                    <span class="fa fa-facebook"></span>
                    Sign in with Facebook
                </a>
            </div>

        </form>
        @endsection
    </div>
</div>
</div>