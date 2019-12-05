<?php
include("../database/db.php");


if(isset($_GET["delete"])) {
    $button = htmlspecialchars($_POST['person']);
    $parts = explode(" ", $button);
    $request = delete_person($parts[2]);
} else {
    add_person($_POST['eid'], $_POST['name'], $_POST['role']);
}


header( "Location: ../../../../manage_people.html");

?>