package org.apereo.cas.config;

import org.apereo.cas.CentralAuthenticationService;
import org.apereo.cas.adaptors.radius.RadiusClientFactory;
import org.apereo.cas.adaptors.radius.RadiusProtocol;
import org.apereo.cas.adaptors.radius.RadiusServer;
import org.apereo.cas.adaptors.radius.authentication.handler.support.RadiusAuthenticationHandler;
import org.apereo.cas.adaptors.radius.server.AbstractRadiusServer;
import org.apereo.cas.adaptors.radius.server.NonBlockingRadiusServer;
import org.apereo.cas.adaptors.radius.server.RadiusServerConfigurationContext;
import org.apereo.cas.adaptors.radius.web.flow.RadiusAccessChallengedMultifactorAuthenticationTrigger;
import org.apereo.cas.authentication.AuthenticationEventExecutionPlanConfigurer;
import org.apereo.cas.authentication.AuthenticationHandler;
import org.apereo.cas.authentication.AuthenticationServiceSelectionPlan;
import org.apereo.cas.authentication.AuthenticationSystemSupport;
import org.apereo.cas.authentication.MultifactorAuthenticationProviderResolver;
import org.apereo.cas.authentication.MultifactorAuthenticationProviderSelector;
import org.apereo.cas.authentication.MultifactorAuthenticationTrigger;
import org.apereo.cas.authentication.principal.PrincipalFactory;
import org.apereo.cas.authentication.principal.PrincipalFactoryUtils;
import org.apereo.cas.authentication.principal.PrincipalNameTransformerUtils;
import org.apereo.cas.authentication.support.password.PasswordEncoderUtils;
import org.apereo.cas.authentication.support.password.PasswordPolicyContext;
import org.apereo.cas.configuration.CasConfigurationProperties;
import org.apereo.cas.configuration.model.support.radius.RadiusClientProperties;
import org.apereo.cas.configuration.model.support.radius.RadiusServerProperties;
import org.apereo.cas.services.ServicesManager;
import org.apereo.cas.ticket.registry.TicketRegistry;
import org.apereo.cas.ticket.registry.TicketRegistrySupport;
import org.apereo.cas.web.cookie.CasCookieBuilder;

import lombok.extern.slf4j.Slf4j;
import lombok.val;
import org.springframework.beans.factory.ObjectProvider;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.boot.autoconfigure.condition.ConditionalOnMissingBean;
import org.springframework.boot.context.properties.EnableConfigurationProperties;
import org.springframework.cloud.context.config.annotation.RefreshScope;
import org.springframework.context.ConfigurableApplicationContext;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.util.StringUtils;

import java.util.List;
import java.util.Set;
import java.util.stream.Collectors;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import org.apereo.cas.authentication.principal.PrincipalResolver;

/**
 * This this {@link RadiusConfiguration}.
 *
 * @author Misagh Moayyed
 * @author Dmitriy Kopylenko
 * @since 5.0.0
 */
@Configuration("radiusConfiguration")
@EnableConfigurationProperties(CasConfigurationProperties.class)
@Slf4j
public class RadiusConfiguration {
    private static final Logger LOGGER = LoggerFactory.getLogger(RadiusConfiguration.class);

    @Autowired
    @Qualifier("multifactorAuthenticationProviderResolver")
    private ObjectProvider<MultifactorAuthenticationProviderResolver> multifactorAuthenticationProviderResolver;

    @Autowired
    @Qualifier("ticketRegistry")
    private ObjectProvider<TicketRegistry> ticketRegistry;

    @Autowired
    private CasConfigurationProperties casProperties;

    @Autowired
    private ConfigurableApplicationContext applicationContext;

    @Autowired
    @Qualifier("servicesManager")
    private ObjectProvider<ServicesManager> servicesManager;

    @Autowired
    @Qualifier("centralAuthenticationService")
    private ObjectProvider<CentralAuthenticationService> centralAuthenticationService;

    @Autowired
    @Qualifier("defaultAuthenticationSystemSupport")
    private ObjectProvider<AuthenticationSystemSupport> authenticationSystemSupport;

    @Autowired
    @Qualifier("defaultTicketRegistrySupport")
    private ObjectProvider<TicketRegistrySupport> ticketRegistrySupport;

    @Autowired
    @Qualifier("multifactorAuthenticationProviderSelector")
    private ObjectProvider<MultifactorAuthenticationProviderSelector> multifactorAuthenticationProviderSelector;

    @Autowired
    @Qualifier("authenticationServiceSelectionPlan")
    private ObjectProvider<AuthenticationServiceSelectionPlan> authenticationRequestServiceSelectionStrategies;

    @Autowired
    @Qualifier("warnCookieGenerator")
    private ObjectProvider<CasCookieBuilder> warnCookieGenerator;


    public static Set<String> getClientIps(final RadiusClientProperties client) {
        return StringUtils.commaDelimitedListToSet(StringUtils.trimAllWhitespace(client.getInetAddress()));
    }

    @ConditionalOnMissingBean(name = "radiusPrincipalFactory")
    @Bean
    public PrincipalFactory radiusPrincipalFactory() {
        return PrincipalFactoryUtils.newPrincipalFactory();
    }

    @Autowired
    @Qualifier("defaultPrincipalResolver")
    private ObjectProvider<PrincipalResolver> defaultPrincipalResolver;

    @RefreshScope
    @Bean
    public AbstractRadiusServer radiusServer() {
        val radius = casProperties.getAuthn().getRadius();
        val client = radius.getClient();
        val server = radius.getServer();

        val ips = getClientIps(client);
        return getSingleRadiusServer(client, server, ips.iterator().next());
    }

    @RefreshScope
    @Bean
    public List<RadiusServer> radiusServers() {
        val radius = casProperties.getAuthn().getRadius();
        val client = radius.getClient();
        val server = radius.getServer();

        val ips = getClientIps(radius.getClient());
        return ips.stream().map(ip -> getSingleRadiusServer(client, server, ip)).collect(Collectors.toList());
    }

    @ConditionalOnMissingBean(name = "radiusAuthenticationHandler")
    @Bean
    public AuthenticationHandler radiusAuthenticationHandler() {
        val radius = casProperties.getAuthn().getRadius();
        val h = new RadiusAuthenticationHandler(radius.getName(), servicesManager.getObject(),
            radiusPrincipalFactory(), radiusServers(),
            radius.isFailoverOnException(), radius.isFailoverOnAuthenticationFailure());

        h.setPasswordEncoder(PasswordEncoderUtils.newPasswordEncoder(radius.getPasswordEncoder()));
        h.setPrincipalNameTransformer(PrincipalNameTransformerUtils.newPrincipalNameTransformer(radius.getPrincipalTransformation()));
        h.setPasswordPolicyConfiguration(radiusPasswordPolicyConfiguration());
        return h;
    }

    @ConditionalOnMissingBean(name = "radiusAuthenticationEventExecutionPlanConfigurer")
    @Bean
    public AuthenticationEventExecutionPlanConfigurer radiusAuthenticationEventExecutionPlanConfigurer() {
        return plan -> {
            val ips = getClientIps(casProperties.getAuthn().getRadius().getClient());
            if (!ips.isEmpty()) {

                LOGGER.info("Andy is here :D");
                plan.registerAuthenticationHandlerWithPrincipalResolver(radiusAuthenticationHandler(), defaultPrincipalResolver.getObject());
            } else {
                LOGGER.warn("No RADIUS address is defined. RADIUS support will be disabled.");
            }
        };
    }

    @ConditionalOnMissingBean(name = "radiusPasswordPolicyConfiguration")
    @Bean
    public PasswordPolicyContext radiusPasswordPolicyConfiguration() {
        return new PasswordPolicyContext();
    }

    @RefreshScope
    @Bean
    @ConditionalOnMissingBean(name = "radiusAccessChallengedMultifactorAuthenticationTrigger")
    public MultifactorAuthenticationTrigger radiusAccessChallengedMultifactorAuthenticationTrigger() {
        return new RadiusAccessChallengedMultifactorAuthenticationTrigger(casProperties, multifactorAuthenticationProviderResolver.getObject());
    }


    private static AbstractRadiusServer getSingleRadiusServer(final RadiusClientProperties client,
                                                              final RadiusServerProperties server,
                                                              final String clientInetAddress) {
        val factory = new RadiusClientFactory(client.getAccountingPort(), client.getAuthenticationPort(),
            client.getSocketTimeout(), clientInetAddress, client.getSharedSecret());

        val protocol = RadiusProtocol.valueOf(server.getProtocol());
        val context = RadiusServerConfigurationContext.builder()
            .protocol(protocol)
            .radiusClientFactory(factory)
            .retries(server.getRetries())
            .nasIpAddress(server.getNasIpAddress())
            .nasIpv6Address(server.getNasIpv6Address())
            .nasPort(server.getNasPort())
            .nasPortId(server.getNasPortId())
            .nasIdentifier(server.getNasIdentifier())
            .nasRealPort(server.getNasRealPort())
            .nasPortType(server.getNasPortType())
            .build();
        return new NonBlockingRadiusServer(context);
    }
}
