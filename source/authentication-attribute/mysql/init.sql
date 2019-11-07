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