DROP TABLE module;

DROP TABLE private;

DROP TABLE department;

DROP TABLE user;

CREATE TABLE user(
                   id int(7) NOT NULL AUTO_INCREMENT,
                   firstname varchar(50) NOT NULL,
                   lastname varchar(50)NOT NULL,
                   username varchar(50) NOT NULL,
                   pwd varchar(15) NOT NULL,
                   PRIMARY KEY(id)
);


CREATE TABLE department(
                         id int(7) NOT NULL AUTO_INCREMENT,
                         today DATE,
                         task varchar(250) NOT NULL,
                         comments varchar(250),
                         deadline date,
                         completed bit,
                         user_id int,
                         PRIMARY KEY(id),
                         FOREIGN KEY (user_id) REFERENCES user(id)
);


CREATE TABLE module
(
  id        int(7)       NOT NULL AUTO_INCREMENT,
  today     DATE,
  module    char(6),
  task      varchar(250) NOT NULL,
  comments  varchar(250),
  deadline  date,
  completed bit,
  user_id   int,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user (id)
);

CREATE TABLE private(
                      id int(7) NOT NULL AUTO_INCREMENT,
                      today DATE,
                      task varchar(250) NOT NULL,
                      comments varchar(250),
                      deadline date,
                      completed bit,
                      user_id int,
                      PRIMARY KEY(id),
                      FOREIGN KEY (user_id) REFERENCES user (id)
)
