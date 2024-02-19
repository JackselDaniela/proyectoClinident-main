@props(['diagnostico'])
@php
  $estatus = $diagnostico->siguiente?->estatus;
@endphp

@if ($estatus === 'Terminado')
  <form method="POST" action="{{ route('RutaT.update', $diagnostico)}}">
    @method('PATCH') @csrf
    <button type="submit" class="btn btn-primary btn-rounded btn-press btn-add">
      <i class="fa fa-check"></i>
      Finalizar Tratamiento
    </button>
  </form>
@elseif ($estatus === 'En Proceso')
  <button type="button" class="btn btn-primary btn-rounded btn-press btn-add" data-toggle="modal" data-target="#insumosModal">
    <i class="fa fa-play"></i>
    Iniciar Tratamiento
  </button>
@endif
