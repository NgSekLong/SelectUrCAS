## Password Management JDBC

How to use:
1. Create a temp email from https://10minutemail.net/ or other similar site
2. change init.sql, add the temp email into email fields 
3. Start the docker stack
4. Go to https://cas.example.org:8443/cas/login, click reset password
5. Refresh https://10minutemail.net/, until email was receive
6. Use the code received from last step to reset user