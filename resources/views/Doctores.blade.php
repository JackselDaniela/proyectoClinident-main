@extends('layouts.plantilla')

@section('title')
    <title>Clinident / Doctores</title>
@endsection
@section('css-externo')
@endsection
@section('contenido')
    <div class="page-wrapper">
        <div class="content">
        @include('components.flash-alerts')
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Doctores</h4>
                </div>
                {{-- BOTON MODAL --}}

                <div class="col-sm-8 col-9 text-right m-b-20">
                    <button class="btn btn-primary float-right btn-rounded btn-press btn-add"><i class="fa fa-plus"></i> <a
                            href="{{ asset('AnadirD') }}" style="color: aliceblue">Añadir Doctor</a></button>
                </div>
                {{-- BOTON MODAL --}}

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> Doctores</a></li>
                    <li class="breadcrumb-item"><a href="#">Registrar Doctor</a></li>
                </ol>
            </nav>
            <section>

                <div class="row doctor-grid justify-content-start">
                    @foreach ($doctor as $doctor)
                        <div class="col-md-4 col-sm-4  col-lg-3">
                            <div class="profile-widget">
                                <div class="doctor-img">
                                    <a class="avatar" href="{{ asset('Perfil') }}"><img alt=""
                                            src="{{ $doctor->persona->foto == null ? asset('assets/img/doctor-thumb-03.jpg') : asset('storage/imagenes/' . $doctor->persona->foto) }}"></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                            href="{{ route('EditarPD.edit', ['id' => $doctor->id]) }}"><i
                                                class="fa fa-pencil m-r-5"></i> Editar</a>
                                        <a id="formularioEliminar" class="dropdown-item" href="{{ route('eliminarD', ['id' => $doctor->id]) }}"
                                            data-toggle="modal" "><i class="fa fa-trash-o m-r-5"></i> Borrar</a>
                                        </div>
                                    </div>
                                <h4 class="doctor-name text-ellipsis"><a href="{{ asset('Perfil') }}"> {{ $doctor->persona->nombre . ' ' . $doctor->persona->apellido }} </a></h4>
                                <div class="doc-prof"> {{ $doctor->especialidad->especialidad }} </div>
                                <div class="user-country">
                                    {{ $doctor->persona->nacionalidad->nacionalidad }} {{ $doctor->persona->doc_identidad }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>


            <div class="row">
                <div class="col-sm-12">
                    <div class="see-all">
                        <a class="see-all-btn" href="javascript:void(0);">Mostrar Mas</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js-externo')
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="{{ asset('/assets/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.fullcalendar.js') }}"></script>
    <script src="{{ asset('/assets/js/app.js') }}"></script>
    <script src="{{ asset('/assets/js/modal.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'ok')
        <script>
        Swal.fire({
            title: "Eliminado!",
            text: "El archivo fue eliminado correctamente.",
            icon: "success" 
        });
        </script>
    @endif

    <script>
        document.querySelectorAll('#formularioEliminar').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Previene la acción por defecto del enlace
                Swal.fire({
                    title: "¿Está seguro de eliminar este archivo?",
                    text: "¡Se eliminará permanentemente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#6f42c1",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Sí, eliminar!",
                    cancelButtonText: "Cancelar",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = this.href; // Redirige a la URL si el usuario confirma
                    }
                });
            });
        });
    </script>
@endsection
