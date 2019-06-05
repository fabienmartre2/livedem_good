<?php
Class Groupe extends Groupe_Base { 
	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}
}
?>