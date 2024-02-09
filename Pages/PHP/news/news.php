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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
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
        
        <h1>LES NEWS</h1>
    </header>

    <section class="top-page">
        <h2>SUIVEZ TOUTE L'ACTUALITÉ DE THE SENSE</h2>
        <p>
            Nous souhaitons vous offrir toujours plus d'expériences immersive, c'est pourquoinous avons à coeur de
            <br>vous proposer de plus en plus de nouvelles aventures. Toute l'année, The Sense vous invite à rejoindre des
            <br>rooms évenements et à découvrir celles qui arriveront plus tard.
        </p>
        <div class="info-container">
            <img src="../../../Assets/Images/Picture/image 141.svg " alt="noel">
            <div class="info-box-text">
                <div class="info-titre">
                    <h2 id="title-middle">ÉVENEMENT : LA LÉGENDE DU PÈRE NOËL</h2>
                </div>
                <div class="info-text">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ab non quia consequatur consequuntur provident quidem pariatur maiores esse voluptas repudiandae laudantium, obcaecati aperiam et cumque saepe inventore. Voluptas modi facilis explicabo qui libero temporibus molestias aspernatur deleniti adipisci perspiciatis reprehenderit repudiandae aperiam exercitationem animi, nihil amet distinctio eveniet. Cumque nihil aperiam similique, inventore in rem modi magnam repellendus quo laudantium quis unde nesciunt vel, ipsum aliquid qui autem libero!
                    </p>
                </div>
            </div>
        </div>

    </section>

    <section class="mid-page">
        <div class="info-container">
            <img src="images/image_135.svg" alt="noel" id="mid-box-img">
            <div class="info-box-text" id="mid-box">
                <div class="info-titre">
                    <h2>ÉVÉNEMENT : LA CHASSE A L'OEUF</h2>
                </div>
                <div class="info-text">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ab non quia consequatur consequuntur provident quidem pariatur maiores esse voluptas repudiandae laudantium, obcaecati aperiam et cumque saepe inventore. Voluptas modi facilis explicabo qui libero temporibus molestias aspernatur deleniti adipisci perspiciatis reprehenderit repudiandae aperiam exercitationem animi, nihil amet distinctio eveniet. Cumque nihil aperiam similique, inventore in rem modi magnam repellendus quo laudantium quis unde nesciunt vel, ipsum aliquid qui autem libero!
                    </p>
                </div>
            </div>
        </div>
        <div class="info-container">
            <img src="images/image_138.svg" alt="noel" id="mid-box-img">
            <div class="info-box-text" id="mid-box">
                <div class="info-titre">
                    <h2>ÉVÉNEMENT : UN NOUVEL ÉQUIPEMENT ARRIVE !</h2>
                </div>
                <div class="info-text">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ab non quia consequatur consequuntur provident quidem pariatur maiores esse voluptas repudiandae laudantium, obcaecati aperiam et cumque saepe inventore. Voluptas modi facilis explicabo qui libero temporibus molestias aspernatur deleniti adipisci perspiciatis reprehenderit repudiandae aperiam exercitationem animi, nihil amet distinctio eveniet. Cumque nihil aperiam similique, inventore in rem modi magnam repellendus quo laudantium quis unde nesciunt vel, ipsum aliquid qui autem libero!
                    </p>
                </div>
            </div>
        </div>
        
    </section>

    <section class="bottom-page">
        <div class="info-container">
            <img src="../../../Assets/Images/Picture/image 144.svg" alt="noel">
            <div class="info-box-text">
                <div class="info-titre">
                    <h2 id="title-middle">ÉVENEMENT : LE MYSTÈRE DU LOUP PHARAON</h2>
                </div>
                <div class="info-text">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione ab non quia consequatur consequuntur provident quidem pariatur maiores esse voluptas repudiandae laudantium, obcaecati aperiam et cumque saepe inventore. Voluptas modi facilis explicabo qui libero temporibus molestias aspernatur deleniti adipisci perspiciatis reprehenderit repudiandae aperiam exercitationem animi, nihil amet distinctio eveniet. Cumque nihil aperiam similique, inventore in rem modi magnam repellendus quo laudantium quis unde nesciunt vel, ipsum aliquid qui autem libero!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="nav-caroussel">
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
    </section>
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