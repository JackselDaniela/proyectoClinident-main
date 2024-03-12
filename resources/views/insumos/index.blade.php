@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestión de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Listado de Insumos</h4>
        </div>
        <div class="col-6">
          <a href="{{ route('insumos.create') }}" class="btn btn-primary float-right btn-rounded btn-add btn-press">
            <i class="fa fa-plus"></i>
            Registrar Insumo
          </a>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestión de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('insumos.index') }}">Listado de Insumos</a>
          </li>
        </ol>
      </nav>
      <x-filtros filtro="tipo" :opciones="['Consumible', 'Equipo Médico']" />
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
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Existencia</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($insumos as $insumo)
                        <tr>
                          <td>{{ $insumo->codigo }}</td>
                          <td>{{ $insumo->nombre }}</td>
                          <td>{{ $insumo->tipo }}</td>
                          <td style="max-width: 15rem">{{ $insumo->descripcion }}</td>
                          <td>{{ $insumo->existencia }}</td>
                          <td class="actions-td">
                            <a href="{{ route('cargas.create', ['insumo_id' => $insumo->id]) }}">
                              <i class="fa fa-plus" style="width: 1rem; color:#1ABC9C;"></i>
                            </a>
                            <a href="{{ route('insumos.edit', $insumo) }}">
                              <i class="fa fa-edit" style="width: 1rem; color:#9B59B6;"></i>
                            </a>
                            <form class="d-inline" method="POST" action="{{ route('insumos.destroy', $insumo) }}">
                              @csrf @method('DELETE')
                              <button class="btn-icon" type="submit">
                                <i class="fa fa-trash-o" style="width: 1rem; color:red;"></i>
                              </button>
                            </form>
                          </td>
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
  <script src="{{ asset('js/tabla.js') }}"></script>
@endsection
