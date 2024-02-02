<?php
class Wrk
{



    private $listeEquipes = array('Gotteron', 'SC Bern', 'Fribourg-Gottéron', 'HC Davos');


    public function getListeEquipesFromDBB(): array
    {

     
        return $this->listeEquipes;

    }

}


?>