<div id="localisation"> > Se déconnecter</div>

<?php

	$_SESSION['admin'] = 0;
	echo '<div class="success">';
	echo "Vous êtes correctement déconnecté. A bientôt<br />";
	
	echo '<i><a href="../index.php"> Redirection en cours </a></i>';
	echo '<meta http-equiv="refresh" content="2; url=../index.php" />';
	echo '</div>';

?>