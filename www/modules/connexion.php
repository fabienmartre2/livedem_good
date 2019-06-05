<?php

$success = false;
$errorChamps = array();
$error = '';

if(isset($_POST['connexion'])){
	$utilisateurs = Utilisateur::selectUtilisateurs(1, 1, array(array("(utilisateur_email LIKE :email OR utilisateur_pseudo LIKE :email)", "utilisateur_password = md5(:password)"), array(':email' => $_POST['pseudo'], ':password' => $_POST['password'])) );
	if($utilisateurs){
		$utilisateur = $utilisateurs[0];
		$valid = $utilisateur->getValid();
		if(!empty($valid)){
			$error .= 'Vous devez valider votre compte pour vous connecter<br />';
		}
		else{
			$_SESSION['id'] = $utilisateur->getId();
			$success = true;
			if(isset($_SESSION['precedent']) && !empty($_SESSION['precedent']))
				header('Refresh:2; url='.$_SESSION['precedent']);
			else
				header('Refresh:2; url='.ADRESSE);
		}
	}
	else
		$error .= 'Email et/ou Mot de passe incorrect<br />';
}

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Connexion à votre espace membre');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('success', $success);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('error', $error);

$smarty->display('connexion.tpl');

?>