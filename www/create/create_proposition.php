<?php

$nomClasse = "Proposition";
$nomTable = "proposition";
$identifiant_table = "proposition_id";

$tableau = array(
	'proposition_id' => 'id',
	'proposition_titre' => 'titre',
	'proposition_description' => 'description',
	'utilisateur_id' => 'utilisateurId',
	'proposition_date' => 'date',
	'proposition_update' => 'update',
	'proposition_image' => 'image',
	'niveau_id' => 'niveauId',
	'proposition_cout' => 'cout',
	'proposition_zone' => 'zone',
	'proposition_financement' => 'financement',
	'proposition_impact' => 'impact',
	'proposition_delai' => 'delai',
	'proposition_periode' => 'periode',
	'proposition_statut' => 'statut',
	'categorie_id' => 'categorieId',
	'proposition_transmission' => 'transmission',
	'proposition_resultat' => 'resultat',
	'proposition_dureesoutien' => 'dureeSoutien',
	'proposition_dureedebat' => 'dureeDebat',
	'proposition_dureevote' => 'dureeVote'
);

include('../create.php');

?>