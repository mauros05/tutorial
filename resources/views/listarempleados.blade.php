@extends('vistabootstrap')

@section('contenido')
    <div class="container my-4">
        <h3 id="accion_titulo_alta">Listar Empleados</h3>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($consulta as $data)
                    <tr class="table-light">
                        <td><img src="{{$data->imagen == '' ? asset('public/archivos/1__ARzR7F_fff_KI14yMKBzw.png') : asset('public/archivos/'.$data->imagen)}}" alt="foto_perfil" height="50" width="50" style="border-radius: 64px"></td>
                        <td>{{$data->nombre}} {{$data->ap_pat}} {{$data->ap_mat}}</td>
                        <td>{{$data->role}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            <a href="{{route('modificar_empleado',['id_empleado'=>$data->id])}}">
                                <button class="btn btn-primary">Modificar</button>
                            </a>
                            @if ($data->deleted_at == NULL)
                                <a href="{{route('desactivar_empleado',['id_empleado'=>$data->id])}}">
                                    <button class="btn btn-warning">Desactivar</button>
                                </a>
                            @else
                                <a href="{{route('activar_empleado',['id_empleado'=>$data->id])}}">
                                    <button class="btn btn-success">Activar</button>
                                </a>
                                <a href="{{route('borrar_empleado',['id_empleado'=>$data->id])}}">
                                    <button class="btn btn-danger">Borrar</button>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    
@stop