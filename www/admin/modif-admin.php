<div id="localisation"> Site > Modification Administrateur</div>
<div id="contenu">

<?php

// #####################
if(isset($_POST['pass']) && !empty($_POST['pass'])){
	$reqUpdate = "UPDATE admin SET pseudo =:pseudo,email =:email, pass =:pass, niveau = :niveau WHERE id = :id";
	$resUpdate = $connexion->prepare($reqUpdate , array(PDO::ATTR_CURSOR, PDO::CURSOR_FWDONLY));
	$resUpdate->execute(array(':niveau' => $_POST['niveau'], ':pseudo' => $_POST['pseudo'], ':email' => $_POST['email'], ':pass' => md5($_POST['pass']), ':id' => $_GET['id']));
	echo '<div class="success"> Administrateur mise à jour !</div>';
}


	if(isset($_GET['id'])){
		// On récupère l'inscrit
		$reqInscrit = "SELECT * FROM admin WHERE id=:id";
		$resInscrit = $connexion->prepare($reqInscrit, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$resInscrit->execute(array(':id' => $_GET['id']));
		if($resInscrit->rowCount() != 0){
				echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
				$inscrit = $resInscrit->fetch(PDO::FETCH_ASSOC);
				echo '<table class="responsive table table-bordered">';
					echo '<tr><td>Pseudo : </td><td style="text-align:left;"><input type="text" name="pseudo" value="'.stripslashes($inscrit['pseudo']).'" /></td>';
					echo '<tr><td>Email : </td><td style="text-align:left;"><input type="text" name="email" value="'.stripslashes($inscrit['email']).'" /></td>';
					echo '<tr><td>Mot de passe : </td><td style="text-align:left;"><input type="password" name="pass" value="" /></td>';
					echo '<tr><td>Rang : </td><td style="text-align:left;"><select name="niveau"><option value="2" '.($inscrit['niveau'] == 2 ? 'SELECTED' : '').'>Administrateur</option><option value="1" '.($inscrit['niveau'] == 1 ? 'SELECTED' : '').'>Modérateur</option></select></td>';
				echo '</table>';
				echo '<div style="text-align:center;margin:5px"><input type="button" value="Retour" onclick="window.location.href=\'index.php?page=admin\'"><input type="submit" name="submit" value="Mettre à jour"/></div>';
				echo '</form>';
		}
		else{
			echo '<div class="error">Profil Inconnu.</div>';
		}
	}
	else{
		echo '<div class="error">Profil Inconnu.</div>';
	}
?>
</div>