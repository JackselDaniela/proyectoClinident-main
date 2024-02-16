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
        <form enctype="multipart/form-data" class="container" action="{{ route('reservas.store') }}" method="POST" x-data="{ diagnostico: null, reservados: [] }">
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
          <div class="row justify-content-center">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="descripcion">
                  Descripción
                  <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" minlength="10" maxlength="80" placeholder="Ej. Reservado por procedimientos." name="descripcion" id="descripcion" rows="1" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                  <p class="text-danger">
                    {{ $message }}
                  </p>
                @enderror
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label>
                  Tratamiento
                  <span class="text-danger">*</span>
                </label>
                <x-select key="diagnosticos" name="paciente_diagnostico_id" x-model="diagnostico" />
              </div>
            </div>
          </div>
          <h4 class="text-center mt-4 mb-2">Equipos Médicos a reservar: </h4>
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box border" style="border-color: #eee">


                <div class="card-block" x-data="insumos" x-modelable="insumos" x-model="reservados" @addinsumo.window="addInsumo">
                  <div class="row justify-content-center align-items-center">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>
                          Equipo Médico
                          <span class="text-danger">*</span>
                        </label>
                        <x-select key="insumos" x-model="insumo" />
                      </div>
                    </div>
                    <div class="col-sm-4" x-show="insumo !== null" x-cloak>
                      <div class="form-group">
                        <label for="cantidad">
                          Cantidad (max. <span x-text="datosInsumo(insumo)?.max"></span>)
                          <span class="text-danger">*</span>
                        </label>
                        <input form="add-insumo" class="form-control" value="{{ old('cantidad') }}" min="1" :max="Number(datosInsumo(insumo)?.max) + 5" placeholder="Ej. 50" name="cantidad" id="cantidad" type="number" x-model="cantidad" required />
                        @error('cantidad')
                          <p class="text-danger">
                            {{ $message }}
                          </p>
                        @enderror
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button form="add-insumo" type="submit" class="btn btn-primary" :disabled="!submitable">
                        <i class="fa fa-plus"></i>
                        Añadir
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-stripped">
                      <thead>
                        <tr>
                          <th>Código</th>
                          <th>Equipo</th>
                          <th>Cantidad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <template x-for="{ id, cantidad }, index in insumos">
                          <tr x-data="{ current: datosInsumo(id) }">
                            <td x-text="current.codigo"></td>
                            <td x-text="current.title"></td>
                            <td x-text="cantidad"></td>
                            <td>
                              <button @click="removeInsumo" :data-id="id" type="button" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                              </button>
                              <input type="hidden" :name="`insumos[${index}][id]`" :value="id">
                              <input type="hidden" :name="`insumos[${index}][cantidad]`" :value="cantidad">
                            </td>
                          </tr>
                        </template>
                        <template x-if="insumos.length === 0">
                          <tr>
                            <td class="text-center" colspan="4">
                              No se ha añadido ningún equipo médico.
                            </td>
                          </tr>
                        </template>
                      </tbody>
                    </table>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-4">
            <button type="submit" class="btn btn-primary submit-btn" :disabled="diagnostico === null || reservados.length < 1">
              Registrar Reserva
            </button>
          </div>
        </form>
        <form name="add-insumo" id="add-insumo"></form>
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
    window.insumos = {{ Js::from($insumos) }}
  </script>
  <script defer src="{{ asset('assets/js/alpine.js') }}"></script>
  <script defer>
    document.addEventListener('alpine:init', () => {
      Alpine.data('insumos', () => ({
        insumos: [],
        insumo: null,
        cantidad: null,
        get submitable() {
          return this.insumo !== null && this.cantidad !== null
        },
        addInsumo() {
          this.insumos.push({ id: this.insumo, cantidad: this.cantidad })
          this.insumo = null
          this.cantidad = null
        },
        removeInsumo(id) {
          const index = this.insumos.findIndex(ins => ins.id === id)
          this.insumos.splice(index, 1)
        },
        datosInsumo(id) {
          return window.insumos.find(ins => ins.id === id)
        },
      }))

      Alpine.data('select', (options) => ({
        options,
        selected: null,
        open: false,
        search: '',
        display: '',
        get searched() {
          return this.options.filter(({ title, id }) => {
            let included = true
            let inInsumos = false

            if (this.insumos !== undefined && this.insumos.length !== 0) {
              inInsumos = Boolean(
                this.insumos.find(insumo => insumo.id === id)
              )
            }

            if (this.search !== '') {
              const search = this.search.toLowerCase()
              included = title.toLowerCase().includes(search)
            }

            return !inInsumos && included && id !== this.selected
          })
        },
        get display() {
          if (this.selected === null) return 'Seleccionar...'

          const current = this.options.find(
            option => option.id === this.selected
          )

          const { title, subtitle } = current
          return `${title} - ${subtitle}`
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
          const { id } = this.$el.dataset
          this.selected = Number(id)
          this.open = false
        }
      }))
    })

    document.querySelector('#add-insumo').addEventListener('submit', (event) => {
      event.preventDefault()
      window.dispatchEvent(new CustomEvent('addinsumo'))
    })
  </script>
@endsection
