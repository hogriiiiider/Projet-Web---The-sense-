<?php
    // Démarrage de la session PHP
    session_start();

    // Connexion à la base de données MySQL
    $dsn = 'mysql:host=mysql-the-sense.alwaysdata.net;dbname=the-sense_bdd;charset=utf8';
    $user = 'the-sense';
    $password = 'the-sense-dr01te';
    $pdo = new PDO($dsn, $user, $password);

    // Vérification si le formulaire de connexion a été soumis
    if(isset($_POST['button'])){
        // Vérification si les champs sont remplis
        if(isset($_POST['name']) && isset($_POST['password']) && $_POST['name'] != "" && $_POST['password'] != ""){
            // Récupération des valeurs du formulaire
            $pseudo = $_POST['name'];
            $password = $_POST['password'];

            // Requête SQL pour vérifier les informations dans la base de données
            $query = "SELECT * FROM `USERS` WHERE `mail` = :USERNAME AND `password` = :MDP";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':USERNAME', $pseudo);
            $stmt->bindParam(':MDP', $password);
            $stmt->execute();
            $user = $stmt->fetch();

            if($user){
                // Si les informations sont correctes, rediriger vers index.php
                $_SESSION['name'] = $pseudo;
                $_SESSION['isConnected'] = true; // Ajout de la variable isConnected
                header("Location: light_room.php");
                exit();
            } else {
                // Si les informations sont incorrectes, afficher un message d'erreur
                $error = "Pseudo ou mot de passe incorrect.";
            }
        } else {
            // Si tous les champs ne sont pas remplis, afficher un message d'erreur
            $error = "Veuillez remplir tous les champs.";
        }
    }

    $nom = "";

    // Vérification de la connexion de l'utilisateur
    if(isset($_SESSION['isConnected'])){
        $pseudo = $_SESSION['name'];
        $query2 = "SELECT name FROM `USERS` WHERE `mail` = :USERNAME";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':USERNAME', $pseudo);
        $stmt2->execute();
        $user2 = $stmt2->fetch();
        $nom = $user2['name'];
    }

    // Gérer la déconnexion
    if(isset($_POST['logout'])){
        session_destroy(); // Détruit la session actuelle
        header("Location: light_room.php"); // Redirige vers la page d'accueil ou toute autre page de votre choix
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Sense</title>
        <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
    </head>
    <body>
    <div class="nav-container">
            <div class="nav">
                <div class="nav-image">
                    <a href="../accueil/index.php"><img class="logo_the_sense" src="../../../Assets/Images/Icones/Logo_the_sense.svg" alt="logo the sense" /><a> <!-- Lien vers la page d'accueil avec le logo -->
                </div>
                <div class="nava">
                    <div class="nav-droite">
                        <a href="../news/news.php">NEWS</a> <!-- Lien vers la page des actualités -->
                        <a href="../lightroom/light_room.php">NOS EXPÉRIENCES</a> <!-- Lien vers la page des expériences -->
                        <a href="../propos/à_propos.php">À PROPOS DE NOUS</a> <!-- Lien vers la page "À propos de nous" -->
                        <a href="../equipement/equipement.html">NOS ÉQUIPEMENTS</a> <!-- Lien vers la page des équipements -->
                    </div>
                    <div class="CONNECT" >
                        <a id="CONNECT" href="#" >CONNEXION</a> <!-- Bouton de connexion -->
                    </div>
                </div>
                <?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] === true): ?> <!-- Vérification si l'utilisateur est connecté -->
                    <div class="connexion-box">
                        <h2>Bonjour, <?php echo $nom; ?></h2> <!-- Affichage du nom de l'utilisateur -->
                        <p> Ma réservation </p> <!-- Lien vers la réservation de l'utilisateur -->
                        <p>Mes points</p> <!-- Affichage des points de l'utilisateur -->
                        <a href="#">Paramtres du compte<a> <img> <!-- Lien vers les paramètres du compte utilisateur -->
                        <form method="post" action="#">
                            <button type="submit" name="logout">Déconnexion</button> <!-- Bouton de déconnexion -->
                        </form>
                    </div>
                <?php else: ?> <!-- Si l'utilisateur n'est pas connecté -->
                    <div class="connexion-box">
                        <h2>Connexion</h2>
                        <!-- Formulaire de connexion -->
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="username">Identifiant</label> <!-- Champ pour l'identifiant -->
                                <input name="name" type="text" id="username" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label> <!-- Champ pour le mot de passe -->
                                <input name="password" type="password" id="password" placeholder="Mot de passe">
                            </div>
                            <p class="error">
                                <?php if(isset($error)) echo $error; ?> <!-- Affichage des erreurs de connexion -->
                            </p>
                            <div class="footer">
                                <div class="account-options">
                                    <a href="../inscription/index.php">Créer un compte</a> <!-- Lien vers la page d'inscription -->
                                    <a href="#" class="password-reset">Mot de passe oublié ?</a> <!-- Lien pour réinitialiser le mot de passe -->
                                </div>
                                <button class="connexion-btn" name="button" type="submit"><span>Connexion</span></button> <!-- Bouton de connexion -->
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Section d'introduction -->
        <div>
            <br>
            <p class="acroche">QUAND LE VIRTUEL DEVIENT RÉEL</p> <!-- Titre d'accroche -->
        </div>
        <div>
            <a href="#description"><button class="button_anim discover-button">DÉCOUVRIR</button></a> <!-- Bouton de découverte -->
        </div>

        <!-- Section de description -->
        <div class="description" id="description">
            <img class="description-button-video" src="image/VIDEO.svg" alt="image pour la video" onclick="openVideo()"> <!-- Bouton pour ouvrir la vidéo -->
            <div class="description-text">
                <div class="description-text2">
                    <h1>QU'EST CE QUE <img class="logo-description" src="image/SENSE.svg" alt="logo secondaire the sense"> ?</h1> <!-- Titre principal -->
                </div>
                <div class="description-explication">
                    <p>
                        Préparez-vous pour une expérience unique qui vous emmènera dans un autre univers.
                        Vivez vos émotions comme vous ne l’avez jamais fait auparavant. Avec THE SENSE,
                        explorez d’autres dimensions et vivez l’impossible en interagissant avec un
                        environnement dynamique et virtuel. Ce n’est pas une expérience en réalité virtuelle
                        que vous vivez, c’est la réalité.
                    </p> <!-- Texte de description -->
                </div>
                <div class="description-redirection">
                    <div class="description-text3">
                        <a href="../propos/à_propos.php">
                            DÉCOUVREZ THE SENSE <!-- Lien pour découvrir The Sense -->
                        </a>
                        <a href="../propos/à_propos.php"><img class="description-arrow" src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a> <!-- Flèche de redirection -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Overlay pour la vidéo -->
        <div class="overlay-video" id="overlayVideo" onclick="closeVideo()">
            <div class="video-container">
                <span class="close-video" onclick="closeVideo()">&times;</span> <!-- Bouton pour fermer la vidéo -->
                <iframe width="100%" height="100%" src="../../../Assets/Images/video/Copie de Trailer - The Sense.mp4" frameborder="0" allowfullscreen></iframe> <!-- Vidéo -->
            </div>
        </div>

        <!-- Section "La réalité à portée de mains" -->
        <div class="TheReality">
            <h1>LA RÉALITÉ À PORTÉE DE MAINS</h1> <!-- Titre -->
            <p>Vous rêvez de voyager, de frissonner ou tout simplement de vivre une expérience unique ? Explorez nos univers entre amis ou en famille et franchissez la frontière de la réalité. Plusieurs dimensions s’offrent à vous, vous donnant accès à de nombreuses expériences.</p> <!-- Description -->
        </div>

        <!-- Section "Nos expériences les plus appréciées" -->
        <div class="les-experience">
            <h1>NOS EXPÉRIENCES LES PLUS APPRÉCIÉES</h1> <!-- Titre -->

            <!-- Première expérience -->
            <div class="les-experience-image-shangri">
                <!-- Image -->
                <img class="img-shangri" src="image/image 44.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-shangri-title">
                        <h1>SHANGRI-LA : LA CITÉ PERDUE DE Z</h1> <!-- Titre de l'expérience -->
                        <img src="image/LIGHT ROOM (1).svg" alt="light room"> <!-- Image de la salle d'expérience -->
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Shangri-La la cité mythique, symbole de paix, de prospérité et de magnificence. Personne n'a apparemment pu se rendre en ce lieu
                            depuis des décennies ou prouver son existence, du moins depuis votre découverte ! Aventurez-vous au plus profond des légendes,
                            entrez dans la cité de Z avec votre équipe et explorez les lieux à la recherche de Percy Fawcett.
                        </p> <!-- Description de l'expérience -->
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <!-- Bouton de réservation -->
                        <a href="../lightroom/light_room.php"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <!-- Lien vers la salle d'expérience -->
                            <a class="text-lightroom" href="../lightroom/light_room.php">DÉCOUVREZ LA LIGHT ROOM</a>
                            <!-- Flèche de redirection -->
                            <a class="description-arrow-2" href="../lightroom/light_room.php"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Première expérience: The Conjuring Experience -->
            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/image-2.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <!-- Titre et logo de l'expérience -->
                    <div class="les-experience-conjuring-title">
                        <h1>THE CONJURING EXPERIENCE</h1>
                        <img src="image/DARK ROOM.svg" alt="dark room">
                    </div>
                    <!-- Description de l'expérience -->
                    <div class="les-experience-shangri-texte">
                        <p class="conjuring">Expérience interdite aux -18</p>
                        <p>
                            Revivez l'histoire d'un chef-d'œuvre cinématographique au travers d’une expérience aussi réaliste qu'immersive. Rassemblez ce qu'il vous reste de courage, les inspecteurs Ed et Loren Warren ont besoin de vous. Un malheur hante la maison de ces derniers et vous ne pouvez vous en échapper sans sacrifices. Serez-vous à la hauteur de ce qui vous attend ? Bonne chance, vous en aurez besoin !
                        </p>
                    </div>
                    <!-- Bouton de réservation -->
                    <div class="les-experience-reservation-shangri">
                        <a href="../darkroom/dark_room.php"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../darkroom/dark_room.php">DÉCOUVREZ LA DARK ROOM</a>
                            <a class="description-arrow-2" href="../darkroom/dark_room.php"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deuxième expérience: Ultimate Fight -->
            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/image-3.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-battle-title">
                        <h1>ULTIMATE FIGHT</h1>
                        <img src="image/BATTLE ROOM.svg" alt="battle room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Sentez votre cœur battre, votre souffle se couper, votre concentration monter... Enrôlez des joueurs, formez votre équipe et préparez-vous au combat ! Arrachez la victoire à vos adversaires à travers une bataille dans des décors et des "maps" des plus immersives. En équipe de 4 ou 5, voyez lesquels d’entre vous sont dignes de remporter le trophée.
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../battleroom/battle_room.php"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../battleroom/battle_room.php">DÉCOUVREZ LA BATTLE ROOM</a>
                            <a class="description-arrow-2" href="../battleroom/battle_room.php"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Troisième expérience: Créez votre propre expérience -->
            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/Frame-1.svg" alt="CREATIVE ROOM IMAGE">
                <div class="les-experience-shangri">
                    <div class="les-experience-shangri-title">
                        <h1>CRÉEZ VOTRE PROPRE EXPÉRIENCE</h1>
                        <img src="image/CREATIVE ROOM.svg" alt="creative room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Vous en avez marre des expériences répétitives ! Vous êtes à la recherche d'une toute nouvelle expérience en réalité virtuelle ? Alors venez créer votre propre expérience avec notre tout nouveau système de création virtuelle ! Vous nous exposez votre idée et votre univers, et nous le mettons en œuvre rien que pour vous ! N'attendez plus, c'est désormais votre création, votre univers, votre expérience, votre SENSE !
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../creativeroom/creative_room.php"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../creativeroom/creative_room.php">DÉCOUVREZ LA CREATIVE ROOM</a>
                            <a class="description-arrow-2" href="../creativeroom/creative_room.php"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>



        <!-- Section de réservation -->
        <div class="reservation">
            <div class="reservation-img">
                <!-- Icône de réservation -->
                <img class="img-reserver-style" src="image/RESERVER (1).svg" alt="reserver">
                <!-- Titre de la section de réservation -->
                <p class="reserver-accroche">N’ATTENDEZ PLUS, RÉSERVEZ</p>
                <!-- Icône pour afficher les tarifs -->
                <img class="img-reserver-style-2" src="image/NOS TARIFS.svg" alt="nos tarifs">
                <div>
                    <!-- Image d'un rectangle -->
                    <img src="image/Rectangle 192.svg" alt="rectangle">
                </div>
                <!-- Texte pour voir les tarifs -->
                <p class="text-reservation">Voir les tarifs pour </p>
                <!-- Paranthèse indiquant le nombre maximum de joueurs -->
                <div class="paranthese-reservation">
                    <p>(max 8 joueurs)</p>
                </div>
                <!-- Sélecteur de nombre de personnes -->
                <div class="nb-personne">
                    <img src="image/Rectangle 193.svg" alt="moins" onclick="less()">
                    <p>
                        <span class="number-people">1</span>
                    </p>
                    <img src="image/Union (1).svg" alt="plus" onclick="add()">
                </div>
                <!-- Section des tarifs par expérience -->
                <div class="reservation-prix">
                    <!-- Tarifs pour la Light Room -->
                    <div class="lightroom-prix">
                        <img src="image/LIGHT ROOM-logo.svg" alt="LIGHT ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                    <!-- Tarifs pour la Dark Room -->
                    <div class="darkroom-prix">
                        <img src="image/DARK ROOM-logo.svg" alt="DARK ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                    <!-- Tarifs pour la Battle Room -->
                    <div class="battleroom-prix">
                        <img src="image/BATTLE-ROOM.svg" alt="BATTLE ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                    <!-- Tarifs pour la Creative Room -->
                    <div class="creativeroom-prix">
                        <img src="image/CREATIVE-logo.svg" alt="CREATIVE-logo">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p class="descente">
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Section du planning -->
<div class="planning">
    <!-- Sélection de la semaine -->
    <div class="planning-date" id="week-range6">
        <img src="image/Layer 2.svg" alt="flèche mois précedent" id="prev-week6">
        <p>
            DU <span id="start-day6">15</span> AU <span id="end-day6">20</span> <span id="end-month6">DÉCEMBRE</span>
        </p>
        <img src="image/Layer 3.svg" alt="flèche mois suivant" id="next-week6">
    </div> 

    <!-- Conteneur des jours -->
    <div class="day" id="days-container6"></div>

    <!-- Légende de disponibilité -->
    <div class="disponibilite">
        <img src="image/LÉGENDE.svg" alt="disponibilité">
    </div>
</div>

<!-- Section des actualités -->
<div class="news">
    <h1>LES NEWS DU MOIS</h1>
    <div class="news-part">
        <!-- Premier élément d'actualité -->
        <div class="news-item">
            <img src="image/image 135.svg" alt="-image-news-1">
            <div class="text">
                <h2>ÉVÉNEMENT : LA CHASSE À L’OEUF</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <!-- Deuxième élément d'actualité -->
        <div class="news-item">
            <img src="image/image 138.svg" alt="image-news-2">
            <div class="text">
                <h2>UN NOUVEL ÉQUIPEMENT ARRIVE !</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</div>

        <!-- Section des avis -->
        <div class="journaux">
            <h1>QU’EST CE QUI VOUS RETIENT ?</h1>
            <div class="journaux-section">
                <!-- Flèches de navigation -->
                <div class="arrows">
                    <img onclick="previous()" src="image/Cercle 1.svg" alt="flèche précedante">
                    <img onclick="next()" src="image/Cercle 2.svg" alt="flèche suivante">
                </div>
                <!-- Contenu du slider -->
                <div class="slider-content">
                    <!-- Premier avis -->
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <!-- Deuxième avis -->
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                    <!-- Troisième avis -->
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <!-- Quatrième avis -->
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                    <!-- Cinquième avis -->
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <!-- Élément du slider de témoignages - Sixième avis -->
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                    </div>

                    <!-- Conteneur des rectangles de suivi des actualités -->
                    <div class="rect-container">
                        <div class="rect-news"></div>
                        <div class="rect-news2"></div>
                        <div class="rect-news3"></div>
                        <div class="rect-news4"></div>
                        <div class="rect-news5"></div>
                        <div class="rect-news6"></div>
                    </div>
                    </div>
                    </div>

                    <!-- Section FAQ -->
                    <div class="faq-container">
                        <!-- Titre de la FAQ -->
                        <div class="FAQ-title"><h2>Foire aux questions</h2></div>

                        <!-- Premier élément de FAQ -->
                        <div class="faq-item">
                            <!-- Question -->
                            <div class="question">
                                <span class="toggle-icon">
                                    <img src="image/plus.svg" alt="Plus"/>
                                </span> 
                                Qu'est ce que The SENSE ?
                            </div>
                            <!-- Réponse -->
                            <div class="answer">
                                The SENSE est une immersion poussée grâce à la réalité virtuelle. The SENSE propose de nombreuses expériences
                                à faire entre amis ou avec la famille. Vous pouvez tout à fait favoriser une expérience avec de l’action comme notre 
                                Dark Room basé sur l’horreur. Ou encore, si vous le souhaitez par exemple, vous pouvez favoriser l’aspect compétitif 
                                en participant aux expériences de notre Battle Room. De plus, The SENSE propose un système de création d’expérience où les clients peuvent à leur tour imaginer et créer la meilleure expérience possible. 
                            </div>
                        </div>

                        <!-- Deuxième élément de FAQ -->
                        <div class="faq-item">
                            <!-- Question -->
                            <div class="question">
                                <span class="toggle-icon">
                                    <img src="image/plus.svg" alt="Plus"/>
                                </span> 
                                Y a-t-il un âge et taille minimum pour participer à une expérience The SENSE ? 
                            </div>
                            <!-- Réponse -->
                            <div class="answer">oui</div>
                        </div>

                        <!-- Troisième élément de FAQ -->
                        <div class="faq-item">
                            <!-- Question -->
                            <div class="question">
                                <span class="toggle-icon">
                                    <img src="image/plus.svg" alt="Plus"/>
                                </span> 
                                Quel est le nombre maximum de participants pour jouer ?
                            </div>
                            <!-- Réponse -->
                            <div class="answer">8</div>
                        </div>
                    </div>

            <!-- Quatrième élément de FAQ -->
            <div class="faq-item">
                <!-- Question -->
                <div class="question">
                    <span class="toggle-icon">
                        <img src="image/plus.svg" alt="Plus">
                    </span>
                    Avec vous une politique d'annulation et de remboursement ? Si oui, comment se déroule-t-elle ?
                </div>
                <!-- Réponse -->
                <div class="answer">non on ne rembourse pas</div>
            </div>
            <!-- Deuxième élément de FAQ -->
            <div class="faq-item">
                <!-- Question -->
                <div class="question">
                    <span class="toggle-icon">
                        <img src="image/plus.svg" alt="Plus">
                    </span>
                    Est-il possible de déposer mes affaires "encombrantes" avant de faire une expérience ? Puis-je garder mes lunettes ?
                </div>
                <!-- Réponse -->
                <div class="answer">non</div>
            </div>
        </div>
    </body>

                <!-- Pied de page -->
    <footer>
        <!-- Section gauche -->
        <div class="left">
            <a>Nous contacter</a>
            <span><a>Réservations</a></span>
            <span><a>FAQ</a></span>
        </div>
        <!-- Section centrale -->
        <div class="center">
            <a><img src="../../../Assets/Images/Icones/Vector.svg">THE SENSE, SAS. Tous droits réservés</a>
        </div>
        <!-- Section droite -->
        <div class="right">
            <div class="txt">
                <a>Modalités</a>
                <span>|</span>
                <span><a>Politique de confidentialité</a></span>
            </div>
            <div class="img">
                <span><a><img src="../../../Assets/Images/Icones/Youtube.svg"></a></span>
                <span><a><img src="../../../Assets/Images/Icones/Instagram.svg"></a></span>
                <span><a><img src="../../../Assets/Images/Icones/Twitter.svg"></a></span>
                <span><a><img src="../../../Assets/Images/Icones/Facebook.svg"></a></span>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="../../jquery.js"></script>
    <script type="text/javascript" src="../script.js"></script>
</html>