<?php

use smtech\OAuth2\Client\Provider\CanvasLMS;

require_once 'vendor/autoload.php';
session_start();

/* anti-fat-finger constant definitions */
define('CODE', 'code');
define('STATE', 'state');
define('STATE_LOCAL', 'oauth2-state');
$provider = new CanvasLMS([
    'clientId' => getenv("CANVAS_DEV_CLIENTID"),
    'clientSecret' => getenv("CANVAS_DEV_SECRET"),
    'purpose' => 'TA Manager',
    'redirectUri' => 'http://localhost/api/v1/auth/callback.php',
    'canvasInstanceUrl' => getenv("CANVAS_URL"),
    'scopes' => ['url:GET|/api/v1/users/:user_id/profile', 'url:GET|/api/v1/users/self/todo', 'url:GET|/api/v1/courses', 'url:GET|/api/v1/courses/:course_id/todo'],
    'scopeSeparator' => ' ',
    'state' => 'ta_manager_uid_42'
]);
?>