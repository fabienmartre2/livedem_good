<?php
Class Proposition extends Proposition_Base { 

	public static $statutArray = array(1 => "En attente de validation", 2 => "Proposition", 3 => "Débat", 4 => "Votes", 6 => "Proposition votée, Adoptée à la majorité", 7 => "Proposition votée, Rejetée à la majorité");

	public function getStatutTexte(){
		return $this::$statutArray[$this->getStatut()];
	}

	public static $resultatArray = array(0 => "Aucune action concrète à ce jour", 1 => "Les élus ont voté cette proposition", 2 => "Les élus ont refusé cette proposition", 3 => "Les élus ont reporté cette proposition");

	public function getResultatTexte(){
		return $this::$resultatArray[$this->getResultat()];
	}

	public function getUtilisateur(){
		return Utilisateur::selectUtilisateur($this->getUtilisateurId());
	}

	public function getCategorie(){
		return Categorie::selectCategorie($this->getCategorieId());
	}

	public function getNiveau(){
		return Niveau::selectNiveau($this->getNiveauId());
	}

	public function getZone(){
		switch($this->getNiveauId()){
			case 1:
				return $this->getUtilisateur()->getVille()->getNom();
				break;
			case 2:
				return $this->getUtilisateur()->getDepartement()->getNom();
				break;
			case 3:
				return $this->getUtilisateur()->getRegion()->getNom();
				break;
			case 4:
				return 'France';
				break;
		}
	}

	public function getNext($statut){
		switch($statut){
			case 2:
				return strtotime('+ '.$this->getDureeSoutien().' WEEKS', strtotime($this->getUpdateDate(2)));
				break;
			case 3:
				return strtotime('+ '.$this->getDureeDebat().' WEEKS', strtotime($this->getUpdateDate(3)));
				break;
			case 4:
				return strtotime('+ '.$this->getDureeVote().' WEEKS', strtotime($this->getUpdateDate(4)));
				break;
		}
		return false;
	}

	public function getUpdateDate($statut){
		$modif = PropositionModif::selectPropositionModifs(1, 1, array('proposition_id = "'.$this->getId().'"', 'propositionmodif_newstatut = "'.$statut.'"'));
		if($modif)
			return $modif[0]->getDate();
		else
			return false;
	}

	public function getNbSoutiens(){
		return Soutien::getNbSoutiens(array("proposition_id = '".$this->getId()."'"));
	}

	public function getNbSoutiensTotal(){
		switch($this->getNiveauId()){
			case 1:
				$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id = '.$this->getUtilisateur()->getVille()->getId().''));
				break;
			case 2:
				$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id IN (SELECT ville_id FROM ville WHERE departement_id = '.$this->getUtilisateur()->getDepartement()->getId().')'));
				break;
			case 3:
				$utilisateur = Utilisateur::getNbUtilisateurs(array('ville_id IN (SELECT ville_id FROM ville WHERE departement_id IN (SELECT departement_id FROM departement WHERE region_id = '.$this->getUtilisateur()->getRegion()->getId().'))'));
				break;
			case 4:
				$utilisateur = Utilisateur::getNbUtilisateurs();
				break;
		}
		return ceil($utilisateur*(Config::get('pourcentage_soutien')/100));
	}

	public function getVille(){
		return Ville::selectVille($this->getVilleId());
	}

	public function getDepartement(){
		return Departement::selectDepartement($this->getDepartementId());
	}

	public function getRegion(){
		return Region::selectRegion($this->getRegionId());
	}

}
?>