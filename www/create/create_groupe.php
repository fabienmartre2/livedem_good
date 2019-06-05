<?php

$nomClasse = "Groupe";
$nomTable = "groupe";
$identifiant_table = "groupe_id";

$tableau = array(
	'groupe_id' => 'id',
	'groupe_nom' => 'nom',
	'thematique_id' => 'thematiqueId',
	'utilisateur_id' => 'utilisateurId',
	'groupe_sujet' => 'sujet',
	'groupe_visibilite' => 'visibilite',
	'groupe_creation' => 'creation'
);

include('../create.php');

?>