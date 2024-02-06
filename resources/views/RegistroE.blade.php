@extends('layouts.plantilla')

@section('title')
<title>Clinident / Gestion de Pacientes </title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="main-wrapper" >
    <div class="page-wrapper" id="inicio" >
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3" style="padding-left: 1rem!important;">
                    <h4 class="page-title"  id="inicio-pacientes">Pacientes Registrados</h4>
                </div>
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></button>
                        <button class="btn btn-white"><i class="fa fa-print fa-lg"></i></button>
                    </div>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Gestion de Paciente</a></li>
                    <li class="breadcrumb-item"><a href="#">Registro Expediente</a></li>
                    
                </ol>
            </nav>
            <section>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table table-responsive" style="padding-left: .8rem;!important; padding-right: .5rem;!important;">
                            <div  class="col-sm-12 col-lg-12 text-right m-b-20">
                                
                                <div  class="col-sm-12 col-md-12 text-right m-b-20">
                                    <button class="btn btn-primary float-right btn-rounded btn-press btn-add"><a href="{{route('AnadirP')}}" style="color: aliceblue; margin-bottom:2rem"><i class="fa fa-user-plus"></i> Añadir</a></button>
                                </div>
                           
                            </div>
                          
                                <table id="Example" class="table table-border table-striped custom-table  mb-0">
                                <thead>
                                    <tr>
                                        <th>Doc. Identidad</th>
                                        <th>Nombre Completo</th>
                                        <th>Edad</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th >Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                              
                                    @foreach ($paciente as $paciente)
                                        @php
                                            $persona = $paciente->persona;
                                            
                                        @endphp
                                        <tr>
                                        <td>{{$persona->doc_identidad;}}</td>
                                        <td> {{$persona->nombre.' '.$persona->apellido;}}</a></td>
                                        <td>edad</td>
                                        <td>{{$persona->dato_ubicacion->direccion;}}</td>
                                        <td>{{$persona->dato_ubicacion->telefono;}}</td>
                                        <td>{{$persona->dato_ubicacion->correo;}}</td>
                                        <td>
                                            <a title="Añadir Tratamiento" href="{{route('EditarP.buscar',['id'=>$paciente->id])}}"><li class="fa fa-plus" style="width: 1rem"></li></a>
                                            <a title="Ruta de Tratamiento" href="{{route('RutaT.buscar',['id'=>$paciente->id])}}"><li class="fa fa-list-ol" style="width: 1rem"></li></a>
                                            <a title="Editar Paciente" href="{{route('EditarP.edit',['id'=>$paciente->id])}}"><li class="fa fa-edit" style="width: 1rem"></li></a>
                                            <a title="Eliminar Paciente" href="{{route('eliminarE',['id'=>$paciente->id]) }}"><li class="fa fa-trash-o" style="width: 1rem"></li></a>
                                        
                                        </td>
                                        </tr>
                                    @endforeach 
                                <img src="" alt="">
                                </tbody>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </section>
         
            
           
        </div>
    </div>
    <div id="delete_patient" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Patient?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
   

</div>

@endsection

@section('js-externo')
    <script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
@endsection
