document.addEventListener('DOMContentLoaded', () => {
    const chatMessages = document.getElementById('chat-messages');
    const userInput = document.getElementById('user-input');
    const sendButton = document.getElementById('send-btn');

    function formatResponse(text) {
        // Remove all markdown symbols while preserving the text
        text = text.replace(/\*\*/g, '');
        
        // Convert bullet points to proper HTML with spacing
        text = text.split('\n').map(line => {
            if (line.trim().startsWith('*')) {
                return `<li>${line.replace('*', '').trim()}</li>`;
            }
            return line;
        }).join('\n');
        
        // Wrap bullet point sections in ul tags
        text = text.replace(/<li>.*?<\/li>/gs, match => `<ul>${match}</ul>`);
        
        // Convert newlines to line breaks
        text = text.replace(/\n/g, '<br>');
        
        return text;
    }

    function addMessage(text, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user-message' : 'bot-message'}`;
        
        if (isUser) {
            messageDiv.textContent = text;
        } else {
            messageDiv.innerHTML = formatResponse(text);
        }
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    const typingIndicator = document.querySelector('.typing-indicator');

    async function sendMessage() {
        const message = userInput.value.trim();
        if (!message) return;

        // Add user message to chat
        addMessage(message, true);
        userInput.value = '';
    
        // Show typing indicator
        typingIndicator.style.display = 'flex';

        try {
            const response = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message })
            });

            const data = await response.json();
        
            // Hide typing indicator
            typingIndicator.style.display = 'none';
        
            addMessage(data.response);
        } catch (error) {
            typingIndicator.style.display = 'none';
            addMessage('Sorry, there was an error processing your request.');
        }
    }
    sendButton.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    // Add welcome message
    addMessage('Hello! I\'m ClimateConnect AI. How can I help you learn about climate change today?');
});
