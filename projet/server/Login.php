<?php
header('Access-Control-Allow-Origin: *');
include_once('ctrl/LoginManager.php');

$loginManager = new LoginManager();
switch ($_POST['action']) {
    case 'checklogin':
        echo $loginManager->checkLogin($_POST['username'], $_POST['password']);
        break;
    case 'disconnect':
        echo $loginManager->disconnect();
        break;
    case 'register':
        echo $loginManager->register($_POST['username'], $_POST['password']);
        break;
}
?>