<?php
Class Debat extends Debat_Base { 

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

}
?>