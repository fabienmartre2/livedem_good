<?php

$nomClasse = "Annexe";
$nomTable = "annexe";
$identifiant_table = "annexe_id";


$tableau = array(
	'annexe_id' => 'id',
	'annexe_titre' => 'titre',
	'annexe_contenu' => 'contenu',
	'annexe_description' => 'description',
	'annexe_keywords' => 'keywords',
	'annexe_fichier' => 'fichier',
	'annexe_protected' => 'protected'
);

include('../create.php');

?>