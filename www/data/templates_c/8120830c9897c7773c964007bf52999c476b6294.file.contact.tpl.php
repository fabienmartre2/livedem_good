<?php /* Smarty version Smarty-3.1.14, created on 2014-12-13 16:08:08
         compiled from "/home/livedem/www/dev/templates/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85034888548c5658c92492-96005811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8120830c9897c7773c964007bf52999c476b6294' => 
    array (
      0 => '/home/livedem/www/dev/templates/contact.tpl',
      1 => 1418120420,
      2 => 'file',
    ),
    '3f5e36b25fa4eff8a59f8f14994e74f04094dff0' => 
    array (
      0 => '/home/livedem/www/dev/templates/base.tpl',
      1 => 1418120420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85034888548c5658c92492-96005811',
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
  'unifunc' => 'content_548c5658da7411_80774226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548c5658da7411_80774226')) {function content_548c5658da7411_80774226($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	> Contact
</div>
<h1 class="titre">Contact</h1>
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)&&$_smarty_tpl->tpl_vars['error']->value){?>
			<div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['success']->value)&&$_smarty_tpl->tpl_vars['success']->value){?>
			<div class="success">Votre message a correctement été envoyé</div>
		<?php }?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
contact.html" method="post">
			<table style="margin:auto;">
			<tr>
				<td style="vertical-align:middle;">Civilité * : </td><td style="vertical-align:middle;">
					<input type="radio" class="type" name="type" value="Mme." <?php if (isset($_POST['type'])&&$_POST['type']=="Mme."){?>SELECTED<?php }?> style="margin-right:4px;"/>Mme
					<input type="radio" class="type" name="type" value="Mlle." <?php if (isset($_POST['type'])&&$_POST['type']=="Mlle."){?>SELECTED<?php }?> style="margin-right:4px; margin-left:8px;"/>Mle
					<input type="radio" class="type" name="type" value="M." <?php if (isset($_POST['type'])&&$_POST['type']=="M."){?>SELECTED<?php }?> style="margin-right:4px; margin-left:8px;" />M
				</td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Nom * : </td><td style="vertical-align:middle;"><input type="text" name="nom" style="width:239px; margin-bottom:2px;" value="<?php if (isset($_POST['nom'])){?><?php echo stripslashes($_POST['nom']);?>
<?php }?>" /></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Email * : </td><td style="vertical-align:middle;"><input type="text" name="email" style="width:239px; margin-bottom:2px;" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes($_POST['email']);?>
<?php }?>" /></td>
			</tr>
			<tr>
				<td style="padding-right:5px;">Objet * : </td><td style="vertical-align:middle;"><input type="text" name="objet" style="width:239px; margin-bottom:2px;" value="<?php if (isset($_POST['objet'])){?><?php echo stripslashes($_POST['objet']);?>
<?php }?>" /></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Message * : </td><td style="vertical-align:middle;"><textarea name="message" style="width:239px; margin-bottom:2px;" rows="10" cols="35"><?php if (isset($_POST['message'])){?><?php echo stripslashes($_POST['message']);?>
<?php }?></textarea></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Code de confirmation :</td>
				<td style="vertical-align:middle;"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
modules/anti_spam.php?name=contact&strlen=6" alt="anti-flood" align="middle" style="margin-bottom:2px;"/></td>
			</tr>
				<td style="vertical-align:middle;">A recopier ci-contre * : </td><td style="vertical-align:middle;"><input type="text" name="spam" size="8" maxlength="6" id="spam" style="margin-bottom:2px;"/></td>
			</tr>
			</tr>
				<td></td><td style="text-align:left; padding-top:15px;"><button type="submit" class="design" name="send">Envoyer</button></td>
			</tr>
			
		</table>
	</form>		

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