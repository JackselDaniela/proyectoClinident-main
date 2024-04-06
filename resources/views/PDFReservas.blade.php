@extends('layouts.layoutpdf')
<head>
    <title>Reserva.pdf</title>
</head>
@section('content')
       <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Reservas</h3> 
            <table style="padding-top: 1cm;" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Cant. Equipos</th>
                        <th>Restitución</th>
                    </tr>
                </thead>
               <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                          <td>{{ $reserva->codigo }}</td>
                          <td style="max-width: 25ch">{{ $reserva->descripcion }}</td>
                          <td>{{ $reserva->created_at->format('d-m-Y') }}</td>
                          <td>{{ $reserva->cantidad }} equipos</td>
                          <td>{{ $reserva->restitucion?->format('d-m-Y') ?? 'N/A' }}</td>
                           
                          </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        </div>
    </main>
@endsection
