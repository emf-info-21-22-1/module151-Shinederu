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

        $this->wrk->getEquipes();

    }


    public function getJoueurs($pkEquipe)
    {

        $this->wrk->getJoueurs($pkEquipe);

    }

}

?>