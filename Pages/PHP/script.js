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

function afficherEmail(Message) {
    var Message = document.getElementById("message").value;
    var mail = 'trosselet@gaming.tech'
    let mailto = `mailto:${mail}?subject=Écrivez le sujet de votre mail&body=${Message}`
    location.href = mailto
}

//Connexion
$(".wronguser").hide();

$(".connexion-btn").on("click", function () {
    if ($('#CONNECT').val() == 'CONNEXION'){
        var _username = $('#username').val();
        var _password = $("#password").val();
        if (_username.length > 0 && _username.includes('@') && _password.length > 0){


            $.post("connexion.php", {mail: _username, password: _password}, function(data, textStatus) {
                console.log(data);
                if(data != 'reset'){
                    $(".connexion-box").hide();
                    $('#CONNECT').val(data);
                }
                else{;
                    $("#username").val("");
                    $("#password").val("");
                    $(".wronguser").show();
                }
            });
        }
        
        else{
            $("#username").val("");
            $("#password").val("");
            $(".wronguser").show();
            stop()
        }
    }
    else{
        stop()
    }
})

function openVideo() {
    document.getElementById("overlayVideo").style.display = "flex";
}

function closeVideo() {
    document.getElementById("overlayVideo").style.display = "none";
}

// PLANNING
document.addEventListener('DOMContentLoaded', function () {
    const daysContainer = document.getElementById('days-container');
    const weekRange = document.getElementById('week-range');
    const startDaySpan = document.getElementById('start-day');
    const endDaySpan = document.getElementById('end-day');
    const endMonthSpan = document.getElementById('end-month');
    const prevWeekBtn = document.getElementById('prev-week');
    const nextWeekBtn = document.getElementById('next-week');
    const numberOfColumns = 2;

    let currentDay = 0;

    function updateWeek() {
        const today = new Date();
        today.setDate(today.getDate() + currentDay);
        let startDay = new Date(today);
        let endDay = new Date(today);
        endDay.setDate(startDay.getDate() + numberOfColumns - 1);

        startDaySpan.textContent = startDay.getDate();
        endDaySpan.textContent = endDay.getDate();
        endMonthSpan.textContent = endDay.toLocaleDateString('fr-FR', { month: 'short' });

        daysContainer.innerHTML = '';

        for (let i = 0; i < numberOfColumns; i++) {
            const nextDay = new Date(startDay);
            nextDay.setDate(startDay.getDate() + i);

            const dayElement = document.createElement('div');
            dayElement.classList.add('column');

            const dayDate = document.createElement('a');
            dayDate.classList.add('date');

            if (i === 0) {
                dayElement.classList.add('aujourdhui');
                dayDate.textContent = startDay.toLocaleDateString('fr-FR', { weekday: 'long', day: 'numeric', month: 'short' });
            } else {
                dayDate.textContent = nextDay.toLocaleDateString('fr-FR', { weekday: 'long' }) + ' ' + nextDay.getDate() + ' ' + nextDay.toLocaleDateString('fr-FR', { month: 'short' });
            }

            dayElement.appendChild(dayDate);

            const timeSlots = ['10h20', '11h50', '13h20', '14h50', '16h20', '17h50', '19h20', '20h50'];

            if (nextDay.getDay() === 5 || nextDay.getDay() === 6) {
                timeSlots.push('22h20', '23h50');
            } else {
                timeSlots.push('-', '-');
            }

            for (const timeSlotText of timeSlots) {
                const timeSlot = document.createElement('p');
                timeSlot.textContent = timeSlotText;
                dayElement.appendChild(timeSlot);
            }

            daysContainer.appendChild(dayElement);

            if (i < numberOfColumns - 1) {
                const separator = document.createElement('div');
                separator.classList.add('separator');
                daysContainer.appendChild(separator);
            }
        }
    }

    prevWeekBtn.addEventListener('click', function () {
        currentDay -= 2;
        updateWeek();
    });

    nextWeekBtn.addEventListener('click', function () {
        currentDay += 2;
        updateWeek();
    });

    updateWeek();

    const timeSlots = document.querySelectorAll('.column p:not(.date)');

    timeSlots.forEach(timeSlot => {
        timeSlot.addEventListener('click', function () {

            const selectedDate = this.parentElement.querySelector('.date').textContent;

            const selectedTime = this.textContent;

            document.getElementById('selected-date').textContent = selectedDate;
            document.getElementById('selected-time').textContent = 'À ' + selectedTime;
        });
    });
});

// PLANNING

document.getElementById('player-count').addEventListener('change', function() {
    const playerCount = parseInt(this.value);
    const selectedTimeText = document.getElementById('selected-time').textContent;
   
    const selectedHour = parseInt(selectedTimeText.match(/\d+/)[0]);
    const isDayTime = selectedHour >= 10 && selectedHour < 18;
    const initialPrice = isDayTime ? 50 : 65;

    let totalPrice = initialPrice;


    if (playerCount > 1) {
        totalPrice = ((initialPrice / playerCount) + 15) * playerCount;
    }

    document.getElementById('total-price').textContent = `${totalPrice.toFixed(2)} €`;
});

//RESERVATION

$("#reserv_1").on("click",function(){
    document.getElementById("reserv_img").src = "../../../Assets/Images/Picture/CONJURING RESERV.svg"
})

$("#reserv_2").on("click",function(){
    document.getElementById("reserv_img").src = "../../../Assets/Images/Picture/CONJURING RESERV.svg"
})

function open_reserv(){
    const reservation = document.querySelector('.reservation');
    const page = document.querySelector('.page');
    const carroussel = document.querySelector('.carroussel');
    reservation.style.display = 'block'
    page.style.display = 'none'
    carroussel.style.display = 'none'
}

function close_reserv(){
    const reservation = document.querySelector('.reservation');
    const page = document.querySelector('.page');
    const carroussel = document.querySelector('.carroussel');
    reservation.style.display = 'none'
    page.style.display = 'block'
    carroussel.style.display = 'flex'
}
//RESERVATION

$(".wronguser").hide();

$(".connexion-btn").on("click", function () {
    var _name = $('#name').val();
    var _mail = $('#mail').val();
    var _password = $("#newpassword").val();
    var _confirmpassword = $('#confirmpassword')

    if (_password == _confirmpassword){
        if (_mail.length > 0 && _mail.includes('@') && _password.length > 0 && _name.length > 0){

            $.post("inscription.php", {mail: _mail, password: _password, name: _name}, function(data, textStatus) {
                console.log(data);
                if(data == 'user'){

                }
                else{;
                    $('#name').val("")
                    $("#mail").val("");
                    $("#newpassword").val("");
                    $("#confirmpassword").val("");
                }
            });
        }

        else{
            $("#username").val("");
            $("#password").val("");
            $(".wronguser").show();
            stop()
        }
    }else{
        stop()
    }
})

//CHOIX SCENE

const creatImageRoom = document.querySelector('.CREAT-IMAGE-ROOM img');
const choiceN1 = document.querySelector('.choice-n1');
creatImageRoom.addEventListener('click', function() {
    creatImageRoom.style.display = 'none';
    choiceN1.style.display = 'block';
});
//CHOIX SCENE

//CHOIX SCENE 2

const darkroomChoice = document.querySelector('.darkroom-choice');
const darkroomChoice2 = document.querySelector('.darkroom-choice-2');
const choiceN2 = document.querySelector('.choice-n2');
const choice1st = document.querySelector('.choice-1st');


function handleDarkroomChoiceClick(event) {

    const clickedText = event.target.textContent.trim();
    choiceN1.style.display = 'none';
    choiceN2.style.display = 'block';
    choice1st.textContent = `- ${clickedText}`;

}

darkroomChoice.querySelectorAll('p').forEach(paragraph => {
    paragraph.addEventListener('click', handleDarkroomChoiceClick);
});

//CHOIX SCENE 2

//CHOIX SCENE 3

const choiceN3 = document.querySelector('.choice-n3');
const modify1st = document.querySelector('.modify-1st');
const modify2nd = document.querySelector('.modify-2nd');

function showChoiceN1() {
    choiceN1.style.display = 'block';
    choiceN2.style.display = 'none';
    choiceN3.style.display = 'none';
}
function showChoiceN2() {
    choiceN1.style.display = 'none';
    choiceN2.style.display = 'block';
    choiceN3.style.display = 'none';
}
modify1st.addEventListener('click', showChoiceN1);
modify2nd.addEventListener('click', showChoiceN2);

//CHOIX 1

function showChoiceN1WithText(text) {
    choiceN1.style.display = 'none';
    choiceN2.style.display = 'block';

    // Modifier le texte de choice-1st
    const choice1stSpan = document.querySelector('.choice-1st');
    choice1stSpan.textContent = `- ${text}`;
}

function showEscapeGame() {
    showChoiceN1WithText('ESCAPE GAME');
}

function showBattle() {
    showChoiceN1WithText('BATTLE');
}

function showSurvival() {
    showChoiceN1WithText('SURVIVAL');
}

document.getElementById('e1').addEventListener('click', showEscapeGame);
document.getElementById('e2').addEventListener('click', showBattle);
document.getElementById('e3').addEventListener('click', showSurvival);

//CHOIX 1
//CHOIX 2

function showChoiceN2WithText(text) {
    choiceN2.style.display = 'none';
    choiceN3.style.display = 'block';

    // Modifier le texte de choice-2st
    const choice2ndSpan = document.querySelector('.choice-2nd');
    choice2ndSpan.textContent = `- ${text}`;
}

function showCimetiere() {
    showChoiceN2WithText('CIMETIÈRE');
}

function showMaison() {
    showChoiceN2WithText('MAISON');
}

function showEcole() {
    showChoiceN2WithText('ÉCOLE');
}

document.getElementById('f1').addEventListener('click', showCimetiere);
document.getElementById('f2').addEventListener('click', showMaison);
document.getElementById('f3').addEventListener('click', showEcole);

//CHOIX 2

//CHOIX SCENE 3

function less() {

    const nbPeopleElement = document.querySelector('.number-people');
    let currentNbPeople = parseInt(nbPeopleElement.textContent);
    currentNbPeople = Math.max(currentNbPeople - 1, 1);
    nbPeopleElement.textContent = currentNbPeople;

  
    updateRoomPrice('.room-price', currentNbPeople, false);


    updateRoomPrice('.room-price-2', currentNbPeople, false);
}

function add() {
    const nbPeopleElement = document.querySelector('.number-people');
    let currentNbPeople = parseInt(nbPeopleElement.textContent);
    currentNbPeople = Math.min(currentNbPeople + 1, 8);
    nbPeopleElement.textContent = currentNbPeople;


    updateRoomPrice('.room-price', currentNbPeople, true);


    updateRoomPrice('.room-price-2', currentNbPeople, true);
}

function updateRoomPrice(className, currentNbPeople, isAddOperation) {
    // Assuming the initial room price is stored in the data attribute "data-initial-price"
    const initialPrices = document.querySelectorAll(className);
    initialPrices.forEach((priceElement) => {
        const initialPrice = parseFloat(priceElement.dataset.initialPrice);
        let newPrice;

        if (isAddOperation) {
            // If it's an "add" operation, use the original formula
            newPrice = (initialPrice / currentNbPeople) + 15;
        } else {
            if (currentNbPeople >= 2){
                newPrice = (initialPrice / currentNbPeople) + 15;
            } else {
                newPrice = (initialPrice / currentNbPeople)
            }
        }

        priceElement.textContent = newPrice.toFixed(2);
    });
}

function rect(){
    const sliderContent = document.querySelector('.slider-content');
    const widthSlider = sliderContent.offsetWidth;
    const rectSlide1 = document.querySelector('.rect-news');
    const rectSlide2 = document.querySelector('.rect-news2');
    const rectSlide3 = document.querySelector('.rect-news3');
    const rectSlide4 = document.querySelector('.rect-news4');
    const rectSlide5 = document.querySelector('.rect-news5');
    const rectSlide6 = document.querySelector('.rect-news6');

    if(sliderContent.scrollLeft == 0){
        rectSlide1.style.background = '#C4C4C4'
        rectSlide2.style.background = '#1BDCC5'
    } else if(sliderContent.scrollLeft == 800){
        rectSlide3.style.background = '#1BDCC5'
        rectSlide1.style.background = '#C4C4C4'
        rectSlide2.style.background = '#C4C4C4'
    } else if(sliderContent.scrollLeft == 1600){
        rectSlide4.style.background = '#1BDCC5'
        rectSlide3.style.background = '#C4C4C4'
    } else if(sliderContent.scrollLeft == 2400){
        rectSlide5.style.background = '#1BDCC5'
        rectSlide4.style.background = '#C4C4C4'
    }  else if(sliderContent.scrollLeft == 3200){
        rectSlide6.style.background = '#1BDCC5'
        rectSlide5.style.background = '#C4C4C4'
    } else if(sliderContent.scrollLeft == 4000){
        rectSlide1.style.background = '#1BDCC5'
        rectSlide6.style.background = '#C4C4C4'
    };
};

function previous() {
    const sliderContent = document.querySelector('.slider-content');
    const widthSlider = sliderContent.offsetWidth;
    const scrollLeft = sliderContent.scrollLeft;
    sliderContent.scrollLeft -= widthSlider;  

    if(scrollLeft == 0){
        sliderContent.scrollLeft = 4000;
    };
    rect();
};

function next() {
    const sliderContent = document.querySelector('.slider-content');
    const widthSlider = sliderContent.offsetWidth;
    const scrollLeft = sliderContent.scrollLeft;
    sliderContent.scrollLeft += widthSlider;  
    const itemSlider = sliderContent.querySelectorAll('.slider-content-item');

    if(scrollLeft == widthSlider * (itemSlider.length-1)){
        sliderContent.scrollLeft = 0;
    };
    rect();
};

function startTimer() {
    let seconds = 10;

    function countdown() {
        seconds--;

        if (seconds < 0) {
            next();
            seconds = 10;
        };
    };
    countdown();
    const timerInterval = setInterval(countdown, 1000);
}

document.addEventListener('DOMContentLoaded', startTimer);
document.addEventListener('DOMContentLoaded', rect);
// CARROUSSEL

//FAQ
document.querySelectorAll('.faq-item .question').forEach(question => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const icon = question.querySelector('.toggle-icon img');

        if (answer.style.display === 'none' || answer.style.display === '') {
            answer.style.display = 'block';
            icon.src = 'image/minus.svg'; 
        } else {
            answer.style.display = 'none';
            icon.src = 'image/plus.svg'; 
        }
    });
});
//FAQ
