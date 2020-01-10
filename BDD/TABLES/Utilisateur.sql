-- Table des utilisateurs du forum

DROP TABLE IF EXISTS Utilisateur;
CREATE TABLE IF NOT EXISTS Utilisateur (
  ID int AUTO_INCREMENT,
  Login varchar(32) UNIQUE NOT NULL,
  Mdp varchar(255) NOT NULL,
  Pseudo varchar(32) UNIQUE NOT NULL,
  Mail varchar(255) UNIQUE NOT NULL,
  Droit int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (Droit) REFERENCES Droit(ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
