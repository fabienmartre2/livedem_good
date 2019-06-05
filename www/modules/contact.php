<?php

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Contact');
$smarty->assign('HEAD_DESCRIPTION', MARQUE);
$smarty->assign('HEAD_KEYWORDS', MARQUE);

$smarty->assign('success', false);
$error = "";

// Formulaire envoyé
if(isset($_POST['send'])){
	// On vérifie le captcha
	if($_SESSION['contact'] != strtoupper($_POST['spam'])){
		$error .= "Code de confirmation incorrect<br />";
	}
	// Vérification des champs obligatoire
	if(!isset($_POST['nom']) || empty($_POST['nom'])){
		$error .= "Vous devez renseigner votre nom<br />";
	}
	if(!isset($_POST['type']) || empty($_POST['type'])){
		$error .= "Vous devez renseigner votre civilité<br />";
	}
	if(!isset($_POST['email']) || empty($_POST['email'])){
		$error .= "Vous devez renseigner votre adresse e-mail<br />";
	}
	if(!isset($_POST['message']) || empty($_POST['message'])){
		$error .= "Vous devez saisir un message<br />";
	}
	// Vérification de l'adresse E-Mail
	$modele='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	if(!empty($_POST['email']) && !preg_match($modele,$_POST['email'])){
		$error .= "Adresse E-Mail invalide";
	}
	// Pas d'erreur, on envoie le message
	if(empty($error)){
		// Objet
		// Message
		$message = ((isset($_POST['type']) && !empty($_POST['type'])) ? '<b>Civilité</b> : '.htmlentities(stripslashes($_POST['type'])).'<br />' : '').
							 ((isset($_POST['nom']) && !empty($_POST['nom'])) ? '<b>Nom</b> : '.htmlentities(stripslashes($_POST['nom'])).'<br />' : '').
							 ((isset($_POST['prenom']) && !empty($_POST['prenom'])) ? '<b>Prénom</b> : '.htmlentities(stripslashes($_POST['prenom'])).'<br />' : '').
							 ((isset($_POST['tel']) && !empty($_POST['tel'])) ? '<b>Téléphone fixe</b> : '.htmlentities(stripslashes($_POST['tel'])).'<br />' : '').
							 ((isset($_POST['email']) && !empty($_POST['email'])) ? '<b>Email</b> : '.htmlentities(stripslashes($_POST['email'])).'<br />' : '').
							 '<br />'.
							 stripslashes(nl2br(strip_tags($_POST['message'])));
		Mail::send(EMAIL, MARQUE.' - Formulaire de contact', $message);
		$smarty->assign('success', true);
	}
	$smarty->assign('error', $error);

}

$smarty->display('contact.tpl');

?>