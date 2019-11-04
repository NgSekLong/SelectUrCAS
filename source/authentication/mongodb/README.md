<html>
## MongoDB Authentication

Login using:
- Username: mongodb
- Password: Mellon

Steps to add / remove user:
- Edit `init.js`

Steps to inside MongoDB to have a look at your user data:
> [sudo] docker exec -ti project-all-cas_authentication_mongodb_1 bash
> mongo --username root --password ThisIsThePasswordForRoot --authenticationDatabase admin
> use authentication-mongodb
> show collections;
> db.users.find({}).pretty();


Documentation: https://apereo.github.io/cas/6.1.x/installation/MongoDb-Authentication.html
</html>