@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Paciente</title>
@endsection

@section('contenido')
  @php
    $consumos = $paciente_diagnostico->consumos;
    $paciente = $paciente_diagnostico->paciente;
  @endphp
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Actualizar Insumos</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion Paciente</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ asset('RegistroE') }}">Listado de Pacientes</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('RutaT.buscar', $paciente->id) }}">Ruta de Tratamiento</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('diagnosticos.show', $paciente_diagnostico) }}">Detalle de Tratamiento</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('diagnosticos.edit', $paciente_diagnostico) }}">Actualizar Insumos</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form class="container" action="{{ route('diagnosticos.update', $paciente_diagnostico) }}" method="POST">
          @csrf @method('PATCH')
          <h4 class="text-center mb-4">Actualizar Insumos del Tratamiento</h4>
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
            <div class="col-sm-8">
              <div class="card-box border border-gray">
                <div class="card-block">
                  <h4 class="text-center mb-2">Equipos Médicos</h4>
                  <ul class="list-group">
                    @foreach ($consumos as $consumo)
                      @php
                        $operacion = $consumo->operacion;
                        $insumo = $operacion->insumo;
                        $cantidad = abs($operacion->cantidad);
                        $max = $insumo->existencia + $cantidad;
                        $nameId = "operaciones[$loop->index][id]";
                        $nameCant = "operaciones[$loop->index][cantidad]";
                      @endphp
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">
                          {{ $insumo->nombre }} (min. {{ $cantidad }}, max. {{ $max }})
                        </span>
                        <input name="{{ $nameId }}" type="hidden" value="{{ $operacion->id }}">
                        <input class="form-control" style="max-width: 6rem" type="number" name="{{ $nameCant }}" min="{{ $cantidad }}" max="{{ $max }}" value="{{ $cantidad }}">
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Actualizar 
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
