@extends('layouts.layoutpdf')
<head>
    <title>Presupuesto.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
        <h3 class="normal" style="text-align: center;">Presupuesto</h3>
            <table style="padding-top: 1cm;" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col"># Pieza</th>
                        <th scope="col">Diagnostico</th>
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
        </div>
    </main>
@endsection



