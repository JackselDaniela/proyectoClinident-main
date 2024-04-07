@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Honorarios</title>
@endsection

@php
    $settings = app('settings')->last();
@endphp

@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Ganancias</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    @if (isset($doctor))
                        <div class="btn-group btn-group-sm">
                            <form method="GET" action="{{ route('gananciasPDF') }}" target="_blank">
                                <input type="hidden" name="doctor_cedula" value="{{ $doctor->persona->doc_identidad }}">
                                <input type="hidden" name="date_init" value="{{ $date_init }}">
                                <input type="hidden" name="date_fin" value="{{ $date_fin }}">
                                <button type="submit" class="btn btn-white">
                                    <img src="{{ asset('assets/img/pdf.png') }}" style="width: 30px">
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Honorarios</a></li>
                    <li class="breadcrumb-item"><a href="#">Ganancias</a></li>
                </ol>
            </nav>

            <section>
                <form action="{{ route('GananciasA.mostrar') }}" method="POST">
                    @csrf
                    <div class="row my-2">
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    Desde
                                    <div class="input-group">
                                        <input class="form-control" id="date-init" name="date_init"
                                            placeholder="Fecha Inicio" type="date"
                                            value="{{ $date_init ?? date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    Hasta
                                    <div class="input-group">
                                        <input class="form-control" id="date-fin" name="date_fin" placeholder="Fecha Fin"
                                            type="date" value="{{ $date_fin ?? date('Y-m-d') }}"
                                            min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    Doctor
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Doc. Identidad" name="doctor_cedula"
                                            type="text"
                                            value="{{ isset($doctor) ? $doctor->persona->doc_identidad : '' }}" required>
                                        @error('doctor_cedula')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-1 col-md-1">
                            <button class="btn btn-primary mt-4" type="submit" style="border-radius: .5rem">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4 class="payslip-title">Ganancias Acumuladas</h4>
                            <div class="row">
                                <div class="col-sm-2 m-b-20">
                                    <img src="assets/img/logoc.png" class="inv-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li>Clinident</li>
                                        <li>3864 Quiet Valley Lane,</li>
                                        <li>Sherman Oaks, CA, 91403</li>
                                    </ul>
                                </div>
                                <div class="col-sm-8 m-b-20">
                                    <div class="invoice-details w-100">
                                        @if (isset($trabajos))
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Paciente</th>
                                                        <th>Tratamiento</th>
                                                        <th>Costo</th>
                                                        <th>Fecha</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($trabajos as $trabajo)
                                                        <tr>
                                                            <td>{{ $trabajo->paciente->persona->nombre . '  ' . $trabajo->paciente->persona->apellido }}
                                                            </td>
                                                            <td>{{ $trabajo->registrar_tratamientos_id->nom_tratamiento }}
                                                            </td>
                                                            <td>{{ $trabajo->registrar_tratamientos_id->costo_tratamiento }}
                                                            </td>
                                                            <td>{{ date('d-m-Y', strtotime($trabajo->updated_at)) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 m-b-20">
                                    @if (isset($doctor))
                                        <ul class="list-unstyled">
                                            <li>
                                                <h5 class="mb-0"><strong>{{ $doctor->persona->nombre }}
                                                        {{ $doctor->persona->apellido }}</strong></h5>
                                            </li>
                                            <li><span>Odontologo General</span></li>
                                            <li>Employee ID: {{ $doctor->id }}</li>
                                            <li>Trabaja desde: {{ date('d/m/Y', strtotime($doctor->created_at)) }}</li>
                                        </ul>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <h4 class="m-b-10"><strong>Acumulado Clinica</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Acumulado Clinica</strong> <span
                                                            class="float-right">${{ $total_hospital ?? 0 }}</span></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <h4 class="m-b-10"><strong>Acumulado Doctor</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Sueldo neto</strong> <span
                                                            class="float-right">${{ $total_doctor ?? 0 }}</span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12">

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
    <script>
        const inputDateInit = document.getElementById('date-init')
        const inputDateFin = document.getElementById('date-fin')
        inputDateInit.onchange = (e) => {
            const dateInit = new Date(e.target.value)
            const dateMin = new Date(dateInit.setDate(dateInit.getDate() + 1))

            const monthMin = Number(dateMin.getUTCMonth() + 1) > 10 ? dateMin.getUTCMonth() + 1 : "0" + String(dateMin
                .getUTCMonth() + 1)
            const dayMin = Number(dateMin.getUTCDate()) > 10 ? dateMin.getUTCDate() : "0" + dateMin.getUTCDate()
            const yearMin = dateMin.getUTCFullYear()

            inputDateFin.min = yearMin + "-" + monthMin + "-" + dayMin
        }
    </script>
@endsection
