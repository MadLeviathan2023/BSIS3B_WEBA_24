export const ModalButton = Object.freeze({
    YesNo: 'YesNo',
    YesNoCancel: 'YesNoCancel',
    OK: 'OK',
});

export const ModalResult = Object.freeze({
    Yes: 'Yes',
    No: 'No',
    Cancel: 'Cancel',
    OK: 'OK'
});

const BTN_CANCEL = document.getElementById("modal-btn-cancel");
const BTN_YES = document.getElementById("modal-btn-yes");
const BTN_NO = document.getElementById("modal-btn-no");
const BTN_OK = document.getElementById("modal-btn-ok");
const MODAL = document.getElementById("modal");
const BTN_YESNOCANCEL_CONTAINER = document.querySelector(".modal-btn-yes-no-cancel-container");
const BTN_OK_CONTAINER = document.querySelector(".modal-btn-ok-container");
const MODAL_MSG = document.getElementById("modal-msg");
const MODAL_CAPTION = document.getElementById("modal-caption"); 
var clickedButton;
let isShown = false;

BTN_YES.onclick = () => {
    Modal.Close(ModalResult.Yes);
}
BTN_NO.onclick = () => {
    Modal.Close(ModalResult.No);
}
BTN_CANCEL.onclick = () => {
    Modal.Close(ModalResult.Cancel);
}
BTN_OK.onclick = () => {
    Modal.Close(ModalResult.OK);
}

document.onkeydown = (e) => {
    if (isShown){
        if ((e.altKey && e.key.toLowerCase() == 'y' && BTN_YESNOCANCEL_CONTAINER.style.display != 'none') || (e.key == 'Enter' && BTN_YESNOCANCEL_CONTAINER.style.display != 'none')){
            BTN_YES.click();
        }
        else if (e.altKey && e.key.toLowerCase() == 'n' && BTN_YESNOCANCEL_CONTAINER.style.display != 'none'){
            BTN_NO.click();
        }
        else if (e.altKey && e.key.toLowerCase() == 'c' && BTN_CANCEL.style.display != 'none'){
            BTN_CANCEL.click();
        }
        else if ((e.altKey && e.key.toLowerCase() == 'o' && BTN_OK_CONTAINER.style.display != 'none') || (e.key == 'Enter' && BTN_OK_CONTAINER.style.display != 'none')){
            BTN_OK.click();
        }
    }
}

export const Modal = Object.freeze({
    Show: async (msg, caption, modalBtn) => {
        clickedButton = undefined;        

        BTN_YESNOCANCEL_CONTAINER.style.display = 'none';
        BTN_CANCEL.style.display = 'none';
        BTN_OK_CONTAINER.style.display = 'none';

        MODAL_CAPTION.innerHTML = caption;
        MODAL_MSG.innerHTML = msg;

        switch (modalBtn){
            case ModalButton.YesNo:
                BTN_YESNOCANCEL_CONTAINER.style.display = 'block';
                break;
            case ModalButton.YesNoCancel:
                BTN_YESNOCANCEL_CONTAINER.style.display = 'block';
                BTN_CANCEL.style.display = 'inline-block';
                break;
            case ModalButton.OK:
                BTN_OK_CONTAINER.style.display = 'block';
                break;
            default:
                BTN_OK_CONTAINER.style.display = 'block';
                break;
        }

        MODAL.showModal();
        isShown = true;
        if (BTN_YESNOCANCEL_CONTAINER.style.display != 'none'){
            BTN_YES.focus();
        }

        return new Promise((resolve) => {
            let timer = setInterval(() => {
                if (clickedButton !== undefined){
                    clearInterval(timer);
                    resolve(clickedButton);
                }
            }, 500);
        });
    },
    Close: (btn) => {    
        clickedButton = btn;
        isShown = false;
        MODAL.close();
    }
});