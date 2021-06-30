<?php

header('Content-Type: application/json');

$username = $_GET['username'];
$data = [
    "attributeRetriveFrom" => "rest",
    "restUsernameRetrived" => $username,
    "restArrayAttributes" => [1,2,3],
    "restSingleArrayAttributes" => ["hey"],
];
echo json_encode($data);