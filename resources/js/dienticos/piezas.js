const piezas = Array.from(document.querySelectorAll('.pieza'))
    .concat(Array.from(document.querySelectorAll('.pieza-2')))

const spanNumero = document.querySelector('#numero-pieza')

function changeNumber(event) {
    const link = event.currentTarget.parentElement
    const { id } = link
    const number = id.slice(1)
    spanNumero.innerText = number
}

piezas.forEach(pieza => {
    pieza.addEventListener('click', changeNumber)
})
