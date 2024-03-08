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
        http_response_code(200);
        return json_encode(array('messages' => $listeMessage), JSON_UNESCAPED_UNICODE );
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

                $infos = "Message posté";
                http_response_code(200);

            } else {

                $infos = "Une erreur est survenue. Le message n'a pas été posté !";
                http_response_code(500);

            }

        } else {

            $infos = "Aucun utilisateur connecté, impossible de publier le message";
            $status = false;
            http_response_code(401);

        }
        return json_encode(array('succes' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );
    }

    public function deleteMessage($pkMessage)
    {

        $currentUserName = $this->sessionManager->get("username");
        $currentUserIsAdmin = $this->sessionManager->get("isAdmin");

        if (isset($currentUserName) && $currentUserIsAdmin == true) {

            $status = $this->messageDBmanager->deleteMessage($pkMessage);

            if ($status) {

                $infos = "Message supprimé";
                http_response_code(200);

            } else {

                $infos = "Une erreur est survenue. Le message n'a pas été supprimé !";
                http_response_code(401);
                
            }

        } else {

            $status = false;
            if (isset($currentUserName) == true) {

                $infos = 'Droits insuffisants. Opération impossible !';
                http_response_code(401);

            } else {

                $infos = 'Aucun utilisateur actuellement connecté. Opération impossible !';
                http_response_code(401);

            }



        }
        return json_encode(array('succes' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );
    }



}

?>