<?php

require_once("../database/db.php");

// List of events
$json = array();

// Query that retrieves events
$request = "SELECT shift.id, person.name, shift_start, shift_end FROM shift JOIN person ON person.id = shift.owner ORDER BY id";


// Execute the query
$result = $connection->query($request) or die(print_r($connection->errorInfo()));
// Returning array
$events = array();

// Fetch results
while ($row = $result->fetch_assoc()) {

    $event = array();
    $event['id'] = $row['id'];
    $event['title'] = $row['name'];
    $event['start'] = $row['shift_start'];
    $event['end'] = $row['shift_end'];
    $event['allDay'] = false;
    // Merge the event array into the return array
    array_push($events, $event);
}

echo json_encode($events);
exit();
?>/*
// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>
*/