DROP TABLE department;

CREATE TABLE department(
        id int(7) NOT NULL AUTO_INCREMENT,
        today DATE,
        task varchar(250),
        comments varchar(250),
        deadline date,
        completed bit,
        PRIMARY KEY(id)
)
