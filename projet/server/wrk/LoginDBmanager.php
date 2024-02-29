<?php
require_once('wrk/Connexion.php');
class LoginDBManager
{
    private $connexion;

    public function __construct()
    {

        $this->connexion = connexion::getInstance();
    }

    public function checkLogin($user, $password)
    {
        $query = $this->connexion->selectQuery("select pk from t_user where name=? and password=?;", array($user, $password));
        if ($query->rowCount() == 1) {
            $result = $query->fetch();
        } else {
            $result = false;
        }
        return $result;
    }



}

?>