const CLOSE_CHAT_BTN = document.getElementById('close-chat-btn');
const OPEN_CHAT_BTN = document.getElementById('open-chat-btn');
const CHATS_CONTAINER = document.querySelector('.chats-container');

OPEN_CHAT_BTN.onclick = () => {
    CHATS_CONTAINER.style.display = 'block';
}

CLOSE_CHAT_BTN.onclick = () => {
    CHATS_CONTAINER.style.display = 'none';
}