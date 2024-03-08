<?php
include_once('ctrl/MessageCtrl.php');

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');


$messageCtrl = new MessageCtrl();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getAllMessages") {
        echo $messageCtrl->getAllMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "addMessage") {
        echo $messageCtrl->addMessage($_POST['message']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_REQUEST['action'] == "deleteMessage") {
        echo $messageCtrl->deleteMessage($_REQUEST['pkMessage']);
    }
}

?>