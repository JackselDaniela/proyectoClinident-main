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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
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

        .imgHeader {
            float: left;
            width: 3cm;
            margin: 0.5cm 0cm 0.5cm 2cm;
        }

        .infoHeader {
            float: left;
            margin-left: 1cm;
            margin: 0.5cm 3cm 1cm 1cm;
        }

        @font-face {
            font-family: "Rubik";
            src: url('{{ storage_path('fonts/Rubik-Bold.ttf') }}') format('truetype');
            font-weight: 400;
            font style: normal;
        }

        .normal {
            font-family: 'Rubik';
            font-weight: 400;
        }

        @font-face {
            font-family: "Rubik";
            src: url('{{ storage_path('fonts/Rubik-Bold.ttf') }}') format('truetype');
            font-weight: 400;
            font style: normal;
        }

        .clinident {
            font-family: 'Rubik';
            font-weight: 400;
        }

        @font-face {
            font-family: "Rubik";
            src: url('{{ storage_path('fonts/Rubik-Regular.ttf') }}') format('truetype');
            font-weight: 100;
            font style: normal;
        }

        .regular {
            font-family: 'Rubik';
            font-weight: 100;
        }
    </style>
</head>

<body>
    <header>
        <img style="padding-top: 20px;" class="imgHeader" src="{{ $logo }}" alt="">
        <div class="infoHeader">
            <h3 class="clinident" style="margin: 2px;">{{ $name }}</h3>
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
        <p><strong>Derechos Reservados - UPTA Aragua</strong></p>
    </footer>
</body>

</html>
