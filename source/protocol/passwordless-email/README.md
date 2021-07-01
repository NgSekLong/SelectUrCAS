## Passwordless Authentication - Email

Passwordless authenticaiton using email:
1. Create a temp email from https://10minutemail.net/ or other similar site
2. change docker-compose, add the temp email into SENT_TO_EMAIL 
2. Go to https://cas.example.org:8443/cas/login, type in `casuser` and enter
3. Refresh https://10minutemail.net/, until email was receive
4. Use the code received from last step to login to CAS

Documentation: https://apereo.github.io/cas/6.3.x/installation/Passwordless-Authentication.html#passwordless-authentication