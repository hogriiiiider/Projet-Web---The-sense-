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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Sense</title>
        <link rel="stylesheet" href="style.css">
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
        
        <img id="en_tete" src="../../../Assets/Images/Picture/THE SENSE A PROPOS.svg">
        <div>
            <a href="#description"><button class="button_anim discover-button">DÉCOUVRIR</button></a>
        </div>
        <div class="description" id="description">
            <img class="description-button-video" src="../../../Assets/Images/Picture/VIDEO A PROPOS.svg" alt="image pour la video">
            <div class="description-text">
                <div class="description-text2">
                    <h1>THE SENSE, UNE IDÉE NOVATRICE</h1>
                </div>
                <div class="description-explication">
                    <p>
                        The Sense est né d’un projet d’école de quatre étudiants en école de commerce. 
                        Se basant sur une idée originaire des États-Unis, 
                        les quatre amis décidèrent d’adapter ce concept inédit au marché français en y ajoutant leurs idées novatrices. 
                        Mélant deux activités attractives, la Réalité Virtuel et les Escape Game, 
                        THE SENSE joint le meilleur des deux mondes pour vous proposer des expériences inédites et époustouflantes. 
                        N’hésitez plus et franchisser la frontière du réel.
                    </p>
                </div>
            </div>
        </div>
        <div class="presentation">
            <h1>QUI SOMMES-NOUS ?</h1>
            <p>
                The Sense est une société formée par quatre étudiants en école de commerce qui détiennent la majorité des parts. 
                Le restant étant la propriété de DreamAway, entreprise française spécialiste du milieu de la VR.
            </p>
        </div>
        <div class="createur" >
            <img src="../../../Assets/Images/Picture/NOUS A PROPOS.svg" alt="image des createurs">
        </div>
        <div class="localisation">
            <h1>OU NOUS RETROUVER</h1>
            <p>
                The Sense se trouve, pour le moment, exclusivement à Lyon (France) dans le 3ème arrondissement. 
                Pour nous rejoindre, il suffit de prendre la ligne T2 du Tram arrêt Rue de l’Université 
                ou bien prendre le Métro B station Jecéplus (100m à pied).
            </p>
        </div>
        <div class="localisation_img">
            <img src="../../../Assets/Images/Picture/CARTE A PROPOS.svg">
            <span><img src="../../../Assets/Images/Picture/HORAIRES A PROPOS.svg"></span>
        </div>

        <div class="contact-section">
            <h1>NOUS CONTACTER</h1>
            <form>
                <div class="input-group">
                    <div class="better-input">
                        <input type="text" id="nom" placeholder="Votre nom">

                            <input type="text" id="prenom" placeholder="Votre prénom">

                    </div>
                    <input type="email" id="email" placeholder="Votre adresse email">
                </div>
                <textarea id="message" placeholder="Votre message/avis"></textarea>
                <button class="send-btn" onclick="afficherEmail()">Envoyer</button>
            </form>
            <p id="text">ou <br> par téléphone au :</p>
            <p id="num">01 23 45 67 89</p>
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