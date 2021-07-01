DROP TABLE IF EXISTS USERATTRS;

CREATE TABLE USERATTRS (
  id INT NOT NULL AUTO_INCREMENT ,
  uid VARCHAR(50) NOT NULL,
  attrname VARCHAR(50) NOT NULL,
  attrvalue VARCHAR(50) NOT NULL,
  primary key (id)
);

INSERT INTO USERATTRS (uid,  attrname, attrvalue)
VALUES 
  ('casuser', 'attributeRetriveFrom', 'mysql'),
  ('casuser', 'firstname', 'Cool'),
  ('casuser', 'lastname', 'Dude'),
  ('casuser', 'phone', '+13476452319');

INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('freeradius', 'attributeRetriveFrom', 'mysql'), ('freeradius', 'jsonUsernameRetrived', 'freeradius');
INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('json-whitelist', 'attributeRetriveFrom', 'mysql'), ('json-whitelist', 'jsonUsernameRetrived', 'json-whitelist');
INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('mongodb', 'attributeRetriveFrom', 'mysql'), ('mongodb', 'jsonUsernameRetrived', 'mongodb');
INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('mysql-query', 'attributeRetriveFrom', 'mysql'), ('mysql-query', 'jsonUsernameRetrived', 'mysql-query');
INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('openldap', 'attributeRetriveFrom', 'mysql'), ('openldap', 'jsonUsernameRetrived', 'openldap');
INSERT INTO USERATTRS (uid,  attrname, attrvalue) VALUES ('rest', 'attributeRetriveFrom', 'mysql'), ('rest', 'jsonUsernameRetrived', 'rest');
