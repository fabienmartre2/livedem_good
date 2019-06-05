<?php
	header('Content-Type: application/json');
	include('../conf/config.php');

	if(!Utilisateur::estConnecte())
		echo json_encode(array('error' => "Vous devez être connecté pour envoyer un message sur votre mur"));
	elseif(!isset($_FILES['photo']['tmp_name']) || empty($_FILES['photo']['tmp_name']))
		echo json_encode(array('error' => "Vous devez saisir une photo"));
	else{
			$_POST['localisation'] = Image::upload($_FILES['photo'], 800, 800);
			$_POST['utilisateurId'] = $_SESSION['id'];
			$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
			$_POST['conteneurId'] = $_POST['conteneurId'];
			$_POST['typeConteneur'] = $_POST['typeConteneur'];
			$photo_id = Photo::insertPhoto($_POST);
			echo json_encode(array('success' => "Photo envoyée", "photoId" => $photo_id));
	}
?>