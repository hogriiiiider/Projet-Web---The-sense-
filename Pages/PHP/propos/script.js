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
