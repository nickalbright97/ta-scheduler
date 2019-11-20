<?php
include("../database/db.php");

if(isset($_GET["questions"])) {
    $ques = $_GET["questions"];
    echo $ques;
    insert_queue_data($ques);
} else {
    $data = get_queue_data();
    $row = $data->fetch_assoc();
    echo $row['queue'];
}

?>