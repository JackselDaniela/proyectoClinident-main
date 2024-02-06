@extends('layouts.plantilla')

@section('title')
<title>Clinident / Registrar Tratamiento</title>
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
    <script>
        function cerrar(){
        alert('Esta seguro de que desea cerrar?');
    }
    </script>
@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Procedimientos de la Clinica</h4>
            </div>
            

        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Servicios</a></li>
                <li class="breadcrumb-item"><a href="#">Registrar</a></li>
            </ol>
        </nav>
        <!-- BOTON MODAL -->
        
     <!--/BOTON MODAL -->
     <section >
       
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                       
                        <tbody>
                            
                                <div class="content">
                                    <div class="row" style="padding: 2rem 0; justify-content:center">
                                        <ul style="display: flex; ;">
                                            
                                                <div class="col-lg-7 offset-lg-2" style="font-size: 2rem;!important">
                                                    <h4 class="page-title"> Procedimiento: {{$tratamiento->nom_tratamiento}} </h4> 
                                                </div>
                                           
                                               
                                        </ul>
                                    </div>
                                    <div class="row">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <form action="{{route('RegistrarT.update',['id'=>$tratamiento->id])}}" method="POST">

                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Nombre Tratamiento<span class="text-danger">*</span>
                                                                @if($errors->first('nom_tratamiento'))
                                                                <p class="text-danger">
                                                                    {{$errors->first('nom_tratamiento')}}
                                                                </p>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" maxlength="30"  value='{{$tratamiento->nom_tratamiento}}' name="nom_tratamiento" id="nom_tratamiento" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Costo
                                                                @if($errors->first('costo_tratamiento'))
                                                                <p class="text-danger">
                                                                    {{$errors->first('costo_tratamiento')}}
                                                                </p>
                                                                @endif
                                                            </label>
                                                            <input class="form-control" maxlength="10" value='{{$tratamiento->costo_tratamiento}}' name="costo_tratamiento" id="costo_tratamiento" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Codigo 
                                                                @if($errors->first('codigo_tratamiento'))
                                                                <p class="text-danger">
                                                                    {{$errors->first('codigo_tratamiento')}}
                                                                </p>
                                                                @endif
                                                                <span class="text-danger">*</span></label>
                                                            <input class="form-control" maxlength="10" value="000" value='{{$tratamiento->codigo_tratamiento}}' name="codigo_tratamiento" id="codigo_tratamiento" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Fecha 
                                                                @if($errors->first('fecha_añadido'))
                                                                <p class="text-danger">
                                                                    {{$errors->first('fecha_añadido')}}
                                                                </p>
                                                                @endif
                                                                <span class="text-danger">*</span></label>
                                                            
                                                                <input class="form-control datetimepicker" value='{{$tratamiento->fecha_añadido}}'  name="fecha_añadido" id="fecha_añadido" type="datetime" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Especialidad
                                                                @if($errors->first('especialidad_tratamiento'))
                                                                <p class="text-danger">
                                                                    {{$errors->first('especialidad_tratamiento')}}
                                                                </p>
                                                                @endif
                                                            </label>
                                                            <select class="select" name="especialidad" id="">
                                                                <option value="{{$tratamiento->especialidads_id}}" > {{$tratamiento->especialidad->especialidad}} </option>
                                                                @foreach ($especialidad as $especialidad)
                                                                <option value="{{$especialidad->id}}" > {{$especialidad->especialidad}} </option>
                                                                @endforeach
            
                                                            </select>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                
                                                <button type="submit" class="btn btn-primary submit-btn" style="margin-left:25%">Actualizar Procedimiento</button>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    <br>
                                </div>
                                <div class="notification-box">
                                    <div class="msg-sidebar notifications msg-noti">
                                        <div class="topnav-dropdown-header">
                                            <span>Messages</span>
                                        </div>
                                        <div class="drop-scroll msg-list-scroll" id="msg_list">
                                            <ul class="list-box">
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">R</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Richard Miles </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item new-message">
                                                            <div class="list-left">
                                                                <span class="avatar">J</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">John Doe</span>
                                                                <span class="message-time">1 Aug</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">T</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Tarah Shropshire </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">M</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Mike Litorus</span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">C</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Catherine Manseau </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">D</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Domenic Houston </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">B</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Buster Wigton </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">R</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Rolland Webber </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">C</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author"> Claire Mapes </span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">M</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Melita Faucher</span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">J</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Jeffery Lalor</span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">L</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Loren Gatlin</span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="chat.html">
                                                        <div class="list-item">
                                                            <div class="list-left">
                                                                <span class="avatar">T</span>
                                                            </div>
                                                            <div class="list-body">
                                                                <span class="message-author">Tarah Shropshire</span>
                                                                <span class="message-time">12:28 AM</span>
                                                                <div class="clearfix"></div>
                                                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="topnav-dropdown-footer">
                                            <a href="chat.html">Ver todos los mendajes</a>
                                        </div>
                                    </div>
                               
                            
                            
                
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     </section>

    </div>
</div>
<div id="delete_employee" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Employee?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

      

@endsection

@section('js-externo')
<script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('/assets/js/modalTratameintos.js') }}"></script>
<script src="{{ asset('/assets/js/popper.min.js') }}"></script>


@endsection
