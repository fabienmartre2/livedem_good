<?php
include('../conf/config.php');


if(!Utilisateur::estConnecte())
	echo json_encode(array('error' => "Vous devez être connecté pour faire un signalement"));
else{
	$nombre = Signalement::getNbSignalements(array('type_id = "'.$_POST['typeId'].'"', 'signalement_objetid = "'.$_POST['objetId'].'"'));
	if($nombre > 0){
		echo json_encode(array('error' => "Merci ! Nous avons déjà un signalement en cours."));	
	}
	else{
		$_POST['utilisateurId'] = $_SESSION['id'];
		$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
		Signalement::insertSignalement($_POST);

		switch($_POST['typeId']){
			case '1':
				$mur = Mur::selectMur($_POST['objetId']);
				$container = $mur->getTypeConteneur();
				$containerId = $mur->getConteneurId();
				$signalement_texte = 'Publication : '.$mur->getMessage().'';
				break;
			case '2':
				$photo = Photo::selectPhoto($_POST['objetId']);
				$container = $photo->getTypeConteneur();
				$containerId = $photo->getConteneurId();
				$signalement_texte = 'Photo :<br /><img src="'.ADRESSE.'modules/get_image.php?width=430&image=data/photos/'.$photo->getLocalisation().'" />';
				break;
			case '3':
				$commentaire = Commentaire::selectCommentaire($_POST['objetId']);
				if($commentaire->getTypeId() == 1){
					$mur = Mur::selectMur($commentaire->getObjetId());
					$container = $mur->getTypeConteneur();
					$containerId = $mur->getConteneurId();
				}
				elseif($commentaire->getTypeId() == 2){
					$photo = Photo::selectPhoto($commentaire->getObjetId());
					$container = $photo->getTypeConteneur();
					$containerId = $photo->getConteneurId();
				}
				$signalement_texte = 'Commentaire : '.$commentaire->getMessage().'';
				break;
		}

		switch($container){
			case '2' : 
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Ce signalement concerne la proposition "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=2">Voir la proposition</a>';
				break;
			case '3' :
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Ce signalement concerne le débat "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=3">Voir le débat</a>';
				break; 
			case '4' :
				$proposition = Proposition::selectProposition($containerId);
				$signalement_source = 'Ce signalement concerne le vote "'.$proposition->getTitre().'" : <a href="'.ADRESSE.'proposition/'.$containerId.'.html?statut=4">Voir le vote</a>';
				break; 
			case '20' : 
				$proposition = Groupe::selectGroupe($containerId);
				$signalement_source = 'Ce signalement concerne la discussion "'.$proposition->getNom().'" : <a href="'.ADRESSE.'discussion/'.$containerId.'.html">Voir la discussion</a>';
				break;
		}

		

		$texte = "Cher administrateur,<br />
		<br />
		Une publication a été signalé par un utilisateur.<br />
		".$signalement_source."<br />
		<br />
		<b>Plus de détails sur la source du signalement :</b><br /> ".$signalement_texte."<br />
		<br />
		Cordialement,<br />
		".MARQUE."
		";

		Mail::send(EMAIL, MARQUE." - Signalement", $texte);


		echo json_encode(array('success' => "Signalement envoyé."));
	}
}
?>