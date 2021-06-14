<md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata" xmlns:ds="http://www.w3.org/2000/09/xmldsig#" entityID="https://cas.example.org:61616/simplesaml/saml2/idp/metadata.php">
	<md:IDPSSODescriptor protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
		<md:KeyDescriptor use="signing">
			<ds:KeyInfo xmlns:ds="http://www.w3.org/2000/09/xmldsig#">
				<ds:X509Data>
					<ds:X509Certificate>
MIIDezCCAuSgAwIBAgIJAOm6UHWUfk8kMA0GCSqGSIb3DQEBBQUAMIGGMQswCQYDVQQGEwJISzELMAkGA1UECBMCSEsxCzAJBgNVBAcTAkhLMRIwEAYDVQQKEwlIa2VkdWNpdHkxEjAQBgNVBAsTCUhrZWR1Y2l0eTEUMBIGA1UEAxMLTmcgU2VrIExvbmcxHzAdBgkqhkiG9w0BCQEWEGFuZHluZ0Boa2VjbC5uZXQwHhcNMTcwNzE3MDgyOTEwWhcNMTcwODE2MDgyOTEwWjCBhjELMAkGA1UEBhMCSEsxCzAJBgNVBAgTAkhLMQswCQYDVQQHEwJISzESMBAGA1UEChMJSGtlZHVjaXR5MRIwEAYDVQQLEwlIa2VkdWNpdHkxFDASBgNVBAMTC05nIFNlayBMb25nMR8wHQYJKoZIhvcNAQkBFhBhbmR5bmdAaGtlY2wubmV0MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCfMNobAOhTBRlHAc9i+IHnwuSBlitS00QAhLNhhJwNv1YpPufMGcC3kF7HxkVdr6/dpAtvPyLN2m4HBPTFj6zMfVtbyfp4KgtpxVmyC9plfnVd4ps7426ej5SlWLUwSsGystUGXczjapu+OPnhswOG4lZqrH0IB4kwE7CMckj75QIDAQABo4HuMIHrMB0GA1UdDgQWBBRV9Fnar68kQiZaMhvvmYqQQB6SXDCBuwYDVR0jBIGzMIGwgBRV9Fnar68kQiZaMhvvmYqQQB6SXKGBjKSBiTCBhjELMAkGA1UEBhMCSEsxCzAJBgNVBAgTAkhLMQswCQYDVQQHEwJISzESMBAGA1UEChMJSGtlZHVjaXR5MRIwEAYDVQQLEwlIa2VkdWNpdHkxFDASBgNVBAMTC05nIFNlayBMb25nMR8wHQYJKoZIhvcNAQkBFhBhbmR5bmdAaGtlY2wubmV0ggkA6bpQdZR+TyQwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQA0QgfC1ZWDTTRiCDWCO9Pzz4llutXfdujWMRejvKKkPRTMyThYcxOS+L3DqgAWE96gnwzpRYkRlWA8rYxWAMDPn8p9/w2FXr2UXC4IuqIkhfZrCTR1FV+/sGVqubcTl13VIFbv0OgbwmAVGU/A6HGu4J0di8axwPwpHDEY63uFKg==
					</ds:X509Certificate>
				</ds:X509Data>
			</ds:KeyInfo>
		</md:KeyDescriptor>
		<md:KeyDescriptor use="encryption">
			<ds:KeyInfo xmlns:ds="http://www.w3.org/2000/09/xmldsig#">
				<ds:X509Data>
					<ds:X509Certificate>
MIIDezCCAuSgAwIBAgIJAOm6UHWUfk8kMA0GCSqGSIb3DQEBBQUAMIGGMQswCQYDVQQGEwJISzELMAkGA1UECBMCSEsxCzAJBgNVBAcTAkhLMRIwEAYDVQQKEwlIa2VkdWNpdHkxEjAQBgNVBAsTCUhrZWR1Y2l0eTEUMBIGA1UEAxMLTmcgU2VrIExvbmcxHzAdBgkqhkiG9w0BCQEWEGFuZHluZ0Boa2VjbC5uZXQwHhcNMTcwNzE3MDgyOTEwWhcNMTcwODE2MDgyOTEwWjCBhjELMAkGA1UEBhMCSEsxCzAJBgNVBAgTAkhLMQswCQYDVQQHEwJISzESMBAGA1UEChMJSGtlZHVjaXR5MRIwEAYDVQQLEwlIa2VkdWNpdHkxFDASBgNVBAMTC05nIFNlayBMb25nMR8wHQYJKoZIhvcNAQkBFhBhbmR5bmdAaGtlY2wubmV0MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCfMNobAOhTBRlHAc9i+IHnwuSBlitS00QAhLNhhJwNv1YpPufMGcC3kF7HxkVdr6/dpAtvPyLN2m4HBPTFj6zMfVtbyfp4KgtpxVmyC9plfnVd4ps7426ej5SlWLUwSsGystUGXczjapu+OPnhswOG4lZqrH0IB4kwE7CMckj75QIDAQABo4HuMIHrMB0GA1UdDgQWBBRV9Fnar68kQiZaMhvvmYqQQB6SXDCBuwYDVR0jBIGzMIGwgBRV9Fnar68kQiZaMhvvmYqQQB6SXKGBjKSBiTCBhjELMAkGA1UEBhMCSEsxCzAJBgNVBAgTAkhLMQswCQYDVQQHEwJISzESMBAGA1UEChMJSGtlZHVjaXR5MRIwEAYDVQQLEwlIa2VkdWNpdHkxFDASBgNVBAMTC05nIFNlayBMb25nMR8wHQYJKoZIhvcNAQkBFhBhbmR5bmdAaGtlY2wubmV0ggkA6bpQdZR+TyQwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQA0QgfC1ZWDTTRiCDWCO9Pzz4llutXfdujWMRejvKKkPRTMyThYcxOS+L3DqgAWE96gnwzpRYkRlWA8rYxWAMDPn8p9/w2FXr2UXC4IuqIkhfZrCTR1FV+/sGVqubcTl13VIFbv0OgbwmAVGU/A6HGu4J0di8axwPwpHDEY63uFKg==
					</ds:X509Certificate>
				</ds:X509Data>
			</ds:KeyInfo>
		</md:KeyDescriptor>
		<md:SingleLogoutService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://cas.example.org:61616/simplesaml/saml2/idp/SingleLogoutService.php"/>
		<md:NameIDFormat>
urn:oasis:names:tc:SAML:2.0:nameid-format:transient
		</md:NameIDFormat>
		<md:SingleSignOnService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect" Location="https://cas.example.org:61616/simplesaml/saml2/idp/SSOService.php"/>
	</md:IDPSSODescriptor>
</md:EntityDescriptor>