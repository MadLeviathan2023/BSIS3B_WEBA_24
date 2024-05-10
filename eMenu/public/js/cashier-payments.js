const PAYMENT_DIALOG = document.getElementById('payment-dialog');
const CLOSE_BTN = document.querySelector('#payment-dialog .close-btn');

CLOSE_BTN.onclick = () => {
    PAYMENT_DIALOG.close();
}

document.body.addEventListener('click', (e) => {
    const TARGET = e.target;
    if (TARGET.className == 'payment-btn'){
        PAYMENT_DIALOG.showModal();
    }
});