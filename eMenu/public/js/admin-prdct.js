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

const DELETE_BTN = document.querySelectorAll('button.delete-btn.btn');

if (DELETE_BTN){
    DELETE_BTN.forEach((btn) => {
        btn.onclick = async () => {
            const PRODUCT_ID = btn.getAttribute('prdct_id');
            var msg = await Modal.Show('Would you like to delete this product?', 'Message', ModalButton.YesNo);

            if (msg == ModalResult.Yes){
                const XHR = new XMLHttpRequest();
                XHR.onreadystatechange = () => {
                    if (XHR.readyState == 4) {
                        if (XHR.status == 200) {
                            var result = XHR.responseText;
                            if (result == 'success'){
                                btn.parentElement.parentElement.parentElement.parentElement.remove();
                            }
                            else{
                                Modal.Show(result, 'Failed', ModalButton.OK);
                            }
                        }
                        else {
                            Modal.Show(`Error! Status code: ${XHR.status}`, 'Failed!', ModalButton.OK);
                        }
                    }
                };
                XHR.open('POST', global.ROOT + '/admin/delete_prdct', true);
                XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                XHR.send('product_id=' + PRODUCT_ID);
            }
        }
    });
}