<?php
Class Config { 

	public static function get($config_cle){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "SELECT config_valeur FROM config WHERE config_cle = :config_cle";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':config_cle' => $config_cle);
		$resSelect->execute($data);
		$donnees = $resSelect->fetch(PDO::FETCH_ASSOC);
		return $donnees['config_valeur'];
	}

	public static function set($config_cle, $config_valeur){
		$db = Db::getInstance();
		$connexion = $db->getConnexion();
		$reqSelect =  "UPDATE config SET `config_valeur` = :config_valeur WHERE config_cle = :config_cle";
		$resSelect =  $connexion->prepare($reqSelect);
		$data = array(':config_valeur' => $config_valeur, ':config_cle' => $config_cle);
		return $resSelect->execute($data);
	}
}
?>