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

function openVideo() {
    document.getElementById("overlayVideo").style.display = "flex";
}

function closeVideo() {
    document.getElementById("overlayVideo").style.display = "none";
}

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



// PLANNING
document.addEventListener('DOMContentLoaded', function () {
    const daysContainer = document.getElementById('days-container');
    const weekRange = document.getElementById('week-range');
    const startDaySpan = document.getElementById('start-day');
    const endDaySpan = document.getElementById('end-day');
    const endMonthSpan = document.getElementById('end-month');
    const prevWeekBtn = document.getElementById('prev-week');
    const nextWeekBtn = document.getElementById('next-week');
    const numberOfColumns = 6;

    let currentWeek = 0;

    function updateWeek() {

        const today = new Date();
        today.setDate(today.getDate() + currentWeek * 7);
        let startDay = new Date(today);
    

        while (startDay.getDay() !== 2) {
            startDay.setDate(startDay.getDate() + 1);
        }
    

        let endDay = new Date(startDay);
        endDay.setDate(startDay.getDate() + numberOfColumns - 1);
    

        startDaySpan.textContent = startDay.getDate();
        endDaySpan.textContent = endDay.getDate();
        endMonthSpan.textContent = endDay.toLocaleDateString('fr-FR', { month: 'short' });
    
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
    
    function clearColumns() {

        daysContainer.innerHTML = '';
    }


    prevWeekBtn.addEventListener('click', function () {
        currentWeek--;
        clearColumns();
        updateWeek();
    });

    nextWeekBtn.addEventListener('click', function () {
        currentWeek++;
        clearColumns();
        updateWeek();
    });


    updateWeek();
});
// PLANNING


// CARROUSSEL
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