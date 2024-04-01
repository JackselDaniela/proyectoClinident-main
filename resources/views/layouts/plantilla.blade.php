@php
Auth::user();
$user = Auth::user();
$persona = $user->persona;


@endphp
<!DOCTYPE html>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logoc.ico')}}">
    @yield('title')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @yield('css-externo')
</head>
<body>
<div class="main-wrapper">
<nav class="header">
			<div class="header-left">
				<a href="{{asset('Index')}}" class="logo">
					<img src="{{asset('assets/img/logoc.png')}}" width="35" height="35" alt=""> <span>Clinident</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item" style="color: aliceblue; padding-top:1rem;">
                    @php
                    use Illuminate\Support\Carbon;
                        Carbon::setLocale('es_VE');
                        setLocale(LC_TIME, 'es_VE')
                    @endphp
                    {{now()->shortLocaleDayOfWeek }}


                    {{ now()->format('d-m-Y')}}

                </li>
                 <li class="nav-item dropdown d-none d-sm-block">
                    <x-menu-notificaciones />
                </li>
                
                
                <li class="nav-item dropdown d-none d-sm-block">
                    <a href="{{asset('Ayuda')}}"  class="nav-link"><i class="fa fa-question-circle"></i></a>
                </li> 
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>
                            {{$persona->nombre}}
                        </span>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{asset('Perfil')}}">Mi Perfil</a>
                            <a class="dropdown-item" href="{{asset('EditarP')}}">Editar Perfil</a>
                            <form action="{{route('login.cerrarSesion')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" type="submit">Cerrar Sesion</button>

                            </form>
                            
                        </div>
                    </a>
					
                </li>
            </ul>
           
        </nav>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href=""><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
                        </li>
                        
                        <li class="submenu">
							<a href="#"><i class="fa fa-hospital-o"></i> <span> Tratamiento</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="">Registrar</a></li>
							</ul>
						</li>

                        <li class="submenu">
							<a href="#"><i class="fa fa-calendar"></i> <span> Agendar Citas </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="">Calendario de Citas</a></li>
								<li><a href="citasConfirmadas.html">Citas Confirmadas</a></li>
							</ul>
						</li>
            <li class="submenu">
							<a href="#">
                <i class="fa fa-wheelchair"></i>
                <span>Gestión de Paciente</span>
                <span class="menu-arrow"></span>
              </a>
							<ul style="display: none;">
								<li><a href="listadoPacientes.html">Registro Expediente</a></li>
								<li><a href="hclinico.html">Historia Clinica</a></li>
								<li><a href="rutaTratamiento.html">Ruta de Tratamiento</a></li>
							</ul>
						</li>
            <li class="submenu">
							<a href="#"><i class="fa fa-cube"></i> <span> Gestión de Insumos</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="nuevoI.html">Nuevo Insumo</a></li>
								<li><a href="nuevaC.html">Nueva Carga</a></li>
							</ul>
						</li>
            <li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Honorarios</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="ganancias.html">Ganancias</a></li>
								<li><a href="tRealizados.html">Tratamientos Realizados</a></li>
							</ul>
						</li>
                        <li class="submenu">
							<a href="#"><i class="fa fa-cog"></i> <span> Configuración</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="configuracion.html">Gestion de Usuario</a></li>
								
                                <li class="submenu">
                                    <a href="#"></i> <span> Mantenimiento</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="bitacora.html">Bitacora</a></li>
                                        <li><a href="blank-page.html">Respaldo BD</a></li>
                                    </ul>
                                </li>
							</ul>
						</li>



                    </ul>
                </div>
            </div>
           
        </div>
</nav>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{asset('Index')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
                </li>
                
                <li class="submenu">
                    <a href="#"><i class="fa fa-plus-square"></i> <span> Procedimientos Od.</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('RegistrarT')}}">Registrar</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-calendar"></i> <span> Agendar Citas </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('Calendario')}}">Calendario de Citas</a></li>
                        <li><a href="{{asset('CitasC')}}">Citas Confirmadas</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Gestión de Paciente</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('RegistroE')}}">Registro Expediente</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                      <i class="fa fa-medkit"></i>
                      <span>Gestión de Insumos</span>
                      <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                          <a href="{{ route('insumos.index') }}">Listado de Insumos</a>
                        </li>
                        <li>
                          <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
                        </li>
                        <li>
                          <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
                        </li>
                        <li>
                          <a href="{{ route('operaciones.index') }}">Historial de Inventario</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-user-md"></i> <span> Doctores</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('Doctores')}}">Registrar Doctor</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-money"></i> <span> Honorarios</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('GananciasA')}}">Ganancias</a></li>
                        <li><a href="{{asset('TratamientoR')}}">Tratamientos Realizados</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-cog"></i> <span> Configuración</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{asset('GestionU')}}">Gestion de Usuario</a></li>
                        
                        <li class="submenu">
                            <a href="#"></i> <span> Mantenimiento</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{asset('Bitacora')}}">Bitácora</a></li>
                                <li><a href="{{asset('RespaldoB')}}">Respaldo BD</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                



            </ul>
        </div>
    </div>
</div>
@yield('contenido')  

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

</body>
<footer>
   <style>
     footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            background-color: #7c01be;
            color: white;
            text-align: center;
            z-index: 1039;
            height: 30px;
             box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .imgFooter{
            float: right;
            width: 0.8cm;
            height: 0.8cm;
            padding-top: 1px;
        }
        
    </style> 
 <p>
    <img class="imgFooter" src="{{asset('assets/img/logou.png')}}" alt=""
    <b>Derechos Reservados - UPTA Aragua</b>
</p>

    
<div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    
@yield('js-externo')
</footer>
</html>
