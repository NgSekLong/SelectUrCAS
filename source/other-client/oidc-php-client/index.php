<?php
require __DIR__ . '/vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

$casDomainname = $_ENV["CAS_DOMAIN_NAME"];

$oidc = new OpenIDConnectClient("https://${casDomainname}:8443/cas/oidc/",
                                'clientId',
                                'clientSecret');
$oidc->setVerifyHost(false);
$oidc->setVerifyPeer(false);                                
$oidc->setCertPath('/etc/ssl/certs/ssl-cert-snakeoil.pem');
$oidc->authenticate();
$attributeRetriveFrom = $oidc->requestUserInfo('attributeRetriveFrom');

$requestUserInfo = $oidc->requestUserInfo();

$casLogoutUrl = "https://" . $_ENV["CAS_DOMAIN_NAME"] . ":8443/cas/logout";
?>

<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OIDC Client Login Example</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 60em;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <h1 class="text-center">OIDC PHP Client: Log in with CAS</h1>
    <form action="<?= $casLogoutUrl ?>" method="post">
        <h2 class="text-center">Authentication is success!</h2>
        <h4 class="text-center">User:</h4>
        <pre><?= $requestUserInfo->id ?></pre>
        <h4 class="text-center">Attributes:</h4>
        <pre><?php print_r($requestUserInfo->attributes) ?></pre>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log out</button>
        </div>   
    </form>
</div>
</body>
</html>