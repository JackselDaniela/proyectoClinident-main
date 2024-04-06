@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Gestion de Usuario</title>
@endsection
@section('css-externo')
@endsection

@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Configuración de la Clinica</h4>
                </div>

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Configuración</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('GestionU') }}">Gestion de Usuario</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('RolesP') }}"> Roles y Permisos</a></li>
                    @if (isset($rolSeleccionado))
                        <li class="breadcrumb-item"><a href="{{ route('Roles.show', $rolSeleccionado) }}">Rol -
                                {{ $rolSeleccionado->name }}</a>
                        </li>
                    @endif
                </ol>
            </nav>
            <section class="mb-5">

                <h4 class="page-title text-center">Roles y Permisos</h4>
                @if (isset($rolSeleccionado))
                    <p class="font-weight-bold h4 text-center">({{ $rolSeleccionado->name }})</p>
                @endif


                <div class="mt-5 row">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                        <a href="{{ route('Roles.create') }}" class="btn btn-primary btn-block"><i
                                class="fa fa-plus"></i>Agregar Rol</a>
                        <div class="roles-menu">
                            <ul>
                                @if (isset($rolSeleccionado))
                                    <li class="active">
                                        <a href="#">{{ $rolSeleccionado->name }}</a>
                                    </li>
                                @endif
                                @foreach ($roles as $rol)
                                    <li><a href="{{ route('Roles.show', $rol) }}">{{ $rol->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if (isset($rolSeleccionado) && isset($permisos))
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9" style="max-height: 20rem; overflow-y: auto">
                            <h6 class="card-title m-b-20">Modulo de Acceso</h6>
                            <div class="m-b-30">
                                <form action="{{ route('Roles.update', $rolSeleccionado) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <ul class="list-group">
                                        @php
                                            $ids = collect($rolSeleccionado->permissions)
                                                ->map(function ($permiso) {
                                                    return $permiso->id;
                                                })
                                                ->all();

                                            $result = [];
                                            // Modifica los nombres de los permisos
                                            foreach ($permisos as $permiso) {
                                                // Guarda el id y nombre del permiso
                                                $id = $permiso->id;
                                                $permiso = $permiso->name;
                                                // Divide el nombre -> ["nombre", "accion"]
                                                $parts = explode('.', $permiso);
                                                // Reemplaza todos los "-" por espacios
                                                // "procedimientos-odontológicos" -> procedimientos odontologicos
                                                $firstPart = str_replace('-', ' ', $parts[0]);
                                                // Coloca en mayúscula todas las iniciales
                                                $firstPartCapitalized = ucwords(strtolower($firstPart));

                                                // Añade la acción del módulo (si tiene acciones, sino se omite)
                                                if (count($parts) > 1) {
                                                    $action = $parts[1];
                                                    $action = ucwords($action);
                                                    $result[] = [$firstPartCapitalized . " ( $action )", $id];
                                                }

                                                continue;
                                            }
                                        @endphp
                                        @foreach ($result as $permiso)
                                            <li class="list-group-item">
                                                {{ $permiso[0] }}
                                                <div class="material-switch float-right">
                                                    <input id="{{ $permiso[1] }}" name="permisos[]"
                                                        value="{{ $permiso[1] }}" type="checkbox"
                                                        {{ in_array($permiso[1], $ids) ? 'checked' : '' }}>
                                                    <label for="{{ $permiso[1] }}" class="badge-success"></label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="row">
                                        <div class="col-sm-12 text-center m-t-20">
                                            <button type="submit" class="btn btn-primary submit-btn">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            </section>


        </div>
    </div>
    <div id="delete_role" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Role?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-externo')
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
@endsection
