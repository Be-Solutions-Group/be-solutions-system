<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{assetPath('dashboard/css/login/ionicons.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/css/login/index.css')}}">
    <title>Login</title>
</head>

<body>
<div class="login-wrapper">
    <div class="logo-div">
        <img src="{{assetPath('dashboard/img/logo.png')}}" alt="logo">
    </div>
    <form action="{{ route('login') }}" class="login-form" method="post">
        @csrf
        <div class="form-div">
            <input type="text" name="email" placeholder="Username" class="{{ $errors->has('email') ? ' is-invalid' : '' }}">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-div">
            <input type="password" name="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>
        <button type="submit">
            <i class="fa fa-sign-in"></i>
            <span>
          Login
        </span>
        </button>
    </form>
</div>
</body>

</html>
