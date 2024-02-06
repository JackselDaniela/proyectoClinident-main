@extends('layouts.plantilla')

@section('title')
<title>Clinident / Gestion de Insumos</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Nueva Carga de Insumos</h4>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Gestion de Insumos</a></li>
                <li class="breadcrumb-item"><a href="{{asset('NuevaC')}}"> Insumos</a></li>
            </ol>
        </nav>
        <section>
            <div class="row filter-row">
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control datetimepicker" placeholder="Fecha" type="datetime">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" placeholder="Codigo Carga" type="text">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" placeholder="Responsable" type="text">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped " style="overflow: hidden;!important">
                                <thead>
                                    <tr>
                                        <th>Codigo Carga</th>
                                        <th>Fecha</th>
                                        <th>Responsable</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-decoration: underline!important; color:blue!important" ><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px!important"> <a href="#">0001-Nueva Carga</a></td>
                                        <td>25/09/2023</td>
                                        <td>Administrador</td>
                                        
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
    
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Insumos Disponibles</h4>
            </div>
        </div>
        <section>
            <div class="row filter-row">
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control datetimepicker" placeholder="Fecha vencimiento" type="datetime">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" placeholder="Codigo Insumo" type="text">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" placeholder="Nombre" type="text">
                                <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" style="border-radius: .8rem"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped " style="overflow: hidden;!important">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Presentación</th>
                                        <th>Función</th>
                                        <th>Fecha Elab.</th>
                                        <th>Fecha Venc.</th>
                                        <th>Serial</th>
                                        <th>Existencia</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>GQ-001</td>
                                        <td style="text-decoration: underline!important; color:blue!important" ><img src="{{asset('assets/img/carrito/guantes quirurgicos.jpg')}}" style="width: 50px!important;border-radius: 50%"> <a href="#">Guantes Quirurgicos</a></td>
                                        <td>Proteccion e Higiene</td>
                                        <td>Docena</td>
                                        <td>Inhibir la transmision de agentes patógenos</td>
                                        <td>23/02/2022</td>
                                        <td>23/02/2026</td>
                                        <td>9876t3ghjk--l9383</td>
                                        <td><span class="custom-badge status-red">1 Docena</span></td>
                                        
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
