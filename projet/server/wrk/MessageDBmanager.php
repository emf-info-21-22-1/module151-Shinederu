<?php
require_once('wrk/Connexion.php');
require_once('bean/Message.php');
class MessageDBManager
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = connexion::getInstance();
    }

    public function getAll()
    {

        $query = $this->connexion->selectQuery("select pkMessage, date, message, fkUser from t_message;", null);

        $result = array();
        foreach ($query as $row) {
            $message = new Message($row['pkMessage'], $row['date'], $row['message'], $row['fkUser']);
            $result[] = $message;
        }

        return $result;
    }


    public function addOne($date, $message, $fkUser)
    {

        $query = $this->connexion->insertQuery("insert into t_message (date, message, fkUser) values (?, ?, ?);", array($date, $message, $fkUser));



        return $query;
    }


    public function deleteOne($pkMessage)
    {

        $query = $this->connexion->deleteQuery("delete from t_message where pkMessage = ?;", array($pkMessage));

        return $query;

    }

}

?>