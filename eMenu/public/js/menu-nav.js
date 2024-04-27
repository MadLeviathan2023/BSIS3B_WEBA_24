var isVisible = false;

const OPTIONS = document.querySelector('nav ul.options');
const BTN_MENU = document.getElementById('btnMenu');

function toggleOptionsDisplay(){
    if (!isVisible){
        OPTIONS.style.display = 'block';
    }
    else{
        OPTIONS.style.display = 'none';
    }
}

BTN_MENU.onclick = () => {
    BTN_MENU.classList.toggle('active');
}

var vw = window.visualViewport.width;
window.addEventListener('resize', () => {
    
});