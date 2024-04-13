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

export class Modal{
    static get btnCancel() {
        return document.getElementById("modal-btn-cancel");
    }
    static get btnYes() {
        return document.getElementById("modal-btn-yes");
    } 
    static get btnNo() {
        return document.getElementById("modal-btn-no");
    }
    static get btnOK() {
        return document.getElementById("modal-btn-ok");
    } 
    static get modal() {
        return document.getElementById("modal");
    }
    static get yesNoContainer() {
        return document.querySelector(".modal-btn-yes-no-container");
    }
    static get okContainer() {
        return document.querySelector(".modal-btn-ok-container");
    }
    static clickedButton;

    constructor(){
        Modal.clickedButton = undefined;

        Modal.yesNoContainer.style.display = 'none';
        Modal.btnCancel.style.display = 'none';
        Modal.okContainer.style.display = 'none';

        Modal.btnYes.onclick = () => {
            this.close(ModalResult.Yes);
        }
        Modal.btnNo.onclick = () => {            
            this.close(ModalResult.No);
        }
        Modal.btnCancel.onclick = () => {
            this.close(ModalResult.Cancel);
        }
        Modal.btnOK.onclick = () => {
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
                Modal.yesNoContainer.style.display = 'block';
                break;
            case ModalButton.YesNoCancel:
                Modal.yesNoContainer.style.display = 'block';
                Modal.btnCancel.style.display = 'inline-block';
                break;
            case ModalButton.OK:
                Modal.okContainer.style.display = 'block';
                break;
            default:
                Modal.okContainer.style.display = 'block';
                break;
        }

        Modal.modal.showModal();

        return new Promise((resolve, reject) => {
            let timer = setInterval(() => {
                if (Modal.clickedButton !== undefined){
                    clearInterval(timer);
                    resolve(Modal.clickedButton);
                    reject('Failed! Something went wrong.');
                }
            }, 500);
        }).then((result) => {
            return result;
        }).catch((err) => {
            return err;
        });
    }

    close(clickedBtn) {
        Modal.clickedButton = clickedBtn;
        Modal.modal.close();
    }
}