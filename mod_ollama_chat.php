
<?php
/**
 * @package     mod_ollama_chat
 * @author      Joko Supriyanto <joko@sibermu.ac.id>
 * @copyright   Copyright (C) 2025 JokoVlog. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

// Start session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__FILE__) . '/helper.php';

// Handle reset request
if (isset($_POST['reset']) && $_POST['reset'] == '1') {
    $_SESSION['chat_history'] = [];
    // Redirect untuk menghindari resubmission form
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Get all parameters
$assistantName = $params->get('assistant_name', 'AI JokoVlog');
$model = $params->get('model', 'llama3');
$apiUrl = $params->get('api_url', 'http://localhost:11434');

// Initialize chat history
if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = [];
}

// Process user input - hanya jika bukan redirect setelah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_input']) && !isset($_SESSION['last_input'])) {
    $userInput = strip_tags($_POST['user_input']);
    
    // Simpan input terakhir untuk mencegah resubmission
    $_SESSION['last_input'] = $userInput;
    
    $chatResponse = ModOllamaChatHelper::getResponse($apiUrl, $model, $userInput);
    
    $_SESSION['chat_history'][] = ['role' => 'user', 'content' => $userInput];
    $_SESSION['chat_history'][] = ['role' => 'assistant', 'content' => $chatResponse];
    
    // Redirect untuk menghindari resubmission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
} elseif (isset($_SESSION['last_input'])) {
    // Hapus last_input setelah redirect
    unset($_SESSION['last_input']);
}

$chatHistory = $_SESSION['chat_history'];

require JModuleHelper::getLayoutPath('mod_ollama_chat');