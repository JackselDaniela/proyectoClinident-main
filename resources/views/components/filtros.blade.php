@props(['filtro' => null, 'opciones' => null, 'name' => null])

@php
  $search = request()->query('search');
  $hasSearch = $search !== null && $search !== '';
@endphp

<form id="filter-form">
  <div class="row mb-3">
    <div class="col-sm-4 d-flex align-items-center">
      <input class="form-control" type="text" placeholder="Buscar..." name="search" id="search" value="{{ $search }}">
      @if ($hasSearch)
        <button class="btn btn-sm ml-2 btn-danger" type="button" id="reset-search">
          <i class="fa fa-close"></i>
        </button>
      @endif
      <button type="submit" class="btn btn-primary btn-sm ml-1">
        <i class="fa fa-search"></i>
      </button>
    </div>
    @if ($filtro !== null)
      @php
        $name ??= $filtro;
      @endphp
      <div class="col-sm-5 d-flex align-items-center">
        <label class="mb-0 mr-3" style="flex-shrink: 0">Filtrar por {{ $filtro }}: </label>
        <select class="form-control" name="{{ $name }}" id="{{ $name }}">
          <option value="">Todos</option>
          @foreach ($opciones as $opcion)
            <option 
              {{ request()->query($name) === $opcion ? 'selected' : '' }}
              value="{{ $opcion }}"
            >
              {{ $opcion }}
            </option>
          @endforeach
        </select>
      </div>
    @endif
  </div>
</form>
