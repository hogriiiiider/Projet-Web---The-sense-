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
    <link rel="stylesheet" href="style.css">
    <title>Dark Room 2 </title>
</head>
<body>
    
<div> <img class="BG" src="../../../Assets/Images/Design/Vector 78 (1).svg"></div>
    <div class="layout_1">
    <div class="nav-container">
            <div class="nav">
                <div class="nav-image">
                    <a href="Projet-Web---The-sense-\Pages\PHP\accueil\index.php"><img class="logo_the_sense" src="../../../Assets/Images/Icones/Logo_the_sense.svg" alt="logo the sense" /><a>
                </div>
                <div class="nava">
                    <div class="nav-droite">
                        <a href="../news/news.html">NEWS</a>
                        <a href="../lightroom/light_room.html">NOS EXPÉRIENCES</a>
                        <a href="../propos/à_propos.html">À PROPOS DE NOUS</a>
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
            <span><img class="battle_room" src="../../../Assets/Images/Icones/BATTLE ROOM.svg" alt="Logo_Dark_Room"></span>
            <span><img class="creative_room" src="../../../Assets/Images/Icones/CREATIVE en blanc.svg" alt="Logo_Battle_Room"></span>
            <span><img src="../../../Assets/Images/Icones/LIGHT ROOM en blanc.svg" alt="Logo_Creative_Room"></span>
        </div>
        
        <img class="light_room" src="../../../Assets/Images/Icones/DARK ROOM en blanc.svg" alt="Logo_Light_Room">
        <button class="discover-button"> Découvrir </button>
    </div>

    <div class="description_white">
        <button class="description-button-video-darkroom"><img class="description-video-triangle" src="../../../Assets/Images/Picture/Polygon 3.svg"></button>
        <div class="description-text">
            <div class="description-text2">
                <h1 class="description_color">QU'EST CE QUE <img class="logo-description" src="../../../Assets/Images/Icones/DARK ROOM en blanc (logo titre).svg" alt="logo secondaire the sense"> ?</h1>
            </div>
            <div class="description-explication">
                <p class="description_color">
                    Vous pensez ne pas avoir peur du noir ? Que rien ne pourra vous effrayer ? Vous avez tord.
                    Avec la DARK ROOM, 
                    toutes vos peurs deviendront réelles et en rien de temps, il ne 
                    vous restera plus que vos jambes pour vous enfuir. Vous vous penser suffisamment
                    fort pour affronter vos peurs ? Franchissez donc le seuil de la DARK ROOM. Vous avez
                    hâte d’y entrer mais dans le noir... Personne ne vous verra mourir.
                </p>
                <p class="color_info">
                    *Les expériences proposées dans cette salle ne conviennent pas à un public mineur ou sensible.
                </p>
            </div>

        </div>
    </div>

    <div class="description-experience">
        <img class="BG" src="../../../Assets/Images/Design/Vector 80 RED.svg">
        <div class="layout_2">
            <div class="experience">
                <button class="discover-retour"> RETOUR </button>  
                    <img class="dark_room_minia" src="../../../Assets/Images/Picture/Minia dark room 2.png" alt="miniature">    
            </div>
        </div>
    </div>

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
    <script type="text/javascript" src="script.js"></script>

</body>

</html>


<div>
    <img src="../../../Assets/Images/Picture/Minia dark room 2.png" alt="miniature">
</div>