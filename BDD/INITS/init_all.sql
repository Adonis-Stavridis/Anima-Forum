-- Initialisation des toutes les tables et procedures

SOURCE ~/Atom/Forum/BDD/TABLES/Droit.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Utilisateur.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Categorie.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Topic.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Topic_note.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Commentaire.sql;
SOURCE ~/Atom/Forum/BDD/TABLES/Commentaire_note.sql;

INSERT INTO Droit(Signification) VALUES ("User");
INSERT INTO Droit(Signification) VALUES ("Mod");
INSERT INTO Droit(Signification) VALUES ("Admin");

SOURCE ~/Atom/Forum/BDD/PROCEDURES/avg_notetopic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/con_utilisateur.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/get_categories.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/get_commentaires.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/get_notetopic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/get_topics.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/get_utilisateurs.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/ins_categorie.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/ins_commentaire.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/ins_notetopic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/ins_topic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/ins_utilisateur.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_categorie.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_droits.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_mail.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_mdp.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_pseudo.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/mod_topic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/note_commentaire.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/sup_categorie.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/sup_commentaire.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/sup_topic.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/sup_utilisateur.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/upd_notegen.sql;
SOURCE ~/Atom/Forum/BDD/PROCEDURES/upd_notetopic.sql;
