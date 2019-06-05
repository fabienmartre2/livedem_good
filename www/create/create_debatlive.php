<?php

$nomClasse = "DebatLive";
$nomTable = "debatlive";
$identifiant_table = "debatlive_id";

$tableau = array(
	'debatlive_id' => 'id',
	'proposition_id' => 'propositionId',
	'utilisateur_id' => 'utilisateurId',
	'debatlive_date' => 'date',
	'debatlive_ip' => 'ip'
);

include('../create.php');

?>