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

const btnCancel = document.getElementById("modal-btn-cancel");
const btnYes = document.getElementById("modal-btn-yes");
const btnNo = document.getElementById("modal-btn-no");
const btnOK = document.getElementById("modal-btn-ok");
const modal = document.getElementById("modal");
const yesNoContainer = document.querySelector(".modal-btn-yes-no-container");
const okContainer = document.querySelector(".modal-btn-ok-container");
var clickedButton;

export class Modal{
    constructor(){
        clickedButton = undefined;

        yesNoContainer.style.display = 'none';
        btnCancel.style.display = 'none';
        okContainer.style.display = 'none';

        btnYes.onclick = () => {
            this.close(ModalResult.Yes);
        }
        btnNo.onclick = () => {            
            this.close(ModalResult.No);
        }
        btnCancel.onclick = () => {
            this.close(ModalResult.Cancel);
        }
        btnOK.onclick = () => {
            this.close(ModalResult.OK);
        }
    }

    async show(msg, caption, modalBtn){
        const modalMsg = document.getElementById("modal-msg");
        const modalCaption = document.getElementById("modal-caption");              

        modalCaption.innerHTML = caption;
        modalMsg.innerHTML = msg;

        switch (modalBtn){
            case ModalButton.Yes:
                yesNoContainer.style.display = 'block';
                break;
            case ModalButton.YesNoCancel:
                yesNoContainer.style.display = 'block';
                btnCancel.style.display = 'inline-block';
                break;
            case ModalButton.OK:
                okContainer.style.display = 'block';
                break;
            default:
                okContainer.style.display = 'block';
                break;
        }

        modal.showModal();

        return new Promise((resolve, reject) => {
            let timer = setInterval(() => {
                if (clickedButton !== undefined){
                    clearInterval(timer);
                    resolve(clickedButton);
                    reject('Failed! Something went wrong.');
                }
            }, 500);
        }).then((result) => {
            return result;
        }).catch((err) => {
            return err;
        });
    }

    close(btn) {
        clickedButton = btn;
        modal.close();
    }
}