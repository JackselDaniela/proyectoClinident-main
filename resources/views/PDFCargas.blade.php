@extends('layouts.layoutpdf')
<head>
    <title>Cargas.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Cargas de Insumos</h3>  
            <table style="padding-top: 0.5cm;" class="table table-striped text-center">
                <thead>
                      <tr>
                        <th>Código</th>
                        <th>Insumo</th>
                        <th>Cantidad</th>
                        <th>Elaboración</th>
                        <th>Vencimiento</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cargas as $carga)
                        @php
                          $operacion = $carga->operacion;
                        @endphp
                        <tr>
                          <td>{{ $carga->codigo }}</td>
                          <td>{{ $operacion->insumo->nombre }}</td>
                          <td>{{ $operacion->cantidad }}</td>
                          <td>{{ $carga->elaboracion->format('d-m-Y') }}</td>
                          <td>{{ $carga->vencimiento?->format('d-m-Y') ?? 'N/A' }}</td>
                          <td>{{ $carga->user->name }}</td>
                          <td>{{ $carga->created_at->format('d-m-Y') }}</td>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
            </table>   
        </div>
    </main>
@endsection



