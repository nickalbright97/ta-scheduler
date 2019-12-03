<?php

include("../../../provider.php");
include("../../../database/db.php");

function print_r_results($accessToken, $curl, $endpoint)
{
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://canvas.jmu.edu/api/v1' . $endpoint,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_HTTPHEADER => ['Authorization: Bearer ' . $accessToken]
    ]);
    // Send the request & save response to $myProfile
    $response = curl_exec($curl);
    if ($response === FALSE) {
        die('Curl failed: ' . curl_error($curl));
    }
    return json_decode($response);
}

if (!isset($_GET[CODE])) {
    $authorizationUrl = $provider->getAuthorizationUrl();
    $_SESSION[STATE_LOCAL] = $provider->getState();
    header("Location: $authorizationUrl");
    exit;

    /* check that the passed state matches the stored state to mitigate cross-site request forgery attacks */
} elseif (empty($_GET[STATE]) || $_GET[STATE] !== $_SESSION[STATE_LOCAL]) {
    unset($_SESSION[STATE_LOCAL]);
    exit('Invalid state');
} else {
    /* try to get an access token (using our existing code) */
    $token = $provider->getAccessToken('authorization_code', [CODE => $_GET[CODE]]);
    $r_token = $token->getRefreshToken();
    print_r($r_token, TRUE);
    $_SESSION["access_token"] = $token->getToken();
    $_SESSION["refresh_token"] = $r_token;

    // print_r($_SESSION["access_token"]);
    // print_r($_SESSION["refresh_token"]);
    /* do something with that token... (probably not just print to screen, but whatevs...) */
    // echo $token->getToken();

    // Wesley's test

    $curl = curl_init();
    $profile = print_r_results($_SESSION["access_token"], $curl, '/users/self/profile');
    $role = "";
    $username = "";

        // Check for the login id of the user, assign it to username
        foreach ($profile as $k => $v) {
            if ($k == 'login_id' ) {
                $username = $v;
            }
        }

        // Assign username to role
        /*
        if ( $username == "llamasjw" ) {
            $role = 'manager';

        } else {
            $role = 'student';
        }
        */

        $idReq = get_id($username);
        if ($idReq->num_rows > 0) {
            $row = $idReq->fetch_assoc();
            $_SESSION['id'] = $row['id'];
        }

        $requests = get_role($username);
        if ($requests->num_rows > 0) {
            $row = $requests->fetch_assoc();
            $role = $row['role'];
        } else {
            $role = 'student';
        }
        switch ($role) {
            case 'student':
                // redirect to student page
                $_SESSION['role'] = 'student';
                $_SESSION['username'] = $username;
                header( "Location: ../../../../home.html");
                break;
            case 'ta_reg':
                 // redirect to regular ta page
                 $_SESSION['role'] = 'ta_reg';
                 $_SESSION['username'] = $username;
                header( "Location: ../../../../ta_schedule.html");
                break;

             case 'ta_lead':
                 // redirect to ta lead page
                 $_SESSION['role'] = 'ta_lead';
                 $_SESSION['username'] = $username;
                header( "Location: ../../../../ta_schedule.html");
                break; 
            case 'manager':
                 // redirect to manager page
                 $_SESSION['role'] = 'manager';
                 $_SESSION['username'] = $username;
                header( "Location: ../../../../manager_schedule.html");
                break; 
            }


    exit;
}
