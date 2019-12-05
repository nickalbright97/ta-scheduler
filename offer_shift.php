<?php
include("database/db.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Swap Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="javascript/route_ta.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://www.jmu.edu/cs/" target="_blank">
            <img src="../JMUCSLOGO.png" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" onclick=ta_route()>Home</a>
                <a class="nav-item nav-link" href="../api/v1/auth/callback.php">Sign in</a>
                <a class="nav-item nav-link active" href="offer_shift.php"><span class="sr-only">(current)</span>Swap
                    request</a>
                <a class="nav-item nav-link" href="../ta_preferences.html">Schedule Preferences</a>
            </div>
        </div>
    </nav>


    <div class="form-group">
        <form action="/php/add_request.php" method="post">
            <label for="sel1">Shift select:</label>
            <select class="form-control" id="sel1" name="shift-select">

                <?php
                include ("database/add_request.php");
                $request = get_tas_shifts($_SESSION['id']);
                if ($request->num_rows > 0) {
                    while ($row = $request->fetch_assoc()) {
                        echo "<option value = \"";
                        echo $row['id'];
                        echo  "\">";
                        $str = "Shift ";
                        $str .= $row['id'];
                        $date_time_start = new DateTime($row['shift_start']);
                        $formatted_date_start = $date_time_start->format('d/m/y H:i');
                        
                        $str .= " on ";
                        $str .= $date_time_start->format('m/d/Y');
                        echo $str;
                        echo "</option>";
                    }
                } else {
                    echo "0 results";
                }
                ?>

            </select>
            <input type="submit" name="shift">
        </form>
    </div>




</body>


<?php

?>