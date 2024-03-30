@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Mi Perfil</title>
@endsection

@section('css-externo')
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
@endsection

@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Perfil</h4>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('Index') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ asset('Perfil') }}">Perfil</a></li>
                </ol>
            </nav>

            <section style="margin-block: 5rem; margin-top: -0">
                <div class="card-box">
                    <h3 class="card-title text-center">Informacion Basica</h3>
                </div>

                <div class="row">
                    <form action="{{ route('Perfil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img id="mostrarImagen" class="inline-block"
                                    src="{{ $usuario->foto == null ? asset('assets/img/user.jpg') : asset('storage/imagenes/' . $usuario->foto) }}"
                                    alt="foto de perfil de usuario">
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
                                                value="{{ $usuario->nombre }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Apellido</label>
                                            <input type="text" name="apellido" class="form-control floating"
                                                value="{{ $usuario->apellido }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Fecha de Naciemiento</label>
                                            <div class="cal-icon">
                                                <input class="form-control floating datetimepicker" name="fecha_nacimiento"
                                                    type="text" value="{{ $usuario->fecha_nacimiento }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">Genero</label>
                                            <select class="select form-control floating" name="genero">
                                                <option value="masculino"
                                                    {{ $usuario->genero === 'masculino' ? 'selected' : '' }}>Masculino
                                                </option>
                                                <option value="femenino"
                                                    {{ $usuario->genero === 'femenino' ? 'selected' : '' }}>Femenino
                                                </option>
                                                <option value="no_binario"
                                                    {{ $usuario->genero === 'no_binario' ? 'selected' : '' }}>No Binario
                                                </option>
                                                <option value="otros"
                                                    {{ $usuario->genero === 'otros' ? 'selected' : '' }}> Prefiero no
                                                    decirlo</option>
                                            </select>
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
                                            value="{{ $usuario->dato_ubicacion->direccion }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-focus select-focus">
                                        <label class="focus-label">Estado</label>
                                        <select class="select form-control floating" name="estado">
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->id_estado }}"
                                                    {{ $usuario->dato_ubicacion->estado->id_estado === $estado->id_estado ? 'selected' : '' }}>
                                                    {{ $estado->estado }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Telefono</label>
                                        <input type="text" class="form-control floating" name="telefono"
                                            value="{{ $usuario->dato_ubicacion->telefono }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (isset($usuario->doctor))
                            <div class="card-box">
                                <h3 class="card-title">Informacion Academica</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Institución</label>
                                            <input type="text" class="form-control floating" name="bachillerato"
                                                value="{{ $usuario->doctor->bachillerato }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Institución</label>
                                            <input type="text" class="form-control floating" name="universidad"
                                                value="{{ $usuario->doctor->universidad }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label">Especialidad</label>
                                            <select class="select form-control floating" name="especialidad">
                                                @foreach ($especialidades as $especialidad)
                                                    <option value="{{ $especialidad->id }}"
                                                        {{ $usuario->doctor->especialidads_id === $especialidad->id ? 'selected' : '' }}>
                                                        {{ $especialidad->especialidad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Experiencia</label>
                                            <input type="text" class="form-control floating" name="experiencia"
                                                value="{{ $usuario->doctor->experiencia }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Destacado</label>
                                            <input type="text" class="form-control floating" name="destacado"
                                                value="{{ $usuario->doctor->destacado }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="text-center m-t-20">
                            <button class="btn btn-primary submit-btn" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </section>
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
    <script src="{{ asset('/assets/js/imagePreview.js') }}"></script>
@endsection
