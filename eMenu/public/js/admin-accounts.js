import * as global from './global.js';
import { Modal, ModalButton, ModalResult } from './Modal.js';

const DELETE_BTN = document.querySelectorAll('.delete-btn');
DELETE_BTN.forEach((btn) => {
    btn.onclick = async () => {
        const USER_ID = btn.getAttribute('user_id');
        var msg = await Modal.Show('Would you like to delete this account?', 'Message', ModalButton.YesNo);

        if (msg == ModalResult.Yes){
            const XHR = new XMLHttpRequest();
            XHR.onreadystatechange = () => {
                if (XHR.readyState == 4) {
                    if (XHR.status == 200) {
                        var result = XHR.responseText;
                        if (result == 'success'){
                            btn.parentElement.parentElement.parentElement.remove();
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
            XHR.open('POST', global.ROOT + '/admin/delete_acc', true);
            XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            XHR.send('user_id=' + USER_ID);
        }
    }
});