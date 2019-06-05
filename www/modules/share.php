<?php

if(isset($_GET['propositionId']) || isset($_GET['petitionId']) || isset($_GET['groupeId'])){

	if(isset($_GET['propositionId'])){
		$proposition = Proposition::selectProposition($_GET['propositionId']);
		$titre = $proposition->getTitre();
		$lien = ADRESSE.'proposition/'.$proposition->getId().'.html';
	}
	elseif(isset($_GET['petitionId'])){
		$petition = Petition::selectPetition($_GET['petitionId']);
		$titre = $petition->getTitre();
		$lien = ADRESSE.'petition/'.$petition->getId().'.html';
	}
	elseif(isset($_GET['groupeId'])){
		$groupe = Groupe::selectGroupe($_GET['groupeId']);
		$titre = $groupe->getNom();
		$lien = ADRESSE.'discussion/'.$groupe->getId().'.html';
	}

	$smarty->assign('HEAD_TITLE', MARQUE.' - Partage de '.$titre);
	$smarty->assign('HEAD_DESCRIPTION', MARQUE);
	$smarty->assign('HEAD_KEYWORDS', MARQUE);

	$error = '';
	$success = false;


	if(isset($_POST['send'])){
		if(isset($_POST['emails']) && !empty($_POST['emails'])){
			foreach($_POST['emails'] as $email){
				$blocmail_texte = BlocMail::selectBlocMail(13)->getContenu();
				if(isset($_POST['expediteur']) && !empty($_POST['expediteur']))
				$blocmail_texte = str_replace('$AMI$', stripslashes($_POST['expediteur']), $blocmail_texte);
				$blocmail_texte = str_replace('$TITRE$', $titre, $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN$', $lien, $blocmail_texte);
				Mail::send($email, MARQUE." - Un ami vous suggère de regarder : ".$titre."", $blocmail_texte);
			}
		}
		$success = true;
	}

	if(isset($_GET['type']) && $_GET['type'] == "fast"){
		if(isset($_POST['fast'])){
			if(!isset($_POST['nom']) || empty($_POST['nom']) )
				$error .= 'Vous devez saisir votre nom <br />';
			if(!isset($_POST['email']) || empty($_POST['email']) )
				$error .= 'Vous devez saisir un email <br />';
			$modele='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
			if(!empty($_POST['email']) && !preg_match($modele,$_POST['email']))
				$error .= "Adresse E-Mail invalide<br />";
			if(empty($error)){
				/****** Mail de suggestion *****/
				$blocmail_texte = BlocMail::selectBlocMail(13)->getContenu();
				$blocmail_texte = str_replace('$AMI$', htmlentities($_POST['nom']), $blocmail_texte);
				$blocmail_texte = str_replace('$TITRE$', $titre, $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN$', $lien, $blocmail_texte);

				// Envoie de l'email
				Mail::send($_POST['email'], MARQUE." - Un ami vous suggère de regarder : ".$titre."", $blocmail_texte);
				$success = true;
			}
		}
	}
	if(isset($_GET['type']) && $_GET['type'] == "csv"){
		if(isset($_FILES['csv']['tmp_name'])){
			$config = LOCALISATION . 'lib/hybridauth/config.php';
			require_once("lib/hybridauth/Hybrid/Auth.php");
			require_once("lib/hybridauth/Hybrid/User_Contact.php");
			$user_contacts = array();
			// check there are no errors
			if($_FILES['csv']['error'] == 0){
				$name = $_FILES['csv']['name'];
				$ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
				$type = $_FILES['csv']['type'];
				$tmpName = $_FILES['csv']['tmp_name'];
				// check the file is a csv
				if($ext === 'csv'){
					if(($handle = fopen($tmpName, 'r')) !== FALSE) {
						// necessary if a large csv file
						set_time_limit(0);
						while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
							// number of fields in the csv
							$col_count = count($data);
							// get the values from the csv
							$modele='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
							if(!empty($data[0]) && preg_match($modele,$data[0])){
								$user = new Hybrid_User_Contact();
								$user->displayName = 'Contact';
								$user->email = $data[0];
								$user_contacts[] = $user;
							}
						}
						fclose($handle);
					}
				}
			}
			$smarty->assign('user_contacts', $user_contacts);
		}
	}
	if(isset($_GET['type']) && $_GET['type'] == "facebook"){
		$config = LOCALISATION . 'lib/hybridauth/config.php';
		require_once("lib/hybridauth/Hybrid/Auth.php");
		try{
			$hybridauth = new Hybrid_Auth($config);
			$adapter = $hybridauth->authenticate("Facebook");
			$user_profile = $adapter->getUserProfile();
 			$user_contacts = $adapter->getUserContacts();
 			$smarty->assign('user_contacts', $user_contacts);
 			$smarty->assign('user_profile', $user_profile);
 		}
 		catch(Exception $e){
 			$error = "Nous n'avons pu vous connecter à votre compte <br />";
 		}
	}
	if(isset($_GET['type']) && $_GET['type'] == "yahoo"){
		$config = LOCALISATION . 'lib/hybridauth/config.php';
		require_once("lib/hybridauth/Hybrid/Auth.php");
		try{
			$hybridauth = new Hybrid_Auth($config);
			$adapter = $hybridauth->authenticate("Yahoo");
			$user_profile = $adapter->getUserProfile();
	 		$user_contacts = $adapter->getUserContacts();
	 		$smarty->assign('user_contacts', $user_contacts);
	 		$smarty->assign('user_profile', $user_profile);
 		}
 		catch(Exception $e){
 			$error = "Nous n'avons pu vous connecter à votre compte <br />";
 		}
	}
	if(isset($_GET['type']) && $_GET['type'] == "gmail"){
		$config = LOCALISATION . 'lib/hybridauth/config.php';
		require_once("lib/hybridauth/Hybrid/Auth.php");
		try{
			$hybridauth = new Hybrid_Auth($config);
			$adapter = $hybridauth->authenticate("Google");
			$user_profile = $adapter->getUserProfile();
	 		$user_contacts = $adapter->getUserContacts();
	 		$smarty->assign('user_contacts', $user_contacts);
	 		$smarty->assign('user_profile', $user_profile);
 		}
 		catch(Exception $e){
 			$error = "Nous n'avons pu vous connecter à votre compte <br />";
 		}
	}
	if(isset($_GET['type']) && $_GET['type'] == "live"){
		$config = LOCALISATION . 'lib/hybridauth/config.php';
		require_once("lib/hybridauth/Hybrid/Auth.php");
		try{
			$hybridauth = new Hybrid_Auth($config);
			$adapter = $hybridauth->authenticate("Live");
			$user_profile = $adapter->getUserProfile();
	 		$user_contacts = $adapter->getUserContacts();
	 		$smarty->assign('user_contacts', $user_contacts);
	 		$smarty->assign('user_profile', $user_profile);
 		}
 		catch(Exception $e){
 			$error = "Nous n'avons pu vous connecter à votre compte <br />";
 		}
	}
	
	$smarty->assign('titre', $titre);
	$smarty->assign('lien', $lien);
	$smarty->assign('success', $success);
	$smarty->assign('error', $error);

	$smarty->display('share.tpl');
}
?>