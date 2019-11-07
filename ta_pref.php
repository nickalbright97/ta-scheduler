<?php
    //load in from database later
    $row = ["name" =>"Will",
        "Sunday" => "3-7pm",
        "Monday" => "5-8pm",
        "Tuesday" => "NA",
        "Wednesday" => "8-10pm",
        "Thursday" => "6-7pm",
    ];

    $row2 = ["name" =>"Bill",
    "Sunday" => "6-8pm",
    "Monday" => "NA",
    "Tuesday" => "4-8pm",
    "Wednesday" => "8-11pm",
    "Thursday" => "8am-7pm",
    ];

    $arr = [$row, $row2];

    foreach ($arr as $ro) {
        echo "<tr>";
        echo "<td>";
        echo $ro['name'];
        echo "</td>";
        echo "<td>";
        echo $ro['Sunday'];
        echo "</td>";
        echo "<td>";
        echo $ro['Monday'];
        echo "</td>";
        echo "<td>";
        echo $ro['Tuesday'];
        echo "</td>";
        echo "<td>";
        echo $ro['Wednesday'];
        echo "</td>";
        echo "<td>";
        echo $ro['Thursday'];
        echo "</td>";
        echo "</tr>";
    }


    
?>