carroussel_bg = ["../../../Assets/Images/Picture/Rectangle 94.svg",
                "../../../Assets/Images/Picture/image 127.svg",
                "../../../Assets/Images/Picture/image 128.svg",
                "../../../Assets/Images/Picture/image 129.svg",
                "../../../Assets/Images/Picture/image 130.svg"]

carroussel_txt = ["“C’est dingue, j’ai vraiment eu l’impression d’être transporté dans un autre monde.Avant je ne faisais pas d’expérience VR car je ne croyais pas en la qualité mais grâce à The Sense,j’ai pu traverser la frontière du réel.” <br>- Denise, 23 Octobre 2020 - ",
                "“Avec mes fils nous avons tenté l’expérience “NAMELESS”, moi qui pensais avoir tout vu dans le domaine de l’horreur, je ne me suis jamais autant trompé. Si vous êtes à la recherche de sensation forte et de frissons, la DARK ROOM est faite pour vous” <br>- Nicolas, 3 Septembre 2020 -",
                "NOUVELLE ROOM EN VUE ! <br>En 2021, préparez à manger du slime en pleine face, les fantômes de Ghost Buster arrivent chez THE SENSE. Ça promet de belles parties de chasse aux fantômes dans tout le complexe. Les réservations sont d’ores et déjà possible sur place et en Février sur internet.",
                "LES ÉQUIPEMENTS THE SENSE <br>Tous nos équipements sont prévus pour toutes les tailles et tous les âges, ils conviennent aussi bien aux adultes qu’aux jeunes de 12 ans. Ils vous garantissent également un confort à toutes épreuves lors de vos voyages chez nous.",
                "“C’est dingue, j’ai vraiment eu l’impression d’être transporté dans un autre monde. Avant je ne faisais pas d’expérience VR car je ne croyais pas en la qualité mais grâce à The Sense, j’ai pu traverser la frontière du réel.” <br>- Denise, 23 Octobre 2020 - "]

var rect_num = ['rect1', 'rect2', 'rect3', 'rect4', 'rect5'];


rect_color = ["../../../Assets/Images/Picture/Rectangle 128.svg",
            "../../../Assets/Images/Picture/Rectangle 129.svg"]

img = 0
document.getElementById("img_carroussel").src = carroussel_bg[img];
document.getElementById("txt_carroussel").innerHTML = carroussel_txt[img];
document.getElementById(rect_num[img]).src = rect_color[1];

$("#precedent").on("click",function(){
    document.getElementById(rect_num[img]).src = rect_color[0];
    img = img - 1
    if (img < 0) {
        img = 4
    }
    document.getElementById("img_carroussel").src = carroussel_bg[img];
    document.getElementById("txt_carroussel").innerHTML = carroussel_txt[img];
    document.getElementById(rect_num[img]).src = rect_color[1];
})

$("#suivant").on("click",function(){
    document.getElementById(rect_num[img]).src = rect_color[0];
    img = img + 1
    if (img > 4) {
        img = 0
    }
    document.getElementById("img_carroussel").src = carroussel_bg[img];
    document.getElementById("txt_carroussel").innerHTML = carroussel_txt[img];
    document.getElementById(rect_num[img]).src = rect_color[1];
})


//CONNEXION
document.addEventListener('DOMContentLoaded', function() {
    var connexionBox = document.querySelector('.connexion-box');
    var openButton = document.getElementById('CONNECT');
    connexionBox.style.display = 'none';
    openButton.addEventListener('click', function() {
        connexionBox.style.display = 'block';
    });
    window.addEventListener('click', function(event) {
        if (!connexionBox.contains(event.target) && event.target !== openButton) {
            connexionBox.style.display = 'none';
        }
    });
});

//VIDEO

function openVideo() {
    document.getElementById("overlayVideo").style.display = "flex";
}

function closeVideo() {
    document.getElementById("overlayVideo").style.display = "none";
}

//VIDEO