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
                    <img class="logo_the_sense" src="../../../Assets/Images/Icones/Logo_the_sense.svg" alt="logo the sense" />
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
                <div class="connexion-box">
                    <h2>Connexion</h2>
                    <div class="form-group">
                        <label for="username">Identifiant</label>
                        <input type="text" id="username" placeholder="Pseudonyme">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" placeholder="Mot de passe">
                    </div>
                    <div class="footer">
                        <div class="account-options">
                            <a href="#">Créer un compte</a>
                            <a href="#" class="password-reset">Mot de passe oublié ?</a>
                        </div>
                        <button class="connexion-btn"><span>Connexion</span></button>
                    </div>
                </div>
            </div>
        </div>
        <h1>MON COMPTE</h1>
    </header>
<!--partie enregistrement-->
    <section>
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
                <form action="" method="post">
                    <p class="error">
                        <?php
                            if(isset($error)) echo $error;
                        ?>
                    </p>
                    <input type="text" name="username" id="name">
                </form>
                <form action="" method="post">
                    <p class="error">
                        <?php
                            if(isset($error)) echo $error;
                        ?>
                    </p>
                    <input type="mail" name="email" id="mail">
                </form>
                <form action="" method="post">
                    <p class="error">
                        <?php
                            if(isset($error)) echo $error;
                        ?>
                    </p>
                    <input type="password" name="password" id="newpassword">
                </form>
                <form action="" method="post">
                    <p class="error">
                        <?php
                            if(isset($error)) echo $error;
                        ?>
                    </p>
                    <input type="password" name="confirm_password" id="confirmpassword">
                </form>
            </div>
        </div>

        <div class="finSection1">
            <button>Valider</button>
        </div>
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
<script type="text/javascript" src="script.js"></script>
</html>