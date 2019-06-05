<?php
Class Niveau extends Niveau_Base { 

	public static function selectArray(){
		$types = Niveau::selectNiveaus(1, 0, array(), 'niveau_id ASC');
		$data = array();
		foreach($types as $type){
			$data[$type->getId()] = $type->getNom();
		}
		return $data;
	}

}
?>