
    
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
         defaultView: 'timeGridWeek',
           weekends: false,// oculta sabados y domingos
		      locale:"es",
          headerToolbar:{
            left:'prev,next today',
            center:'title',
            right:'dayGridMonth,timeGridWeek,timeGridDay'
          },
          
         

         

          eventSources:[{
            events: [
              
              {
                title  : 'por que',
                descripcion:"clase de mate",
                start  : '2023-08-21',
                end    : '2023-08-22'
              },
             
            ],
          }],

          eventClick:function(calEvent,jsEvent,view){
              $('#tituloEvento').html(calEvent.title);
              $('#desEvento').html(calEvent.descripcion);
              $("#editEmployeeModal").modal();
          },

          dateClick: function(info) {
            $("#addEmployeeModal").modal();
        
          }
          
        });
        calendar.render();
      });


    
