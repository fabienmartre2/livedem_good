<?php
include('../conf/config.php');


if(!Utilisateur::estConnecte())
	echo json_encode(array('error' => "Vous devez être connecté pour envoyer un message sur votre mur"));
elseif(!isset($_POST['typeId']) || empty($_POST['typeId']) || !isset($_POST['objetId']) || empty($_POST['objetId']))
	echo json_encode(array('error' => "Vous ne pouvez pas aimer ... RIEN !"));
else{
	if($_POST['interactionType'] == 1){
		$interactions = Interaction::selectInteractions(1, 1, array("utilisateur_id = '".$_SESSION['id']."'","type_id = '".$_POST['typeId']."'", "interaction_objetid = '".$_POST['objetId']."'", "interaction_valeur = '1'"));
		if($interactions){
			$interaction = Interaction::selectInteraction($interactions[0]);
			if($interaction->getDelete() == 0){
				$interaction->setDelete(1);
				$interaction->setDate(date('c'));
				echo json_encode(array('success' => "Dislike", "interaction" => "J'aime"));
			}
			else{
				$interaction->setDelete(0);
				$interaction->setDate(date('c'));
				echo json_encode(array('success' => "Dislike", "interaction" => "Vous aimez"));	
			}
		}
		else{
			$_POST['utilisateurId'] = $_SESSION['id'];
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			$_POST['valeur'] = 1;
			$interaction_id = Interaction::insertInteraction($_POST);
			
			
			echo json_encode(array('success' => "Like", "interaction" => "Vous aimez"));
		}
	}
	elseif($_POST['interactionType'] == 2){
		$interactions = Interaction::selectInteractions(1, 1, array("utilisateur_id = '".$_SESSION['id']."'","type_id = '".$_POST['typeId']."'", "interaction_objetid = '".$_POST['objetId']."'", "interaction_valeur = '2'"));
		if($interactions){
			$interaction = Interaction::selectInteraction($interactions[0]);
			if($interaction->getDelete() == 0){
				$interaction->setDelete(1);
				$interaction->setDate(date('c'));
				echo json_encode(array('success' => "Dislike", "interaction" => "J'aime pas"));
			}
			else{
				$interaction->setDelete(0);
				$interaction->setDate(date('c'));
				echo json_encode(array('success' => "Dislike", "interaction" => "Vous n'aimez pas"));	
			}
		}
		else{
			$_POST['utilisateurId'] = $_SESSION['id'];
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			$_POST['valeur'] = 2;
			$interaction_id = Interaction::insertInteraction($_POST);
			
			
			echo json_encode(array('success' => "Like", "interaction" => "Vous n'aimez pas"));
		}
	}
}
?>