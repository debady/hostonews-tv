
-- =====================================
-- Base de données : bd_hostonews_tv (PostgreSQL / Supabase)
-- Export complet généré le 2025-04-20 15:11:39
-- =====================================

-- === TABLE utilisateurs ===
CREATE TABLE utilisateurs (
  id SERIAL PRIMARY KEY,
  nom_prenom VARCHAR(255),
  email VARCHAR(100),
  numero VARCHAR(20),
  pays VARCHAR(255),
  mot_de_passe TEXT,
  verification_code INTEGER,
  resset_token VARCHAR(255),
  photo_profil VARCHAR(255),
  date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status TEXT DEFAULT 'déconnecte',
  acces_token VARCHAR(255),
  is_verified INTEGER DEFAULT 0,
  idPays INTEGER
);

-- === TABLE users ===
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  phone VARCHAR(200),
  password VARCHAR(255),
  verification_code TEXT,
  date_inscript TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  token TEXT
);

-- === TABLE commentaires ===
CREATE TABLE commentaires (
  id SERIAL PRIMARY KEY,
  nom_prenom VARCHAR(100) DEFAULT 'paul logan',
  photo VARCHAR(50) DEFAULT 'images_par_defaut.png',
  utilisateur_id INTEGER NOT NULL,
  id_direct INTEGER,
  commentaire TEXT NOT NULL,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE direct ===
CREATE TABLE direct (
  id SERIAL PRIMARY KEY,
  baniere VARCHAR(255) NOT NULL,
  urls TEXT,
  date_publier TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  commentaire TEXT NOT NULL,
  reaction INTEGER
);

-- === TABLE banniere ===
CREATE TABLE banniere (
  id SERIAL PRIMARY KEY,
  images_grd VARCHAR(255) NOT NULL,
  titre VARCHAR(255) NOT NULL,
  ptte_descript VARCHAR(255) NOT NULL,
  grde_descript TEXT NOT NULL,
  date_poster TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  id_pays VARCHAR(255) NOT NULL
);

-- === TABLE replay ===
CREATE TABLE replay (
  id SERIAL PRIMARY KEY,
  image_path VARCHAR(225),
  video_url VARCHAR(255),
  alert_label VARCHAR(50),
  reaction_count INTEGER DEFAULT 0,
  title VARCHAR(100),
  description TEXT,
  recapitulatif TEXT,
  event_date DATE,
  token_ident VARCHAR(50)
);

-- === TABLE derniere_news ===
CREATE TABLE derniere_news (
  id SERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  category VARCHAR(100) NOT NULL,
  image_url VARCHAR(255),
  video_url VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE emissions ===
CREATE TABLE emissions (
  id SERIAL PRIMARY KEY,
  titre VARCHAR(255) NOT NULL,
  url_emission TEXT NOT NULL,
  le_status VARCHAR(255) DEFAULT 'avant-première',
  ptt_description TEXT,
  grd_description TEXT,
  episode INTEGER,
  image1 TEXT,
  image2 TEXT,
  categorie VARCHAR(100),
  datePublication TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Videos TEXT
);

-- === TABLE journauxtelevises ===
CREATE TABLE journauxtelevises (
  id SERIAL PRIMARY KEY,
  titre VARCHAR(255) NOT NULL,
  petiteDescription TEXT,
  grandeDescription TEXT,
  miniature VARCHAR(255) NOT NULL,
  url_Video VARCHAR(255) NOT NULL,
  datePublication TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE faq ===
CREATE TABLE faq (
  id SERIAL PRIMARY KEY,
  category VARCHAR(255) NOT NULL,
  question TEXT NOT NULL,
  answer TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE health_news ===
CREATE TABLE health_news (
  id SERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  category VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE contact_form ===
CREATE TABLE contact_form (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE reactions ===
CREATE TABLE reactions (
  id SERIAL PRIMARY KEY,
  product_id INTEGER NOT NULL,
  user_id INTEGER NOT NULL,
  reaction_type TEXT DEFAULT 'like',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- === TABLE pays ===
CREATE TABLE pays (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(100) NOT NULL
);

INSERT INTO pays (nom) VALUES
('Côte d''Ivoire'),
('Sénégal'),
('Burkina Faso'),
('Mali'),
('Togo'),
('Bénin'),
('Cameroun'),
('Gabon'),
('RDC'),
('Guinée');

-- === CONTRAINTES FOREIGN KEYS ===
ALTER TABLE commentaires
ADD CONSTRAINT fk_commentaires_utilisateur
FOREIGN KEY (utilisateur_id)
REFERENCES utilisateurs(id)
ON DELETE CASCADE;

ALTER TABLE commentaires
ADD CONSTRAINT fk_commentaires_direct
FOREIGN KEY (id_direct)
REFERENCES direct(id)
ON DELETE SET NULL;

ALTER TABLE utilisateurs
ADD CONSTRAINT fk_utilisateurs_pays
FOREIGN KEY (idPays)
REFERENCES pays(id)
ON DELETE SET NULL;

ALTER TABLE reactions
ADD CONSTRAINT fk_reactions_user
FOREIGN KEY (user_id)
REFERENCES utilisateurs(id)
ON DELETE CASCADE;
