DROP TABLE module_task;

DROP TABLE private;

DROP TABLE department;

DROP TABLE module;

DROP TABLE user;

CREATE TABLE user(
                   id int(7) NOT NULL AUTO_INCREMENT,
                   firstname varchar(50) NOT NULL,
                   lastname varchar(50)NOT NULL,
                   username varchar(50) NOT NULL,
                   pwd varchar(15) NOT NULL,
                   PRIMARY KEY(id)
);

CREATE TABLE module(

                     code char(7) NOT NULL,
                     name varchar(50)NOT NULL,
                     PRIMARY KEY(code)
);

CREATE TABLE department(
                         id int(7) NOT NULL AUTO_INCREMENT,
                         today DATE,
                         task varchar(250) NOT NULL,
                         comments varchar(250),
                         deadline date,
                         completed char(3),
                         user_id int,
                         PRIMARY KEY(id),
                         CONSTRAINT FK_department FOREIGN KEY (user_id) REFERENCES user(id)
);


CREATE TABLE module_task
(
  id        int(7)       NOT NULL AUTO_INCREMENT,
  today     DATE,
  code char(7),
  task      varchar(250) NOT NULL,
  comments  varchar(250),
  deadline  date,
  completed char(3),
  user_id   int,
  PRIMARY KEY (id),
  CONSTRAINT FK_module_task_user FOREIGN KEY (user_id) REFERENCES user(id),
  CONSTRAINT FK_module_task_module FOREIGN KEY (code) REFERENCES module(code)
);

CREATE TABLE private(
                      id int(7) NOT NULL AUTO_INCREMENT,
                      today DATE,
                      task varchar(250) NOT NULL,
                      comments varchar(250),
                      deadline date,
                      completed char(3),
                      user_id int,
                      PRIMARY KEY(id),
                      CONSTRAINT FK_private FOREIGN KEY (user_id) REFERENCES user(id))
;

INSERT INTO module VALUES ('SCDM001', 'Data Visualisation');
INSERT INTO module VALUES ('SCDM002', 'Databases');
INSERT INTO module VALUES ('SCDM003', 'Data Dashboards');
INSERT INTO module VALUES ('SCDM004', 'Data Analysis');
INSERT INTO module VALUES ('SCDM005', 'Website Development');
INSERT INTO module VALUES ('SCDM006', 'R Programming');

INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('John', 'Rebus', 'jr001', 'edinburgh');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Jim', 'Taggart', 'jt002', 'glasgow');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Sherlock', 'Holmes', 'sh003', 'london');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('James', 'Bond', 'jb007', 'international');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Jessica', 'Fletcher', 'jf004', 'maine');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Kelly', 'Garrett', 'kg005', 'losangeles');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Kris', 'Munroe', 'km006', 'bosley');
INSERT INTO 'user' ('firstname', 'lastname', 'username', 'pwd') VALUES ('Sabrina', 'Duncan', 'sd008', 'charlie');