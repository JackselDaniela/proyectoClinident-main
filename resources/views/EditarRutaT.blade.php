@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Pacientes </title>
@endsection

@section('css-externo')
  <link rel="stylesheet" href="{{ asset('css/select-tratamiento.css') }}">
@endsection

@php
  $siguiente = $paciente_diagnostico->siguiente;
@endphp

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-md-10 col-10">
          <h4 class="page-title">Ruta de Tratamiento</h4>
        </div>
        <div class="col-sm-2 col-2">
          <div class="btn-group btn-group-sm">
            <button class="btn btn-white"><img src="{{ asset('assets/img/pdf.png') }}" style="width: 30px"></button>
            <button class="btn btn-white"><i class="fa fa-print fa-lg"></i></button>
          </div>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestion Paciente</a></li>
          <li class="breadcrumb-item"><a href="{{ asset('RegistroE') }}">Listado de Pacientes</a></li>
          <li class="breadcrumb-item"><a href="#">Ruta de Tratamiento</a></li>
        </ol>
      </nav>
      <section class="container-fluid">
        <div class="row filter-row">
          <div class="col-sm-4 col-md-4">
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <input class="form-control"
                    value="Paciente:  {{ $paciente_diagnostico->paciente->persona->nombre . ' ' . $paciente_diagnostico->paciente->persona->apellido }}"
                    type="text" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <input class="form-control"
                    value="Presupuesto: {{ $paciente_diagnostico->paciente->persona->nombre . ' ' . $paciente_diagnostico->paciente->persona->apellido }}"
                    type="text" disabled>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive"style="padding-left:1rem;!important; padding-right:1rem;!important; overflow-x:hidden;!important">
              <table class="table table-striped custom-table mb-0">
                <thead>
                  <tr>
                    <th># Pieza</th>
                    <th>Tratamiento</th>
                    <th>Costo</th>
                    <th>Estatus</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $paciente_diagnostico->pieza->nom_pieza }}</td>
                    <td>{{ $paciente_diagnostico->diagnostico->diagnostico }}</td>
                    <td>
                      {{ $paciente_diagnostico->registrar_tratamiento->costo_tratamiento }}
                    </td>
                    <td>
                      {{ $paciente_diagnostico->estatus_tratamiento->estatus }}
                    </td>
                    <td>
                      @if ($siguiente?->estatus === 'Terminado')
                        <form method="POST" action="{{ route('RutaT.update', $paciente_diagnostico)}}">
                          @method('PATCH') @csrf
                          <button type="submit" class="btn btn-primary btn-rounded btn-press btn-add">
                            Finalizar Tratamiento
                          </button>
                        </form>
                      @elseif ($siguiente?->estatus === 'En Proceso')
                        <button type="button" class="btn btn-primary btn-rounded btn-press btn-add" data-toggle="modal" data-target="#insumosModal">
                          Iniciar Tratamiento
                        </button>
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <div class="modal" tabindex="-1" role="dialog" id="insumosModal">
    <div class="modal-dialog" style="max-width: 800px" role="document">
      <div class="modal-content" style="width: 800px">
        <div class="modal-header">
          <h4 class="modal-title">Iniciar Tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="container-fluid" method="POST" action="{{ route('RutaT.update', $paciente_diagnostico)}}">
          <div class="modal-body" x-data="{ seleccionados: [] }">
            @method('PATCH') @csrf
            <p>Para iniciar el tratamiento, debe seleccionar los insumos médicos a utilizar.</p>
            <x-carrito-insumos title="Insumo" x-model="seleccionados" />
            <button type="submit" class="btn btn-primary submit-btn btn-press" :disabled="seleccionados.length < 1">
              Iniciar Tratamiento
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <form name="add-insumo" id="add-insumo"></form>
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
