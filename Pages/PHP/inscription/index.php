<?php

    session_start();

    $dsn = 'mysql:host=mysql-the-sense.alwaysdata.net;dbname=the-sense_bdd;charset=utf8';
    $user = 'the-sense';
    $password = 'the-sense-dr01te';
    $pdo = new PDO($dsn, $user, $password);

    if(isset($_POST['button'])){
        // Vérification si tous les champs sont remplis
        if(isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) &&
           $_POST['email'] != "" && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['confirm_password'] != ""){

            // Vérification si les deux mots de passe correspondent
            if($_POST['password'] == $_POST['confirm_password']){
                // Récupération des valeurs du formulaire
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];


                // Connexion à la base de données (remplacez ces valeurs par les vôtres)
                

                // Vérification si le nom d'utilisateur existe déjà
                $query_check_username = "SELECT * FROM `USERS` WHERE `name` = :USERNAME";
                $stmt_check_username = $pdo->prepare($query_check_username);
                $stmt_check_username->bindParam(':USERNAME', $username);
                $stmt_check_username->execute();

                if($stmt_check_username->rowCount() == 0){
                    // Nom d'utilisateur disponible, procéder à l'insertion dans la base de données
                    $query = "INSERT INTO `USERS` (`mail`, `name`, `password`) VALUES (:MAIL, :USERNAME, :MDP)";
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(':MAIL', $email);
                    $stmt->bindParam(':USERNAME', $username);
                    $stmt->bindParam(':MDP', $password);
                    $stmt->execute();

                    // Redirection vers login.php après l'enregistrement
                    header("Location: acceuil/index.php");
                    exit();
                } else {
                    // Nom d'utilisateur déjà pris, afficher un message d'erreur
                    $error = "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
                }
            } else {
                // Les mots de passe ne correspondent pas, afficher un message d'erreur
                $error = "Les mots de passe ne correspondent pas.";
            }
        } else {
            // Si tous les champs ne sont pas remplis, afficher un message d'erreur
            $error = "Veuillez remplir tous les champs.";
        }
    }

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
    <title>register</title>
</head>
<body>
    <header>
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
        
        <h1>MON COMPTE</h1>
    </header>
<!--partie enregistrement-->
    <section>
        <form action="#" method="POST">
            <div class="title">
                <h2>Créer un compte</h2>
            </div>
            <div id="register">
                <div class="text">
                    <h3>Nom prénom</h3>
                    <h3>Adresse mail</h3>
                    <h3>Mot de passe</h3>
                    <h3>Confirmer le mot de passe</h3>
                </div>
                <div class="input">
                    <p class="error">
                        <?php if(isset($error)) echo $error; ?>
                    </p>
                    <input type="text" name="username" id="name">
                    <input type="email" name="email" id="mail">
                    <input type="password" name="password" id="newpassword">
                    <input type="password" name="confirm_password" id="confirmpassword">
                </div>
            </div>
            <div class="finSection1">
                <button name="button" type="submit">Valider</button>
            </div>
        </form>
    </section>
    <div class="finSection2">
        <input type="checkbox"> se désabonner de la news letter
    </div>
<!--partie contact-->
   
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