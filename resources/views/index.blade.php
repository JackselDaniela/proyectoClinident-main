@extends('layouts.plantilla')

@section('title')
    <title> Clinident </title>
@endsection
@section('css-externo')
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
                                                                                  <script src="assets/js/html5shiv.min.js"></script>
                                                                                  <script src="assets/js/respond.min.js"></script>
                                                                                 <![endif]-->
@endsection
@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <h3 class="text-center" style="padding: 1rem 0 "> ¡Tus Procesos Odontológicos Automatizados de Manera Segura!
            </h3>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $totalDoctores }}</h3>
                            <span class="widget-title1">Doctores</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $totalPaciente }}</h3>
                            <span class="widget-title2">Pacientes</i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-medkit"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> {{ $totalInsumos }} </h3>
                            <span class="widget-title3">Insumos</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $totalCitas }}</h3>
                            <span class="widget-title4">Citas Pendientes</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Total Pacientes</h4>
                                <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> </span>
                            </div>
                            <canvas id="linegraph">

                            </canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Citas por Meses</h4>
                                <div class="float-right">
                                    {{-- <ul class="chat-user-total">
                                    <li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
                                    <li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
                                </ul> --}}
                                </div>
                            </div>
                            <canvas id="bargraph"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js-externo')
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script>
        const pacientes = @json($pacientes);
        const citas = @json($citas);
        const months = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]

        new Chart(document.getElementById('bargraph').getContext('2d'), {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Citas',
                    backgroundColor: 'rgba(0, 158, 251, 0.5)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: citas.map(p => p.total)
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                }
            }
        });

        new Chart(document.getElementById('linegraph').getContext('2d'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Pacientes',
                    backgroundColor: 'rgba(0, 120, 55, 0.5)',
                    borderColor: 'rgba(0, 158, 192, 1)',
                    borderWidth: 1,
                    data: pacientes.map(p => p.total)
                }],
            },
            options: {
                responsive: true,
                legend: {
                    display: false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                }
            }
        });
    </script>
@endsection
