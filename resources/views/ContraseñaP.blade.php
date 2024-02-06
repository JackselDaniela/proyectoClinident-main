@extends('layouts.plantilla3')

@section('title')
<title>Clinident / Cambio Contraseña</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Cambiar Contraseña</h4>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Perfil')}}">Cambiar Contraseña</a></li>
            </ol>
        </nav>

        <section>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h4 class="page-title text-center" style="padding-bottom: 4rem">Cambiar Contraseña</h4>
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Vieja Contraseña</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nueva Contraseña</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirmar Contraseña</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button type="button" class="btn btn-primary submit-btn">Actualizar Contraseña</button>
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
