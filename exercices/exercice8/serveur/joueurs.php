<?php

require_once("Wrk/ConfigConnexion.php");
require_once("Beans/Equipe.php");
require_once("Beans/Joueur.php");
require_once("Wrk/Wrk.php");
require_once("Ctrl/Ctrl.php");

$ctrl = new Ctrl();

///echo "hello";

if ($_GET['action'] == "equipe")
{
	$ctrl->getEquipes();
}

if ($_GET['action'] == "joueur")
{
	if (isset($_GET["equipeId"]))
	{
		$ctrl->getJoueurs($_GET["equipeId"]);
	}
}

?>