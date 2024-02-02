<?php

$date = new DateTime;
echo "La date du jour est: ".$date->format('d/m/Y');
echo "<br>";

echo "La date de demain est: ".$date->modify("+1 day")->format('d/m/Y');
echo "<br>";
echo "<br>";
echo "Nous sommes un : ".$date->format("l");
echo "<br>";
echo "L'heure d'actualisation de la page est: ".$date->modify("+1 hour")->format("G:i:s");



echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "=========================nouvelle section==============================";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

class Personne{

    private string $nom = "inconnu";
    public int $age = 0;

    public function setNom($tempNom): void{
        $this->nom = $tempNom;
    }
    public function getNom(): string{
        return $this->nom;
    }

    public function getAge(): string{
        return $this->age;
    }

}


$gars1 = new Personne();
$gars2 = new Personne();

$gars1->age=22;
//$gars1->nom="Melvyn";
$gars1->setNom("Melvyn");

var_dump($gars1);
echo "<br>";
var_dump($gars2);


echo "<br>";
echo "<br>";
echo "<br>";

echo "Bonjour, je m'appelle ".$gars1->getNom()." et j'ai ".$gars1->getAge()." an(s) ! ";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "=========================nouvelle section==============================";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

include_once('Membre.php');

$membre = new Membre("Samuel",18);
$nom = $membre->getNom();
$Numero = $membre->numero;

echo 'Un nouveau membre! Nom: ' .$nom. ', son âge: ' .$Numero. '.';


?>