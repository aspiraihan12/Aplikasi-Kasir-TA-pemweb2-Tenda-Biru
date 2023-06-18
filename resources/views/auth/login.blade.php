@extends('layouts.auth')

@section('login')

<div class="center">
    <br>
    <h2 style="text-align: center;">Login Aplikasi kasir</h2>
    <br>
<div class="logo-container">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
    </div>

        <form action="{{ route('login') }}" method="post" class="form-login">
            @csrf
            <div class="txt_field">
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="help-block">{{ $message }}</span>
                @else
                <span class="help-block with-errors"></span>
                @enderror
            </div>
            </div>

            <div class="txt_field">
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="help-block">{{ $message }}</span>
                @else
                    <span class="help-block with-errors"></span>
                @enderror
            </div>
            </div>
            
                
                <input type="submit" value="Login">
                
                <!-- /.col -->
            <br><br><br>
        </form>
    </div>
    <!-- /.login-box-body -->


@endsection