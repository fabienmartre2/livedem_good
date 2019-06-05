<?php
Class Vote extends Vote_Base { 

	public static $statutArray = array(1 => "Pour", 2 => "Contre");

	public function getStatutTexte(){
		return $this->statutArray[$this->getStatut()];
	}

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

	public function getProposition(){
		return Proposition::selectProposition($this->getPropositionId());
	}
}
?>