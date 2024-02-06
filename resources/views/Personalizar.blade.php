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
                <li class="breadcrumb-item"><a href="{{asset('GestionU')}}"> Personalizar</a></li>
            </ol>
        </nav>
        <section>
            <h4 class="page-title text-center" style="padding-bottom: 4rem">Personalizar</h4>
            
            <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="{{route('Personalizar.store')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Nombre de Website</label>
                        <div class="col-lg-9">
                            <input name="nom_website" class="form-control" placeholder="Indique" type="text" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Logo Con Transparencia</label>
                        <div class="col-lg-7">
                            <input class="form-control" name="logo" type="file">
                            <span class="form-text text-muted">Tamaño de imagen recomendada es 40px x 40px</span>
                        </div>
                        <div class="col-lg-2">
                            <div class="img-thumbnail float-right"><img src="assets/img/logo-dark.png" alt="" width="40" height="40"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Favicon</label>
                        <div class="col-lg-7">
                            <input class="form-control" name="favicon" type="file">
                             <span class="form-text text-muted">Tamaño de imagen recomendada es 40px x 40px</span>
                        </div>
                        <div class="col-lg-2">
                            <div class="settings-image img-thumbnail float-right"><img src="assets/img/favicon.ico" class="img-fluid" width="16" height="16" alt=""></div>
                        </div>
                    </div>
                    

                    
                    <div class="m-t-20 text-center">
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
