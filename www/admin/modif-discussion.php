<?php
	$id = intval($_GET['id']);
	if(!$groupe = Groupe::selectGroupe($id)){
		echo '<div class="error">Elément inconnu</div>';
	}
	else{

?>

<div id="localisation"> > Gestion des groupes</div>
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
		$groupe->updateGroupe($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td>Titre : </td><td style="text-align:left;"><input type="text" name="titre" class="form-control" value="<?php echo htmlentities($groupe->getNom()); ?>" /></td></tr>
		<tr><td>Description :</td><td style="text-align:left;"><textarea name="sujet" class="form-control" rows="20"><?php echo htmlentities($groupe->getSujet()); ?></textarea></td></tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=discussions'">
		<input type="submit" name="submit" class="btn btn-default" value="Enregistrer" />
	</div>
</form>

</div>
<?php
}
?>