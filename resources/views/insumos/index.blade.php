@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
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
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestion de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('insumos.index') }}">Listado de Insumos</a>
          </li>
        </ol>
      </nav>
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
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Existencia</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($insumos as $insumo)
                        <tr>
                          <td>{{ $insumo->codigo }}</td>
                          <td>{{ $insumo->nombre }}</td>
                          <td>{{ $insumo->descripcion }}</td>
                          <td>{{ $insumo->existencia }}</td>
                          <td style="min-width: 7rem">
                            {{-- {{ route('cargas.create') }} --}}
                            <a href="#" class="btn btn-sm btn-success">
                              <i class="fa fa-plus"></i>
                              <span class="fs-sm"></span>
                            </a>
                            <a class="btn btn-sm btn-warning" href="{{ route('insumos.edit', $insumo) }}">
                              <i class="fa fa-edit"></i>
                            </a>
                            <form class="d-inline" method="POST" action="{{ route('insumos.destroy', $insumo) }}">
                              @csrf @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o"></i>
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
@endsection
