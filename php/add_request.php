<?php
include_once("../database/db.php");
session_start();

// Values received via ajax
$value = $_POST['shift-select'];

$request = make_request($value, $_SESSION['id']);

if ($_SESSION['role'] == 'ta_lead') {
    header( "Location: ../../../../ta_lead_schedule.php");
} else {
    header( "Location: ../../../../ta_schedule.php");
}


?>