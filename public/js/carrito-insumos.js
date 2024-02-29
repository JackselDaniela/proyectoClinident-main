import { select } from './alpine-components/select.js'
import { insumos } from './alpine-components/insumos.js'

document.addEventListener('alpine:init', () => {
  Alpine.data('insumos', insumos)
  Alpine.data('select', select)
})

document.querySelector('#add-insumo').addEventListener('submit', (event) => {
  event.preventDefault()
  window.dispatchEvent(new CustomEvent('addinsumo'))
})
