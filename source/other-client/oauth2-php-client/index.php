<?php
require __DIR__ . '/vendor/autoload.php';
$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => 'clientId',    // The client ID assigned to you by the provider
    'clientSecret'            => 'clientSecret',   // The client password assigned to you by the provider
    'redirectUri'             => 'https://cas.example.org:57575/',
    'urlAuthorize'            => 'https://cas.example.org:8443/cas/oauth2.0/authorize',
    'urlAccessToken'          => 'https://cas.example.org:8443/cas/oauth2.0/token',
    'urlResourceOwnerDetails' => 'https://cas.example.org:8443/cas/oauth2.0/profile'
]);

// If we don't have an authorization code then get one
if (!isset($_GET['code'])) {

    // Fetch the authorization URL from the provider; this returns the
    // urlAuthorize option and generates and applies any necessary parameters
    // (e.g. state).
    $authorizationUrl = $provider->getAuthorizationUrl();

    // Get the state generated for you and store it to the session.
    $_SESSION['oauth2state'] = $provider->getState();

    // Redirect the user to the authorization URL.
    header('Location: ' . $authorizationUrl);
    exit;

// Check given state against previously stored one to mitigate CSRF attack
} elseif (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {

    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }
    
    exit('Invalid state');

} else {

    try {

        // Try to get an access token using the authorization code grant.
        $accessToken = $provider->getAccessToken('authorization_code', [
            'code' => $_GET['code']
        ]);

        // We have an access token, which we may use in authenticated
        // requests against the service provider's API.
        // echo 'Access Token: ' . $accessToken->getToken() . "<br>";
        // echo 'Refresh Token: ' . $accessToken->getRefreshToken() . "<br>";
        // echo 'Expired in: ' . $accessToken->getExpires() . "<br>";
        // echo 'Already expired? ' . ($accessToken->hasExpired() ? 'expired' : 'not expired') . "<br>";

        // Using the access token, we may look up details about the
        // resource owner.
        $resourceOwner = $provider->getResourceOwner($accessToken);

        $resourceOwnwerArray = $resourceOwner->toArray();

        // var_export($resourceOwner->toArray());

        // The provider provides a way to get an authenticated API request for
        // the service, using the access token; it returns an object conforming
        // to Psr\Http\Message\RequestInterface.
        // $request = $provider->getAuthenticatedRequest(
        //     'GET',
        //     'http://brentertainment.com/oauth2/lockdin/resource',
        //     $accessToken
        // );

    } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {

        // Failed to get the access token or user details.
        exit($e->getMessage());

    }

    $casLogoutUrl = "https://" . $_ENV["CAS_DOMAIN_NAME"] . ":8443/cas/logout";
}
?>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OAuth2 Client Login Example</title>
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
    <h1 class="text-center">OAuth2 PHP Client: Log in with CAS</h1>
    <form action="<?= $casLogoutUrl ?>" method="post">
        <h2 class="text-center">Authentication is success!</h2>
        <h4 class="text-center">User:</h4>
        <pre><?= $resourceOwnwerArray['id']?></pre>
        <h4 class="text-center">OAuth related crednetials:</h4>
<pre>
<?php

echo 'Access Token: ' . $accessToken->getToken() . "<br>";
echo 'Refresh Token: ' . $accessToken->getRefreshToken() . "<br>";
echo 'Expired in: ' . $accessToken->getExpires() . "<br>";
echo 'Already expired? ' . ($accessToken->hasExpired() ? 'expired' : 'not expired') . "<br>";
?>
</pre>
        <h4 class="text-center">Attributes:</h4>
        <pre><?php print_r($resourceOwnwerArray) ?></pre>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log out</button>
        </div>   
    </form>
</div>
</body>
</html>