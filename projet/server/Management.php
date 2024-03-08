<?php
include_once('ctrl/UserCtrl.php');

header('Access-Control-Allow-Origin: http://localhost:8080');
header('Access-Control-Allow-Credentials: true');

$userCtrl = new UserCtrl();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['action'] == "getAllUsers") {
        echo $userCtrl->getAllUsers();
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($_REQUEST['action'] == "updateUser") {
        echo $userCtrl->updateUser($_REQUEST["pkUser"], $_REQUEST["username"], $_REQUEST["isAdmin"]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "deleteUser") {
        echo $userCtrl->deleteUser($_DELETE['pkUser']);
    }
}

?>