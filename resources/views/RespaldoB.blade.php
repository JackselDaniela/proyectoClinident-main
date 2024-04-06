@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Mantenimiento</title>
@endsection
@section('css-externo')
@endsection
@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Respaldo y Restauracion Base de Datos</h4>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Configuracion</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}"> Mantenimiento</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('RespaldoB') }}"> Respaldo y Restauracion BD</a></li>
                </ol>
            </nav>
            <section>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="card-block">
                                <div class="col-sm-12 col-lg-12 text-right m-b-20" style="padding-bottom: 2rem">
                                    <a href="{{ route('respaldo.store') }}"
                                        class="btn btn-primary float-right btn-rounded btn-press btn-add">
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-database"></i>
                                        Crear Respaldo
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table class="datatable table table-stripped ">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Archivo</th>
                                                <th>Acción</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($respaldos as $respaldo)
                                                <tr>
                                                    <td>
                                                        {{ $respaldo['fecha'] }}
                                                    </td>
                                                    <td>{{ $respaldo['nombre'] . '.sql' }}</td>
                                                    <td>
                                                        <a href="{{ route('respaldo.download', $respaldo['nombre']) }}">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
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
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('js/tabla.js') }}"></script>
@endsection
