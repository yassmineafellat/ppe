drop database if exists luxurylodge;
create database luxurylodge;
use luxurylodge;

create table user(
    iduser      int(3) not null auto_increment,
    nom         varchar (50),
    prenom      varchar (50),
    email       varchar (50),
    mdp         varchar(255),
    civilite    enum ("Mr", "Mme"),
    role        enum ("client" , "admin", "propritaire"),
    last_connexion datetime(6),
    last_failConnexion datetime(6),
    etat_connexion enum ("Echec", "succes"),
    primary key (iduser)
    
);

create table client (
    idclient       INT(3) NOT NULL AUTO_INCREMENT,
    iduser         INT(3) NOT NULL,
    datenaissance  VARCHAR(30) NOT NULL,
    numtel         VARCHAR(30) NOT NULL,
    PRIMARY KEY (idclient),
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);


create table proprietaire (
    idproprietaire   INT(3) NOT NULL AUTO_INCREMENT,
    iduser           INT(3) NOT NULL,
    datenaissance    VARCHAR(30) NOT NULL,
    numtel           VARCHAR(30) NOT NULL,
    PRIMARY KEY (proprietaire),
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);

create table contrat_location(

    idcontrat int(3)   not null auto_increment ,
    date_signature     date,
    date_debut         date,
    date_fin           date,
    etat               boolean,
    clause             varchar (50),
    iduser             INT(3) NOT NULL,
    PRIMARY KEY (proprietaire),
    FOREIGN KEY (iduser) REFERENCES user(iduser)
);
 

create table propriete (
    idpropriete           int(5) not null AUTO_INCREMENT,
    ville                 VARCHAR (50),
    nom                   VARCHAR (50),
    adresse_propriete     varchar (255),
    description_propriete VARCHAR(5000),
    type_propriete enum    ('Manoir', 'Chateau','Maison'),
    superficie            VARCHAR (50),
    photo                 VARCHAR (50) NULL,
    nombre_chambre        int (5),
    nombre_personne       int(5),
    nombre_piece          int(5),
    idpays                INT(5),
    idproprietaire
    statut enum           ("Loué", "Disponible"),
    isclim                boolean,
    iswifi                boolean,
    isjacuzzi             boolean,
    ispiscine             boolean,
    ischauffage           boolean,
    FOREIGN key (idpays) REFERENCES pays(idpays),
    PRIMARY key (idpropriete)
);

create table commentaire(

    idcommentaire      int(3)   not null auto_increment ,
    date_commentaire   date,
    avis               varchar (255),
    statut             enum('En attente', 'Validé'),
    idclient           INT(3) NOT NULL,
    idpropriete        INT(3) NOT NULL,   
    PRIMARY KEY (idcommentaire),
    FOREIGN KEY (idclient) REFERENCES client(idclient),
    FOREIGN KEY (idpropriete) REFERENCES propriete(idpropriete)

);
 
create table reservation ( 
    idreservation     int(3)   not null auto_increment ,
    date_arrivee      date,
    date_depart       date,
    tarif_reservation float,
    nb_voyageur       int(2),
    statut            enum('En attente', 'Validé'),
    idproprietaire    INT(3) NOT NULL,
    idpropriete       INT(3) NOT NULL,   
    PRIMARY KEY (idreservation),
    FOREIGN KEY (idproprietaire) REFERENCES proprietaire(idproprietaire),
    FOREIGN KEY (idpropriete) REFERENCES propriete(idpropriete)

);

create table services (

    idservice          int(3)   not null auto_increment ,
    libelle            varchar(40),
    prix               INT(6) NOT NULL,
    PRIMARY KEY (idservice)

);


CREATE TABLE souscription(
   idclient   int(3)   not null auto_increment ,
   idservice  int(3)   not null auto_increment ,
   datesouscription DATE,
   PRIMARY KEY(idclient, idservice), 
   FOREIGN KEY(idclient) REFERENCES Client(idclient),
   FOREIGN KEY(idservice) REFERENCES services(idservice)
);   
