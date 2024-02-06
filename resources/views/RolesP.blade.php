@extends('layouts.plantilla2')

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
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Configuración</a></li>
                <li class="breadcrumb-item"><a href="{{asset('GestionU')}}">Gestion de Usuario</a></li>
                <li class="breadcrumb-item"><a href="{{asset('RolesP')}}"> Roles y Permisos</a></li>
            </ol>
        </nav>
        <section>
            
            <h4 class="page-title text-center" style="padding-bottom: 4rem">Roles y Permisos</h4>
            
        
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
                    <a href="add-role.html" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Agregar Rol</a>
                    <div class="roles-menu">
                        <ul>
                            <li class="active">
                                <a href="javascript:void(0);">Doctor</a>
                                {{-- <span class="role-action">
                                    <a href="edit-role.html">
                                        <span class="action-circle large">
                                            <i class="material-icons">editar</i>
                                        </span>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#delete_role">
                                        <span class="action-circle large delete-btn">
                                            <i class="material-icons">borrar</i>
                                        </span>
                                    </a>
                                </span> --}}
                            </li>
                            
                            <li><a href="#">Paciente</a></li>
                            <li><a href="#">Secretaria</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
                    <h6 class="card-title m-b-20">Modulo de Acceso</h6>
                    <div class="m-b-30">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Agendar Citas
                                <div class="material-switch float-right">
                                    <input id="staff_module" type="checkbox">
                                    <label for="staff_module" class="badge-success"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                               Gestion de Pacientes
                                <div class="material-switch float-right">
                                    <input id="holidays_module" type="checkbox">
                                    <label for="holidays_module" class="badge-success"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Gestion de Insumos
                                <div class="material-switch float-right">
                                    <input id="leave_module" type="checkbox">
                                    <label for="leave_module" class="badge-success"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Honorarios
                                <div class="material-switch float-right">
                                    <input id="events_module" type="checkbox">
                                    <label for="events_module" class="badge-success"></label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                Configuracion
                                <div class="material-switch float-right">
                                    <input id="chat_module" type="checkbox">
                                    <label for="chat_module" class="badge-success"></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Modulo de Permisos</th>
                                    <th class="text-center">Lectura</th>
                                    <th class="text-center">Edicion</th>
                                    <th class="text-center">Crear</th>
                                    <th class="text-center">Borrar</th>
                                    <th class="text-center">Importar</th>
                                    <th class="text-center">Exportar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Agendar Cita</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gestion de Pacientes</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gestion de Insumos</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Honorarios</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" checked="">
                                    </td>
                                </tr>
                            </tbody>
                            


                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center m-t-20">
                    <button type="button" class="btn btn-primary submit-btn">Guardar</button>
                </div>
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
