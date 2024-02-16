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
          <h4 class="page-title">Actualizar Reserva N° {{ $reserva->codigo }}</h4>
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
            <a href="{{ route('reservas.edit', $reserva) }}">Actualizar Reserva N° {{ $reserva->codigo }}</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form class="container" action="{{ route('reservas.update', $reserva) }}" method="POST">
          @csrf @method('PATCH')
          <h3 class="text-center mb-4">Actualizar Reserva</h3>
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
            <div class="col-sm-6">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Reservado por procedimientos." name="descripcion" id="descripcion" required>{{ old('descripcion', $reserva->descripcion) }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
          </div>
          @if ($reserva->mutable)
            <div class="row justify-content-center">
              <div class="col-sm-8">
                <div class="card-box border border-gray">
                  <div class="card-block">
                    <h4 class="text-center mb-2">Equipos Médicos</h4>
                    <ul class="list-group">
                      @foreach ($reserva->items as $item)
                        @php
                          $operacion = $item->operacion;
                          $insumo = $operacion->insumo;
                          $cantidad = $operacion->cantidad;
                          $max = $insumo->existencia + abs($cantidad);
                          $nameId = "operaciones[$loop->index][id]";
                          $nameCant = "operaciones[$loop->index][cantidad]";
                        @endphp
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <span class="font-weight-bold">
                            {{ $insumo->nombre }} (max. {{ $max }})
                          </span>
                          <input name="{{ $nameId }}" type="hidden" value="{{ $operacion->id }}">
                          <input class="form-control" style="max-width: 6rem" type="number" name="{{ $nameCant }}" min="1" max="{{ $max }}" value="{{ abs($cantidad) }}">
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          @endif
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Actualizar reserva
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
