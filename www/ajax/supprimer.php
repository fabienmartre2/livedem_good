<?php
include('../conf/config.php');


if(!Utilisateur::estConnecte())
	echo json_encode(array('error' => "Vous devez être connecté pour supprimer un message sur votre mur"));
else{
	if($_POST['type'] == "mur"){
		$mur = Mur::selectMur($_POST['objetId']);
		$mur->setSuppression("1");
		$interactions = Interaction::selectInteractions(1, 0, array("type_id = '1'", "interaction_valeur = '2'", "interaction_objetid = '".$_POST['objetId']."'"));
		foreach($interactions as $interaction_id){
			$interaction = Interaction::selectInteraction($interaction_id);
			$interaction->setDelete("1");
		}
		
		
		echo json_encode(array('success' => "L'élément a été supprimé.", 'feed' => "#feed1-".$_POST['objetId']));
	}
	if($_POST['type'] == "photo"){
		$photo = Photo::selectPhoto($_POST['objetId']);
		$photo->setSuppression("1");
		$interactions = Interaction::selectInteractions(1, 0, array("type_id = '2'", "interaction_valeur = '2'", "interaction_objetid = '".$_POST['objetId']."'"));
		foreach($interactions as $interaction_id){
			$interaction = Interaction::selectInteraction($interaction_id);
			$interaction->setDelete("1");
		}
		
		
		echo json_encode(array('success' => "L'élément a été supprimé.", 'feed' => "#feed2-".$_POST['objetId']));
	}
	if($_POST['type'] == "commentaire"){
		$commentaire = Commentaire::deleteCommentaire($_POST['objetId']);
		echo json_encode(array('success' => "L'élément a été supprimé.", 'feed' => "#feed3-".$_POST['objetId']));
	}
}
?>