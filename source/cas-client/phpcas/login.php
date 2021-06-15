<?php

require __DIR__ . '/vendor/autoload.php';

phpCAS::client(CAS_VERSION_3_0,$_ENV["CAS_DOMAIN_NAME"],8443,"/cas/");

// PhpCAS is set to no server validation due to it is not happy with expired self-sign cert
phpCAS::setNoCasServerValidation();

if (!phpCAS::isAuthenticated())
{
    phpCAS::forceAuthentication();
} else{
    header('location: .');
}