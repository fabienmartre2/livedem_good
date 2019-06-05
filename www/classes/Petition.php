<?php
Class Petition extends Petition_Base { 

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

	public function getCategorie(){
		return Categorie::selectCategorie($this->getCategorieId());
	}

}
?>