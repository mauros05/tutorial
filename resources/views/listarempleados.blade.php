@extends('vistabootstrap')

@section('contenido')
    <div class="container my-4">
        <h3 id="accion_titulo_alta">Listar Empleados</h3>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Correo</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($consulta as $data)
                    <tr class="table-light">
                        <td>{{$data->nombre}} {{$data->ap_pat}} {{$data->ap_mat}}</td>
                        <td>{{$data->role}}</td>
                        <td>{{$data->email}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@stop