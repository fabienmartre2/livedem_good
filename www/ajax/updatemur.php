<?php
header('Content-Type: text/json');
include('../conf/config.php');


if(Utilisateur::estConnecte()){
	if(isset($_POST['typeConteneur']) && !empty($_POST['typeConteneur'])){
		$feeds = Feed::getUpdateFeed($_SESSION['id'], $_POST['lastVerif'], $_POST['typeConteneur'], $_POST['conteneurId']);
	}
	else{
		$feeds = Feed::getUpdateFeed($_SESSION['id'], $_POST['lastVerif']);
	}
	// HTML à afficher
	$data = array();
	foreach($feeds as $feed){
		switch($feed->getType()){
			case '1':
				$data[] = array('type' => $feed->getType(), 'parent' =>  '', 'html' => $feed->getHTML());
				break;
			case '2':
				$data[] = array('type' => $feed->getType(), 'parent' =>  '', 'html' =>  $feed->getHTML());
				break;
			case '4':
				$data[] = array('type' => $feed->getType(), 'parent' =>  '', 'html' =>  $feed->getHTML());
				break;
			case '3':
				$commentaire = Commentaire::selectCommentaire($feed->getId());
				$data[] = array('type' => $feed->getType(), 'parent' =>  $commentaire->getObjetId(), 'parenttype' =>  $commentaire->getTypeId(), 'html' =>  $feed->getHTML());
				break;
			case '5':
				$interaction = Interaction::selectInteraction($feed->getId());
				$data[] = array('type' => $feed->getType(), 'parent' =>  $interaction->getObjetId(), 'parenttype' =>  $interaction->getTypeId(), 'html' =>  $feed->getHTML());
				break;
			case '6':
				$interaction = Interaction::selectInteraction($feed->getId());
				$data[] = array('type' => $feed->getType(), 'parent' =>  $interaction->getObjetId(), 'parenttype' =>  $interaction->getTypeId(), 'html' =>  $feed->getHTML());
				break;
		}
	}
	$data_notif = array();
	
	echo json_encode(array('success' => "success", "lastVerif" => time(), "data" => $data, "data_notif" => $data_notif));
	
}
?>