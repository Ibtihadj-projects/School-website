CREATE DATABASE EMPLOYE

CREATE TABLE DEPT(
    Num_Dept int,
    Nom_Dept varchar(30),
    Ville_Dept varchar(30),
);
CREATE TABLE EMP(
    Matricule varchar(30),
    Nom varchar(30),
    Prenom varchar(30),
    Salaire float,
    Commision float,
    Num_Dept int,
    add constraint FK_EMP_DEPT foreign KEY(Num_Dept) references DEPT(Num_Dept),
);

CREATE VIEW V_EMP 
AS SELECT Matricule, Nom_Dept, Num_Dept, SUM(Salaire, Commision) AS GAIN, Ville_Dept
FROM DEPT;

SELECT FROM V_EMP
WHERE GAINS>10000;

UPDATE VIEW V_EMP
SET Nom =
WHERE Matricule=1;

CREATE VIEW V_EMP10
AS SELECT * FROM EMP
WHERE Num_Dept=10 
???




