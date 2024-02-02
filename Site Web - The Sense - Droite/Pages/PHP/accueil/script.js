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

document.addEventListener('DOMContentLoaded', function () {
    const newsContent = document.getElementById('news-content');
    const rectNewsElements = document.querySelectorAll('.rect-news');
    const animationDuration = 60000;

    newsContent.addEventListener('animationiteration', function (event) {
        const currentPercentage = (event.elapsedTime / animationDuration) * 100;

        rectNewsElements.forEach((rectNews, index) => {
            const startPercentage = index * (100 / rectNewsElements.length);
            const endPercentage = (index + 1) * (100 / rectNewsElements.length);

            if (currentPercentage >= startPercentage && currentPercentage < endPercentage) {
                const progressPercentage = (currentPercentage - startPercentage) / (endPercentage - startPercentage);

                // Appliquer des styles spécifiques en fonction du pourcentage de progression
                if (progressPercentage >= 0.1428 && progressPercentage <= 0.1666) {
                    // Entre 0% et 14.28%, rect-news devient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                } else if (progressPercentage >= 0.2856 && progressPercentage <=0.3333) {
                    // À 100%, rect-news redevient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                } else if (progressPercentage >= 0.4709 && progressPercentage <=0.5) {
                    // À 100%, rect-news redevient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                } else if (progressPercentage >= 0.6190 && progressPercentage <= 0.6666) {
                    // À 100%, rect-news redevient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                }else if (progressPercentage >= 0.8042 && progressPercentage <= 0.8333) {
                    // À 100%, rect-news redevient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                }else if (progressPercentage >= 0.9523) {
                    // À 100%, rect-news redevient bleu avec une animation ease-in-out
                    rectNews.style.transition = 'background-color 1s ease-in-out';
                    rectNews.style.backgroundColor = 'blue';
                } else {
                    rectNews.style.transition = 'none';
                    rectNews.style.backgroundColor = 'initial';
                }
            }
        });
    });
});