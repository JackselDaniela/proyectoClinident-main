AñadirD
@extends('layouts.plantilla')

@section('title')
    <title>
        Clinident / Doctores</title>
@endsection
@section('css-externo')
@endsection
@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title" style="padding-left: -10rem; margin-left:-10rem">Añadir Doctor</h4>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Doctores</a></li>
                    <li class="breadcrumb-item"><a href="#">Registrar Doctor</a></li>
                    <li class="breadcrumb-item"><a href="#">Añadir Doctor</a></li>
                </ol>
            </nav>


            <section>
                <h4 class=" text-center" style="padding: 2rem 0;">Registrar Doctor</h4>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="{{ route('AnadirD.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label title="Ingrese su Nacionalidad">Origen<span class="text-danger">*</span>

                                        </label>
                                        <select class="col-sm-2 select" name="nacionalidad" id="nacionalidad"required>
                                            @foreach ($nacionalidad as $nacionalidad)
                                                <option value="{{ $nacionalidad->id }}"> {{ $nacionalidad->nacionalidad }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group" style="margin-left: -1.5rem">
                                        {{-- Persona --}}
                                        <label title="Ingrese su Documento de identidad">Doc.Identidad <span
                                                class="text-danger">*</span>

                                        </label>

                                        <input class="form-control" value="{{ old('doc_identidad') }}" maxlength="8"
                                            placeholder="Ejemplo: 12000000" name="doc_identidad" id="doc_identidad"
                                            type="text" required>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label title="Ingrese su Nombre">Nombre <span class="text-danger">*</span>
                                            @if ($errors->first('nombre'))
                                                <p class="text-danger">
                                                    {{ $errors->first('nombre') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" value="{{ old('nombre') }}" maxlength="30"
                                            placeholder="Ejemplo: Juana" name="nombre" id="nombre" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label title="Ingrese su Apellido">Apellido<span class="text-danger">*</span>
                                            @if ($errors->first('apellido'))
                                                <p class="text-danger">
                                                    {{ $errors->first('apellido') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" value="{{ old('apellido') }}" maxlength="30"
                                            placeholder="Ejemplo: Perez" name="apellido" id="apellido" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label title="Ingrese su Fecha de Nacimiento">Fecha de nacimiento<span
                                                class="text-danger">*</span>
                                            @if ($errors->first('fecha_nacimiento'))
                                                <p class="text-danger">
                                                    {{ $errors->first('fecha_nacimiento') }}
                                                </p>
                                            @endif
                                        </label>
                                        <div class="cal-icon">
                                            <input type="text" name="fecha_nacimiento"
                                                value="{{ old('fecha_nacimiento') }}" maxlength="10" id ="fecha_nacimiento"
                                                placeholder="DD/MM/AA" class="form-control datetimepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label title="Seleccione su Genero">Género<span class="text-danger">*</span></label>
                                        <select class="select" name="genero" id="genero" required>
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Femenino</option>
                                            <option value="no_binario">No Binario</option>
                                            <option value="otros"> Prefiero no decirlo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label title="Seleccione una foto donde se distinga su rostro">Foto</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="assets/img/user.jpg" id="mostrarImagen">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" name="foto" id="foto" class="form-control"
                                                    accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- /Persona --}}

                                {{-- Datos Ubicacion --}}
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label title="Seleccione su Estado">Estado<span
                                                        class="text-danger">*</span>
                                                    @if ($errors->first('estado'))
                                                        <p class="text-danger">
                                                            {{ $errors->first('estado') }}
                                                        </p>
                                                    @endif
                                                </label>
                                                <select class="select" name="estado" id="estado"
                                                    onchange="CargarMunicipiosCiudades(this)" required>
                                                    <option> Seleccione </option>
                                                    @foreach ($estado as $estado)
                                                        <option value="{{ $estado->id_estado }}"> {{ $estado->estado }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label title="Seleccione su Municipio">Municipio<span
                                                        class="text-danger">*</span>
                                                    @if ($errors->first('municipio'))
                                                        <p class="text-danger">
                                                            {{ $errors->first('municipio') }}
                                                        </p>
                                                    @endif
                                                </label>
                                                <select class="select" name="municipio" id="municipio"
                                                    onchange="CargarParroquia(this)" required>
                                                    <option> Seleccione </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label title="Seleccione su Ciudad">Ciudad<span
                                                        class="text-danger">*</span>
                                                    @if ($errors->first('ciudad'))
                                                        <p class="text-danger">
                                                            {{ $errors->first('ciudad') }}
                                                        </p>
                                                    @endif
                                                </label>
                                                <select class="select" name="ciudad" id="ciudad" required>
                                                    <option> Seleccione </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                            <div class="form-group">
                                                <label title="Seleccione su Parroquia">Parroquia<span
                                                        class="text-danger">*</span>
                                                    @if ($errors->first('parroquia'))
                                                        <p class="text-danger">
                                                            {{ $errors->first('parroquia') }}
                                                        </p>
                                                    @endif
                                                </label>
                                                <select class="select" name="parroquia" id="parroquia"required>
                                                    <option> Seleccione </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Dirección<span class="text-danger">*</span>
                                                </label>
                                                <input type="text" maxlength="50" value="{{ old('direccion') }}"
                                                    name="direccion" id="direccion" placeholder="¿Cúal es su Dirección?"
                                                    class="form-control ">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Télefono<span class="text-danger">*</span>
                                                </label>
                                                <input type="number" maxlength="11" name="telefono"
                                                    value="{{ old('telefono') }}" id="telefono"
                                                    placeholder="Indique su Numero Principal" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Correo <span class="text-danger">*</span>
                                                    @if ($errors->first('correo'))
                                                        <p class="text-danger">
                                                            {{ $errors->first('correo') }}
                                                        </p>
                                                    @endif
                                                </label>
                                                <input class="form-control" name="correo" value="{{ old('correo') }}"
                                                    maxlength="100" id="correo" placeholder="Indique su correo"
                                                    type="email">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- / Datos Ubicacion --}}

                                {{-- <div class="form-group row">
                                <label class=" col-sm-2">Especialidad</label><span class="text-danger">*</span>
                                <div class="col-md-8">
                                    <select class="form-control">
                                        <option value="No Especifica">-- Seleccione --</option>
                                        <option value="Endodoncia" >Endodoncia</option>
                                        <option value="Ortodoncia" >Ortodoncia</option>
                                        <option value="Maxilo Facial" >Maxilo Facial</option>
                                        <option value="Periodoncia">Periodoncia</option>
                                        <option value="Prostodoncia">Prostodoncia</option>
                                        
                                    </select>
                                </div>
                            </div> --}}

                                {{-- Especialidad --}}

                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Especialidad<span class="text-danger">*</span></label>
                                        <select class="select" name="especialidad" id="especialidad">
                                            <option value=""> Seleccione </option>
                                            @foreach ($especialidad as $especialidad)
                                                <option value="{{ $especialidad->id }}">
                                                    {{ $especialidad->especialidad }} </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cod-Especialidad <span class="text-danger">*</span></label>
                                        <input class="form-control" maxlength="30" value="cod-"
                                            name="codigo_especialidad" id="codigo_especialidad" type="text" required>
                                    </div>
                                </div>

                                {{-- /Especialidad --}}


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Universidad<span class="text-danger">*</span>
                                            @if ($errors->first('universidad'))
                                                <p class="text-danger">
                                                    {{ $errors->first('universidad') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" value="{{ old('universidad') }}" maxlength="100"
                                            name="universidad" id="universidad"
                                            placeholder="Indique Universidad de Procedencia" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Experiencia<span class="text-danger">*</span>
                                            @if ($errors->first('experiencia'))
                                                <p class="text-danger">
                                                    {{ $errors->first('experiencia') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" value="{{ old('experiencia') }}" maxlength="100"
                                            name="experiencia" id="experiencia" placeholder="Indique Años de Experiencia"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Bachillerato<span class="text-danger">*</span>
                                            @if ($errors->first('bachillerato'))
                                                <p class="text-danger">
                                                    {{ $errors->first('bachillerato') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" name="bachillerato"
                                            value="{{ old('bachillerato') }}" maxlength="100" id="bachillerato"
                                            placeholder="Indique Escuela Secundaria" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Destacado<span class="text-danger">*</span>
                                            @if ($errors->first('destacado'))
                                                <p class="text-danger">
                                                    {{ $errors->first('destacado') }}
                                                </p>
                                            @endif
                                        </label>
                                        <input class="form-control" name="destacado" value="{{ old('destacado') }}"
                                            maxlength="100" id="destacado" placeholder="Indique estudios destacados"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contraseña</label><span class="text-danger">*</span>
                                        <input class="form-control" name="contraseña"
                                            placeholder="Introduzca Contraseña " type="password" required>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirmar Contraseña</label><span class="text-danger">*</span>
                                    <input class="form-control" placeholder="Confirme su contraseña"  type="password">
                                </div>
                            </div> --}}

                            </div>


                            <div class="row">
                                <form>

                            </div>
                            <div class="col-lg-8 offset-lg-2">

                                <div class="m-t-20 text-center">
                                    <button type="submit" class="btn btn-primary submit-btn"
                                        style="list-style: none; color: aliceblue;">Registrar Doctor</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Domenic Houston </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Buster Wigton </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Rolland Webber </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Claire Mapes </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Melita Faucher</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Jeffery Lalor</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Loren Gatlin</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Tarah Shropshire</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">Ver todos los mendajes</a>
                </div>
            </div>
        </div>

    </div>
    </form>
    </div>
    </div>

    </section>

    </div>
@endsection

@section('js-externo')
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/estadoMunicipioCiudadParroquia.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/imagePreview.js') }}"></script>
@endsection
