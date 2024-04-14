import { TypingAnim } from './TypingAnim.js';

const welcomeMsg = [        
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

const welcomeMsgElem = document.querySelector('.welcome-msg');
const typingAnim = new TypingAnim(welcomeMsg, welcomeMsgElem);
typingAnim.start();