<?php

$nomClasse = "Debat";
$nomTable = "debat";
$identifiant_table = "debat_id";

$tableau = array(
	'debat_id' => 'id',
	'proposition_id' => 'propositionId',
	'utilisateur_id' => 'utilisateurId',
	'debat_date' => 'date',
	'debat_ip' => 'ip',
	'debat_statut' => 'statut'
);

include('../create.php');

?>