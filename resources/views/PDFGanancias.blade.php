@extends('layouts.layoutpdf')

<head>
  <title>RegistroPacientes.pdf</title>
</head>

@section('content')
  <main>
    <div class="container">
      <h3 class="normal mb-5" style="text-align: center;">
        Ganancias del Doctor: {{ $doctor->persona->nombre }}
      </h3>
      <div>
        <h5 class="m-b-10">Acumulado Clinica</h5>
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>
                <strong>Acumulado Clinica</strong>
                <span class="float-right">${{ $total_hospital ?? 0 }}</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <h5 class="mt-3">Acumulado Doctor</h5>
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
      <h5 class="mt-3">Trabajos realizados</h5>
      <table class="table">
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
              <td>{{ $trabajo->pacientes_id }}</td>
              <td>{{ $trabajo->registrar_tratamientos_id->nom_tratamiento }}</td>
              <td>{{ $trabajo->registrar_tratamientos_id->costo_tratamiento }}</td>
              <td>{{ date('d-m-Y', strtotime($trabajo->updated_at)) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
@endsection
