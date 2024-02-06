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
                <li class="breadcrumb-item"><a href="{{asset('Localizacion')}}"> Localización</a></li>
            </ol>
        </nav>
        <section>
            <h3 class="page-title text-center" style="padding-bottom: 4rem">Localización</h3>
            <div class="row">
               
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('Localizacion.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>País <span class="text-danger">*</span></label>
                                    <input class="form-control" name="pais"  placeholder="Indique el País" type="text" required>
                                   
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Moneda de pago <span class="text-danger">*</span></label>
                                    <input class="form-control" readonly name="moneda" value="$" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Zona Horaria <span class="text-danger">*</span></label>
                                    <select name="zona_horaria" class="select" required>
                                        <option>(UTC +5:30) Antarctica/Palmer</option>
                                        <option>(UTC +10:30) Australia</option>
                                        <option>(UTC +6) Asia</option>
                                        <option>(	UTC -4) America del Sur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Lenguaje default <span class="text-danger">*</span></label>
                                    <select class="select" name="lenguaje" required>
                                        <option>English</option>
                                        <option selected="selected">Español</option>
                                        <option >François</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Codigo de pago <span class="text-danger">*</span></label>
                                    <select class="select" name="codigo_pago" required>
                                        <option selected="selected">USD</option>
                                        <option>Pound</option>
                                        <option>EURO</option>
                                        <option>Ringgit</option>
                                    </select>
                                </div>
                            </div>
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
