@extends('layouts.plantilla')

@section('title')
<title>Clinident / Honorarios</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3" style="padding-left: 1rem!important;">
                <h4 class="page-title">Tratamientos Realizados</h4>
            </div>
            <div class="col-sm-7 col-8 text-right m-b-30">
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></button>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Honorarios</a></li>
                <li class="breadcrumb-item"><a href="#">Tratamientos Realizados</a></li>
            </ol>
        </nav>
    
        <section>

            <div class="col-sm-3 col-md-3">
                <div class="form-group row">
                    <div class=""col-sm-4 d-flex align-items-center"">
                        <div class="input-group">
                            <input class="form-control" placeholder="Nombre Tratamiento" id="buscar-tratamiento" type="text">
                            <button class="btn btn-primary btn-sm ml-1" type="button" style="border-radius: .5rem">
                                    <i class="fa fa-search"></i>
                            </button>
                        </div>       
                    </div>
                </div>
            </div>
        

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tratamiento </th>
                                    <th>Fecha</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                    <th>Costo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tratamientos_finalizados as $tratamiento)
                                    <tr class="holiday-upcoming {{ $tratamiento->registrar_tratamiento->nom_tratamiento }}">
                                        <td>{{ $tratamiento->id }}</td>
                                        <td class="tratamientos">{{ $tratamiento->registrar_tratamiento->nom_tratamiento }}</td>
                                        <td>{{ date('d/m/Y', strtotime($tratamiento->updated_at)) }}</td>
                                        <td>{{ $tratamiento->paciente->persona->nombre }} {{ $tratamiento->paciente->persona->apellido }}</td>
                                        <td>{{ $tratamiento->doctor->persona->nombre }} {{ $tratamiento->doctor->persona->apellido }}</td>
                                        <td>{{ $tratamiento->registrar_tratamiento->costo_tratamiento }}</td>
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
<div id="delete_holiday" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Holiday?</h3>
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
    <script>
        const buscar = document.getElementById('buscar-tratamiento')
        buscar.onkeyup = (e) => {
            const search = e.target.value
            const tratamientos = Array.from(document.getElementsByClassName('tratamientos'))
            const tratamientosSearched = tratamientos.filter(t => {
                return t.innerText.toLowerCase().includes(search)
            })

            if (search === '') {
                const todos = Array.from(document.getElementsByClassName('holiday-upcoming'))
                todos.forEach(t => {
                    t.style.display = ''
                })
            } else {
                const todos = Array.from(document.getElementsByClassName('holiday-upcoming'))
                todos.forEach(t => {
                    t.style.display = 'none'
                })

                tratamientosSearched.forEach(t => {
                    t.parentElement.style.display = ''
                })
            }
        }
    </script>
@endsection
