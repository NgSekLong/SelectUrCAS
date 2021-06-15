<?php

require __DIR__ . '/vendor/autoload.php';

phpCAS::client(CAS_VERSION_3_0,$_ENV["CAS_DOMAIN_NAME"],8443,"/cas/");

// This setting (i.e. setNoCasServerValidation) is only for testing, not for production 
// phpCAS::setNoCasServerValidation();

//phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
phpCAS::setCasServerCACert("/etc/cert.crt");
if (phpCAS::isAuthenticated())
{
    phpCAS::logout();
}else{
    header('location: ./index.php');
}