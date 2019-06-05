<?php

$nomClasse = "PropositionModif";
$nomTable = "propositionmodif";
$identifiant_table = "propositionmodif_id";

$tableau = array(
	'propositionmodif_id' => 'id',
	'proposition_id' => 'propositionId',
	'propositionmodif_oldstatut' => 'oldStatut',
	'propositionmodif_newstatut' => 'newStatut',
	'propositionmodif_date' => 'date'
);

include('../create.php');

?>