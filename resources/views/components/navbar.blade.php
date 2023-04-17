<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('principal')}}">SCN</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('principal')}}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('alta_empleado')}}">Alta Empleado</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('listar_empleados')}}">Listar Empleados</a>
              </li>
            </ul>
            {{-- <a href="{{route('cerrar_sesion')}}"> --}}
              <button class="btn btn-outline-danger" type="submit" id="btn-logout">Cerrar Sesion</button>
            {{-- </a> --}}
          </div>
        </div>
      </nav>
</div>