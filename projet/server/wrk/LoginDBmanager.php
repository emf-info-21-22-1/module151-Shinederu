<?php
require_once('wrk/Connexion.php');
class LoginDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }

    //retourne boolean en fonction de la correspondance des mdp
    public function checkLogin($username, $password)
    {
        $result = $this->connexion->selectQuery("select password from t_user where pseudo=?", array($username));

        if (password_verify($password, $result)) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;
    }

    public function checkUsernameAlreadyExist($username)
    {
        $result = $this->connexion->selectQuery("select pkUser from t_user where pseudo=?", array($username));
        $status = false;
        if (count($result) > 0) {
            $status = true;
        }
        return $status;
    }



}

?>