<?php global $canEdit?>
<?php global $canViewNames;?>

<link href='/calendar/lib/fullcalendar.min.css' rel='stylesheet'/>
<link href='/calendar/lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
<script src='/calendar/lib/jquery.min.js'></script>
<script src='/calendar/lib/moment.min.js'></script>
<script src='/calendar/lib/jquery-ui.custom.min.js'></script>
<script src='/calendar/lib/fullcalendar.min.js'></script>

<script>
$(document).ready(function () {
function fmt(date) {
    return date.format("YYYY-MM-DD HH:mm");

}

var canEdit = <?php echo json_encode($canEdit); ?>;
var canViewNames = <?php echo json_encode($canViewNames); ?>;

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var calendar = $('#calendar').fullCalendar({
    defaultView: 'agendaWeek',
    editable: canEdit,
    header: {
        left: 'prev,next today add',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },

    events: "/calendar/shifts.php",

    // Convert the allDay from string to boolean
    eventRender: function (event, element, view) {
        if(!canViewNames){
            element.text('TA Shift');
        }
        event.allDay = false;
    },
        selectable: canEdit,
        selectHelper: true,
        select: function (start, end, allDay) {
        var title = prompt('Username:');
        if (title) {
            var start = fmt(start);
            var end = fmt(end);
            $.ajax({
              url: '/calendar/add_shift.php',
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
        editable: canEdit,
        eventDrop: function (event, delta) {
        var start = fmt(event.start);
        var end = fmt(event.end);
        $.ajax({
            url: '/calendar/update_shift.php',
            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
            type: "POST",
            success: function (json) {
            alert("Updated Successfully");
        }
          });
        },
        eventClick: function (event) {
        if(canViewNames || canEdit){
            window.location.href = "shift.php?id=" + event.id;
        }
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
            url: '/calendar/update_shift.php',
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