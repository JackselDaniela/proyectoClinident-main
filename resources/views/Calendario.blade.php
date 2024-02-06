@extends('layouts.plantilla')

@section('title')
<title>Clinident / Agendar Cita</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-4">
                <h4 class="page-title">Calendario</h4>
            </div>

            
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tratamiento</a></li>
                <li class="breadcrumb-item"><a href="#">Registrar</a></li>
            </ol>
        </nav>
        
        
           
                        <div class="row" style="justify-content: center">
                            <div class="col-md-12">
                                <div class="contenedor">
                                    <div  id='calendar-container'>
                                        <div class="col-lg-12" style="justify-content:center; position: relative; margin:1rem 0rem">
                                            <div class="input-group col-sm-10">
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text">
    
                                                </div>
                                                <div class="col-sm-2">
                                                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
    
                                                </div>
                                            </div>

                                        </div>
                                        <div id='calendar'></div>
                                    </div>

                                </div>
                                 
                            </div>
                        </div>
{{--                
                        <div class="modal-body">
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Paciente</label>
                                            <input class='form-control' type='number' max='99000000' name='paciente' required/>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Doctor</label>
                                            <input class='form-control' type='number' max='99000000' name='doctor' required/> </div></div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Descripcion</label>
                                            <textarea class='form-control' type='text' name='descripcion_cita' required></textarea>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Hora Desde</label>
                                            <input class='form-control' type='time' name='desde' required/>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Hora Hasta</label>
                                            <input class='form-control' type='time' name='hasta' required/>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label>Tipo de Cita</label>
                                            <select class='select form-control' name='tipo_cita' required>
                                                <option value='primera_vez'>Primera Vez</option>
                                                <option value='continuacion'>Continuacion de Tratamiento</option>
                                                <option value='paciente'>Control/Paciente regular</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary submit-btn save-event">Create event</button>
                            </form>
                        </div> --}}
    </div>
</div>
@endsection

@section('js-externo')

    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/calendario.js') }}"></script>
    <script src="{{ asset('/assets/js/index.global.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/translater.js') }}"></script>

    
@endsection

