import { Modal, ModalButton, ModalResult } from './Modal.js';
import { WebScanner } from './WebScanner.js';
import * as global from './global.js';

const TEXTBOXES = document.querySelectorAll('.textbox');

function txtboxFocusedProperties(txtbox){
    const PARENT_LBL_STYLE = txtbox.parentElement.style;
    PARENT_LBL_STYLE.setProperty('--lblBeforeColor', 'var(--oxford-blue)');
    PARENT_LBL_STYLE.setProperty('--lblBeforeTop', '0px');
    PARENT_LBL_STYLE.setProperty('--lblBeforeFontSize', '.65rem');
}

function txtboxLeftEmptyProperties(txtbox){
    const PARENT_LBL_STYLE = txtbox.parentElement.style;
    PARENT_LBL_STYLE.setProperty('--lblBeforeColor', 'gray');
    PARENT_LBL_STYLE.setProperty('--lblBeforeTop', '50%');
    PARENT_LBL_STYLE.setProperty('--lblBeforeFontSize', '.75rem');
}

TEXTBOXES.forEach((textbox) => {
    textbox.onfocus = () => {
        txtboxFocusedProperties(textbox);
    }

    textbox.onblur = () => {
        if (textbox.value == ''){
            txtboxLeftEmptyProperties(textbox);
        }
        else{
            txtboxFocusedProperties(textbox);
        }
    }
});

TEXTBOXES[1].focus();
TEXTBOXES[0].focus();


const TXT_PASSWORD = document.getElementById('txtPassword');
const BTN_SHOW_HIDE_PASS = document.getElementById('btnShowHidePass');
const BTN_SHOW_HIDE_PASS_ICON = document.getElementById('btnShowHidePass-Icon');
const ButtonIcon = Object.freeze({
    Show: 'fa-solid fa-eye',
    Hide: 'fa-solid fa-eye-slash'
});

BTN_SHOW_HIDE_PASS.onclick = () => {
    if (TXT_PASSWORD.type == 'password'){
        TXT_PASSWORD.type = 'text';
        BTN_SHOW_HIDE_PASS.title = 'Hide Password';
        BTN_SHOW_HIDE_PASS_ICON.className = ButtonIcon.Hide;
    }
    else{
        TXT_PASSWORD.type = 'password';
        BTN_SHOW_HIDE_PASS.title = 'Show Password';
        BTN_SHOW_HIDE_PASS_ICON.className = ButtonIcon.Show;
    }
    TXT_PASSWORD.focus();
}


var lastScanned;
function loginWithQR(result){
    if (result){
        var scannedQR = result.data;
        if (lastScanned != scannedQR){
            lastScanned = scannedQR;
            var data = 'user_qr=' + scannedQR;
            const XHR = new XMLHttpRequest();
            XHR.onreadystatechange = () => {
                if (XHR.readyState == 4){
                    if (XHR.status == 200){
                        var logResult = JSON.parse(XHR.responseText);
                        if (logResult.status == 'success'){
                            if (logResult.usertype == 'admin'){
                                window.location.href = global.ROOT + '/admin';
                            }
                            else if (logResult.usertype == 'cashier'){
                                window.location.href = global.ROOT + '/cashier';
                            }
                        }
                        else{
                            Modal.Show(logResult.msg, logResult.caption, ModalButton.OK);
                        }
                    }
                    else{
                        Modal.Show('Status code: ' + XHR.status, 'Error', ModalButton.OK);
                    }
                }
            }

            XHR.open('POST', global.ROOT + '/login/auth_qr', true);
            XHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            XHR.send(data);

            setTimeout(() => {
                lastScanned = undefined;
            }, 3000);
        }
    }
}

const WEB_SCANNER = new WebScanner(loginWithQR, {
    highlightScanRegion: true,
    highlightCodeOutline: true,
    returnDetailedScanResult: true,
    preferredCamera: 'environment'
});

const BTN_OPEN_SCANNER = document.getElementById('btnOpenScanner');
BTN_OPEN_SCANNER.onclick = () => {
    WEB_SCANNER.start();
}