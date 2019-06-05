<?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 07:38:59
         compiled from "/home/livedem/www/templates/proposition_2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8641847525affb873baa1c0-01251878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c89cec267dd7963891ec5e3fac22b5114482da57' => 
    array (
      0 => '/home/livedem/www/templates/proposition_2.tpl',
      1 => 1477295399,
      2 => 'file',
    ),
    '111fe13ef0e640cf72f4ad7b205effe1c019168d' => 
    array (
      0 => '/home/livedem/www/templates/base.tpl',
      1 => 1451900657,
      2 => 'file',
    ),
    'ef1fae85b1a4101d1b3feeec4c6bf5c63ce80884' => 
    array (
      0 => '/home/livedem/www/templates/modal_share.tpl',
      1 => 1454057347,
      2 => 'file',
    ),
    '11f5b02b67eafefa3d4da729b6f60541d88fb49a' => 
    array (
      0 => '/home/livedem/www/templates/view_feed.tpl',
      1 => 1449843710,
      2 => 'file',
    ),
    '45ce68c6ed4a4b54f143c240294f15bda5b71044' => 
    array (
      0 => '/home/livedem/www/templates/view_feed_ro.tpl',
      1 => 1449843710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8641847525affb873baa1c0-01251878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD_TITLE' => 0,
    'HEAD_DESCRIPTION' => 0,
    'MARQUE' => 0,
    'ADRESSE' => 0,
    'global_utilisateur' => 0,
    'page_actif' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5affb8741e2624_35690388',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5affb8741e2624_35690388')) {function content_5affb8741e2624_35690388($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/livedem/www/lib/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['HEAD_TITLE']->value;?>
</title>
	<meta name="title" content="<?php echo $_smarty_tpl->tpl_vars['HEAD_TITLE']->value;?>
" />
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['HEAD_DESCRIPTION']->value;?>
" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" />
	<meta name="language" content="fr" />
	<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/favicon.ico" type="image/x-icon" /> 
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
lib/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
lib/bootstrap/css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
templates/style.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/redmond/jquery-ui.min.css" media="screen" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fonctions.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/jquery.form.min.js"></script>
	<script>
		$(document).ready(function () {
			$("form[name=form_connexion]").submit(function(ev){
				ev.preventDefault();
				$.ajax({
					type: "POST",
					url: ADRESSE+"ajax/ajax_connexion.php", // 
					data: $('form[name=form_connexion]').serialize(),
					success: function(msg){
						var data = $.parseJSON(msg);
						if(data.success){
							location.reload();
						}
						if(data.error){
							$('#loginError').html(data.error);
							$('#loginError').css('display', 'block');
						}
					}
				});
			});
		});
    </script>
	<script type="text/javascript">var ADRESSE = '<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
';</script>
</head>
<body>
	<div id="fb-root" class="container"></div>
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Connexion</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-danger" id="loginError" style="display:none;"></div>
					<form enctype="multipart/form-data" class="form-horizontal" method="POST" name="form_connexion" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8', true);?>
">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group" >
								<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
								<div class="col-sm-8">
									<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?php if (isset($_POST['pseudo'])){?><?php echo $_POST['pseudo'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group" >
								<label for="password" class="col-sm-4 control-label">Mot de passe * : </label>
								<div class="col-sm-8">
									<input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php if (isset($_POST['password'])){?><?php echo $_POST['password'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div style="text-align:center;">
							<button type="submit" class="btn btn-sm btn-red" name="connexion"><i class="glyphicon glyphicon-ok"></i> &nbsp; Se connecter</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<div style="text-align:center;">
						<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
inscription.html">S'inscrire</a> - <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
pass.html">Mot de passe perdu</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="header">
		<div id="header_container">
			<div id="header_logo"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/logo.png" title="<?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['MARQUE']->value;?>
"/></a></div>
			<div id="header_description">
				<div class="header_description_titre">Livedem.org : Inventons ensemble la démocratie 2.0 !</div>
				<div class="header_description_texte">Livedem.org est un outil collaboratif permettant l'expression populaire, le débat public non partisan et le relais auprès des élus.</div>
			</div>
			<div id="header_compte">
				<?php if ($_smarty_tpl->tpl_vars['global_utilisateur']->value){?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
mon-compte.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/header_moncompte.png" title="Mon Compte" alt="Mon Compte" /></a>
					<div class="header_compte_inscription"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
deconnexion.html">Déconnexion</a></div>
				<?php }else{ ?>
					<a href="#" data-toggle="modal" data-target="#myModal"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/header_seconnecter.png" title="Se connecter" alt="Se connecter" /></a>
					<div class="header_compte_inscription"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
inscription.html">Inscription</a></div>
				<?php }?>
				
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div id="menu">
		<div id="menu_container">
			<ul>
				<li class="item <?php if ((!isset($_smarty_tpl->tpl_vars['page_actif']->value)||$_smarty_tpl->tpl_vars['page_actif']->value=="accueil")&&!isset($_GET['statut'])){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a></li>
				<li class="item <?php if ((isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="propositions")||(isset($_GET['statut'])&&$_GET['statut']==2)){?>actif<?php }?> "><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html">Propositions</a></li>
				<li class="item <?php if ((isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="debats")||(isset($_GET['statut'])&&$_GET['statut']==3)){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html">Débats</a></li>
				<li class="item <?php if ((isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="votes")||(isset($_GET['statut'])&&$_GET['statut']==4)){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html">Votes</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="discussions"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussions.html">Discussions</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="petitions"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petitions.html">Pétitions</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="agir"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
agir.html">Agir</a></li>
				<?php if ($_smarty_tpl->tpl_vars['global_utilisateur']->value){?>
					<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="mon-compte"){?>actif<?php }?>" style="background-image:none;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
mon-compte.html">Ma page perso</a></li>
				<?php }else{ ?>
					<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="mon-compte"){?>actif<?php }?>" style="background-image:none;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
connexion.html">Ma page perso</a></li>
				<?php }?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>

	<div id="body">
		<div id="body_container">
			

<?php /*  Call merged included template "modal_share.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("modal_share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '8641847525affb873baa1c0-01251878');
content_5affb873c94864_65467902($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "modal_share.tpl" */?>

<?php if ($_smarty_tpl->tpl_vars['statut']->value==$_smarty_tpl->tpl_vars['proposition']->value->getStatut()){?>
	<script type="text/javascript">typeConteneur = '<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getStatut();?>
';</script>
	<script type="text/javascript">conteneurId = '<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
';</script>
	<script type="text/javascript">lastVerif = '<?php echo time();?>
';</script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/jquery.form.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/mur.js"></script>
<?php }?>

<div class="ariane">
	<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a>
	> <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html">Propositions</a>
	> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>

</div>

	<?php if ($_smarty_tpl->tpl_vars['statut']->value<$_smarty_tpl->tpl_vars['proposition']->value->getStatut()){?>
		<div class="info">Cette page est accessible en lecture uniquement. La proposition en est maintenant au stade <b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getStatutTexte(), ENT_QUOTES, 'UTF-8', true);?>
</b>.<br />
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" style="font-weight:900; color:#DA2B2B;">Cliquez-ici pour y accéder</a></div>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['success']->value){?>
		<div class="success">
			Votre soutien à été pris en compte
		</div>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)){?>
		<div class="error">
			<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

		</div>
	<?php }?>

	<div class="proposition">
		<div class="proposition_image">
			<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getImage()){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/350-300/data/upload/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getImage();?>
" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getCategorie()->getImage()){?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/350-300/data/categorie/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getCategorie()->getImage();?>
" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/350-300/images/no_photo.png" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }?>
		</div>
		<div class="proposition_description">
			<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<div class="proposition_description_date"><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getUtilisateur()->getVille()->getNom();?>
, le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposition']->value->getDate(),"%d/%m/%y");?>
 par <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getUtilisateur()->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
			<div class="proposition_description_texte">
				<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getDescription(), ENT_QUOTES, 'UTF-8', true));?>
<br />
				<b>Période de soutien</b> : Du <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposition']->value->getUpdateDate(2),"d/m/Y");?>
 au <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposition']->value->getNext(2),"d/m/Y");?>
<br />
				<b>Nombre de soutiens</b> : <?php echo $_smarty_tpl->tpl_vars['proposition']->value->getNbSoutiens();?>
 sur <?php echo $_smarty_tpl->tpl_vars['proposition']->value->getNbSoutiensTotal();?>
 nécessaire
			</div>
			<div class="proposition_description_liens">
				<a href="#" data-toggle="modal" data-target="#shareModal"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_email.png" style="margin-left:3px;" /></a>
				<div class="clear" style="height:10px;"></div>
				<div style="float:left">
					<span class='st_facebook_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"></span>
					<span class='st_twitter_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" st_via="LivedemOrg"></span>
					<span class='st_googleplus_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"></span>
				</div>
				<div style="float:right; margin-top:3px;">
					<?php if (Utilisateur::estConnecte()){?>
						<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="POST">
							<input type="hidden" name="soutenir" value="soutenir" />
							<input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_soutenir.png" />
						</form>
						<div class="clear" style="height:8px;"></div>
						<a href="#proposition_add_commentaire"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/commenter_proposition.png" /></a>
					<?php }else{ ?>
						<a data-target="#myModal" data-toggle="modal" href="#"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_soutenir.png" /></a>
						<div class="clear" style="height:8px;"></div>
						<a data-target="#myModal" data-toggle="modal" href="#"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/commenter_proposition.png" /></a>
					<?php }?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

		<h2>Champ d'application</h2>

		<div class="champ_application">
			<div class="champ_application_titre">Thématique</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getCategorie()->getNom(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Niveau Electoral</div>
			<div class="champ_application_info">
				<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getNiveau()->getNom(), ENT_QUOTES, 'UTF-8', true);?>

				<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getNiveauId()==1){?>
					<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getVille()){?><br /><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getVille()->getNom();?>
<?php }?>
				<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getNiveauId()==2){?>
					<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getDepartement()){?><br /><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getDepartement()->getNom();?>
<?php }?>
				<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getNiveauId()==3){?>
					<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getRegion()){?><br /><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getRegion()->getNom();?>
<?php }?>
				<?php }?>
			</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Coût proposition</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getCout(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Zone géographique impactée </div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getZone(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Source de financement</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getFinancement(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>

		<div class="champ_application">
			<div class="champ_application_titre">Population impactée</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getImpact(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Délai mise en place</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getDelai(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>
		<div class="champ_application">
			<div class="champ_application_titre">Période d’application</div>
			<div class="champ_application_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['proposition']->value->getPeriode(), ENT_QUOTES, 'UTF-8', true);?>
</div>
		</div>

		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

		<?php if (Utilisateur::estConnecte()){?>

			<div class="proposition_add_commentaire" id="proposition_add_commentaire">
				<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="POST" name="form_postermur">
					<div class="proposition_add_commentaire_titre">Publier un commentaire</div>
					<table>
						<tr style="vertical-align:top;">
							<td>
								<input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['global_utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
" readonly="readonly" /><br /><br />
								<input type="text" name="pseudo" placeholder="Âge" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['global_utilisateur']->value->getAge(), ENT_QUOTES, 'UTF-8', true);?>
 ans" readonly="readonly" /><br />
							</td>
							<td style="padding-left:20px;">
								<textarea name="message"></textarea>
							</td>
						</tr>
						<tr><td colspan="2">
							<div style="text-align:right; margin-top:10px;"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_valider_commentaire.png" /></div>
						</td></tr>
					</table>
					<input type="hidden" name="conteneurId" value="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
">
					<input type="hidden" name="typeConteneur" value="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getStatut();?>
">
				</form>
			</div>

			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Citoyens soutenant la proposition
				</div>
				<div class="proposition_menu_contenu">
					<?php  $_smarty_tpl->tpl_vars['soutien'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['soutien']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['soutiens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['soutien']->key => $_smarty_tpl->tpl_vars['soutien']->value){
$_smarty_tpl->tpl_vars['soutien']->_loop = true;
?>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['soutien']->value->getUtilisateur()->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
<br />
					<?php } ?>
				</div>
			</div>
			<div id="mur_center">
				<div id="mymur">
					<?php if ($_smarty_tpl->tpl_vars['statut']->value==$_smarty_tpl->tpl_vars['proposition']->value->getStatut()){?>
						<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
							<?php /*  Call merged included template "view_feed.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb873da27a4_57941978($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed.tpl" */?>
						<?php } ?>
					<?php }else{ ?>
						<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
							<?php /*  Call merged included template "view_feed_ro.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed_ro.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb87405a630_48604542($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed_ro.tpl" */?>
						<?php } ?>
					<?php }?>
				</div>
			</div>

			<div class="clear"></div>
		<?php }else{ ?>
			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Citoyens soutenant la proposition
				</div>
				<div class="proposition_menu_contenu">
					<?php  $_smarty_tpl->tpl_vars['soutien'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['soutien']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['soutiens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['soutien']->key => $_smarty_tpl->tpl_vars['soutien']->value){
$_smarty_tpl->tpl_vars['soutien']->_loop = true;
?>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['soutien']->value->getUtilisateur()->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
<br />
					<?php } ?>
				</div>
			</div>
			<div id="mur_center">
				<div id="mymur">
					<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
						<?php /*  Call merged included template "view_feed_ro.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed_ro.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb87405a630_48604542($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed_ro.tpl" */?>
					<?php } ?>
				</div>
			</div>

		<?php }?>

	</div>

	
	

		</div>

		<div class="clear"></div>
		<div id="footer">
			<div id="footer_container">
				<div class="footer_colonne">
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/qui-sommes-nous.html">Qui sommes nous?</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/charte-et-utilisation.html">Charte et utilisation</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/espace-presse.html">Espace presse</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/partenaires.html">Partenaires</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/mentions-legales.html">Mentions légales</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/charte.html">Charte du site</a> <br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
contact.html">Contact</a> <br />
				</div>
				<div class="footer_colonne">
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/charte-moderation.html">Charte de modération</a><br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/reglement-interieur.html">Reglement intérieur</a><br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/comment-ca-marche.html">Comment ça marche?</a><br />
				</div>
				<div class="footer_colonne">
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/faq.html">FAQ</a><br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/comment-s-exprimer.html">Comment participer ?</a><br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/comment-se-presenter.html">Comment se présenter ?</a><br />
				</div>
				<div class="footer_colonne" style="text-align:right; border-right:0;">
					<div style="line-height:16px; margin-bottom:25px;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
contact.html">Créer mon livedem pour mon association / entreprise / collectivité</a></div>
					<a href="<?php echo Config::get('facebook');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_facebook.png" /></a>&nbsp;&nbsp;
					<a href="<?php echo Config::get('twitter');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_twitter.png" /></a>&nbsp;&nbsp;
					<a href="<?php echo Config::get('youtube');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_youtube.png" /></a>
					<div style="margin-top:60px; font-size:9px;">
						<a style="text-decoration:none;" href="http://www.breizhmasters.fr/" target="_blank"><img src="http://www.breizhmasters.fr/images/mini_logo.png" style="vertical-align:middle;"> Réalisé par BreizhMasters</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--[if lt IE 9]>
	  <script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
lib/bootstrap/js/respond.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
lib/bootstrap/js/bootstrap.min.js"></script>
	
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "f57625ec-d400-4101-bd79-8a1f30c87c41", doNotHash: true, doNotCopy: true, hashAddressBar: true, shorten:false, popup:true});</script>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-71662346-1', 'auto');
				ga('send', 'pageview');
			</script>
	
	
</body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 07:38:59
         compiled from "/home/livedem/www/templates/modal_share.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5affb873c94864_65467902')) {function content_5affb873c94864_65467902($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput.min.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput_locale_fr.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#csv").fileinput({'showUpload':false, 'browseLabel':'Parcourir', 'removeLabel':'Supprimer', 'allowedFileExtensions': ['csv', 'txt'], 'showPreview': false});
});
</script>



<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="shareModalLabel">Partager par e-mail</h4>
			</div>
			<div class="modal-body">
				Pour partager cette page avec vos amis, vous pouvez vous connectez à l'un des services suivants :<br />
				<div style="text-align:center;">
					<a href="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=facebook" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_facebook.png" title="Facebook" alt="Facebook" /></a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=gmail" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_gmail.png" title="Gmail" alt="Gmail" /></a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=live" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_live.png" title="Live" alt="Live" /></a>
					<a href="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=yahoo" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_yahoo.png" title="Yahoo" alt="Yahoo" /></a>
				</div>
				<div class="clear" style="height:20px;"></div>
				Vous pouvez aussi importez vos contacts au format CSV : <br />
				<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=csv" target="_blank">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group" >
							<label for="csv" class="col-sm-4 control-label">Fichier CSV : </label>
							<div class="col-sm-8">
								<input type="file" name="csv" id="csv" />
								<p class="help-block">Max : 3Mo</p>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div style="text-align:center;">
						<button type="submit" class="btn btn-sm btn-red" name="csv"> Envoyer</button>
					</div>
				</form>
				<div class="clear" style="height:20px;"></div>
				Ou envoyez une invitation rapide : <br />
				<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['link_share']->value;?>
&type=fast" target="_blank">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="form-group" >
							<label for="nom" class="col-sm-4 control-label">Votre nom * : </label>
							<div class="col-sm-8">
								<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if (isset($_POST['nom'])){?><?php echo $_POST['nom'];?>
<?php }?>" class="form-control"/>
							</div>
						</div>
						<div class="form-group" >
							<label for="email" class="col-sm-4 control-label">E-mail de votre ami * : </label>
							<div class="col-sm-8">
								<input type="text" name="email" id="email" placeholder="E-mail de votre ami" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }?>" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<div style="text-align:center;">
						<button type="submit" class="btn btn-sm btn-red" name="fast"> Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 07:38:59
         compiled from "/home/livedem/www/templates/view_feed.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5affb873da27a4_57941978')) {function content_5affb873da27a4_57941978($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_relative_date')) include '/home/livedem/www/lib/Smarty/plugins/modifier.relative_date.php';
?>
<?php $_smarty_tpl->tpl_vars['utilisateurConnecte'] = new Smarty_variable(Utilisateur::selectUtilisateur($_SESSION['id']), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==6||$_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['interaction'] = new Smarty_variable(Interaction::selectInteraction($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur_share'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['interaction']->value->getUtilisateurId()), null, 0);?>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==3){?>
	<?php $_smarty_tpl->tpl_vars['commentaire'] = new Smarty_variable(Commentaire::selectCommentaire($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['commentaire']->value->getUtilisateurId()), null, 0);?>
	<div class="commentaire" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="messagecomm">
			<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</b> <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['commentaire']->value->getMessage(), ENT_QUOTES, 'UTF-8', true));?>

			<div class="date"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['commentaire']->value->getDate());?>
</span></div>
			<div class="interaction">
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span> - 
				<br />
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Vous aimez<?php }else{ ?>J'aime<?php }?></a></span> -
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Vous n'aimez pas<?php }else{ ?>J'aime pas<?php }?></a></span> - 
				<?php if ($_smarty_tpl->tpl_vars['utilisateurConnecte']->value->estAdministrateur("commentaire",$_smarty_tpl->tpl_vars['commentaire']->value->getId())){?>
					<span class="supprimer"><a href="javascript:supprimer('commentaire', '<?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getId();?>
')">Supprimer</a></span> -
				<?php }?>
				<span class="signaler"><a href="javascript:signaler(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
')">Signaler</a></span>
			</div>
		</div>
		<div class="clear"></div>
	</div>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),1), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==6){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),2), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==1||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==1)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['mur']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['mur']->value->getMessage(), ENT_QUOTES, 'UTF-8', true));?>

			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php /*  Call merged included template "view_feed.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb873da27a4_57941978($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed.tpl" */?>
				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Vous aimez<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Vous n'aimez pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
				<?php if ($_smarty_tpl->tpl_vars['utilisateurConnecte']->value->estAdministrateur("mur",$_smarty_tpl->tpl_vars['mur']->value->getId())){?>
					<span class="supprimer"><a href="javascript:supprimer('mur', '<?php echo $_smarty_tpl->tpl_vars['mur']->value->getId();?>
')">Supprimer</a></span>
				<?php }?>
				<span class="signaler"><a href="javascript:signaler(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
')">Signaler</a></span>
			</div>
			<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
" /><input type="hidden" name="objetId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
" /><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==2||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==2)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['photo']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<div style="text-align:center; margin-bottom:5px;"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
modules/get_image.php?width=430&image=data/photos/<?php echo $_smarty_tpl->tpl_vars['photo']->value->getLocalisation();?>
" /></div>
				<div style="text-align:center; font-size:12px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>
</div>
			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php /*  Call merged included template "view_feed.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb873da27a4_57941978($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed.tpl" */?>
				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
			<div class="social">
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-1"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Vous aimez<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Vous n'aimez pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
				<?php if ($_smarty_tpl->tpl_vars['utilisateurConnecte']->value->estAdministrateur("photo",$_smarty_tpl->tpl_vars['photo']->value->getId())){?>
					<span class="supprimer"><a href="javascript:supprimer('photo', '<?php echo $_smarty_tpl->tpl_vars['photo']->value->getId();?>
')">Supprimer</a></span>
				<?php }?>
				<span class="signaler"><a href="javascript:signaler(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
')">Signaler</a></span>
			</div>
			<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" class="form_commenter" style="display:none;">
				<div class="message"><textarea name="message"></textarea></div>
				<div class="publier"><input type="hidden" name="typeId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
" /><input type="hidden" name="objetId" value="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
" /><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
			</form>
		</div>
		<div class="foot"></div>
	</div>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 07:39:00
         compiled from "/home/livedem/www/templates/view_feed_ro.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5affb87405a630_48604542')) {function content_5affb87405a630_48604542($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_relative_date')) include '/home/livedem/www/lib/Smarty/plugins/modifier.relative_date.php';
?>
<?php if (isset($_SESSION['id'])){?>
	<?php $_smarty_tpl->tpl_vars['utilisateurConnecte'] = new Smarty_variable(Utilisateur::selectUtilisateur($_SESSION['id']), null, 0);?>
<?php }else{ ?>
	<?php $_smarty_tpl->tpl_vars['utilisateurConnecte'] = new Smarty_variable(false, null, 0);?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==6||$_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['interaction'] = new Smarty_variable(Interaction::selectInteraction($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur_share'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['interaction']->value->getUtilisateurId()), null, 0);?>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['feed']->value->getType()==3){?>
	<?php $_smarty_tpl->tpl_vars['commentaire'] = new Smarty_variable(Commentaire::selectCommentaire($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['commentaire']->value->getUtilisateurId()), null, 0);?>
	<div class="commentaire" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="messagecomm">
			<b><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</b> <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['commentaire']->value->getMessage(), ENT_QUOTES, 'UTF-8', true));?>

			<div class="date"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['commentaire']->value->getDate());?>
</span></div>
			<div class="interaction">
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span> - 
				<br />
			</div>
		</div>
		<div class="clear"></div>
	</div>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==5){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),1), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==6){?>
	<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['interaction']->value->getTypeId(),$_smarty_tpl->tpl_vars['interaction']->value->getObjetId(),2), null, 0);?>
	<a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getTypeId();?>
, '<?php echo $_smarty_tpl->tpl_vars['interaction']->value->getObjetId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a>


<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==1||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==1)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['mur'] = new Smarty_variable(Mur::selectMur($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['mur']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['mur']->value->getMessage(), ENT_QUOTES, 'UTF-8', true));?>

			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php /*  Call merged included template "view_feed_ro.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed_ro.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb87405a630_48604542($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed_ro.tpl" */?>
				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
		</div>
		<div class="foot"></div>
	</div>

<?php }elseif($_smarty_tpl->tpl_vars['feed']->value->getType()==2||($_smarty_tpl->tpl_vars['feed']->value->getType()==6&&$_smarty_tpl->tpl_vars['interaction']->value->getTypeId()==2)){?>
	<?php if (isset($_smarty_tpl->tpl_vars['interaction']->value)){?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['interaction']->value->getObjetId()), null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['photo'] = new Smarty_variable(Photo::selectPhoto($_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
	<?php }?>
	<?php $_smarty_tpl->tpl_vars['utilisateur'] = new Smarty_variable(Utilisateur::selectUtilisateur($_smarty_tpl->tpl_vars['photo']->value->getUtilisateurId()), null, 0);?>
	<div class="mur" id="feed<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
">
		<div class="top"></div>
		<div class="body">
			<div class="posteur">
				<div class="pseudo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<div style="text-align:center; margin-bottom:5px;"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
modules/get_image.php?width=430&image=data/photos/<?php echo $_smarty_tpl->tpl_vars['photo']->value->getLocalisation();?>
" /></div>
				<div style="text-align:center; font-size:12px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['photo']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>
</div>
			</div>
			<div class="commentaires">
				<?php $_smarty_tpl->tpl_vars['commsfeed'] = new Smarty_variable(Feed::getFeedCommentaires($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId()), null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commsfeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
					<?php /*  Call merged included template "view_feed_ro.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed_ro.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '8641847525affb873baa1c0-01251878');
content_5affb87405a630_48604542($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed_ro.tpl" */?>
				<?php } ?>
			</div>
			<div>
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1), null, 0);?>
				<span class="like" id="like<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 1)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes aiment <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne aime <?php }?></a></span> - 
				<?php $_smarty_tpl->tpl_vars['nblike'] = new Smarty_variable(Interaction::getNb($_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2), null, 0);?>
				<span class="dislike" id="dislike<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
"><a href="javascript:showlikes(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if ($_smarty_tpl->tpl_vars['nblike']->value>1){?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personnes n'aiment pas <?php }else{ ?> <?php echo $_smarty_tpl->tpl_vars['nblike']->value;?>
 personne n'aime pas <?php }?></a></span>
			</div>
		</div>
		<div class="foot"></div>
	</div>
<?php }?><?php }} ?>