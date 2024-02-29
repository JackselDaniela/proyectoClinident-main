@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('css-externo')
  <link rel="stylesheet" href="{{ asset('css/select-tratamiento.css') }}">
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Registro de Reserva</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.create') }}">Registro de Reserva</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form enctype="multipart/form-data" class="container" action="{{ route('reservas.store') }}" method="POST" x-data="{ diagnostico: null, reservados: [] }">
          @csrf
          <h3 class="text-center mb-4">Registrar Reserva</h3>
          <div class="row">
            @if ($errors->any())
              <ul>
                @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error  }}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Reservado por procedimientos." name="descripcion" id="descripcion" rows="1" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label>
                  Tratamiento
                  <span class="text-danger">*</span>
                </label>
                <x-select key="diagnosticos" name="paciente_diagnostico_id" x-model="diagnostico" />
              </div>
            </div>
          </div>
          <h4 class="text-center mt-4 mb-2">Equipos Médicos a reservar: </h4>
          <x-carrito-insumos title="Equipo Médico" x-model="reservados" />
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn" :disabled="diagnostico === null || reservados.length < 1">
              Registrar Reserva
            </button>
          </div>
        </form>
        <form name="add-insumo" id="add-insumo"></form>
      </section>
    </div>
  </div>
@endsection

@section('js-externo')
  <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
  <script>
    window.diagnosticos = {{ Js::from($diagnosticos) }}
    window.insumos = {{ Js::from($insumos) }}
  </script>
  <script type="module" src="{{ asset('js/carrito-insumos.js') }}"></script>
  <script defer src="{{ asset('assets/js/alpine.js') }}"></script>
@endsection
