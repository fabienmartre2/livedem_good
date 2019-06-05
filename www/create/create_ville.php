<?php

$nomClasse = "Ville";
$nomTable = "ville";
$identifiant_table = "ville_id";

$tableau = array(
	'ville_id' => 'id',
	'ville_nom' => 'nom',
	'ville_article' => 'article',
	'ville_codepostal' => 'codepostal',
	'departement_id' => 'departementId',
	'ville_lat' => 'lat',
	'ville_long' => 'long',
	'ville_fichier' => 'fichier'
);

include('../create.php');

?>