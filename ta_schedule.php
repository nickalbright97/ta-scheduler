<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TA Schedule</title>
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

    <?php global $canEdit; $canEdit = false; ?>
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
                <a class="nav-item nav-link active" href="ta_schedule.php">Home<span
                        class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="/api/v1/auth/callback.php">Sign in</a>
                <a class="nav-item nav-link" href="swap_request.html">Swap request</a>
                <a class="nav-item nav-link" href="ta_preferences.html">Schedule Preferences</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg justify-content-center">
                <div class="row">
                    <div class="pt-4">
                        <h3 style="text-align: center">Incoming Shift Pickup Requests</h3>
                        <table class="table table-striped table-bordered justify-content-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Claim Shifts</th>
                                </tr>
                            </thead>
                            <tbody id="incoming">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="container">
                    <div class="row">
                        <div class="pt-4">
                            <h3 style="text-align: center">Outgoing Shift Pickup Requests</h3>
                            <table class="table table-striped table-bordered justify-content-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody id="outgoing">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="pt-4">
                            <h3 style="text-align: center">Next Shift</h3>
                            <table class="table table-striped table-bordered justify-content-center">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody id="next_shift">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="javascript/load_tables_ta.js"></script>
</body>



</html>