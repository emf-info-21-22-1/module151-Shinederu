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
        $result = $this->connexion->selectQuery("SELECT password FROM t_user WHERE pseudo=?;", array($username));
        if (count($result) > 0) {

            $passwordFromDB = $result[0]['password'];
            if (password_verify($password, $passwordFromDB)) {
                $status = true;
            } else {
                $status = false;
            }

        } else {
            $status = false;
        }
        return $status;
    }

    public function checkUsernameAlreadyExist($username)
    {
        $result = $this->connexion->selectQuery('SELECT pkUser FROM t_user WHERE pseudo=?;', array($username));
        $status = false;
        if (count($result) > 0) {
            $status = true;
        }
        return $status;
    }



}

?>