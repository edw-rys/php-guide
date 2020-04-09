DROP DATABASE IF EXISTS apppelicula;
create DATABASE apppelicula;
use apppelicula;
-- tabla del tipo de usuario
CREATE TABLE TypeUser(
    id_TypeUser int AUTO_INCREMENT,
    name_TypeUser varchar(15) not null,
    status int DEFAULT 1,
    PRIMARY KEY (id_TypeUser)
);
-- insercion de 3 tipos de usuarios
INSERT INTO TypeUser(id_TypeUser, name_TypeUser) VALUES (101,'admin'),(102,'cliente');

-- tabla de usuario
CREATE table user(
    id_user int AUTO_INCREMENT,
    username varchar(30) not null,
    name_user varchar(20) not null,
    password varchar(20) not null,
    date_create date not null,
    id_TypeUser int not null DEFAULT 102,
    status int DEFAULT 1,
    PRIMARY KEY (id_user)
)ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
insert into user(id_user,username, name_user,password,date_create,id_TypeUser)
    values
    (1,"edw","edward","edw",now(),102),
    (2,"tnx","Tim tnx","tnx",now(),101),
    (3,"rys","Reyes","rys",now(),102),
    (4,"melissa","melissa","melissa",now(),102);

create table ctg_movie(
    id_ctg int AUTO_INCREMENT,
    name_ctg varchar(30) not null,
    status int DEFAULT 1,
    PRIMARY KEY (id_ctg)
)ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;

insert into ctg_movie(name_ctg)
    values("De terror"),("Dramáticas"),("Musicales"),("Ciencia ficción"),
    ("De guerra o bélicas"),("Películas del Oeste"),("Crimen");

create table movie(
    id_movie int AUTO_INCREMENT,
    name_movie varchar(30) not null,
    sipnosis varchar(30) not null,
    url_img varchar(100) not null,
    id_ctg int not null,
    status int DEFAULT 1,
    PRIMARY KEY (id_movie),
    FOREIGN KEY (id_ctg) REFERENCES ctg_movie(id_ctg)
)ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
insert into movie(id_movie, name_movie, sipnosis, url_img,id_ctg)
    values
        (1, "pelicula 1", "sipnosis","assets/img/movies/img1.jpg",1),
        (2, "pelicula 2", "sipnosis","assets/img/movies/img2.jpg",1),
        (3, "pelicula 3", "sipnosis","assets/img/movies/img3.jpg",3),
        (4, "pelicula 4", "sipnosis","assets/img/movies/img4.jpg",4),
        (5, "pelicula 5", "sipnosis","assets/img/movies/img5.jpg",4);

create table favorite_movie(
    id_f_m int AUTO_INCREMENT,
    id_user int not null,
    id_movie  int not null,
    PRIMARY KEY (id_f_m),
    FOREIGN KEY (id_user) REFERENCES user(id_user),
    FOREIGN KEY (id_movie) REFERENCES movie(id_movie)
);
insert into favorite_movie(id_user, id_movie)
    values
        (2, 1),
        (2, 2),
        (3, 3),
        (3, 4),
        (4, 1),
        (4, 2),
        (4, 5),
        (2, 5);