-- Table des notes donnés aux commentaires du forum

DROP TABLE IF EXISTS Commentaire_note;
CREATE TABLE IF NOT EXISTS Commentaire_note (
  ID int AUTO_INCREMENT,
  Note int NOT NULL,
  Utilisateur int NOT NULL,
  Commentaire int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (Utilisateur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (Commentaire) REFERENCES Commentaire(ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
