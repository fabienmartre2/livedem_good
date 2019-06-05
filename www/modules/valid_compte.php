<?php

$success = false;
$error = "";
if(isset($_GET['utilisateur']) && isset($_GET['valid']) && !empty($_GET['utilisateur']) && !empty($_GET['valid'])){
	$utilisateur_id = $_GET['utilisateur'];
	$valid = $_GET['valid'];
	$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array(array("utilisateur_id = :utilisateur_id", "utilisateur_valid = :valid"), array(':utilisateur_id' => $utilisateur_id, ':valid' => $valid)) );
	if(empty($utilisateurs))
		$error .= "Le lien que vous suivez est incorrect<br />";
	else{
		$utilisateur = $utilisateurs[0];
		$utilisateur->setValid('');
		$success = true;
	}

	// Affichage du formulaire
	$HEAD_TITLE = MARQUE." - Validation de votre compte";
	$HEAD_DESCRIPTION = MARQUE." - Validation de votre compte";


	$smarty->assign('HEAD_TITLE', $HEAD_TITLE);
	$smarty->assign('HEAD_DESCRIPTION', $HEAD_DESCRIPTION);

	$smarty->assign('success', $success);
	$smarty->assign('error', $error);

	$smarty->display('valid_compte.tpl');
}
else{
	header('Location: '.ADRESSE.'');
}