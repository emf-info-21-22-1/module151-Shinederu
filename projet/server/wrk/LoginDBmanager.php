<?php
require_once('wrk/Connexion.php');
class LoginDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }

    public function checkLogin($username, $password)
    {
        $query = $this->connexion->selectQuery("select pk from t_user where name=? and password=?;", array($username, $password));
        if ($query->rowCount() == 1) {
            $result = $query->fetch();
        } else {
            $result = -1;
        }
        return $result;
    }



}

?>