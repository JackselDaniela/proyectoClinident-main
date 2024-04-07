@props(['titulo'])

@php
    $settings = app('settings');
    $name = $settings['nom_website'] ?? 'Clinident';
    $logo = asset(
        empty($settings) ? 'assets/img/logoc.png' : 'storage/imagenes/' . $settings['logo'] ?? 'assets/img/logoc.png',
    );
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <style>
        header {
            width: 100vw;
            display: block;
            background-color: #8057B8;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            background-color: #8057B8;
            color: white;
            text-align: center;
        }

        .imgHeader {
            width: 2cm;
        }

        main {
            text-align: initial;


        }
    </style>
</head>

<body>
    <header class="d-flex  align-items-center p-2">
        <img class="imgHeader" src="{{ $logo }}" alt="">
        <div class="pl-3">
            <h3 class="clinident">{{ $name }}</h3>
            <h6 class="regular">
                Dirección: Calle Huérfanos 1227, Piso 2, oficina 221, Santiago, Chile.<br>
                Contacto: clinident@contacto.com <br>
                Teléfono: +56 5589 5548 55 <br>
                Código postal: 8340369 <br>
            </h6>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p class="m-0 py-2"><strong>Derechos Reservados - UPTA Aragua</strong></p>
    </footer>
</body>

</html>
