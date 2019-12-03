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
}

?>