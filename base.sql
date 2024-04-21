CREATE TABLE utilisateur(
   idU INT AUTO_INCREMENT,
   pseudoU VARCHAR(50),
   mailU VARCHAR(50),
   mdpU VARCHAR(50),
   pokeDollar INT,
   PRIMARY KEY(idU)
);

CREATE TABLE objet(
   idO INT AUTO_INCREMENT,
   nomO VARCHAR(50),
   prixO INT,
   imageO VARCHAR(50),
   typeO VARCHAR (50),
   PRIMARY KEY(idO)
);

CREATE TABLE panier(
   idPanier INT AUTO_INCREMENT,
   idU INT NOT NULL,
   PRIMARY KEY(idPanier),
   UNIQUE(idU),
   FOREIGN KEY(idU) REFERENCES utilisateur(idU)
);

CREATE TABLE contenir(
   idO INT,
   idPanier INT,
   quantiteO VARCHAR(50),
   PRIMARY KEY(idO, idPanier),
   FOREIGN KEY(idO) REFERENCES objet(idO),
   FOREIGN KEY(idPanier) REFERENCES panier(idPanier)
);

CREATE TABLE pokemon(
   idP INT AUTO_INCREMENT,
   nomP VARCHAR(50),
   typeP VARCHAR(50),
   experience INT,
   generation INT,
   idU INT NOT NULL,
   PRIMARY KEY(idP),
   FOREIGN KEY(idU) REFERENCES utilisateur(idU)
);

-- Compte test / 'seu.8HpuOxyTU' ça correspond au mdp '123'
INSERT INTO utilisateur VALUES (1,'test','test@gmail.com','seu.8HpuOxyTU',NULL);

INSERT INTO objet VALUES (1,'Super Bonbon',950,'superbonbon.png','Exp');
INSERT INTO objet VALUES (2,'Baie Oran',150,'baieoran.png','Baie');
INSERT INTO objet VALUES (3,'Super Ball',200,'superball.png','Ball');
INSERT INTO objet VALUES (4,'Badge Charbon',700,'charbon.png','Badge');
INSERT INTO objet VALUES (5,'Speed Ball',300,'speedball.png','Ball');
INSERT INTO objet VALUES (6,'Baie Sitrus',250,'baiesitrus.png','Baie');
INSERT INTO objet VALUES (7,'Chrono Ball',300,'chronoball.png','Ball');
INSERT INTO objet VALUES (8,'Sombre Ball',300,'sombreball.png','Ball');
INSERT INTO objet VALUES (9,'Bis Ball',300,'bisball.png','Ball');
INSERT INTO objet VALUES (10,'Luxe Ball',300,'luxeball.png','Ball');
INSERT INTO objet VALUES (11,'Rapide Ball',300,'rapideball.png','Ball');
INSERT INTO objet VALUES (12,'Honor Ball',250,'honorball.png','Ball');
INSERT INTO objet VALUES (13,'Badge Prisme',750,'prisme.png','Badge');
INSERT INTO objet VALUES (14,'Baie Prine',250,'baieprine.png','Baie');
INSERT INTO objet VALUES (15,'Baie Tomato',250,'baietomato.png','Baie');
INSERT INTO objet VALUES (16,'Baie Mepo',250,'baiemepo.png','Baie');