import { Modal, ModalButton, ModalResult } from './Modal.js';
import QrScanner from './qr-scanner/node_modules/qr-scanner/qr-scanner.min.js';

const QR_SCANNER_DIALOG = document.getElementById('qr-scanner-dialog');
const QR_SCANNER_ELEM = document.getElementById('qr-scanner');
const BTN_CLOSE_SCANNER = document.getElementById('btn-close-scanner');
var qrScanner;

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
                        let msg = await Modal.Show('No camera available!', 'Failed', ModalButton.OK);
                    }
                });
            }).catch(async (err) => {
                let msg = await Modal.Show(err, 'Failed!', ModalButton.OK);
            });
        }
        catch (err){
            let msg = await Modal.Show(err, 'Failed!', ModalButton.OK);
        }
    }

    stop(){
        qrScanner.stop();
        QR_SCANNER_DIALOG.close();
    }
}

