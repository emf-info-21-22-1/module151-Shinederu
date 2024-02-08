<?php
class Ctrl
{

    public $wrk = null;

    public function __construct()
    {
        $this->wrk = new Wrk();
    }


    public function getEquipes()
    {

        $listeEquipe = $this->wrk->getEquipes();

        echo json_encode($listeEquipe);

    }


    public function getJoueurs($pkEquipe)
    {

        $listeJoueurs = $this->wrk->getJoueurs($pkEquipe);

        echo json_encode($listeJoueurs);

    }

}

?>