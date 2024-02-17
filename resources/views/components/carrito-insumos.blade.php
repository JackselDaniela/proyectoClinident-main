@props(['title'])

<div class="row">
  <div class="col-sm-12">
    <div class="card-box border" style="border-color: #eee">
      <div class="card-block" x-data="insumos" x-modelable="insumos" @addinsumo.window="addInsumo" {{ $attributes }}>
        <div class="row justify-content-center align-items-center">
          <div class="col-sm-4">
            <div class="form-group">
              <label>
                {{ $title }}
                <span class="text-danger">*</span>
              </label>
              <x-select key="insumos" x-model="insumo" />
            </div>
          </div>
          <div class="col-sm-4" x-show="insumo !== null" x-cloak>
            <div class="form-group">
              <label for="cantidad">
                Cantidad (max. <span x-text="datosInsumo(insumo)?.max"></span>)
                <span class="text-danger">*</span>
              </label>
              <input form="add-insumo" class="form-control" value="{{ old('cantidad') }}" min="1" :max="Number(datosInsumo(insumo)?.max) + 5" placeholder="Ej. 50" name="cantidad" id="cantidad" type="number" x-model="cantidad" required />
              @error('cantidad')
                <p class="text-danger">
                  {{ $message }}
                </p>
              @enderror
            </div>
          </div>
          <div class="col-sm-2">
            <button form="add-insumo" type="submit" class="btn btn-primary" :disabled="!submitable">
              <i class="fa fa-plus"></i>
              Añadir
            </button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>Código</th>
                <th>Equipo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <template x-for="{ id, cantidad }, index in insumos">
                <tr x-data="{ current: datosInsumo(id) }">
                  <td x-text="current.subtitle"></td>
                  <td x-text="current.title"></td>
                  <td x-text="cantidad"></td>
                  <td>
                    <button @click="removeInsumo" :data-id="id" type="button" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                    <input type="hidden" :name="`insumos[${index}][id]`" :value="id">
                    <input type="hidden" :name="`insumos[${index}][cantidad]`" :value="cantidad">
                  </td>
                </tr>
              </template>
              <template x-if="insumos.length === 0">
                <tr>
                  <td class="text-center" colspan="4">
                    No se ha añadido ningún {{ strtolower($title) }}.
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

