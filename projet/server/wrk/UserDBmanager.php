<?php
require_once('wrk/Connexion.php');
require_once('bean/User.php');
class UserDBManager
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = connexion::getInstance();
    }

    public function getAll()
    {

        $query = $this->connexion->selectQuery("select pkUser, pseudo, isAdmin from t_user;", null);

        $result = array();
        foreach ($query as $row) {
            $user = new User($row['pkUser'], $row['pseudo'], $row['isAdmin']);
            $result[] = $user;
        }

        return $result;
    }


    public function getByPseudo($username)
    {

        $query = $this->connexion->selectQuery("select pkUser from t_user where pseudo=?;", array($username));

        $result = array();
        foreach ($query as $row) {
            $user = new User($row['pkUser'], $row['pseudo'], $row['isAdmin']);
            $result[] = $user;
        }

        return $result;
    }



    public function addUser($username, $password)
    {
        $query = $this->connexion->executeQuery("insert into t_user (pseudo, password) values (?, ?);", array($username, $password));
        return $query;


    }


    public function deleteOne($pkUser)
    {

        $query = $this->connexion->executeQuery("delete from t_message where pkMessage = ?;", array($pkUser));

        return $query;

    }


    public function updateUser($pkUser, $username, $isAdmin)
    {
        $query = $this->connexion->executeQuery("update t_user set pseudo = ?, isAdmin = ? where pkUser = ?;", array($username, $isAdmin, $pkUser));

        return $query;
    }


}

?>