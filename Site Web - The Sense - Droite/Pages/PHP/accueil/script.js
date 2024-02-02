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

var news_count = 3;
var next_page = document.getElementById('next_arrow');
var previous_page = document.getElementById('previous_arrow');
const rect = document.querySelector('.rect-news img');
const text = document.querySelector('.journaux-article p');
const logo = document.querySelector('.logo-news img');

next_page.addEventListener('click', () => {
    console.log('YEP')

    if (news_count === 3){
        news_count ++;
        rect.src = 'image/news-rect-4.svg';
        logo.src = 'image/image-125.svg';
        text.textContent = ('Bluffé par la qualité du service, que ce soit l’accueil et la prise en charge du groupe. Quant à l’expérience, rien à dire, c’est une expérience unique au monde')        
    };
})

previous_page.addEventListener('click', () => {
    console.log('YEP')

    if (news_count === 4){
        news_count --;
        rect.src = 'image/news-rect-3.svg';
        logo.src = 'image/image-126.svg';
        text.textContent = ('C’est la meilleure manière de faire découvrir l’expérience VR à vos enfants et vos grand-parents mais aussi de changer des perpétuels bowlings ou séance de cinéma du week-end')        
    };
})