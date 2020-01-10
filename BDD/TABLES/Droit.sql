-- Table des droits donnés aux utilisateurs

DROP TABLE IF EXISTS Droit;
CREATE TABLE IF NOT EXISTS Droit (
  ID int AUTO_INCREMENT,
  Signification varchar(255) UNIQUE NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=innoDB DEFAULT CHARSET=utf8;
