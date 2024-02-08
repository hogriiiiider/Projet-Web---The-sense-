<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Sense</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
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
                    <p class="wronguser">Mauvais identifiant ou mot de passe</p>
                    <div class="footer">
                        <div class="account-options">
                            <a href="Projet-Web---The-sense-\Pages\PHP\inscription\index.php">Créer un compte</a>
                            <a href="#" class="password-reset">Mot de passe oublié ?</a>
                        </div>
                        <button class="connexion-btn"><span>Connexion</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <br>
            <p class="acroche">QUAND LE VIRTUEL DEVIENT RÉEL</p>
        </div>
        <div>
            <a href="#description"><button class="button_anim discover-button">DÉCOUVRIR</button></a>
        </div>
        <div class="description" id="description">
            <img class="description-button-video" src="image/VIDEO.svg" alt="image pour la video" onclick="openVideo()">
            <div class="description-text">
                <div class="description-text2">
                    <h1>QU'EST CE QUE <img class="logo-description" src="image/SENSE.svg" alt="logo secondaire the sense"> ?</h1>
                </div>
                <div class="description-explication">
                    <p>
                        Préparez-vous pour une expérience unique qui vous emmenera dans un autre univers.
                        Vivez vos émotions comme vous ne l’avez jamais fait auparavant. Avec THE SENSE
                        explorez d’autres dimensions et vivez l’impossible en interragissant avec un
                        environnement dynamique et virtuel. Ce n’est pas une expérience en réalité virtuelle
                        que vous vivez, c’est la réalité.
                    </p>
                </div>
                <div class="description-redirection">
                    <div class="description-text3">
                        <a href="../propos/à_propos.html">
                            DÉCOUVREZ THE SENSE 
                        </a>
                        <a href="../propos/à_propos.html"><img class="description-arrow" src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                    </div>
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
            <h1>LA RÉALITÉ À PORTÉE DE MAINS</h1>
            <p>Vous rêvez de voyager, de frissoner ou tout simplement de vivre une expérience unique ? Explorez nos univers entre amis ou en famille et franchissez la frontière de la réalité. Plusieurs dimensions s’offrent à vous, vous donnant accès à de nombreuses expériences. </p>
        </div>
        <div class="les-experience">
            <h1>NOS EXPÉRIENCES LES PLUS APPRÉCIÉES</h1>

            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/image 44.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-shangri-title">
                        <h1>SHANGRI-LA : LA CITÉ PERDUE DE Z</h1>
                        <img src="image/LIGHT ROOM (1).svg" alt="light room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Shangri-La la cité mythique, symbole de paix, de prospérité et de magnificence. Personne n'a apparemment pu se rendre en ce lieu
                            depuis des décennies ou prouver son existence, du moins depuis votre découverte ! Aventurez-vous au plus profond des légendes,
                            entrez dans la cité de Z avec votre équipe et explorez les lieux à la recherche de Percy Fawcett.
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../lightroom/light_room.html"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../lightroom/light_room.html">DÉCOUVREZ LA LIGHT ROOM</a>
                            <a class="description-arrow-2" href="../lightroom/light_room.html"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/image-2.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-conjuring-title">
                        <h1>THE CONJURING EXPERIENCE</h1>
                        <img src="image/DARK ROOM.svg" alt="dark room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p class="conjuring">Expérience interdite aux -18</p>
                        <p>
                            Revivez l'histoire d'un chef d'oeuvre cinématographique au travers d’une expérience aussi bien réaliste qu'immersive. Rassemblez
                            ce qu'il vous reste de courage, les inspecteurs Ed et Loren Warren ont besoin de vous. Un malheur hante la maison de ces
                            derniers et vous ne pouvez vous en échapper sans sacrifices. Serez-vous à la hauteur de ce qui vous attend ? Bonne chance,
                            vous en aurez besoin !
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../darkroom/dark_room.html"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../darkroom/dark_room.html">DÉCOUVREZ LA DARK ROOM</a>
                            <a class="description-arrow-2" href="../darkroom/dark_room.html"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/image-3.jpg" alt="Shangri">
                <div class="les-experience-shangri">
                    <div class="les-experience-battle-title">
                        <h1>ULTIMATE FIGHT</h1>
                        <img src="image/BATTLE ROOM.svg" alt="battle room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Sentez votre cœur battre, votre souffle se couper, votre concentration monter... Enrôlez des joueurs, formez votre équipe et
                            préparez vous au combat ! Arrachez la victoire à vos adversaires à travers une bataille dans des décors et des "maps" des
                            plus immersives. En équipe de 4 ou 5 voyez lesquels d’entre vous sont digne de remporter le trophée.
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../battleroom/battle_room.html"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../battleroom/battle_room.html">DÉCOUVREZ LA BATTLE ROOM</a>
                            <a class="description-arrow-2" href="../battleroom/battle_room.html"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="les-experience-image-shangri">
                <img class="img-shangri" src="image/Frame-1.svg" alt="CREATIVE ROOM IMAGE">
                <div class="les-experience-shangri">
                    <div class="les-experience-shangri-title">
                        <h1>CRÉEZ VOTRE PROPRE EXPÉRIENCE</h1>
                        <img src="image/CREATIVE ROOM.svg" alt="creative room">
                    </div>
                    <div class="les-experience-shangri-texte">
                        <p>
                            Vous en avez marre des expériences répétitives ! Vous êtes à la recherche d'une toute nouvelle expérience en réalité virtuelle ? Alors venez créer votre propre expérience avec notre tout nouveau système de création virtuelle ! Vous nous exposez votre idée et votre univers et nous le mettons en oeuvre rien que pour vous ! N'attendez plus, c'est désormais votre création, votre univers, votre expérience, votre SENSE !
                        </p>
                    </div>
                    <div class="les-experience-reservation-shangri">
                        <a href="../creativeroom/creative_room.html"><img src="../../../Assets/Images/Bouton/Bouton réserver.svg"></a>
                        <div class="lightroom">
                            <a class="text-lightroom" href="../creativeroom/creative_room.html">DÉCOUVREZ LA CREATIVE ROOM</a>
                            <a class="description-arrow-2" href="../creativeroom/creative_room.html"><img src="image/iconfinder_Arrows_thin_arrow_direction_right_6578850 1.svg" alt="flèche"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="reservation">
            <div class="reservation-img">
                <img class="img-reserver-style" src="image/RESERVER (1).svg" alt="reserver">
                <p class="reserver-accroche">N’ATTENDEZ PLUS, RÉSERVEZ</p>
                <img class="img-reserver-style-2" src="image/NOS TARIFS.svg" alt="nos tarifs">
                <div>
                    <img src="image/Rectangle 192.svg" alt="rectangle">
                </div>
                <p class="text-reservation">Voir les tarifs pour </p>
                <div class="paranthese-reservation">
                    <p>(max 8 joueurs)</p>
                </div>
                <div class="nb-personne">
                    <img src="image/Rectangle 193.svg" alt="moins" onclick="less()">
                    <p>
                        <span class="number-people">1</span>
                    </p>
                    <img src="image/Union (1).svg" alt="plus" onclick="add()">
                </div>
                <div class="reservation-prix">
                    <div class="lightroom-prix">
                        <img src="image/LIGHT ROOM-logo.svg" alt="LIGHT ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                    <div class="darkroom-prix">
                        <img src="image/DARK ROOM-logo.svg" alt="DARK ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
                    <div class="battleroom-prix">
                        <img src="image/BATTLE-ROOM.svg" alt="BATTLE ROOM">
                        <p>
                            DE 10H À 18H : <span class="room-price" data-initial-price="50">50</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                        <p>
                            DE 18H À 21H : <span class="room-price-2" data-initial-price="65">65</span>€ /<span class="rouge">PERSONNE</span> 
                        </p>
                    </div>
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


        <div class="planning">
            <div class="planning-date" id="week-range">
                <img src="image/Layer 2.svg" alt="flèche mois précedent" id="prev-week">
                <p>
                    DU <span id="start-day">15</span> AU <span id="end-day">20</span> <span id="end-month">DÉCEMBRE</span>
                </p>
                <img src="image/Layer 3.svg" alt="flèche mois suivant" id="next-week">
            </div> 

            <div class="day" id="days-container"></div>

            <div class="disponibilite">
                <img src="image/LÉGENDE.svg" alt="disponibilité">
            </div>
        </div>

        <div class="news">
            <h1>LES NEWS DU MOIS</h1>
            <div class="news-part">
                <div class="news-item">
                    <img src="image/image 135.svg" alt="-image-news-1">
                    <div class="text">
                        <h2>ÉVÉNEMENT : LA CHASSE À L’OEUF</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div class="news-item">
                    <img src="image/image 138.svg" alt="image-news-2">
                    <div class="text">
                        <h2>UN NOUVEL ÉQUIPEMENT ARRIVE !</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="journaux">
            <h1>QU’EST CE QUI VOUS RETIENT ?</h1>
            <div class="journaux-section">
                <div class="arrows">
                    <img onclick="previous()" src="image/Cercle 1.svg" alt="flèche précedante">
                    <img onclick="next()" src="image/Cercle 2.svg" alt="flèche suivante">
                </div>
                <div class="slider-content">
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                    <div class="slider-content-item">
                        <img src="image/image-126.svg" alt="logo journal">
                        <p>"C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance
                            de cinéma du week-end"</p>
                    </div>
                    <div class="slider-content-item">
                        <img src="image/image-125.svg" alt="logo journal">
                        <p>"Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe.
                            Quant à l’expérience, rien à dire, c’est une expérience unique au monde” </p>
                    </div>
                </div>
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
        <div class="faq-container">
            <div class="FAQ-title"><h2>Foire aux questions</h2></div>
            <div class="faq-item">
                <div class="question">
                    <span class="toggle-icon">
                        <img src="image/plus.svg" alt="Plus"/>
                    </span> 
                    Qu'est ce que The SENSE ?
                </div>
                <div class="answer">
                    The SENSE est une immersion poussée grâce à la réalité virtuelle. The SENSE propose de nombreuses expériences
                    à faire entre amis ou avec la famille. Vous pouvez tout à fait favoriser une expérience avec de l’action comme notre 
                    Dark Room basé sur l’horreur. Ou encore, si vous le souhaiter par exemple, vous pouvez favoriser l’aspect compétitif 
                    en participant aux expériences de notre Battle Room. De plus, The SENSE propose un système de création d’expérience où les clients peuvent à leurs tours imaginer et créer la meilleure expériences possibles. 
                </div>
            </div>

            <div class="faq-item">
                <div class="question"><span class="toggle-icon">
                    <img src="image/plus.svg" alt="Plus">
                </span>
                 Il y a t'il un âge et taille minimum pour participer à une expérience The SENSE ? 
                </div>
                <div class="answer">oui</div>
            </div>
        
        <div class="faq-item">
            <div class="question">
            <span class="toggle-icon">
            <img src="image/plus.svg" alt="Plus"/>
            </span> 
                 Quels est le nombre maximum de partcipant pour jouer ?
                </div>
                <div class="answer">
                8
             </div>
        </div>
                <div class="faq-item">
                    <div class="question"><span class="toggle-icon">
                        <img src="image/plus.svg" alt="Plus">
                    </span>
                     Avec vous une politique d'annulation et de remboursement ? Si oui, comment se déroule t-elle ?
                    </div>
                    <div class="answer">non on rembourse pas</div>
                </div>
                <div class="faq-item">
                    <div class="question"><span class="toggle-icon">
                        <img src="image/plus.svg" alt="Plus">
                    </span>
                     Est-il possible de déposer mes affaires "encombrants" avant de faire une expérience ? Puis-je garder mes lunettes ?
                    </div>
                    <div class="answer">non </div>
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
