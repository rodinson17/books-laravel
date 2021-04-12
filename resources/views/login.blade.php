@extends('layouts.app')

@section('content')
<div class="content-body">
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Login v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="javascript:void(0);" class="brand-logo">
                        <img width="300" height="123" src="/image/creategica-logo.png" alt="">
                    </a>

                    <div class="text-center mb-4">
                        <h4 class="card-title mb-1">Bienvenido a Books</h4>
                        <p class="card-text mb-2">Inicie sesión en su cuenta y comience la transmisión</p>
                    </div>

                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="login-email" class="form-label">Correo electrónico</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}"
                                placeholder="books@ejemplo.com" aria-describedby="email" tabindex="1"
                                autofocus required/>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">Contraseña</label>
                                {{-- <a href="page-auth-forgot-password-v1.html">
                                    <small>¿Has olvidado tu contraseña?</small>
                                </a> --}}
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="login-password" name="password" tabindex="2"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" required/>

                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                <label class="custom-control-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary btn-block my-4" tabindex="4">Iniciar sesión</button>
                    </form>

                    {{-- <p class="text-center mt-2">
                        <span>¿Nuevo en nuestra plataforma?</span>
                        <a href="page-auth-register-v1.html">
                            <span>Crea una cuenta</span>
                        </a>
                    </p> --}}
                </div>
            </div>
            <!-- /Login v1 -->
        </div>
    </div>

</div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="/app-assets/css/page-auth.css">
@endpush

@push('scripts')
    <script src="/app-assets/js/page-auth-login.js"></script>
@endpush
