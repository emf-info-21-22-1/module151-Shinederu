<?php
include_once('ctrl/LoginCtrl.php');

$loginCtrl = new LoginCtrl();

switch ($_POST['action']) {

    case 'checklogin':
        
        echo $loginCtrl->checkLogin($_POST['username'], $_POST['password']);
        break;

    case 'disconnect':
        echo $loginCtrl->disconnect();
        break;

    case 'register':
        echo $loginCtrl->register($_POST['username'], $_POST['password']);
        break;
}
?>