@extends('vistabootstrap')

@section('contenido')
  <div class="container my-4" id="forma_alta_empleado">

    <h3 id="accion_titulo_alta">Modificar Empleado</h3>
    
    <form action="{{route('actualizar_empleado')}}" method="POST">
      @csrf {{-- Tenemos que agregar un Token para que el Formulario Funcione --}}
      <div class="row mb-4">
        <div class="col">
          <label for="nombre" class="form-label">Numero de Empleado</label>
          <input type="text" class="form-control" value="{{$dataEmpleado->id}}" id="" readonly>
        </div>

        <div class="col">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="{{$dataEmpleado->nombre}}" id="nombre">
          @if ($errors->first('nombre'))
            <p class="text-danger">{{$errors->first('nombre')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="ap_pat" class="form-label">Apellido Paterno</label>
          <input type="text" class="form-control" name="ap_pat" value="{{$dataEmpleado->ap_pat}}" id="ap_pat">
          @if ($errors->first('ap_pat'))
            <p class="text-danger">{{$errors->first('ap_pat')}}</p>
          @endif
        </div>

        <div class="col">
          <label for="ap_mat" class="form-label">Apellido Materno</label>
          <input type="text" class="form-control" name="ap_mat" value="{{$dataEmpleado->ap_mat}}" id="ap_mat">
          @if ($errors->first('ap_mat'))
            <p class="text-danger">{{$errors->first('ap_mat')}}</p>
          @endif
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="direccion" class="form-label">Direccion</label>
          <input type="text" class="form-control" name="direccion" value="{{$dataEmpleado->direccion}}" id="direccion">
          @if ($errors->first('direccion'))
            <p class="text-danger">{{$errors->first('direccion')}}</p>
          @endif
        </div>
  
        <div class="col">
          <label for="numero_telefono" class="form-label">Numero Telefonico</label>
          <input type="number" class="form-control" name="numero_telefono" value="{{$dataEmpleado->numero_telefono}}" id="numero_telefono">
          @if ($errors->first('numero_telefono'))
            <p class="text-danger">{{$errors->first('numero_telefono')}}</p>
          @endif
        </div>
      </div>

      <div class="row mb-4">
        <div class="col">
          <label for="tipo_empleado" class="form-label">Tipo de Empleado</label>
          <select class="form-select" aria-label="Default select example" name="tipo_empleado">
            <option selected>Seleccionar</option>
            @foreach ($consultaRoles as $rol)
              <option value="{{$rol->id}}" {{ $rol->id == old('tipo_empleado', $dataEmpleado->id_tipo_empleado) ? 'selected' : '' }}>
                {{$rol->nombre}}
              </option>
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
          <input type="email" class="form-control" name="email" value="{{$dataEmpleado->email}}" id="email" aria-describedby="emailHelp">
          @if ($errors->first('email'))
            <p class="text-danger">{{$errors->first('email')}}</p>
          @endif
        </div>
  
        <div class="col">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control"  name="pass" value="{{$dataEmpleado->password}}" id="password">
          @if ($errors->first('pass'))
            <p class="text-danger">{{$errors->first('pass')}}</p>
          @endif
        </div>
      </div>

      <button type="submit" class="btn btn-success">Modificar Empleado</button>
    </form>
    {{-- <a href="{{route('primera_vista')}}" class="btn btn-primary my-4">Ir a Primera vista</a> --}}
  </div>
@stop