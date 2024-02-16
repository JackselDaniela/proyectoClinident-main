
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {
     
      locale: 'es',
      height: '100%',
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
      moreLinkContent: function(args){
       return 'ver '+args.num +' mas'

      },
      
      events: evento,
      select: function(args) {
        $('#agendarCita').modal({backdrop:'static', keyboard:true})
      
       let inputFecha = document.getElementById('fecha')
      inputFecha.value = args.startStr
      
       }

    });
    
    calendar.render();
  });