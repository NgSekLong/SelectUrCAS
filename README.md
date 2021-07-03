# Select Ur CAS

*This project assume you already know about Apereo CAS https://github.com/apereo/cas*

## Introduction

A common question for starter of CAS usually is something like this: "How can I use `XXXXX` authentication, with an `XXXXX` ticket registry cluster, and with `XXXXX` protocol enabled?" 

This shows that CAS while being incredibly powerful and well documented, it is definitely daunting for beginners. This project, **Select Ur CAS** is a project aims to tackle this issue.

**Select Ur CAS** is a project aims to provide a customizable full stack CAS example, so you can have a solid example to work on top of when you start building your own CAS server.

Here's an architecture diagram to show the possibilty of **Select Ur CAS**:

![image](https://drive.google.com/uc?export=view&id=1yBlWbs5DaRJUHpktIEy6qOiLwADE_J21)

Empowered by **Docker**, **Select Ur CAS** is very flexible in term of what can be mix and matched together.

Note that:
- **Select Ur CAS** is not associated to Apereo, just an project from a user of CAS :)
- **Select Ur CAS** is components might not always follow secure best practice for ease of demo (While I tried my best in making it as secure as possible), you should probably not relies on this project for secure standard...

## Prerequisite

Need to install the following

- Docker
- Docker composer

## Setup

1. Open `gen-my-cas.html` using a Chrome browser (Firefox, Safari and other browser currently would not work)
2. Select the CAS components that you want to include in your stack (e.g. *MySQL Authentication* + *Redis Ticket Registry* +*OAuth 2 protocol client* + ...)
3. Copy the docker command generated
4. Paste it in the root directory of this repository
5. Execute script and wait for everything components ready (This might take a long time!)
6. Add `127.0.0.1 cas.example.org` into your host file
7. Read the documentation for each components in the `gen-my-cas.html` page, they contains testing credential, initialize URL, documentation and other useful info 
  - If you want just test basic authentication, go to `https://cas.example.org:8443/cas/login`
8. Start to play with your deployment!

## Troubleshoot

1. Why is my browser showing cert is not valid or already expired?
    - We are using self-sign cert to reduce the complexity of the demo, you can either add this cert to your trusted certification or just accept the risk before testing.
2. Having trouble start up your system because of Tomcat listening problem? 
    - then you might already have ports exposed in this machine, turning them off will solve this issue
    - In normal mechaism, you need to reserved at least port `8443` and `80` for **Select Ur CAS** project
    - A number of other ports might also need to be reserved depends on components selected, check the *READMD.md* for for each project for ports!
3. The keystore is expired / I want to use a different keystore!

The keystore can be generated with this

> keytool -genkeypair -alias cas -keyalg RSA -keypass changeit -storepass changeit -keystore /etc/cas/thekeystore  -dname CN=cas.example.org,OU=Example,OU=Org,C=US -ext SAN=dns:cas.example.org,dns:localhost,ip:127.0.0.1 -validity 3600


The P12 keystore can be generated with this:

> keytool -importkeystore -srckeystore /etc/cas/thekeystore  -destkeystore /etc/cas/keystore.p12 -deststoretype PKCS12 -srcalias cas -srcstorepass changeit -deststorepass changeit  -destkeypass changeit 

The PEM public cert can be  generated with this:

> openssl pkcs12 -in /etc/cas/keystore.p12 -passin pass:changeit  -nokeys -out /etc/cas/cas_public.crt

The PEM CA cert can be  generated with this:

> openssl pkcs12 -in /etc/cas/keystore.p12 -passin pass:changeit -cacerts -chain -nokeys -out /etc/cas/cas_ca_public.crt

The PEM private cert can be  generated with this:

> openssl pkcs12 -in /etc/cas/keystore.p12 -passin pass:changeit -nodes -nocerts -out /etc/cas/cas_private.pem



## Current Support demo:
- OpenLdap Authentication
- Mysql Query Authentication
- JSON Whitelist Authentication
- MongoDB Authentication
- Rest Authentication
- Freeradius Authentication

- Rest Attribute Storage
- Json Attribute Storage
- Mysql Attribute Storage

- Java CAS client
- Phpcas client
- Modauthcas client

- OAuth protocol + php client
- Oidc protocol + php client
- Passwordless Authentication by email
- SAML 2 protocol + Simplesamlphp

- MongoDB Ticket registry
- Hazelcast Ticket registry
- Redis Ticket registry

- Json Service Storage

