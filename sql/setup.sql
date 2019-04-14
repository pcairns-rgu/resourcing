DROP TABLE documents;

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
                     CONSTRAINT FK_documents FOREIGN KEY(mod_code) REFERENCES module(code) ON UPDATE CASCADE
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
          CONSTRAINT FK_articles FOREIGN KEY (mod_code) REFERENCES module (code) ON UPDATE CASCADE
);

CREATE TABLE notes(
                       id  int  NOT NULL AUTO_INCREMENT,
                       notes       varchar(255) NOT NULL,
                       mod_code    char(7),
                       PRIMARY KEY (id),
                       CONSTRAINT FK_notes FOREIGN KEY (mod_code) REFERENCES module (code) ON UPDATE CASCADE
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


INSERT INTO `private` (`today`, `task`, `comments`, `deadline`, `completed`, `username`) VALUES
(curdate(), 'Send out feedback request forms', '4 Done, 4 more to do', '2019-04-30', NULL, 'kg005'),
(curdate(), 'Sign up for DataFest events', '', '2019-04-19', NULL, 'kg005'),
(curdate(), 'Draft objectives for next semester', '', '2019-05-31', NULL, 'jf004'),
(curdate(), 'Remember to bring in new jar of coffee', '', '2019-04-15', NULL, 'jf004');

INSERT INTO `department` (`today`, `task`, `comments`, `deadline`, `completed`, `username`) VALUES
(curdate(), 'Annual GDPR training to be done', '', '2019-04-30', NULL, 'kg005'),
(curdate(), 'Arrange meeting with JB to discuss modules to teach next semester', 'Meeting invite sent', '2019-04-19', NULL, 'kg005'),
(curdate(), 'Still have GDPR training to complete before the deadline', '', '2019-04-30', NULL, 'jf004'),
(curdate(), 'Prep presentation on student results for 1st semester', 'Acquired info, still presentation to do', '2019-04-30', NULL, 'jf004');

INSERT INTO `module_task` (`today`, `code`, `task`, `comments`, `deadline`, `completed`, `username`) VALUES
(curdate(), 'SCDM005', 'check room  booked for May assessment', 'Emailed school office', '2019-04-20', '', 'kg005'),
(curdate(), 'SCDM005', 'Update lecture 1 to reflect issues with Microsoft Azure', '', '2019-04-26', '', 'kg005'),
(curdate(), 'SCDM005', 'Create additional lab on how to upload and download files using php', '', '2019-05-31', '', 'kg005'),
(curdate(), 'SCDM005', 'Undertake second review of assessment paper\r\n', 'Discuss if questions on sql should be asked', '2019-04-19', '', 'jf004'),
(curdate(), 'SCDM005', 'Look at whether students should continue to host on  csdmserver or if a better way of hosting', '', '2019-05-31', '', 'jf004');

INSERT INTO `notes` (`notes`, `mod_code`) VALUES
('Remember that IT need two signatures from tutors before adding new software to student computers', 'SCDM005'),
('Attendance forms should be automated - student project?', 'SCDM005');

INSERT INTO `articles` (`title`, `webref`, `description`, `mod_code`) VALUES
('Adobe colour wheel', 'https://color.adobe.com/create/color-wheel', 'Helps explore colour combinations for web apps', 'SCDM005'),
('Flex box tutorial', 'http://flexboxfroggy.com/', 'Interactive way of learning about flex box', 'SCDM005'),
('Social media links ', 'https://www.addthis.com/', 'Can use to add social media links to app', 'SCDM005');
