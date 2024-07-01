@extends('layouts.plantilla')

@section('title')
  <title>Clinident / Gestión de Insumos</title>
@endsection

@section('contenido')
  <div class="page-wrapper">
    <div class="content">
    @include('components.flash-alerts')
      <div class="row">
        <div class="col-6">
          <h4 class="page-title">Cargas de Insumos</h4>
        </div>
        <div class="col-6">
          <a href="{{ route('cargas.create') }}" class="btn btn-primary float-right btn-rounded btn-add btn-press">
            <i class="fa fa-plus"></i>
            Registrar carga
          </a>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('Index') }}">Gestión de Insumos</a></li>
          <li class="breadcrumb-item">
            <a href="{{ route('cargas.index') }}">Cargas de Insumos</a>
          </li>
        </ol>
      </nav>
      <div class="col-sm-2 col-12" style="float: right">
        <div class="btn-group btn-group-sm">
            
          <a href="{{ route('cargasPDF') }}" target="_blank" class="btn btn-white"><img src="{{asset('assets/img/pdf.png')}}" style="width: 30px"></a>
        
        </div>
      </div>
      <x-filtros />
      <section>
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box">
              <div class="card-block">
                <div class="table-responsive">
                  <table class="datatable table table-stripped" style="overflow: hidden;!important">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Insumo</th>
                        <th>Cantidad</th>
                        <th>Elaboración</th>
                        <th>Vencimiento</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cargas as $carga)
                        @php
                          $operacion = $carga->operacion;
                        @endphp
                        <tr>
                          <td>{{ $carga->codigo }}</td>
                          <td>{{ $operacion->insumo->nombre }}</td>
                          <td>{{ $operacion->cantidad }}</td>
                          <td>{{ $carga->elaboracion->format('d-m-Y') }}</td>
                          <td>{{ $carga->vencimiento?->format('d-m-Y') ?? 'N/A' }}</td>
                          <td>{{ $carga->user->name }}</td>
                          <td>{{ $carga->created_at->format('d-m-Y') }}</td>
                          <td class="actions-td">
                            <a href="{{ route('cargas.edit', $carga) }}">
                              <i class="fa fa-edit" style="width: 1rem; color:#9B59B6;"></i>
                            </a>
                            @if ($carga->mutable)
                              <form class="d-inline formulario-eliminar" method="POST" action="{{ route('cargas.destroy', $carga) }}">
                                @csrf @method('DELETE')
                                <button class="btn-icon" type="submit">
                                  <i class="fa fa-trash-o" style="width: 1rem; color:red;"></i>
                                </button>
                              </form>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
  <script src="{{ asset('js/tabla.js') }}"></script>
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
    $('.formulario-eliminar').submit(function(e){
      e.preventDefault();
        Swal.fire({
          title: "Esta seguro de eliminar este archivo?",
          text: "Se eliminara permanentemente!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#6f42c1",
          cancelButtonColor: "#d33",
          confirmButtonText: "¡Sí, eliminar!",
          cancelButtonText: "Cancelar",
        }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
          }
        });
      })
  </script>
@endsection
