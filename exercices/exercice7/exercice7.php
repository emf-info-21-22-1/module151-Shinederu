<?php
$bdd = new PDO('mysql:host=localhost;dbname=nomDB', 'root', 'pwd');
$sqlQuery = "SELECT titre from jeux_video";

$recipesStatement = $bdd->prepare($sqlQuery);
$recipesStatement->execute();
$jeux = $recipesStatement->fetchAll();


while ($jeux->next()) {

	echo $jeux->getTitre();


}
$reponse->closeCursor();
?>