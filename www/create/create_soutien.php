<?php

$nomClasse = "Soutien";
$nomTable = "soutien";
$identifiant_table = "soutien_id";

$tableau = array(
	'soutien_id' => 'id',
	'proposition_id' => 'propositionId',
	'utilisateur_id' => 'utilisateurId',
	'soutient_date' => 'date',
	'soutient_ip' => 'ip'
);

include('../create.php');

?>