@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestión de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Reservas de Equipos</h4>
        </div>
        <div class="col-6">
          <a href="{{ route('reservas.create') }}" class="btn btn-primary float-right btn-rounded btn-add btn-press">
            <i class="fa fa-plus"></i>
            Registrar Reserva
          </a>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestión de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
          </li>
        </ol>
      </nav>
      <x-filtros filtro="restitucion" :opciones="['Restituidos', 'No restituidos']" />
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
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Cant. Equpos</th>
                        <th>Restitución</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($reservas as $reserva)
                        <tr>
                          <td>{{ $reserva->codigo }}</td>
                          <td style="max-width: 25ch">{{ $reserva->descripcion }}</td>
                          <td>{{ $reserva->created_at->format('d-m-Y') }}</td>
                          <td>{{ $reserva->cantidad }} equipos</td>
                          <td>{{ $reserva->restitucion?->format('d-m-Y') ?? 'N/A' }}</td>
                          <td class="actions-td">
                            @if ($reserva->restitucion === null)
                              <form class="d-inline" method="POST" action="{{ route('reservas.restitucion', $reserva) }}">
                                @method('PATCH') @csrf
                                <button class="btn-icon" type="submit">
                                  <i class="fa fa-rotate-left"></i>
                                </button>
                              </form>
                            @endif
                            <a href="{{ route('reservas.show', $reserva) }}">
                              <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('reservas.edit', $reserva) }}">
                              <i class="fa fa-edit"></i>
                            </a>
                            @if ($reserva->mutable)
                              <form class="d-inline" method="POST" action="{{ route('reservas.destroy', $reserva) }}">
                                @csrf @method('DELETE')
                                <button class="btn-icon" type="submit">
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
  <script src="{{ asset('js/tabla.js') }}"></script>
@endsection
