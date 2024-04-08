var welcomeMsg = [        
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

var welcomeMsgElem = document.querySelector('.welcome-msg');
var i = 0, j = 0, k = 0;

var intervalDelay = 100;
var timer = setInterval(animatedWelcomeMsg, intervalDelay);

function animatedWelcomeMsg() {
    try {
        if (i < welcomeMsg.length) {
            if (j < welcomeMsg[i].length) {
                welcomeMsgElem.innerHTML += welcomeMsg[i][j];
                j++;
            } else if (j == welcomeMsg[i].length) {
                if (k == 0) {
                    clearInterval(timer);
                    setTimeout(() => {
                        timer = setInterval(animatedWelcomeMsg, intervalDelay);
                    }, 750);
                } else if (k > 0) {
                    if (intervalDelay == 100){
                        changeIntervalDelay(50);
                    }
                    var sliced = welcomeMsg[i].slice(0, -k);
                    welcomeMsgElem.innerHTML = sliced;
                    if (k == j) {
                        changeIntervalDelay(100);
                        j = 0, k = -1;
                        i++;
                    }
                }
                k++;
            }
        }
        if (i == welcomeMsg.length) {
            i = 0;
        }
    } catch(err) {
        console.log(err);
        clearInterval(timer);
    }
}

function changeIntervalDelay(newDelay){
    intervalDelay = newDelay;
    clearInterval(timer);
    timer = setInterval(animatedWelcomeMsg, intervalDelay);
}