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
        <h3 class="text-center" style="padding: 1rem 0 "> ¡Tus Procesos Odontológicos Automatizados de Manera Segura!</h3>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>98</h3>
                        <span class="widget-title1">Doctores</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>1072</h3>
                        <span class="widget-title2">Pacientes</i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg3"><i class="fa fa-medkit"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>72</h3>
                        <span class="widget-title3">Insumos</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget">
                    <span class="dash-widget-bg4"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                    <div class="dash-widget-info text-right">
                        <h3>618</h3>
                        <span class="widget-title4">Tratamientos</span>
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
                            <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% más alto que el mes pasado</span>
                        </div>	
                        <canvas id="linegraph"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-title">
                            <h4>Insumos más utilizados</h4>
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
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Actualización de perfil</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="chat-profile-img">
                            <div class="edit-profile-img">
                                <img src="assets/img/doctor-thumb-04.jpg" alt="">
                                <span class="change-img">Cambiar Imagen</span>
                            </div>
                            <h3 class="user-name m-t-10 mb-0">Cristian López</h3>
                            <small class="text-muted">Ortodoncista</small>
                            <a href="edit-profile.html" class="btn btn-primary edit-btn"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class="chat-profile-info">
                            <ul class="user-det-list">
                                <li>
                                    <span>Usuario:</span>
                                    <span class="float-right text-muted">@cristian_22</span>
                                </li>
                                <li>
                                    <span>Email:</span>
                                    <span class="float-right text-muted">cristianlop@gmail.com</span>
                                </li>
                                <li>
                                    <span>Télefono:</span>
                                    <span class="float-right text-muted"> 770-889-6484</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Próximas Citas</h4> <a href="appointments.html" class="btn btn-primary float-right">Ver todas</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="d-none">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Timing</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">A</a>
                                            <h2><a href="profile.html">Anastasia Galaviz</a></h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Cita con</h5>
                                            <p>Dr. Cristina Groves</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Hora</h5>
                                            <p>8.00 PM</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.html" class="btn btn-outline-primary take-btn">Comenzar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz</a></h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Cita con</h5>
                                            <p>Dr. Cristina Groves</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Hora</h5>
                                            <p>7.00 PM</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.html" class="btn btn-outline-primary take-btn">Comenzar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">C</a>
                                            <h2><a href="profile.html">Carlos Galaviz </h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Cita con</h5>
                                            <p>Dr. Cristina Groves</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Hora</h5>
                                            <p>7.00 PM</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.html" class="btn btn-outline-primary take-btn">Comenzar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">A</a>
                                            <h2><a href="profile.html">Ana Galaviz </a></h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Cita con</h5>
                                            <p>Dr. Cristina Groves</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Hora</h5>
                                            <p>7.00 PM</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.html" class="btn btn-outline-primary take-btn">Comenzar</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz</h2>
                                        </td>                 
                                        <td>
                                            <h5 class="time-title p-0">Cita con</h5>
                                            <p>Dr. Cristina Groves</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Hora</h5>
                                            <p>7.00 PM</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="appointments.html" class="btn btn-outline-primary take-btn">Comenzar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
<script src="assets/js/chart.js"></script>


@endsection
