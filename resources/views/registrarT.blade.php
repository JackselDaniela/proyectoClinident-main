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
    @include('components.flash-alerts')
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Procedimientos de la Clínica</h4>
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
        <div  class="col-sm-12 col-md-12 text-right m-b-20">
            <button id="openModal" class="btn btn-primary float-right btn-rounded btn-press btn-add" ><i class="fa fa-plus"></i> Añadir</button>
        </div>
        
        <div class="row filter-row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            
                            <input class="form-control" placeholder="Código de Tratamiento" type="text">
                            <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
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
                                <th>Cod.</th>
                                <th style="min-width:200px;">Nombre Procedimiento</th>
                                <th>Costo</th>
                                <th>Fecha añadido</th>
                                <th>Especialidad</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tratamiento as $tratamiento)
                            <tr>
                                <td>{{$tratamiento->codigo_tratamiento;}}</td>
                                <td>
                                     <img width="28" height="28" src="assets/img/tratamiento.png" class="rounded-circle" alt="">  <i class="fa-regular fa-notes-medical"></i><h2>{{$tratamiento->nom_tratamiento;}}</h2>
                                </td>
                                <td>{{$tratamiento->costo_tratamiento;}}</td>
                                <td>{{$tratamiento->fecha_añadido;}}</td>
                                <td>{{$tratamiento->especialidad->especialidad;}}</td>
                                
                                <td >
                                    <a href="{{route('editarT',['id'=>$tratamiento->id])}}">
                                        <li class="fa fa-edit" style="width: 2rem; color:#9B59B6;"></li>
                                    </a>
                                    <a id="formularioEliminar" href="{{route('eliminarT',['id'=>$tratamiento->id]) }}">
                                        <li class="fa fa-trash-o" style="width: 2rem; color:red;"></li>
                                    </a>
                                    
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

        <!-- MODAL -->
        <div id="modal-tratamiento" class="modal-container" style="padding: 5rem 0">
            <div class="modal-content">
                    <div class="content">
                        <div class="row" style="padding: 2rem 0; justify-content:center">
                            <ul style="display: flex; ;">
                                
                                    <div class="col-lg-7 offset-lg-2" style="font-size: 2rem;!important">
                                        <h4 class="page-title"> Añadir Nuevo Tratamiento</h4> 
                                    </div>
                               
                                    <div class="col-lg-2 offset-lg-2" style="margin-right:-2rem">
                                        <button class="close" id="close-btn" data-dismiss="modal">&times;</button>  
                                    </div>
                            </ul>
                        </div>
                        <div class="row">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <form action="{{route('RegistrarT.store')}}" method="POST">
                                    @csrf
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
                                                <input class="form-control" maxlength="30" name="nom_tratamiento" id="nom_tratamiento" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Costo<span class="text-danger">*</span>
                                                    @if($errors->first('costo_tratamiento'))
                                                    <p class="text-danger">
                                                        {{$errors->first('costo_tratamiento')}}
                                                    </p>
                                                    @endif
                                                </label>
                                                <input class="form-control" maxlength="10" name="costo_tratamiento" id="costo_tratamiento" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Código 
                                                    @if($errors->first('codigo_tratamiento'))
                                                    <p class="text-danger">
                                                        {{$errors->first('codigo_tratamiento')}}
                                                    </p>
                                                    @endif
                                                    <span class="text-danger">*</span></label>
                                                <input class="form-control" maxlength="10" value="000" name="codigo_tratamiento" id="codigo_tratamiento" type="text" required>
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
                                                
                                                    <input class="form-control datetimepicker"  name="fecha_añadido" id="fecha_añadido" type="datetime" required>
                                                
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
                                                    @foreach ($especialidad as $especialidad)
                                                    <option value="{{$especialidad->id}}"> {{$especialidad->especialidad}} </option>
                                                    @endforeach

                                                </select>
                                               
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <button type="submit" class="btn btn-primary submit-btn">Añadir Tratamiento</button>
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
                
                
    
            </div>
        </div>
        <!-- /MODAL -->

@endsection

@section('js-externo')
    <script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modalTratameintos.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
        <script>
        Swal.fire({
            title: "Eliminado!",
            text: "El archivo fue eliminado correctamente.",
            icon: "success" 
        });
        </script>
    @endif

    <script>
        document.querySelectorAll('#formularioEliminar').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Previene la acción por defecto del enlace
                Swal.fire({
                    title: "¿Está seguro de eliminar este archivo?",
                    text: "¡Se eliminará permanentemente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#6f42c1",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, eliminar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.href; // Redirige a la URL si el usuario confirma
                    }
                });
            });
        });
    </script>
@endsection
