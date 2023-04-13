@extends('vistabootstrap')

@section('contenido')
    <div class="container">
        <h1 class="text-center mb-5 mt-5">Sistema de Control de Nomina</h1>
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h3 id="accion_titulo_alta" class="text-center mb-5">Sign In</h3>
                    <form action="{{route('login_access')}}" method="POST">
                        @csrf
                        

                        <div class="mb-3">
                            <label for="floatingInput">Correo</label>
                            <input type="email" class="form-control"  placeholder="name@example.com" name="email" value="{{old('email')}}" id="email" aria-describedby="emailHelp">
                            @if ($errors->first('email'))
                                <p class="text-danger">{{$errors->first('email')}}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="floatingPassword">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Password"  name="pass" value="{{old('pass')}}" id="password">
                            @if ($errors->first('pass'))
                                <p class="text-danger">{{$errors->first('pass')}}</p>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
                        </div>
                    </form>
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
@stop