<?php

include("../database/db.php");
    $data = people_table();

    while($person = $data->fetch_assoc()) {
    
        echo "<tr>";

        echo "<td>";
        echo $person["username"];
        echo "</td>";
        echo "<td>";
        echo $person["name"];
        echo "</td>";
        echo "<td>";
        echo $person["role"];
        echo "</td>";
        echo "<td>";
        $button = "<form action=\"/php/add_people.php?delete=1\" method=\"post\"> 
        <input type=\"submit\" name=\"person\" value=\"Delete ";
        $button .= $person['username'];
        $button .= "\"/>  </form>"; 
        echo $button;
        echo "</td>";

        echo "</tr>";
    
    }


?>