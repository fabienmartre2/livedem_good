<?php

if(!Utilisateur::estConnecte())
	header('Location: '.ADRESSE.'connexion.html');

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Ajouter une nouvelle discussion');
$smarty->assign('HEAD_DESCRIPTION', MARQUE.' - Ajouter une nouvelle discussion');
$smarty->assign('HEAD_KEYWORDS', MARQUE);
$smarty->assign('page_actif', "discussions");

$error = '';
$errorChamps = array();
$success = false;

if(isset($_POST['send'])){
	// On vérifie que tout est OK
	if(!isset($_POST['nom']) || empty($_POST['nom']))
		$error .= "Vous devez saisir un nom.<br />";
	if(!isset($_POST['sujet']) || empty($_POST['sujet']))
		$error .= "Vous devez saisir un sujet.<br />";

	// C'est OK
	if(empty($error)){
		$_POST['utilisateurId'] = $global_utilisateur->getId();
		$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
		$utilisateur_id = Groupe::insertGroupe($_POST);
		$success = true;
		// 2 Jockers de validation de propositions

	}
}


$smarty->assign('error', $error);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('success', $success);
$smarty->display('discussion_add.tpl');

?>