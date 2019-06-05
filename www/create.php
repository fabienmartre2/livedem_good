<?php

ob_start();

/* ******************************************* */
echo '<?php'."\n";
echo "Class ".$nomClasse."_Base { \n\n";
	foreach($tableau as $cle => $ligne)
		echo "\t".'private $_'.$ligne.";\n";
		echo "\n";
	
	echo "\tpublic function __construct(";
		$data = "";
		foreach($tableau as $cle => $ligne)
		$data .= "$".$ligne.", ";
		$data = substr($data, 0, -2);
		echo $data.") {\n";
	
		foreach($tableau as $cle => $ligne){
			echo "\t\t".'$this->_'.($ligne).' = $'.$ligne.';'."\n";
		}
	echo "\t}\n\n";
	
	// Getter
	foreach($tableau as $cle => $ligne){
		echo "\t".'public function get'.ucfirst($ligne).'(){'."\n";
			echo "\t\t".'return stripslashes($this->_'.$ligne.');'."\n";
		echo "\t}\n";
	}

	// Setter
	foreach($tableau as $cle => $ligne){
		echo "\t".'public function set'.ucfirst($ligne).'($'.$ligne.'){'."\n";
			echo "\t\t".'$this->_'.$ligne.' = $'.$ligne.';'."\n";
			echo "\t\t".'$db = Db::getInstance();'."\n";
			echo "\t\t".'$connexion = $db->getConnexion();'."\n";
			echo "\t\t".'$reqSelect =  "UPDATE '.$nomTable.' SET `'.$cle.'` = :'.$cle.' WHERE '.$identifiant_table.' = :'.$identifiant_table.'";'."\n";
			echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect);'."\n";
			echo "\t\t".'$data = array(\':'.$identifiant_table.'\' => $this->getId(), \':'.$cle.'\' => $this->get'.ucfirst($ligne).'());'."\n";
			echo "\t\t".'return $resSelect->execute($data);'."\n";
		echo "\t}\n";
	}
	
	echo "\n";
	
	// Select
	echo "\tpublic static function select".$nomClasse.'($id){'."\n";
		echo "\t\t".'$db = Db::getInstance();'."\n";
		echo "\t\t".'$connexion = $db->getConnexion();'."\n";
		echo "\t\t".'$reqSelect =  "SELECT * FROM '.$nomTable.' WHERE '.$identifiant_table.' = :id'."\";\n";
		echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect);'."\n";
		echo "\t\t".'$resSelect->execute(array(\':id\' => $id));'."\n";
		echo "\t\t".'$data = $resSelect->fetch(PDO::FETCH_ASSOC);'."\n";
		echo "\t\t".'// On vérifie la bonne récuparation'."\n";
		echo "\t\t".'if(empty($data))'."\n";
		echo "\t\t\t".'return false;'."\n";
		echo "\t\t".'// On retourne un membre'."\n";
		echo "\t\t".'return new '.$nomClasse.'('."\n";
		$data = "";
		foreach($tableau as $cle => $ligne)
			$data .= "\t\t\t".'$data[\''.$cle.'\'], '."\n";
		$data = substr($data, 0, -3);
		echo $data;
		echo "\n\t\t".');'."\n";
		echo "\t".'}'."\n";
		
		echo "\n";	

		
	echo "\n";	
	
	// Insert
	echo "\tpublic static function insert".$nomClasse.'($post = array(), $files = array())'."{\n";
		echo "\t\t".'$db = Db::getInstance();'."\n";
		echo "\t\t".'$connexion = $db->getConnexion();'."\n";
		echo "\t\t".'$reqSelect =  "INSERT INTO '.$nomTable.' SET ";'."\n";
		echo "\t\t".'$data = array();'."\n";
		$data = "";
		foreach($tableau as $cle => $ligne){
			$data .= "\t\t".'if(isset($post[\''.$ligne.'\'])){'."\n";
			$data .= "\t\t\t".'$reqSelect .=	\'`'.$cle.'` = :'.$cle.', \';'."\n";
			$data .= "\t\t\t".'$data[\''.$cle.'\'] = $post[\''.$ligne.'\'];'."\n";
			$data .= "\t\t".'}'."\n";
		}
		echo $data;
		echo "\t\t".'$reqSelect = substr($reqSelect,0,strlen($reqSelect)-2);'."\n";
		echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect);'."\n";
		echo "\t\t".'$resSelect->execute($data);'."\n";;
		echo "\t\t".'return $connexion->lastInsertId();'."\n";;
	echo "\t"."}\n";
		
	echo "\n";	

	// Update Data
	echo "\t".'public function update'.$nomClasse.'($post, $files = array()){'."\n";
		foreach($tableau as $cle => $ligne){
			echo "\t\t".'if(isset($post[\''.$ligne.'\']))'."\n";
			echo "\t\t\t".'$this->set'.ucfirst($ligne).'($post[\''.$ligne.'\']);'."\n";
		}
		echo "\t\t".'return true;'."\n";
	echo "\t".'}'."\n";
	
	echo "\n";	
	
	// Delete
	echo "\tpublic static function delete".$nomClasse.'($id)'."{\n";
		echo "\t\t".'$db = Db::getInstance();'."\n";
		echo "\t\t".'$connexion = $db->getConnexion();'."\n";
		echo "\t\t".'$reqSelect =  "DELETE FROM '.$nomTable.' WHERE '.$identifiant_table.' = :id";'."\n";
		
		echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect);'."\n";;
		echo "\t\t".'$data = array(\':id\' => $id);'."\n";
		echo "\t\t".'return $resSelect->execute($data);'."\n";;
	echo "\t"."}\n";
		
	echo "\n";	
	

	// Select Element
	echo "\t".'public static function select'.$nomClasse.'s($page = 1, $max = 20, $where = null, $order = null, $join = null, $groupby = null){'."\n";
		echo "\t\t".'$page = intval($page);'."\n";
		echo "\t\t".'$max = intval($max);'."\n";
		echo "\t\t".'$db = Db::getInstance();'."\n";
		echo "\t\t".'$connexion = $db->getConnexion();'."\n";
		echo "\t\t".'$reqSelect =  "SELECT '.$nomTable.'.* FROM '.$nomTable.'";'."\n";
		echo "\t\t".'if(!empty($join)){'."\n";
		 echo "\t\t\t".'foreach($join as $cle => $valeur){'."\n";
			echo "\t\t\t\t".'$reqSelect .= " ".$cle." ON ".$valeur." ";'."\n";
		 echo "\t\t\t".'}'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'$reqSelect .= " WHERE 1 = 1 ";'."\n";
		echo "\t\t".'if(!empty($where)){'."\n";
		echo "\t\t\t".'if(!is_array($where[0])){'."\n";
		 echo "\t\t\t\t".'foreach($where as $cle => $valeur){'."\n";
			echo "\t\t\t\t\t".'$reqSelect .= " AND ".$valeur."";'."\n";
		 echo "\t\t\t\t".'}'."\n";
		 echo "\t\t\t".'}'."\n";
		 echo "\t\t\t".'else{'."\n";
		 echo "\t\t\t\t".'foreach($where[0] as $cle => $valeur){'."\n";
			echo "\t\t\t\t\t".'$reqSelect .= " AND ".$valeur."";'."\n";
		 echo "\t\t\t\t".'}'."\n";
		 echo "\t\t\t".'}'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'if(!empty($groupby)){'."\n";
		 echo "\t\t\t".'$reqSelect .= " GROUP BY ".$groupby."";'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'if(!empty($order)){'."\n";
		 echo "\t\t\t".'$reqSelect .= " ORDER BY ".$order."";'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'if($max != 0)'."\n";
			echo "\t\t\t".'$reqSelect .= " LIMIT ".(($page-1)*$max).",".$max."";'."\n";
		echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));'."\n";
		
		echo "\t\t".'if(!empty($where) && isset($where[1]) && is_array($where[1])){'."\n";
		echo "\t\t\t".'	$resSelect->execute($where[1]);'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'else{'."\n";
		echo "\t\t\t".'	$resSelect->execute();'."\n";
		echo "\t\t".'}'."\n";
		
		echo "\t\t".'$datas = $resSelect->fetchall(PDO::FETCH_ASSOC);'."\n";
		echo "\t\t".'$result = array();'."\n";
		echo "\t\t".'foreach($datas as $data){'."\n";
		echo "\t\t\t".'$result[] = new '.$nomClasse.'('."\n";
		$data = "";
		foreach($tableau as $cle => $ligne)
			$data .= "\t\t\t\t".'$data[\''.$cle.'\'], '."\n";
		$data = substr($data, 0, -3);
		echo $data;
		echo "\n\t\t\t".');'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'return $result;'."\n";
	echo "\t".'}'."\n";

	echo "\n";		

	echo "\t".'public static function getNb'.$nomClasse.'s($where = null, $join = null){'."\n";
		echo "\t\t".'$db = Db::getInstance();'."\n";
		echo "\t\t".'$connexion = $db->getConnexion();'."\n";
		echo "\t\t".'$reqSelect =  "SELECT COUNT('.$nomTable.'.'.$identifiant_table.') as nombre FROM '.$nomTable.'";'."\n";
		echo "\t\t".'if(!empty($join)){'."\n";
		 echo "\t\t\t".'foreach($join as $cle => $valeur){'."\n";
			echo "\t\t\t\t".'$reqSelect .= " ".$cle." ON ".$valeur." ";'."\n";
		 echo "\t\t\t".'}'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'$reqSelect .= " WHERE 1 = 1 ";'."\n";
		echo "\t\t".'if(!empty($where)){'."\n";
		echo "\t\t\t".'if(!is_array($where[0])){'."\n";
		 echo "\t\t\t\t".'foreach($where as $cle => $valeur){'."\n";
			echo "\t\t\t\t\t".'$reqSelect .= " AND ".$valeur."";'."\n";
		 echo "\t\t\t\t".'}'."\n";
		 echo "\t\t\t".'}'."\n";
		 echo "\t\t\t".'else{'."\n";
		 echo "\t\t\t\t".'foreach($where[0] as $cle => $valeur){'."\n";
			echo "\t\t\t\t\t".'$reqSelect .= " AND ".$valeur."";'."\n";
		 echo "\t\t\t\t".'}'."\n";
		 echo "\t\t\t".'}'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'$resSelect =  $connexion->prepare($reqSelect, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));'."\n";
		echo "\t\t".'if(!empty($where) && isset($where[1]) && is_array($where[1])){'."\n";
		echo "\t\t\t".'	$resSelect->execute($where[1]);'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'else{'."\n";
		echo "\t\t\t".'	$resSelect->execute();'."\n";
		echo "\t\t".'}'."\n";
		echo "\t\t".'$data = $resSelect->fetch(PDO::FETCH_ASSOC);'."\n";
		echo "\t\t".'return $data[\'nombre\'];'."\n";
		//echo "\t\t".'return $data[\'nombre\'];'."\n";
	echo "\t".'}'."\n";

		
echo "}";

echo "\n".'?>';

$data = ob_get_contents();
$fp = fopen('../classes/'.$nomClasse.'_Base.php', 'w');
fwrite($fp, $data);
fclose($fp);



if(!file_exists('../classes/'.$nomClasse.'.php')){
	ob_start();

	/* ******************************************* */
	echo '<?php'."\n";
	echo "Class ".$nomClasse." extends ".$nomClasse."_Base { \n\n";
		
	echo "}";

	echo "\n".'?>';

	$data = ob_get_contents();
	$fp = fopen('../classes/'.$nomClasse.'.php', 'w');
	fwrite($fp, $data);
	fclose($fp);
}


?>