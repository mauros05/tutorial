@extends('vistabootstrap')

@section('contenido')
    <div class="container">
        <h2>Proceso: {{$proceso}}</h2>
        @if ($error == 0)
            <div class="alert alert-success">{{$mensaje}}</div>
        @else
            <div class="alert alert-warning">{{$mensaje}}</div>
        @endif
    </div>
@stop