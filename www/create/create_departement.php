<?php

$nomClasse = "Departement";
$nomTable = "departement";
$identifiant_table = "departement_id";

$tableau = array(
	'departement_id' => 'id',
	'region_id' => 'regionId',
	'departement_nom' => 'nom',
	'departement_numero' => 'numero',
	'departement_fichier' => 'fichier'
);

include('../create.php');

?>