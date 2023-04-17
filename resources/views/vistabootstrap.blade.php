<?php 
    $sessionUsuario     = session('sesionUsuario');
    $sessionTipoUsuario = session('sessionTipoUsuario');
    $sessionIdUsuario   = session('sessionIdUsuario');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('public/CSS/estilo.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Sistema de Control de Nomina</title>
</head>
<body>
    @if ($sessionUsuario <> "")
        <x-navbar></x-navbar>
        <div id="title" class="mt-5">
            <h1>Sistema de Control de Nomina</h1>
        </div>
    @endif
    
    <div>
        @yield('contenido')
    </div>

    @if (session('successLogin'))
        <div class="container">
            <div class="alert alert-success">
                Bienvenido <?= $sessionUsuario ?>
            </div>
        </div>
    @endif
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{asset('resources/js/funciones.js')}}"></script>
    <script src="{{asset('resources/js/general.js')}}"></script>
</body>
</html>