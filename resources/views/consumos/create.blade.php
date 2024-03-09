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
        <form enctype="multipart/form-data" class="container" action="{{ route('diagnosticos.consumos.store', $paciente_diagnostico) }}" method="POST" x-data="form">
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
                <label>
                  Insumo
                  <span class="text-danger">*</span>
                </label>
                <x-select key="insumos" name="insumo_id" x-model="insumo" />
              </div>
            </div>
            <div class="col-sm-5" x-show="selected" x-cloak>
              <div class="form-group">
                <label for="cantidad">
                  Cantidad
                  <span x-text="`(max. ${max})`"></span>
                  <span class="text-danger">*</span>
                </label>
                <input type="number" class="form-control" min="1" :max="max" placeholder="Ej. 12" name="cantidad" id="cantidad" value="{{ old('cantidad') }}" required />
                @error('cantidad')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn" :disabled="!selected">
              Registrar Reserva
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
  <script>
    window.insumos = {{ Js::from($insumos) }}
  </script>
  <script type="module" src="{{ asset('js/select-insumo.js') }}"></script>
  <script defer src="{{ asset('assets/js/alpine.js') }}"></script>
@endsection
