<?php 
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;
if(!$_GET['ticket']){
    $current_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    header("Location: https://cas.example.org:8443/cas/login?service=$current_link");
}

$token = urldecode($_GET['ticket']);

echo $token;

$key = "uef_dOEue1vhWiOXu87LQK4z2b6jyjuDAu4JMVjbGhLGATtF9bERY6gmUwtXxNF0A959H4vHNCks-IVcdV-I_A";
$encryptionKey = 'rahGhI7TeQSXPwRtWKbpU6boIb6vnVWvLTDp7jW-ibw';
$signingKey = 'OSZ8QqaXoDku2ZWh2QnBSIRjlzA9pbOnYEO6II53mC7M2syTqSZxwu4JwfNXhKUgKv1o8goC71J_UgukcZHt3w';


$decoded = JWT::decode($token, $signingKey, array('HS512'));
echo "<pre>";
print_r($decoded);
echo "</pre>";
echo "OMG";

// $token = array(
//     "iss" => "http://example.org",
//     "aud" => "http://example.com",
//     "iat" => 1356999524,
//     "nbf" => 1357000000
// );

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
// $jwt = JWT::encode($token, $key);
// $decoded = JWT::decode($token,  array('HS512'));
$decoded = JWT::decode($token, $key, array('HS512'));
echo "<pre>";
print_r($decoded);
echo "</pre>";
// /*
//  NOTE: This will now be an object instead of an associative array. To get
//  an associative array, you will need to cast it as such:
// */

// $decoded_array = (array) $decoded;

// /**
//  * You can add a leeway to account for when there is a clock skew times between
//  * the signing and verifying servers. It is recommended that this leeway should
//  * not be bigger than a few minutes.
//  *
//  * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
//  */
// JWT::$leeway = 60; // $leeway in seconds
// $decoded = JWT::decode($jwt, $key, array('HS256'));

?>

<!--<html>
<head>
    <style>
.wordwrap { 
    width:50em;
    white-space: pre-wrap;      /* CSS3 */   
    white-space: -moz-pre-wrap; /* Firefox */    
    white-space: -pre-wrap;     /* Opera <7 */   
    white-space: -o-pre-wrap;   /* Opera 7 */    
    word-wrap: break-word;      /* IE */
}
    </style>
</head>
<body>
    Ticket: <br/>
    <div class="wordwrap" >
    <?= $ticket ?>
    </div>
</body>
</html>-->