@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-form">
    <br>
    <a class="btn btn-outline-light" href="{{ url('/login') }}"
       style="border-radius: 20px; vertical-align: baseline; float: right; margin-right: 50px;">Войти</a>
    <div class="home">
        <div class="item">
            <div class="content">
                <form method="POST" action="{{ route('register') }}" class="form-horizontal">
                    @csrf
                    <div class="logo">
                        <h1>Регистрация</h1>
                    </div>
                    <div class="input-group lg">
                        <input id="name" type="text"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="name" placeholder="Имя" aria-label="name"
                               aria-describedby="basic-addon1" value="{{ old('name') }}" required
                               autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group lg">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" placeholder="Email" aria-label="email"
                               aria-describedby="basic-addon1" value="{{ old('email') }}" required
                               autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group lg">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="Пароль" aria-label="Password"
                               aria-describedby="basic-addon1" name="password" required>
                    </div>
                    <div class="input-group lg">
                        <input id="password-confirm" type="password" class="form-control"
                               placeholder="Подтвердите Пароль" name="password_confirmation" required>
                    </div>
                    <div class="input-group mb-2 lg mx-auto">
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
                        <button type="submit" class="btn btn-outline-success btn-block btn-padding">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
