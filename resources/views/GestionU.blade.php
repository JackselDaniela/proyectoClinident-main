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
                <li class="breadcrumb-item"><a href="{{asset('GestionU')}}"> Contacto</a></li>
            </ol>
        </nav>
        <section>
            <h4 class="page-title text-center" style="padding-bottom: 4rem">Contacto</h4>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('GestionU.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label >Nombre de Empresa<span class="text-danger">*</span></label>
                                    <input class="form-control" name="nom_empresa" placeholder="Indique" type="text" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Administrador</label>
                                    <input class="form-control"  placeholder="Juan Perez" type="text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control" name="fax" placeholder="Indique" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Website Url</label>
                                    <input class="form-control" name="website" value="https://www.example.com" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input class="form-control " name="estado" placeholder="Indique" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Municipio</label>
                                    <input class="form-control " name="municipio" placeholder="Indique" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input class="form-control" name="ciudad" placeholder="Indique" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Parroquia</label>
                                    <input class="form-control" name="parroquia" placeholder="Indique" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input class="form-control" name="direccion" value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403" type="text" required>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Numero de Telefono</label>
                                    <input class="form-control" name="telefono" placeholder="Indique" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="form-control" name="correo" placeholder="example@example.com" type="email" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button type="submit" class="btn btn-primary submit-btn">Guardar</button>
                            </div>
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
