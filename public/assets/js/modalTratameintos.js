let openModal = document.getElementById('openModal');

let modalTratamiento = document.getElementById('modal-tratamiento');
let closeModal = document.getElementById('close-btn');

console.log(closeModal)

closeModal.onclick = function () {
    console.log('true closemodal')
}

const temporal = document.getElementById('modal-pieza')


 openModal.onclick = function(){
     modalTratamiento.style.visibility ="visible";

 }
// //cerrar modal 
closeModal.onclick = function(){
    modalTratamiento.style.visibility="hidden";
}
 

