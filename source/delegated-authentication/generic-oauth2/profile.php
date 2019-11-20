<?php
# Fake a profile endpoint...
$data = [
    'id' => 'casuser',
    'otherstuff' => 'Other Stuff',
];
header('Content-Type: application/json');
echo json_encode($data);