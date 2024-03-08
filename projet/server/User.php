<?php
include_once('ctrl/UserCtrl.php');

$userCtrl = new UserCtrl();
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "delete") {
        echo $userCtrl->deleteUser($_DELETE['pkUser']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($_PUT['action'] == "modify") {
        echo $userCtrl->modifyUser($_PUT["pkUser"], $_PUT["username"], $_PUT["isAdmin"]);
    }
}
?>