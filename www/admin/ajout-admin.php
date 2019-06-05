<div id="localisation"> Site > Modification Administrateur</div>
<div id="contenu">

<?php

// #####################
if(isset($_POST['pass']) && !empty($_POST['pass'])){
	$reqUpdate = "INSERT INTO admin SET pseudo =:pseudo,email =:email, pass =:pass, niveau = :niveau";
	$resUpdate = $connexion->prepare($reqUpdate , array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	$resUpdate->execute(array(':niveau' => $_POST['niveau'], ':pseudo' => $_POST['pseudo'], ':email' => $_POST['email'], ':pass' => md5($_POST['pass'])));
	echo '<div class="success"> Administrateur ajouté !</div>';
	echo '<meta http-equiv="refresh" content="1; url=index.php?page=admin" />';
}

echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
echo '<table class="responsive table table-bordered">';
  echo '<tr><td>Pseudo : </td><td style="text-align:left;"><input type="text" name="pseudo" value="" /></td>';
  echo '<tr><td>Email : </td><td style="text-align:left;"><input type="text" name="email" value="" /></td>';
  echo '<tr><td>Mot de passe : </td><td style="text-align:left;"><input type="password" name="pass" value="" /></td>';
  echo '<tr><td>Rang : </td><td style="text-align:left;"><select name="niveau"><option value="2">Administrateur</option><option value="1">Modérateur</option></select></td>';
echo '</table>';
echo '<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href=\'index.php?page=admin\'"><input type="submit" name="submit" value="Mettre à jour"/></div>';
echo '</form>';

?>
</div>