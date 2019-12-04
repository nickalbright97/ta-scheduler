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
} else {
    echo "0 results";
}

?>