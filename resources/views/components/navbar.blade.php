@props(['user'])

@php
    $user = $user->persona;
    $settings = app('settings');
    $name = $settings['nom_website'] ?? 'Clinident';
    $logo = asset(
        empty($settings) ? 'assets/img/logoc.png' : 'storage/imagenes/' . $settings['logo'] ?? 'assets/img/logoc.png',
    );
@endphp

<nav class="header">
    <div class="header-left">
        <a href="{{ asset('Index') }}" class="logo">
            <img src="{{ $logo }}" width="35" height="35" alt="">
            <span>{{ $name }}</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">
        <li class="nav-item" style="color: aliceblue; padding-top:1rem;">

            @php
                use Illuminate\Support\Carbon;
                Carbon::setLocale('es_VE');
                setLocale(LC_TIME, 'es_VE.UTF8');
                $dias = [
                    'Mon' => 'Lunes',
                    'Tue' => 'Martes',
                    'Wed' => 'Miercoles',
                    'Thu' => 'Jueves',
                    'Fri' => 'Viernes',
                    'Sat' => 'Sábado',
                    'Sun' => 'Domingo',
                ];

            @endphp
            {{ $dias[now()->shortLocaleDayOfWeek] }}
            {{ now()->format('d / m / Y, H:i') }}



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
                    <img class="rounded-circle"
                        src="{{ $user->foto == null ? asset('assets/img/user.jpg') : asset('storage/imagenes/' . $user->foto) }}"
                        width="24" alt="Admin">
                    <span class="status online"></span>
                </span>
                <span>
                    {{ $user->nombre }}
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
