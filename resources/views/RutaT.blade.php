@extends('layouts.plantilla')

@section('title')
<title>Clinident / Gestion de Pacientes </title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-10 col-10">
                <h4 class="page-title">Ruta de Tratamiento</h4>
            </div>
            <div class="col-sm-2 col-2">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></button>
                    <button class="btn btn-white"><i class="fa fa-print fa-lg"></i></button>
                </div>
            </div>
        </div>
        <a href="{{route('RegistroE')}}"><button style="font-size: 1rem; margin:1rem" class="btn btn-primary float-right btn-rounded btn-press btn-add" >Listado de Pacientes</button></a>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Gestion Paciente</a></li>
                <li class="breadcrumb-item"><a href="{{asset('RegistroE')}}">Listado de Pacientes</a></li>
                <li class="breadcrumb-item"><a href="#">Ruta de Tratamiento</a></li>
            </ol>
            
        </nav>
        
       

        <section>
            <div class="row filter-row">
                
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                
                                <input class="form-control" value="Paciente: {{$paciente->persona->nombre.' '.$paciente->persona->apellido}}" type="text" disabled>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                 
                                <input class="form-control" value="Presupuesto: {{$presupuestoT}} $" type="text" disabled>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                
        </div>
        
        <div class="row">
            <div class="col-lg-12" >
                <div class="table-responsive"style="padding-left:1rem;!important; padding-right:1rem;!important; overflow-x:hidden;!important">
                    <table class="table table-striped custom-table mb-0" >
                        <thead>
                            <tr>
                                <th># Pieza</th>
                                <th>Diagnostico</th>
                                <th>Procedimiento</th>
                                <th>Costo</th>
                                <th>Estatus</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($paciente_diagnostico as $paciente_diagnostico)
                            
                            
                            <tr>
                                <td>{{$paciente_diagnostico->pieza->nom_pieza}}</td>
                                <td>{{$paciente_diagnostico->diagnostico->diagnostico}}</td>
                                <td>{{$paciente_diagnostico->registrar_tratamiento->nom_tratamiento}}</td>
                                <td>{{$paciente_diagnostico->registrar_tratamiento->costo_tratamiento}}</td>
                                <td >
                                  
                                    <span
                                    @if ($paciente_diagnostico->estatus_tratamientos_id==1||$paciente_diagnostico->estatus=='Pieza en Espera')
                                    class="  custom-badge status-red">
                                    @endif
                                    @if ($paciente_diagnostico->estatus_tratamientos_id==2||$paciente_diagnostico->estatus=='Pieza en Proceso')
                                    class="  custom-badge status-blue">
                                    @endif
                                    @if ($paciente_diagnostico->estatus_tratamientos_id==3||$paciente_diagnostico->estatus=='Pieza Trabajada')
                                    class="  custom-badge status-green">
                                    @endif
                                     
                                    {{$paciente_diagnostico->estatus_tratamiento->estatus}}</span> 
                                  
                                   
                                </td>
                                <td class="text-right">
                                    <a title="Editar Estado Tratamiento" href="{{route('RutaT.editar',['id'=>$paciente_diagnostico->id])}}"><li class="fa fa-edit" style="width: 1rem"></li></a>
                                      
                                    <a title="Eliminar Tratamiento" href="#"><li class="fa fa-trash-o" style="width: 1rem"></li></a>
                                        
                                        
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                          
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>

        </section>
        
    </div>
</div>
<div id="delete_department" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Department?</h3>
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
