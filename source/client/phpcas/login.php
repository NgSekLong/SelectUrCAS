<?php

include_once("CAS.php");

phpCAS::client(CAS_VERSION_3_0,$_ENV["CAS_DOMAIN_NAME"],8443,"/cas/");

phpCAS::setCasServerCACert("/etc/cert.crt");

if (!phpCAS::isAuthenticated())
{
    phpCAS::forceAuthentication();
} else{
    header('location: .');
}