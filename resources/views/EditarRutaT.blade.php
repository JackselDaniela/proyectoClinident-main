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
                                
                                <input class="form-control" value="Paciente:  {{$paciente_diagnostico->paciente->persona->nombre.' '.$paciente_diagnostico->paciente->persona->apellido}}" type="text" disabled>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                 
                                <input class="form-control" value="Presupuesto: {{$paciente_diagnostico->paciente->persona->nombre.' '.$paciente_diagnostico->paciente->persona->apellido}}" type="text" disabled>
                                
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
                                <th>Tratamiento</th>
                                <th>Costo</th>
                                <th>Estatus</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <form action="{{route('RutaT.update',['id'=>$paciente_diagnostico->id])}} "method="POST">
                                @csrf
                                @method('PUT')
                            <tr>
                                <td>{{$paciente_diagnostico->pieza->nom_pieza}}</td>
                                <td>{{$paciente_diagnostico->diagnostico->diagnostico}}</td>
                                <td>{{$paciente_diagnostico->registrar_tratamiento->costo_tratamiento}}</td>
                                <td >
                                   {{-- @dd($paciente_diagnostico); --}}
                                   
                                    <input type="radio"  @if ($paciente_diagnostico->estatus_tratamientos_id==1)
                                    checked
                                    @endif 
                                    value="1" name="estatus" >
                                    <span>Pieza en Espera</span>
                                    <br>
                                    <input type="radio"  
                                    @if ($paciente_diagnostico->estatus_tratamientos_id==2)
                                    checked
                                    @endif
                                    value="2" name="estatus" ><span>Pieza en Proceso</span><br>
                                    <input type="radio"  
                                    @if ($paciente_diagnostico->estatus_tratamientos_id==3)
                                    checked
                                    @endif
                                    value="3" name="estatus" ><span>Pieza Trabajada</span><br>
                                </td>
                               <td>
                                <button type="submit" class="btn btn-primary  btn-rounded btn-press btn-add" maxlength="100" style="list-style: none; color: aliceblue;">Actualizar</button>


                               </td>
                            </tr>
                            
                            
                         
                             </form>
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
