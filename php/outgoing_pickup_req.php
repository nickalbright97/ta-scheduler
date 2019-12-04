<?php
include("../database/db.php");

session_start();

$requests = get_outgoing_requests($_SESSION['id']);

if ($requests->num_rows > 0) {
    while ($row = $requests->fetch_assoc()) {
        echo "<tr>";
        echo "<td>";
        $nameReq = get_name($row['dropper']);
        $nameRow = $nameReq->fetch_assoc();
        echo $nameRow['name'];
        echo "</td>";
        echo "<td>";
        $date_time_start = new DateTime($row['shift_start']);
        $formatted_date_start = $date_time_start->format('d/m/y H:i');
        echo $date_time_start->format('m/d/Y');

        $date_time_end = new DateTime($row['shift_end']);
        $formatted_date_end = $date_time_end->format('d/m/y H:i');
        echo "</td>";
        echo "<td>";
        $dw = date( 'l', strtotime($formatted_date_start));
        echo $dw;
        echo "</td>";
        echo "<td>";
        echo $date_time_start->format('h:i:s A');
        echo ' - ';
        echo $date_time_end->format('h:i:s A');
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>