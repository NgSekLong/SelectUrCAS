<?php

require __DIR__ . '/vendor/autoload.php';

phpCAS::client(CAS_VERSION_3_0,$_ENV["CAS_DOMAIN_NAME"],8443,"/cas/");

phpCAS::setCasServerCACert("/etc/cert.crt", false);

if (!phpCAS::isAuthenticated())
{
    phpCAS::forceAuthentication();
} else{
    header('location: .');
}