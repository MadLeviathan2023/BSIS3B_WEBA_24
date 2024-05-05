import * as global from './global.js';
import { Modal, ModalButton, ModalResult } from './Modal.js';

const UPLOAD_BTN = document.getElementById('upload-btn');
const PRODUCT_IMG = document.getElementById('product_img');
const IMG_DISPLAY = document.getElementById('img_display');
const NO_IMG = global.ROOT + '/images/no-image.png';

function setDefaultImage(){
    if (IMG_DISPLAY.hasAttribute('default') && IMG_DISPLAY.getAttribute('default') != ''){
        IMG_DISPLAY.src = IMG_DISPLAY.getAttribute('default');
    }
    else{
        IMG_DISPLAY.src = NO_IMG;
    }
    PRODUCT_IMG.value = '';
}

if (PRODUCT_IMG){
    PRODUCT_IMG.onchange = (e) => {
        const FILE = PRODUCT_IMG.files[0];
        const _20MB = 20 * 1024 * 1024;
        if (FILE){
            if (FILE.size > _20MB){
                ModalButton.Show('The file must be less than 20MB!', 'Message', ModalButton.OK);
                setDefaultImage();
            }
            else if (!FILE.type.startsWith('image/')){
                Modal.Show('The file must be an image!', 'Message', ModalButton.OK);
                setDefaultImage();
            }
            else {
                const READER = new FileReader();
                READER.onload = (event) => {
                    IMG_DISPLAY.src = event.target.result;
                }
                READER.readAsDataURL(FILE);
            }
        }
        else{
            setDefaultImage();
        }
    }
}
if (UPLOAD_BTN){
    UPLOAD_BTN.onclick = () => {
        PRODUCT_IMG.click();
    }
}

const DELETE_BTN = document.querySelectorAll('delete-btn');

if (DELETE_BTN){
    DELETE_BTN.forEach((btn) => {
        btn.onclick = () => {
            
        }
    });
}