CREATE TABLE objet(
   idO INT NOT NULL AUTO_INCREMENT,
   nomO VARCHAR(50),
   prixO INT,
   imageO VARCHAR(50),
   typeO VARCHAR(50),
   PRIMARY KEY(idO)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE skin(
   idS INT NOT NULL AUTO_INCREMENT,
   nomS VARCHAR(50),
   prixS INT NOT NULL,
   PRIMARY KEY(idS)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE panier(
   idPanier INT NOT NULL AUTO_INCREMENT,
   nomO VARCHAR(50),
   imageO VARCHAR(50),
   prixO INT,
   quantiteO INT,
   PRIMARY KEY(idPanier)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE inventaire(
   idO INT,
   idPanier INT,
   quantiteO VARCHAR(50),
   PRIMARY KEY(idO, idPanier),
   FOREIGN KEY(idO) REFERENCES Objet(idO),
   FOREIGN KEY(idPanier) REFERENCES Panier(idPanier)
);

CREATE TABLE utilisateur(
   idU INT NOT NULL AUTO_INCREMENT,
   pseudoU VARCHAR(50),
   mailU VARCHAR(50),
   mdpU VARCHAR(50),
   pokeDollar INT,
   idPanier INT,
   idS INT,
   PRIMARY KEY(idU),
   FOREIGN KEY(idPanier) REFERENCES panier(idPanier),
   FOREIGN KEY(idS) REFERENCES skin(idS)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE pokemon(
   idP INT NOT NULL AUTO_INCREMENT,
   nomP VARCHAR(50),
   typeP VARCHAR(50),
   experience INT,
   generation INT,
   idU INT NOT NULL,
   PRIMARY KEY(idP),
   FOREIGN KEY(idU) REFERENCES utilisateur(idU)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;

CREATE TABLE acheter(
   idU INT NOT NULL AUTO_INCREMENT,
   idO INT,
   PRIMARY KEY(idU, idO),
   FOREIGN KEY(idU) REFERENCES utilisateur(idU),
   FOREIGN KEY(idO) REFERENCES objet(idO)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4;


INSERT INTO objet VALUES (1,'Super Bonbon',250,'superbonbon.png','Exp');
INSERT INTO objet VALUES (2,'Baie Oran',150,'baieoran.png','Baie');
INSERT INTO objet VALUES (3,'Super Ball',100,'superball.png','Ball');
INSERT INTO objet VALUES (4,'Badge Charbon',50,'charbon.png','Badge');
INSERT INTO objet VALUES (5,'Speed Ball',100,'speedball.png','Ball');
INSERT INTO objet VALUES (6,'Baie Sitrus',300,'baiesitrus.png','Baie');
INSERT INTO objet VALUES (7,'Chrono Ball',100,'chronoball.png','Ball');
INSERT INTO objet VALUES (8,'Sombre Ball',100,'sombreball.png','Ball');
INSERT INTO objet VALUES (9,'Bis Ball',100,'bisball.png','Ball');
INSERT INTO objet VALUES (10,'Luxe Ball',100,'luxeball.png','Ball');
INSERT INTO objet VALUES (11,'Rapide Ball',100,'rapideball.png','Ball');
INSERT INTO objet VALUES (12,'Honor Ball',100,'honorball.png','Ball');
INSERT INTO objet VALUES (13,'Badge Prisme',50,'prisme.png','Badge');