<?php
require_once('wrk/LoginDBmanager.php');
require_once('wrk/UserDBmanager.php');
require_once('ctrl/SessionManager.php');
require_once('beans/User.php');


class LoginCtrl
{

    private $userDBmanager;
    private $loginDBmanager;
    private $sessionManager;


    public function __construct()
    {
        $this->loginDBmanager = new LoginDBManager();
        $this->userDBmanager = new UserDBManager();
        $this->sessionManager = SessionManager::getInstance();
    }

    public function checkLogin($username, $password)
    {
        if ($this->sessionManager->get('logged') == false) {
            $status = $this->loginDBmanager->checkLogin($username, $password);

            if ($status == true) {
                
                $newUser = $this->userDBmanager->getByPseudo($username);

                $this->sessionManager->set('username', $newUser->getPseudo());
                $this->sessionManager->set('pk', $newUser->getPk());
                $this->sessionManager->set('isAdmin', $newUser->getIsAdmin());
                $this->sessionManager->set('logged', true);

                $infos = 'Utilisateur connecté';
                http_response_code(200);
            } else {
                $infos = 'Identifiant(s) invalide(s)';
                http_response_code(401);
            }
        } else {
            $infos = 'Utilisateur déjà connecté';
            $status = false;
            http_response_code(401);
        }
        return json_encode(array('status' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );
    }

    public function disconnect()
    {
        $status = false;

        if($this->sessionManager->get('logged') == true){

        $status = $this->sessionManager->clear();
        $this->sessionManager->set('logged', false);
        http_response_code(200);
        $infos = 'Session détruite. Passage en mode visiteur !';
        
        } else {
            $infos = 'Aucun utilisateur connecté';
        }
        return json_encode(array('status' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );
    }


    public function register($username, $password)
    {
        $usernameAlreadyExist = $this->loginDBmanager->checkUsernameAlreadyExist($username);
        if ($usernameAlreadyExist == false) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $status = $this->userDBmanager->addUser($username, $hashedPassword);

            if ($status) {
                $infos = "Création de l'utilisateur. Vous pouvez vous connecter !";
                http_response_code(200);
            } else {
                $infos = "Echec de la création de l'utilisateur. Essayez de renter, sinon contactez un admin !";
                http_response_code(500);
            }

        } else {
            $status = false;
            $infos = "Ce nom d'utilisateur est déjà pris... Tentez autre chose !";
            http_response_code(401);
        }

        return json_encode(array('status' => $status, 'infos' => $infos), JSON_UNESCAPED_UNICODE );

    }


}
?>