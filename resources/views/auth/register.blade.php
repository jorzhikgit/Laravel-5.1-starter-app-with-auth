<!-- resources/views/auth/register.blade.php -->
@extends('layouts.master')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Register</div>
    <div class="panel-body">
        <div class="form-group">
            <a class="btn btn-block btn-social btn-facebook" href="{{ url('/login/facebook') }}">
                <span class="fa fa-facebook"></span>
                Register with Facebook
            </a>
            </div>
        <form id="register" method="POST" action="{{ url('/auth/register') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="firstname"> Firstname</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="{{ old('lastname') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="form-group">
                <label for="phone"> Phone</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="address"> Address</label>
                <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
            </div>
            <div class="form-group">
                <label for="address2"> Address2</label>
                <input class="form-control" type="text" name="address2" id="address2" value="{{ old('address2') }}">
            </div>
            <div class="form-group">
                <label for="city"> City</label>
                <input class="form-control" type="text" name="city" id="city" value="{{ old('city') }}">
            </div>
            <div class="form-group">
                <label for="province"> Province/State</label>
                <input class="form-control" type="text" name="province" id="province" value="{{ old('province') }}">
            </div>
            <div class="form-group">
                <label for="zip"> Zip</label>
                <input class="form-control" type="text" name="zip" id="zip" value="{{ old('zip') }}">
            </div>
            <div class="form-group">
                <label for="country"> Country</label>
                <input class="form-control" type="country" name="country" id="country" value="{{ old('country') }}">
            </div>
            <div class="form-group">
                <label for="company"> Company</label>
                <input class="form-control" type="text" name="company" id="company" value="{{ old('company') }}">
            </div>   
            <input class="form-control" type="hidden" name="picture" id="picture" value="avatar.jpg">
            <input class="form-control" type="hidden" name="provider_id" id="provider_id" value="app_user">
            <input class="form-control" type="hidden" name="provider" id="provider" value="app">
            <div>
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
        @endsection
    </div>
</div>
</div>
