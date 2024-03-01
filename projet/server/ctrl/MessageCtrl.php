<?php
require_once('wrk/MessageDBmanager.php');
require_once('ctrl/SessionManager.php');
require_once('beans/Message.php');
class MessageCtrl
{

    private $messageDBmanager;
    private $sessionManager;

    public function __construct()
    {
        $this->messageDBmanager = new MessageDBManager();
        $this->sessionManager = SessionManager::getInstance();
    }


    //Retourne la liste des messages
    public function getAllMessage()
    {
        $listeMessage = $this->messageDBmanager->getAll();
        return json_encode(array('messages' => $listeMessage));
    }

    //Retourne un boolean avec une info
    public function addMessage($message)
    {
        $currentUserName = $this->sessionManager->get("username");
        if (isset($currentUserName)) {

            $refUser = $this->sessionManager->get("pk");
            $date = date('Y.m.d');
            $status = $this->messageDBmanager->addMessage($date, $message, $refUser);


            if ($status) {

                $infos = "Message posté)";

            } else {

                $infos = "Une erreur est survenue. Le message n'a pas été posté !)";

            }

        } else {

            $infos = "Aucun utilisateur connecté, impossible de publier le message";
            $status = false;

        }
        return json_encode(array('succes' => $status, 'infos' => $infos));
    }

    public function deleteMessage($pkMessage)
    {

        $currentUserName = $this->sessionManager->get("username");
        $currentUserIsAdmin = $this->sessionManager->get("isAdmin");

        if (isset($currentUserName) && $currentUserIsAdmin == true) {

            $status = $this->messageDBmanager->deleteMessage($pkMessage);

            if ($status) {

                $infos = "Message supprimé)";

            } else {

                $infos = "Une erreur est survenue. Le message n'a pas été supprimé !)";
                
            }

        } else {

            $status = false;
            if (isset($currentUserName) == true) {

                $info = 'Droits insuffisants. Opération impossible !';

            } else {

                $info = 'Aucun utilisateur actuellement connecté. Opération impossible !';

            }



        }
        return json_encode(array('succes' => $status, 'infos' => $infos));
    }



}

?>