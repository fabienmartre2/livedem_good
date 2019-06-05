<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Inscription');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$error = '';
$errorChamps = array();
$success = false;

if(isset($_POST['send'])){
	// On vérifie que tout est OK
	$_POST['dateNaissance'] = $_POST['dateNaissance1']['Year'].'-'.$_POST['dateNaissance1']['Month'].'-'.$_POST['dateNaissance1']['Day'];
	if(!isset($_POST['pseudo']) || empty($_POST['pseudo']))
		$error .= 'Vous devez choisir un pseudo <br />';
	if(empty($_POST['nom']))
		$error .= "Vous devez saisir un nom <br />";
	if(empty($_POST['prenom']))
		$error .= "Vous devez saisir un prenom <br />";
	if(!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		$error .= "Vérifiez votre adresse e-mail.<br />";
	if(!isset($_POST['dateNaissance']) || empty($_POST['dateNaissance']) || empty($_POST['dateNaissance1']['Year'])  || empty($_POST['dateNaissance1']['Month'])  || empty($_POST['dateNaissance1']['Day']))
		$error .= "Vous devez saisir votre date de naissance.<br />";
	elseif(!checkdate($_POST['dateNaissance1']['Month'], $_POST['dateNaissance1']['Day'], $_POST['dateNaissance1']['Year']))
		$error .= "Date de naissance invalide.<br />";
	if(!isset($_POST['villeId']) || empty($_POST['villeId']))
		$error .= "Vous devez choisir votre ville.<br />";
	if(!isset($_POST['password']) || empty($_POST['password']))
		$error .= "Veuillez saisir un mot de passe.<br />";
	if(!isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['passwordc']) || empty($_POST['passwordc']) || $_POST['passwordc'] != $_POST['password'])
		$error .= "Veuillez vérifier votre mot de passe.<br />";
	if(!isset($_POST['cgu']) || empty($_POST['cgu']))
		$error .= "Vous devez accepter les conditions générales d'utilisation du site.<br />";
	if(isset($_POST['numSecu']) && !empty($_POST['numSecu']) && Utilisateur::checkNumSecu($_POST['numSecu']) === false) 
		$error .= "Votre numéro de sécurité sociale est invalide<br />";
	$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array("utilisateur_email LIKE '".$_POST['email']."'"));
	if($utilisateurs)
		$error .= "Cette adresse e-mail est déjà associée à un compte<br />";
	$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array("utilisateur_pseudo LIKE '".$_POST['pseudo']."'"));
	if($utilisateurs)
		$error .= "Ce pseudo est déjà utilisé<br />";

	// C'est OK
	if(empty($error)){
		$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
		$_POST['valid'] = random(10);
		$password = $_POST['password'];
		$_POST['password'] = md5($password);
		$utilisateur_id = Utilisateur::insertUtilisateur($_POST);
		$success = true;
		$texte = "Bonjour, <br /><br />
		Nous avons bien reçu votre inscription sur ".MARQUE.". Afin de compléter celle-ci, merci de suivre le lien suivant : <a href=\"".ADRESSE."valid_compte.html?utilisateur=".$utilisateur_id."&valid=".$_POST['valid']."\">".ADRESSE."valid_compte.html?utilisateur=".$utilisateur_id."&valid=".$_POST['valid']."</a><br />
		<br />
		Voici un rappel de vos identifiants :<br />
		Pseudo : ".$_POST['pseudo']."<br />
		E-mail : ".$_POST['email']."<br />
		Mot de passe : ".$password."<br />
		<br />
		A bientôt,
		L'équipe de ".MARQUE."";
		Mail::send($_POST['email'], MARQUE." - Votre inscription", $texte);
	}
}


$smarty->assign('error', $error);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('success', $success);
$smarty->display('inscription.tpl');

?>