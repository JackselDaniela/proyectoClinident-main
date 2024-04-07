@props(['user'])

@php
    $showAlternative = ['GestionU', 'Personalizar', 'RolesP', 'Porcentajes', 'Roles.create', 'Roles.show'];
    $userRoles = $user->getRoleNames();
    $hasRoles = function (array $roles) use ($userRoles) {
        return (bool) array_intersect($roles, $userRoles->toArray());
    };
@endphp

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                {{-- Configuración - GestionU --}}
                @if (in_array(Route::currentRouteName(), $showAlternative) && $hasRoles(['Admin']))
                    <li>
                        <a href="{{ asset('Index') }}"><i class="fa fa-home back-icon"></i> <span>Inicio</span></a>
                    </li>
                    <li class="menu-title">Gestion de Usuario</li>
                    <li>
                        <a href="{{ asset('Personalizar') }}"><i class="fa fa-picture-o"></i>
                            <span>Personalizar</span></a>
                    </li>
                    <li>
                        <a href="{{ asset('RolesP') }}"><i class="fa fa-key"></i> <span>Roles y Permisos</span></a>
                    </li>

                    <li>
                        <a href="{{ asset('Porcentajes') }}"><i class="fa fa-money"></i> <span> Ajuste de Porcentajes
                            </span></a>
                    </li>

                    {{-- Resto de vistas --}}
                @else
                    <li class="active">
                        <a href="{{ asset('Index') }}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a>
                    </li>

                    @if ($hasRoles(['Admin', 'Secretaria']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-plus-square"></i> <span> Procedimientos Od.</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ asset('RegistrarT') }}">Registrar</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria', 'Doctor', 'Paciente']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-calendar"></i> <span> Agendar Citas </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ asset('Calendario') }}">Calendario de Citas</a></li>
                                <li><a href="{{ asset('CitasC') }}">Citas Confirmadas</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria', 'Doctor']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Gestión de Paciente</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ asset('RegistroE') }}">Registro Expediente</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria', 'Doctor']))
                        <li class="submenu">
                            <a href="#">
                                <i class="fa fa-medkit"></i>
                                <span>Gestión de Insumos</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                @if ($hasRoles(['Admin', 'Secretaria']))
                                    <li>
                                        <a href="{{ route('insumos.index') }}">Listado de Insumos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('reservas.index') }}">Reservas de Equipos</a>
                                </li>
                                <li>
                                    <a href="{{ route('operaciones.index') }}">Historial de Inventario</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria', 'Doctor']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user-md"></i> <span> Doctores</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ asset('Doctores') }}">Registrar Doctor</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria', 'Doctor']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-money"></i> <span> Honorarios</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{ asset('GananciasA') }}">Ganancias</a></li>
                                <li><a href="{{ asset('TratamientoR') }}">Tratamientos Realizados</a></li>
                            </ul>
                        </li>
                    @endif

                    @if ($hasRoles(['Admin', 'Secretaria']))
                        <li class="submenu">
                            <a href="#"><i class="fa fa-cog"></i> <span> Configuración</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                @if ($hasRoles(['Admin']))
                                    <li><a href="{{ asset('GestionU') }}">Gestion de Usuario</a></li>
                                @endif

                                <li class="submenu">
                                    <a href="#"></i> <span> Mantenimiento</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="{{ asset('Bitacora') }}">Bitácora</a></li>
                                        @if ($hasRoles(['Admin']))
                                            <li><a href="{{ asset('RespaldoB') }}">Respaldo BD</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
