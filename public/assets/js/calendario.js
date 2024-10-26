
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
     
      locale: 'es',
      height: '30rem',
      expandRows: true,
      slotMinTime: '08:00',
      slotMaxTime: '20:00',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      initialView: 'dayGridMonth',
      
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectHelper: true,

      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      moreLinkContent: function(args) {
       return 'ver ' + args.num +' mas'

      },
      
      events: window.evento,
      select: function(args) {
        $('#agendarCita').modal({backdrop:'static', keyboard:true})
        let inputFecha = document.getElementById('fecha')
        inputFecha.value = args.startStr
       },
       eventClick: function(info) {
        let inputFechaa = document.getElementById('fecha_')
        let inputInicio = document.getElementById('inicio_')
        let inputFin = document.getElementById('fin_')
        let inputDescripcion = document.getElementById('descripcion_')
        let selectTipoConsulta = $('#tipo_consulta')
        let ruta = `Calendario/${info.event.id}`
        let formEditar = document.getElementById('formEditar')
        let formEliminar = document.getElementById('formEliminar')

        const { formateado, tipo_consultas_id } = info.event._def.extendedProps
        const { inicio, fin, fecha } = formateado
        inputFechaa.value = fecha
        inputInicio.value = inicio
        inputFin.value = fin
        selectTipoConsulta.val(tipo_consultas_id).trigger('change') 
        inputDescripcion.value = info.event.title

        formEditar.action += ruta
        formEliminar.action += ruta

        $('#editarCita').modal({backdrop:'static', keyboard:true})

        console.log(tipo_consultas_id, selectTipoConsulta.value)

       }


    });
    
    calendar.render();
  });
