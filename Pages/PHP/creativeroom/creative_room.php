<?php
    session_start();

    $dsn = 'mysql:host=mysql-the-sense.alwaysdata.net;dbname=the-sense_bdd;charset=utf8';
    $user = 'the-sense';
    $password = 'the-sense-dr01te';
    $pdo = new PDO($dsn, $user, $password);

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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Creative Room</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="nav-container">
            <div class="nav">
                <div class="nav-image">
                    <a href="../accueil/index.php"><img class="logo_the_sense" src="../../../Assets/Images/Icones/Logo_the_sense.svg" alt="logo the sense" /><a>
                </div>
                <div class="nava">
                    <div class="nav-droite">
                        <a href="../news/news.php">NEWS</a>
                        <a href="../lightroom/light_room.php">NOS EXPÉRIENCES</a>
                        <a href="../propos/à_propos.php">À PROPOS DE NOUS</a>
                        <a href="../equipement/equipement.html">NOS ÉQUIPEMENTS</a>
                    </div>
                    <div class="CONNECT" >
                        <a id="CONNECT" href="#" >CONNEXION</a>
                    </div>
                </div>
                <?php if(isset($_SESSION['isConnected']) && $_SESSION['isConnected'] === true): ?>
                    <div class="connexion-box">
                        <h2>Bonjour, <?php echo $nom; ?></h2>
                        <p> Ma réservation </p>
                        <p>Mes points</p>
                        <a href="#">Paramtres du compte<a> <img>
                        <form method="post" action="#">
                            <button type="submit" name="logout">Déconnexion</button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="connexion-box">
                        <h2>Connexion</h2>
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="username">Identifiant</label>
                                <input name="name" type="text" id="username" placeholder="Mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input name="password" type="password" id="password" placeholder="Mot de passe">
                            </div>
                            <p class="error">
                                <?php if(isset($error)) echo $error; ?>
                            </p>
                            <div class="footer">
                                <div class="account-options">
                                    <a href="../inscription/index.php">Créer un compte</a>
                                    <a href="#" class="password-reset">Mot de passe oublié ?</a>
                                </div>
                                <button class="connexion-btn" name="button" type="submit"><span>Connexion</span></button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="page">
            <div>   
                <div class="logo_room">
                    <span><a href="../lightroom/light_room.php"><img class="dark_room" src="image/LITTLE-LIGHT-ROOM (2).svg" alt="Logo_LIGHT_Room"></a></span>
                    <span><a href="../darkroom/dark_room.php"><img class="battle_room" src="image/LITTLE-DARK-ROOM.svg" alt="Logo_Dark_Room"></a></span>
                    <a href="../battleroom/battle_room.php"><img class="creative_room" src="image/LITTLE-BATTLE-ROOM (1).svg" alt="Logo_BATTLE_Room"></a>
                </div> 
                <div class="logo-lightroom"> 
                    <img class="logo_creative" src="image/CREATIVE (1).svg" alt="logo Creative Room">
                </div> 
            <div>
                <a href="#dark"><button class="button_anim discover-button">DÉCOUVRIR</button></a>
            </div>

            <div class="description" id="description">
                <img class="description-button-video" src="image/IMAGE-VIDEO-CREATIVE.svg" alt="image pour la video" onclick="openVideo()">
                <div class="description-text">
                    <div class="description-text2">
                        <h1>QU'EST CE QUE <img class="logo-description" src="image/CREATIVE-293x35.svg" alt="logo secondaire the sense"> ?</h1>
                    </div>
                    <div class="description-explication">
                        <p>
                            Notre catalogue ne vous suffit pas ? Vous aimeriez laisser parler votre imagination ? Grâce à la CREATIVE ROOM, concept inédit en France, la créativité est votre seule limite, créez de toute pièce l'univers dans lequel vous voyagerez par la suite. Que ce soit dans la jungle ou en haut de montagnes enneigées, pour affronter des démons ou enquêter sur la disparition de bébés licornes roses fluos, le choix vous appartient. Alors tester votre imagination dans la CREATIVE ROOM et entraîner vos amis ou votre famille dans votre univers.
                        </p>
                    </div>
                </div>
            </div>
            <div class="overlay-video" id="overlayVideo" onclick="closeVideo()">
                <div class="video-container">
                    <span class="close-video" onclick="closeVideo()">&times;</span>
                    <iframe width="100%" height="100%" src="../../../Assets/Images/video/Copie de Trailer - The Sense.mp4" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="TheReality">
                <h1>VOTRE EXPÉRIENCE ENTRE VOS MAINS</h1>
                <p>Suivez les étapes pour créer votre propre aventure. Nous mettons à votre disposition la possibilité de choisir tous les éléments
                   de votre room dans le but de vous offrir l’expérience ultime qui VOUS correspond. Basculez entre chaque étape, modifier vos choix à tout moment pour que ceux-ci correspondent à vos besoins.</p>
            </div>

            <div class="CREAT-IMAGE-ROOM" id="dark">
                <div>
                    <img src="image/CREAT-DARK.svg" alt="dark room">
                </div>

                <div class="choice-n1">
                    <div class="darkroom-choice">
                        <img src="image/DARK ROOM.jpg" alt="darkroom-choice">
                        <p id="e1">ESCAPE GAME</p>
                        <p id="e2">BATTLE</p>
                        <p id="e3">SURVIVAL</p>
                        <div class="random1">
                            <img src="image/Bouton Aléatoire.svg" alt="bouton aleatoire 1">
                        </div>
                    </div>
                </div>
                <div class="choice-n2">
                    <div class="darkroom-choice-2">
                        <img src="image/DARK ROOM (1).jpg" alt="darkroom-choice-2">
                        <p id="f1">CIMETIÈRE</p>
                        <p id="f2">MAISON</p>
                        <p id="f3">ÉCOLE</p>
                        <span class="choice-1st">- </span>
                        <span class="modify-1st">(modified)</span>
                        <div class="random2">
                            <img src="image/Bouton Aléatoire.svg" alt="bouton aleatoire 2">
                        </div>
                    </div>
                </div>
                <div class="choice-n3">
                    <div class="darkroom-choice-3">
                        <img src="image/DARK ROOM (2).jpg" alt="darkroom-choice-3">
                        <p id="g1" onclick="open_reserv()">FLIPETTE</p>
                        <p id="g2" onclick="open_reserv()">DARK ROOM</p>
                        <p id="g3" onclick="open_reserv()">FOU FURIEUX</p>
                        <span class="choice-1st">- </span>
                        <span class="modify-1st">(modified)</span>
                        <span class="choice-2nd">- MAISON</span>
                        <span class="modify-2nd">(modified)</span>
                        <div class="random3">
                            <img src="image/Bouton Aléatoire.svg" alt="bouton aleatoire 3">
                        </div>
                    </div>
                </div>

                <div>
                    <img src="image/CREAT-LIGHT.png" alt="light room">
                </div>
                <div>
                    <img src="image/CREAT-BATTLE.svg" alt="battle room">
                </div>
            </div>

            <div class="TheReality">
                <h1>OU CONFIEZ VOTRE DESTIN AU HASARD</h1>
                <p>Vous pensez pouvoir tout affronter sans problème, laisser le hasard décider de votre room et choisissez simplement la
                    difficulté. </p>
            </div>

            <div class="CREAT-IMAGE-ROOM">
                <img src="image/CREAT-ALEATOIRE.svg" alt="aleatoire">
            </div>
        

            <div>
                <div class="carroussel">
                    <img class="img_carroussel" id="img_carroussel" src="">
                    <div class="next">
                        <img id="precedent" src="../../../Assets/Images/Icones/Cercle 1.svg">
                        <img id="suivant" src="../../../Assets/Images/Icones/Cercle 2.svg">
                    </div>
                    <div class="txt_carroussel">
                        <p id="txt_carroussel">
                        
                        </p>
                    </div>
                    <div class="rectangles">
                        <img id="rect1" src="../../../Assets/Images/Picture/Rectangle 128.svg">
                        <img id="rect2" src="../../../Assets/Images/Picture/Rectangle 128.svg">
                        <img id="rect3" src="../../../Assets/Images/Picture/Rectangle 128.svg">
                        <img id="rect4" src="../../../Assets/Images/Picture/Rectangle 128.svg">
                        <img id="rect5" src="../../../Assets/Images/Picture/Rectangle 128.svg">
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="reservation">
            <div class="retour">
                <p onclick="close_reserv()">RETOUR</p>
            </div>

            <div class="image-reserv">
                <img src="../../../Assets/Images/Picture/img-battleroom-reserv.jpg" alt="IMAGE RESERVATION">
            </div>

            <div class="planning-reservation">
                <div class="reservation-header">
                    <h1>VOTRE RÉSERVATION EST PRÊTE !</h1>
                    <h2>IL NE RESTE PLUS QU'À VALIDER !</h2>
                </div> 
                <div class="planning">
                    <div class="first-part">
                        <!-- Sélection de la semaine -->
                        <div class="planning-date" id="week-range">
                            <img src="../../../Assets/Images/Icones/Layer 2.svg" alt="flèche mois précedent" id="prev-week">
                            <p>
                                DU <span id="start-day">15</span> AU <span id="end-day">20</span> <span id="end-month">DÉCEMBRE</span>
                            </p>
                            <img src="../../../Assets/Images/Icones/Layer 3.svg" alt="flèche mois suivant" id="next-week">
                        </div>
                    
                        <!-- Conteneur pour les jours -->
                        <div class="day" id="days-container">
                        </div>
                    
                        <!-- Légende pour la disponibilité -->
                        <div class="disponibilite">
                            <img src="../../../Assets/Images/Icones/LÉGENDE.svg" alt="disponibilité">
                        </div>
                    </div>
                
                    <div class="seconde-part">
                    
                        <!-- Formulaire de confirmation -->
                        <div class="confirmation-container">
                            <p id="selected-date"></p>
                            <p id="selected-time"></p>
                            <div class="form-column">
                                <input type="text2" placeholder="Votre nom" id="nom">
                                <input type="email" placeholder="Votre adresse mail">
                                <div class="option-player">
                                    <!-- Sélection du nombre de joueurs -->
                                    <select id="player-count" name="Nombre de joueurs"> 
                                        <option value="" selected disabled hidden>Nbre de joueurs</option>
                                        <!-- Options pour le nombre de joueurs -->
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-column">
                                <input type="text" placeholder="Votre prénom" id="prénom">
                                <input type="tel" placeholder="Votre n° de téléphone">
                                <!-- Sélection de la manière dont l'utilisateur a découvert The Sense -->
                                <select type="option-sense" id="the-sense">
                                    <option class="false-value" value="" selected disabled hidden>J'ai découvert The Sense</option>
                                    <!-- Options pour la découverte de The Sense -->
                                    <option value="">Par des amis</option>
                                    <option value="">Recherche internet</option>
                                    <option value="">Publicité</option>
                                    <option value="">Par de la famille</option>
                                    <option value="">Je ne sais plus</option>
                                </select>
                            </div>
                            <!-- Champ pour le code promo ou bon cadeau -->
                            <input type="promo" placeholder="Code promo ou bon cadeau">
                            <button>Appliquer</button>
                            <p>TOTAL: <span id="total-price">...</span> €</p>
                            <!-- Options de paiement -->
                            <div class="payment-cargo">
                                <p>SÉLECTIONNEZ VOTRE MOYEN DE PAIEMENT</p>
                                <div class="payment-container">
                                    <div class="payment-options">
                                        <h3>Paiement groupé (en ligne)</h3>
                                        <div class="payment-logo">
                                            <!-- Options de paiement groupé -->
                                            <div class="payment-online">
                                                <div class="payment-option">
                                                    <label> <img src="../../../Assets/Images/Icones/visa.svg" alt="Visa"><img src="../../../Assets/Images/Icones/mastercard.svg" alt="mastercard"> <img src="../../../Assets/Images/Icones/CB.svg" alt="CB">
                                                    </label>
                                                </div>
                                                <div class="cards">
                                                    <input type="radio" name="payment" value="grouped">
                                                </div>
                                                <div class="paypal">
                                                    <img src="../../../Assets/Images/Icones/paypal.svg" alt="Paypal"><input type="radio" name="payment" value="grouped">
                                                </div>
                                            </div>
                                            <div class="payment-option2">
                                                <p>*En continuant, vous serez redirigé vers une page de paiement sécurisée.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Séparateur entre les options de paiement -->
                                        <div class="payment-separator"></div>
                                    <div>
                                        <!-- Paiement individuel sur place -->
                                        <div class="payment-option-3">
                                            <h3>Paiement individuel (sur place)</h3>
                                            <input type="radio" name="payment" value="individual">
                                            <p>**Vous recevrez par mail la facturation de votre réservation.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="conditions">
                                    <label><input type="checkbox"> J'accepte les conditions générales de vente</label>
                                    <label><input type="checkbox"> Je souhaite offrir cette expérience à un proche</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="reservation-reserver-btn">
                    <img src="../../../Assets/Images/Bouton/Bouton réserver.svg" onclick="getValue();">
                </div>
                <div class="annuler">
                    <a href="Pages\PHP\accueil\index.php">ANNULER</a>
                </div>
                <div class="useful-information">
                    <img src="../../../Assets/Images/Picture/INFORMATIONS IMPORTANTES.svg" alt="INFORMATIONS IMPORTANTES">
                </div>
            </div>
        </div>


        <div class="description-experience">
            <div>
                <div class="bg_achat">
                    <h2 class="phrase_de_validation">
                        C'EST PRÊT! <br>
                        <span class="color_info"> RÉCAPITULATIF DE VOTRE ACHAT</span>
                    </h2>
                    <img src="../../../Assets/Images/Design/Line 22.svg" alt="Un trait">
                    <div class="recap-achat">
                        <img src="../../../Assets/Images/Picture/creat-recap.svg" alt="logo de la room">
                        
                    </div>
                        <div><span id="jour-display"></span></div>
                        <div><span class="color_info" id="heure-display"></span></div>
                        <div class="nompré">
                            <div><span id="prénom-display"></span></div>
                            <div><span id="nom-display"></span></div>
                        </div>
                        <div><span class="color_info" id="nombre-display"></span></div>
                        <div> Prix total :<span id="price-display"></span></div>
                        
                    <p>
                        En cas d’annulation, merci de nous contacter : <br>
                        - Par téléphone : <span class="color_info"> 01 23 45 67 89 </span> <br>
                        - Par mail : <span class="color_info"> gpasdidée@projet7.com </span> <br>
                    </p>
                    <p class="A48-HEURE">
                        *Seules les annulations jusqu'à 48h à l'avance seront remboursées
                    </p>
                    <p class="remerciement">
                        Toute l’équipe de The Sense vous remercie pour votre réservation,
                        nous avons hâte de vous (re)voir ! 
                    </p>
                </div>
    
                <div>
                    <div class="bg_reservation_2">
                        
                        <img class="logo_the_sense" src="../../../Assets/Images/Icones/Logo.svg" alt="logo the sense">
                    </div>
                </div>      
            </div>
        </div>

    </body>
    <footer>
        <div class="left">
            <a>Nous contacter</a>
            <span><a>Réservations</a></span>
            <span><a>FAQ</a></span>
        </div>
        <div class="center">
            <a><img src="../../../Assets/Images/Icones/Vector.svg">THE SENSE, SAS. Tous droits réservés</a>
        </div>
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
    <script src="../../jquery.js"></script>
    <script type="text/javascript" src="../script.js"></script>
</html>