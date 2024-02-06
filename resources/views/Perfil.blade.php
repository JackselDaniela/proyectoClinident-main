@extends('layouts.plantilla')

@section('title')
<title>Clinident / Mi Perfil</title>
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
            <div class="col-sm-7 col-6">
                <h4 class="page-title">Perfil</h4>
            </div>

            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="{{asset('EditarP')}}" class="btn btn-primary btn-rounded"><i class="fa fa-edit"></i> Editar Perfil</a>
            </div>
            
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Perfil')}}">Perfil</a></li>
            </ol>
        </nav>
        
        <section>
            @foreach ($doctor as $doctor)
                
           
          <form action="{{route('Perfil.show', $doctor->id)}}" method="post">
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{$doctor->nombre.' '.$doctor->apellido;}}</h3>
                                            <small class="text-muted">{{$doctor->especialidad;}}</small>
                                            <div class="staff-id">ID : {{$doctor->doc_identidad;}}</div>
                                            <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Enviar Mensaje</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Telefono</span>
                                                <span class="text"><a href="#">{{$doctor->telefono;}}4</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"><a href="#">{{$doctor->correo;}}</a></span>
                                            </li>
                                            <li>
                                                <span class="title">Cumpleaños</span>
                                                <span class="text"> {{$doctor->fecha_nacimiento;}} </span>
                                            </li>
                                            <li>
                                                <span class="title">Direccion</span>
                                                <span class="text"> {{$doctor->direccion.', '.$doctor->ciudad.' '.$doctor->municipio.' '.$doctor->estado;}} </span>
                                            </li>
                                            <li>
                                                <span class="title">Genero:</span>
                                                <span class="text"> {{$doctor->genero;}} </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            
            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                    <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Estudios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Especializacion</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-justified-tab3" data-toggle="tab">Pacientes</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="solid-justified-tab1">
                        <div class="card-box profile-header">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="profile-info-left">
                                                        <h3 class="user-name m-t-0 mb-0">Odontologo General</h3>
                                                        <small class="text-muted">UNERG</small>
                                                        <div class="staff-id">10 años Experiencia</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="personal-info">
                                                        
                                                        <li>
                                                            <span class="title">Pregrado</span>
                                                            <span class="text"><a href="#">{{$doctor->universidad;}} </a></span>
                                                        </li>
                                                        <li>
                                                            <span class="title">Congreso</span>
                                                            <span class="text">{{$doctor->destacado;}} </span>
                                                        </li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                                          
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="solid-justified-tab2">
                        Odontología General - Emergencias
                    </div>
                    <div class="tab-pane" id="solid-justified-tab3">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <div class="card-block">
                                    <h4 class="card-title">Pacientes Activos</h4>
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Paciente</th>
                                                    <th>Doc. Identidad</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Juan Perez</td>
                                                    <td>000001</td>
                                                    <td>def@somemail.com</td>
                                                </tr>
                                                <tr >
                                                    <td>Petra Sinforosa</td>
                                                    <td>000002</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr >
                                                    <td>Juana de Arco</td>
                                                    <td>0000003</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>      
            </div>

        </form>
        
            @endforeach
        </section>
       
    </div>
    
</div>
@endsection

@section('js-externo')
<script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('/assets/js/modal.js') }}"></script>
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>
@endsection
