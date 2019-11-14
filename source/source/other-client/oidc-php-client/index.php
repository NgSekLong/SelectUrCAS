<?php
require __DIR__ . '/vendor/autoload.php';
use Jumbojett\OpenIDConnectClient;

$casDomainname = $_ENV["CAS_DOMAIN_NAME"];

$oidc = new OpenIDConnectClient("https://${casDomainname}:8443/cas/oidc/",
                                'clientId',
                                'clientSecret');
$oidc->setVerifyHost(false);
$oidc->setVerifyPeer(false);                                
// $oidc->setCertPath('/path/to/my.cert');
$oidc->authenticate();
$attributeRetriveFrom = $oidc->requestUserInfo('attributeRetriveFrom');

echo "<h1>Login Success:</h1>";