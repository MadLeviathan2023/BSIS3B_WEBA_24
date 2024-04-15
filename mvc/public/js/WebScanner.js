import { Modal, ModalButton, ModalResult } from './Modal.js';
import QrScanner from './qr-scanner/node_modules/qr-scanner/qr-scanner.min.js';

const QR_SCANNER_DIALOG = document.getElementById('qr-scanner-dialog');
const QR_SCANNER_ELEM = document.getElementById('qr-scanner');
const BTN_CLOSE_SCANNER = document.getElementById('btn-close-scanner');
var qrScanner;

QR_SCANNER_DIALOG.onclose = () => {
    qrScanner.stop();
}

export class WebScanner{
    constructor(result, jsonParam){
        qrScanner = new QrScanner(QR_SCANNER_ELEM, result, jsonParam);

        BTN_CLOSE_SCANNER.onclick = () =>{
            this.stop();
        }
    }

    async start(){
        try{
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(() => {
                QrScanner.hasCamera().then(async (hasCamera) => {
                    if (hasCamera) {
                        QR_SCANNER_DIALOG.showModal();
                        qrScanner.start();
                    } else {
                        Modal.Show('No camera available!', 'Failed', ModalButton.OK);
                    }
                });
            }).catch(async (err) => {
                Modal.Show(err, 'Failed!', ModalButton.OK);
            });
        }
        catch (err){
            Modal.Show(err, 'Failed!', ModalButton.OK);
        }
    }

    stop(){
        QR_SCANNER_DIALOG.close();
    }
}

