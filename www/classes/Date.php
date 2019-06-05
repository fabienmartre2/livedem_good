<?php
Class Date { 
	public static function entofr($date) {
		list($annee, $mois, $jour) = preg_split('/-/', $date);
		return $jour.'/'.$mois.'/'.$annee;
	}

	public static function frtoen($date) {
		list($jour, $mois, $annee) = preg_split('/\//', $date);
		return $annee.'-'.$mois.'-'.$jour;
	}
	
}