@extends('layouts.layoutpdf')
<head>
    <title>Presupuesto.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Presupuesto</h3>
            <table style="padding-top: 1cm;" class="table table-striped text-left">
                <tbody>
                    <tr>
                        <td><h5  class="regular">Nombre del Paciente: {{$paciente->persona->nombre.' '.$paciente->persona->apellido}} </h5></td>
                    </tr>
                </tbody>
            </table>   
            <table style="padding-top: 0.5cm;" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col"># Pieza</th>
                        <th scope="col">Diagnóstico</th>
                        <th scope="col">Procedimiento</th>
                        <th scope="col">Costo</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($paciente_diagnostico as $paciente_diagnostico)
                            
                    <tr>
                    <td width="12%" >{{$paciente_diagnostico->pieza->nom_pieza}}</td>
                    <td width="12%" >{{$paciente_diagnostico->diagnostico->diagnostico}}</td>
                    <td width="12%" >{{$paciente_diagnostico->registrar_tratamiento->nom_tratamiento}}</td>
                    <td width="12%" >{{$paciente_diagnostico->registrar_tratamiento->costo_tratamiento}}</td>>
                                                
                    </tr>
                @endforeach
                
                </tbody>
            </table>   
            <table style="padding-top: 0.5cm;" class="table table-striped text-right">
                <tbody>
                    <tr>
                        <td><h5 class="regular text-right">Presupuesto Total: {{$presupuestoT}}$</h5></td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </main>
@endsection



