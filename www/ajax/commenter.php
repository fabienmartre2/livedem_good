<?php
include('../conf/config.php');


if(!Utilisateur::estConnecte())
	echo json_encode(array('error' => "Vous devez être connecté pour envoyer un message sur votre mur"));
elseif(!isset($_POST['typeId']) || empty($_POST['typeId']) || !isset($_POST['objetId']) || empty($_POST['objetId']))
	echo json_encode(array('error' => "Vous ne pouvez rien commenter ... RIEN !"));
elseif(!isset($_POST['message']) || empty($_POST['message']))
	echo json_encode(array('error' => "Vous devez saisir un commentaire"));
else{
	$_POST['utilisateurId'] = $_SESSION['id'];
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
	$commentaire_id = Commentaire::insertCommentaire($_POST);
	
	switch($_POST['typeId']){
		case '1':
			$mur = Mur::selectMur($_POST['objetId']);
			$objet = 'Une personne a commenté votre publication : "'.$mur->getMessage().'"';
			if($mur->getTypeConteneur() <= 7 ){
				$proposition = Proposition::selectProposition($mur->getConteneurId());
				$lien = '<a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>';
			}
			elseif($mur->getTypeConteneur() == 20){
				$proposition = Groupe::selectGroupe($mur->getConteneurId());
				$lien = '<a href="'.ADRESSE.'discussion/'.$proposition->getId().'.html">'.$proposition->getNom().'</a>';
			}
			$createur_objet = $mur->getUtilisateurId();
			break;
		case '2':
			$photo = Photo::selectPhoto($_POST['objetId']);
			$objet = 'Une personne a commenté votre photo';
			if($photo->getTypeConteneur() <= 7 ){
				$proposition = Proposition::selectProposition($photo->getConteneurId());
				$lien = '<a href="'.ADRESSE.'proposition/'.$proposition->getId().'.html">'.$proposition->getTitre().'</a>';
			}
			elseif($photo->getTypeConteneur() == 20){
				$proposition = Groupe::selectGroupe($photo->getConteneurId());
				$lien = '<a href="'.ADRESSE.'discussion/'.$proposition->getId().'.html">'.$proposition->getNom().'</a>';
			}
			$createur_objet = $photo->getUtilisateurId();
			break;
		case '6':
			$interaction = Interaction::selectInteraction($_POST['objetId']);
			$createur_objet = $interaction->getUtilisateurId();
			break;
		case '7':
			$album = Album::selectAlbum($_POST['objetId']);
			$createur_objet = $album->getUtilisateurId();
			break;
	}
	
	
	$users_commentaires = Commentaire::selectDistinctCommentaires($_POST['objetId'], $_POST['typeId']);
	
	
	$post_notification = array(
	'id' => '',
	'utilisateurId' => '',
	'objetId' => $commentaire_id,
	'typeId' => "3",
	'etat' => "0"
	);
	
	if($_SESSION['id'] == $createur_objet){
		foreach($users_commentaires as $user_id){
			if($user_id != $createur_objet){
				$post_notification['utilisateurId'] = $user_id;
				Notification::insertNotification($post_notification);
				$notuser = Utilisateur::selectUtilisateur($user_id);
				$blocmail_texte = BlocMail::selectBlocMail(9)->getContenu();
				$blocmail_texte = str_replace('$PSEUDO$', $notuser->getPseudo(), $blocmail_texte);
				$blocmail_texte = str_replace('$PRENOM$', $notuser->getPrenom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM$', $notuser->getNom(), $blocmail_texte);
				$blocmail_texte = str_replace('$OBJET$', $objet, $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN$', $lien, $blocmail_texte);
				Mail::send($notuser->getEmail(), MARQUE." - Nouveau Commentaire", $blocmail_texte);
			}
		}
	}
	else{
		$post_notification['utilisateurId'] = $createur_objet;
		Notification::insertNotification($post_notification);
		foreach($users_commentaires as $user_id){
			if($user_id != $_SESSION['id']){
				$post_notification['utilisateurId'] = $user_id;
				Notification::insertNotification($post_notification);
				$notuser = Utilisateur::selectUtilisateur($user_id);
				$blocmail_texte = BlocMail::selectBlocMail(9)->getContenu();
				$blocmail_texte = str_replace('$PSEUDO$', $notuser->getPseudo(), $blocmail_texte);
				$blocmail_texte = str_replace('$PRENOM$', $notuser->getPrenom(), $blocmail_texte);
				$blocmail_texte = str_replace('$NOM$', $notuser->getNom(), $blocmail_texte);
				$blocmail_texte = str_replace('$OBJET$', $objet, $blocmail_texte);
				$blocmail_texte = str_replace('$LIEN$', $lien, $blocmail_texte);
				Mail::send($notuser->getEmail(), MARQUE." - Nouveau Commentaire", $blocmail_texte);
			}
		}
	}
		
	echo json_encode(array('success' => "Commentaire posté", "interactionId" => $commentaire_id));
}
?>