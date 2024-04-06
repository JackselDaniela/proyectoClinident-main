@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Citas Confirmadas</title>
@endsection
@section('css-externo')
@endsection
@php
    $today = \Carbon\Carbon::now();
@endphp

@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3" style="padding-left: 1rem!important;">
                    <h4 class="page-title">Citas Confirmadas</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white"><img src="{{ asset('assets/img/pdf.png') }}"
                                style="width: 30px"></button>
                    </div>
                </div>

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Agendar Cita</a></li>
                    <li class="breadcrumb-item"><a href="#">Citas Confirmadas</a></li>
                </ol>
            </nav>
            <section>
                <div class="row filter-row">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">

                                    <input class="form-control datetimepicker" placeholder="Fecha de Cita" type="datetime">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">

                                    <input class="form-control" placeholder="Codigo de cita" type="text">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Codigo de Cita</th>
                                        <th>Doc. Identidad </th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Doctor</th>
                                        <th>Especialidad</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ $cita->id }}</td>
                                            <td>{{ $cita->paciente->persona->doc_identidad }}</td>
                                            <td>{{ $cita->paciente->persona->nombre . ' ' . $cita->paciente->persona->apellido }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($cita->paciente->persona->fecha_nacimiento)) }}
                                            </td>
                                            <td>{{ $cita->doctor->persona->nombre . ' ' . $cita->doctor->persona->apellido }}
                                            </td>
                                            <td>{{ $cita->doctor->especialidad->especialidad }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cita->created_at)->format('d m Y') }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($cita->inicio)->format('i:h a') . ' - ' . \Carbon\Carbon::parse($cita->fin)->format('i:h a') }}
                                            </td>
                                            <td>
                                                <li class="fa fa-edit" style="width: 2rem"></li>
                                                <li class="fa fa-trash-o" style="width: 2rem"></li>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>


        </div>
        <div id="delete_appointment" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure want to delete this Appointment?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-externo')
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
@endsection
