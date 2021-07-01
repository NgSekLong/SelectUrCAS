# Contributing to this repository

First of all, thank you for considering contribution for this project :)

## Add a new modules:

1. Create your new module
   - You should add in in `source/FEATURES/MODULE`, where FEATURES is the feature your module resides in
   - E.g. If you want to add Casandar Authentication, you should add `source/authentication/casandar` then start working in it
2. Create a `README.md` for your module, very brieftly describe your module feature (e.g. how to login). At the end of each module add the relevant documentation
3. Create files needed for your module, you can create `cas.yml`, `build.gradle` and more
4. Create a `docker-compose.yml` linking all your new files for your module

A common `docker-composer.yml` would be like so:
```
version: '3.7'
services:
  cas_server:
    volumes: 
      - type: bind
        source: ${PROTOCOL_JWT_SERVICE_TICKETS_PATH:-.}/cas.yml
        target: ${CONFIG_PATH:-.}/${PROTOCOL_JWT_SERVICE_TICKETS}.yml
        read_only: true
      - type: bind
        source: ${PROTOCOL_JWT_SERVICE_TICKETS_PATH:-.}/build.gradle
        target: ${BUILD_GRADLE_DEPENDENCIES_PATH:-.}/${PROTOCOL_JWT_SERVICE_TICKETS_PATH:-.}/build.gradle
        read_only: true
    environment:
      PROTOCOL_JWT_SERVICE_TICKETS_PATH: ${PROTOCOL_JWT_SERVICE_TICKETS_PATH}
```
  - If you bind your `cas.yml` to `${CONFIG_PATH:-.}`, your config will be loaded.
  - If you bind your `build.gradle` to `${BUILD_GRADLE_DEPENDENCIES_PATH:-.}`, the modules inside your `build.gradle` will get loaded on start up




## Before push

1. Make sure to check you module! If it is not ready is also ok but make sure to mark it as so in the `README.md` for that module
1. Execute `./bin/convert_path_to_env.sh` to regenerate `env.jsonp` and `.env`, this is so that the `gen-my-cas.html` can select the new modules.