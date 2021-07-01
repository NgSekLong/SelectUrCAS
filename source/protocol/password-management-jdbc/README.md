## Password Management JDBC

How to use:
1. Create a temp email from https://10minutemail.net/ or other similar site
2. change init.sql, add the temp email into email fields 
3. Start the docker stack
4. Go to https://cas.example.org:8443/cas/login, click reset password
5. Refresh https://10minutemail.net/, until email was receive
6. Use the code received from last step to reset user
7. Hints: **Mellon** is the best fruit!

Known issue:
- Reset password last step is currently not working due to null pointer exception in PasswordChangeAction

Documentation: https://apereo.github.io/cas/6.3.x/password_management/Password-Management-JDBC.html#password-management---jdbc