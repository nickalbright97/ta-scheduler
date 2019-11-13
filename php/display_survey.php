<?php


include("../database/db.php");

if(isset($_GET["date"])) {
    $date = $_GET["date"];
    $data = survey_resp_date($date);
} else {
    $data = survey_resp_today();
}

while ($resp = $data->fetch_assoc()) {
    echo "<tr>";
    echo "<td>";
    echo $resp['code'];
    echo "</td>";
    echo "<td>";
    echo $resp['professor'];
    echo "</td>";
    echo "<td>";
    echo $resp['text'];
    echo "</td>";
    echo "</tr>";
}

$data->close();


?>