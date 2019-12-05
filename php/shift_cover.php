<?php
include("../database/db.php");


if(isset($_GET["approve"])) {
    $button = htmlspecialchars($_POST['shift']);
    $parts = explode(" ", $button);
    $request = approve_shift($parts[2]);
} else {
    $button = htmlspecialchars($_POST['shift']);
    $parts = explode(" ", $button);
    $request = deny_shift($parts[2]);
}


header( "Location: ../../../../shift_requests.html");

?>