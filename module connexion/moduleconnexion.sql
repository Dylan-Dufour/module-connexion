-- On crée une base de données (si elle n'existe pas déjà)
CREATE DATABASE IF NOT EXISTS moduleconnexion;
USE moduleconnexion;

-- On crée une table "utilisateurs"
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Un numéro unique pour chaque utilisateur
    login VARCHAR(50) NOT NULL,        -- Le pseudo de connexion
    prenom VARCHAR(50) NOT NULL,       -- Le prénom
    nom VARCHAR(50) NOT NULL,          -- Le nom
    password VARCHAR(255) NOT NULL     -- Le mot de passe (haché avec password_hash)
);

-- On insère l’utilisateur "admin" avec login, prenom, nom, password = "admin"
INSERT INTO utilisateurs (login, prenom, nom, password)
VALUES ('admin', 'admin', 'admin', PASSWORD('admin'));
