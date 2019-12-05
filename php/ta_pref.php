<?php
    include("../database/db.php");
    $data = manager_prefs();

    while($resp = $data->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $resp['name'];
        echo "</td>";
        echo "<td>";
        echoColumn($resp['sunday_start'], $resp['sunday_end']);
        echo "</td>";
        echo "<td>";
        echoColumn($resp['monday_start'], $resp['monday_end']);
        echo "</td>";
        echo "<td>";
        echoColumn($resp['tuesday_start'], $resp['tuesday_end']);
        echo "</td>";
        echo "<td>";
        echoColumn($resp['wednesday_start'], $resp['wednesday_end']);
        echo "</td>";
        echo "<td>";
        echoColumn($resp['thursday_start'], $resp['thursday_end']);
        echo "</td>";
        echo "<td>";
        if($resp['late_shifts'] == 1) {
            echo "Yes";
        } else {
            echo "No";
        }
        echo "</td>";
        echo "</tr>";
    }


    function echoColumn($st, $sd) {
        if ($st == "00:00:00") {
            echo "Unavailable";
        } else {
            $date_s = new DateTime($st);
            $date_e = new DateTime($sd);
            echo $date_s->format('h:i:s A') . " -" . $date_e->format('h:i:s A');
        }
    }
?>