export const select = (options) => ({
  options,
  selected: null,
  open: false,
  search: '',
  display: '',
  get searched() {
    return this.options.filter(({ title, id }) => {
      let included = true
      let inInsumos = false

      if (this.insumos !== undefined && this.insumos.length !== 0) {
        inInsumos = Boolean(
          this.insumos.find(insumo => insumo.id === id)
        )
      }

      if (this.search !== '') {
        const search = this.search.toLowerCase()
        included = title.toLowerCase().includes(search)
      }

      return !inInsumos && included && id !== this.selected
    })
  },
  get display() {
    if (this.selected === null) return 'Seleccionar...'

    const current = this.options.find(
      option => option.id === this.selected
    )

    const { title, subtitle } = current
    return `${title} - ${subtitle}`
  },
  openDropdown() {
    this.open = true

    setTimeout(() => {
      this.$refs.input.focus()
    }, 50);
  },
  closeDropdown() {
    this.open = false
    this.search = ''
  },
  selectOption() {
    const { id } = this.$el.dataset
    this.selected = Number(id)
    this.open = false
    this.search = ''
  }
})
