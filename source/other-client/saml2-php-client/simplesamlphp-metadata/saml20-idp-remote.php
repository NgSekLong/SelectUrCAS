<?php
$metadata['https://cas.example.org/idp'] = array (
    'entityid' => 'https://cas.example.org/idp',
    'contacts' => 
    array (
    ),
    'metadata-set' => 'saml20-idp-remote',
    'SingleSignOnService' => 
    array (
      0 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/POST/SSO',
      ),
      1 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/POST-SimpleSign/SSO',
      ),
      2 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/Redirect/SSO',
      ),
      3 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/SOAP/ECP',
      ),
    ),
    'SingleLogoutService' => 
    array (
      0 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/POST/SLO',
      ),
      1 => 
      array (
        'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
        'Location' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/Redirect/SLO',
      ),
    ),
    'ArtifactResolutionService' => 
    array (
    ),
    'NameIDFormats' => 
    array (
      0 => 'urn:mace:shibboleth:1.0:nameIdentifier',
      1 => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
    ),
    'keys' => 
    array (
      0 => 
      array (
        'encryption' => false,
        'signing' => true,
        'type' => 'X509Certificate',
        'X509Certificate' => 'MIIDHjCCAgagAwIBAgIVALTRGoRDDLmFRCdC54e3SCOm4Il4MA0GCSqGSIb3DQEBCwUAMBoxGDAWBgNVBAMMD2Nhcy5leGFtcGxlLm9yZzAeFw0xOTExMTYwMjE0MTFaFw0zOTExMTYwMjE0MTFaMBoxGDAWBgNVBAMMD2Nhcy5leGFtcGxlLm9yZzCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAI0nLjzV/IBZwMHmWsS+80dxZHfvJ12ESligYGiAoj8sCvSu1nGhXMWUq8yEbAIdop+jAtc4ay27lvgloIoYvdeJBhAOB6Mtad/V1lEV/RbmYrSCRuMDZ2cHX38Bn9iPifhibXbNAKLe9hhGUcTW9YRST/em5qg1AKa8iH72jLMJZRaBgqpHKCGpAim4Tihfec7HhSSW5ko8VcrvHdW04LM/hREXPHnRXdwL34d71e6PEn2fJnDn4ySXRcs2r/2Ai0Itf0txMGV0NHCoDlzq2EntzA+7dwR5UwwsrVgEyW2Qb+zegcX7HGg+sDC4XNg2hJ4m014wjYxfmJV+XJ6IC4ECAwEAAaNbMFkwHQYDVR0OBBYEFEZls11vLuK+7zTDLcYR+hgw99txMDgGA1UdEQQxMC+CD2Nhcy5leGFtcGxlLm9yZ4YcY2FzLmV4YW1wbGUub3JnL2lkcC9tZXRhZGF0YTANBgkqhkiG9w0BAQsFAAOCAQEAdYTQh0snrVh4k/hiymNXwY237j43z8ChvSwHfRv3Om4PQpyjYTlxmS1h2RH4Y2B9JWvdiKgWyCIFWXmLzolnEWOpuNtppZHcXVIEjK5Hz41Fg0CEuFhB/OhfAgwoniZOgMTzbT3Naw/fFf5ls6EU6fMs98wKULoZLfR/i9sT29r78zN5kSNHMcFK6/NBw1w0yMecz4AsmJzkjl80/PdBdHAkkEr8u8YMRaFQTnfZ9hgwVIJhEfiGgi+TROViFM4/aZAw+AzGQIlRvQU006UMkKZxioYiZX0H+HABNmnmPlkjH1/KQs1fzX9CDash3E800ZGhqQMyk4/+tL+uceOTqA==',
      ),
      1 => 
      array (
        'encryption' => true,
        'signing' => false,
        'type' => 'X509Certificate',
        'X509Certificate' => 'MIIDHTCCAgWgAwIBAgIUYQWRSCFtOerzPFT7JIbgh/AF7lkwDQYJKoZIhvcNAQELBQAwGjEYMBYGA1UEAwwPY2FzLmV4YW1wbGUub3JnMB4XDTE5MTExNjAyMTQxMVoXDTM5MTExNjAyMTQxMVowGjEYMBYGA1UEAwwPY2FzLmV4YW1wbGUub3JnMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAidw/4Zd1EfjTntAFUv5rTkyH56pUXag3Lx7WcDZk3IYRU097ytrDfYOAsE1ng9OA8z9oGypd6ThEL/cuZAlVhLPfqcIlHPsy4Rp5J9iZvhrZysryfaqLHlhFt6bxPuiWxmYVt6iOYlzJr0HijmaHIBfPu93IwI7qR7JGeiRQWqzJsd8A0BYpn0JkJiUAXTLfPWpSsjCKfGZrEOIA4GqbNf9kvqIypSqCnt5A1TLnT1WhCH96rCsreEJhoY4Nj8oAU+9WMaRywThfNYgLaccxsM1g6tmnkHS3AmMOQCCtbSYTh+AkH3tqYebT4lNaY1UIhipZ683ORXPFSe2jyiLJiwIDAQABo1swWTAdBgNVHQ4EFgQUlXgMSY20WqBUQuL46CzH12MOnM0wOAYDVR0RBDEwL4IPY2FzLmV4YW1wbGUub3JnhhxjYXMuZXhhbXBsZS5vcmcvaWRwL21ldGFkYXRhMA0GCSqGSIb3DQEBCwUAA4IBAQBHnAFMeWbjTGPzLv/q3Y5964nS3JmB8lLOMG0hNKinnqAaFMgexYf2eIm/hSBWD5Xxy/R4wlFGCEUyokUdCr/1+gImfeSE5ztfOheP/DVSDxW9YBcUp+KysVZzvYlN/Lw4PFv5oAPLWnB22QP/MxcBGAIjwbgcTXauW65bVN3fD7dvaIVzPIA3D4wA+/4j8auMsYn0DCdeKpacEZc/eiV+5y7MbRMQ9g7eVyLT6KVb5vguN8jLvHrQ4Fbmzr5ERJubePSWV/gENOB93gbqnV92R7suukt6Sm6MqhYHAbU0XW9U+qBTYMpLBwrQB77pLZX4ngBKW+6R2iaKd9BoRiJQ',
      ),
    ),
    'scope' => 
    array (
      0 => 'example.org',
    ),
    'auth' => 'default-sp',
  );