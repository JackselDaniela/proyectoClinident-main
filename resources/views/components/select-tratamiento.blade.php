<div class="position-relative" x-data="select" @click.outside="closeDropdown">
  <span
    class="form-control"
    :class="selected === null && 'text-muted font-italic'"
    x-text="display"
    @click="openDropdown"
  >
    Seleccionar...
  </span>
  <i class="fa fa-chevron-down position-absolute select-arrow"></i>
  <ul class="list-group position-absolute shadow-sm select-list" x-show="open" x-cloak x-transition>
    <div class="list-group-item p-0">
      <input class="form-control" type="text" placeholder="Buscar..." x-ref="input" x-model="search" />
    </div>
    <template x-for="{ id, nombre, tratamiento } in searched">
      <button @click="selectOption" :id="id" type="button" class="list-group-item select-item" :key="id">
        <p class="mb-0 font-weight-bold" x-text="nombre">
        </p>
        <p class="mb-0 mt-n1" x-text="tratamiento">
        </p>
      </button>
    </template>
    <template x-if="searched.length === 0">
      <div class="list-group-item">
        No se encontraron tratamientos.
      </div>
    </template>
  </ul>
  <input type="hidden" name="paciente_diagnosticos_id" :value="selected" />
</div>
