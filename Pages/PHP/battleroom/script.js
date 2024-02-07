//carrousel

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

//caroussel

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
function open_reserv(){
    const reservation = document.querySelector('.reservation');
    const page = document.querySelector('.page');
    reservation.style.display = 'block'
    page.style.display = 'none'
}

function close_reserv(){
    const reservation = document.querySelector('.reservation');
    const page = document.querySelector('.page');
    reservation.style.display = 'none'
    page.style.display = 'block'
}
//RESERVATION

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

//Connexion
$(".wronguser").hide();

$(".connexion-btn").on("click", function () {
    var _username = $('#username').val();
    var _password = $("#password").val();
    if (_username.length > 0 && _username.includes('@') && _password.length > 0){


        $.post("connexion.php", {mail: _username, password: _password}, function(data, textStatus) {
            console.log(data);
            if(data == 'user'){
                $(".connexion-box").hide();
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
})