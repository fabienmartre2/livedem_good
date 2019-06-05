<?php

echo '<div id="localisation"> > Connexion</div>';
echo '<div id="contenu">';

// Initialisation des variables
	$error = false;
	$success = false;
	$msg = "";

if(estConnecteAdmin()){
	echo '<div class="error">
					Vous êtes déjà connecté<br />
					<i><a href="index.php"> Redirection en cours </a></i>
					<meta http-equiv="refresh" content="2; url=index.php" />
				</div>';
}
else{
	if(isset($_POST['user']) && isset($_POST['pass'])){
		// Traitement du formulaire
			// On vérifie que tout les champs sont remplis sinon on affiche une erreur
			if(!isset($_POST['user']) || empty($_POST['user'])){
				$error= true;
				$msg .= "Vous devez saisir votre pseudo<br />";
			}
			if(!isset($_POST['pass']) || empty($_POST['pass'])){
				$error= true;
				$msg .= "Vous devez saisir votre mot de passe<br />";
			}
			if(!$error){
				// On vérifie les accès
				if($admins = Admin::selectAdmins(1, 1, array("admin_pseudo = '".$_POST['user']."'", "admin_password = '".md5($_POST['pass'])."'"))){
					$admin = $admins[0];
					$_SESSION['admin'] = $admin->getId();
					$success = true;
				}
			else{
				$error= true;
				$msg .= "Pseudo ou Mot de passe incorrect.<br />";
			}
		}
	}

	if($success == 1){
	echo '<div class="success">';
				echo "Vous êtes correctement connecté<br />";
				echo '<i><a href="index.php"> Redirection en cours </a></i>';
				echo '<meta http-equiv="refresh" content="3; url=index.php" />';
				echo '</div>';

	}
	else{

		if($error)
			echo '<div class="error">'.$msg.'</div>';

		echo '<div style="border:1px solid #4dacde; padding:5px; width:80%; margin:auto;">
						<form action="index.php?page=connexion" method="post">
							<table align="center">
								<tr>
									<td style="text-align:right;">Nom d\'utilisateur : </td><td> <input type="text" name="user" id="pseudo"></td>
								</tr>
								<tr>
									<td style="text-align:right;">Mot de passe : </td><td><input type="password" name="pass" id="password"></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center"><input type="submit" id="connexion" value="Se connecter"></td>
								</tr>
							</table>
						</form>
					</div>';
	}
}
echo '</div>';
?>