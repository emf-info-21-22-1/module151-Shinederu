<?php
require_once('wrk/UserDBmanager.php');
require_once('ctrl/SessionManager.php');
require_once('beans/User.php');
class UserCtrl
{

    private $userDBmanager;
    private $sessionManager;

    public function __construct()
    {
        $this->userDBmanager = new UserDBManager();
        $this->sessionManager = new SessionManager();
    }


    public function deleteUser($pkUser)
    {

        $currentUser = $this->sessionManager->get("currentUser");
        if (isset($currentUser) && $currentUser->getIsAdmin == 1) {
            $this->userDBmanager->deleteOne($pkUser);
            $result = "utilisateur supprimé";
        } else {
            $result = "Aucun utilisateur connecté ou droits insufisant";
        }
        return $result;
    }


    public function modifyUser($pkUser, $username, $isAdmin)
    {
        $currentUser = $this->sessionManager->get("currentUser");
        if (isset($currentUser) && $currentUser->getIsAdmin == 1) {
            $this->userDBmanager->updateUser($pkUser, $username, $isAdmin);
            $result = "Utilisateur modifié";
        } else {
            $result = "Aucun utilisateur connecté ou droits insufisant";
        }

        return $result;
    }




}

?>