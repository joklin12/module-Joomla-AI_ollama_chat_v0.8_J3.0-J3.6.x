# Module-Joomla-AI_ollama_chat_v0.8_J3.0-J3.6.x
Detail : https://jokovlog.my.id/produkku/412-modul-open-webui-chat-bot-ai-joomla.html
Ollama Chat Assistant Module for Joomla. This Joomla module integrates an AI chatbot powered by the Ollama API (local or cloud-based), supporting various AI models like Llama3 and Mistral.
🧩 Features
Floating chatbox UI
Session-based conversation history
Model-selectable (default: Llama3)
Fully self-hosted or remote Ollama endpoint support
Works with Joomla 3.0–3.6

⚙️ Requirements
Component	Min Version
Joomla	3.0+
PHP	5.x
PHP Extensions	cURL, JSON
Ollama Server	v0.1.20+

⚠️ Use the correct version:
For Joomla 3.6 and below: mod_ollama_chat_v0.8_J3.0-J3.6.x.zip (PHP 5.x)

🔧 Backend Configuration
Assistant Name
AI Model (Llama3, etc.)
API URL (e.g., http://localhost:11434)

🔐 Security
CSRF token protection
Input sanitization
GPL license included
Session-based history

❗ Error Handling
Friendly user messages
Console error logging
Fallback response on API failure

📁 Module File Structure
mod_ollama_chat.xml — Manifest file
mod_ollama_chat.php — Main module logic
helper.php — API communication helpers
tmpl/default.php — HTML output
chatbox.css / chatbox.js — UI and interactivity
en-GB.mod_ollama_chat.ini/sys.ini — Language files

Create : joko Supriyanto
Video instalation : https://www.youtube.com/watch?v=cJyrLiiLwYU
