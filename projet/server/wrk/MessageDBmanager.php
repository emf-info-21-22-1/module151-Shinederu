<?php
require_once('wrk/Connexion.php');
require_once('beans/Message.php');
class MessageDBManager
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = connexion::getInstance();
    }

    public function getAll()
    {
        //retourne une liste de messages
        $query = $this->connexion->selectQuery("select pkMessage, date, message, fkUser from t_message;", null);
        $messagesList = array();
        foreach ($query as $row) {
            $message = new Message($row['pkMessage'], $row['date'], $row['message'], $row['fkUser']);
            $messagesList[] = $message;
        }
        return $messagesList;
    }


    public function addMessage($date, $message, $refUser)
    {
        //retourne un boolean de l'état de l'exécution
        $query = $this->connexion->executeQuery("insert into t_message (date, message, fkUser) values (?, ?, ?);", array($date, $message, $refUser));

        return $query;
    }


    public function deleteMessage($pkMessage)
    {
        //retourne un boolean de l'état de l'exécution
        $query = $this->connexion->executeQuery("delete from t_message where pkMessage = ?;", array($pkMessage));

        return $query;

    }

}

?>