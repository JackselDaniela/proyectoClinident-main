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
        
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title" id="inicio">Ayuda</h4>
            </div>

        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Ayuda')}}">Ayuda</a></li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/tratamient.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h2 class="blog-title"><a href="blog-details.html">Tratamientos</a></h2>
                        <p>Registra los tratamientos que realiza la clinica al paciente con sus costos</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Ver como funciona</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/agendarcita.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Agendar Cita</a></h3>
                        <p>Agenda la cita de los pacientes y lleva un control de todas tus citas</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Ver como funciona</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/gestionpaciente.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Gestión de Paciente (Parte 1)</a></h3>
                        <p>Registra a los pacientes generando su expediente clinico</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Ver como funciona</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/gestionpaciente.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Gestión de Paciente (Parte 2)</a></h3>
                        <p>Lleva el control del historial clinico con la ruta de tratamiento por paciente</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Ver como funciona</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/Insumos.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Gestión de Insumos</a></h3>
                        <p>Registra los insumos, una nueva carga de producto y actualización de stock</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i>Ver como funciona</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="blog grid-blog">
                    <div class="blog-image">
                        <a href="blog-details.html"><img class="img-fluid" src="assets/img/Honorarios.png" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h3 class="blog-title"><a href="blog-details.html">Calculadora de Honorarios</i></a></h3>
                        <p>Visualización de las ganancias del doctor y la clinica porcentajes</p>
                        <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Ver como funciona</a>
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
