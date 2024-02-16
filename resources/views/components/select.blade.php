@props(['key', 'name' => false])

<div class="position-relative" x-data="select(window.{{ $key }})" @click.outside="closeDropdown" x-modelable="selected" {{ $attributes }}>
  <span
    class="form-control"
    :class="selected === null && 'text-muted font-italic'"
    x-text="display"
    tabindex="0"
    @focus="openDropdown"
  >
    Seleccionar...
  </span>
  <i class="fa fa-chevron-down position-absolute select-arrow"></i>
  <ul class="list-group position-absolute shadow-sm select-list" x-show="open" x-cloak x-transition>
    <div class="list-group-item p-0">
      <input class="form-control" type="text" placeholder="Buscar..." x-ref="input" x-model="search" />
    </div>
    <template x-for="{ id, title, subtitle } in searched">
      <button @click="selectOption" :data-id="id" type="button" class="list-group-item select-item" :key="id">
        <p class="mb-0 font-weight-bold" x-text="title">
        </p>
        <p class="mb-0 mt-n1" x-text="subtitle">
        </p>
      </button>
    </template>
    <template x-if="searched.length === 0">
      <div class="list-group-item">
        No hay opciones disponibles.
      </div>
    </template>
  </ul>
  @if ($name)
    <input type="hidden" name="{{ $name }}" :value="selected" />
  @endif
</div>
