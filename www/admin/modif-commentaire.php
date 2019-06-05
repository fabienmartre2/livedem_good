<?php
	$id = intval($_GET['id']);
	if(!$commentaire = Commentaire::selectCommentaire($id)){
		echo '<div class="error">Statut inconnu</div>';
	}
	else{
		$utilisateur = Utilisateur::selectUtilisateur($commentaire->getUtilisateurId());
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
		$commentaire->updateCommentaire($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td>Utilisateur :</td><td style="text-align:left;"><?php echo $utilisateur->getPseudo(); ?></td></tr>
		<tr><td>Message :</td><td style="text-align:left;"><textarea name="message" style="width:350px; height:150px;"><?php echo $commentaire->getMessage(); ?></textarea></td></tr>
		<tr><td>Date : </td><td style="text-align:left;"><input type="text" name="date" class="datePicker" value="<?php echo $commentaire->getDate(); ?>" /></td></tr>
	</table>
	<div style="text-align:center;margin:5px"><input type="submit" name="submit" value="Enregistrer" /></div>
</form>

</div>
<?php
}
?>