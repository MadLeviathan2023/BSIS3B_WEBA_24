const MOBILE_VW = 767;
const OPTIONS = document.querySelector('nav ul.options');
const BTN_MENU = document.getElementById('btnMenu');
var vw = window.visualViewport.width;

BTN_MENU.onclick = () => {
    BTN_MENU.classList.toggle('active');
    toggleDisplay(OPTIONS);
}

if (vw < MOBILE_VW){
    toggleDisplay(OPTIONS);
}

window.addEventListener('resize', () => {
    vw = window.visualViewport.width;
    if (vw < MOBILE_VW){
        toggleDisplay(OPTIONS);
    }
    else{
        OPTIONS.style.display = 'flex';
    }
});

function toggleDisplay(elem){
    if (elem.style.display == 'none'){
        elem.style.display = vw < 767 ? 'block' : 'flex';
    }
    else{
        elem.style.display = 'none';
    }
}