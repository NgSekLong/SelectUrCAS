<?php


$data = [
    "@class" => "org.apereo.cas.authentication.principal.SimplePrincipal",
    "id" => "casuser",
    "attributes" => [
        "bciCodeEtablissement" => ["asd"]
    ],
];
header('Content-Type: application/json');
echo json_encode($data);