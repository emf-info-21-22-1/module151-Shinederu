<?php
require_once('wrk/MessageDBmanager.php');
require_once('ctrl/SessionManager.php');
class MessageManager
{

    private $messageDBmanager;
    private $sessionManager;

    public function __construct()
    {
        $this->messageDBmanager = new MessageDBManager();
        $this->sessionManager = new SessionManager();
    }


    public function getAll()
    {
        $result = $this->messageDBmanager->getAll();
        return $result;
    }

    public function addOne($message)
    {
        $currentUser = $this->sessionManager->get("currentUser");
        if (isset($currentUser)) {
            $fkUser = $currentUser->getPk();
            $date = date('Y-m-d H:i:s');
            $this->messageDBmanager->addOne($date, $message, $fkUser);
            $result = "Message posté (normalement...)";
        } else {
            $result = "Aucun utilisateur connecté";
        }
        return $result;
    }

    public function deleteOne($pkMessage)
    {

        $currentUser = $this->sessionManager->get("currentUser");
        if (isset($currentUser) && $currentUser->getIsAdmin == 1) {

            $this->messageDBmanager->deleteOne($pkMessage);
            $result = "Message supprimé";

        } else {

            $result = "Aucun utilisateur connecté ou droits insufisant";

        }

        return $result;

    }



}

?>