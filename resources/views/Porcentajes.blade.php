@extends('layouts.plantilla2')

@section('title')
<title>Clinident / Gestion de Usuario</title>
@endsection
@section('css-externo')

@endsection
@section('contenido')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Configuración de la Clinica</h4>
            </div>

        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('Index')}}">Configuración</a></li>
                <li class="breadcrumb-item"><a href="{{asset('GestionU')}}">Gestion de Usuario</a></li>
                <li class="breadcrumb-item"><a href="{{asset('Porcentajes')}}"> Ajuste de Porcentajes</a></li>
            </ol>
        </nav>
        <section>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{route('Porcentajes.store')}}" method="POST">
                        @csrf
                        <h3 class="page-title text-center" style="padding-bottom: 3rem">Ajuste de Porcentajes</h3>
                        <p class="text-bold" id="message-container">{{ isset($message) ? $message : '' }}</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Porcentaje de la clinica (%)</label>
                                    <input type="number" class="form-control" name="porcentaje_clinica" id="porcentaje_clinica" min="0" max="100" value="{{ isset($porcentaje->porcentaje_clinica) ? $porcentaje->porcentaje_clinica : '' }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Porcentaje Doctor (%)</label>
                                    <input type="number" class="form-control bg-light" name="porcentaje_doctor" id="porcentaje_doctor" readonly value="{{ isset($porcentaje->porcentaje_doctor) ? $porcentaje->porcentaje_doctor : '' }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 text-center m-t-20">
                                <button type="submit" class="btn btn-primary submit-btn">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>

    </div>
</div>
@endsection

@section('js-externo')
    <script src="{{ asset('assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script>
        const inputPorcentajeClinica = document.getElementById('porcentaje_clinica')
        const inputPorcentajeDoctor = document.getElementById('porcentaje_doctor')
        const messageElement = document.getElementById('message-container')

        const setMessage = (message) => {
            messageElement.innerText = message
        }

        const GANANCIA_MAXIMA = 100

        if (!inputPorcentajeClinica.value) {
            setMessage('Configure los ajustes de porcentaje.')
        }

        const getGananciaDoctor = (porcentaje) => {
            if (porcentaje > GANANCIA_MAXIMA) {
                throw 'El porcentaje maximo debe ser menor a ' + GANANCIA_MAXIMA
            }

            if (porcentaje < 0) {
                throw 'No ingresar numeros negativos'
            }

            if (porcentaje >= (GANANCIA_MAXIMA - 1)) {
                throw 'Debe quedar al menos un porcentaje minimo para el doctor'
            }

            return GANANCIA_MAXIMA - porcentaje
        }

        inputPorcentajeClinica.onkeyup = (e) => {
            try {
                const porcentaje = Number(e.target.value)

                if (porcentaje === 0) {
                    e.target.value = 0
                }

                const porcentajeDoctor = getGananciaDoctor(porcentaje)
                setMessage('')

                inputPorcentajeDoctor.value = porcentajeDoctor
            } catch (error) {
                inputPorcentajeDoctor.value = ''
                setMessage(error)
            }
        }
    </script>
@endsection
