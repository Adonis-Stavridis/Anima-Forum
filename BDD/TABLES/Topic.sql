-- Table des Topics du forum

DROP TABLE IF EXISTS Topic;
CREATE TABLE IF NOT EXISTS Topic (
  ID int AUTO_INCREMENT,
	Intitule varchar(255) UNIQUE NOT NULL,
	Note int DEFAULT 0 NOT NULL,
	Modif date NOT NULL,
	Utilisateur int,
	Categorie int NOT NULL,
  PRIMARY KEY (ID),
	FOREIGN KEY (Utilisateur) REFERENCES Utilisateur(ID),
	FOREIGN KEY (Categorie) REFERENCES Categorie(ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
