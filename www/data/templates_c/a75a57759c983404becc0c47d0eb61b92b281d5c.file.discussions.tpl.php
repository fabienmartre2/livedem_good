<?php /* Smarty version Smarty-3.1.14, created on 2014-12-08 11:29:39
         compiled from "/home/dev/www/livedem/templates/discussions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26507499454857d93b82a43-68440963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a75a57759c983404becc0c47d0eb61b92b281d5c' => 
    array (
      0 => '/home/dev/www/livedem/templates/discussions.tpl',
      1 => 1417527714,
      2 => 'file',
    ),
    'e53e67b510a6e9288e090fd50c6b6a511e6860fb' => 
    array (
      0 => '/home/dev/www/livedem/templates/base.tpl',
      1 => 1417525742,
      2 => 'file',
    ),
    '28f71416febab4c8771695108c0091816ab967b3' => 
    array (
      0 => '/home/dev/www/livedem/templates/search_bar.tpl',
      1 => 1417525809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26507499454857d93b82a43-68440963',
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
  'unifunc' => 'content_54857d93e36280_29789319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54857d93e36280_29789319')) {function content_54857d93e36280_29789319($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
			

<?php /*  Call merged included template "search_bar.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('search_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '26507499454857d93b82a43-68440963');
content_54857d93d569e5_86855308($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "search_bar.tpl" */?>

<div class="ariane">
	<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a>
	> Discussions
</div>

<div class="proposition_menu">
	<div class="proposition_menu_header">
		Les discussions
	</div>
	<div class="proposition_menu_contenu" style="color:#8e0000;">
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussion_add.html">Créer une nouvelle discussion</a>
	</div>
</div>

<div id="mur_center">
	<?php  $_smarty_tpl->tpl_vars['proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['liste_propositions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proposition']->key => $_smarty_tpl->tpl_vars['proposition']->value){
$_smarty_tpl->tpl_vars['proposition']->_loop = true;
?>
		<div class="liste_proposition">
		<div class="liste_proposition_description">
			<h3><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getNom();?>
</h3>
			<div class="liste_proposition_description_texte"><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getSujet();?>
</div>
			<div class="liste_proposition_description_lien">
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
discussion/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_discussion.png" /></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/>
	<?php } ?>
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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-12-08 11:29:39
         compiled from "/home/dev/www/livedem/templates/search_bar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_54857d93d569e5_86855308')) {function content_54857d93d569e5_86855308($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/dev/www/livedem/lib/Smarty/plugins/function.html_options.php';
?><div id="menu_recherche">
	<form method="GET" action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
recherche.html">
		<div class="recherche_element">Recherche : </div>
		<div class="recherche_element"><input type="text" name="keyword" placeholder="Mots-Clés" /></div>
		<div class="recherche_element"><select name="niveauId"><option value="">Niveau</option><?php echo smarty_function_html_options(array('options'=>Niveau::selectArray()),$_smarty_tpl);?>
</select></div>
		<div class="recherche_element"><input type="text" name="date" class="calendrier" placeholder="Date" style="width:100px;"/></div>
		<div class="recherche_element"><select name="categorieId"><option value="">Catégorie</option><?php echo smarty_function_html_options(array('options'=>Categorie::selectArray()),$_smarty_tpl);?>
</select></div>
		<div class="recherche_element"><select name="statut"><option value="">Statut</option><?php echo smarty_function_html_options(array('options'=>Proposition::$statutArray),$_smarty_tpl);?>
</select></div>
		<div class="recherche_element" style="float:right; margin-top:-2px;"><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_chercher.png" title="Chercher" alt="Chercher" /></div>
		<div class="clear"></div>
	</form>
</div><?php }} ?>