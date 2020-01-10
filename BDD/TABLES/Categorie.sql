-- Table des catégories du forum

DROP TABLE IF EXISTS Categorie;
CREATE TABLE IF NOT EXISTS Categorie (
  ID int AUTO_INCREMENT,
  Intitule varchar(255) UNIQUE NOT NULL,
  Utilisateur int,
  PRIMARY KEY (ID),
  FOREIGN KEY (Utilisateur) REFERENCES Utilisateur(ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
