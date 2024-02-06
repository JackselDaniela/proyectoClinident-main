// Captura del Id del estado para filtrar ciudades y estados 
function CargarMunicipiosCiudades(estadoSelect){
 //console.log(estadoSelect.value)
  let estadoId = estadoSelect.value;
  if (estadoId==='Seleccione'){
   clearSelect(document.getElementById('municipio'));

   return 0;
  }
  fetch (`api/municipio/${estadoId}/municipios`)
  .then(function (response){
    console.log(response);
     return response.json();
    })  
    .then (function(jsonData)
    {
       // console.log(jsonData);
      construirMunicipioSelect(jsonData.municipios)
      construirCiudadSelect(jsonData.ciudades)

   })
}  

function construirMunicipioSelect(jsonData){

      //obtener referencia del select
      let municipioSelect= document.getElementById('municipio');
      clearSelect(municipioSelect);
     

      jsonData.forEach(function(municipio) {
          let optionTag= document.createElement('option');
          optionTag.value=municipio.id_municipio;
          optionTag.innerText=municipio.municipio;
          municipioSelect.append(optionTag)

        
    });
}

function construirCiudadSelect(jsonData){

      //obtener referencia del select
      let ciudadSelect= document.getElementById('ciudad');
      clearSelect(ciudadSelect);
     

      jsonData.forEach(function(ciudad) {
          let optionTag= document.createElement('option');
          optionTag.value=ciudad.id_ciudad;
          optionTag.innerText=ciudad.ciudad;
          ciudadSelect.append(optionTag)

        
    });
}

//Capturar Id de municipio para filtrar parroquias

function CargarParroquia(municipioSelect){
   console.log(municipioSelect);
    let municipioId=municipioSelect.value;
    
    if (municipioId==='Seleccione'){
     clearSelect(document.getElementById('parroquia'));
  
     return 0;
    }

    fetch (`api/parroquia/${municipioId}/parroquias`)
  .then(function (response){
    //console.log(response);
     return response.json();
    })  
    .then (function(jsonData)
    {
       // console.log(jsonData);
      construirParroquiaSelect(jsonData)

   })
}
  
function construirParroquiaSelect(jsonData){

      //obtener referencia del select
      let parroquiaSelect= document.getElementById('parroquia');
      clearSelect(parroquiaSelect);
     

      jsonData.forEach(function(parroquia) {
          let optionTag= document.createElement('option');
          optionTag.value=parroquia.id_parroquia;
          optionTag.innerText=parroquia.parroquia;
          parroquiaSelect.append(optionTag)

        
    });
}

function clearSelect(select){
    let hijos= Array.from(select.children)
    hijos.forEach(function(hijo){ 
      hijo.remove()
    })
    let optionTag= document.createElement('option');
    optionTag.innerText='Seleccione';
    select.append(optionTag)
}
