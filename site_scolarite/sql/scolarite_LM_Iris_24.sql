drop database if exist scolarite_lm_iris_24:
create database scolarite_lm_iris_24;
use scolarite_lm_iris_24;

create table classe(
    idclasse int(3) not null auto_increment,
    nom varchar(50),
    salle varchar(50),
    diplome varchar(50),
    primary key (idclasse)
);

create table etudiant( 
    idetudiant int(3) not null auto_increment,
    nom varchar(50),
    prenom varchar(100),
    email varchar(50),
    dateNais date,
    idclasse int(3) not null,
    primary key(idetudiant),
    foreign key(idclasse) references classe(idclasse)
);

create table professeur( 
    idprofesseur int(3) not null auto_increment,
    nom varchar(50),
    prenom varchar(100),
    email varchar(50),
    diplome varchar(50),
    primary key(idprofesseur)
);

create table enseignement(
    idenseignement int (3) not null auto_increment,
    matiere varchar (50),
    coeff int (3),
    nbheures int (3),
    idclasse int (3) not null,
    idprofesseur int (3) not null,
    primary key (idenseignement),
    foreign key (idclasse) references classe(idclasse),
    foreign key (idprofesseur) references professeur(idprofesseur)
);
create table user(
    iduser int(3) not null auto_increment,
    nom varchar (50),
    prenom varchar (50),
    email varchar (50),
    mdp varchar(255),
    role enum ("user" , "admin"),
    primary key (iduser)
);

insert into user values (null , 'Adam', 'Anes', 'a@gmail.com' , '123', 'user');
insert into user values (null , 'Christina', 'Ibtissam', 'b@gmail.com' , '456', 'admin');

create view viewEtudiants as(
    select e.nom , e.prenom , c.nom as classe , c.salle, en.matiere 
    from etudiant e , classe c , enseignement en 
    where e.idclasse = c.idclasse 
    and c.idclasse = en.idclasse
);