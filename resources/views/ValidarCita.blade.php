AñadirD
@extends('layouts.plantilla')

@section('title')
    <title>
        Clinident / Validar cita</title>
@endsection
@section('css-externo')
@endsection

@section('contenido')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title" style="padding-left: -10rem; margin-left:-10rem">Validar cita</h4>
                </div>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Citas</a></li>
                    <li class="breadcrumb-item"><a href="#">Validar cita</a></li>
                </ol>
            </nav>


            <section>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (isset($info))
                    <div class="alert alert-info" role="alert">
                        {{ $info }}
                    </div>
                @endif
                @if (isset($cita))
                    <h4 class=" text-center" style="padding: 2rem 0;">Validar cita</h4>

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">

                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-info" role="alert">
                                        <p class="text-center" style="margin-bottom: -0.2rem">
                                            La cita fue pautada desde las
                                            {{ \Carbon\Carbon::parse($cita->inicio)->format('h:i a') }} a
                                            {{ \Carbon\Carbon::parse($cita->fin)->format('h:i a') }} del
                                            {{ \Carbon\Carbon::parse($cita->fecha)->format('d-m-Y') }}
                                        </p>
                                    </div>

                                    <p class="font-weight-bold">Doctor:
                                        {{ $cita->doctor->persona->nombre . ' ' . $cita->doctor->persona->apellido . ' - ' . $cita->doctor->especialidad->especialidad }}
                                    </p>
                                    <p>Por una cita de {{ $cita->tipo_consulta->tipo_consulta }}</p>
                                </div>
                            </div>


                            @if (isset($cita) && is_null($cita->confirmacion))
                                <div class="row">

                                    <form action="{{ route('CitasC.validar', $cita->token) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="validacion" value="confirmar">
                                        <div class="col-6">
                                            <div class="m-t-20 text-center">
                                                <button type="submit" class="btn btn-primary submit-btn"
                                                    style="list-style: none; color: aliceblue;">Confirmar</button>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="{{ route('CitasC.validar', $cita->token) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="validacion" value="rechazar">
                                        <div class="col-6">
                                            <div class="m-t-20 text-center">
                                                <button type="submit" class="btn btn-danger submit-btn"
                                                    style="list-style: none; color: aliceblue;">Rechazar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection

@section('js-externo')
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    @if (session('danger'))
        <script>
            window.close();
        </script>
    @endif
@endsection
