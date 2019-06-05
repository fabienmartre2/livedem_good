<?php

if(!Utilisateur::estConnecte())
	header('Location: '.ADRESSE.'connexion.html');

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Soumettre une nouvelle petition');
$smarty->assign('HEAD_DESCRIPTION', MARQUE.' - Soumettre une nouvelle petition');
$smarty->assign('HEAD_KEYWORDS', MARQUE);
$smarty->assign('page_actif', "petitions");

$error = '';
$errorChamps = array();
$success = false;

if(isset($_POST['send'])){
	// On vérifie que tout est OK
	if(!isset($_POST['titre']) || empty($_POST['titre']))
		$error .= "Vous devez saisir un titre.<br />";
	if(!isset($_POST['description']) || empty($_POST['description']))
		$error .= "Vous devez saisir une description.<br />";
	if(!isset($_POST['categorieId']) || empty($_POST['categorieId']))
		$error .= "Vous devez choisir une catégorie.<br />";
	if(!isset($_POST['verif']) || empty($_POST['verif']))
		$error .= "Vous devez vérifier que cette petition n'existe pas déjà.<br />";
	if(empty($_FILES['vignette']["name"]))
		$error .= "Vous devez choisir une illustration.<br />";
	if(!empty($_FILES['vignette']["name"])){
		$ext = strtolower(pathinfo($_FILES['vignette']["name"], PATHINFO_EXTENSION));
		$extallow = array('jpg', 'jpeg', 'gif','png');
		if($_FILES['vignette']["error"] != 0){
			$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
		}
		if(!in_array($ext, $extallow)){
			$error .= "Extension du fichier non-autorisé : ".$ext."<br />";
		}
		if($_FILES['vignette']['size'] > 3000000){
			$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
		}
		if(empty($error))
			$_POST['image'] = Image::upload($_FILES['vignette'], 600, 600, 'upload');
	}

	// C'est OK
	if(empty($error)){
		$_POST['utilisateurId'] = $global_utilisateur->getId();
		$_POST['statut'] = 1;
		$utilisateur_id = Petition::insertPetition($_POST);
		$success = true;
		// 2 Jockers de validation de petitions

	}
}


$smarty->assign('error', $error);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('success', $success);
$smarty->display('petition_add.tpl');

?>