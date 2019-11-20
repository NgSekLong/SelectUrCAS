DROP TABLE IF EXISTS pm_table_accounts;
DROP TABLE IF EXISTS pm_table_questions;

CREATE TABLE pm_table_accounts (
  id INT NOT NULL AUTO_INCREMENT ,
  userid varchar(255) NOT NULL, 
  password varchar(255) NOT NULL, 
  email varchar(255) NOT NULL,
  primary key (id)
);

CREATE TABLE pm_table_questions (
  id INT NOT NULL AUTO_INCREMENT ,
  userid VARCHAR(255) NOT NULL,
  question  VARCHAR(255) NOT NULL,
  answer  VARCHAR(255) NOT NULL,
  primary key (id)
);

INSERT INTO pm_table_accounts (userid, password, email)
VALUES 
  ('casuser', 'Mellon', 'sxp30825@eveav.com'),
  ('password-management-jdbc', 'Mellon', 'sxp30825@eveav.com');



INSERT INTO pm_table_questions (userid, question, answer)
VALUES 
  ('casuser', 'What fruit is best fruit?', 'Mellon'),
  ('password-management-jdbc', 'Just type something', 'something');