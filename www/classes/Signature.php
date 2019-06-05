<?php
Class Signature extends Signature_Base { 

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

}
?>