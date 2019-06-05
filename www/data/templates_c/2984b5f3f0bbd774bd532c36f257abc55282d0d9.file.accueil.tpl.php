<?php /* Smarty version Smarty-3.1.14, created on 2019-06-05 13:41:41
         compiled from "/home/livedem/www/templates/accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18415746225cf7aa75374af6-21324188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2984b5f3f0bbd774bd532c36f257abc55282d0d9' => 
    array (
      0 => '/home/livedem/www/templates/accueil.tpl',
      1 => 1476801276,
      2 => 'file',
    ),
    '111fe13ef0e640cf72f4ad7b205effe1c019168d' => 
    array (
      0 => '/home/livedem/www/templates/base.tpl',
      1 => 1451900657,
      2 => 'file',
    ),
    '12074ec22bd5646ded38ba2b5816f3967a82f5b0' => 
    array (
      0 => '/home/livedem/www/templates/search_bar.tpl',
      1 => 1449591567,
      2 => 'file',
    ),
    '4e501149fbe82ca60b0c715dd16b006da6fee0ac' => 
    array (
      0 => '/home/livedem/www/templates/accueil_item.tpl',
      1 => 1477295463,
      2 => 'file',
    ),
    'da2461ae4b4abfbfe3171664c1cbf585cb0ee08c' => 
    array (
      0 => '/home/livedem/www/templates/menu_droit.tpl',
      1 => 1452615091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18415746225cf7aa75374af6-21324188',
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
  'unifunc' => 'content_5cf7aa7558f358_61100708',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cf7aa7558f358_61100708')) {function content_5cf7aa7558f358_61100708($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/livedem/www/lib/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/livedem/www/lib/Smarty/plugins/modifier.truncate.php';
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
			

<?php /*  Call merged included template "search_bar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('search_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '18415746225cf7aa75374af6-21324188');
content_5cf7aa7545c757_77907586($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "search_bar.tpl" */?>

	<div style="margin-bottom:15px; text-align:center;"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/banniere-livedem.jpg" title="Comment ça marche" alt="Livedem - Comment ça marche ?"/></div>

	<div class="clear"></div>

<div class="home_body">

	<?php if (isset($_smarty_tpl->tpl_vars['titre_h1']->value)&&$_smarty_tpl->tpl_vars['titre_h1']->value){?>
		<h1><?php echo $_smarty_tpl->tpl_vars['titre_h1']->value;?>
</h1>
	<?php }?>

	<div class="home_colonne" style="margin-left:0;">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Propositions</div>
			<div class="home_colonne_titre_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/illu_proposition.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html?filter=date">date</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html?filter=niveau">niveau électoral</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			<?php  $_smarty_tpl->tpl_vars['home_proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['home_propositions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_proposition']->key => $_smarty_tpl->tpl_vars['home_proposition']->value){
$_smarty_tpl->tpl_vars['home_proposition']->_loop = true;
?>
				<?php /*  Call merged included template "accueil_item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_proposition']->value), 0, '18415746225cf7aa75374af6-21324188');
content_5cf7aa754b50d5_52118738($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
			<div style="text-align:center; padding:8px 0;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html" style="color:#c22222">Toutes les propostions</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition_add.html">Je propose</a>
		</div>
	</div>

	<div class="home_colonne">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Débats</div>
			<div class="home_colonne_titre_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/illu_debat.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html?filter=date">date</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html?filter=niveau">niveau électoral</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			<?php  $_smarty_tpl->tpl_vars['home_debat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_debat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['home_debats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_debat']->key => $_smarty_tpl->tpl_vars['home_debat']->value){
$_smarty_tpl->tpl_vars['home_debat']->_loop = true;
?>
				<?php /*  Call merged included template "accueil_item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_debat']->value), 0, '18415746225cf7aa75374af6-21324188');
content_5cf7aa754b50d5_52118738($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
			<div style="text-align:center; padding:8px 0;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html" style="color:#c22222">Tous les débats</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html">Je débats</a>
		</div>
	</div>
	<div class="home_colonne" style="margin-right:0;">
		<div class="home_colonne_titre">
			<div class="home_colonne_titre_titre">Votes</div>
			<div class="home_colonne_titre_photo"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/illu_vote.png" /></div>
			<div class="home_colonne_titre_filtre">
				<b>Filtrer par :</b><br />
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html?filter=date">date</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html?filter=niveau">niveau électoral</a> | <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html?filter=categorie">thème</a>
			</div>
		</div>
		<div class="home_colonne_contenu">
			<?php  $_smarty_tpl->tpl_vars['home_vote'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_vote']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['home_votes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_vote']->key => $_smarty_tpl->tpl_vars['home_vote']->value){
$_smarty_tpl->tpl_vars['home_vote']->_loop = true;
?>
				<?php /*  Call merged included template "accueil_item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_vote']->value), 0, '18415746225cf7aa75374af6-21324188');
content_5cf7aa754b50d5_52118738($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
			<div style="text-align:center; padding:8px 0;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html" style="color:#c22222">Tous les votes</a></div>
		</div>
		<div class="home_colonne_footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html">Je vote</a>
		</div>
	</div>
	<div class="clear" style="height:20px;"></div>

	<div class="home_vosvotes">
		<div class="home_vosvotes_titre">Ce que deviennent vos votes</div>
		<div class="home_vosvotes_body">
			<?php  $_smarty_tpl->tpl_vars['home_vosvote'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_vosvote']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['home_vosvotes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_vosvote']->key => $_smarty_tpl->tpl_vars['home_vosvote']->value){
$_smarty_tpl->tpl_vars['home_vosvote']->_loop = true;
?>
			<div class="home_vosvotes_proposition">
				<div class="home_vosvotes_proposition_titre">Le vote sur le proposition : <b><?php echo $_smarty_tpl->tpl_vars['home_vosvote']->value->getTitre();?>
</b></div>
				<div class="home_vosvotes_proposition_date">Vote effectué le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home_vosvote']->value->getUpdateDate(6),"%d/%m/%Y");?>
 - Transmis aux élus le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['home_vosvote']->value->getTransmission(),"%d/%m/%Y");?>
</div>
				
				<div class="home_vosvotes_proposition_statut">Résultat : <span><?php echo $_smarty_tpl->tpl_vars['home_vosvote']->value->getResultatTexte();?>
</span></div>
			</div>
			<?php } ?>
		</div>
	</div>

	<div class="clear" style="height:20px;"></div>
	<div class="home_chiffres">
		<div class="home_chiffres_titre">Livedem en chiffres</div>
		<div class="home_chiffres_body">
			<ul>
				<li><?php echo Proposition::getNbPropositions(array('proposition_statut >= 2'));?>
 Propositions</li>
				<li><?php echo Proposition::getNbPropositions(array('proposition_statut >= 3'));?>
 Débats</li>
				<li><?php echo Proposition::getNbPropositions(array('proposition_statut >= 4'));?>
 Votes</li>
				<li><?php echo Petition::getNbPetitions();?>
 Pétitions</li>
				<li><?php echo Proposition::getNbPropositions(array('proposition_statut >= 6'));?>
 votes pris en compte</li>
				<li><?php echo Utilisateur::getNbUtilisateurs();?>
 citoyens</li>
			</ul>
		</div>
	</div>
	<div class="home_discussions">
		<div class="home_discussions_titre">Discussions</div>
		<div class="home_discussions_body">
			<table style="width:100%;">
				<?php  $_smarty_tpl->tpl_vars['discussion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discussion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discussions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discussion']->key => $_smarty_tpl->tpl_vars['discussion']->value){
$_smarty_tpl->tpl_vars['discussion']->_loop = true;
?>
					<tr><td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['discussion']->value->getNom(),100);?>
</td><td style="width:40px;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussion/<?php echo $_smarty_tpl->tpl_vars['discussion']->value->getId();?>
.html">Voir</a></td></tr>
				<?php } ?>
			</table>
			<div class="home_discussions_more"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussions.html">Voir toutes les discussions</a></div>
		</div>
	</div>

	<div class="clear" style="height:20px;"></div>
	<div class="home_mode_emploi">
		<b style="font-size:18px;">Livedem : mode d’emploi</b><br />
		<br />
		<b>Objectif </b><br />
		Redonner la parole et par ce biais le pouvoir au peuple<br />
		<br />
		<b>Comment?</b><br />
		Grace au site internet collaboratif livedem.org<br />
		- Les citoyens peuvent proposer, débattre et voter sur des questions locales ou nationales<br />
		- Les élus et décideurs/leaders d'opinions sont informés des résultats et invités à agir en conséquence<br />
		<br />
		<b>Qui ?</b><br />
		Vous, et tous les citoyens.
	</div>
</div>

<div class="home_menu">
	<?php /*  Call merged included template "menu_droit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("menu_droit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '18415746225cf7aa75374af6-21324188');
content_5cf7aa75535a73_30106347($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "menu_droit.tpl" */?>
</div>

<div class="clear"></div>



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
	
	
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/bootstrap-typeahead.min.js"></script>
<script>
$(document).ready(function() {
	$('input[name="searchville"]').typeahead({
		ajax: {
	        url: ADRESSE+'ajax/search_ville.php',
	        displayField: "name",
	        triggerLength: 3,
	        method: "get",     
	    },
	    onSelect: function(item) {
	        $('#villeId').val(item.value);
	    },
	});
});
</script>

</body>
</html>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-06-05 13:41:41
         compiled from "/home/livedem/www/templates/search_bar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5cf7aa7545c757_77907586')) {function content_5cf7aa7545c757_77907586($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/livedem/www/lib/Smarty/plugins/function.html_options.php';
?><div id="menu_recherche">
	<form method="GET" action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
recherche.html">
		<div class="recherche_element">Recherche : </div>
		<div class="recherche_element"><input type="text" name="keyword" placeholder="Mots-Clés" value="<?php if (isset($_GET['keyword'])){?><?php echo htmlspecialchars($_GET['keyword'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" /></div>
		<?php if (isset($_GET['niveauId'])){?>
			<?php $_smarty_tpl->tpl_vars['get_niveau'] = new Smarty_variable($_GET['niveauId'], null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['get_niveau'] = new Smarty_variable('', null, 0);?>
		<?php }?>
		<div class="recherche_element"><select name="niveauId"><option value="">Niveau</option><?php echo smarty_function_html_options(array('options'=>Niveau::selectArray(),'selected'=>$_smarty_tpl->tpl_vars['get_niveau']->value),$_smarty_tpl);?>
</select></div>
		<div class="recherche_element"><input type="text" name="date" class="calendrier" placeholder="Date" style="width:100px;" value="<?php if (isset($_GET['date'])){?><?php echo htmlspecialchars($_GET['date'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" /></div>
		<?php if (isset($_GET['categorieId'])){?>
			<?php $_smarty_tpl->tpl_vars['get_categorie'] = new Smarty_variable($_GET['categorieId'], null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['get_categorie'] = new Smarty_variable('', null, 0);?>
		<?php }?>
		<div class="recherche_element"><select name="categorieId"><option value="">Catégorie</option><?php echo smarty_function_html_options(array('options'=>Categorie::selectArray(),'selected'=>$_smarty_tpl->tpl_vars['get_categorie']->value),$_smarty_tpl);?>
</select></div>
		<?php if (isset($_GET['statut'])){?>
			<?php $_smarty_tpl->tpl_vars['get_statut'] = new Smarty_variable($_GET['statut'], null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['get_statut'] = new Smarty_variable('', null, 0);?>
		<?php }?>
		<div class="recherche_element"><select name="statut"><option value="">Statut</option><?php echo smarty_function_html_options(array('options'=>Proposition::$statutArray,'selected'=>$_smarty_tpl->tpl_vars['get_statut']->value),$_smarty_tpl);?>
</select></div>
		<div class="recherche_element" style="float:right; margin-top:-2px;"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_chercher.png" title="Chercher" alt="Chercher" /></div>
		<div class="clear"></div>
	</form>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-06-05 13:41:41
         compiled from "/home/livedem/www/templates/accueil_item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5cf7aa754b50d5_52118738')) {function content_5cf7aa754b50d5_52118738($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/livedem/www/lib/Smarty/plugins/modifier.truncate.php';
?><div class="home_colonne_contenu_item">
	<div class="home_colonne_contenu_titre"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getTitre(),50);?>
</div>
	<div class="home_colonne_contenu_liens">
		<div style="padding-top:6px; float:left;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html">voir proposition complète</a></div>
		<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" style="font-size:10px; float:right; padding:2px 1px;"><b><?php if ($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==2){?>Soutenez<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==3){?>Débattez<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==4){?>Votez<?php }else{ ?>Soutenez<?php }?></b></a>
		<div class="clear"></div>
	</div>
	<div class="home_colonne_contenu_social">
		<span class='st_facebook' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" st_title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getTitre(),90);?>
"></span>
		<span class='st_twitter' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" st_via="LivedemOrg" st_title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getTitre(),90);?>
"></span>
		<span class='st_googleplus' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" st_title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getTitre(),90);?>
"></span>
	</div>
	<div class="clear"></div>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-06-05 13:41:41
         compiled from "/home/livedem/www/templates/menu_droit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5cf7aa75535a73_30106347')) {function content_5cf7aa75535a73_30106347($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['home_question']->value)&&$_smarty_tpl->tpl_vars['home_question']->value){?>
<div class="home_menu_item" style="background:#e7e7e7; padding:15px; border:0; border-radius:10px;">
	<h3>La question du jour</h3>
	<div style="text-align:left;">
		<?php echo $_smarty_tpl->tpl_vars['home_question']->value->getQuestion();?>
<br /><br />
		<form action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
sondage/<?php echo $_smarty_tpl->tpl_vars['home_question']->value->getId();?>
.html" method="POST">
			<label><input type="radio" value="1" name="statut" /> Oui</label><br />
			<label><input type="radio" value="2" name="statut" /> Non</label><br />
			<label><input type="radio" value="3" name="statut" /> NSP (Vote blanc)</label><br /><br />
			<div style="text-align:center;">
				<button class="design" name="voter" type="submit">Voter</button>
			</div>
		</form>
	</div>
</div>
<?php }?>
<div class="home_menu_item">
	<h3>Recherche par région</h3>
	<div style="text-align:center;">
			<div style="background:transparent url('<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/cartes/regions.png')no-repeat;padding:0;margin:0;width:226px;height:251px; margin:auto;">
				<div id="mapRegion" style="background: transparent url('<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/cartes/map_blank.png')">
					<img border="0" usemap="#Map" src="http://www.location-et-vacances-france.fr/images/carte/map_blank.png">
				</div>
			</div>
			<map name="Map" id="Map">
				<area shape="poly" title="Nord-Pas-de-Calais - Picardie" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/nord-pas-de-calais-picardie.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('nord-pas-de-calais-picardie')" coords="109,28,112,32,114,36,114,41,114,45,115,48,115,50,119,50,123,50,127,51,130,52,134,52,138,52,140,55,143,57,146,56,147,52,147,46,152,45,154,41,154,36,156,32,155,21,151,20,147,20,146,16,143,15,141,15,140,12,138,10,136,9,134,10,127,1,124,2,118,4,113,6,112,15" href="" />
				<area shape="poly" title="Alsace - Champagne-Ardenne - Lorraine" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/alsace-champagne-ardenne-lorraine.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('alsace-champagne-ardenne-lorraine')" coords="157,30,160,31,163,29,165,25,167,28,167,32,167,34,170,34,172,35,175,37,177,40,181,39,184,40,186,42,189,41,192,41,195,41,198,47,200,48,203,47,205,49,209,49,210,47,213,49,214,51,223,51,223,56,220,60,219,65,217,70,216,73,216,76,216,80,215,85,217,88,214,91,210,92,207,87,204,84,200,82,198,81,194,80,191,80,189,79,185,82,184,84,183,87,179,88,177,90,174,89,170,87,170,84,168,82,165,80,164,79,161,82,158,82,154,82,151,80,148,77,146,74,144,71,143,67,145,65,144,63,144,58,146,57,147,54,147,52,147,47,150,46,152,45,155,44,155,41,154,38,154,36,156,34" href="" />
				<area shape="poly" title="Ile-de-France" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/ile-de-france.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('ile-de-france')" coords="110,53,112,53,114,50,117,51,122,50,126,51,128,52,131,52,136,52,139,54,141,56,144,58,144,63,144,66,143,68,142,70,136,71,136,75,134,77,130,77,128,77,127,75,127,73,123,72,121,73,119,73,117,70,115,68,113,66,112,63,111,59" />
				<area shape="poly" title="Normandie" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/normandie.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('normandie')" coords="52,34,55,36,58,36,61,35,63,37,63,40,64,42,65,44,69,44,71,45,75,45,77,45,79,46,81,47,85,46,87,45,89,44,86,42,87,38,89,35,93,34,97,33,101,32,104,31,107,29,108,29,111,31,112,34,113,35,113,37,114,40,114,44,114,46,115,48,114,50,112,52,111,53,110,55,110,57,109,59,106,61,104,61,100,62,98,63,99,65,101,67,100,69,98,72,97,76,94,74,91,73,90,70,89,68,87,70,86,71,83,70,81,68,81,65,77,67,74,68,70,68,68,66,65,66,63,65,61,67,59,66,58,64,59,62,58,60,58,57,57,53,58,48,56,44,54,41" href="" />
				<area shape="poly" title="Bourgogne - Franche-Comté" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/bourgogne-franche-comte.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('bourgogne-franche-comte')" coords="137,112,138,109,137,105,136,103,135,99,135,96,135,92,134,89,135,87,137,84,138,81,137,78,136,75,138,72,141,71,143,72,145,74,148,78,151,82,154,83,159,83,163,82,164,81,167,83,170,85,170,88,173,89,177,90,179,90,182,88,184,85,185,83,188,80,191,80,195,81,198,82,201,83,205,85,207,88,208,91,206,94,207,96,205,100,201,104,198,106,197,109,197,112,195,113,193,116,192,120,190,122,188,124,184,124,180,124,177,120,177,119,172,119,170,121,169,124,168,126,166,124,164,124,162,124,160,126,160,128,156,128,152,127,154,124,155,121,154,118,150,116,146,114,144,114,140,115" href="" />
				<area shape="poly" title="Centre" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/centre.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('centre')" coords="98,76,98,73,99,71,102,68,100,66,98,64,101,63,105,61,108,60,110,58,111,62,113,66,114,68,116,71,119,73,121,73,125,73,126,74,127,77,130,78,135,77,137,79,138,82,137,85,134,88,134,92,134,95,135,100,136,104,136,107,138,110,136,113,132,114,129,115,129,119,125,120,123,122,118,121,112,122,107,123,104,123,103,119,100,117,99,113,96,110,96,106,91,107,88,106,86,102,86,99,87,94,87,92,91,91,94,88,97,85,97,82,98,79" href="" />
				<area shape="poly" title="Pays-de-la-Loire" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/pays-de-la-loire.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('pays-de-la-loire')" coords="65,75,65,69,66,67,69,68,71,69,76,68,80,66,82,69,84,71,85,71,89,69,90,72,92,74,95,76,97,77,97,81,96,85,92,88,88,91,86,91,85,96,84,101,80,103,75,103,72,105,69,106,67,106,68,109,70,112,70,117,71,122,68,123,65,123,60,123,52,119,49,115,44,108,46,105,45,102,40,97,39,93,42,92,46,90,49,88,53,87,58,84,60,85,63,84,65,81" href="" />
				<area shape="poly" title="Bretagne" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/bretagne.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('bretagne')" coords="6,60,11,58,15,58,18,60,21,59,23,59,24,55,29,55,31,56,34,60,37,63,38,64,41,63,43,63,47,63,49,63,50,62,54,63,57,64,58,67,63,67,64,68,64,75,64,81,61,82,57,84,54,85,49,87,45,89,42,92,38,91,35,88,31,88,27,88,24,84,20,82,16,82,14,78,11,80,8,80,7,78,4,75,2,73,6,73,9,72,8,70,5,70,2,67,1,62" href="" />
				<area shape="poly" title="Aquitaine - Limousin - Poitou-Charentes" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/aquitaine-limousin-poitou-charentes.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('aquitaine-limousin-poitou-charentes')" coords="63,124,68,124,71,123,72,120,71,116,71,112,68,107,70,107,73,105,76,104,80,104,84,102,86,105,88,108,93,108,95,110,97,113,99,118,102,120,103,123,107,124,111,124,116,122,120,122,123,124,125,125,127,127,130,131,129,134,127,136,125,138,126,141,128,142,127,145,127,148,124,151,121,155,120,159,115,160,112,158,109,158,107,159,106,165,103,168,101,171,100,175,98,175,98,179,94,183,91,183,87,184,82,185,79,185,76,187,76,193,78,196,79,199,80,202,78,205,75,207,74,210,74,213,71,215,67,213,66,211,59,209,57,207,52,207,52,203,51,201,47,199,50,196,53,191,55,182,57,175,58,169,62,166,59,164,57,163,60,145,60,138,57,131,54,125,59,126" href="" />
				<area shape="poly" title="Auvergne - Rhône-Alpes" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/auvergne-rhone-alpes.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('auvergne-rhone-alpes')" coords="124,122,126,119,129,120,129,116,131,115,136,113,139,115,142,115,145,115,149,117,153,119,154,122,153,125,152,126,155,128,160,128,161,125,165,124,167,126,169,125,170,122,173,119,176,121,178,123,182,124,186,124,190,123,193,121,193,124,190,127,192,127,194,125,196,122,200,120,204,121,205,123,204,126,207,129,209,131,208,133,206,134,205,138,209,140,210,142,212,144,212,147,211,149,210,151,207,152,204,154,200,154,196,153,196,155,197,158,197,159,193,161,189,164,186,167,184,169,184,172,182,172,185,176,187,179,184,180,179,178,177,176,174,174,171,175,166,175,164,175,161,176,158,174,155,170,154,167,153,163,151,162,147,162,145,161,144,159,139,161,138,163,137,167,135,164,134,161,132,161,128,164,127,167,123,167,120,164,120,160,122,156,123,153,125,152,127,149,128,146,128,142,125,139,127,137,130,134,131,132,129,128,125,125" href="" />
				<area shape="poly" title="Languedoc-Roussillon - Midi-Pyrénées" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/languedoc-roussillon-midi-pyrenees.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('languedoc-roussillon-midi-pyrenees')" coords="75,213,75,208,78,205,80,202,80,200,79,196,76,193,76,188,79,187,82,186,87,185,91,183,94,183,98,179,99,175,100,175,102,171,106,166,107,162,108,159,111,159,113,160,116,160,119,160,120,164,121,167,124,168,127,167,129,164,131,162,133,162,134,164,136,167,138,167,138,163,140,161,142,161,145,162,149,163,151,164,153,167,154,171,155,173,159,176,163,177,165,176,168,179,168,182,170,183,169,186,167,189,166,191,164,192,162,196,160,197,157,196,154,196,151,199,148,200,143,204,140,207,138,210,137,214,136,222,139,224,135,225,129,226,119,227,115,224,111,220,106,219,102,217,97,215,94,215,92,217,85,217,78,217" href="" />
				<area shape="poly" title="Provences-Alpes-Côte d'Azur" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/provence-alpes-cote-d-azur.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('provence-alpes-cote-d-azur')" coords="166,176,171,176,173,177,175,176,179,179,183,181,187,179,187,177,185,174,185,171,186,168,189,166,193,162,197,161,198,156,198,155,202,155,206,157,207,160,211,161,210,165,209,169,209,171,210,174,212,176,216,177,219,178,224,177,224,181,222,185,221,188,217,191,213,193,210,195,208,198,206,201,206,203,199,206,191,207,187,204,182,202,179,201,173,199,172,201,166,198,162,198,165,194,168,191,169,187,171,183,168,179" href="" />
				<area shape="poly" title="Corse" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/region/corse.html" onmouseout="javascript:hideAlt()" onmouseover="javascript:showAlt('corse')" coords="204,222,209,217,212,215,216,216,216,207,219,207,220,218,221,226,222,230,220,234,217,252,209,245,210,244,207,239,206,234,204,227" href="" />
			</map>
	</div>
	<div class="clear" style="height:16px;"></div>
	<h3>Recherche par département</h3>
	<div style="font-size:11px;text-align:center;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
departements.html">Afficher la carte des départements</a></div>
	<div class="clear" style="height:16px;"></div>
	<h3>Recherche par ville</h3>
	<div style="text-align:center;">
		<form action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite.html" method="GET"  class="form-horizontal">
			<div style="font-size:11px;">Indiquez votre ville ou votre code postal</div>
			<div style="margin-top:4px;" class="form-group form-group-sm"><input type="text" name="searchville" placeholder="12345 / Paris" class="form-control" autocomplete="off" data-provide="typeahead" style="max-w" /><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Rechercher</button></div>
			<input type="hidden" name="villeId" id="villeId" value="" />
			<div class="clear"></div>
		</form>
	</div>

</div>
<div class="home_menu_item theme">
	<h3>Thématique</h3>
	<div style="text-align:left;">
		<ul>
		<?php  $_smarty_tpl->tpl_vars['categorie'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categorie']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['home_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categorie']->key => $_smarty_tpl->tpl_vars['categorie']->value){
$_smarty_tpl->tpl_vars['categorie']->_loop = true;
?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
categorie/<?php echo $_smarty_tpl->tpl_vars['categorie']->value->getId();?>
.html"><?php echo $_smarty_tpl->tpl_vars['categorie']->value->getNom();?>
</a></li>
		<?php } ?>
		</ul>
	</div>
</div><?php }} ?>