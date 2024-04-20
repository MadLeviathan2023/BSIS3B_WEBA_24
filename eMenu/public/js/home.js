import * as global from './global.js';
import { TypingAnim } from './TypingAnim.js';
import { Modal, ModalButton, ModalResult } from './Modal.js';
import { WebScanner } from './WebScanner.js';

const WELCOME_MSG = [        
    "To where exceptional flavors and warm hospitality await you.",
    "Need assistance? Our Virtual Assistance Chatbot is here to guide you through every step.",
    "Step into the future of dining with our innovative Web-Based Menu Ordering System.",
    "Simply scan the QR code to browse through our mouthwatering offerings.",
    "Welcome aboard our digital dining experience!",
    "Get ready to revolutionize the way you order food with our Web-Based Menu Ordering System.",
    "Have questions or need recommendations? Our Virtual Assistance Chatbot is here to ensure your ordering journey is smooth sailing.",
    "Let's embark on a culinary adventure together!",
    "Welcome to convenience at your fingertips!",
    "Indulge in culinary delights with just a few clicks!"
];

const WELCOME_MSG_ELEM = document.querySelector('.welcome-msg');
const TYPING_ANIM = new TypingAnim(WELCOME_MSG, WELCOME_MSG_ELEM);
TYPING_ANIM.start();

var lastScanned;
async function showDecodedQR(result){
    if (result){
        if (lastScanned != result.data){            
            lastScanned = result.data;
            if (global.isValidURL(result.data)){
                var msg = await Modal.Show("Would you like to go in the following link?<br><br>URL: <u>" + result.data + "</u>", 'Decoded QR Code', ModalButton.YesNo);
                if (msg == ModalResult.Yes){
                    window.location.href = result.data;
                }
            }
            else{
                Modal.Show(result.data, 'Decoded QR Code', ModalButton.OK);
            }
            setTimeout(() => {
                lastScanned = undefined;
            }, 3000);
        }
    }
}

const BTN_OPEN_QR = document.getElementById('btnOpenQR');
const WEB_SCANNER = new WebScanner(showDecodedQR, {
    highlightScanRegion: true,
    highlightCodeOutline: true,
    returnDetailedScanResult: true,
    preferredCamera: 'environment'
});

BTN_OPEN_QR.onclick = () => {
    WEB_SCANNER.start();
}


