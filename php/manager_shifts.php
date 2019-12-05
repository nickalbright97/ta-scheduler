<?php
include("../database/db.php");
$requests = get_unapproved_requests();


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
        $shiftReq = get_shift($row['shift_ref']);
        $shiftRow = $shiftReq->fetch_assoc();
        $date_time_start = new DateTime($shiftRow['shift_start']);
        $formatted_date_start = $date_time_start->format('d/m/y H:i');
        echo $date_time_start->format('m/d/Y');

        $date_time_end = new DateTime($shiftRow['shift_end']);
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
        $nameReq2 = get_name($row['picker']);
        $nameRow2 = $nameReq2->fetch_assoc();
        echo $nameRow2['name'];
        echo "</td>";
        echo "<td>";
        $button = "<form action=\"/php/shift_cover.php?approve=1\" method=\"post\"> 
        <input type=\"submit\" name=\"shift\" value=\"Approve Shift ";
        $button .= $row['id'];
        $button .= "\"/>  </form>"; 
        echo $button;
        echo "</td>";
        echo "<td>";
        $button2 = "<form action=\"/php/shift_cover.php?deny=1\" method=\"post\"> 
        <input type=\"submit\" name=\"shift\" value=\"Deny Shift ";
        $button2 .= $row['id'];
        $button2 .= "\"/>  </form>"; 
        echo $button2;
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

?>