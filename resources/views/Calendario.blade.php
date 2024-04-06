@extends('layouts.plantilla')

@php
    $hasRole = auth()
        ->user()
        ->hasRole(['Admin', 'Secretaria', 'Doctor']);
@endphp

@section('title')
    <title>Clinident / Agendar Cita</title>
@endsection
@section('css-externo')
@endsection
@section('contenido')
    <div class="page-wrapper">
        <div class="content" style="--fc-button-active-bg-color: #3a8dec;--fc-button-bg-color: #7c01be">
            <div class="row">
                <div class="col-sm-8 col-4">
                    <h4 class="page-title">Calendario</h4>
                </div>


            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tratamiento</a></li>
                    <li class="breadcrumb-item"><a href="#">Registrar</a></li>
                </ol>
            </nav>

            <div id="calendar">

            </div>

        </div>

    </div>

    @if ($hasRole)
        <div class="modal" id="agendarCita">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h3 class="h3"> Añadir Cita</h3>
                        <button class="close" id="close-btn" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action='{{ route('Calendario.store') }}' method="POST">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @csrf
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Doc. Id Paciente</label>
                                        <input title="Ingrese el documento de identidad del paciente" class='form-control'
                                            type='number' max='99000000' placeholder="Ejm: 12000000" name='paciente'
                                            required />
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Doc. Id Doctor</label>
                                        <input title="Ingrese el documento de identidad del Doctor" class='form-control'
                                            type='number' max='99000000' placeholder="Ejm: 12000000" name='doctor'
                                            required />
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Descripcion</label>
                                        <textarea class='form-control' type='text' name='descripcion' required></textarea>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Hora Desde</label>
                                        <input class='form-control' type='time' name='inicio' required />
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Hora Hasta</label>
                                        <input class='form-control' type='time' name='fin' required />
                                        <input class='form-control' type='date' name='fecha' id="fecha" hidden />
                                    </div>
                                </div>

                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Tipo de Cita</label>
                                        <select class='select form-control' name='tipo_cita' required>
                                            @foreach ($tipo_consulta as $tipo)
                                                <option value="{{ $tipo->id }}"> {{ $tipo->tipo_consulta }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary submit-btn save-event"
                                id="guardarCita">Agendar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="editarCita">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="h3"> Editar Cita</h3>
                        <button class="close" id="close-btn" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action='{{ url('/') }}' method="POST" id="formEditar">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Descripcion</label>
                                        <textarea class='form-control' type='text' name='descripcion' id="descripcion_" required></textarea>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Hora Desde</label>
                                        <input class='form-control' type='time' name='inicio' id="inicio_" required />
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Hora Hasta</label>
                                        <input class='form-control' type='time' name='fin' id="fin_"
                                            required />
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Fecha</label>
                                        <input class='form-control' type='date' name='fecha' id="fecha_"
                                            required />
                                    </div>
                                </div>

                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Tipo de Cita</label>
                                        <select class='select form-control' name='tipo_cita' id="tipo_consulta" required>
                                            @foreach ($tipo_consulta as $tipo)
                                                <option value="{{ $tipo->id }}"> {{ $tipo->tipo_consulta }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary submit-btn save-event"
                                id="actualizarCita">Actualizar</button>
                            <button type="submit" class="btn btn-danger submit-btn save-event"
                                form="formEliminar">Eliminar</button>
                        </form>
                        <form action='{{ url('/') }}' method="POST" id="formEliminar">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        window.evento = {{ Js::from($evento) }};
    </script>
@endsection

@section('js-externo')
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/calendario.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/index.global.js') }}"></script>
    <script src="{{ asset('/assets/js/translater.js') }}"></script>
@endsection
