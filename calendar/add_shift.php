<?php
include_once("../database/db.php");

// Values received via ajax
$owner = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

//Update owner to int
$request = "SELECT person.id FROM shift JOIN person ON person.id = shift.owner WHERE person.username='{$owner}'";
$result =  $connection->query($request) ->fetch_row();
$owner = $result[0];

// insert the records
$sql = "INSERT INTO shift (owner, shift_start, shift_end) VALUES (?, ?, ?)";
$query = $connection->prepare($sql);
$query->bind_param("iss", $owner, $start, $end);
$query->execute();
?>