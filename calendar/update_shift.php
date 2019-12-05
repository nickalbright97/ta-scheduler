<?php
    include_once("../database/db.php");

    /* Values received via ajax */
    $id = $_POST['id'];
    $owner = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    //Update owner to int
    $request = "SELECT person.id FROM shift JOIN person ON person.id = shift.owner WHERE person.name='{$owner}'";
    $result =  $connection->query($request) ->fetch_row();
    $owner = $result[0];


    // update the records
    $sql = "UPDATE shift SET owner=?, shift_start=?, shift_end=? WHERE id=?";
    $query = $connection->prepare($sql);
    $query->bind_param("issi", $owner, $start, $end, $id);
    $query->execute();
?>