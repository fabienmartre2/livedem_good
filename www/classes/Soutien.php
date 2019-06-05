<?php
Class Soutien extends Soutien_Base { 

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

}
?>