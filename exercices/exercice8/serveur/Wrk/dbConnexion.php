<?php
class dbConnexion
{


    private static $_instance = null;
    private $pdo;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new dbConnexion();
        }
        return self::$_instance;
    }

    private function connection()
    {

    }


    public function __construct()
    {

        try {
            $this->pdo = new PDO(
                DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASS,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                )
            );

        } catch (PDOException $e) {
            print "Erreur !" . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function isConnected()
    {
        return $this->pdo !== null;
    }




    public function getJoueurs($pkEquipe): array
    {
        $sqlQuery = "SELECT nom, points from t_joueur where FK_equipe=$pkEquipe";

        $recipesStatement = $this->pdo->prepare($sqlQuery);
        $recipesStatement->execute();

        $joueurs = $recipesStatement->fetchAll();

        $recipesStatement->closeCursor();

        return $joueurs;
    }


    public function getEquipes(): array
    {
        $sqlQuery = "SELECT PK_equipe, nom from t_equipe";

        $recipesStatement = $this->pdo->prepare($sqlQuery);
        $recipesStatement->execute();

        $equipes = $recipesStatement->fetchAll();




        return $equipes;
    }



}
?>