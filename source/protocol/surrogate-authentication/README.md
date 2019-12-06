## Surrogate Authentication

Authenticate on behave of another person.

1. Go to https://cas.example.org:8443/cas/login
2. Login using the following 2 methods:
    - GUI mode: `+surrogate-admin` as , `Mellon` as password. Then select your surrogate target.
    - preselection mode: `surrogate-admin+surrogate-user` as username, `Mellon` as password.
3. You should be logined using surrogately

Documentation: https://apereo.github.io/cas/6.1.x/installation/Surrogate-Authentication.html