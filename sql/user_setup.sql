DROP TABLE user;

CREATE TABLE user(
                     id int(7) NOT NULL AUTO_INCREMENT,
                     firstname varchar(50) NOT NULL,
                     lastname varchar(50)NOT NULL,
                     username varchar(50) NOT NULL,
                     pwd varchar(15) NOT NULL,
                     PRIMARY KEY(id)
)
