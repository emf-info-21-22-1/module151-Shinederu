<?php
include_once('ctrl/MessageCtrl.php');


$messageCtrl = new MessageCtrl();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getAllMessage") {

        http_response_code(200);
        echo $messageCtrl->getAllMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "addMessage") {

        http_response_code(200);
        echo $messageCtrl->addMessage($_POST['message']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "deleteMessage") {
        
        http_response_code(200);
        echo $messageCtrl->deleteMessage($_POST['pkMessage']);
    }
}

?>