<?php

//check auth
//load from database
//would like to add date param

$row = ["class" =>"CS 149",
"teacher" => "Weikle",
"problem" => "ddagaegedtgestgesegea gertgertgr",

];

$row2 = ["class" =>"CS 149",
"teacher" => "Stu Dog",
"problem" => "ypy yoddagaegedtgestgesegea afasdfa gertgertgr",

];

$arr = [$row, $row2];

foreach ($arr as $ro) {
    echo "<tr>";
    echo "<td>";
    echo $ro['class'];
    echo "</td>";
    echo "<td>";
    echo $ro['teacher'];
    echo "</td>";
    echo "<td>";
    echo $ro['problem'];
    echo "</td>";
    echo "</tr>";
}


?>