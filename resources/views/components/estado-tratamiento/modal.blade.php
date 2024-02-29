@props(['diagnostico'])

@if ($diagnostico->siguiente?->estatus === 'En Proceso')
  <div class="modal" tabindex="-1" role="dialog" id="insumosModal">
    <div class="modal-dialog" style="max-width: 800px" role="document">
      <div class="modal-content" style="width: 800px">
        <div class="modal-header">
          <h4 class="modal-title">Iniciar Tratamiento</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="container-fluid" method="POST" action="{{ route('RutaT.update', $diagnostico)}}">
          <div class="modal-body" x-data="{ seleccionados: [] }">
            @method('PATCH') @csrf
            <p>Para iniciar el tratamiento, debe seleccionar los insumos médicos a utilizar.</p>
            <x-carrito-insumos title="Insumo" x-model="seleccionados" />
            <button type="submit" class="btn btn-primary submit-btn btn-press" :disabled="seleccionados.length < 1">
              Iniciar Tratamiento
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <form name="add-insumo" id="add-insumo"></form>
@endif

