import { TypingAnim } from './TypingAnim.js';

const welcomeMsg = [        
    "To where exceptional flavors and warm hospitality await you.",
];

const welcomeMsgElem = document.querySelector('.welcome-msg');
const typingAnim = new TypingAnim(welcomeMsg, welcomeMsgElem);
typingAnim.start();