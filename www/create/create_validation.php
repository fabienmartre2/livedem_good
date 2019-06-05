<?php

$nomClasse = "Validation";
$nomTable = "validation";
$identifiant_table = "validation_id";

$tableau = array(
	'validation_id' => 'id',
	'proposition_id' => 'propositionId',
	'utilisateur_id' => 'utilisateurId',
	'validation_statut' => 'statut',
	'validation_date' => 'date',
	'validation_ip' => 'ip'
);

include('../create.php');

?>