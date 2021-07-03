<?php

header('Content-Type: application/json');

$username = $_GET['username'];
$data = [
    "attributeRetriveFrom" => "rest",
    "restUsernameRetrived" => $username,
    // You can provide attribute in array like the following
    "restArrayAttributes" => ["Rest","attributes","are", "super", "flexible"],
];
echo json_encode($data);