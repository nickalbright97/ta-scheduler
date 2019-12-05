<?php
    include_once("../database/db.php");

    $id = $_POST['id'];
    $sql = "DELETE from shift WHERE id=?";
    $sql->bind_param("i", $id);
    $query = $connection->prepare($sql);
    $query->execute();
?>
