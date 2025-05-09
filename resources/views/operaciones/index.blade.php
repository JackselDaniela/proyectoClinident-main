@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestión de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="page-title">Historial de Inventario</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestión de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('operaciones.index') }}">Historial de Inventario</a>
          </li>
        </ol>
      </nav>
      <x-filtros filtro="operacion" :opciones="['Entradas', 'Salidas']" />
      <section>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <div class="card-block">
                <div class="table-responsive">
                  <table class="datatable table table-stripped" style="overflow: hidden;!important">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Insumo</th>
                        <th>Tipo</th>
                        <th>Operación</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($operaciones as $operacion)
                        @php
                          $positivo = $operacion->cantidad > 0;
                        @endphp
                        <tr>
                          <td>{{ $operacion->codigo }}</td>
                          <td>{{ $operacion->insumo->nombre }}</td>
                          <td>{{ $operacion->insumo->tipo }}</td>
                          <td @class([
                            'font-weight-bold',
                            'text-success' => $positivo,
                            'text-danger' => !$positivo,
                            ])> {{ abs($operacion->movimiento) }}</td>
                          <td>{{ $operacion->motivo }}</td>
                          <td>{{ $operacion->created_at->format('d-m-Y') }}</td> 
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection

@section('js-externo')
  <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
  <script src="{{ asset('/assets/js/modal.js') }}"></script>
  <script src="{{ asset('js/tabla.js') }}"></script>
@endsection
