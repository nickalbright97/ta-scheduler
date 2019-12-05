<?php
include("../database/db.php");
session_start();

$button = htmlspecialchars($_POST['shift']);
$parts = explode(" ", $button);
$request = claim_shift($parts[2]);

if ($_SESSION['role'] == 'ta_lead') {
    header( "Location: ../../../../ta_lead_schedule.php");
} else {
    header( "Location: ../../../../ta_schedule.php");
}





?>