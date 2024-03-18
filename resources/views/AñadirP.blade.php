@extends('layouts.plantilla')

@section('title')
<title>Clinident / Añadir Paciente</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title" style="padding-left: -10rem; margin-left:-10rem">Añadir Paciente</h4>
            </div>
            
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"> Gestion de Paciente</a></li>
                <li class="breadcrumb-item"><a href="#">Registro Expediente</a></li>
                <li class="breadcrumb-item"><a href="#">Añadir Paciente</a></li>
            </ol>
        </nav>
        <section >
            <div class="col-lg-8 offset-lg-2">
                <h4 class=" text-center" style="padding: 2rem 0;">Registrar Expediente</h4>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('AnadirP.store')}}" method="POST">
                        @csrf
                        <div class="row" >
                           
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label title="Ingrese su Nacionalidad">Origen<span class="text-danger">*</span>
                                        
                                    </label>
                                    <select class="col-sm-2 select"  name="nacionalidad" id="nacionalidad" required>
                                        @foreach ($nacionalidad as $nacionalidad)
                                        <option value="{{$nacionalidad->id}}"> {{$nacionalidad->nacionalidad}}</option>
                                        @endforeach 
                                    </select> 
                                </div>

                            </div>
                            <div class="col-sm-4">
                                
                                <div class="form-group" style="margin-left: -1.5rem">
                                    {{-- Persona --}}
                                    <label title="Ingrese su Documento de identidad">Doc.Identidad <span class="text-danger">*</span>
                                        
                                   </label>
                                   
                                    <input class="form-control" value="{{old('doc_identidad')}}" maxlength="8" placeholder="Ejemplo: 12000000" name="doc_identidad" id="doc_identidad" type="text" required>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label title="Ingrese su Nombre">Nombre <span class="text-danger">*</span>
                                        @if($errors->first('nombre'))
                                        <p class="text-danger">
                                            {{$errors->first('nombre')}}
                                        </p>
                                        @endif</label>
                                    <input class="form-control" value="{{old('nombre')}}" maxlength="30" placeholder="Ejemplo: Juana" name="nombre" id="nombre" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label title="Ingrese su Apellido">Apellido<span class="text-danger">*</span>
                                        @if($errors->first('apellido'))
                                        <p class="text-danger">
                                            {{$errors->first('apellido')}}
                                        </p>
                                        @endif</label>
                                    <input class="form-control" value="{{old('apellido')}}" maxlength="30" placeholder="Ejemplo: Perez" name="apellido" id="apellido" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label title="Ingrese su Fecha de Nacimiento">Fecha de nacimiento<span class="text-danger">*</span>
                                        @if($errors->first('fecha_nacimiento'))
                                        <p class="text-danger">
                                            {{$errors->first('fecha_nacimiento')}}
                                        </p>
                                        @endif</label>
                                    <div class="cal-icon">
                                        <input type="text" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" maxlength="10" id ="fecha_nacimiento" placeholder="DD/MM/AA" class="form-control datetimepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label title="Seleccione su Genero">Genero <span class="text-danger">*</span></label>
                                    <select class="select" name="genero" id="genero" required>
                                        <option value="masculino"> Masculino</option>
                                        <option value="femenino"> Femenino</option>
                                        <option value="no_binario"> No Binario</option>
                                        <option value="otros"> Prefiero no decirlo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label title="Seleccione una foto donde se distinga su rostro">Foto</label><span class="text-danger">*</span>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="assets/img/user.jpg">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" name="foto" id="foto"  class="form-control" required>
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
                                            <label title="Seleccione su Estado">Estado<span class="text-danger">*</span>
                                                @if($errors->first('estado'))
                                        <p class="text-danger">
                                            {{$errors->first('estado')}}
                                        </p>
                                        @endif</label>
                                        <select class="select"  name="estado" id="estado" onchange="CargarMunicipiosCiudades(this)" required>
                                            <option > Seleccione </option>
                                             @foreach ($estado as $estado)
                                            <option value="{{$estado->id_estado}}"> {{$estado->estado}}</option>
                                            @endforeach 
                                        </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label title="Seleccione su Municipio">Municipio<span class="text-danger">*</span>
                                                @if($errors->first('municipio'))
                                        <p class="text-danger">
                                            {{$errors->first('municipio')}}
                                        </p>
                                        @endif</label>
                                        
                                        <select class="select"  name="municipio" id="municipio" onchange="CargarParroquia(this)" required>
                                            <option > Seleccione </option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label title="Seleccione su Ciudad">Ciudad<span class="text-danger">*</span>
                                                @if($errors->first('ciudad'))
                                        <p class="text-danger">
                                            {{$errors->first('ciudad')}}
                                        </p>
                                        @endif</label>
                                        <select class="select"  name="ciudad" id="ciudad" required>
                                            <option > Seleccione </option>
                                            
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label title="Seleccione su Parroquia">Parroquia<span class="text-danger">*</span>
                                                @if($errors->first('parroquia'))
                                        <p class="text-danger">
                                            {{$errors->first('parroquia')}}
                                        </p>
                                        @endif</label>
                                            
                                        <select class="select"  name="parroquia" id="parroquia"required>
                                            <option > Seleccione </option>
                                            
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Dirección<span class="text-danger">*</span>
                                                </label>
                                            <input type="text"  maxlength="50" value="{{old('direccion')}}" name="direccion" id="direccion" placeholder="¿Cúal es su Dirección?" class="form-control ">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Teléfono<span class="text-danger">*</span>
                                                </label> 
                                            <input type="number" maxlength="11" name="telefono" value="{{old('telefono')}}"  id="telefono" placeholder="Indique su Numero Principal" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Correo <span class="text-danger">*</span>
                                                @if($errors->first('correo'))
                                                <p class="text-danger">
                                                    {{$errors->first('correo')}}
                                                </p>
                                                @endif</label>
                                            <input class="form-control" name="correo" value="{{old('correo')}}" maxlength="100" id="correo" placeholder="Indique su correo" type="email">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ocupación <span class="text-danger">*</span>
                                    @if($errors->first('ocupacion'))
                                    <p class="text-danger">
                                        {{$errors->first('ocupacion')}}
                                    </p>
                                    @endif</label>
                                <input class="form-control" maxlength="30" placeholder="Ingrese La Ocupacion" name="ocupacion" type="text" required>
                            </div>
                        </div>
                        
                           
                            <div class="row">
                        <form>
                                <div class="col-lg-8 offset-lg-2">
                                                        <h4 class=" text-center" style="padding: 2rem 0; color:rgb(8, 76, 136)">Antecedentes Medicos</h4>
            
                                                    </div>
                                                    
                                                    <table class="table table-striped custom-table">
                                                        <thead>
                                                            <tr>
                                                                <th> Condición </th>
                                                                <th>  </th>
                                                                <th> Descripción </th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Alergia Penicilina</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="alergia_penicilina" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="alergia_penicilina" value="no"  class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique metodo alternativo usado" maxlength="100" value="Descripción" type="text" name="desc_alergia_p"style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Alergia a Medicamento</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name='alergia_medicamento'  value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name='alergia_medicamento' value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique medicamento y/o componentes" maxlength="100" value="Descripción" type="text" name="desc_alergia_m" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Tratamiento Medico Actual</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="trat_actual" value="Si" class="form-check-input" required>Si esta bajo tratamiento
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="trat_actual" value="No" class="form-check-input">No Esta bajo tratamiento
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique tipo de tratamiento y medicamentos" maxlength="100"  value="Descripción" type="text" name="desc_trat_actual" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Está en Estado Gravidez</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="gravidez" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="gravidez" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique etapa de Gravidez" type="text" maxlength="100" value="Descripción" name="desc_gravidez" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Ha experimentado Hemorragias</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="hemorragia" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="hemorragia" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique motivos" type="text" maxlength="100" value="Descripción" name="desc_hemorragia" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td> Padece de Desmayos</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="desmayos" value="Si"  required class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="desmayos" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique contexto que provoca desmayos" maxlength="100" value="Descripción" type="text" name="desc_desmayos" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td> Padece de Asma</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="asma" value="Si"  class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="asma" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique serveridad" type="text" maxlength="100" name="desc_asma"  value="Descripción" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Padece Diábetes</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="diabetes"  value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="diabetes" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique Tipo"type="text"  maxlength="100" name="desc_diabetes"  value="Descripción" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Padece de Hipertension Arterial</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="hipertension" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="hipertension" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Ultimo registro de tension"  maxlength="100" type="text"  value="Descripción" name="desc_hipertension" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td>Padece de Epilepsia</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="epilepsia" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="epilepsia" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique motivos y frecuencia"  maxlength="100" type="text"  value="Descripción" name="desc_epilepsia" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Padece de Cancer Actualmente</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="cancer_actual" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="cancer_actual" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Indique Tipo de Cancer"type="text"  maxlength="100"  value="Descripción" name="desc_cancer_actual" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Ha padecido de Cancer</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="cancer_pasado" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="cancer_pasado" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>

                                                                </td>
                                                                <td><input placeholder="Indique Tipo de Cancer"type="text"  maxlength="100"  value="Descripción" name="desc_cancer_pasado" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                               
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Padece VIH</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="vih" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="vih" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Fecha de prueba  positiva"  maxlength="100"  value="Descripción" type="text" name="desc_vih" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Padece Enfermedad Inmunodeficiente</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="inmunodeficiente" value="Si"  class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="inmunodeficiente" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Nombre de la condicion"type="text"  maxlength="100"  value="Descripción" name="desc_inmunodeficiente" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Fuma Actualmente</td>
                                                                <td>
                                                                    <div class="form-group gender-select">
                                                                        <label class="gen-label"></label>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="fumador" value="Si" class="form-check-input" required>Si
                                                                            </label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" name="fumador" value="No" class="form-check-input">No
                                                                            </label>
                                                                        </div>
                                                                </td>
                                                                <td><input placeholder="Desde Hace Cuanto?"type="text"  maxlength="100"  value="Descripción" name="desc_fumador" style="border-style: hidden; text-align: center;"></td>
                                                                
                                                                
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                     <!-- /Medical Information -->
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Contraseña</label><span class="text-danger">*</span>
                                                        <input class="form-control" name="contraseña" placeholder="Introduzca Contraseña " type="password" required>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Confirmar Contraseña</label><span class="text-danger">*</span>
                                                        <input class="form-control" placeholder="Confirme su contraseña"  type="password">
                                                    </div>
                                                </div> --}}
                                             </div>
                                                <div class="col-lg-8 offset-lg-2">
                                                
                                                    <div class="m-t-20 text-center">
                                                        <button  type="submit" class="btn btn-primary submit-btn" maxlength="100"  style="list-style: none; color: aliceblue;">Registrar Paciente</button>
                                                    </div>
                                                </div>
            
                                            </form>
                                            
                                        </div>
                                </div>
                            
                            </div>
                            
                    </form>
                </div>
            </div>

        </section>
        
    </div>
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
@endsection
