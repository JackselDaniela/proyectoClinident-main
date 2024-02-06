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
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Perfil')}}">Editar Perfil</a></li>
            </ol>
        </nav>
        <section>
         
         
            <form action="{{route('EditarP.update',['id'=>$paciente->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-box">
                    <h3 class="card-title text-center" style="padding-bottom:4rem">Informacion Basica</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-img-wrap">
                                <img class="inline-block" src="assets/img/user.jpg" alt="user">
                                <div class="fileupload btn">
                                    <span class="btn-text">editar</span>
                                    <input class="upload" type="file">
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Primer Nombre</label>
                                            <input type="text" name="nombre" class="form-control floating" value="{{$paciente->persona->nombre}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Apellido</label>
                                            <input type="text" name="apellido" class="form-control floating" value="{{$paciente->persona->apellido}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus">
                                            <label class="focus-label">Fecha de Naciemiento</label>
                                            <div class="cal-icon">
                                                <input name="fecha_nacimiento" class="form-control floating datetimepicker" type="text" value="{{$paciente->persona->fecha_nacimiento}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-focus select-focus"  >
                                            <label class="focus-label">Genero</label>
                                            <select name="genero"  class="select form-control floating" value='{{$paciente->persona->genero}}'>
                                                <option value="male">Masculino</option>
                                                <option value="female " selected>Femenino</option>
                                            </select>
                                        </div>
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
                                <input name="direccion" type="text" class="form-control floating" value='{{$paciente->persona->dato_ubicacion->direccion}}'>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Estado</label>
                                <input name="estado" type="text" class="form-control floating" value="{{$paciente->persona->dato_ubicacion->estado}}">
                            </div>
                        </div>
                      
                        
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Telefono</label>
                                <input name="telefono" type="text" class="form-control floating" value="{{$paciente->persona->dato_ubicacion->telefono}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Informacion Academica</h3>
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group form-focus">
                                <label class="focus-label">Ocupacion</label>
                                <input name="ocupacion" type="text" class="form-control floating" value="{{$paciente->ocupacion}}">
                            </div>
                        </div>
                        
                    </div> 

                </div>
                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th> Condicion </th>
                            <th>  </th>
                            <th> Descripcion </th>
                            
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
                                            <input type="radio" name="alergia_penicilina"  value="Si"
                                            @if ($paciente->alergia_penicilina=='Si') 
                                           checked
                                            
                                             @endif 
                                        class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="alergia_penicilina" value="No"  
                                            @if ($paciente->alergia_penicilina=='No') 
                                           checked
                                            
                                             @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique metodo alternativo usado" maxlength="100" value="{{$paciente->desc_alergia_p}}" type="text" name="desc_alergia_p"style="border-style: hidden; text-align: center;"></td>
                            
                            
                            
                        </tr>
                        <tr>
                            <td>Alergia a Medicamento</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name='alergia_medicamento'  value="Si"
                                            @if ($paciente->alergia_medicamento=='Si') 
                                           checked
                                            
                                             @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name='alergia_medicamento' value="No" 
                                            @if ($paciente->alergia_medicamento=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique medicamento y/o componentes" maxlength="100" value="{{$paciente->desc_alergia_m}}"
                                 type="text" name="desc_alergia_m" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Tratamiento Medico Actual</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="trat_actual" value="Si"
                                            @if ($paciente->trat_actual=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si esta bajo tratamiento
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="trat_actual" value="No" 
                                            @if ($paciente->trat_actual=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No Esta bajo tratamiento
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique tipo de tratamiento y medicamentos" maxlength="100"  value="{{$paciente->desc_trat_actual}}" type="text" name="desc_trat_actual" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Está en Estado Gravidez</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gravidez" value="Si" 
                                            @if ($paciente->gravidezl=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gravidez" value="No"
                                            @if ($paciente->gravidez=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique etapa de Gravidez" type="text" maxlength="100" value="{{$paciente->desc_gravidez}}" name="desc_gravidez" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Ha experimentado Hemorragias</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hemorragia" value="Si" 
                                            @if ($paciente->hemorragia=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hemorragia" value="No"
                                            @if ($paciente->hemorragia=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique motivos" type="text" maxlength="100" value={{$paciente->desc_hemorragia}}" name="desc_hemorragia" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td> Padece de Desmayos</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="desmayos" value="Si"  
                                            @if ($paciente->desmayos=='Si') 
                                            checked
                                             
                                              @endif 
                                            required class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="desmayos" value="No" 
                                            @if ($paciente->desmayos=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique contexto que provoca desmayos" maxlength="100" value={{$paciente->desc_desmayos}} type="text" name="desc_desmayos" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td> Padece de Asma</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="asma" value="Si"  
                                            @if ($paciente->asma=='Si') 
                                            checked
                                             
                                              @endif  
                                            
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="asma" value="No"
                                            @if ($paciente->asma=='No') 
                                            checked
                                             
                                              @endif  class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique serveridad" type="text" maxlength="100" name="desc_asma"  value={{$paciente->desc_asma}} style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece Diábetes</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="diabetes"  value="Si" 
                                            @if ($paciente->diabetes=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="diabetes" value="No"
                                            @if ($paciente->diabetes=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique Tipo"type="text"  maxlength="100" name="desc_diabetes"  value={{$paciente->desc_diabetes}} style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece de Hipertension Arterial</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hipertension" value="Si" 
                                            @if ($paciente->hipertension=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hipertension" value="No" 
                                            @if ($paciente->hipertension=='No') 
                                            checked
                                             
                                              @endif
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Ultimo registro de tension"  maxlength="100" type="text"  value={{$paciente->desc_hipertension}} name="desc_hipertension" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        
                        <tr>
                            <td>Padece de Epilepsia</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="epilepsia" value="Si"
                                            @if ($paciente->epilepsia=='Si') 
                                            checked
                                              @endif
                                             class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="epilepsia" value="No"
                                            @if ($paciente->epilepsia=='No') 
                                            checked
                                              @endif
                                             class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique motivos y frecuencia"  maxlength="100" type="text"  value={{$paciente->desc_epilepsia}} name="desc_epilepsia" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece de Cancer Actualmente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_actual" value="Si"
                                            @if ($paciente->cancer_actual=='Si') 
                                            checked
                                              @endif
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_actual" value="No"
                                            @if ($paciente->cancer_actual=='No') 
                                            checked
                                              @endif 
                                              class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique Tipo de Cancer"type="text"  maxlength="100"  value={{$paciente->desc_cancer_actual}} name="desc_cancer_actual" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Ha padecido de Cancer</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_pasado" value="Si"
                                            @if ($paciente->cancer_pasado=='Si') 
                                            checked
                                              @endif
                                                 class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_pasado" value="No"
                                            
                                            @if ($paciente->cancer_pasado=='No') 
                                            checked
                                              @endif
                                            class="form-check-input">No
                                        </label>
                                    </div>

                            </td>
                            <td><input placeholder="Indique Tipo de Cancer"type="text"  maxlength="100"  value={{$paciente->desc_cancer_pasado}} name="desc_cancer_pasado" style="border-style: hidden; text-align: center;"></td>
                            
                           
                            
                        </tr>
                        <tr>
                            <td>Padece VIH</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="vih" value="Si"
                                            
                                             @if ($paciente->vih=='Si') 
                                            checked
                                              @endif class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="vih" value="No"
                                            
                                            @if ($paciente->vih=='No') 
                                            checked
                                              @endif
                                               class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Fecha de prueba  positiva"  maxlength="100"  value={{$paciente->vih}} type="text" name="desc_vih" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece Enfermedad Inmunodeficiente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="inmunodeficiente" value="Si" 
                                            @if ($paciente->inmunodeficiente=='Si') 
                                            checked
                                              @endif
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="inmunodeficiente" 
                                            @if ($paciente->inmunodeficiente=='No') 
                                            checked
                                              @endif
                                            value="No" class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Nombre de la condicion"type="text"  maxlength="100"  value={{$paciente->desc_inmunodeficiente}} name="desc_inmunodeficiente" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Fuma Actualmente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="fumador" value="Si" 
                                            @if ($paciente->fumador=='Si') 
                                            checked
                                              @endif
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="fumador" value="No"
                                            
                                            @if ($paciente->fumador=='No') 
                                            checked
                                              @endif
                                               class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Desde Hace Cuanto?"type="text"  maxlength="100"  value={{$paciente->desc_fumador}} name="desc_fumador" style="border-style: hidden; text-align: center;"></td>
                             
                        </tr>
                    </tbody>
                </table> 
                
                <div class="text-center m-t-20">
                    <button type="submit" class="btn btn-primary submit-btn" >Guardar</button>
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
@endsection
