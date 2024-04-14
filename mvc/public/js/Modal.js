export const ModalButton = {
    YesNo: 'YesNo',
    YesNoCancel: 'YesNoCancel',
    OK: 'OK',
}

export const ModalResult = {
    Yes: 'Yes',
    No: 'No',
    Cancel: 'Cancel',
    OK: 'OK'
}

const BTN_CANCEL = document.getElementById("modal-btn-cancel");
const BTN_YES = document.getElementById("modal-btn-yes");
const BTN_NO = document.getElementById("modal-btn-no");
const BTN_OK = document.getElementById("modal-btn-ok");
const MODAL = document.getElementById("modal");
const BTN_YESNO_CONTAINER = document.querySelector(".modal-btn-yes-no-container");
const BTN_OK_CONTAINER = document.querySelector(".modal-btn-ok-container");
const MODAL_MSG = document.getElementById("modal-msg");
const MODAL_CAPTION = document.getElementById("modal-caption"); 
var clickedButton;

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

export const Modal = {
    Show: async (msg, caption, modalBtn) => {
        clickedButton = undefined;

        BTN_YESNO_CONTAINER.style.display = 'none';
        BTN_CANCEL.style.display = 'none';
        BTN_OK_CONTAINER.style.display = 'none';

        MODAL_CAPTION.innerHTML = caption;
        MODAL_MSG.innerHTML = msg;

        switch (modalBtn){
            case ModalButton.YesNo:
                BTN_YESNO_CONTAINER.style.display = 'block';
                break;
            case ModalButton.YesNoCancel:
                BTN_YESNO_CONTAINER.style.display = 'block';
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
        MODAL.close();
    }
}