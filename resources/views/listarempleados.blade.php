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
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($consulta as $data)
                    <tr class="table-light">
                        <td>{{$data->nombre}} {{$data->ap_pat}} {{$data->ap_mat}}</td>
                        <td>{{$data->role}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            @if ($data->deleted_at == NULL)
                                <a href="{{route('desactivar_empleado',['id_empleado'=>$data->id])}}">
                                    <button class="btn btn-danger">Borrar</button>
                                </a>
                            @else
                                <a href="{{route('activar_empleado',['id_empleado'=>$data->id])}}">
                                    <button class="btn btn-success">Activar</button>
                                </a>
                            @endif
                            <button class="btn btn-primary">Modificar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@stop