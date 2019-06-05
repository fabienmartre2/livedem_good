<?php /* Smarty version Smarty-3.1.14, created on 2014-12-06 13:47:41
         compiled from "/home/dev/www/livedem/templates/discussion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5595783665482faed194593-83525918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a388715f5d31d3ff54f8e67932e089bf079eef5' => 
    array (
      0 => '/home/dev/www/livedem/templates/discussion.tpl',
      1 => 1417540021,
      2 => 'file',
    ),
    'e53e67b510a6e9288e090fd50c6b6a511e6860fb' => 
    array (
      0 => '/home/dev/www/livedem/templates/base.tpl',
      1 => 1417525742,
      2 => 'file',
    ),
    '82fc98818d796593aee819d733bcff1b136b89c3' => 
    array (
      0 => '/home/dev/www/livedem/templates/view_feed.tpl',
      1 => 1417539849,
      2 => 'file',
    ),
    'cfc184be81b66ce92feee55015627faf21f27aa4' => 
    array (
      0 => '/home/dev/www/livedem/templates/view_feed_ro.tpl',
      1 => 1417539850,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5595783665482faed194593-83525918',
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
  'unifunc' => 'content_5482faee018139_17996711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5482faee018139_17996711')) {function content_5482faee018139_17996711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/dev/www/livedem/lib/Smarty/plugins/modifier.date_format.php';
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
			

<script type="text/javascript">typeConteneur = '20';</script>
<script type="text/javascript">conteneurId = '<?php echo $_smarty_tpl->tpl_vars['groupe']->value->getId();?>
';</script>
<script type="text/javascript">lastVerif = '<?php echo time();?>
';</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/jquery.form.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/mur.js"></script>

<div class="ariane">
	<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a>
	> <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussions.html">Discussions</a>
	> <?php echo $_smarty_tpl->tpl_vars['groupe']->value->getNom();?>

</div>

	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)){?>
		<div class="error">
			<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

		</div>
	<?php }?>

	<div class="proposition">
		<div class="proposition_description">
			<h1><?php echo $_smarty_tpl->tpl_vars['groupe']->value->getNom();?>
</h1>
			<div class="proposition_description_date">Ouvert le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['groupe']->value->getCreation(),"%d/%m/%y");?>
 par <?php echo $_smarty_tpl->tpl_vars['groupe']->value->getUtilisateur()->getPseudo();?>
</div>
			<div class="proposition_description_texte"><?php echo $_smarty_tpl->tpl_vars['groupe']->value->getSujet();?>
</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>

			<div class="proposition_menu">
				<div class="proposition_menu_header">
					Les autres discussions
				</div>
				<div class="proposition_menu_contenu">
					<?php  $_smarty_tpl->tpl_vars['other_groupe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['other_groupe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['other_groupes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['other_groupe']->key => $_smarty_tpl->tpl_vars['other_groupe']->value){
$_smarty_tpl->tpl_vars['other_groupe']->_loop = true;
?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussion/<?php echo $_smarty_tpl->tpl_vars['other_groupe']->value->getId();?>
.html"><?php echo $_smarty_tpl->tpl_vars['other_groupe']->value->getNom();?>
</a><br />
					<?php } ?>
				</div>
			</div>
			
			<div id="mur_center">
					<?php if (Utilisateur::estConnecte()){?>
					<div id="postmur">
						<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" name="form_postermur" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Statut <img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="message"></textarea></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="<?php echo $_smarty_tpl->tpl_vars['groupe']->value->getId();?>
">
						<input type="hidden" name="typeConteneur" value="20">
						</form>
					</div>
					<div id="postphoto" style="display:none;">
						<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>
" name="form_posterphoto" enctype="multipart/form-data">
						<div class="barre">
							<span class="post_mur">Statut <img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/mur_mur.png" /></span>
							<span class="post_photo" style="margin-left:20px;">Photo <img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/mur_photo.png" /></span>
						</div>
						<div class="message"><textarea name="titre"></textarea><br />Photo : <input type="file" name="photo" /><span class="percent"></span></div>
						<div class="publier"><input type="hidden" name="mur" value="1"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/bouton_publier.png" /></div>
						<input type="hidden" name="conteneurId" value="<?php echo $_smarty_tpl->tpl_vars['groupe']->value->getId();?>
">
						<input type="hidden" name="typeConteneur" value="20">
						</form>
					</div>
					<?php }else{ ?>
						<div class="error">Connectez-vous pour participer à la discussion</div>
					<?php }?>
				<div id="mymur">
					<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
						<?php if (Utilisateur::estConnecte()){?>
							<?php /*  Call merged included template "view_feed.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faed42b4c4_71816500($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed.tpl" */?>
						<?php }else{ ?>
							<?php /*  Call merged included template "view_feed_ro.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed_ro.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faeda82fd0_89563500($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "view_feed_ro.tpl" */?>
						<?php }?>
					<?php } ?>
				</div>
			</div>
			<div class="clear"></div>

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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-12-06 13:47:41
         compiled from "/home/dev/www/livedem/templates/view_feed.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5482faed42b4c4_71816500')) {function content_5482faed42b4c4_71816500($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_relative_date')) include '/home/dev/www/livedem/lib/Smarty/plugins/modifier.relative_date.php';
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
			<b><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</b> <?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getMessage();?>

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
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span> -
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
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
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<?php echo $_smarty_tpl->tpl_vars['mur']->value->getMessage();?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faed42b4c4_71816500($_smarty_tpl);
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
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
				<?php if ($_smarty_tpl->tpl_vars['utilisateurConnecte']->value->estAdministrateur("mur",$_smarty_tpl->tpl_vars['mur']->value->getId())){?>
					<span class="supprimer"><a href="javascript:supprimer('mur', '<?php echo $_smarty_tpl->tpl_vars['mur']->value->getId();?>
')">Supprimer</a></span>
				<?php }?>
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
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
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
				<div style="text-align:center; font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['photo']->value->getTitre();?>
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faed42b4c4_71816500($_smarty_tpl);
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
', 1)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),1)){?>Supprimer J'aime<?php }else{ ?>J'aime<?php }?></a></span>
				<span class="aimer" id="aimer<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
-<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
-2"><a href="javascript:like(<?php echo $_smarty_tpl->tpl_vars['feed']->value->getType();?>
, '<?php echo $_smarty_tpl->tpl_vars['feed']->value->getId();?>
', 2)"><?php if (Interaction::existInteraction($_SESSION['id'],$_smarty_tpl->tpl_vars['feed']->value->getType(),$_smarty_tpl->tpl_vars['feed']->value->getId(),2)){?>Supprimer J'aime pas<?php }else{ ?>J'aime pas<?php }?></a></span>
				<span class="commenter">Commenter</span>
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
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-12-06 13:47:41
         compiled from "/home/dev/www/livedem/templates/view_feed_ro.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5482faeda82fd0_89563500')) {function content_5482faeda82fd0_89563500($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_relative_date')) include '/home/dev/www/livedem/lib/Smarty/plugins/modifier.relative_date.php';
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
			<b><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</b> <?php echo $_smarty_tpl->tpl_vars['commentaire']->value->getMessage();?>

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
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
</div>
				<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['feed']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['feed']->value->getDate());?>
</span></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<?php echo $_smarty_tpl->tpl_vars['mur']->value->getMessage();?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faed42b4c4_71816500($_smarty_tpl);
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
				<div class="pseudo"><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo();?>
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
				<div style="text-align:center; font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['photo']->value->getTitre();?>
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('view_feed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('feed'=>$_smarty_tpl->tpl_vars['data']->value), 0, '5595783665482faed194593-83525918');
content_5482faed42b4c4_71816500($_smarty_tpl);
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
		</div>
		<div class="foot"></div>
	</div>
<?php }?><?php }} ?>