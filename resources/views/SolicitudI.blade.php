@extends('layouts.plantilla')

@section('title')
<title>Clinident/ Gestion de Insumos </title>
@endsection
@section('css-externo')
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/css/estilo.css">
<script src="assets/js/appNI.js" async></script>
    
@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Insumos</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <button id="openModal" class="btn btn-primary float-right btn-rounded btn-press btn-add" ><i class="fa fa-plus"></i> Añadir Nuevo Insumo</button>
                
            </div>
        </div>
        <section class="contenedor">
            <!-- Contenedor de elementos -->
            <div class="contenedor-items" style="padding-bottom:2rem">
                <div class="item">
                    <span class="titulo-item">Aceite Mineral</span>
                    <img src="assets/img/carrito/aceite mineral.jpg" alt="" class="img-item">
                    <span class="precio-item">1</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Adhesivo Bondy</span>
                    <img src="assets/img/carrito/adhesivo bondy.jpg" alt="" class="img-item">
                    <span class="precio-item">12</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Agua Oxigenada</span>
                    <img src="assets/img/carrito/agua_oxigenada.jpg" alt="" class="img-item">
                    <span class="precio-item">1</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Algodon</span>
                    <img src="assets/img/carrito/algodon.jpg" alt="" class="img-item">
                    <span class="precio-item">1</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Lidocaína</span>
                    <img src="assets/img/carrito/anestesia-dental-lidocaina.jpg" alt="" class="img-item">
                    <span class="precio-item">12</span>
                    <button class="boton-item"> Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Banda Metalica</span>
                    <img src="assets/img/carrito/banda metalica.jpg" alt="" class="img-item">
                    <span class="precio-item">12</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Coltosol</span>
                    <img src="assets/img/carrito/coltosol.jpg" alt="" class="img-item">
                    <span class="precio-item">1</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Cono Guatapercha</span>
                    <img src="assets/img/carrito/cono gutapercha.jpeg" alt="" class="img-item">
                    <span class="precio-item">1</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">Fresas Varias</span>
                    <img src="assets/img/carrito/fresas.jpg" alt="" class="img-item">
                    <span class="precio-item">6</span>
                    <button class="boton-item">Listar</button>
                </div>
                <div class="item">
                    <span class="titulo-item">G. Quirurgicos</span>
                    <img src="assets/img/carrito/guantes quirurgicos.jpg" alt="" class="img-item">
                    <span class="precio-item">6</span>
                    <button class="boton-item">Listar</button>
                </div>
                <br>
            </div>
            <!-- Carrito de Compras -->
            <div class="carrito" id="carrito">
                <div class="header-carrito">
                    <h2>Lista de Insumos</h2>
                </div>
    
                <div class="carrito-items">
                    <!-- 
                    <div class="carrito-item">
                        <img src="img/boxengasse.png" width="80px" alt="">
                        <div class="carrito-item-detalles">
                            <span class="carrito-item-titulo">Box Engasse</span>
                            <div class="selector-cantidad">
                                <i class="fa-solid fa-minus restar-cantidad"></i>
                                <input type="text" value="1" class="carrito-item-cantidad" disabled>
                                <i class="fa-solid fa-plus sumar-cantidad"></i>
                            </div>
                            <span class="carrito-item-precio">$15.000,00</span>
                        </div>
                       <span class="btn-eliminar">
                            <i class="fa-solid fa-trash"></i>
                       </span>
                    </div>
                    <div class="carrito-item">
                        <img src="img/skinglam.png" width="80px" alt="">
                        <div class="carrito-item-detalles">
                            <span class="carrito-item-titulo">Skin Glam</span>
                            <div class="selector-cantidad">
                                <i class="fa-solid fa-minus restar-cantidad"></i>
                                <input type="text" value="3" class="carrito-item-cantidad" disabled>
                                <i class="fa-solid fa-plus sumar-cantidad"></i>
                            </div>
                            <span class="carrito-item-precio">18.000,00</span>
                        </div>
                       <button class="btn-eliminar">
                            <i class="fa-solid fa-trash"></i>
                       </button>
                    </div>
                     -->
                </div>
                <div class="carrito-total">
                    <div class="fila">
                        <strong>Cantidad</strong>
                        <span class="carrito-precio-total">
                            und120.000,00
                        </span>
                    </div>
                    <button class="btn-pagar">Solicitar <i class="fa-solid fa-bag-shopping"></i> </button>
                    <br>
                    <button class="btn-pagar">Registrar <i class="fa-solid fa-edit"></i> </button>
                </div>
            </div>
        
            
            
        </section>
        <!-- modal añadir -->
        <div id="modal-tratamiento" class="modal-container" style="margin-left: -7rem!important; margin-top:3rem; padding-top:3rem; margin-bottom:3rem; padding-bottom:3rem;">
            <div class="modal-content">
                    <div class="content">
                        <div class="row" style="display: flex">
                            <div class="col-lg-8 offset-lg-2">
                                <h4 class="page-title">Nuevo Insumo</h4>
                            </div>
                            <div class="col-lg-1 offset-lg-2" style="margin-left:-7rem; padding-left:-2rem; margin-right:2rem; margin-top:1rem;" >
                                <button type="button" class="close" id="close-btn" data-dismiss="modal">&times;</button>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <form action="{{route('SolicitudI.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nombre <span class="text-danger">*</span>
                                                    @if($errors->first('nom_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('nom_insumo')}}
                                                    </p>
                                                    @endif</label>
                                                <input class="form-control" maxlength="30" name="nom_insumo" id="nom_insumo" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Codigo <span class="text-danger">*</span>
                                                    @if($errors->first('cod_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('cod_insumo')}}
                                                    </p>
                                                    @endif
                                                </label>
                                                <input class="form-control" name="cod_insumo" id="cod_insumo" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <label>Presentación</label>
                                                <select class="select" name="presentacion_insumo" required>
                                                    <option value="unidad">Unidad</option>
                                                    <option value="docena">Docena</option>
                                                    <option value="litro">Litro</option>
                                                    <option value="mililitro">Mililitros</option>
                                                    <option value="gramos">Gramos</option>
                                                    <option value="kilogramos">Kilogramos</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha Elaboración<span class="text-danger">*</span>
                                                    @if($errors->first('elaboracion_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('elaboracion_insumo')}}
                                                    </p>
                                                    @endif</label>
                                                <input class="form-control"  name="elaboracion_insumo" id="elaboracion_insumo" type="date" required>                                                                                                                           
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Fecha Vencimiento
                                                    @if($errors->first('vencimiento_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('vencimiento_insumo')}}
                                                    </p>
                                                    @endif
                                                </label>
                                                <input class="form-control" name="vencimiento_insumo" id="vencimiento_insumo" type="date" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Serial <span class="text-danger">*</span>
                                                    @if($errors->first('serial_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('serial_insumo')}}
                                                    </p>
                                                    @endif</label>
                                                <input type="text" name="serial_insumo" maxlength="10" id="serial_insumo" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Descripción <span class="text-danger">*</span>
                                                    @if($errors->first('descripcion_insumo'))
                                                    <p class="text-danger">
                                                        {{$errors->first('descripcion_insumo')}}
                                                    </p>
                                                    @endif</label>
                                                
                                                    <input class="form-control" maxlength="100" name="descripcion_insumo" id="descripcion_insumo" type="text" >
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label>Función</label>
                                                <select class="select" name="funcion_insumo" id="funcion_insumo" required>
                                                    <option>Endodoncia</option>
                                                    <option>Ortodoncia</option>
                                                    <option>Tecnico Dental</option>
                                                    <option>Odontologia General</option>
                                                    <option>Maxilo-Facial</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <div class="form-group ">
                                                <label>Avatar</label>
                                                <div class="profile-upload">
                                                    <div class="upload-img">
                                                        <img alt="" src="assets/img/user.jpg">
                                                    </div>
                                                    <div class="upload-input">
                                                        <input type="file" name="foto_insumo" id="foto_insumo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary submit-btn" style="margin-bottom: 2rem">Añadir </button>
                                    
                                </form>
                            </div>
                        </div>
                           
                        
                    </div>
                
                
    
            </div>
            </div>

            <!--/ modal añadir -->

        <div class="row">
            <div class="col-sm-12">
                <div class="see-all">
                    <a class="see-all-btn" href="javascript:void(0);">Cargar mas Productos</a>
                </div>
            </div>
            </div>
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
                <a href="chat.html">See all messages</a>
            </div>
        </div>
    </div>
</div>
<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Doctor?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-externo')
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/modal.js"></script>
@endsection
