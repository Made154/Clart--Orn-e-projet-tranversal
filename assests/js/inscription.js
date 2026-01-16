function createStars() {
    const starsContainer = document.getElementById('stars');
    const starCount = 100;

    for (let i = 0; i < starCount; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        star.style.animationDelay = Math.random() * 3 + 's';
        starsContainer.appendChild(star);
    }
}

createStars();

const pullCord = document.getElementById('pullCord');
const lampshade = document.getElementById('lampshade');
const glow = document.getElementById('glow');
const signupForm = document.getElementById('signupForm');
const hint = document.getElementById('hint');
const mouth = document.getElementById('mouth');
const eyeLeft = document.getElementById('eyeLeft');
const eyeRight = document.getElementById('eyeRight');
const successMessage = document.getElementById('successMessage');
const inscriptionForm = document.getElementById('inscriptionForm');
const lampZs = document.querySelectorAll('.lamp-z'); 

let isOn = false;
let isDragging = false;
let startY = 0;

pullCord.addEventListener('mousedown', (e) => {
    isDragging = true;
    startY = e.clientY;
    pullCord.style.transition = 'none';
});

document.addEventListener('mousemove', (e) => {
    if (!isDragging) return;

    const deltaY = e.clientY - startY;
    const newHeight = Math.max(60, Math.min(120, 60 + deltaY));
    pullCord.style.height = newHeight + 'px';
});

document.addEventListener('mouseup', (e) => {
    if (!isDragging) return;

    isDragging = false;
    const finalHeight = parseInt(pullCord.style.height);

    if (finalHeight > 90) {
        toggleLamp();
    }

    pullCord.style.transition = 'height 0.3s ease';
    pullCord.style.height = '60px';
});

pullCord.addEventListener('click', (e) => {
    if (!isDragging) {
        toggleLamp();
    }
});

function toggleLamp() {
    isOn = !isOn;

    if (isOn) {

        lampshade.classList.remove('sleeping');
        lampshade.classList.add('on');
        glow.classList.add('on');

        lampZs.forEach(z => z.classList.add('hidden'));
        
        setTimeout(() => {
            signupForm.classList.add('show');
            hint.classList.add('hide');
        }, 200);
    } else {

        lampshade.classList.remove('on');
        lampshade.classList.add('sleeping');
        glow.classList.remove('on');
        signupForm.classList.remove('show');
        hint.classList.remove('hide');

        lampZs.forEach(z => z.classList.remove('hidden'));
    }
}

inscriptionForm.addEventListener('submit', (e) => {
    e.preventDefault();

    successMessage.classList.add('show');

    setTimeout(() => {
        mouth.classList.add('yawning');
    }, 500);

    setTimeout(() => {
        eyeLeft.classList.add('closing');
        eyeRight.classList.add('closing');
        lampshade.classList.add('going-to-sleep');
    }, 1500);

    setTimeout(() => {
        glow.classList.remove('on');
        lampshade.classList.remove('on');
        lampshade.classList.add('sleeping');
        // Réafficher les Z
        lampZs.forEach(z => z.classList.remove('hidden'));
    }, 3000);

    setTimeout(() => {
        alert('Redirection vers la page de connexion...');
        
    }, 4000);
});