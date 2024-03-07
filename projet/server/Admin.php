<?php
header('Access-Control-Allow-Origin: http://localhost:8980');
header('Access-Control-Allow-Credentials: true');
include_once('ctrl/UserManager.php');

$userManager = new UserManager();
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_DELETE['action'] == "delete") {
        echo $userManager->deleteUser($_DELETE['pkUser']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($_PUT['action'] == "modify") {
        echo $userManager->modifyUser($_PUT["pkUser"], $_PUT["username"], $_PUT["isAdmin"]);
    }
}

?>