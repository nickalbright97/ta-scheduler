<?php
include("../database/db.php");

$button = htmlspecialchars($_POST['shift']);
$parts = explode(" ", $button);
$request = claim_shift($parts[2]);
header( "Location: ../../../../ta_schedule.html");



?>