document.addEventListener('DOMContentLoaded', function() {
    var connexionBox = document.querySelector('.connexion-box');
    var openButton = document.getElementById('connexion-btn');
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