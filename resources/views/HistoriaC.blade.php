@extends('layouts.plantilla')

@section('title')
<title>Clinident / Gestion de Pacientes</title>
@endsection
@section('css-externo')
<link rel="stylesheet" href="{{asset('assets/css/dentadura.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/odontograma.css')}}">

@endsection
@section('contenido')
<div class="page-wrapper" style="padding-top:4rem; font-size:1.4rem">
    <div class="content">
        <div class="row">
            <div class="col-sm-8 col-6">
                <h4 class="page-title" id="inicio">Historia Clinica</h4>
            </div>

        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Gestion de Paciente</a></li>
                <li class="breadcrumb-item"><a href="{{route('EditarP.buscar',['id'=>$paciente->id])}}">Añadir Tratamiento</a></li>
                <li class="breadcrumb-item"><a href="#">Historia Clinica</a></li>
            </ol>
            
        </nav>
        
       <div class="row">

        <div class="col-lg-12">

            <a href="{{route('EditarP.buscar',['id'=>$paciente->id])}}"><button style="font-size: 1.3rem; margin-bottom:2rem" class="btn btn-primary float-right btn-rounded btn-press btn-add" >Añadir Tratamiento</button></a>
        </div>

       </div>
        <div class="row">
            
            <section style="width: 100vw">
                 <!-- BOTON MODAL -->
                
               
                
                <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 " style="font-size: 1.3rem">
                            <thead>
                                <tr>
                                    <th>Doc.Identidad</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Edad</th>
                                    <th class="text-center">Estatus</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            
                                <tr>
                                
                                    <td>000123</td>
                                    <td>{{$paciente->persona->nombre}}</td>
                                    <td>{{$paciente->persona->apellido}}</td>
                                    <td>35</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="custom-badge status-purple dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                Paciente
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Activo</a>
                                                <a class="dropdown-item" href="#">Inactivo</a>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                {{-- Reporte del paciente --}}
                <table  class="table table-striped custom-table" style="font-size: 1.3rem">
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
                                            <input type="radio" name="alergia_penicilina" disabled value="Si"
                                            @if ($paciente->alergia_penicilina=='Si') 
                                           checked
                                            
                                             @endif 
                                        class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="alergia_penicilina"disabled value="No"  
                                            @if ($paciente->alergia_penicilina=='No') 
                                           checked
                                            
                                             @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique metodo alternativo usado"disabled maxlength="100" value="{{$paciente->desc_alergia_p}}" type="text" name="desc_alergia_p"style="border-style: hidden; text-align: center;"></td>
                            
                            
                            
                        </tr>
                        <tr>
                            <td>Alergia a Medicamento</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name='alergia_medicamento'  disabled value="Si"
                                            @if ($paciente->alergia_medicamento=='Si') 
                                           checked
                                            
                                             @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name='alergia_medicamento'disabled value="No" 
                                            @if ($paciente->alergia_medicamento=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique medicamento y/o componentes" disabled maxlength="100" value="{{$paciente->desc_alergia_m}}"
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
                                            class="form-check-input"disabled required>Si esta bajo tratamiento
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="trat_actual"disabled value="No" 
                                            @if ($paciente->trat_actual=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No Esta bajo tratamiento
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique tipo de tratamiento y medicamentos" maxlength="100"disabled  value="{{$paciente->desc_trat_actual}}" type="text" name="desc_trat_actual" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Está en Estado Gravidez</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gravidez"disabled value="Si" 
                                            @if ($paciente->gravidezl=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="gravidez" disabled value="No"
                                            @if ($paciente->gravidez=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique etapa de Gravidez" type="text" disabled maxlength="100" value="{{$paciente->desc_gravidez}}" name="desc_gravidez" style="border-style: hidden; text-align: center;"></td>
                            
                            
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
                                            class="form-check-input"disabled required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hemorragia"  disabled value="No"
                                            @if ($paciente->hemorragia=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique motivos" disabled type="text" maxlength="100" value={{$paciente->desc_hemorragia}}" name="desc_hemorragia" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td> Padece de Desmayos</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="desmayos"disabled value="Si"  
                                            @if ($paciente->desmayos=='Si') 
                                            checked
                                             
                                              @endif 
                                            required class="form-check-input"disabled required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="desmayos"disabled value="No" 
                                            @if ($paciente->desmayos=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique contexto que provoca desmayos"disabled maxlength="100" value={{$paciente->desc_desmayos}} type="text" name="desc_desmayos" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td> Padece de Asma</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="asma"disabled value="Si"  
                                            @if ($paciente->asma=='Si') 
                                            checked
                                             
                                              @endif  
                                            
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="asma"disabled value="No"
                                            @if ($paciente->asma=='No') 
                                            checked
                                             
                                              @endif  class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique serveridad" type="text" maxlength="100"disabled name="desc_asma"  value={{$paciente->desc_asma}} style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece Diábetes</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="diabetes" disabled value="Si" 
                                            @if ($paciente->diabetes=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="diabetes"disabled value="No"
                                            @if ($paciente->diabetes=='No') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique Tipo"type="text" disabled maxlength="100" name="desc_diabetes"  value={{$paciente->desc_diabetes}} style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece de Hipertension Arterial</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hipertension"disabled value="Si" 
                                            @if ($paciente->hipertension=='Si') 
                                            checked
                                             
                                              @endif 
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="hipertension"disabled value="No" 
                                            @if ($paciente->hipertension=='No') 
                                            checked
                                             
                                              @endif
                                            class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Ultimo registro de tension" disabled maxlength="100" type="text"  value={{$paciente->desc_hipertension}} name="desc_hipertension" style="border-style: hidden; text-align: center;"></td>
                            
                            
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
                                             class="form-check-input"disabled required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="epilepsia"disabled value="No"
                                            @if ($paciente->epilepsia=='No') 
                                            checked
                                              @endif
                                             class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique motivos y frecuencia" disabled maxlength="100" type="text"  value={{$paciente->desc_epilepsia}} name="desc_epilepsia" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece de Cancer Actualmente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_actual"disabled value="Si"
                                            @if ($paciente->cancer_actual=='Si') 
                                            checked
                                              @endif
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_actual" disabled value="No"
                                            @if ($paciente->cancer_actual=='No') 
                                            checked
                                              @endif 
                                              class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Indique Tipo de Cancer"type="text" disabled maxlength="100"  value={{$paciente->desc_cancer_actual}} name="desc_cancer_actual" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Ha padecido de Cancer</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_pasado" disabled value="Si"
                                            @if ($paciente->cancer_pasado=='Si') 
                                            checked
                                              @endif
                                                 class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="cancer_pasado" disabled value="No"
                                            
                                            @if ($paciente->cancer_pasado=='No') 
                                            checked
                                              @endif
                                            class="form-check-input">No
                                        </label>
                                    </div>

                            </td>
                            <td><input placeholder="Indique Tipo de Cancer"type="text" disabled maxlength="100"  value={{$paciente->desc_cancer_pasado}} name="desc_cancer_pasado" style="border-style: hidden; text-align: center;"></td>
                            
                           
                            
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
                                              @endif class="form-check-input"disabled required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="vih" disabled value="No"
                                            
                                            @if ($paciente->vih=='No') 
                                            checked
                                              @endif
                                               class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Fecha de prueba  positiva"  maxlength="100" disabled value={{$paciente->vih}} type="text" name="desc_vih" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Padece Enfermedad Inmunodeficiente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="inmunodeficiente" disabled value="Si" 
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
                                            value="No" disabled class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Nombre de la condicion"type="text" disabled maxlength="100"  value={{$paciente->desc_inmunodeficiente}} name="desc_inmunodeficiente" style="border-style: hidden; text-align: center;"></td>
                            
                            
                        </tr>
                        <tr>
                            <td>Fuma Actualmente</td>
                            <td>
                                <div class="form-group gender-select">
                                    <label class="gen-label"></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="fumador" disabled value="Si" 
                                            @if ($paciente->fumador=='Si') 
                                            checked
                                              @endif
                                            class="form-check-input" required>Si
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="fumador" disabled value="No"
                                            
                                            @if ($paciente->fumador=='No') 
                                            checked
                                              @endif
                                               class="form-check-input">No
                                        </label>
                                    </div>
                            </td>
                            <td><input placeholder="Desde Hace Cuanto?"type="text" disabled maxlength="100"  value={{$paciente->desc_fumador}} name="desc_fumador" style="border-style: hidden; text-align: center;"></td>
                             
                        </tr>
                    </tbody>
                </table>

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
@endsection
