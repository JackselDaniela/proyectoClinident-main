@extends('layouts.plantilla')

@section('title')
<title>Clinident / Gestion de Pacientes</title>
@endsection
@section('css-externo')
<link rel="stylesheet" href="{{asset('assets/css/dentadura.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/odontograma.css')}}">

@endsection
@section('contenido')
<div class="page-wrapper" style="padding: 0 0.5rem; padding-top:4rem; height:auto!important; font-size:1.4rem">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Procedimiento en Pieza Nº {{$nom_pieza}} </h4>
            </div>

            

        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Gestion de Pacientes</a></li>
                <li class="breadcrumb-item"><a href="{{route('RegistroE')}}">Registro Expediente</a></li>
                <li class="breadcrumb-item"><a href="{{asset('AnadirT')}}">Añadir Tratamiento</a></li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-sm-5 col-md-5">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group"> 
                            <input class="form-control" style="padding: 2rem;font-size:1.4rem"  placeholder="Ex:25976000" type="text" disabled>
                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- value="Paciente : {{$paciente->persona->nombre." ".$paciente->persona->apellido}}" --}}
            <div class="col-sm-5 col-md-5">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input class="form-control" style="padding: 2rem;font-size:1.4rem" placeholder="Dr.Andrea Donato" value="Dr.Andrea Donato" type="text" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group"> 
                            <input class="form-control" type="hidden" style="padding: 2rem;font-size:1.4rem"  placeholder="Ex:25976000" type="text" disabled>
                            
                        </div>
                    </div>
                </div>
            </div>
           
            {{-- value=" {{$paciente->persona->id}}" --}}
            
            
            <section  style="justify-content: center; margin-left:20%;margin-right:20%">
                <div class="modal-content " style="justify-content: center">
                    <div class="card-box">
                        <h4 class="card-title" style="padding-bottom: 2rem">Diagnostico y Tratamiento de la Pieza</h4>
                        <form action="{{route('Odontograma.store',['id'=>$id,'piezas_id'=>$piezas_id])}}" method="POST">
                            @csrf
                            
                            <div class="form-group row">
                                <label class=" col-sm-2">Diagnóstico</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="diagnostico">
                                        @foreach ($diagnostico as $diagnostico)
                                        <option value="{{$diagnostico->id}}"> {{$diagnostico->diagnostico}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class=" col-sm-2">Tratamiento</label>
                                <div class="col-md-8">
                                    <select class="form-control" name="nom_tratamiento">
                                        @foreach ($registrar_tratamiento as $registrar_tratamiento)
                                        <option value="{{$registrar_tratamiento->id}}"> {{$registrar_tratamiento->nom_tratamiento}} </option>
                                        @endforeach
                                        
                                        
                                    </select>
                                </div>
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary submit-btn" maxlength="100" style="list-style: none; color: aliceblue;">Guardar</button>

                        </form>
                    </div>
                </div>

            </section>
         


        </div>
        

    </div>
    
</div>

<div id="delete_approve" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Leave Request?</h3>
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
<script type="module" src="{{ asset('/resources/js/dienticos/piezas.js') }}"></script>
@endsection
