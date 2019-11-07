<?php

$row = [
    "date" =>"2019-11-08",
    "day" => "Friday",
    "time" => "5-7pm",

];

$arr = [$row];
foreach($arr as $ro) {
    echo "<tr>";
    echo "<td>";
    echo $ro['date'];
    echo "</td>";
    echo "<td>";
    echo $ro['day'];
    echo "</td>";
    echo "<td>";
    echo $ro['time'];
    echo "</td>";
    echo "</tr>";
}

?>