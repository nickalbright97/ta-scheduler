<?php
    include("../database/db.php");
    $data = manager_prefs();

    while($resp = $data->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        echo $resp['name'];
        echo "</td>";
        echo "<td>";
        echo $resp['sunday_start'] . " - " . $resp['sunday_end'];
        echo "</td>";
        echo "<td>";
        echo $resp['monday_start'] . " - " . $resp['monday_end'];
        echo "</td>";
        echo "<td>";
        echo $resp['tuesday_start'] . " - " . $resp['tuesday_end'];
        echo "</td>";
        echo "<td>";
        echo $resp['wednesday_start'] . " - " . $resp['wednesday_end'];
        echo "</td>";
        echo "<td>";
        echo $resp['thursday_start'] . " - " . $resp['thursday_end'];
        echo "</td>";
        echo "<td>";
        if($resp['late_shifts'] == 1) {
            echo "True";
        } else {
            echo "False";
        }
        echo "</td>";
        echo "</tr>";
    }
?>