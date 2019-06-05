<?php /* Smarty version Smarty-3.1.14, created on 2014-12-03 15:38:23
         compiled from "/home/dev/www/livedem/templates/mon-compte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1660466730547f205f9d1a61-27608049%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3bfbd6acb27b141d648611b6a24a67666d3a9f0' => 
    array (
      0 => '/home/dev/www/livedem/templates/mon-compte.tpl',
      1 => 1417468516,
      2 => 'file',
    ),
    'e53e67b510a6e9288e090fd50c6b6a511e6860fb' => 
    array (
      0 => '/home/dev/www/livedem/templates/base.tpl',
      1 => 1417525742,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1660466730547f205f9d1a61-27608049',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD_TITLE' => 0,
    'HEAD_DESCRIPTION' => 0,
    'HEAD_KEYWORDS' => 0,
    'ADRESSE' => 0,
    'MARQUE' => 0,
    'global_utilisateur' => 0,
    'page_actif' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_547f205fdb5c56_23874962',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547f205fdb5c56_23874962')) {function content_547f205fdb5c56_23874962($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_date')) include '/home/dev/www/livedem/lib/Smarty/plugins/function.html_select_date.php';
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
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['HEAD_KEYWORDS']->value;?>
" />
	<meta name="robots" content="index,follow" />
	<meta name="author" content="Charles-Henri BERNARD" />
	<meta name="language" content="fr" />
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
	<script type="text/javascript">var ADRESSE = '<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
';</script>
</head>
<body>
	<div id="fb-root"></div>
	<div id="masque"></div>
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
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
connexion.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
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
				<li class="item <?php if (!isset($_smarty_tpl->tpl_vars['page_actif']->value)||$_smarty_tpl->tpl_vars['page_actif']->value=="accueil"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="propositions"){?>actif<?php }?> "><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html">Propositions</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="debats"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
debats.html">Débats</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="votes"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
votes.html">Votes</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="discussions"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussions.html">Discussions</a></li>
				<li class="item <?php if (isset($_smarty_tpl->tpl_vars['page_actif']->value)&&$_smarty_tpl->tpl_vars['page_actif']->value=="petitions"){?>actif<?php }?>"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petitions.html">Pétitions</a></li>
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
			

<div class="ariane">
	<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a>
	> <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
inscription.html">Mon compte</a>
</div>

	<h1 class="titre">Mon compte</h1>
		<?php if (isset($_smarty_tpl->tpl_vars['success']->value)&&$_smarty_tpl->tpl_vars['success']->value){?>
		<div class="success">
			Votre inscription ont été mise à jour.<br />
		</div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)&&!empty($_smarty_tpl->tpl_vars['error']->value)){?>
			<div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
		<?php }?>
		<form name="inscription" action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="POST">
			<div class="form_design">
				<table style="margin:auto;">
					<tr><td class="form_design_titre">Pseudo :</td><td><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</td></tr>
					<tr><td class="form_design_titre">Nom :</td><td><input type="text" name="nom" value="<?php if (isset($_POST['nom'])){?><?php echo stripslashes($_POST['nom']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getNom();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Prénom :</td><td><input type="text" name="prenom" value="<?php if (isset($_POST['prenom'])){?><?php echo stripslashes($_POST['prenom']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPrenom();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Email :</td><td><input type="text" name="email" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes($_POST['email']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getEmail();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Mot de passe :</td><td><input type="password" name="password" value="<?php if (isset($_POST['password'])){?><?php echo stripslashes($_POST['password']);?>
<?php }?>" /><br /><i>Laissez vide pour ne pas modifier</i></td></tr>
					<tr><td class="form_design_titre">Confirmer le mot de passe :</td><td><input type="password" name="passwordc" value="<?php if (isset($_POST['passwordc'])){?><?php echo stripslashes($_POST['passwordc']);?>
<?php }?>" /></td></tr>
					<tr>
						<td class="form_design_titre">Date de naissance :</td>
						<td>
							<?php if (isset($_POST['dateNaissance'])&&!empty($_POST['dateNaissance'])&&!empty($_POST['dateNaissance']['Day'])&&!empty($_POST['dateNaissance']['Month'])&&!empty($_POST['dateNaissance']['Year'])){?>
								<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'all_empty'=>'--','time'=>$_POST['dateNaissance'],'start_year'=>'-100','field_array'=>'dateNaissance','field_order'=>'DMY','month_format'=>'%m','prefix'=>''),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'time'=>null,'all_empty'=>'--','start_year'=>'-100','field_array'=>'dateNaissance','field_order'=>'DMY','month_format'=>'%m','prefix'=>''),$_smarty_tpl);?>

							<?php }?>
						</td>
					</tr>
					<tr><td class="form_design_titre">Téléphone fixe :</td><td><input type="text" name="telFixe" value="<?php if (isset($_POST['telFixe'])){?><?php echo stripslashes($_POST['telFixe']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getTelFixe();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Téléphone portable :</td><td><input type="text" name="telPort" value="<?php if (isset($_POST['telPort'])){?><?php echo stripslashes($_POST['telPort']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getTelPort();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Numéro de sécurité sociale :</td><td><input type="text" name="numSecu" value="<?php if (isset($_POST['numSecu'])){?><?php echo stripslashes($_POST['numSecu']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getNumSecu();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Numéro d'électeur :</td><td><input type="text" name="numElecteur" value="<?php if (isset($_POST['numElecteur'])){?><?php echo stripslashes($_POST['numElecteur']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getNumElecteur();?>
<?php }?>" /></td></tr>
					<tr><td class="form_design_titre">Bureau de vote :</td><td><input type="text" name="bureauVote" value="<?php if (isset($_POST['bureauVote'])){?><?php echo stripslashes($_POST['bureauVote']);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getBureauVote();?>
<?php }?>" /></td></tr>
				</table>
			</div>
			<div class="clear" style="height:20px;"></div>
			<div style="text-align:center;">
				<input type="hidden" name="send" value="1" />
				<button type="submit" class="design"><div class="data">Mettre à jour</div></button>
			</div>
		</form>
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
cms/comment-s-exprimer.html">Comment s'exprimer?</a><br />
					<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/comment-se-presenter.html">Comment se présenter?</a><br />
				</div>
				<div class="footer_colonne" style="text-align:right; border-right:0;">
					<a href="<?php echo Config::get('facebook');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_facebook.png" /></a>&nbsp;&nbsp;
					<a href="<?php echo Config::get('twitter');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_twitter.png" /></a>&nbsp;&nbsp;
					<a href="<?php echo Config::get('youtube');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/footer_youtube.png" /></a>
					<div style="margin-top:120px; font-size:9px;">
						<a style="text-decoration:none;" href="http://www.breizhmasters.fr/"><img src="http://www.breizhmasters.fr/images/mini_logo.png" style="vertical-align:middle;"> Réalisé par BreizhMasters</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "f57625ec-d400-4101-bd79-8a1f30c87c41", doNotHash: true, doNotCopy: true, hashAddressBar: true, shorten:false, popup:true});</script>
	
</body>
</html>
<?php }} ?>