<div class="itemGauche">
	<div id="navigation"><h1>Navigation</h1></div>
	<div class="mainnav">
	<?php
	if(!estConnecteAdmin($connexion)){
	// Menu Invité
	?>
		<ul>
			<li><a href="<?php echo ADRESSE; ?>index.php">Accueil du site</a></li>
			<li><a href="<?php echo ADRESSE; ?>admin/index.php?page=connexion">Connexion</a></li>
		</ul>
	<?php
	}
	else{
	// Menu Administrateur
	?>
		<ul>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=utilisateur">Gestion des Comptes</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=proposition">Gestion des Propositions</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=discussions">Gestion des Discussions</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=petitions">Gestion des Pétitions</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=sondage">Gestion des Sondages</a></li>
		</ul>
            <div class="clear" style="height:15px;"></div>
		<ul>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=signalements">Gestion des Signalements</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=mur">Gestion des Statuts</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=photo">Gestion des Photos</a></li>
		</ul>
            <div class="clear" style="height:15px;"></div>
		<ul>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=annexes">Gestion des pages</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=bloctextes">Gestion des textes</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=blocmails">Gestion des E-mails</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=categories">Gestion des Catégories</a></li>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=configuration">Configuration</a></li>
		</ul>
            <div class="clear" style="height:15px;"></div>
        <ul>
            <li><a href="<?php echo ADRESSE; ?>admin/index.php?page=deconnexion">Déconnexion</a></li>
            <li><a href="<?php echo ADRESSE; ?>index.php">Retour sur le site</a></li>
		</ul>

	<?php
	}
	?>
	<div class="clear"></div>
	</div>
</div>
