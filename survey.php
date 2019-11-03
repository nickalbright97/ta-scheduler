<?php
    //load in from database later
    $row = ["name" =>"Will",
        "Sunday" => "3-7pm",
        "Monday" => "5-8pm",
        "Tuesday" => "NA",
        "Wednesday" => "8-10pm",
        "Thursday" => "6-7pm",
    ];

    echo "<tr>";
    echo "<td>";
    echo $row['name'];
    echo "</td>";
    echo "<td>";
    echo $row['Sunday'];
    echo "</td>";
    echo "<td>";
    echo $row['Monday'];
    echo "</td>";
    echo "<td>";
    echo $row['Tuesday'];
    echo "</td>";
    echo "<td>";
    echo $row['Wednesday'];
    echo "</td>";
    echo "<td>";
    echo $row['Thursday'];
    echo "</td>";
    echo "</tr>";
    
?>