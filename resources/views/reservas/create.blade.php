@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestion de Insumos</title>
@endsection

@section('css-externo')
  <link rel="stylesheet" href="{{ asset('css/select-tratamiento.css') }}">
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Registro de Reserva</h4>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ asset('Index') }}">Gestion de Insumos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route('reservas.create') }}">Registro de Reserva</a>
          </li>
        </ol>
      </nav>
      <section class="py-4">
        <form class="container" action="{{ route('reservas.store') }}" method="POST">
          @csrf
          <h3 class="text-center mb-4">Registrar Reserva</h3>
          <div class="row">
            @if ($errors->any())
              <ul>
                @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error  }}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="row px-5 mx-2">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Reservado por procedimientos." name="descripcion" id="descripcion" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="paciente_diagnostico_id">
                  Tratamiento
                  <span class="text-danger">*</span>
                </label>
                <x-select-tratamiento />
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn">
              Registrar Insumo
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
  <script>
    window.diagnosticos = {{ Js::from($diagnosticos) }}
  </script>
  <script defer src="{{ asset('assets/js/alpine.js') }}"></script>
  <script defer>
    document.addEventListener('alpine:init', () => {
      Alpine.data('select', () => ({
        diagnosticos: window.diagnosticos,
        selected: null,
        open: false,
        search: '',
        display: '',
        get searched() {
          return this.diagnosticos.filter(({ nombre, id }) => {
            let included = true

            if (this.search !== '') {
              const search = this.search.toLowerCase()
              included = nombre.toLowerCase().includes(search)
            }

            return included && id !== this.selected
          })
        },
        get display() {
          if (this.selected === null) return 'Seleccionar...'

          const current = this.diagnosticos.find(
            diagnostico => diagnostico.id === this.selected
          )

          const { nombre, tratamiento } = current
          return `${nombre} - ${tratamiento}`
        },
        openDropdown() {
          this.open = true

          setTimeout(() => {
            this.$refs.input.focus()
          }, 50);
        },
        closeDropdown() {
          this.open = false
          this.search = ''
        },
        selectOption() {
          const { id } = this.$el
          this.selected = Number(id)
          this.open = false
        }
      }))
    })
  </script>
@endsection
