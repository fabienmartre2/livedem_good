<?php
	$id = intval($_GET['id']);
	if(!$profil = Utilisateur::selectUtilisateur($id)){
		echo '<div class="error">Compte inconnu</div>';
	}
	else{
		$ville = Ville::selectVille($profil->getVilleId());
?>

<div id="localisation"> > Gestion des compte</div>
<div id="contenu">

<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>js/shadowbox.css" media="screen" />
<script type="text/javascript" src="<?php echo ADRESSE; ?>js/shadowbox.js"></script>
<script type="text/javascript">Shadowbox.init();</script>
<script type="text/javascript">$(document).ready(function() {
	$('#codepostal').keyup(function(){
		if($('#codepostal').val().length == 5){
			$.get(ADRESSE+"ajax/ville.php", { cp: $('#codepostal').val()},
			 function(data){
				 $('#villeId').html(data);
			 });
		}
	});

	$('.calendrier').datepicker({
		dateFormat: 'dd/mm/yy'
	});

});</script>


<?php
// #####################
if(isset($_POST['submit'])){
	// Traitement de la mise à jour
	$error = '';
	if(empty($error)){
		if(empty($_POST['password']))
			unset($_POST['password']);
		$profil->updateUtilisateur($_POST);
		$ville = Ville::selectVille($profil->getVilleId());
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td style="width:200px;"></td><td></td></tr>
		<tr><td>Pseudo : </td><td style="text-align:left;"><?php echo $profil->getPseudo(); ?></td></tr>
		<tr><td>Email : </td><td style="text-align:left;"><input type="text" name="email" class="form-control" value="<?php echo $profil->getEmail(); ?>" /></td></tr>
		<tr><td>Mot de passe :</td><td style="text-align:left;"><input type="password" class="form-control" name="password" value="" /></td></tr>
		<tr><td>Confirmer le mot de passe : </td><td style="text-align:left;"><input type="password" class="form-control" name="passwordc" value="" /></td></tr>
		<tr><td>Nom : </td><td style="text-align:left;"><input type="text" name="nom" class="form-control" value="<?php echo $profil->getNom(); ?>" /></td></tr>
		<tr><td>Prénom : </td><td style="text-align:left;"><input type="text" name="prenom" class="form-control" value="<?php echo $profil->getPrenom(); ?>" /></td></tr>
		<tr><td>Adresse : </td><td style="text-align:left;"><input type="text" name="adresse" class="form-control" value="<?php echo $profil->getAdresse(); ?>" /></td></tr>
		<tr><td>Code postal : </td><td style="text-align:left;"><input type="text" name="ville_codepostal" class="form-control" id="codepostal" value="<?php echo $ville->getCodePostal(); ?>" /></td></tr>
		<tr><td>Ville : </td><td style="text-align:left;"><select name="villeId" class="form-control" id="villeId"><option value="<?php echo $ville->getId(); ?>"><?php echo $ville->getNom(); ?></option></select></td></tr>
		<tr><td>Telephone Fixe : </td><td style="text-align:left;"><input type="text" name="telFixe" class="form-control" value="<?php echo $profil->getTelFixe(); ?>" /></td></tr>
		<tr><td>Telephone Portable : </td><td style="text-align:left;"><input type="text" name="telPort" class="form-control" value="<?php echo $profil->getTelPort(); ?>" /></td></tr>
		<tr><td>Numéro de sécu : </td><td style="text-align:left;"><input type="text" name="numSecu" class="form-control" value="<?php echo $profil->getNumSecu(); ?>" /></td></tr>
		<tr><td>Numéro électeur : </td><td style="text-align:left;"><input type="text" name="numElecteur" class="form-control" value="<?php echo $profil->getNumElecteur(); ?>" /></td></tr>
		<tr><td>Bureau de vote : </td><td style="text-align:left;"><input type="text" name="bureauVote" class="form-control" value="<?php echo $profil->getBureauVote(); ?>" /></td></tr>
		<tr><td>Validation : </td><td style="text-align:left;"><input type="text" name="valid" class="form-control" value="<?php echo $profil->getValid(); ?>" /><p class="help-block">(Vide = Compte validé)</p></td></tr>
		<tr><td>Rang : </td><td style="text-align:left;">
			<select name="rang" class="form-control">
				<?php
				foreach(Utilisateur::$rangArray as $rang_id => $rang)
					echo '<option value="'.$rang_id.'" '.($rang_id == $profil->getRang() ? 'SELECTED' : '').'>'.$rang.'</option>';
				?>
			</select>
		</td></tr>
		<tr><td>Administrateur : </td><td style="text-align:left;">
			<select name="admin" class="form-control">
				<?php
				foreach(Utilisateur::$adminArray as $rang_id => $rang)
					echo '<option value="'.$rang_id.'" '.($rang_id == $profil->getAdmin() ? 'SELECTED' : '').'>'.$rang.'</option>';
				?>
			</select>
		</td></tr>
		<tr><td>Newsletter : </td><td style="text-align:left;">
			<select name="newsletter" class="form-control">
				<option value="0" <?php echo (($profil->getNewsletter() == 0) ? 'SELECTED' : ''); ?>>Non</option>
				<option value="1" <?php echo (($profil->getNewsletter() == 1) ? 'SELECTED' : ''); ?>>Oui</option>
			</select>
		</td></tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=utilisateur'" />
		<input type="submit" name="submit" class="btn btn-default" value="Enregistrer" />
	</div>
</form>

</div>
<?php
}
?>