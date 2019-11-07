<?php

function require_auth() {
    $authorizedUsers = [
        [
            'username' => 'rest',
            'password' => 'Mellon',
        ],
        [
            'username' => 'casuser',
            'password' => 'Mellon',
        ],
    ];
    $is_not_authenticated = false;
    foreach($authorizedUsers as $authorizedUser){
        $AUTH_USER = $authorizedUser['username'];
        $AUTH_PASS = $authorizedUser['password'];

        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
        $is_not_authenticated = (
            !$has_supplied_credentials ||
            $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
            $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
        );
        if(!$is_not_authenticated){
            break;
        }
    }
	if ($is_not_authenticated) {
		header('HTTP/1.1 401 Authorization Required');
		header('WWW-Authenticate: Basic realm="Access denied"');
		exit;
    }
    return $_SERVER['PHP_AUTH_USER'];
}
$user = require_auth();

$data = [
    "@class" => "org.apereo.cas.authentication.principal.SimplePrincipal",
    "id" => $user,
];
header('Content-Type: application/json');
echo json_encode($data);