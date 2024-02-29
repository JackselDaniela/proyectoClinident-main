const check = document.querySelector('#carga')
const select = document.querySelector('#tipo')
const section = document.querySelector('#carga-section')
const inputs = document.querySelectorAll('#carga-section input')
const vencimiento = document.querySelector('#vencimiento')

const toggleInputs = () => {
  const { checked } = check
  section.hidden = !checked
  
  inputs.forEach(input => {
    if (input.id === 'vencimiento') return
    input.disabled = !checked
    input.required = checked
  })

  const equipo = select.value === 'Equipo Médico'
  const container = vencimiento.parentElement.parentElement
  container.style.display = equipo ? 'none' : null
  vencimiento.disabled = equipo || !checked
  vencimiento.required = !equipo && checked
}

check.addEventListener('input', toggleInputs)
$('#tipo').on('change', toggleInputs)
