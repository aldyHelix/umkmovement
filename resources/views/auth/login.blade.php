@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <b>UMKM</b>ovement</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silahkan Login Terlebih dahulu . . .</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group has-feedback">
                <input id="login" name="login" type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email or Username" value="{{ old('username') ?: old('email') }}" required autofocus>
                
                @if ($errors->has('username') || $errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                </span>
                @endif
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder=" Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Ingatkan Saya') }}
                    </label>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Login') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>

@endsection