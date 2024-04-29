const SIDEBAR_CONTAINER = document.querySelector('.sidebar-container');
const SIDEBAR = document.querySelector('.sidebar');
const MOBILE_VW = 767;

var vw = window.visualViewport.width;
window.onresize = () => {
    vw = window.visualViewport.width;
}

document.body.addEventListener('click', (e) => {
    const TARGET = e.target;
    if (TARGET === SIDEBAR_CONTAINER && vw < MOBILE_VW) {
        hideSidebar();
    } 
    else if (TARGET.id === 'sidebar-btn') {
        showSidebar();
    }
});
  
function hideSidebar() {
    SIDEBAR.style.width = '0px';
    SIDEBAR_CONTAINER.style.opacity = '0';
    setTimeout(() => {
        SIDEBAR_CONTAINER.style.display = 'none';
    }, 500);
}

function showSidebar() {
    SIDEBAR_CONTAINER.style.display = 'block';
    setTimeout(() => {
        SIDEBAR_CONTAINER.style.opacity = '1';
    }, 0)
    setTimeout(() => {
        SIDEBAR.style.width = '75%';
    }, 250);
}