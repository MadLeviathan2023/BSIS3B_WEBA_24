import * as global from './global.js';

const UPLOAD_BTN = document.getElementById('upload-btn');
const PRODUCT_IMG = document.getElementById('product_img');
const IMG_DISPLAY = document.getElementById('img_display');
const NO_IMG = global.ROOT + '/images/no-image.png';

PRODUCT_IMG.onchange = (e) => {
    const FILE = PRODUCT_IMG.files[0];
    const _20MB = 20 * 1024 * 1024;
    if (FILE && FILE.type.startsWith('image/') && FILE.size < _20MB){
        const READER = new FileReader();
        READER.onload = (event) => {
            IMG_DISPLAY.src = event.target.result;
        }
        READER.readAsDataURL(FILE);
    }
    else{
        IMG_DISPLAY.src = NO_IMG;
    }
}

UPLOAD_BTN.onclick = () => {
    PRODUCT_IMG.click();
}