<?php 
$metadata['simplesamlphp'] = array (
  'entityid' => 'simplesamlphp',
  'contacts' => 
  array (
  ),
  'metadata-set' => 'saml20-sp-remote',
  'expire' => 2205477180,
  'AssertionConsumerService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://cas.example.org:8443/cas/login?client_name=SAMLIdp',
      'index' => 0,
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://cas.example.org:8443/cas/login?client_name=SAMLIdp&logoutendpoint=true',
    ),
    1 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
      'Location' => 'https://cas.example.org:8443/cas/login?client_name=SAMLIdp&logoutendpoint=true',
    ),
    2 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://cas.example.org:8443/cas/login?client_name=SAMLIdp&logoutendpoint=true',
    ),
    3 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
      'Location' => 'https://cas.example.org:8443/cas/login?client_name=SAMLIdp&logoutendpoint=true',
    ),
  ),
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
  'keys' => 
  array (
    0 => 
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIIDLTCCAhWgAwIBAgIEPTzxfjANBgkqhkiG9w0BAQsFADBHMQswCQYDVQQGEwJVUzEMMAoGA1UE CxMDT3JnMRAwDgYDVQQLEwdFeGFtcGxlMRgwFgYDVQQDEw9jYXMuZXhhbXBsZS5vcmcwHhcNMTkx MTA1MDkxNjQzWhcNMjAwMjAzMDkxNjQzWjBHMQswCQYDVQQGEwJVUzEMMAoGA1UECxMDT3JnMRAw DgYDVQQLEwdFeGFtcGxlMRgwFgYDVQQDEw9jYXMuZXhhbXBsZS5vcmcwggEiMA0GCSqGSIb3DQEB AQUAA4IBDwAwggEKAoIBAQCFqJnF2QlfREiPNVLGgc7K1n+A26bfHFe9TEasG6cSxqSTl4Hm9c3D YeXpvdLQQK8VvZZGg5njSEVmSx4XXzQFhTVKc1iNUeAPBr8UNLLHRipEt3tUuN9RTKVGGmwM56G4 X9N6cZVbiMc8pzSclZRkOrH5MszOr6LdSfOdvBfxW9TTCnwv/hfSYKfrTw1ZFvR/aHxxChsjSNAO AeDKPDXogxAaPHvlldR7u3lVjnR/dMlBBgFaREZbn4ze0HPO6yRTnrIMpTQlYVJPdt8ZRkOY296w WivSY3cbPhKMa7DcPZGg2auqn+4TryJZ7KImiwmz8IVoisnFRMX62/7Mcq85AgMBAAGjITAfMB0G A1UdDgQWBBRBV6vjez3FCLPPGKTM/iJ4ZLDdIjANBgkqhkiG9w0BAQsFAAOCAQEAWaFGt0DBUKSZ NWTqhjsWYqdkF6oQFZv5dMmn+vCdbcaNXFgDZB0a6GjDSPtNr2BvktG20rgpJsl+v3PJ1ZYlbe9L CWJbHfja6c9UiGZsTs+aZ3ZM/YCiJ6ddxRJOeQjTb9Q0ZHvx/yl28FUVbwbM2WbVEPqgbGUnkMm8 N1CvCb6svqaSuJFQpcuAeTtEqvYEKg39+DoYQuPEC8z1UycsvyL/j2X72rXICnDLOafLGiowE7YF 8sICyb3mySAk4QhWxo0FDiVHZv1VcxHu4ez6eA3j0Bjw5MbhiviIe0dQrlB9yd0CmphCleBiATu9 kbqgIxqFZfbK30Sqrzz8i87voA==
					',
    ),
    1 => 
    array (
      'encryption' => true,
      'signing' => false,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIIDLTCCAhWgAwIBAgIEPTzxfjANBgkqhkiG9w0BAQsFADBHMQswCQYDVQQGEwJVUzEMMAoGA1UE CxMDT3JnMRAwDgYDVQQLEwdFeGFtcGxlMRgwFgYDVQQDEw9jYXMuZXhhbXBsZS5vcmcwHhcNMTkx MTA1MDkxNjQzWhcNMjAwMjAzMDkxNjQzWjBHMQswCQYDVQQGEwJVUzEMMAoGA1UECxMDT3JnMRAw DgYDVQQLEwdFeGFtcGxlMRgwFgYDVQQDEw9jYXMuZXhhbXBsZS5vcmcwggEiMA0GCSqGSIb3DQEB AQUAA4IBDwAwggEKAoIBAQCFqJnF2QlfREiPNVLGgc7K1n+A26bfHFe9TEasG6cSxqSTl4Hm9c3D YeXpvdLQQK8VvZZGg5njSEVmSx4XXzQFhTVKc1iNUeAPBr8UNLLHRipEt3tUuN9RTKVGGmwM56G4 X9N6cZVbiMc8pzSclZRkOrH5MszOr6LdSfOdvBfxW9TTCnwv/hfSYKfrTw1ZFvR/aHxxChsjSNAO AeDKPDXogxAaPHvlldR7u3lVjnR/dMlBBgFaREZbn4ze0HPO6yRTnrIMpTQlYVJPdt8ZRkOY296w WivSY3cbPhKMa7DcPZGg2auqn+4TryJZ7KImiwmz8IVoisnFRMX62/7Mcq85AgMBAAGjITAfMB0G A1UdDgQWBBRBV6vjez3FCLPPGKTM/iJ4ZLDdIjANBgkqhkiG9w0BAQsFAAOCAQEAWaFGt0DBUKSZ NWTqhjsWYqdkF6oQFZv5dMmn+vCdbcaNXFgDZB0a6GjDSPtNr2BvktG20rgpJsl+v3PJ1ZYlbe9L CWJbHfja6c9UiGZsTs+aZ3ZM/YCiJ6ddxRJOeQjTb9Q0ZHvx/yl28FUVbwbM2WbVEPqgbGUnkMm8 N1CvCb6svqaSuJFQpcuAeTtEqvYEKg39+DoYQuPEC8z1UycsvyL/j2X72rXICnDLOafLGiowE7YF 8sICyb3mySAk4QhWxo0FDiVHZv1VcxHu4ez6eA3j0Bjw5MbhiviIe0dQrlB9yd0CmphCleBiATu9 kbqgIxqFZfbK30Sqrzz8i87voA==
					',
    ),
  ),
  'validate.authnrequest' => false,
  'saml20.sign.assertion' => false,
);