@extends('layouts.layoutpdf')

<head>
    <title>Reserva.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Reservas</h3>
            <div class="row justify-content-center">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="card-box border border-gray">
                                    <div class="card-block">
                                        <h3>Reserva N° {{ $reserva->codigo }}</h3>
                                        <p><b>Descripcion:</b> {{ $reserva->descripcion }}</p>
                                        <p>
                                            <b>Estatus:</b>
                                            <span style="filter: brightness(.9);" @class([
                                                'font-weight-bold',
                                                'text-warning' => $reserva->restitucion === null,
                                                'text-success' => $reserva->restitucion !== null,
                                            ])>
                                                {{ $reserva->estatus }}
                                            </span>
                                        </p>
                                        <p><b>Fecha de reserva:</b> {{ $reserva->created_at->format('d-m-Y') }}</p>
                                        <p><b>Fecha de restitución:</b>
                                            {{ $reserva->restitucion?->format('d-m-Y') ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card-box border border-gray">
                                    <div class="card-block">
                                        <h4 class="text-center mb-0">Equipos Médicos</h4>
                                        <ul class="list-group">
                                            @foreach ($reserva->items as $item)
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>{{ $item->operacion->insumo->nombre }}</span>
                                                    <span>{{ abs($item->operacion->cantidad) }}</span>
                                                </li>
                                            @endforeach
                                            <li class="list-group-item d-flex justify-content-between font-weight-bold">
                                                <span>Total</span>
                                                <span>{{ $reserva->cantidad }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </main>
@endsection
