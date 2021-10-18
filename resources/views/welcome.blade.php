@extends('layouts.app')

@section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                      <div class="col-md-5">
                        <img src="{{ asset('storage/images/login.jpg') }}" alt="login" class="login-card-img">
                      </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('storage/images/logo.svg') }}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Inicia sesión desde tu cuenta para disfrutar de nuestras peliculas</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" >{{ __('Correo Electronico') }}</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="usuario@servicio.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" >{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="***********" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-block login-btn mb-4">    {{ __('Login') }}    </button>
                            </form>
                            <a href="{{ route('password.request') }}" class="forgot-password-link">Olvidaste tu contraseña?</a>
                            @if (Route::has('register'))
                                <p class="login-card-footer-text">No tienes una cuenta? <a href="{{ route('register') }}" class="text-reset">Registrate acá</a></p>
                            @endif
                            <nav class="login-card-footer-nav">
                              <a href="#!">Terms of use.</a>
                              <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
                  
        </div>
    </main>
    
@endsection
