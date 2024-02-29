@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Registro de Insumos</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('insumos.index') }}">Listado de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('insumos.create') }}">Registro de Insumos</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form class="container" action="{{ route('insumos.store') }}" method="POST">
          @csrf
          <h3 class="text-center mb-4">Datos del Insumo</h3>
          @if ($errors->any())
            <div class="row">
              <ul>
                @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error  }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="row px-5 mx-2">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="nombre">
                  Nombre del Insumo
                  <span class="text-danger">*</span>
                </label>
                <input class="form-control" value="{{ old('nombre') }}" minlength="5" maxlength="30"
                  placeholder="Ej. Guantes Quirúrgicos" name="nombre" id="nombre" type="text" required>
                @error('nombre')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
              <div class="form-check mt-n2">
                <input class="form-check-input" type="checkbox" name="carga" id="carga" checked>
                <label class="form-check-label" for="carga">
                  Registrar carga inicial del insumo
                </label>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Insumo usado en procedimientos dentales." rows="3"
                  name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="tipo">
                  Tipo de Insumo
                  <span class="text-danger">*</span>
                </label>
                <select class="col-sm-2 select" name="tipo" id="tipo" required>
                  @foreach (['Consumible', 'Equipo Médico'] as $opcion)
                    <option value="{{ $opcion }}">{{ $opcion }}</option>
                  @endforeach
                </select> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="minimo">
                  Stock mínimo
                  <span class="text-danger">*</span>
                </label>
                <input class="form-control" value="{{ old('minimo') }}" min="1" max="100" placeholder="Ej. 10" name="minimo" id="minimo" type="number" required />
                @error('minimo')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
          </div>
          <div class="mt-4" id="carga-section">
            <h3 class="text-center mb-4">Carga Inicial</h3>
            <div class="row px-5 mx-2 justify-content-center">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cantidad">
                    Cantidad
                    <span class="text-danger">*</span>
                  </label>
                  <input class="form-control" value="{{ old('cantidad') }}" min="1" max="1000" placeholder="Ej. 50" name="cantidad" id="cantidad" type="number" required />
                  @error('cantidad')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="elaboracion">
                    Fecha de Elaboración
                    <span class="text-danger">*</span>
                  </label>
                  <input class="form-control" max="{{ today()->format('Y-m-d') }}" value="{{ old('elaboracion') }}" name="elaboracion" id="elaboracion" type="date" required />
                  @error('elaboracion')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="vencimiento">
                    Fecha de Vencimiento
                    <span class="text-danger">*</span>
                  </label>
                  <input class="form-control" min="{{ today()->addDay()->format('Y-m-d') }}" value="{{ old('vencimiento') }}" name="vencimiento" id="vencimiento" type="date" required />
                  @error('vencimiento')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Registrar Insumo
            </button>
          </div>
        </form>
      </section>
    </div>
  </div>
@endsection

@section('js-externo')
  <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
  <script type="module" src="{{ asset('js/registrar-insumo.js') }}"></script>
@endsection
