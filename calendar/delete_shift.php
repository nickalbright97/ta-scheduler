<?php
    include_once("../database/db.php");

    $id = $_POST['id'];
    $sql = "DELETE from shift WHERE id=?";
    $query = $connection->prepare($sql);
    $query->bind_param("i", $id);
    $query->execute();

    header('Location: /../manager_schedule.php');
    die();
?>
