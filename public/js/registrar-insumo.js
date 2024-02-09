const check = document.querySelector('#carga')
const select = document.querySelector('#tipo')
const section = document.querySelector('#carga-section')
const inputs = document.querySelectorAll('#carga-section input')
const vencimiento = document.querySelector('#vencimiento')

check.addEventListener('input', () => {
  const { checked } = check
  section.hidden = !checked
  
  inputs.forEach(input => {
    input.disabled = !checked
    input.required = checked
  })
})

$('#tipo').on('change', () => {
  const equipo = select.value === 'Equipo Médico'
  const container = vencimiento.parentElement.parentElement
  container.style.display = equipo ? 'none' : null
  vencimiento.disabled = equipo
  vencimiento.required = !equipo
})
