<?php
Class Categorie extends Categorie_Base { 

	public static function selectArray(){
		$types = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
		$data = array();
		foreach($types as $type){
			$data[$type->getId()] = $type->getNom();
		}
		return $data;
	}

}
?>