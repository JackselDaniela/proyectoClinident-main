@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Cargas de Insumos</h4>
        </div>
        <div class="col-6">
          <a href="{{ route('cargas.create') }}" class="btn btn-primary float-right btn-rounded btn-add btn-press">
            <i class="fa fa-plus"></i>
            Registrar carga
          </a>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('Index') }}">Gestion de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
          </li>
        </ol>
      </nav>
      <x-filtros />
      <section>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <div class="card-block">
                <div class="table-responsive">
                  <table class="datatable table table-stripped" style="overflow: hidden;!important">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Insumo</th>
                        <th>Cantidad</th>
                        <th>Elaboracion</th>
                        <th>Vencimiento</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cargas as $carga)
                        @php
                          $operacion = $carga->operacion;
                        @endphp
                        <tr>
                          <td>{{ $carga->codigo }}</td>
                          <td>{{ $operacion->insumo->nombre }}</td>
                          <td>{{ $operacion->cantidad }}</td>
                          <td>{{ $carga->elaboracion->format('d-m-Y') }}</td>
                          <td>{{ $carga->vencimiento?->format('d-m-Y') ?? 'N/A' }}</td>
                          <td>{{ $carga->user->name }}</td>
                          <td>{{ $carga->created_at->format('d-m-Y') }}</td>
                          <td class="text-center" style="min-width: 7rem">
                            <a class="btn btn-sm btn-warning" href="{{ route('cargas.edit', $carga) }}">
                              <i class="fa fa-edit"></i>
                            </a>
                            @if ($carga->mutable)
                              <form class="d-inline" method="POST" action="{{ route('cargas.destroy', $carga) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                  <i class="fa fa-trash-o"></i>
                                </button>
                              </form>
                            @endif
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
@endsection
