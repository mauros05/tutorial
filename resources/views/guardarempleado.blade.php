@extends('vistabootstrap')

@section('contenido')
    <div class="container">
        <h2>Proceso: {{$proceso}}</h2>
        <div class="alert alert-success">{{$mensaje}}</div>
    </div>
@stop