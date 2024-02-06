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
                <li class="breadcrumb-item"><a href="{{asset('Correo')}}"> Correo</a></li>
            </ol>
        </nav>
        
        <section>
            <h4 class="page-title text-center" style="padding-bottom: 4rem">Correo</h4>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('Correo.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="correo_protocolo" id="phpMail" value="PHP Mail" required>
                                <label class="form-check-label"  for="phpmail">PHP Mail</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="correo_protocolo" id="smtpMail" value="SMTP" required>
                                <label class="form-check-label" for="smtpmail">SMTP</label>
                            </div>
                        </div>
                        <h4 class="page-title">PHP Email Configuracion</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email Emisor Direccion</label>
                                    <input class="form-control" name="correo_emisor" type="email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email Emisor Nombre</label>
                                    <input class="form-control" name="nombre_emisor" type="text" required>
                                </div>
                            </div>
                        </div>
                        <h4 class="page-title m-t-30">SMTP Email Configuracion</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP HOST</label>
                                    <input class="form-control" name="host_protocolo" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP User</label>
                                    <input class="form-control" name="protocolo_usuario" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP Configuracion</label>
                                    <input class="form-control" name="protocolo_config" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP PORT</label>
                                    <input class="form-control" name="protocolo_puerto" type="text" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP Dominio Autenticacion</label>
                                    <input class="form-control" name="protocolo_dominio" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SMTP Seguridad</label>
                                    <select class="select" name="smtp_config" required>
                                        <option>Nada</option>
                                        <option>SSL</option>
                                        <option>TLS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 m-t-20 text-center">
                            <button type="submit" class="btn btn-primary submit-btn">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        
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
