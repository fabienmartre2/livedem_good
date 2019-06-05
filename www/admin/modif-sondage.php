<?php
	$id = intval($_GET['id']);
	if(!$sondage = Sondage::selectSondage($id)){
		echo '<div class="error">Sondage inconnue</div>';
	}
	else{

?>

<div id="localisation"> > Gestion des sondages</div>
<div id="contenu">

<?php
// #####################
if(isset($_POST['submit'])){
	// Traitement de la mise à jour
	$error = '';
	if(empty($error)){
		$sondage->updateSondage($_POST);
	}
	else{
		echo '<div class="error">La mise à jour a échoué ! <br /> '.$error.'</div>';
	}
}



?>

<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
	<table class="responsive table table-bordered">
		<tr><td>Question : </td><td style="text-align:left;"><input type="text" name="quesiton" class="form-control" value="<?php echo $sondage->getQuestion(); ?>" /></td></tr>
		<tr>
			<td>Date de fin :</td>
			<td style="text-align:left;"><input type="text" name="dateFin" class="datepicker form-control" value="<?php echo (isset($_POST['dateFin']) ? stripslashes($_POST['dateFin']) : $sondage->getDateFin() ) ?>" /></td>
		</tr>
	</table>
	<div style="text-align:center;margin:5px">
		<input type="button" value="Retour" class="btn btn-default" onclick="window.location.href='index.php?page=sondage'">
		<input type="submit" name="submit" class="btn btn-default" value="Enregistrer" />
	</div>
</form>

</div>
<?php
}
?>