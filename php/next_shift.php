<?php

include("../database/db.php");
session_start();
$requests = get_next_shift($_SESSION['id']);

/*
$row = [
    "date" =>"2019-11-08",
    "day" => "Friday",
    "time" => "5-7pm",
];
*/

if ($requests->num_rows > 0) {
    // output data of each row
    while ($row = $requests->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        $date_time = new DateTime($row['shift_start']);
        $formatted_date = $date_time->format('d/m/y H:i');
        echo $date_time->format('m/d/Y');
        echo "</td>";
        echo "<td>";
        $dw = date( 'l', strtotime($formatted_date));
        echo $dw;
        echo "</td>";
        echo "<td>";
        echo $date_time->format('h:i:s A');
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>