@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Editar Insumo: {{ $insumo->nombre }}</h4>
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
            <a href="{{ route('insumos.create') }}">Editar Insumo</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form class="container" action="{{ route('insumos.update', $insumo) }}" method="POST">
          @csrf @method('PUT')
          <h4 class="text-center mb-4">Datos del Insumo</h4>
          <div class="row justify-content-center">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nombre">
                  Nombre del Insumo
                  <span class="text-danger">*</span>
                </label>
                <input class="form-control" value="{{ old('nombre', $insumo->nombre) }}" minlength="5" maxlength="30"
                  placeholder="Ej. Guantes Quirúrgicos" name="nombre" id="nombre" type="text" required>
                @error('nombre')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Insumo usado en procedimientos dentales."
                  name="descripcion" id="descripcion" required>{{ old('descripcion', $insumo->descripcion) }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="minimo">
                  Stock mínimo
                  <span class="text-danger">*</span>
                </label>
                <input class="form-control" value="{{ old('minimo', $insumo->minimo) }}" min="1" max="100" placeholder="Ej. 10" name="minimo" id="minimo" type="number" required />
                @error('minimo')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Editar insumo
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
@endsection
