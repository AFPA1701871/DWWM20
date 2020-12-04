
DROP DATABASE IF EXISTS gestionsAnnonces;
CREATE DATABASE gestionsAnnonces;
USE gestionsAnnonces;

CREATE TABLE categories(
        idCategorie      Int  Auto_increment  NOT NULL PRIMARY KEY,
        libelleCaterogie Varchar (10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE roles(
        idRole      Int  Auto_increment  NOT NULL PRIMARY KEY,
        libelleRole Varchar (50) NOT NULL ,
        codeRole    Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE utilisateurs(
        idUtilisateur     Int  Auto_increment  NOT NULL PRIMARY KEY,
        nomUtilisateur    Varchar (50) NOT NULL ,
        prenomutilisateur Varchar (50) NOT NULL ,
        emailUtilisateur  Varchar (50) NOT NULL ,
        pseudoUtilisateur Varchar (50) NOT NULL ,
        mdpUtilisateur    Varchar (50) NOT NULL ,
        telUtilisateur    Varchar (10) NOT NULL ,
        idRole            Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE annonces(
        idAnnonce       Int  Auto_increment  NOT NULL PRIMARY KEY,
        titreAnnonce    Varchar (50) NOT NULL ,
        lienImg         Varchar (100) NOT NULL ,
        libelleAnnonce  Varchar (100) NOT NULL ,
        prixAnnonce     Float NOT NULL ,
        datePublication Varchar (10) NOT NULL ,
        statutAnnonce   Int NOT NULL ,
        idUtilisateur   Int NOT NULL ,
        idCategorie     Int NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE messages(
        idMessage  Int  Auto_increment  NOT NULL PRIMARY KEY,
        libelleMessage  Varchar (500) NOT NULL ,
        contenueMessage Varchar (500) NOT NULL ,
        idDestinataire Int NOT NULL,
        idUtilisateur   Int NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE messages ADD CONSTRAINT FK_messages_utilisateurs FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(idUtilisateur);

ALTER TABLE utilisateurs ADD CONSTRAINT FK_utilisateur_roles FOREIGN KEY (idRole) REFERENCES roles(idRole);

ALTER TABLE annonces ADD CONSTRAINT FK_annonces_utilisateurs FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(idUtilisateur);
ALTER TABLE annonces ADD CONSTRAINT FK_annonces_categories0 FOREIGN KEY (idCategorie) REFERENCES categories(idCategorie);


