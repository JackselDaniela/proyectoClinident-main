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
                    <h4 class="page-title">Bitacora</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white"><img src="{{ asset('assets/img/pdf.png') }}"
                                style="width: 30px"></button>
                        <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Imprimir</button>
                    </div>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Configuracion</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}"> Mantenimiento</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('Bitacora') }}"> Bitacora</a></li>
                </ol>
            </nav>
            <section>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="card-block">

                                <div class="table-responsive">
                                    <table class="datatable table table-stripped ">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Hora</th>
                                                <th>Fecha</th>
                                                <th>Archivo</th>
                                                <th>Acción</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bitacora as $registro)
                                                <tr>
                                                    <td>{{ $registro->usuario->persona->nombre . ' ' . $registro->usuario->persona->apellido }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('h:i a') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('Y/m/d') }}
                                                    </td>
                                                    <td>{{ $registro->action }}</td>
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
