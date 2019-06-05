<?php
ob_start();

include("../conf/config.php");
include("./fonctions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title><?php echo MARQUE; ?> - Administration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>lib/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>lib/bootstrap/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="js/theme.blue.css" />
	<link rel="stylesheet" type="text/css" href="js/filter.formatter.css" />
	<script type="text/javascript"> var ADRESSE = "<?php echo ADRESSE; ?>";</script>
	<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>js/redmond/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo ADRESSE; ?>js/redmond/jquery.ui.theme.css" />
	<script type="text/javascript" src="<?php echo ADRESSE; ?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo ADRESSE; ?>js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>    
	<script type="text/javascript" src="js/jquery.tablesorter.pager.min.js"></script>    
	<script type="text/javascript" src="js/jquery.tablesorter.widgets.min.js"></script>    
	<script type="text/javascript" src="js/fonctions.js"></script>
	<script type="text/javascript" src="js/calendrier.js"></script>

	<script type="text/javascript">
		$(document).ready(function(e) {
			$(".suppr").bind("click", function(ev) {
				
				choix = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
				if (!choix)
				{
					ev.preventDefault();
					ev.stopPropagation();
				}
			});
		});
	</script>
</head>
<body>

	<!-- header -->
	<div id="header">
		<div id="header_gauche">
			<a href="<?php echo ADRESSE; ?>admin/"><img src="<?php echo ADRESSE; ?>/images/logo.png" title="<?php echo MARQUE; ?>" style="max-height:80px;" /></a>
		</div>
		<div id="header_droit">
			<?php
			if(!estConnecteAdmin($connexion))
				echo 'Vous n\'êtes actuellement pas connecté';
			else{
				echo 'Bienvenue Administrateur !<br />';
				echo '<a href="'.ADRESSE.'admin/index.php?page=deconnexion">Se déconnecter</a>';
			}
			?>
		</div>
		<div class="clear"></div>
	</div>

	<!-- outerWrapper -->
	<div id="outerWrapper">

		<!-- innerWrapper -->
		<div id="innerWrapper">

			<!-- contenu -->
			<div id="content"> 

				<?php

				if(!estConnecteAdmin($connexion))
				{
					include('connexion.php');
				}
				else
				{
					if(isset($_GET['page'])){
						if(file_exists($_GET['page'].'.php'))
							include($_GET['page'].'.php');
						else
							include('accueil.php');
					}
					else
						include('accueil.php');
				}





				?>
			</div>
			<!-- fin content -->

			<!-- leftMenu -->
			<div id="leftMenu" class="menu">

				<?php 
				include("menugauche.php"); ?>
			</div>
			<!-- fin leftMenu -->

			<!-- clearer -->
			<div class="clearer">&nbsp;</div>
		</div> 
		<!-- fin innerWrapper -->

		<!-- clearer -->

		<div class="clearer">&nbsp;</div>
	</div> 
	<!-- fin outerWrapper -->

	<!-- footer -->
	<div id="footer"><?php echo MARQUE; ?> - Interface D'administration</div> 
	<!-- fin footer -->

</body>
</html>
<?php ob_end_flush(); ?>
