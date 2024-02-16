'use client'

const allowed = []

for (let i = 0; i <= 9; i++) {
  allowed.push(String(i))
}

allowed.push('Backspace', 'Enter', 'Alt', 'Control')

document.querySelectorAll('[data-mask="number"]').forEach(input => {
  input.addEventListener('keydown', (event) => {
    const valid = allowed.includes(event.key) || event.metaKey
      || event.ctrlKey
      || event.shiftKey
    if (!valid) {
      event.preventDefault()
    }
  })
})
