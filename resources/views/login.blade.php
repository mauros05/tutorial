@extends('vistabootstrap')

@section('contenido')
    <div class="container mb-5">
        <h1 class="text-center mb-5 mt-5">Sistema de Control de Nomina</h1>
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div id="div-message">
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                </div>
                <div class="card border-0 shadow rounded-3 my-5 mt-4">
                    <div class="card-body p-4 p-sm-5">
                        <h3 id="accion_titulo_alta" class="text-center mb-5">Sign In</h3>
                        <form action="" method="POST" id="login-form">
                            @csrf
                            <div class="mb-3">
                                <label for="floatingInput">Correo</label>
                                <input type="email" class="form-control"  placeholder="name@example.com" name="email" value="{{old('email')}}" id="email" aria-describedby="emailHelp">
                                <p class="text-danger" id="correo-error" hidden></p>
                            </div>

                            <div class="mb-3">
                                <label for="floatingPassword">Contraseña</label>
                                <input type="password" class="form-control" placeholder="Password"  name="pass" value="{{old('pass')}}" id="password">
                                <p class="text-danger" id="password-error" hidden></p>
                            </div>
                        </form>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" id="btn-signIn">Sign in</button>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <style>
        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }
    </style>

    <script src="{{ asset('resources/js/login.js') }}"></script>
@stop