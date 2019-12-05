<?php
    include_once("../database/db.php");

    /* Values received via ajax */
    $id = $_POST['id'];
    $owner = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    echo($id . $owner . $start . $end);

    // update the records
    $sql = "UPDATE shift SET owner=?, shift_start=?, shift_end=? WHERE id=?";
    $query = $connection->prepare($sql);
    $query->bind_param("issi", $owner, $start, $end, $id);
    $query->execute();
?>