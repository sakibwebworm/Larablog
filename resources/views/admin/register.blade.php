
@extends('admin.partials.admin-header')
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{{ route('register') }}" >
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class=" control-label">Name</label>

                    <div class="">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class=" control-label">E-Mail Address</label>

                    <div class="">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('picture') ? ' has-error' : '' }}">
                    <label for="picture">Picture</label>
                    <input type="file" class="form-control" id="picture" name="picture" placeholder="picture" >
                </div>
                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    <label for="about">About</label>
                    <textarea name="about" id="about" name="about" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label">Password</label>

                    <div class="">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class=" control-label">Confirm Password</label>

                    <div class="">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="btn btn-link" href="{{ route('login') }}">
                    Log in
                </a>
            </div>
        </div>
    </div>
</div>


@extends('admin.partials.admin-footer')