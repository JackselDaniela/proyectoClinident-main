const check = document.querySelector('#carga')
const section = document.querySelector('#carga-section')
const inputs = document.querySelectorAll('#carga-section input')

const toggle = (value) => {
  section.hidden = value
  inputs.forEach(input => {
    input.disabled = value
    input.required = !value
  })
}

check.addEventListener('input', () => toggle(!check.checked))
