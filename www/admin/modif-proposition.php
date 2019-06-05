<?php
	$id = intval($_GET['id']);
	if(!$proposition = Proposition::selectProposition($id)){
		echo '<div class="error">Proposition inconnue</div>';
	}
	else{

?>

<div id="localisation"> > Gestion des propositions</div>
<div id="contenu">

<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>js/shadowbox.css" media="screen" />
<script type="text/javascript" src="<?php echo ADRESSE; ?>js/shadowbox.js"></script>
<script type="text/javascript">Shadowbox.init();</script>


<?php
// #####################
if(isset($_POST['submit'])){
	// Traitement de la mise à jour
	$error = '';
	if(empty($error)){
		if(!empty($_FILES['vignette']["name"])){
			$ext = strtolower(pathinfo($_FILES['vignette']["name"], PATHINFO_EXTENSION));
			$extallow = array('jpg', 'jpeg', 'gif','png');
			if($_FILES['vignette']["error"] != 0){
				$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
			}
			if(!in_array($ext, $extallow)){
				$error .= "Extension du fichier non-autorisé : ".$ext."<br />";
			}
			if($_FILES['vignette']['size'] > 3000000){
				$error .= "Taille de l'image trop grande. (Limité à 3 Mo.)<br />";
			}
			if(empty($error))
				$_POST['image'] = Image::upload($_FILES['vignette'], 600, 600);
		}
		if($_POST['statut'] != $proposition->getStatut()){
			PropositionModif::insertPropositionModif(array('propositionId' => $proposition->getId(), 'newStatut' => $_POST['statut'], 'oldStatut' => $proposition->getStatut()));
			$proposition->setStatut($_POST['statut'] );
			$proposition->setUpdate(date('Y-m-d H:i:s'));
		}
		$proposition->updateProposition($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td>Titre : </td><td style="text-align:left;"><input type="text" name="titre" class="form-control" value="<?php echo $proposition->getTitre(); ?>" /></td></tr>
		<tr><td>Catégorie : </td><td style="text-align:left;">
			<select name="categorieId" class="form-control">
			<?php
			$categories = Categorie::selectCategories(1, 0, array(), 'categorie_nom ASC');
			foreach($categories as $categorie){
				echo '<option value="'.$categorie->getId().'" '.($proposition->getCategorieId() == $categorie->getId() ? 'SELECTED' : '').'>'.$categorie->getNom().'</option>';
			}
			?>
			</select>
		</td></tr>
		<tr><td>Niveau : </td><td style="text-align:left;">
			<select name="categorieId" class="form-control">
			<?php
			$niveaux = Niveau::selectNiveaus(1, 0, array(), 'niveau_nom ASC');
			foreach($niveaux as $niveau){
				echo '<option value="'.$niveau->getId().'" '.($proposition->getNiveauId() == $niveau->getId() ? 'SELECTED' : '').'>'.$niveau->getNom().'</option>';
			}
			?>
			</select>
		</td></tr>
		<tr><td>Description :</td><td style="text-align:left;"><textarea name="description" class="form-control" rows="10"><?php echo $proposition->getDescription(); ?></textarea></td></tr>
		<tr><td>Cout : </td><td style="text-align:left;"><input type="text" name="cout" class="form-control" value="<?php echo $proposition->getCout(); ?>" /></td></tr>
		<tr><td>Financement : </td><td style="text-align:left;"><input type="text" name="financement" class="form-control" value="<?php echo $proposition->getFinancement(); ?>" /></td></tr>
		<tr><td>Impact : </td><td style="text-align:left;"><input type="text" name="impact" class="form-control" value="<?php echo $proposition->getImpact(); ?>" /></td></tr>
		<tr><td>Délai : </td><td style="text-align:left;"><input type="text" name="delai" class="form-control" value="<?php echo $proposition->getDelai(); ?>" /></td></tr>
		<tr><td>Période : </td><td style="text-align:left;"><input type="text" name="periode" class="form-control" value="<?php echo $proposition->getPeriode(); ?>" /></td></tr>
		<tr><td>Durée Soutien : </td><td style="text-align:left;"><input type="text" name="dureeSoutien" class="form-control" value="<?php echo $proposition->getDureeSoutien(); ?>" /></td></tr>
		<tr><td>Durée Débat : </td><td style="text-align:left;"><input type="text" name="dureeDebat" class="form-control" value="<?php echo $proposition->getDureeDebat(); ?>" /></td></tr>
		<tr><td>Durée Vote : </td><td style="text-align:left;"><input type="text" name="dureeVote" class="form-control" value="<?php echo $proposition->getDureeVote(); ?>" /></td></tr>
		<tr><td>Statut : </td><td style="text-align:left;">
			<select name="statut" class="form-control">
				<?php
				foreach(Proposition::$statutArray as $rang_id => $rang)
					echo '<option value="'.$rang_id.'" '.($rang_id == $proposition->getStatut() ? 'SELECTED' : '').'>'.$rang.'</option>';
				?>
			</select>
		</td></tr>
		<tr><td>Résultat : </td><td style="text-align:left;">
			<select name="resultat" class="form-control">
				<option value="">Selectionnez ...</option>
				<?php
				foreach(Proposition::$resultatArray as $rang_id => $rang)
					echo '<option value="'.$rang_id.'" '.($rang_id == $proposition->getResultat() ? 'SELECTED' : '').'>'.$rang.'</option>';
				?>
			</select>
		</td></tr>
		<tr><td>Transmis au élu le : </td><td style="text-align:left;"><input type="text" class="datepicker form-control" name="transmission" value="<?php echo $proposition->getTransmission(); ?>" /><p class="help-block">(YYYY-MM-DD)</p></td></tr>
		<tr>
			<td>Illustration</td>
			<td style="text-align:left;">
				<?php echo ($proposition->getImage() ? '<div class="alert alert-success">Une image est déjà chargée : <a href="'.ADRESSE.'get_image/500-500/data/upload/'.$proposition->getImage().'" target="_blank">Visualiser</a></div>' : ''); ?>
				<input type="file" name="vignette"/>
				<p class="help-block">Taille idéale : 350px x 300px</p>
			</td>
		</tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=proposition'">
		<input type="submit" name="submit" class="btn btn-default" value="Enregistrer" />
	</div>
</form>

</div>
<?php
}
?>