package org.apereo.cas.adaptors.generic;

import org.apereo.cas.DefaultMessageDescriptor;
import org.apereo.cas.authentication.AuthenticationHandlerExecutionResult;
import org.apereo.cas.authentication.MessageDescriptor;
import org.apereo.cas.authentication.PreventedException;
import org.apereo.cas.authentication.credential.UsernamePasswordCredential;
import org.apereo.cas.authentication.exceptions.AccountDisabledException;
import org.apereo.cas.authentication.exceptions.AccountPasswordMustChangeException;
import org.apereo.cas.authentication.handler.support.AbstractUsernamePasswordAuthenticationHandler;
import org.apereo.cas.authentication.principal.PrincipalFactory;
import org.apereo.cas.services.ServicesManager;

import com.fasterxml.jackson.annotation.JsonTypeInfo;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.ObjectMapper;
import lombok.extern.slf4j.Slf4j;
import lombok.val;
import org.springframework.core.io.Resource;

import javax.security.auth.login.AccountExpiredException;
import javax.security.auth.login.AccountLockedException;
import javax.security.auth.login.AccountNotFoundException;
import javax.security.auth.login.FailedLoginException;
import java.io.Serializable;
import java.security.GeneralSecurityException;
import java.time.LocalDate;
import java.time.ZoneOffset;
import java.time.temporal.ChronoUnit;
import java.util.ArrayList;
import java.util.Map;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

/**
 * This is {@link JsonResourceAuthenticationHandler}.
 *
 * @author Misagh Moayyed
 * @since 5.3.0
 */
@Slf4j
public class JsonResourceAuthenticationHandler extends AbstractUsernamePasswordAuthenticationHandler {
    private static final Logger LOGGER = LoggerFactory.getLogger(JsonResourceAuthenticationHandler.class);
    private final ObjectMapper mapper;
    private final Resource resource;

    public JsonResourceAuthenticationHandler(final String name, final ServicesManager servicesManager,
                                             final PrincipalFactory principalFactory,
                                             final Integer order, final Resource resource) {
        super(name, servicesManager, principalFactory, order);
        this.resource = resource;
        this.mapper = new ObjectMapper()
            .findAndRegisterModules()
            .enableDefaultTyping(ObjectMapper.DefaultTyping.NON_FINAL, JsonTypeInfo.As.PROPERTY);
    }

    @Override
    protected AuthenticationHandlerExecutionResult authenticateUsernamePasswordInternal(final UsernamePasswordCredential credential,
                                                                                        final String originalPassword)
        throws GeneralSecurityException, PreventedException {
        val map = readAccountsFromResource();
        val username = credential.getUsername();
        val password = credential.getPassword();
        if (!map.containsKey(username)) {
            throw new AccountNotFoundException();
        }

        val account = map.get(username);
        if (matches(password, account.getPassword())) {
            switch (account.getStatus()) {
                case DISABLED:
                    throw new AccountDisabledException();
                case EXPIRED:
                    throw new AccountExpiredException();
                case LOCKED:
                    throw new AccountLockedException();
                case MUST_CHANGE_PASSWORD:
                    throw new AccountPasswordMustChangeException();
                case OK:
                default:
                    LOGGER.debug("Account status is OK");
            }

            val warnings = new ArrayList<MessageDescriptor>();
            if (account.getExpirationDate() != null) {
                val now = LocalDate.now(ZoneOffset.UTC);
                if (now.isEqual(account.getExpirationDate()) || now.isAfter(account.getExpirationDate())) {
                    throw new AccountExpiredException();
                }
                if (getPasswordPolicyConfiguration() != null) {
                    val warningPeriod = account.getExpirationDate()
                        .minusDays(getPasswordPolicyConfiguration().getPasswordWarningNumberOfDays());
                    if (now.isAfter(warningPeriod) || now.isEqual(warningPeriod)) {
                        val daysRemaining = ChronoUnit.DAYS.between(now, account.getExpirationDate());
                        warnings.add(new DefaultMessageDescriptor(
                            "password.expiration.loginsRemaining",
                            "You have {0} logins remaining before you MUST change your password.",
                            new Serializable[]{daysRemaining}));
                    }
                }
            }
            //val principal = this.principalFactory.createPrincipal(username, account.getAttributes());
            val principal = null;
            return createHandlerResult(credential, principal, warnings);
        }

        throw new FailedLoginException();
    }

    private Map<String, CasUserAccount> readAccountsFromResource() throws PreventedException {
        try {
            String sampleJson = "{\r\n  \"@class\" : \"java.util.LinkedHashMap\",\r\n  \"json-whitelist\" : {\r\n    \"@class\" : \"org.apereo.cas.adaptors.generic.CasUserAccount\",\r\n    \"password\" : \"Mellon\",\r\n    \"attributes\" : {\r\n      \"@class\" : \"java.util.LinkedHashMap\",\r\n      \"letbreakcas\" : [\"yup\"]\r\n    },\r\n    \"status\" : \"OK\",\r\n    \"expirationDate\" : \"2050-01-19\"\r\n  },\r\n  \"casuser\" : {\r\n    \"@class\" : \"org.apereo.cas.adaptors.generic.CasUserAccount\",\r\n    \"password\" : \"Mellon\",\r\n    \"status\" : \"OK\",\r\n    \"expirationDate\" : \"2050-01-19\"\r\n  }\r\n}";
            LOGGER.debug("Sample JSON: [{}]", sampleJson);
            LOGGER.debug("Very Interesting things here");
            return mapper.readValue(sampleJson,
                new TypeReference<Map<String, CasUserAccount>>() {
                });
        } catch (final Exception e) {
            LOGGER.error(e.getMessage(), e);
            throw new PreventedException(e);
        }
    }
}
