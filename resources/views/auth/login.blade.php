@extends('layouts.applogin')

@section('title','Login')

@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-danger border-warning mb-3">
        <div class="card-header text-center text-light border-success bg-dark">
            <!-- Aquí agregamos la imagen -->
            <img src="{{ asset('/img/logo.jpg') }}" alt="Imagen de inicio de sesión" class="img-fluid mx-auto d-block rounded" style="max-width: 200px;">
            <h1>Repuestos <span>Solo Cauchos</span></h1>
        </div>
        <div class="card-body bg-warning">
            <p class="login-box-msg text-bold text-dark">Iniciar sesión</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border border-warning" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append border border-warning">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-warning" name="password" required autocomplete="current-password">
                    <div class="input-group-append border border-warning">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-warning border-warning btn-block">Ingresar</button>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-12">
                        <p class="mb-1">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection
