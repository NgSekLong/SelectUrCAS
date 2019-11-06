# Select Ur CAS

*This project assume you already know about CAS https://github.com/apereo/cas*

## Introduction

A common question for starter of CAS usually is something like this: "How can I use `XXXXX` authentication, with an `XXXXX` technology cluster, and with `XXXXX` technology enabled?" 

While being incredibly well documented, CAS does seems daunting for starter. 

**Select Ur CAS** is a project aims to provide a customizable full stack CAS example, so you can have a solid example to work on top of when you start your project.

Empowered by **Docker**, **Select Ur CAS** is very flexible in term of what can be mix and matched together.

## Prerequisite

Need to install the following

- Docker
- Docker composer

## Setup

1. Open `gen-my-cas.html` using a Chrome browser (Firefox and other would not work)
2. Select the CAS components that you want to include in your stack (e.g. *MySQL Authentication* + *JSON Service Registry* + ...)
3. Copy the docker command generated
4. Add `127.0.0.1 cas.example.org` into your host file
5. Paste it in the root directory of this repository
7. Execute script and wait for everything components ready
8. Read the documentation for each components, for how to use them
8. If you want just test authentication, go to `http://cas.example.org:8443/cas`
9. Start to play with your deployment!

## Troubleshoot

1. Having trouble start up your system because of Tomcat listening problem? 
    - then you might already have ports exposed in this machine, turning them off will solve this issue
    - In normal mechaism, you need to reserved port `8443` and `80` for **Select Ur CAS** project
    - A number of other ports might also need to be reserved depends on components selected, check the *READMD.md* for for each project for ports!

