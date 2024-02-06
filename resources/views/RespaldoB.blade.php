@extends('layouts.plantilla')

@section('title')
<title>Clinident / Mantenimiento</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Respaldo y Restauracion Base de Datos</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></button>
                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Imprimir</button>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Configuracion</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Index')}}"> Mantenimiento</a></li>
                <li class="breadcrumb-item"><a href="{{asset('RespaldoB')}}"> Respaldo y Restauracion BD</a></li>
            </ol>
        </nav>
        <section>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div  class="col-sm-12 col-lg-12 text-right m-b-20" style="padding-bottom: 2rem">
                                <button title="Generar pdf" id="print" class="btn btn-primary float-right btn-rounded btn-press btn-add"><i class="fa fa-upload"></i> Importar</button>
                                <button   class="btn btn-primary float-right btn-rounded btn-press btn-add"><i class="fa fa-plus"></i> <i class="fa fa-database"></i>  Crear Respaldo</button>
                           
                            </div>
                            
                            <div class="table-responsive">
                                <table class="datatable table table-stripped ">
                                <thead>
                                    <tr>
                                        
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Archivo</th>
                                        <th>Acción</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>8:03 AM</td>
                                        <td>2011/04/25</td>
                                        <td>Respaldo Bd 001</td>
                                        <td><span class="custom-badge status-blue">Creada</span> </td>
                                        <td><a href="#"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>8:40 AM</td>
                                        <td>2013/04/25</td>
                                        <td>Restauracion Bd 10/12/2018</td>
                                        <td><span class="custom-badge status-green">Importada</span> </td>
                                        <td><a href="#"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                        
                                    </tr>
                                    
                              
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
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
