DROP TABLE module;

CREATE TABLE module(
                           id int(7) NOT NULL AUTO_INCREMENT,
                           today DATE,
                           module char(6),
                           task varchar(250) NOT NULL,
                           comments varchar(250),
                           deadline date,
                           completed bit,
                           PRIMARY KEY(id)
)
