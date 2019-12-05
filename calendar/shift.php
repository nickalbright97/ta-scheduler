<?php
    include_once("../database/db.php");

    $id = $_GET['id'];

    // Query that retrieves events
    $request = "SELECT shift.id, person.name, shift_start, shift_end FROM shift JOIN person ON person.id = shift.owner WHERE shift.id=" . $id;

    // Execute the query
    $result =  $connection->query($request) ->fetch_row() or die(print_r($connection->errorInfo()));

    printf("<p>Name: %s</p><p>Shift Start: %s</p><p>Shift End: %s</p>",$result[1], $result[2],$result[3]);

    echo '<form action="/calendar/delete_shift.php" method="post">
        <input type="number" name="id" value="' .  $id .'" style="display: none"/>
        <input type="submit" name="submit" value="Submit" />
        </form>';
?>
