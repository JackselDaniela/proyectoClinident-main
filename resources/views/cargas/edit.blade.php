@extends('layouts.plantilla')

@php
  $operacion = $carga->operacion;
  $insumo = $operacion->insumo;
@endphp

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Editar Carga</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.edit', $carga) }}">Editar Carga</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        @if ($errors->any())
          <div class="row">
              <ul>
                @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error  }}</li>
                @endforeach
              </ul>
            </div>
        @endif
        <h3 class="text-center mb-4">Datos de la Carga</h3>
        <div class="row justify-content-center mb-4">
          <div class="col-sm-4 bg-white rounded shadow-sm border p-2 border-gray text-center">
            <p class="m-0">Insumo de la carga a editar:</p>
            <h4 class="h4 text-primary">{{ $insumo->nombre }}</h4>
            <h5 class="mt-n2">#{{ $insumo->codigo }}</h5>
          </div>
        </div>
        <form class="container" action="{{ route('cargas.update', $carga) }}" method="POST">
          @csrf @method('PUT')
          <div class="row px-5 mx-2 justify-content-center">
            @if ($carga->mutable)
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cantidad">
                    Cantidad
                    <span class="text-danger">*</span>
                  </label>
                  <input class="form-control" value="{{ old('cantidad', $operacion->cantidad) }}" min="1" max="1000" placeholder="Ej. 50" name="cantidad" id="cantidad" type="number" required />
                  @error('cantidad')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            @endif
            <div class="col-sm-4">
              <div class="form-group">
                <label for="elaboracion">
                  Fecha de Elaboración
                  <span class="text-danger">*</span>
                </label>
                <input class="form-control" max="{{ today()->format('Y-m-d') }}" value="{{ old('elaboracion', $carga->elaboracion->format('Y-m-d')) }}" name="elaboracion" id="elaboracion" type="date" required />
                @error('elaboracion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            @if ($carga->operacion->insumo->tipo === 'Consumible')
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="vencimiento">
                    Fecha de Vencimiento
                    <span class="text-danger">*</span>
                  </label>
                  <input class="form-control" max="{{ today()->format('Y-m-d') }}" value="{{ old('vencimiento', $carga->vencimiento?->format('Y-m-d')) }}" name="vencimiento" id="vencimiento" type="date" required />
                  @error('vencimiento')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                  @enderror
                </div>
              </div>
            @endif
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Editar Carga
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
  <script src="{{ asset('js/mask-number.js') }}"></script>
@endsection
