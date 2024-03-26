@extends('layouts.plantilla')

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
                    <h4 class="page-title">Editar Perfil</h4>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('Perfil') }}">Editar Perfil</a></li>
                </ol>
            </nav>
            <section>

                <div class="card-box">

                    <h3 class="card-title text-center" style="padding-bottom:4rem">Informacion Basica</h3>
                </div>


                <div class="row">
                    {{-- @foreach ($doctor as $doctor)  --}}
                    <form action="{{ route('EditarPD.update', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img id="mostrarImagen" class="inline-block"
                                    src="{{ $doctor->persona->foto == null ? asset('assets/img/user.jpg') : asset('storage/imagenes/' . $doctor->persona->foto) }}"
                                    alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">editar</span>
                                    <input class="upload" type="file" name="foto"
                                        accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Primer Nombre</label>
                                            <input type="text" name="nombre" class="form-control floating"
                                                value='{{ $doctor->persona->nombre }}'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Apellido</label>
                                            <input type="text" name="apellido" class="form-control floating"
                                                value='{{ $doctor->persona->apellido }}'>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Fecha de Naciemiento</label>
                                            <div class="cal-icon">
                                                <input class="form-control floating datetimepicker" name="fecha_nacimiento"
                                                    type="text" value='{{ $doctor->persona->fecha_nacimiento }}'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">Genero</label>
                                            <select class="select form-control floating" name="genero"
                                                value='{{ $doctor->persona->genero }}'>


                                                <option value="male">Masculino</option>
                                                <option value="female ">Femenino</option>
                                                <option value="female ">Prefiero no decirlo</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card-box">
                    <h3 class="card-title">Informacion de Contacto</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-focus">
                                <label class="focus-label">Dirección</label>
                                <input type="text" class="form-control floating" name="direccion"
                                    value='{{ $doctor->persona->dato_ubicacion->direccion }}'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus select-focus">
                                <label class="focus-label">Estado</label>
                                <select class="select form-control floating" name="estado">
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id_estado }}"
                                            {{ $estado->id_estado === $doctor->persona->dato_ubicacion->estado->id_estado ? 'selected' : '' }}>
                                            {{ $estado->estado }}</option>
                                    @endforeach



                                </select>
                            </div>
                            {{-- <div class="form-group form-focus">
                                <label class="focus-label">Estado</label>
                                <input type="text" class="form-control floating" name="estado"
                                    value='{{ $doctor->persona->dato_ubicacion->estado->estado }}'>
                            </div> --}}
                        </div>


                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Telefono</label>
                                <input type="text" class="form-control floating" name="telefono"
                                    value='{{ $doctor->persona->dato_ubicacion->telefono }}'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Informacion Academica</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Institución</label>
                                <input type="text" class="form-control floating" name="universidad"
                                    value='{{ $doctor->universidad }}'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Especialidad</label>
                                <input type="text" class="form-control floating" name="especialidad"
                                    value='{{ $doctor->especialidad->especialidad }}'>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Destacado</label>
                                <input type="text" class="form-control floating" name="destacado"
                                    value='{{ $doctor->destacado }}'>
                            </div>
                        </div>
                        {{-- @endforeach  --}}

                    </div>

                </div>
                <div class="text-center m-t-20">
                    <button class="btn btn-primary submit-btn" type="submit">Guardar</button>
                </div>
                </form>

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
    <script src="{{ asset('/assets/js/imagePreview.js') }}"></script>
@endsection
