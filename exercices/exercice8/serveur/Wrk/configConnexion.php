<?php
class dbConnexion{

    private $bdd = null;

    public function __construct($host , $port, $dbName, $charset, $user, $password){
        $this->bdd = new PDO('mysql:host=$host;port=3306;dbname=hockey_stats;charset=utf8', '$user', 'emf123');
    
    }

    public function getJoueurs($pkEquipe): array{
        $sqlQuery = "SELECT nom, points from t_joueur where FK_equipe=$pkEquipe";

        $recipesStatement = $bdd->prepare($sqlQuery);
        $recipesStatement->execute();

        $joueurs = $recipesStatement->fetchAll();

        $reponse->closeCursor();

        return $joueurs;
    }


    public function getEquipes(): array{
        $sqlQuery = "SELECT PK_equipe, nom from t_equipe";

        $recipesStatement = $bdd->prepare($sqlQuery);
        $recipesStatement->execute();

        $equipes = $recipesStatement->fetchAll();

        $listeEquipes = new ArrayObject();

        
        return $listeEquipes
    }



}
?>