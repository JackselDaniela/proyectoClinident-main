<<<<<<< HEAD
@extends('layouts.layoutpdf')
<head>
    <title>RegistroPacientes.pdf</title>
</head>
@section('content')
    <main>
        <div class="container">
            <h3 class="normal" style="text-align: center;">Pacientes Registrados</h3>
            <table style="padding-top: 1cm;" class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Doc. Identidad</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
               <tbody>
=======
<x-layout-pdf titulo="ListaPacientes.pdf">

    <div class="container">
        <h3 class="normal" style="text-align: center;">Pacientes Registrados</h3>
        <table style="padding-top: 1cm;" class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Doc. Identidad</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                </tr>
            </thead>
            <tbody>
>>>>>>> 2e139e8fc782e65bdd91d890ef5e7999c021d21a
                @foreach ($paciente as $paciente)
                    @php
                        $persona = $paciente->persona;
    
                    @endphp
                    <tr>
<<<<<<< HEAD
                    <td width="12%" >{{$persona->doc_identidad;}}</td>
                    <td width="12%" > {{$persona->nombre.' '.$persona->apellido;}}</a></td>
                    <td width="12%" >{{$persona->fecha_nacimiento;}}</td>
                    <td width="12%" >{{$persona->dato_ubicacion->direccion;}}</td>
                    <td width="12%" >{{$persona->dato_ubicacion->telefono;}}</td>
                    <td width="12%" >{{$persona->user->email;}}</td>
                                                
                    </tr>
                @endforeach 
                </tbody>
            </table>   
        </div>
    </main>
@endsection



=======
                        <td width="12%">{{ $persona->doc_identidad }}</td>
                        <td width="12%"> {{ $persona->nombre . ' ' . $persona->apellido }}</a></td>
                        <td width="5%">edad</td>
                        <td width="12%">{{ $persona->dato_ubicacion->direccion }}</td>
                        <td width="12%">{{ $persona->dato_ubicacion->telefono }}</td>
                        <td width="12%">{{ $persona->dato_ubicacion->correo }}</td>
    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout-pdf>
>>>>>>> 2e139e8fc782e65bdd91d890ef5e7999c021d21a
