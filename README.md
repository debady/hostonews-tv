
                                  TAILLE DES IMAGES ET BANNIERE VIDEO 
    accueil 
        3 images grand format de : 1920 x 1280
        Dernière Nouvelle
            à la une                  : 640 x 427
            à ne pas manquer          : 640 x 427
            à venir                   : 640 x 427 
            
    Contenus des autres pages
      mignature vidéo : 640 x 640

pour l'affichage des données ils  proviendront de la bd 


    BARRE DE RECHERCHE 
        barre, 
        toutes les sessions
--------------------------------------------------------------------
                    projet : HostoNew TV

## Description du projet
HostoNew TV est une plateforme web d’information spécialisée dans le domaine de la santé. Son objectif est de fournir aux utilisateurs divers types de contenus, tels que des articles, des émissions, des interviews, des reportages et des lives, afin de les informer sur des sujets de santé.

## Objectif
Le but principal de HostoNew TV est d’informer un large public sur divers sujets de santé à travers plusieurs formats :
- Lecture : Des images accrocheuses, un titre, une courte description, et un lien redirigeant vers une page avec un texte informatif complet.
- Émissions, Interviews, Reportages, Journaux : Chaque contenu est présenté sous forme de vignette avec un titre, une courte description, et un lien redirigeant vers une page pour visionner un extrait.
- Live : Un live d’événements ou de journaux programmés sur YouTube, intégré à l’application via un lien. Le live inclut des publicités YouTube, Google AdSense, et des pop-ups publicitaires. Les utilisateurs peuvent regarder le live et discuter en temps réel (fonction disponible uniquement pour les utilisateurs connectés).

## Fonctionnalités Utilisateur
### Accès aux contenus :
- Les utilisateurs peuvent accéder aux contenus live ou enregistrés sans inscription.
- Seuls les utilisateurs connectés peuvent interagir avec les contenus (aimer, ajouter en favoris, commenter, etc.).

### Inscription et Connexion :
- Inscription : Par email ou numéro de téléphone avec création d’un mot de passe (2 champs pour confirmation). L’inscription peut également se faire via Google ou Facebook. Après vérification, l’utilisateur accède à son espace personnel.
- Connexion : Accès via email/numéro de téléphone et mot de passe, ou via Google et Facebook.

### Espace Utilisateur :
- L'utilisateur peut ajouter/modifier ses informations personnelles (nom, prénom, etc.).
- L’utilisateur a accès à ses contenus aimés et favoris.
- Session pour accéder aux notifications (informations récentes).
- Possibilité de supprimer son compte.

## Pages de l'Application

### 1. Accueil
- Une grande vidéo en lecture automatique en arrière-plan avec un bouton de lecture, un titre, et une courte description.
- Deux grandes images défilantes toutes les 5 secondes (dimensions : 1920 x 1280, 1920 x 1373).
- Un titre, une description, et un bouton de redirection vers une page détaillée.
- Menu déroulant avec les titres suivants :
  - Émission
  - Ma santé
  - Top santé
  - Atout santé
  - Le mag de la santé
  - ARTE (Café - Thé)
  - In Hosto
  - Merci
  - Champions de la santé
  - Afterhosto
  - Intéressé par
  - Indice de santé
  - JT
- Sessions de contenus (défilement manuel et automatique) :
  - Dans l'actualité
  - Émissions
  - Maladies
  - Nutrition
  - Psycho
  - Animaux
  - Sexualité
  - Autonomie
  - Votre santé, l'émission
- Texte descriptif de la chaîne et un footer.
- Sélection de contenus :
  - À la une (bande annonce)
  - À ne pas manquer
  - À venir (images de 640 x 427)

### 2. Direct
- Affichage du direct avec intégration de publicités YouTube et autres publicités.

### 3. Replay
- Présentation de 3 grandes images miniatures d'événements passés avec un bouton, un titre, une description et un lien de redirection.
- Une session de 3 miniatures côte à côte avec un lien vers une page où la vidéo est affichée en grand format.

### 4. Programme
- Affichage de 3 miniatures (640 x 640) avec titre et description, et un lien de redirection.
- Un filtre de recherche par intervalle de dates pour explorer les programmes dans la base de données.

### 5. Nous Connaître
- Présentation de l’équipe HostoNews TV (le DR, la team) avec leurs réseaux sociaux et informations personnelles.
- Une image d’ensemble.
- Image et message du DR (dimension de l'image : 300 x 300).

### 6. Dashboard Admin
- Création de nouveaux postes.
- Programmation d'événements futurs.
- Lancer un live (copier le lien du live et l’ajouter dans un champ pour modifier la base de données et déclencher le live).
- Gestion des utilisateurs inscrits.
- Envoi de mails ou messages aux utilisateurs.

### 7. Barre de Recherche
- Une barre de recherche avec possibilité de filtrer dans toutes les sections de l’application.

## Technologies Utilisées
- Front-end : HTML, CSS, JavaScript.
- Back-end : PHP simple.
- Base de données : MySQL pour gérer les utilisateurs, les vidéos, les événements et les interactions.


---------------------------------PAGES A DEVELOPPER---------------------


### 1. *Pages Utilisateurs*

1. *Accueil*
   - Présentation d'une grande vidéo en arrière-plan avec des images et descriptions défilantes.
   - Menu déroulant pour accéder aux différentes sections.
   - Sessions de contenus à la une, émissions, maladies, etc.

2. *Inscription*
   - Formulaire d'inscription avec email/numéro de téléphone et mot de passe.
   - Connexion via Google/Facebook.
   - Page de confirmation de l’inscription après vérification.

3. *Connexion*
   - Formulaire de connexion avec email/numéro et mot de passe.
   - Connexion via Google/Facebook.

4. *Espace Utilisateur*
   - Page de profil utilisateur pour modifier les informations personnelles (nom, prénom, etc.).
   - Section pour afficher les vidéos aimées et les favoris.
   - Section pour voir les notifications ou messages récents.
   - Option pour supprimer le compte utilisateur.

5. *Direct*
   - Page de live streaming, incluant la vidéo en direct, des publicités, et un espace pour discuter en temps réel.

6. *Replay*
   - Liste de vidéos passées avec vignettes, titres, descriptions et liens de redirection.
   - Page dédiée pour visionner les vidéos en grand format avec publicités en bas.

7. *Programme*
   - Affichage des émissions à venir sous forme de miniatures.
   - Filtre de recherche par dates pour trouver des programmes spécifiques.

8. *Nous Connaître*
   - Présentation de l’équipe (le DR, la team) avec informations personnelles et images.
   - Image de groupe et mot du DR.

9. *Barre de Recherche*
   - Page de résultats de recherche avec filtrage des vidéos et contenus par catégories.

### 2. *Pages d'Administration (Dashboard Admin)*

1. *Tableau de bord administrateur*
   - Vue d'ensemble des statistiques (nombre d'inscrits, nombre de vidéos publiées, etc.).

2. *Gestion des utilisateurs*
   - Liste des utilisateurs inscrits avec options de modification et suppression.

3. *Création de contenu*
   - Page pour ajouter de nouveaux articles, émissions, interviews, reportages, lives, etc.

4. *Gestion des événements à venir*
   - Planification des événements futurs avec possibilité d'éditer ou supprimer.

5. *Gestion des lives*
   - Page pour lancer un live (en insérant le lien du live YouTube) et modifier le live en cours.

6. *Envoi de mails ou messages*
   - Interface pour envoyer des mails ou des notifications aux utilisateurs.

### 3. *Pages de Contenus et Sections*

1. *Émissions*
   - Page listant toutes les émissions disponibles avec vignettes, titres et descriptions.

2. *Ma santé*
   - Articles et vidéos concernant des conseils santé.

3. *Top Santé*
   - Liste des vidéos ou articles les plus consultés/populaires.

4. *Atout Santé*
   - Contenus spécifiques sur les meilleures pratiques de santé.

5. *Le Mag de la Santé*
   - Page dédiée à une section de type magazine avec des articles détaillés.

6. *ARTE (Café-Thé)*
   - Page pour un programme spécifique, "Café-Thé", avec les vidéos associées.

7. *In Hosto*
   - Contenus liés à des événements ou informations spécifiques à l’hôpital.

8. *Merci*
   - Vidéos et messages de remerciements des utilisateurs ou du personnel médical.

9. *Champions de la Santé*
   - Liste de personnes ou initiatives ayant marqué la santé, avec leurs contributions.

10. *AfterHosto*
   - Page dédiée aux émissions de suivi ou post-soins.

11. *Indice de Santé*
   - Informations sur les tendances et indicateurs de santé.

12. *JT (Journal Télévisé)*
   - Vidéos du journal télévisé en lien avec la santé.

---

### Pages complémentaires

1. *Erreur 404*
   - Page d'erreur pour les liens ou pages non trouvées.

2. *Politique de confidentialité*
   - Informations sur la protection des données des utilisateurs.

3. *Conditions générales d'utilisation*
   - Les conditions que les utilisateurs doivent accepter pour utiliser la plateforme.



--------------------------------ORGANIGRAMME DE DEVELOPPEMENT ---------------------------------
file:///C:/Users/NGUESSAN/Downloads/Plan_de_Developpement_HostoNew_TV.pdf

### *Semaine 1 : Conception et mise en place des bases*
- *Jour 1 à 2 :* 
  - Installation et configuration de l’environnement de développement (serveur, base de données).
  - Création des structures de base de données (utilisateurs, vidéos, émissions, etc.).
  
- *Jour 3 à 5 :* 
  - Développement des pages *Inscription* et *Connexion* (avec authentification via email/numéro et réseaux sociaux).
  
- *Jour 6 à 7 :*
  - Développement de l’*Espace Utilisateur* (profil, modification des informations, vidéos aimées, favoris, suppression de compte).

### *Semaine 2 : Contenus et gestion des vidéos*
- *Jour 8 à 9 :*
  - Développement de la page *Accueil* avec une vidéo en arrière-plan, images défilantes, et sessions de contenus (À la une, À venir, etc.).

- *Jour 10 à 12 :*
  - Développement de la page *Direct* (intégration du live YouTube, affichage de publicités, discussion en temps réel).
  - Création de la page *Replay* pour afficher les vidéos précédemment diffusées.

- *Jour 13 à 14 :*
  - Développement de la page *Programme* (liste des programmes à venir avec filtre de date).

### *Semaine 3 : Finalisation et gestion admin*
- *Jour 15 à 16 :*
  - Développement des pages d’informations comme *Nous connaître* (présentation de l’équipe et du projet).
  
- *Jour 17 à 18 :*
  - Développement du *Dashboard Admin* (gestion des utilisateurs, création de contenus, gestion des événements, lancement de lives).

- *Jour 19 à 21 :*
  - Développement de la *Barre de Recherche* (recherche par catégorie, filtrage des contenus).
  - Finalisation, tests, débogage, et intégration des pages secondaires (erreur 404, politique de confidentialité, conditions générales d'utilisation).



-------------------------------------LES ENTITES ---------------------------------

1. Utilisateur
- Champs :
  - `id`
  - `nom`
  - `prenom`
  - `email`
  - `numéro`
  - `mot_de_passe`
  - `photo_profil`
  - `date_inscription`
  - `status` (actif/inactif)
  - `role` (utilisateur/admin)
  - `likes` (références des vidéos aimées)
  - `favoris` (références des vidéos favorites)

2. Vidéo
- Champs :
  - `id`
  - `titre`
  - `description`
  - `url`
  - `type` (lecture, émission, live, replay)
  - `miniature` (image associée)
  - `date_publication`
  - `auteur` (référence utilisateur/admin)
  - `nb_vues`
  - `nb_likes`
  - `nb_commentaires`
  - `statut` (visible/non visible)

3. Emission/Programme
- Champs :
  - `id`
  - `titre`
  - `description`
  - `date_début`
  - `date_fin`
  - `miniature`
  - `url_video`
  - `statut` (à venir/en cours/terminé)

4. Commentaire
- Champs :
  - `id`
  - `id_utilisateur`
  - `id_video`
  - `contenu`
  - `date_publication`
  - `nb_like_commentaire`

5. Live
- Champs :
  - `id`
  - `titre`
  - `description`
  - `url_live_youtube`
  - `date_programmation`
  - `statut` (en direct/terminé)
  - `publicités` (référence publicités associées)

6. Publicité
- Champs :
  - `id`
  - `type` (YouTube, Google Adsense, Popup)
  - `contenu` (image, vidéo ou texte)
  - `url_redirection`
  - `statut` (active/inactive)
  - `date_publication`

7. Favori
- Champs :
  - `id`
  - `id_utilisateur`
  - `id_video`
  - `date_ajout`

8. Like
- Champs :
  - `id`
  - `id_utilisateur`
  - `id_video`
  - `date_like`

9. Catégorie
- Champs :
  - `id`
  - `nom`
  - `description`
  - `type` (émission, maladie, nutrition, etc.)
  - `date_ajout`

10. Recherche
- Champs :
  - `id`
  - `mot_clé`
  - `type_recherche` (vidéos, émissions, lives)
  - `date_recherche`
  - `id_utilisateur`

11. Administrateur
- Champs :
  - `id`
  - `nom`
  - `email`
  - `mot_de_passe`
  - `role` (admin)
  - `date_inscription`
  - `privileges` (gestion contenus, gestion utilisateurs, etc.)

12. Notification
- Champs :
  - `id`
  - `id_utilisateur`
  - `contenu`
  - `type` (nouveau live, émission à venir, etc.)
  - `date_notification`
  - `status` (lue/non lue)




--------------------------------REGLES DE GESTIONS ----------------------------------

### 1. **Utilisateur**
- **Règles de gestion :**
  - Un utilisateur peut s'inscrire avec un **email** ou un **numéro de téléphone** et doit créer un **mot de passe**.
  - Les utilisateurs inscrits peuvent **commenter**, **liker**, **mettre en favori** des vidéos et **participer au live**.
  - Un utilisateur a un **profil personnel** qu'il peut modifier (nom, prénom, photo de profil).
  - Les utilisateurs peuvent supprimer leur compte.
- **Relations :**
  - Un utilisateur peut avoir **plusieurs commentaires**.
  - Un utilisateur peut avoir **plusieurs vidéos en favori**.
  - Un utilisateur peut **liker plusieurs vidéos**.

### 2. **Vidéo**
- **Règles de gestion :**
  - Chaque vidéo possède un **titre**, une **description**, une **miniature**, un **type** (lecture, émission, live, replay), et une **date de publication**.
  - Les vidéos peuvent être **aimées**, **commentées**, et **ajoutées aux favoris** des utilisateurs.
  - Une vidéo peut être associée à un **programme** ou à une **émission**.
  - Une vidéo peut être **visible** ou **non visible**.
- **Relations :**
  - Une vidéo peut avoir plusieurs **likes**.
  - Une vidéo peut avoir plusieurs **commentaires**.
  - Une vidéo peut être associée à un **live**.
  - Une vidéo peut être ajoutée dans plusieurs **favoris** d'utilisateurs.

### 3. **Emission/Programme**
- **Règles de gestion :**
  - Une émission ou un programme contient une **mignature**, un **titre**, une **description**, et est associé à une ou plusieurs vidéos.
  - Chaque programme est **classé par catégorie** (émission, maladie, nutrition, etc.).
  - Un programme peut avoir un **intervalle de date** pour la diffusion.
- **Relations :**
  - Un programme peut avoir **plusieurs vidéos** associées.
  - Un programme est classé dans une **catégorie**.

### 4. **Commentaire**
- **Règles de gestion :**
  - Un utilisateur doit être **connecté** pour commenter une vidéo.
  - Chaque commentaire est associé à une **vidéo** et un **utilisateur**.
  - Un commentaire peut être **aimé** par d'autres utilisateurs.
- **Relations :**
  - Un commentaire est associé à une seule **vidéo** et un seul **utilisateur**.
  - Un commentaire peut avoir **plusieurs likes**.

### 5. **Live**
- **Règles de gestion :**
  - Un **live** est diffusé en direct via un **lien YouTube** ou une autre plateforme, et est programmé à une date spécifique.
  - Les utilisateurs peuvent **regarder** le live et **discuter en temps réel**.
  - Les publicités telles que **YouTube Ads** ou **Google AdSense** peuvent apparaître durant le live.
- **Relations :**
  - Un live est associé à une **vidéo**.
  - Un live peut avoir **plusieurs utilisateurs connectés** interagissant.

### 6. **Publicité**
- **Règles de gestion :**
  - Les publicités peuvent être de type **YouTube Ads**, **Google AdSense**, ou des **popups**.
  - Elles apparaissent dans les vidéos et les lives pour monétiser la plateforme.
- **Relations :**
  - Une publicité peut être liée à plusieurs **vidéos** ou **lives**.

### 7. **Favori**
- **Règles de gestion :**
  - Un utilisateur peut **ajouter une vidéo en favori** pour la retrouver plus tard.
  - Un favori est propre à un utilisateur et est supprimable.
- **Relations :**
  - Un favori est associé à une **vidéo** et à un **utilisateur**.

### 8. **Like**
- **Règles de gestion :**
  - Un utilisateur peut **liker une vidéo** ou un **commentaire**.
  - Un utilisateur peut liker une vidéo ou un commentaire qu'une seule fois.
- **Relations :**
  - Un like est associé à une **vidéo** ou un **commentaire** et un **utilisateur**.

### 9. **Catégorie**
- **Règles de gestion :**
  - Une catégorie permet de classer les **émissions** et les **programmes** (ex : nutrition, santé mentale, etc.).
  - Une vidéo ou un programme doit appartenir à une catégorie.
- **Relations :**
  - Une catégorie peut avoir **plusieurs programmes** ou **vidéos**.

### 10. **Recherche**
- **Règles de gestion :**
  - L'utilisateur peut faire des recherches par **mot-clé** pour trouver des vidéos, programmes, ou émissions.
  - Les recherches peuvent être filtrées par **catégorie** ou **type** de contenu.
- **Relations :**
  - Une recherche est liée à un **utilisateur**.

### 11. **Administrateur**
- **Règles de gestion :**
  - Un administrateur peut **gérer les utilisateurs**, **créer et publier** des vidéos, programmes, ou émissions.
  - L'administrateur a accès à un **dashboard** pour suivre les statistiques et la gestion de la plateforme.
- **Relations :**
  - Un administrateur peut gérer **plusieurs vidéos**, **programmes**, et **utilisateurs**.

### 12. **Notification**
- **Règles de gestion :**
  - Une notification est envoyée à un utilisateur pour l'informer de **nouveaux lives**, **vidéos**, ou **événements**.
  - Les notifications peuvent être marquées comme **lues** ou **non lues**.
- **Relations :**
  - Une notification est liée à un **utilisateur**.

### Résumé des relations :
- **Utilisateur ↔ Vidéo** : Un utilisateur peut aimer, commenter et mettre des vidéos en favori.
- **Vidéo ↔ Programme** : Un programme peut regrouper plusieurs vidéos.
- **Vidéo ↔ Commentaire** : Une vidéo peut avoir plusieurs commentaires.
- **Utilisateur ↔ Commentaire** : Un utilisateur peut poster plusieurs commentaires.
- **Live ↔ Vidéo** : Un live est considéré comme une vidéo en direct.
- **Vidéo ↔ Publicité** : Des publicités peuvent être liées à une vidéo ou un live.
- **Vidéo ↔ Like** : Une vidéo peut être aimée par plusieurs utilisateurs.
- **Utilisateur ↔ Favori** : Un utilisateur peut ajouter plusieurs vidéos en favoris.
- **Administrateur ↔ Vidéo** : L'administrateur peut créer et gérer des vidéos et programmes.

