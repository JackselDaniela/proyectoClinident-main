export const insumos = () => ({
  insumos: [],
  insumo: null,
  cantidad: null,
  get submitable() {
    return this.insumo !== null && this.cantidad !== null
  },
  addInsumo() {
    this.insumos.push({ id: this.insumo, cantidad: this.cantidad })
    this.insumo = null
    this.cantidad = null
  },
  removeInsumo(id) {
    const index = this.insumos.findIndex(ins => ins.id === id)
    this.insumos.splice(index, 1)
  },
  datosInsumo(id) {
    return window.insumos.find(ins => ins.id === id)
  },
})
