<?php

// TODO: This file is very very hard coded in terms of host... 
// This is due to docker networking issue that I don't want to fix at the moment :D
// Will fix later la I think

$haveTicket = isset($_GET['ticket']);
$host = $haveTicket ? "cas" : "cas.example.org" ;

include_once("CAS.php");
phpCAS::client(CAS_VERSION_3_0,$host,8443,"/cas/");

// This setting (i.e. setNoCasServerValidation) is only for testing, not for production 
phpCAS::setNoCasServerValidation();

//phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file
if (!phpCAS::isAuthenticated())
{
    phpCAS::forceAuthentication();
}else{
    header('location: ./index.php');
}