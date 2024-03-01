<?php
header('Access-Control-Allow-Origin: http://localhost:8980');
header('Access-Control-Allow-Credentials: true');
include_once('ctrl/MessageManager.php');

session_start();
$messageManager = new MessageManager();
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "delete") {
        echo $messageManager->deleteOne($_POST['pkMessage']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "ajouter") {
        echo $messageManager->addOne($_POST['message']);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "recuperer") {
        echo $messageManager->getAll();
    }
}

?>