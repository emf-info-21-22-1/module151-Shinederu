<?php
require_once('wrk/LoginDBmanager.php');
require_once('ctrl/SessionManager.php');
class LoginManager
{

    private $managerDB;
    private $sessionManager;

    public function __construct()
    {
        $this->managerDB = new LoginDBManager();
        $this->sessionManager = new SessionManager();
    }

    public function checkLogin($username, $password)
    {
        $status = $this->managerDB->CheckLogin($username, $password);
        //-1 = Utilisateur non trouvé dans la DB avec ces paramètres
        // Autrement, retourne la PK de l'utilisateur.
        if ($status == -1) {
            $result = "Identifiant incorrect";
        } else {
            $this->sessionManager->set("currentUser", $status);
        }
        return $result;
    }

    public function disconnect()
    {
       
    }

    public function register()
    {
       
    }



}

?>