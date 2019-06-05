<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Mon Compte');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('page_actif', "mon-compte");

$error = '';
$errorChamps = array();
$success = false;

if(Utilisateur::estConnecte()){

	if(isset($_POST['send'])){
		// On vérifie que tout est OK
		$_POST['dateNaissance'] = $_POST['dateNaissance']['Year'].'-'.$_POST['dateNaissance']['Month'].'-'.$_POST['dateNaissance']['Day'];
		if(empty($_POST['nom']))
			$error .= "Vous devez saisir un nom <br />";
		if(empty($_POST['prenom']))
			$error .= "Vous devez saisir un prenom <br />";
		if(!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			$error .= "Vérifiez votre adresse e-mail.<br />";
		if(!isset($_POST['dateNaissance']) || empty($_POST['dateNaissance']))
			$error .= "Vous devez saisir votre date de naissance.<br />";
		if(isset($_POST['password']) && !empty($_POST['password']) && $_POST['passwordc'] != $_POST['password'])
			$error .= "Veuillez vérifier votre mot de passe.<br />";
		$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array("utilisateur_email LIKE '".$_POST['email']."'"));
		if($utilisateurs && $global_utilisateur->getEmail() != $_POST['email'])
			$error .= "Cette adresse e-mail est déjà associée à un compte<br />";

		// C'est OK
		if(empty($error)){
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			if(!empty($_POST['password'])){
				$_POST['password'] = md5($_POST['password']);
			}
			else{
				unset($_POST['password']);
			}
			$global_utilisateur->updateUtilisateur($_POST);
			$success = true;
		}
	}

	$smarty->assign('utilisateur', $global_utilisateur);
	$smarty->assign('ville', Ville::selectVille($global_utilisateur->getVilleId()));
	$smarty->assign('error', $error);
	$smarty->assign('errorChamps', $errorChamps);
	$smarty->assign('success', $success);

	$smarty->assign('prop_cree', Proposition::selectPropositions(1, 0, array('utilisateur_id = "'.$global_utilisateur->getId().'"')));
	$smarty->assign('prop2', Proposition::selectPropositions(1, 0, array('proposition_id IN (SELECT proposition_id FROM soutien WHERE utilisateur_id = "'.$global_utilisateur->getId().'")')));
	$smarty->assign('prop3', Proposition::selectPropositions(1, 0, array('proposition_id IN (SELECT proposition_id FROM debat WHERE utilisateur_id = "'.$global_utilisateur->getId().'")')));
	$smarty->assign('prop4', Proposition::selectPropositions(1, 0, array('proposition_id IN (SELECT proposition_id FROM vote WHERE utilisateur_id = "'.$global_utilisateur->getId().'")')));

	$smarty->display('mon-compte.tpl');
}
else
	include('404.php');
?>