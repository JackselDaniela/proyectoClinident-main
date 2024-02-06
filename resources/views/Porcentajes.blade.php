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
                <li class="breadcrumb-item"><a href="{{asset('Porcentajes')}}"> Ajuste de Porcentajes</a></li>
            </ol>
        </nav>
        <section>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('Porcentajes.store')}}" method="POST"> 
                        @csrf
                        <h3 class="page-title text-center" style="padding-bottom: 4rem">Ajuste de Porcentajes</h3>
                        <div class="row">
    
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tratamiento </label>
                                    <select class="form-control" id="" name="nom_tratamiento">
                                        <option value="Extraccion"> Extracción</option>
                                        <option value="Restauracion"> Restauración</option>
                                        <option value="Protesis"> Protesis</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Porcentaje de la clinica (%)</label>
                                    <input type="text" class="form-control" name="porcentaje_clinica">
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
