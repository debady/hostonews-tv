
-- Création de la table Administrateur
CREATE TABLE Administrateur (
    ID_Administrateur INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Mot_de_passe VARCHAR(255) NOT NULL,
    Accès_token VARCHAR(255) NOT NULL,
    Photo_profil VARCHAR(255)
);

-- Création de la table BienImmobilier
CREATE TABLE BienImmobilier (
    ID_BienImmobilier INT(11) AUTO_INCREMENT PRIMARY KEY,
    Type ENUM('Maison standard', 'Appartement', 'Villa', 'Duplex', 'Résidence non meublée', 'Résidence meublée') NOT NULL,
    Titre VARCHAR(255) NOT NULL,
    Description TEXT NOT NULL,
    Nombre_chambres INT(11) NOT NULL,
    Nombre_salles_de_bain INT(11),
    Nombre_piscines INT(11),
    Lieu VARCHAR(255) NOT NULL,
    Superficie DECIMAL(10, 2) NOT NULL,
    Prix DECIMAL(10, 2) NOT NULL,
    Date_publication DATETIME NOT NULL,
    Vidéo VARCHAR(255),
    ID_Administrateur INT(11),
    FOREIGN KEY (ID_Administrateur) REFERENCES Administrateur(ID_Administrateur) ON DELETE CASCADE
);

-- Création de la table Terrain
CREATE TABLE Terrain (
    ID_Terrain INT(11) AUTO_INCREMENT PRIMARY KEY,
    Type ENUM('Résidentiel', 'Agricole', 'Commercial') NOT NULL,
    Titre VARCHAR(255) NOT NULL,
    Description TEXT NOT NULL,
    Lieu VARCHAR(255) NOT NULL,
    Superficie DECIMAL(10, 2) NOT NULL,
    Prix DECIMAL(10, 2) NOT NULL,
    Type_document ENUM('Titre foncier', 'Bail') NOT NULL,
    Date_publication DATETIME NOT NULL,
    ID_Administrateur INT(11),
    FOREIGN KEY (ID_Administrateur) REFERENCES Administrateur(ID_Administrateur) ON DELETE CASCADE
);

-- Création de la table Chaussure
CREATE TABLE Chaussure (
    ID_Chaussure INT(11) AUTO_INCREMENT PRIMARY KEY,
    Type ENUM('Baskets', 'Chaussures habillées', 'Sandales') NOT NULL,
    Titre VARCHAR(255) NOT NULL,
    Description TEXT NOT NULL,
    Prix DECIMAL(10, 2) NOT NULL,
    Taille VARCHAR(10) NOT NULL,
    Couleur VARCHAR(50) NOT NULL,
    Date_publication DATETIME NOT NULL,
    ID_Administrateur INT(11),
    FOREIGN KEY (ID_Administrateur) REFERENCES Administrateur(ID_Administrateur) ON DELETE CASCADE
);

-- Création de la table Images
CREATE TABLE Images (
    ID_Image INT(11) AUTO_INCREMENT PRIMARY KEY,
    URL_image VARCHAR(255) NOT NULL,
    Bien_id INT(11),
    FOREIGN KEY (Bien_id) REFERENCES BienImmobilier(ID_BienImmobilier) ON DELETE CASCADE,
    FOREIGN KEY (Bien_id) REFERENCES Terrain(ID_Terrain) ON DELETE CASCADE,
    FOREIGN KEY (Bien_id) REFERENCES Chaussure(ID_Chaussure) ON DELETE CASCADE
);

-- Création de la table Contact
CREATE TABLE Contact (
    ID_Contact INT(11) AUTO_INCREMENT PRIMARY KEY,
    Nom_prénom VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Numéro_téléphone VARCHAR(20) NOT NULL,
    Message TEXT NOT NULL,
    Bien_id INT(11),
    FOREIGN KEY (Bien_id) REFERENCES BienImmobilier(ID_BienImmobilier) ON DELETE CASCADE,
    FOREIGN KEY (Bien_id) REFERENCES Terrain(ID_Terrain) ON DELETE CASCADE,
    FOREIGN KEY (Bien_id) REFERENCES Chaussure(ID_Chaussure) ON DELETE CASCADE
);
