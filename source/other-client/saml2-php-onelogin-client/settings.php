<?php
$spBaseUrl = 'https://cas.example.org:60000'; //or http://<your_domain>
$settingsInfo = array (
    'debug' => true,
    'sp' => array (
        'entityId' => $spBaseUrl.'/metadata.php',
        'assertionConsumerService' => array (
            'url' => $spBaseUrl.'/index.php?acs',
        ),
        'singleLogoutService' => array (
            'url' => $spBaseUrl.'/index.php?sls',
        ),
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
    ),
    'idp' => array (
        'entityId' => 'https://cas.example.org/idp',
        'singleSignOnService' => array (
            'url' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/Redirect/SSO',
        ),
        'singleLogoutService' => array (
            'url' => 'https://cas.example.org:8443/cas/idp/profile/SAML2/Redirect/SLO',
        ),
        'x509cert' => 'MIIDHjCCAgagAwIBAgIVALTRGoRDDLmFRCdC54e3SCOm4Il4MA0GCSqGSIb3DQEBCwUAMBoxGDAW
            BgNVBAMMD2Nhcy5leGFtcGxlLm9yZzAeFw0xOTExMTYwMjE0MTFaFw0zOTExMTYwMjE0MTFaMBox
            GDAWBgNVBAMMD2Nhcy5leGFtcGxlLm9yZzCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEB
            AI0nLjzV/IBZwMHmWsS+80dxZHfvJ12ESligYGiAoj8sCvSu1nGhXMWUq8yEbAIdop+jAtc4ay27
            lvgloIoYvdeJBhAOB6Mtad/V1lEV/RbmYrSCRuMDZ2cHX38Bn9iPifhibXbNAKLe9hhGUcTW9YRS
            T/em5qg1AKa8iH72jLMJZRaBgqpHKCGpAim4Tihfec7HhSSW5ko8VcrvHdW04LM/hREXPHnRXdwL
            34d71e6PEn2fJnDn4ySXRcs2r/2Ai0Itf0txMGV0NHCoDlzq2EntzA+7dwR5UwwsrVgEyW2Qb+ze
            gcX7HGg+sDC4XNg2hJ4m014wjYxfmJV+XJ6IC4ECAwEAAaNbMFkwHQYDVR0OBBYEFEZls11vLuK+
            7zTDLcYR+hgw99txMDgGA1UdEQQxMC+CD2Nhcy5leGFtcGxlLm9yZ4YcY2FzLmV4YW1wbGUub3Jn
            L2lkcC9tZXRhZGF0YTANBgkqhkiG9w0BAQsFAAOCAQEAdYTQh0snrVh4k/hiymNXwY237j43z8Ch
            vSwHfRv3Om4PQpyjYTlxmS1h2RH4Y2B9JWvdiKgWyCIFWXmLzolnEWOpuNtppZHcXVIEjK5Hz41F
            g0CEuFhB/OhfAgwoniZOgMTzbT3Naw/fFf5ls6EU6fMs98wKULoZLfR/i9sT29r78zN5kSNHMcFK
            6/NBw1w0yMecz4AsmJzkjl80/PdBdHAkkEr8u8YMRaFQTnfZ9hgwVIJhEfiGgi+TROViFM4/aZAw
            +AzGQIlRvQU006UMkKZxioYiZX0H+HABNmnmPlkjH1/KQs1fzX9CDash3E800ZGhqQMyk4/+tL+u
            ceOTqA==',
    ),
);