@extends('layouts.layoutpdf')

<head>
  <title>Ganancias.pdf</title>
</head>

@section('content')
  <main>
    <div class="container">
      <h3 class="normal mb-5" style="text-align: center;">
        Ganancias del Doctor: {{ $doctor->persona->nombre .'  '. $doctor->persona->apellido}}
      </h3>
      <h5 class="normal" style="text-align: center;">Trabajos realizados</h5>
      <table class="table table-striped text-center" style="padding-top:0.5cm;">
        <thead>
          <tr>
            <th>Paciente</th>
            <th>Tratamiento</th>
            <th>Costo</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($trabajos as $trabajo)
            <tr>
              <td>{{  $trabajo->paciente->persona->nombre .'  '. $trabajo->paciente->persona->apellido }}</td>
              <td>{{ $trabajo->registrar_tratamientos_id->nom_tratamiento }}</td>
              <td>{{ $trabajo->registrar_tratamientos_id->costo_tratamiento }}</td>
              <td>{{ date('d-m-Y', strtotime($trabajo->updated_at)) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div style="padding-top:1.5cm;">
        <h5 class="m-b-10" class="normal">Acumulado Clínica</h5>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>
                <strong>Acumulado Clínica</strong>
                <span class="float-right">${{ $total_hospital ?? 0 }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div style="padding-top:0.5cm;">
        <h5 class="mt-3" class="normal">Acumulado Doctor</h5>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>
                <strong>Sueldo neto</strong>
                <span class="float-right">${{ $total_doctor ?? 0 }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
@endsection
