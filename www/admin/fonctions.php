<?php

function estConnecteAdmin(){
	if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
		if(Admin::selectAdmin($_SESSION['admin'])){
			return true;
		}
	}
	return false;
}

function rangAdmin(){
	$connexion = new PDO(PDO_DSN, USER, PASSWD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connexion->query("SET NAMES utf8");
	if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
		$reqVerif = "SELECT * FROM admin WHERE id=:id";
		$resVerif = $connexion->prepare($reqVerif, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$resVerif->execute(array(':id' => $_SESSION['admin']));
		if($resVerif->rowCount() != 0){
			$admin = $resVerif->fetch(PDO::FETCH_ASSOC);
			return $admin['rang'];
		}
	}
	else
		return -1;
}

?>