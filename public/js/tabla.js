
$(document).ready(function() {
  $('.datatable').DataTable( {
    "destroy": true,
    "language": {
      "processing": "Procesando...",
"lengthMenu": "Mostrar _MENU_ registros",
"zeroRecords": "No se encontraron resultados",
"emptyTable": "Ningún dato disponible en esta tabla",
"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
"infoFiltered": "(filtrado de un total de _MAX_ registros)",
"search": "Buscar:",
"loadingRecords": "Cargando...",
"paginate": {
    "first": "Primero",
    "last": "Último",
    "next": "Siguiente",
    "previous": "Anterior"
},

"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
"stateRestore": {
    "creationModal": {
        "button": "Crear",
        "name": "Nombre:",
        "order": "Clasificación",
        "paging": "Paginación",
        "select": "Seleccionar",
        "columns": {
            "search": "Búsqueda de Columna",
            "visible": "Visibilidad de Columna"
        },
        "title": "Crear Nuevo Estado",
        "toggleLabel": "Incluir:",
        "scroller": "Posición de desplazamiento",
        "search": "Búsqueda",
        "searchBuilder": "Búsqueda avanzada"
    },
},
    }
  });
});
