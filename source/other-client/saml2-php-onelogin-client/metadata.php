<?php
 
/**
 *  SAML Metadata view
 */
require('vendor/autoload.php');
require_once 'settings.php' ;
try {
    #$auth = new OneLogin_Saml2_Auth($settingsInfo);
    #$settings = $auth->getSettings();
    // Now we only validate SP settings
    $settings = new \OneLogin\Saml2\Settings($settingsInfo, true);
    $metadata = $settings->getSPMetadata();
    $errors = $settings->validateMetadata($metadata);
    if (empty($errors)) {
        header('Content-Type: text/xml');
        echo $metadata;
    } else {
        throw new \OneLogin\Saml2\Error(
            'Invalid SP metadata: '.implode(', ', $errors),
            \OneLogin\Saml2\Error::METADATA_SP_INVALID
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}