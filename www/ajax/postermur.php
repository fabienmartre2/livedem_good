<?php
	include('../conf/config.php');


	if(!Utilisateur::estConnecte())
		echo json_encode(array('error' => "Vous devez être connecté pour envoyer un message sur votre mur"));
	elseif(!isset($_POST['message']) || empty($_POST['message']))
		echo json_encode(array('error' => "Vous devez saisir un message"));
	else{
		if(isset($_POST['conteneurId']) && isset($_POST['typeConteneur'])){
			$_POST['utilisateurId'] = $_SESSION['id'];
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			$_POST['conteneurId'] = $_POST['conteneurId'];
			$_POST['typeConteneur'] = $_POST['typeConteneur'];
			$mur_id = Mur::insertMur($_POST);
			echo json_encode(array('success' => "Message envoyé", "murId" => $mur_id));
		}
		else{
			$_POST['utilisateurId'] = $_SESSION['id'];
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			$mur_id = Mur::insertMur($_POST);
			echo json_encode(array('success' => "Message envoyé", "murId" => $mur_id));		
		}
	}
?>