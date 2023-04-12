@extends('vistabootstrap')

@section('contenido')
  <div class="container my-4" id="forma_alta_empleado">

    <h3 id="accion_titulo_alta">Alta Empleado</h3>
    
    {{-- El enctype="multipart/form-data" es para la transferencia de archivos --}}
    <form action="{{route('guardar_empleado')}}" method="POST"  enctype="multipart/form-data">
      @csrf {{-- Tenemos que agregar un Token para que el Formulario Funcione --}}
      <div class="row mb-4">
        <div class="col">
          <label for="nombre" class="form-label">Numero de Empleado</label>
          <input type="text" class="form-control" value="{{$nuevoId}}" id="nombre" readonly>
        </div>

        <div class="col">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}" id="nombre">
          @if ($errors->first('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="ap_pat" class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" name="ap_pat" value="{{old('ap_pat')}}" id="ap_pat">
          @if ($errors->first('ap_pat'))
            <p class="text-danger">{{$errors->first('ap_pat')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="ap_mat" class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" name="ap_mat" value="{{old('ap_mat')}}" id="ap_mat">
          @if ($errors->first('ap_mat'))
            <p class="text-danger">{{$errors->first('ap_mat')}}</p>
          @endif
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="direccion" class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}" id="direccion">
          @if ($errors->first('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
          @endif
        </div>
  
        <div class="col">
          <label for="numero_telefono" class="form-label">Numero Telefonico</label>
          <input type="number" class="form-control" name="numero_telefono" value="{{old('numero_telefono')}}" id="numero_telefono">
          @if ($errors->first('numero_telefono'))
            <p class="text-danger">{{$errors->first('numero_telefono')}}</p>
          @endif
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="tipo_empleado" class="form-label">Tipo de Empleado</label>
          <select class="form-select" aria-label="Default select example" name="tipo_empleado" value="{{old('tipo_empleado')}}">
            <option selected>Seleccionar</option>
            @foreach ($consultaRoles as $rol)
              <option value="{{$rol->id}}">{{$rol->nombre}}</option>
            @endforeach
          </select>
          @if ($errors->first('tipo_empleado'))
            <p class="text-danger">{{$errors->first('tipo_empleado')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="genero" class="form-label">Genero</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="genero" value="M" id="genero" checked>
            <label class="form-check-label" for="genero">
              Masculino
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="genero" value="F" id="genero">
            <label class="form-check-label" for="genero">
              Femenino
            </label>
          </div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="email" class="form-label">Correo</label>
          <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" aria-describedby="emailHelp">
          @if ($errors->first('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
          @endif
        </div>
  
        <div class="col">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control"  name="pass" value="{{old('pass')}}" id="password">
          @if ($errors->first('pass'))
            <p class="text-danger">{{$errors->first('pass')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="email" class="form-label">Foto de Perfil</label>
          <input type="file" class="form-control" name="foto_perfil" id="foto_perfil">
          @if ($errors->first('foto_perfil'))
            <p class="text-danger">{{$errors->first('foto_perfil')}}</p>
          @endif
        </div>
        
      </div>

      <button type="submit" class="btn btn-success">Generar Alta</button>
    </form>
    {{-- <a href="{{route('primera_vista')}}" class="btn btn-primary my-4">Ir a Primera vista</a> --}}
  </div>
@stop