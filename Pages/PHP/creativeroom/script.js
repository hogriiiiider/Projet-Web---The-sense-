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