import { select } from './alpine-components/select.js'

document.addEventListener('alpine:init', () => {
  Alpine.data('select', select)

  Alpine.data('form', () => ({
    insumo: null,
    get selected() {
      return Boolean(this.insumo)
    },
    get max() {
      return window.insumos.find(el => el.id === this.insumo)?.max
    }
  }))
})
