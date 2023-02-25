DROP DATABASE if exists gestion_stage; 
CREATE DATABASE if not exists gestion_stage;

use gestion_stage;

create table stagiaire (
    idStagiaires int(4) auto_increment primary key,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    civilite VARCHAR(1),
    photo VARCHAR(100),
    idFiliere int(4)
);

create table filiere (
    idFiliere int(4) auto_increment primary key,
    nomFiliere VARCHAR(50),
    niveau VARCHAR(50)
);

create table utilisateur (
    iduser int(4) auto_increment primary key,
    login VARCHAR(50),
    email VARCHAR(255),
    role VARCHAR(50),
    etat int(1),
    pwd VARCHAR(255)
);

ALTER table stagiaire add constraint foreign key (idFiliere) references filiere (idFiliere);

INSERT INTO filiere (nomFiliere, niveau) VALUES 
    ('TSDI', 'TS'),
    ('TSGE', 'TS'),
    ('TGI', 'T'),
    ('TSRI', 'TS'),
    ('TCE', 'T');

INSERT INTO utilisateur (login,email,role,etat,pwd) VALUES
    ('admin','mostafarhazlani@gmail.com','ADMIN',1,md5('123')),
    ('othmane','othmaneghazlani@yahoo.com','VISITEUR',0,md5('123')),
    ('azdin','rhazlaniazdin@test.com','VISITEUR',1,md5('123'));


INSERT INTO stagiaire (nom,prenom,civilite,photo,idFiliere) VALUES
    ('SAADAOUI','MOHAMMED','M','Mostafa.jpg',1),
    ('CHAFIK','OMAR','M','#',2),
    ('SALIM','RACHIDA','F','#',3),
    ('FAOUZI','NABILA','F','#',1),
    ('ETTAOUSSI','KAMAL','M','#',2),
    ('EZZAKI','ABDELKARIM','M','#',3),

    ('SAADAOUI','MOHAMMED','M','Mostafa.jpg',1),
    ('CHAFIK','OMAR','M','#',2),
    ('SALIM','RACHIDA','F','#',3),
    ('FAOUZI','NABILA','F','#',1),
    ('ETTAOUSSI','KAMAL','M','#',2),
    ('EZZAKI','ABDELKARIM','M','#',3),

    ('SAADAOUI','MOHAMMED','M','Mostafa.jpg',1),
    ('CHAFIK','OMAR','M','#',2),
    ('SALIM','RACHIDA','F','#',3),
    ('FAOUZI','NABILA','F','#',1),
    ('ETTAOUSSI','KAMAL','M','#',2),
    ('EZZAKI','ABDELKARIM','M','#',3);

SELECT * FROM filiere;
SELECT * FROM stagiaire;
SELECT * FROM utilisateur;
SELECT login, pwd FROM utilisateur;
