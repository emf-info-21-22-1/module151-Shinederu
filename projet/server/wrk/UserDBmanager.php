<?php
require_once('wrk/Connexion.php');
require_once('beans/User.php');
class UserDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = connexion::getInstance();
    }

    public function getAllUsers()
    {
        $query = $this->connexion->selectQuery("select pkUser, pseudo, isAdmin from t_user;", null);

        $userList = array();
        foreach ($query as $row) {


            $isAdmin = false;
        if ($row['isAdmin'] == 1) {
            $isAdmin = true;
        }
            $user = new User($row['pkUser'], $row['pseudo'], $isAdmin);
            $userList[] = $user;
        }

        return $userList;
    }

    //retourne l'utilisateur en partant du pseudo (unique dans la DB)
    public function getByPseudo($username): User
    {
        $query = $this->connexion->selectQuery("select pkUser, isAdmin from t_user where pseudo=?;", array($username));
        $row = $query[0];

        $isAdmin = false;
        if ($row['isAdmin'] == 1) {
            $isAdmin = true;
        }

        $user = new User($row['pkUser'], $username, $isAdmin);

        return $user;
    }



    public function addUser($username, $password)
    {
        $query = $this->connexion->executeQuery("insert into t_user (pseudo, password) values (?, ?);", array($username, $password));
        return $query;


    }


    public function deleteUser($pkUser)
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