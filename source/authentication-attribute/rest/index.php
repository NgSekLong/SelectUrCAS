<?php

header('Content-Type: application/json');

$data = [
    "someattribute" => "rest",
];
echo json_encode($data);