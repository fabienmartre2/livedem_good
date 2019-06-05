<?php
	$id = intval($_GET['id']);
	if(!$mur = Mur::selectMur($id)){
		echo '<div class="error">Statut inconnu</div>';
	}
	else{
		$utilisateur = Utilisateur::selectUtilisateur($mur->getUtilisateurId());
?>

<div id="localisation"> > Gestion des statuts</div>
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
		$mur->updateData($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td>Utilisateur :</td><td style="text-align:left;"><?php echo $utilisateur->getPseudo(); ?></td></tr>
		<tr><td>Message :</td><td style="text-align:left;"><textarea name="message" class="form-control" rows="20"><?php echo $mur->getMessage(); ?></textarea></td></tr>
		<tr><td>Date : </td><td style="text-align:left;"><input type="text" name="date" class="datepicker form-control" value="<?php echo $mur->getDate(); ?>" /></td></tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=mur'">
		<input type="submit" name="submit" value="Enregistrer" class="btn btn-default" />
	</div>
</form>

</div>
<?php
}
?>