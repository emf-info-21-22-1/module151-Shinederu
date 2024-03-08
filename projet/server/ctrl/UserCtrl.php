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

    public function getAllUsers()
    {
        $status = false;
        $usersList = false;
        if ($this->sessionManager->get('logged')) {
            if ($this->sessionManager->get('isAdmin') == true) {
                $usersList = $this->userDBmanager->getAllUsers();
                $infos = 'Accès à la liste des utilisateurs autorisé';
                $status = true;
                http_response_code(200);
            } else {
                $infos = 'Accès refuser. Permission insuffisante';
                http_response_code(401);
            }
        } else {

            $infos = 'Accès refuser. Aucun administrateur connecté !';
            http_response_code(401);
        }
        return json_encode(array('succes' => $status, 'infos' => $infos, 'users' => $usersList), JSON_UNESCAPED_UNICODE );
    }



    public function updateUser($pkUser, $username, $isAdmin)
    {
        $status = false;
        if ($this->sessionManager->get('logged')) {
            if ($this->sessionManager->get('isAdmin') == true) {
                $status = $this->userDBmanager->updateUser();
                if ($status) {
                    $infos = 'Accès à la liste des utilisateurs autorisé';
                    http_response_code(200);
                } else {
                    $infos = "Un problème est survenu. Impossible de modifier l'utilisateur";
                    http_response_code(500);
                }
            } else {
                $infos = 'Accès refuser. Permission insuffisante';
                http_response_code(401);
            }
        } else {

            $infos = 'Accès refuser. Aucun administrateur connecté !';
            http_response_code(401);
        }
        return json_encode(array('succes' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );
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




}

?>