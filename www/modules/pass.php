<?php


$error = '';
$errorChamps = array();
$success = false;

if(isset($_POST['connexion'])){
	if($_SESSION['contact'] != strtoupper($_POST['spam'])){
		$error .= "Code de confirmation incorrect<br />";
	}
	$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array(array("utilisateur_email LIKE :email"), array(':email' => $_POST['email'])));
	if(empty($utilisateurs)){
		$error .= "Compte inconnu<br />";
	}

	if(empty($error)){
		$password = random(10);
		$utilisateur = $utilisateurs[0];
		$utilisateur->setPassword(md5($password));
		$texte = "Bonjour, <br /><br />
		Vous avez demandé un nouveau mot de passe pour votre compte sur ".MARQUE."<br /><br />
		Voici vos accès : <br />
		Pseudo : ".$utilisateur->getPseudo()."<br />
		E-mail : ".$utilisateur->getEmail()."<br />
		Mot de passe : ".$password."<br /><br />
		A très bientôt,
		L'équipe de ".MARQUE."";
		Mail::send($utilisateur->getEmail(), MARQUE." - Nouveau mot de passe", $texte);
		$success = true;
	}
		
}

$smarty->assign('success', $success);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('error', $error);
$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Mot de passe perdu');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->display('pass.tpl');

?>