<?php
include('../conf/config.php');

$retour = array();


$success = false;
$errorChamps = array();
$error = '';

if(isset($_POST['pseudo'])){
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
			$retour['success'] = 1;
		}
	}
	else
		$error .= 'Email et/ou Mot de passe incorrect<br />';
}

$retour['error'] = $error;

echo json_encode($retour);