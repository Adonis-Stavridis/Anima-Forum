-- Tables des commentaires du forum

DROP TABLE IF EXISTS Commentaire;
CREATE TABLE IF NOT EXISTS Commentaire (
  ID int AUTO_INCREMENT,
  Intitule varchar(255) UNIQUE NOT NULL,
  Note int DEFAULT 0 NOT NULL,
  Ecriture date NOT NULL,
  Utilisateur int NOT NULL,
  Topic int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (Utilisateur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (Topic) REFERENCES Topic(ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
