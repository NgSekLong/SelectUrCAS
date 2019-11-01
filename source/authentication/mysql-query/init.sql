DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS USERATTRS;

CREATE TABLE USERATTRS (
  id INT NOT NULL AUTO_INCREMENT ,
  uid VARCHAR(50) NOT NULL,
  attrname VARCHAR(50) NOT NULL,
  attrvalue VARCHAR(50) NOT NULL,
  primary key (id)
);


CREATE TABLE USERS (
  id INT NOT NULL AUTO_INCREMENT ,
  uid VARCHAR(50) NOT NULL,
  psw VARCHAR(50) NOT NULL,
  primary key (id)
);

INSERT INTO USERS (uid, psw)
VALUES ('cooldude', 'Mellon');

INSERT INTO USERATTRS (uid,  attrname, attrvalue)
VALUES ('cooldude', 'firstname', 'Cool');

INSERT INTO USERATTRS (uid, attrname, attrvalue)
VALUES ('cooldude', 'lastname', 'Dude');

INSERT INTO USERATTRS (uid, attrname, attrvalue)
VALUES ('cooldude', 'phone', '+13476452319');