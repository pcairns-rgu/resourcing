DROP TABLE images;

DROP TABLE teaches_module;

DROP TABLE module_task;

DROP TABLE private;

DROP TABLE department;

DROP TABLE module;

DROP TABLE user;

CREATE TABLE `user`(
                   username varchar(20) NOT NULL,
                   firstname varchar(50) NOT NULL,
                   lastname varchar(50)NOT NULL,
                   pwd varchar(255) NOT NULL,
                   PRIMARY KEY(username)
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
                         username varchar(20),
                         PRIMARY KEY(id),
                         CONSTRAINT FK_department FOREIGN KEY (username) REFERENCES user(username) ON UPDATE CASCADE
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
  username varchar(20),
  PRIMARY KEY (id),
  CONSTRAINT FK_module_task_user FOREIGN KEY (username) REFERENCES user(username) ON UPDATE CASCADE,
  CONSTRAINT FK_module_task_module FOREIGN KEY (code) REFERENCES module(code) ON UPDATE CASCADE
);

CREATE TABLE private
(
  id        int(7)       NOT NULL AUTO_INCREMENT,
  today     DATE,
  task      varchar(250) NOT NULL,
  comments  varchar(250),
  deadline  date,
  completed char(3),
  username  varchar(20),
  PRIMARY KEY (id),
  CONSTRAINT FK_private FOREIGN KEY (username) REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE
)
;


CREATE TABLE documents(
                     id int NOT NULL AUTO_INCREMENT,
                     filename varchar(255) NOT NULL,
                     mod_code char(7),
                     PRIMARY KEY(id),
                     CONSTRAINT FK_images FOREIGN KEY(mod_code) REFERENCES module(code) ON UPDATE CASCADE
);

CREATE TABLE teaches_module(
                             mod_code char(7),
                             username varchar(20),
                             PRIMARY KEY(mod_code, username),
                             CONSTRAINT FK_teaches_module_user FOREIGN KEY(username) REFERENCES user(username) ON UPDATE CASCADE,
                             CONSTRAINT FK_teaches_module_module FOREIGN KEY(mod_code) REFERENCES module(code) ON UPDATE CASCADE



);


CREATE TABLE articles(
          id          int          NOT NULL AUTO_INCREMENT,
          title       varchar(255) NOT NULL,
          webref      varchar(255) NOT NULL,
          description varchar(255) NOT NULL,
          mod_code    char(7),
          PRIMARY KEY (id),
          CONSTRAINT FK_images FOREIGN KEY (mod_code) REFERENCES module (code) ON UPDATE CASCADE
);

CREATE TABLE notes(
                       id  int  NOT NULL AUTO_INCREMENT,
                       notes       varchar(255) NOT NULL,
                       mod_code    char(7),
                       PRIMARY KEY (id),
                       CONSTRAINT FK_images FOREIGN KEY (mod_code) REFERENCES module (code) ON UPDATE CASCADE
);


INSERT INTO module VALUES ('SCDM001', 'Data Visualisation');
INSERT INTO module VALUES ('SCDM002', 'Databases');
INSERT INTO module VALUES ('SCDM003', 'Data Dashboards');
INSERT INTO module VALUES ('SCDM004', 'Data Analysis');
INSERT INTO module VALUES ('SCDM005', 'Website Development');
INSERT INTO module VALUES ('SCDM006', 'R Programming');

INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('John', 'Rebus', 'jr001', 'edinburgh');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Jim', 'Taggart', 'jt002', 'glasgow');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Sherlock', 'Holmes', 'sh003', 'london');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('James', 'Bond', 'jb007', 'international');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Jessica', 'Fletcher', 'jf004', 'maine');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Kelly', 'Garrett', 'kg005', 'losangeles');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Kris', 'Munroe', 'km006', 'bosley');
INSERT INTO user (`firstname`, `lastname`, `username`, `pwd`) VALUES ('Sabrina', 'Duncan', 'sd008', 'charlie');

INSERT INTO teaches_module VALUES('SCDM001', 'jr001');
INSERT INTO teaches_module VALUES('SCDM006', 'jt002');
INSERT INTO teaches_module VALUES('SCDM002', 'sh003');
INSERT INTO teaches_module VALUES('SCDM003', 'jb007');
INSERT INTO teaches_module VALUES('SCDM004','jf004');
INSERT INTO teaches_module VALUES('SCDM005', 'kg005');
INSERT INTO teaches_module VALUES('SCDM006', 'km006');
INSERT INTO teaches_module VALUES('SCDM001', 'sd008');
INSERT INTO teaches_module VALUES('SCDM002', 'kg005');
INSERT INTO teaches_module VALUES('SCDM003', 'km006');
INSERT INTO teaches_module VALUES('SCDM004', 'sd008');
INSERT INTO teaches_module VALUES('SCDM005','jf004');


