CREATE TABLE VINS 
(nv integer PRIMARY KEY,
cru varchar (40) NOT NULL,
mil integer CONSTRAINT cMil
	CHECK (mil between 1970 and 2000),
deg decimal(4,2) CONSTRAINT cDegre
	CHECK (deg between 9.0 and 15.0)
);

CREATE TABLE VITICULTEURS
(nvt integer ,
nom varchar(40),
prenom varchar(40),
ville varchar(40),
PRIMARY KEY (nvt));

ALTER TABLE VITICULTEURS
 add CONSTRAINT cVille 
check (ville in ('Valence', 'Nice', 'Poitiers', 'Paris', 'Beaune'));

ALTER TABLE VITICULTEURS
 add CONSTRAINT cNom CHECK (nom IS NOT NULL);

CREATE TABLE PRODUCTIONS
(nvt integer,
nv integer
);

ALTER TABLE PRODUCTIONS
 add primary key (nvt, nv);

ALTER TABLE PRODUCTIONS 
add constraint FK_PRODUCTIONS_VINS foreign key (nv)
references VINS(nv) on delete cascade;

ALTER TABLE PRODUCTIONS 
add constraint FK_PRODUCTIONS_VITICULTEURS foreign key (nvt) 
references VITICULTEURS(nvt) on delete cascade;

CREATE TABLE BUVEURS
(nb integer,
nom varchar(40) not null,
prenom varchar(40),
ville varchar(40)
);

ALTER TABLE BUVEURS 
add constraint PK_BUVEURS primary key (nb);

CREATE TABLE COMMANDES
(nc integer,
dateCde date,
nv integer,
qte integer,
nb integer,
constraint PK_COMMANDES PRIMARY KEY (nc),
constraint FK_COMMANDES_VIN foreign key (nv) references VINS(nv),
constraint FK_COMMANDES_BUVEURS foreign key (nb) references BUVEURS(nb)
);

CREATE TABLE EXPEDITIONS
(nc integer,
dateExp date not null,
qte integer not null,
constraint FK_EXPEDITIONS_COMMANDE foreign key(nc) references COMMANDES(nc),
constraint PK_EXPEDITIONS primary key (nc, dateExp)
);