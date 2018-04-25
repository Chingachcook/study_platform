@extends('layouts.app_login')

@section('content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="login-form">
    <div class="home">
        <div class="item">
            <div class="content">
                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                    @csrf
                    <div class="logo">
                        <h1>U</h1>
                    </div>
                    <div class="input-group lg">
                        <div class="input-group-prepend">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                        </div>
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" placeholder="Логин" aria-label="email"
                               aria-describedby="basic-addon1" value="{{ old('email') }}" required
                               autofocus>
                    </div>
                    <div class="input-group lg">
                        <div class="input-group-prepend">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                        </div>
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="Пароль" aria-label="Password"
                               aria-describedby="basic-addon1" name="password" required>

                    </div>
                    <div class="input-group mb-2 lg">
                        @if ($errors->has('email'))
                            <?php $style="display: inline-block;"?>
                            <span class="invalid-feedback" style="<?php echo $style?>">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" style="<?php echo $style?>">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-block btn-padding">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
