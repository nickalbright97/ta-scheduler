<?php
include("../database/db.php");


if(isset($_GET["approve"])) {
    $button = htmlspecialchars($_POST['shift']);
    $parts = explode(" ", $button);
    $request = approve_shift($parts[2]);
    $sr_request = get_shift_request($parts[2]);
    $sr_row = $sr_request->fetch_assoc();
    $swap_request = swap_shift($sr_row['shift_ref'], $sr_row['picker'] );
} else {
    $button = htmlspecialchars($_POST['shift']);
    $parts = explode(" ", $button);
    $request = deny_shift($parts[2]);
}


header( "Location: ../../../../shift_requests.html");

?>