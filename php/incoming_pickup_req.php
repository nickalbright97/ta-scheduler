<?php
include("../database/db.php");
$requests = get_incoming_requests();

/*
$row = [
    "name" => "Joe Coe",
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
        $nameReq = get_name($row['dropper']);
        $nameRow = $nameReq->fetch_assoc();
        echo $nameRow['name'];
        echo "</td>";
        echo "<td>";
        $date_time = new DateTime($row['datetime']);
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