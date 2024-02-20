@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestión de Paciente</title>
@endsection

@section('css-externo')
  <link rel="stylesheet" href="{{ asset('css/select-tratamiento.css') }}">
@endsection


@section('contenido')
  @php
    $paciente = $paciente_diagnostico->paciente;
    $estatus = $paciente_diagnostico->estatus_tratamiento;
    $tratamiento = $paciente_diagnostico->registrar_tratamiento;
    $pieza = $paciente_diagnostico->pieza;
    $diagnostico = $paciente_diagnostico->diagnostico;
    $consumos = $paciente_diagnostico->consumos;
  @endphp
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-12">
          <h4 class="page-title">Detalle de Tratamiento</h4>
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
        </ol>
      </nav>
      <section>
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <div class="card-box border border-gray">
              <div class="card-block">
                <h3>{{ $paciente_diagnostico->titulo }}</h3>
                <p class="mb-1">
                  <b>C.I Paciente:</b>
                  {{ $paciente->persona->doc_identidad }}
                </p>
                <p class="mb-1">
                  <b>Pieza:</b>
                  {{ $pieza->nom_pieza }}
                </p>
                <p class="mb-1">
                  <b>Diagnóstico:</b> 
                  {{ $diagnostico->diagnostico }}
                </p>
                <p class="mb-1">
                  <b>Estatus:</b>
                  {{ $estatus->estatus }}
                </p>
                <p>
                  <b>Fecha de registro:</b>
                  {{ $paciente_diagnostico->created_at->format('d-m-Y') }}
                </p>
                <x-estado-tratamiento.boton :diagnostico="$paciente_diagnostico" />
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card-box border border-gray">
              <div class="card-block">
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <h4 class="text-center mb-0">Insumos Utilizados</h4>
                  <div class="d-flex align-items-center">
                    @if ($paciente_diagnostico->añadible)
                      <a href="{{ route('diagnosticos.consumos.create', $paciente_diagnostico) }}" class="btn btn-sm btn-success mr-1">
                        <i class="fa fa-plus"></i>
                      </a>
                    @endif
                    <a href="{{ route('diagnosticos.edit', $paciente_diagnostico) }}" class="btn btn-sm btn-warning">
                      <i class="fa fa-edit"></i>
                    </a>
                  </div>
                </div>
                <ul class="list-group">
                  @forelse ($consumos as $consumo)
                    <li class="list-group-item d-flex justify-content-between">
                      <span>{{ $consumo->operacion->insumo->nombre }}</span>
                      <span>{{ abs($consumo->operacion->cantidad) }}</span>
                    </li>
                  @empty
                    <li class="list-group-item text-center p-4">
                      Aún no se han registrado los insumos a utilizar, ya que el tratamiento no ha iniciado.
                    </li>
                  @endforelse
                  <li class="list-group-item d-flex justify-content-between font-weight-bold">
                    <span>Total</span>
                    <span>{{ $paciente_diagnostico->insumos_count }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <x-estado-tratamiento.modal :diagnostico="$paciente_diagnostico" />
@endsection

@section('js-externo')
  <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
  <script>
    window.insumos = {{ Js::from($insumos) }}
  </script>
  <script type="module" src="{{ asset('js/carrito-insumos.js') }}"></script>
  <script defer src="{{ asset('assets/js/alpine.js') }}"></script>
@endsection
