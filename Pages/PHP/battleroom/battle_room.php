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
        <link rel="stylesheet" href="styles.css">
        <title>Battle Room</title>
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

        <div class="logo_room">
            <span><a href="../lightroom/light_room.php"><img class="dark_room" src="image/LITTLE-LIGHT-ROOM (2).svg" alt="Logo_Light_Room"></a></span>
            <span><a href="../darkroom/dark_room.php"><img class="battle_room" src="image/LITTLE-DARK-ROOM.svg" alt="Logo_Dark_Room"></a></span>
            <a href="../creativeroom/creative_room.php"><img class="creative_room" src="image/LITTLE-CREATIVE.svg" alt="Logo_Creative_Room"></a>
        </div>
        
        <img class="light_room" src="../../../Assets/Images/Icones/BATTLE ROOM (1).svg" alt="Logo_Light_Room">

        <div>
            <a href="#ultimate"><button class="button_anim discover-button">DÉCOUVRIR</button></a>
        </div> 

        <div class="description" id="description">
            <img class="description-button-video" src="image/IMAGE-VIDEO-BATTLE.svg" alt="image pour la video" onclick="openVideo()">
            <div class="description-text">
                <div class="description-text2">
                    <h1>QU'EST CE QUE <img class="logo-description" src="image/BATTLEROOM-LOGO-DISCOVER.svg" alt="logo secondaire the sense"> ?</h1>
                </div>
                <div class="description-explication">
                    <p>
                        Vous cherchez à connaitre qui est le meilleur dans la famille ou qui fera le S.A.M ce
                        soir ? Venez régler vos comptes dans la BATTLE ROOM par équipe de 1 à 4 joueurs soit 8 joueurs au maximum. Au travers de nos différents modes de jeux, prouvez votre courage et montrez qu’au reste du monde que vous êtes le meilleur. Battez tous les records, faites ressortirvotre côté compétitif et pas de quartier ! N'attendez plus et rejoignez l’arène, pour prouver que vous serez le prochain champion de THE SENSE.
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

        <div class="page">
            <div class="TheReality">
                <h1>DÉFIEZ VOS ADVERSAIRES</h1>
            </div>
            
            <div class="les-experience-image-shangri" id="ultimate">
                <img class="img-shangri" src="image/image-3.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-battle-title">
                        <h1>ULTIMATE FIGHT</h1>
                        <img src="image/BATTLEROOM-LOGO-DISCOVER.svg" alt="battle room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Sentez votre cœur battre, votre souffle se couper, votre concentration monter... Enrôlez des joueurs, formez votre équipe et
                            préparez vous au combat ! Arrachez la victoire à vos adversaires à travers une bataille dans des décors et des "maps" des
                            plus immersives. En équipe de 4 ou 5 voyez lesquels d’entre vous sont digne de remporter le trophée.
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <img src="../../../Assets/Images/Bouton/Bouton réserver.svg" onclick="open_reserv()">
                    </div>
                </div>
            </div>

            <div class="les-experience-image-shangri-2">
                <img class="img-shangri" src="image/image-4.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-battle-title">
                        <h1>GARDEN WAR</h1>
                        <img src="image/BATTLEROOM-LOGO-DISCOVER.svg" alt="battle room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Partez au front, avec vos amis ou votre famille, découvrez un univers certes plus cartoonesque mais ne vous y méprenez pas, vos ennemies vous attendent. Vous avez pour objectifs de remporter les batailles ! Munissez vous de vos plus fidèles soldats et partez en guerre. Cette expérience en équipe de 4-5 joueurs vous propose de découvrir l'univers cartoonesque mais compétitif de notre nouvelle room. Qu'attendez-vous soldat ?
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <img src="../../../Assets/Images/Bouton/Bouton réserver.svg">
                    </div>
                </div>
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
            <a href="#">Nous contacter</a>
            <span><a href="#">Réservations</a></span>
            <span><a href="#">FAQ</a></span>
        </div>
        <div class="center">
            <a href="#"><img src="../../../Assets/Images/Icones/Vector.svg">THE SENSE, SAS. Tous droits réservés</a>
        </div>
        <div class="right">
            <div class="txt">
                <a href="#">Modalités</a>
                <span>|</span>
                <span><a href="#">Politique de confidentialité</a></span>
            </div>
            <div class="img">
                <span><a href="#"><img src="../../../Assets/Images/Icones/Youtube.svg"></a></span>
                <span><a href="#"><img src="../../../Assets/Images/Icones/Instagram.svg"></a></span>
                <span><a href="#"><img src="../../../Assets/Images/Icones/Twitter.svg"></a></span>
                <span><a href="#"><img src="../../../Assets/Images/Icones/Facebook.svg"></a></span>
            </div>
        </div>
    </footer>
    <!--JQuery-->
    <script src="../../jquery.js"></script>
    <!--JavaScript-->
    <script type="text/javascript" src="../script.js"></script>
</html>