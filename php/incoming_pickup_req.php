<?php
include("../database/db.php");
$requests = get_incoming_requests();

session_start();


if ($requests->num_rows > 0) {
    // output data of each row
    while ($row = $requests->fetch_assoc()) {
        $nameReq = get_name($row['dropper']);
        $nameRow = $nameReq->fetch_assoc();
        if ($_SESSION['name'] != $nameRow['name']) {
            echo "<tr>";
            echo "<td>";
            echo $nameRow['name'];
            echo "</td>";
            echo "<td>";
            $shiftReq = get_shift($row['shift_ref']);
            $shiftRow = $shiftReq->fetch_assoc();
            $date_time_start = new DateTime($shiftRow['shift_start']);
            $formatted_date_start = $date_time_start->format('d/m/y H:i');
            echo $date_time_start->format('m/d/Y');

            $date_time_end = new DateTime($shiftRow['shift_end']);
            $formatted_date_end = $date_time_end->format('d/m/y H:i');
            echo "</td>";
            echo "<td>";
            $dw = date('l', strtotime($formatted_date_start));
            echo $dw;
            echo "</td>";
            echo "<td>";
            echo $date_time_start->format('h:i:s A');
            echo ' - ';
            echo $date_time_end->format('h:i:s A');
            echo "</td>";
            echo "<td>";
            // Create button for shift pickup
            $button = "<form action=\"/php/claim_shift.php\" method=\"post\"> 
        <input type=\"submit\" name=\"shift\" value=\"Claim Shift ";
            $button .= $row['id'];
            $button .= "\"/>  </form>";
            echo $button;
            echo "</td>";
            echo "</tr>";
        }
    }
} else {
    echo "0 results";
}
