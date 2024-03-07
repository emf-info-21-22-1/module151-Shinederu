<?php
include_once('ctrl/MessageCtrl.php');


$messageCtrl = new MessageCtrl();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getAllMessage") {

        
        echo $messageCtrl->getAllMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == "addMessage") {

       
        echo $messageCtrl->addMessage($_POST['message']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "deleteMessage") {
        
       
        echo $messageCtrl->deleteMessage($_POST['pkMessage']);
    }
}

?>