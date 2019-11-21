<?php
# Fake a profile endpoint...
$data = [
    'id' => '123456789',
    'principalAttributeId' => 'principalAttributeIdValue',
    'profileId' => 'profileIdValue',
    'otherstuff' => 'Other Stuff',
];
header('Content-Type: application/json');
echo json_encode($data);