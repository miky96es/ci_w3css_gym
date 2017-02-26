drop table user_rel_activity;
drop table activity;
drop table user;

create table user(
email VARCHAR (200) PRIMARY KEY ,
nombre VARCHAR (75) NOT NULL ,
apellidos VARCHAR (150) NOT NULL ,
password VARCHAR (300) NOT NULL ,
fecha_nac date NOT NULL ,
es_admin boolean NOT NULL
);

CREATE TABLE  activity(
id int PRIMARY KEY auto_increment,
nombre VARCHAR (150) NOT NULL ,
descripcion VARCHAR (500),
date DATE
);

create TABLE  user_rel_activity(
id int ,
email VARCHAR(200),
PRIMARY KEY (id,email),
FOREIGN KEY (id) REFERENCES activity(id),
FOREIGN KEY (email)REFERENCES user(email)
);
