@props(['nombre'])

<nav class="header">
    <div class="header-left">
        <a href="{{ asset('Index') }}" class="logo">
            <img src="{{ asset('assets/img/logoc.png') }}" width="35" height="35" alt="">
            <span>Clinident</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item" style="color: aliceblue; padding-top:1rem;">
            {{-- @php
                use Illuminate\Support\Carbon;
                Carbon::setLocale('es_VE');
                setLocale(LC_TIME, 'es_VE');
            @endphp --}}
            @php
                date_default_timezone_set('America/Caracas');
                $fechaActual = date('d-m-Y');
                $horaActual = date('h:i:s');

                echo "Fecha:$fechaActual Hora: $horaActual";

            @endphp
            {{-- {{ now()->shortLocaleDayOfWeek }}


            {{ now()->format('d-m-Y') }} --}}

        </li>
        <li class="nav-item dropdown d-none d-sm-block">
            <x-menu-notificaciones />
        </li>


        <li class="nav-item dropdown d-none d-sm-block">
            <a href="{{ asset('Ayuda') }}" class="nav-link"><i class="fa fa-question-circle"></i></a>
        </li>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img">
                    <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="24" alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>
                    {{ $nombre }}
                </span>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ asset('Perfil') }}">Mi Perfil</a>
                    <form action="{{ route('login.cerrarSesion') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit">Cerrar Sesion</button>

                    </form>

                </div>
            </a>

        </li>
    </ul>

</nav>
