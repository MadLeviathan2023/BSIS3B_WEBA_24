import { Modal, ModalButton } from './Modal.js';
import QrScanner from './qr-scanner/node_modules/qr-scanner/qr-scanner.min.js';

const QR_SCANNER_DIALOG = document.getElementById('qr-scanner-dialog');
const QR_SCANNER_ELEM = document.getElementById('qr-scanner');
const BTN_CLOSE_SCANNER = document.getElementById('btn-close-scanner');
const SEL_CAM_LIST = document.getElementById('selCamList');
var qrScanner;
var currentCamera;

QR_SCANNER_DIALOG.onclose = () => {
    qrScanner.stop();
}

SEL_CAM_LIST.onchange = async (e) => {
    await qrScanner.setCamera(e.target.value);
    currentCamera = e.target.value;
}

export class WebScanner{
    constructor(result, jsonParam){
        qrScanner = new QrScanner(QR_SCANNER_ELEM, result, jsonParam);

        BTN_CLOSE_SCANNER.onclick = () =>{
            this.stop();
        }
    }

    start(){
        try{
            navigator.mediaDevices.getUserMedia({
                video: true
            }).then(() => {
                SEL_CAM_LIST.innerHTML = '';
                QrScanner.hasCamera().then((hasCamera) => {
                    if (hasCamera) {
                        QR_SCANNER_DIALOG.showModal();
                        qrScanner.start().then(() => {
                            QrScanner.listCameras(true).then((cameras) => {
                                cameras.forEach((camera) => {
                                    const OPTION_ELEM = document.createElement('option');
                                    OPTION_ELEM.value = camera.id;
                                    OPTION_ELEM.textContent = camera.label;
                                    if (currentCamera != undefined && currentCamera == camera.id){
                                        OPTION_ELEM.setAttribute('selected', '');
                                    }
                                    SEL_CAM_LIST.append(OPTION_ELEM);
                                });                            
                            });
                        });
                    } else {
                        Modal.Show('No camera available!', 'Failed', ModalButton.OK);
                    }
                });
            }).catch((err) => {
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

