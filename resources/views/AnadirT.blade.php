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
                <h4 class="page-title">Añadir Tratamiento</h4>
            </div>



        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Gestion de Pacientes</a></li>
                <li class="breadcrumb-item"><a href="{{asset('AnadirT')}}">Añadir Tratamiento</a></li>
            </ol>
        </nav>
        <a href="{{route('HistoriaC.buscar',$paciente->id)}}"><button style="font-size: 1.3rem" class="btn btn-primary float-right btn-rounded btn-press btn-add" >Ver Expediente</button></a>

        <a href="{{route('RegistroE')}}"><button style="font-size: 1.3rem; margin-right:1rem" class="btn btn-primary float-right btn-rounded btn-press btn-add" >Listado de Pacientes</button></a>

        <div class="row">


            <div class="col-sm-5 col-md-5">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input class="form-control" style="padding: 2rem;font-size:1.4rem" value="Paciente : {{$paciente->persona->nombre." ".$paciente->persona->apellido}}" placeholder="Ex:25976000" type="text" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 col-md-5">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <!-- <select class="form-control" style="font-size:1.4rem;height: 40px;">
                                @if (count($doctores) <= 0)
                                    <option value="No hay doctores disponibles">No hay doctores disponibles</option>
                                @else
                                    @foreach ($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">Dr. {{ $doctor->personas_id->nombre }} {{ $doctor->personas_id->apellido }}</option>
                                        @error('doctor_cedula')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    @endforeach
                                @endif
                            </select> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input class="form-control" type="hidden" style="padding: 2rem;font-size:1.8rem" value=" {{$paciente->id}}" placeholder="Ex:25976000" type="text" disabled>

                        </div>
                    </div>
                </div>
            </div>




            <section  style="justify-content: center; margin-left:25%;margin-right:25%">
                <div class="modal-content " style="justify-content: center">

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2" style="text-align: center; margin: 0px!important;" >

                                <ul style="list-style:none; display:flex; padding-top: 2rem;padding-left: 2rem; justify-content:space-between">
                                    <li>
                                        <h3 style="margin-bottom:-3.5rem; width:max-content;">Seleccione la Pieza</h3>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <div class="contenedor-dentadura" id="dentadura-completa">

                            <div class="row" >

                                <img class="dentadura" src="{{asset('assets/img/boca/dentadura.png')}}"  alt="">
                                @foreach ($pieza as $pieza)
                                 <!-- Maxilar superior izq -->

                                <a id="{{$pieza->nom_pieza}}" href="{{route('Odontograma.create',['id'=>$id,'piezas_id'=>$pieza->id])}}" title="Pieza {{$pieza->nom_pieza}}">
                                 @php
                                     $diagnosticoEncontrado= $diagnosticos->first(function($diagnostico) use($pieza){
                                        return $diagnostico->piezas_id==$pieza->id;

                                    });
                                     $esPiezaFaltante= $diagnosticoEncontrado ?->diagnosticos_id==14;
                                 @endphp

                                    @if ($esPiezaFaltante)
                                    <img class="{{$pieza->nom_pieza}} pieza" src="{{asset($pieza->imagenF)}}" alt="">
                                    @elseif ($diagnosticoEncontrado!=null)
                                    <img class="{{$pieza->nom_pieza}} pieza" src="{{asset($pieza->imagenT)}}" alt="">

                                    @else
                                    <img class="{{$pieza->nom_pieza}} pieza" src="{{asset($pieza->imagen)}}" alt="">
                                    @endif





                                     {{-- @if ($pieza->diagnosticos_id!=null && $pieza->diagnosticos_id!=14)
                                    <img class="{{$pieza->nom_pieza}} pieza" src="{{asset($pieza->imagenT)}}" alt="">
                                    @endif
                                     @if ($pieza->diagnosticos_id!=null && $pieza->diagnosticos_id==14)
                                    <img class="{{$pieza->nom_pieza}} pieza" src="{{asset($pieza->imagenF)}}" alt="">
                                    @endif --}}


                                    <input type="hidden" value="p11">
                                </a>

                                @endforeach
                            </div>
                        </div>
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
