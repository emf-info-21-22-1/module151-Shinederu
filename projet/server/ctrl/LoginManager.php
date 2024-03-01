<?php
require_once('wrk/LoginDBmanager.php');
require_once('wrk/UserDBmanager.php');
require_once('ctrl/SessionManager.php');
class LoginManager
{

    private $loginDBmanager;
    private $sessionManager;

    public function __construct()
    {
        $this->loginDBmanager = new LoginDBManager();
        $this->userDBmanager = new UserDBManager();
        $this->sessionManager = new SessionManager();

    }

    public function checkLogin($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $status = $this->loginDBmanager->CheckLogin($username, $hashedPassword);
        //-1 = Utilisateur non trouvé dans la DB avec ces paramètres
        // Autrement, retourne la PK de l'utilisateur.
        if ($status == -1) {
            $result = "Identifiant incorrect";
        } else {
            $currentUser = $this->userDBmanager->getUserByPK($status);
            $this->sessionManager->set("currentUser", $currentUser);
        }
        return $result;
    }

    public function disconnect()
    {
        $this->sessionManager->destroy();
        return "disconnected";
    }

    public function register($username, $password)
    {
        $registedUser = $this->userDBmanager->getByPseudo($username);
        if (count($registedUser) > 0) {
            $result = "Cet utilisateur existe déjà";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $this->userDBmanager->addUser($username, $hashedPassword);
            $this->checkLogin($username, $password);
            $result = "Inscription réussie";
        }

        return $result

    }



}

?>