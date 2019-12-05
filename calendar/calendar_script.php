<link href='./lib/fullcalendar.min.css' rel='stylesheet'/>
<link href='./lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src='./lib/jquery.min.js'></script>
<script src='./lib/moment.min.js'></script>
<script src='./lib/jquery-ui.custom.min.js'></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src='./lib/fullcalendar.min.js'></script>

<script>
$(document).ready(function () {
function fmt(date) {
    return date.format("YYYY-MM-DD HH:mm");

}

var managerMode = true;

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var calendar = $('#calendar').fullCalendar({
    editable: managerMode,
    customButtons: {
        add: {
            text: 'add',
            click: function() {
                $('#add_dialog').dialog({
                    open: function() {
                        $('#shift_start').datepicker({title:'Test Dialog'}).blur();
                        $('#shift_end').datepicker({title:'Test Dialog'}).blur();

                    },
                    close: function() {
                        $('#shift_start').datepicker('destroy');
                        $('#shift_end').datepicker('destroy');
                    },

                });
                $( ".widget input[type=submit], .widget a, .widget button" ).button();
                $( "button, input, a" ).click( function( event ) {
                    event.preventDefault();
                    var text = 
                });
                /*
                if (title) {
                    var end = fmt(end);
                    $.ajax({
                        url: 'add_shift.php',
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (json) {
                            alert('Added Successfully');
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true // make the event "stick"
                    );
                }*/
            }
        }
    },
    header: {
        left: 'prev,next today add',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },

    events: "shifts.php",

    // Convert the allDay from string to boolean
    eventRender: function (event, element, view) {
        if(!managerMode){
            element.text('TA Shift');
        }
        event.allDay = false;
    },
        selectable: managerMode,
        selectHelper: true,
    /*
        select: function (start, end, allDay) {
        var title = prompt('Event Title:');
        if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: 'add_shift.php',
              data: 'title=' + title + '&start=' + start + '&end=' + end,
              type: "POST",
              success: function (json) {
                alert('Added Successfully');
            }
            });
            calendar.fullCalendar('renderEvent',
                {
                    title: title,
                    start: start,
                    end: end,
                    allDay: allDay
                },
                true // make the event "stick"
            );
          }
        calendar.fullCalendar('unselect');
    },
    */

        editable: managerMode,
        eventDrop: function (event, delta) {
        var start = fmt(event.start);
        var end = fmt(event.end);
        $.ajax({
            url: 'update_shift.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
            alert("Updated Successfully");
        }
          });
        },
        eventClick: function (event) {
        window.location.href = "shift.php?id=" + event.id;

    },
          /*
          var decision = confirm("Do you want to remove event?");
          if (decision) {
            $.ajax({
              type: "POST",
              url: "delete_event.php",
              data: "&id=" + event.id,
              success: function (json) {
                $('#calendar').fullCalendar('removeEvents', event.id);
                alert("Updated Successfully");
              }
            });
          }
        },
*/
        eventResize: function (event) {
        var start = fmt(event.start);
        var end = fmt(event.end);
        $.ajax({
            url: 'update_shift.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
            alert("Updated Successfully");
        }
          });

        }


      });

});

</script>
<style>

body {
margin-top: 40px;
  text-align: center;
  font-size: 14px;
  font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;

}

#calendar {
  width: 900px;
  margin: 0 auto;
}
</style>