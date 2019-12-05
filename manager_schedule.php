<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <link href='calendar/lib/fullcalendar.min.css' rel='stylesheet'/>
    <link href='calendar/lib/fullcalendar.print.css' rel='stylesheet' media='print'/>
    <script src='calendar/lib/jquery.min.js'></script>
    <script src='calendar/lib/moment.min.js'></script>
    <script src='calendar/lib/jquery-ui.custom.min.js'></script>
    <script src='calendar/lib/fullcalendar.min.js'></script>

    <?php global $canEdit; $canEdit = true; ?>
    <?php global $canEdit; $canViewNames = true; ?>
    <?php include "calendar/calendar_script.php" ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://www.jmu.edu/cs/" target="_blank">
            <img src="JMUCSLOGO.png" height="100" alt="jmu logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="manager_schedule.php">Home <span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="/api/v1/auth/callback.php">Sign in</a>
                <a class="nav-item nav-link" href="manager_analytics.html">Feedback Analytics</a>
                <a class="nav-item nav-link" href="shift_requests.html">Shift Requests</a>
                <a class="nav-item nav-link" href="manage_people.html">Manage Roles</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="col-lg justify-content-center">
            <div id="ta_pref">
                <h3 class="text-center">TA Availability</h3>
                <table class="table table-striped table-bordered justify-content-center">
                    <thead>
                        <tr>
                            <th>TA Name</th>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tues</th>
                            <th>Wed</th>
                            <th>Thurs</th>
                            <th>Can Work Late Shifts?</th>
                            <th>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#ta_table">
                                    >
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="ta_table" class="collapse show">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg justify-content-center">
            <h3 class="text-center">Current TA Schedule</h3>
            <div class="pt-4 text-center" id="calendar">
            </div>
        </div>
    </div>
    <script src="javascript/load_tables_manager.js"></script>
    <script type="text/javascript">
        load_ta_table();
    </script>
</body>



</html>