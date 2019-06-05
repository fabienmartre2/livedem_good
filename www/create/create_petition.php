<?php

$nomClasse = "Petition";
$nomTable = "petition";
$identifiant_table = "petition_id";

$tableau = array(
	'petition_id' => 'id',
	'petition_titre' => 'titre',
	'petition_description' => 'description',
	'utilisateur_id' => 'utilisateurId',
	'petition_date' => 'date',
	'petition_image' => 'image',
	'petition_statut' => 'statut',
	'categorie_id' => 'categorieId'
);

include('../create.php');

?>