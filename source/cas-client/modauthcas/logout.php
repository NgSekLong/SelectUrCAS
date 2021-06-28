<?php

// Remove the MOD_AUTH_CAS cookie if exists
if (isset($_COOKIE['MOD_AUTH_CAS'])) {
    unset($_COOKIE['MOD_AUTH_CAS']); 
    setcookie('MOD_AUTH_CAS', null, -1, '/access-after-login/'); 
} 
// Redirect user to CAS logout URL
$casLogoutUrl = "https://" . $_ENV["CAS_DOMAIN_NAME"] . ":8443/cas/logout";
header('location: ' . $casLogoutUrl);