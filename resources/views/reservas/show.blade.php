@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-12">
          <h4 class="page-title">Reserva N° {{ $reserva->codigo }}</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Gestion de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.show', $reserva) }}">Reserva N° {{ $reserva->codigo }}</a>
          </li>
        </ol>
      </nav>
      <section>
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <div class="card-box border border-gray">
              <div class="card-block">
                <h3>Reserva N° {{ $reserva->codigo }}</h3>
                <p><b>Descripcion:</b> {{ $reserva->descripcion }}</p>
                <p>
                  <b>Estatus:</b>
                  <span style="filter: brightness(.9);" @class([
                    'font-weight-bold',
                    'text-warning' => $reserva->restitucion === null,
                    'text-success' => $reserva->restitucion !== null,
                  ])>
                    {{ $reserva->estatus }}
                  </span>
                </p>
                <p><b>Fecha de reserva:</b> {{ $reserva->created_at->format('d-m-Y') }}</p>
                <p><b>Fecha de restitución:</b> {{ $reserva->restitucion?->format('d-m-Y') ?? 'N/A' }}</p>
                <div class="d-flex" style="gap: 0.5rem">
                  @if ($reserva->restitucion === null)
                    <form method="POST" action="{{ route('reservas.restitucion', $reserva) }}">
                      @method('PATCH') @csrf
                      <button class="btn btn-success" type="submit">
                        <i class="fa fa-rotate-left"></i>
                        Restituir equipos
                      </button>
                    </form>
                  @endif
                  <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                    Actualizar
                  </a>
                  @if ($reserva->mutable)
                    <form method="POST" action="{{ route('reservas.destroy', $reserva) }}">
                      @method('DELETE') @csrf
                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                        Eliminar
                      </button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card-box border border-gray">
              <div class="card-block">
                <h4 class="text-center mb-0">Equipos Médicos</h4>
                <a href="{{ route('RutaT.editar', $reserva->paciente_diagnostico->id) }}" class="block text-center mb-3">{{ $reserva->tratamiento }}</a>
                <ul class="list-group">
                  @foreach ($reserva->items as $item)
                    <li class="list-group-item d-flex justify-content-between">
                      <span>{{ $item->operacion->insumo->nombre }}</span>
                      <span>{{ abs($item->operacion->cantidad) }}</span>
                    </li>
                  @endforeach
                  <li class="list-group-item d-flex justify-content-between font-weight-bold">
                    <span>Total</span>
                    <span>{{ $reserva->cantidad }}</span>
                  </li>
                </ul>
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
