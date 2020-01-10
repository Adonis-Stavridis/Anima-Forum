-- Tables des notes données à chaque Topic

DROP TABLE IF EXISTS Topic_note;
CREATE TABLE IF NOT EXISTS Topic_note (
  ID int AUTO_INCREMENT,
  Note int NOT NULL,
  Utilisateur int NOT NULL,
  Topic int NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (Utilisateur) REFERENCES Utilisateur(ID),
  FOREIGN KEY (Topic) REFERENCES Topic(ID)
) ENGINE=innoDB;
