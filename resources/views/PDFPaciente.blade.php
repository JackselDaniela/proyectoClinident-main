<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RegistroPacientes.pdf</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page {
            margin: 3cm 0cm 2cm 0cm;
            font-size: 1em;
        }

        body {
            margin: 2cm 2cm 2cm;    
        }

        header {
            position: fixed;
            top: -3cm;
            left: 0cm;
            right: 0cm;
            height: 5cm;
            background-color: #8057B8;
            color: white;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: -2cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #8057B8;
            color: white;
            text-align: center;
            line-height: 50px;
        }
        
        .imgHeader{
            float: left;
            width: 3cm;
            margin: 0.5cm 0cm 0.5cm 2cm;
        }
        .infoHeader{
            float: left;
            margin-left: 1cm;
            margin: 0.5cm 3cm 1cm 1cm;
        }
        @font-face{
            font-family:"Rubik";
            src: url('{{ storage_path('fonts/Rubik-Bold.ttf') }}') format('truetype');
            font-weight: 400;
            font style: normal;
        }
        .normal{
            font-family: 'Rubik';
            font-weight: 400;
        }
        @font-face{
            font-family:"Rubik";
            src: url('{{ storage_path('fonts/Rubik-Bold.ttf') }}') format('truetype');
            font-weight: 400;
            font style: normal;
        }
        .clinident{
            font-family: 'Rubik';
            font-weight: 400;
        }
        @font-face{
            font-family:"Rubik";
            src: url('{{ storage_path('fonts/Rubik-Regular.ttf') }}') format('truetype');
            font-weight: 100;
            font style: normal;
        }
        .regular{
            font-family: 'Rubik';
            font-weight: 100;
        }
    </style>
</head>
<body>
    <header>
        <img  style="padding-top: 20px;" class="imgHeader" src="{{public_path('assets/img/logoc.png')}}" alt="">
        <div class="infoHeader">
            <h3 class="clinident" style="margin: 2px;">Clinident</h3>
            <h6 class="regular">
            Dirección: Calle Huérfanos 1227, Piso 2, oficina 221, Santiago, Chile.<br>
            Contacto: clinident@contacto.com <br>
            Teléfono: +56 5589 5548 55 <br>
            Código postal: 8340369 <br>
            </h6>
        </div>
    </header>
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
                @foreach ($paciente as $paciente)
                    @php
                        $persona = $paciente->persona;
                                                        
                    @endphp
                    <tr>
                    <td width="12%" >{{$persona->doc_identidad;}}</td>
                    <td width="12%" > {{$persona->nombre.' '.$persona->apellido;}}</a></td>
                    <td width="5%" >edad</td>
                    <td width="12%" >{{$persona->dato_ubicacion->direccion;}}</td>
                    <td width="12%" >{{$persona->dato_ubicacion->telefono;}}</td>
                    <td width="12%" >{{$persona->dato_ubicacion->correo;}}</td>
                                                
                    </tr>
                @endforeach 
                </tbody>
            </table>   
        </div>
    </main>
    <footer>
        <p><strong>Derechos Reservados - UPTA Aragua</strong></p>
    </footer>
</body>
</html>


