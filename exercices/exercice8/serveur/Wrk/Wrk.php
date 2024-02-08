<?php
class Wrk
{

    private $dbConnexion = null;
    public function __construct()
    {
        $this->dbConnexion = new dbConnexion();
    }



    public function getEquipes(): array
    {

        return $this->dbConnexion->getEquipes();

    }

    public function getJoueurs($pkEquipe): array
    {

        return $this->dbConnexion->getJoueurs($pkEquipe);

    }


}






?>