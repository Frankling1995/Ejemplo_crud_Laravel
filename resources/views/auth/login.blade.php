<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Inicio de sesion </title>
</head>
<body>
    <div class="form_bg">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4 ofset-sm-3 col-sm-6">
                    <form method="POST" action="{{ route('login') }}" class="form_horizontal">
                        @csrf
                        <div class="form_icon"><i class="fa fa-user-circle"></i></div>
                        <h3 class="titulo-login">Inicio de session</h3>
                        <div class="form-group ">
                            <span class="input-icon"><i class="fa fa-user"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo electronico">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                
                        <div class="form-group ">
                            <span class="input-icon2"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                
                        <div class="form-group ">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                        </div>
                        
                        <button type="submit" class="btn signin">
                            {{ __('Login') }}
                        </button>
                        <ul class="form-opcion">
                            <li><a href="{{ route('register') }}">Registrarse <i class="fa fa-arrow-right"></i></a></li> 
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>
