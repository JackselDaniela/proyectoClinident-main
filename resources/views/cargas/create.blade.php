@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Registro de Carga</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.create') }}">Registro de Carga</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        @if ($errors->any())
          <div class="row">
              <ul>
                @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error  }}</li>
                @endforeach
              </ul>
            </div>
        @endif
          @if ($insumo === null)
            @if ($codigo !== null)
            <div class="alert alert-danger alert-dismissible fade show">
              No se encontró ningún insumo con el código: <b>INS-{{ $codigo }}</b>
              <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <h3 class="text-center mb-4">Insumo a Cargar</h3>
            <form method="GET">
              <div class="row justify-content-center">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="codigo">
                      Ingrese el código del Insumo
                      <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">INS-</span>
                      </div>
                      <input name="codigo" type="text" class="form-control" id="codigo" minlength="5" maxlength="5" value="{{ $codigo }}" data-mask="number" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center mt-4">
                <button type="submit" class="btn btn-primary submit-btn">
                  Buscar Insumo
                </button>
              </div>
            </form>
          @else
            <h3 class="text-center mb-4">Datos de la Carga</h3>
            <div class="row justify-content-center mb-4">
              <div class="col-sm-4 bg-white rounded shadow-sm border p-2 border-gray text-center">
                <p class="m-0">Insumo a cargar:</p>
                <h4 class="h4 text-primary">{{ $insumo->nombre }}</h4>
                <h5 class="mt-n2">#{{ $insumo->codigo }}</h5>
              </div>
            </div>
            <form class="container" action="{{ route('cargas.store') }}" method="POST">
              @csrf
              <input type="hidden" name="insumo_id" value="{{ $insumo->id }}">
              <div class="row px-5 mx-2 justify-content-center">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="cantidad">
                      Cantidad
                      <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" value="{{ old('cantidad') }}" min="1" max="1000" placeholder="Ej. 50" name="cantidad" id="cantidad" type="number" required />
                    @error('cantidad')
                      <p class="text-danger">
                        {{ $message }}
                      </p>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="elaboracion">
                      Fecha de Elaboración
                      <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" max="{{ today()->format('Y-m-d') }}" value="{{ old('elaboracion') }}" name="elaboracion" id="elaboracion" type="date" required />
                    @error('elaboracion')
                      <p class="text-danger">
                        {{ $message }}
                      </p>
                    @enderror
                  </div>
                </div>
                @if ($insumo->tipo === 'Consumible')
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="vencimiento">
                        Fecha de Vencimiento
                        <span class="text-danger">*</span>
                      </label>
                      <input class="form-control" min="{{ today()->addDay()->format('Y-m-d') }}" value="{{ old('vencimiento') }}" name="vencimiento" id="vencimiento" type="date" required />
                      @error('vencimiento')
                        <p class="text-danger">
                          {{ $message }}
                        </p>
                      @enderror
                    </div>
                  </div>
                @endif
              </div>
              <div class="row justify-content-center mt-4">
                <button type="submit" class="btn btn-primary submit-btn">
                  Registrar Carga
                </button>
              </div>
            </form>
          @endif
      </section>
    </div>
  </div>
@endsection

@section('js-externo')
  <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('/assets/js/app.js') }}"></script>
  <script src="{{ asset('js/mask-number.js') }}"></script>
@endsection
