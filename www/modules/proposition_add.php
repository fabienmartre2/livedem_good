<?php

if(!Utilisateur::estConnecte())
	header('Location: '.ADRESSE.'connexion.html');

$smarty->cache_lifetime = 60;
$smarty->assign('HEAD_TITLE', MARQUE.' - Soumettre une nouvelle proposition');
$smarty->assign('HEAD_DESCRIPTION', MARQUE.' - Soumettre une nouvelle proposition');
$smarty->assign('HEAD_KEYWORDS', MARQUE);

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
	if(!isset($_POST['niveauId']) || empty($_POST['niveauId']))
		$error .= "Vous devez choisir un niveau électoral.<br />";

	if(isset($_POST['niveauId']) && $_POST['niveauId'] == 1){
		$_POST['departementId'] = '';
		$_POST['regionId'] = '';
		if(!isset($_POST['villeId']) || empty($_POST['villeId'])){
			$error .= "Vous devez choisir la ville<br />";
		}
	}

	if(isset($_POST['niveauId']) && $_POST['niveauId'] == 2){
		$_POST['villeId'] = '';
		$_POST['regionId'] = '';
		if(!isset($_POST['villeId']) || empty($_POST['villeId'])){
			$error .= "Vous devez choisir le département<br />";
		}
	}

	if(isset($_POST['niveauId']) && $_POST['niveauId'] == 3){
		$_POST['villeId'] = '';
		$_POST['departementId'] = '';
		if(!isset($_POST['regionId']) || empty($_POST['regionId'])){
			$error .= "Vous devez choisir la région<br />";
		}
	}


	if(!isset($_POST['verif']) || empty($_POST['verif']))
		$error .= "Vous devez vérifier que cette proposition n'existe pas déjà.<br />";

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
		$_POST['dureeSoutien'] = Config::get('duree_soutien');
		$_POST['dureeDebat'] = Config::get('duree_debat');
		$_POST['dureeVote'] = Config::get('duree_vote');
		$proposition_id = Proposition::insertProposition($_POST);
		$proposition = Proposition::selectProposition($proposition_id);
		$success = true;
		// 2 Jockers de validation de propositions
		$referents = Utilisateur::selectUtilisateurs(1, 2, array('utilisateur_rang = 1', "utilisateur_id NOT IN (SELECT utilisateur_id FROM validation WHERE proposition_id = '".$proposition->getId()."')", "RAND()"));
		if($referents){
			foreach($referents as $referent){
				$blocmail_texte = BlocMail::selectBlocMail(6)->getContenu();
				$blocmail_texte = str_replace('$PSEUDO$', $referent->getPseudo(), $blocmail_texte);
				$blocmail_texte = str_replace('$PRENOM$', $referent->getPrenom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM$', $referent->getNom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM_PROPOSITION$', $proposition->getTitre(), $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN_PROPOSITION$', ADRESSE.'proposition/'.$proposition->getId().'.html', $blocmail_texte);
				Mail::send($referent->getEmail(), MARQUE." - Une proposition est en attente", $blocmail_texte);
			}
		}
		$blocmail_texte = 'Cher Administrateur,<br />
		<br />
		Une proposition  '.$proposition->getTitre().' vient d\'être soumise.
		Pour la visualiser, merci de suivre le lien suivant : <a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.ADRESSE.'proposition/'.$proposition->getId().'.html</a>
		<br />
		Cordialement,<br />
		L\'équipe de LiveDem';
		Mail::send(EMAIL, MARQUE." - Une proposition est en attente", $blocmail_texte);

	}
}


$smarty->assign('error', $error);
$smarty->assign('errorChamps', $errorChamps);
$smarty->assign('success', $success);

$utilisateur = Utilisateur::selectUtilisateur($_SESSION['id']);
$smarty->assign('utilisateur', $utilisateur);

if(isset($_POST['villeId'])){
	$ville = Ville::selectVille($_POST['villeId']);
	if($ville)
		$villes = Ville::selectVilles(1, 0, array("ville_codepostal = '".$ville->getCodePostal()."'"));
	else
		$villes = array();
}
else{
	$ville = Ville::selectVille($utilisateur->getVilleId());
	if($ville)
		$villes = Ville::selectVilles(1, 0, array("ville_codepostal = '".$ville->getCodePostal()."'"));
	else
		$villes = array();
}
$smarty->assign('villes', $villes);
$smarty->assign('departements', Departement::selectDepartements(1, 0, array(), 'departement_nom ASC'));
$smarty->assign('regions', Region::selectRegions(1, 0, array(), 'region_nom ASC'));

$smarty->display('proposition_add.tpl');

?>