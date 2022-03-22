CREATE DATABASE ProjetWebIAI;
CREATE table candidatures
(
	idCandidature int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nom char(20) NOT NULL,
	prenom varchar(20) NOT NULL,
	sexe char(1) NOT NULL,
	dateNaiss date NOT NULL,
	nationalite varchar(20) NOT NULL,
	serie varchar(3) NOT NULL,
	annee varchar(4) NOT NULL,
	attestation_diplome char(130) NOT NULL
);
CREATE TABLE admins
(
	idAdmin int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(30) NOT NULL,
    mdp varchar(15)
);
CREATE TABLE informations
(
    idInformation int NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    titre varchar(100) NOT NULL,
    date_ajout DATE NOT NULL, 
    contenu text NOT NULL,
    type varchar(20) NOT NULL
);
CREATE TABLE traitementsInformations
(
    idTI int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idAdmin int,
    idInformation int,
    type varchar(20),
    dateTraitementI date,
    CONSTRAINT FOREIGN KEY (idInformation) REFERENCES informations(idInformation) ON DELETE CASCADE,
    CONSTRAINT FOREIGN KEY (idAdmin) REFERENCES admins(idAdmin) ON DELETE CASCADE
);