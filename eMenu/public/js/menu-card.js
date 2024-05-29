document.body.addEventListener('click', (e) => {
    const TARGET = e.target;
    if (TARGET.className == 'btn-add-one'){
        const TXTBOX = TARGET.parentElement.children[1];
        let value = parseInt(TXTBOX.value);
        if (value < 9){
            value++;
            TXTBOX.value = value.toString();
        }
    }
    else if (TARGET.className == 'btn-subtract-one'){
        const TXTBOX = TARGET.parentElement.children[1];
        let value = parseInt(TXTBOX.value);
        if (value > 0){
            value--;
            TXTBOX.value = value.toString();
        }
    }
    else if (TARGET.className == 'btn-add-to-cart'){
        const TXTBOX = TARGET.parentElement.parentElement.children[0].children[1];
        
    }
});

const CARD_TXTBOX = document.querySelectorAll('.txt-qty');

CARD_TXTBOX.forEach((txtbox) => {
    txtbox.onchange = () => {
        if (txtbox.value < 0){
            txtbox.value = 0;
        }
        else if (txtbox.value > 9){
            txtbox.value = 9;
        }
    }
});