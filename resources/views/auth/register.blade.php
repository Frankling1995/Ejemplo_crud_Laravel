<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div class="form_bg">
    <div class="container">
        <div class="row">
            <div class="offset-md-4 col-md-4 ofset-sm-3 col-sm-6">
                <form method="POST" action="{{ route('register') }}" class="form_horizontal">
                    <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                        <h3 class="titulo-login">Registro</h3>
                    @csrf

                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre de usuario">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                    </div>

                    <div class="form-group ">
                        
                            <button type="submit" class="btn ">
                                {{ __('Register') }}
                            </button>
                        
                    </div>
                    <ul class="form-opcion">
                        <li><a href="{{ route('login') }}"><i class="fa fa-arrow-left"></i>Login </a></li> 
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

