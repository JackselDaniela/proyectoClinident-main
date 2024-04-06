@extends('layouts.layoutpdf')
<head>
    <title>Reserva.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
        <div class="col-6">
          <h4 class="page-title">Reserva N° {{ $reserva->codigo }}</h4>
        </div>
        </div>
    </main>
@endsection
