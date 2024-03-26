function loadImage(event) {
    const imagen = document.getElementById("mostrarImagen");
    imagen.src = URL.createObjectURL(event.target.files[0]);
}
