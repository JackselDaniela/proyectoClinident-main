@extends('layouts.layoutpdf')
<head>
    <title>TratamientoRealizados.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Tratamientos Realizados</h3> 
            <table style="padding-top: 1cm;" class="table table-striped text-center">
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
    </main>
@endsection