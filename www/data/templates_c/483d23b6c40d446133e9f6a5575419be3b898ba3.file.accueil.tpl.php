<?php /* Smarty version Smarty-3.1.14, created on 2014-12-18 16:13:05
         compiled from "/home/livedem/www/dev/templates/accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9513068235492ef01b29800-82702083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '483d23b6c40d446133e9f6a5575419be3b898ba3' => 
    array (
      0 => '/home/livedem/www/dev/templates/accueil.tpl',
      1 => 1418120420,
      2 => 'file',
    ),
    '3f5e36b25fa4eff8a59f8f14994e74f04094dff0' => 
    array (
      0 => '/home/livedem/www/dev/templates/base.tpl',
      1 => 1418120420,
      2 => 'file',
    ),
    '6fe168eea128c8261fa0b3cf251e5c2d85cf976c' => 
    array (
      0 => '/home/livedem/www/dev/templates/search_bar.tpl',
      1 => 1418120421,
      2 => 'file',
    ),
    'c95bcfbf5581dd9d7ce228cf9255ce124e79f618' => 
    array (
      0 => '/home/livedem/www/dev/templates/accueil_item.tpl',
      1 => 1418120420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9513068235492ef01b29800-82702083',
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
  'unifunc' => 'content_5492ef01c64726_82491077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5492ef01c64726_82491077')) {function content_5492ef01c64726_82491077($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('search_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '9513068235492ef01b29800-82702083');
content_5492ef01bce519_03522083($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "search_bar.tpl" */?>

<div class="home_body">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_proposition']->value), 0, '9513068235492ef01b29800-82702083');
content_5492ef01beb6f2_96636889($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_debat']->value), 0, '9513068235492ef01b29800-82702083');
content_5492ef01beb6f2_96636889($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
		</div>
		<div class="home_colonne_footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition_add.html">Je propose</a>
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('accueil_item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['home_vote']->value), 0, '9513068235492ef01b29800-82702083');
content_5492ef01beb6f2_96636889($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "accueil_item.tpl" */?>
			<?php } ?>
		</div>
		<div class="home_colonne_footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition_add.html">Je propose</a>
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
	<div class="home_menu_item" style="background:#e7e7e7; padding:15px; border:0;">
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
	<div class="home_menu_item">
		<h3>La démocratie<br /> près de chez moi</h3>
		<div style="text-align:center;">
			<form action="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
recherche.html" method="GET">
				<input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/menu_carte.png" style="margin-bottom:10px;" />
				<b>Rechercher par code postal :</b><br /><br />
				<div style="width:150px; float:left; font-size:11px;">Indiquez votre code postal et cliquez sur la carte de France</div>
				<div style="width:60px; float:left; margin-left:10px; margin-top:4px;"><input type="text" name="cp" placeholder="12345" style="width:60px;" /></div>
				<div class="clear"></div>
			</form>
		</div>
	</div>
	<div class="home_menu_item">
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
	</div>
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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-12-18 16:13:05
         compiled from "/home/livedem/www/dev/templates/search_bar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5492ef01bce519_03522083')) {function content_5492ef01bce519_03522083($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/livedem/www/dev/lib/Smarty/plugins/function.html_options.php';
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
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-12-18 16:13:05
         compiled from "/home/livedem/www/dev/templates/accueil_item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5492ef01beb6f2_96636889')) {function content_5492ef01beb6f2_96636889($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/livedem/www/dev/lib/Smarty/plugins/modifier.truncate.php';
?><div class="home_colonne_contenu_item">
	<div class="home_colonne_contenu_titre"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getTitre(),50);?>
</div>
	<div class="home_colonne_contenu_liens">
		<div style="padding-top:6px; float:left;"><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html">voir proposition complète</a></div>
		<a class="button" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html" style="font-size:10px; float:right; padding:2px 1px;"><b>Soutenez</b></a>
		<div class="clear"></div>
	</div>
	<div class="home_colonne_contenu_social">
		<span class='st_facebook' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"></span>
		<span class='st_twitter' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"></span>
		<span class='st_googleplus' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"></span>
	</div>
	<div class="clear"></div>
</div><?php }} ?>