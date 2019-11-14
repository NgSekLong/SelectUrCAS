<?php

header('Content-Type: application/json');

$username = $_GET['username'];
$data = [
    "attributeRetriveFrom" => "rest",
    "restUsernameRetrived" => $username,
    "someArray" => [1,2,3],
    "singleArray" => ["hey"],
];
echo json_encode($data);