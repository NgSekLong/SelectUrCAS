<?php

include_once("CAS.php");
phpCAS::client(CAS_VERSION_3_0,"cas.example.org",8443,"/cas/");

// This setting (i.e. setNoCasServerValidation) is only for testing, not for production 
phpCAS::setNoCasServerValidation();

//phpCAS::setCasServerCACert("./CACert.pem");//this is relative to the cas client.php file

if (phpCAS::isAuthenticated())
    {
    echo "<h3>User:</h3> <pre>" . phpCAS::getUser() . "</pre>";
    echo "<h3>Attributes:</h3> <pre>";
    print_r(phpCAS::getAttributes());
    echo "</pre>";
    echo "<a href='./logout.php'>Logout</a>";
    }else{
    echo "<a href='./login.php'>Login</a>";
}