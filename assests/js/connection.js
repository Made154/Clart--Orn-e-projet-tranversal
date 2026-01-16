const pullCord = document.getElementById('pullCord');
const lampshade = document.getElementById('lampshade');
const glow = document.getElementById('glow');
const loginForm = document.getElementById('loginForm');
const hint = document.getElementById('hint');

let isOn = false;
let isDragging = false;
let startY= 0;
let currentHeight = 60;

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

function toggleLamp() {
    isOn = !isOn;

    if (isOn) {
        lampshade.classList.add('on');
        glow.classList.add('on');
        setTimeout(() => {
            loginForm.classList.add('show');
            hint.classList.add('hide');
        }, 200);      
    } else {
        lampshade.classList.remove('on');
        glow.classList.remove('on');
        loginForm.classList.remove('show');
        hint.classList.remove('hide');
    }
}