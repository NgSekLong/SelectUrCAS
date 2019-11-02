<?php

include_once("CAS.php");
phpCAS::client(CAS_VERSION_3_0,"cas.example.org",8443,"/cas/");

// This setting (i.e. setNoCasServerValidation) is only for testing, not for production 
phpCAS::setNoCasServerValidation();

//phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file

if (phpCAS::isAuthenticated())
{
    phpCAS::logout();
}else{
    header('location: ./index.php');
}