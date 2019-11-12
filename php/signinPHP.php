<?php
    //include db
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="https://www.jmu.edu/cs/" target="_blank">JMU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="home.html">Home <span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="signin.html">Sign in</a>
                    <a class="nav-item nav-link" href="feedback.html">Feedback</a>
                </div>
            </div>
        </nav>

    <?php

    session_start();

    $role = "student";

    if ( ! empty( $_POST ) ) {
        if (isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
            echo 'Username ' . $_POST['inputUsername'] . '<p>';
            echo 'Password'.$_POST['inputPassword']  . '<p>';

            switch ($role) {
                case 'student':
                    $_SESSION['role'] = 'student';
                    // redirect to admin
                    header( 'Location: student.php');
                    break;
                case 'ta_reg':
                    $_SESSION['role'] = 'ta_reg';
                     // redirect to client
                    header( 'Location: ta_reg.php');
                    break;
                 case 'ta_lead':
                    $_SESSION['role'] = 'ta_lead';
                     // redirect to admin
                    header( 'Location: ta_lead.php');
                    break; 
                case 'manager':
                    $_SESSION['role'] = 'manager';
                     // redirect to admin
                    header( 'Location: manager.php');
                    break; 
                }
        } else {
            header("Location: http://www.yourdomain.com/signin.html");
        }
    }


    ?>

</body>
