<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Useful meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">

    <title>Войти в приложение</title>
</head>
<body>
    <div class="login-form">
        <div class="home">
            <div class="item">
                <div class="content">
                    <form action="#" class="form-horizontal">
                        <div class="logo">
                            <h1>М</h1>
                        </div>
                        <div class="input-group mb-2 lg">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">
                                    <i class="fa fa-user-circle"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-2 lg">
                            <div class="input-group-prepend">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Пароль" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-block btn-padding">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="login-form">
        <div class="home">
            <div class="item">
                <div class="content">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                        @csrf
                        <div class="logo">
                            <h1>A</h1>
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
</body>
</html>