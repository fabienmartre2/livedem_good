<?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 00:30:26
         compiled from "/home/livedem/www/templates/petition.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4327592875aff54024ab645-52140168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c3abc1e331424035123a51b8b22209582819c59' => 
    array (
      0 => '/home/livedem/www/templates/petition.tpl',
      1 => 1454057227,
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
    '72c9e614ba70d8083cfab4c89cb2e720fce8bdc9' => 
    array (
      0 => '/home/livedem/www/templates/error_access.tpl',
      1 => 1450284908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4327592875aff54024ab645-52140168',
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
  'unifunc' => 'content_5aff54025fb542_12066584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aff54025fb542_12066584')) {function content_5aff54025fb542_12066584($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/livedem/www/lib/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_relative_date')) include '/home/livedem/www/lib/Smarty/plugins/modifier.relative_date.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("modal_share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '4327592875aff54024ab645-52140168');
content_5aff5402555e01_92462512($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "modal_share.tpl" */?>

<div class="ariane">
	<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a>
	> <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petition.html">Pétitions</a>
	> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['petition']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>

</div>

	<?php if ($_smarty_tpl->tpl_vars['success']->value){?>
		<div class="success">
			Votre signature a bien été prise en compte.
		</div>
	<?php }?>

	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)){?>
		<div class="error">
			<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

		</div>
	<?php }?>

	<div class="proposition">
		<div class="proposition_image">
			<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/350-300/data/upload/<?php echo $_smarty_tpl->tpl_vars['petition']->value->getImage();?>
" title="<?php echo $_smarty_tpl->tpl_vars['petition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['petition']->value->getTitre();?>
" />
			<div style="margin-top:10px; text-align:right;">
				<a href="#" data-toggle="modal" data-target="#shareModal"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/share_email.png" style="margin-left:3px;" /></a>
				<div class="clear" style="height:10px;"></div>
				<span class='st_facebook_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petition/<?php echo $_smarty_tpl->tpl_vars['petition']->value->getId();?>
.html"></span>
				<span class='st_twitter_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petition/<?php echo $_smarty_tpl->tpl_vars['petition']->value->getId();?>
.html"></span>
				<span class='st_googleplus_large' st_url="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
petition/<?php echo $_smarty_tpl->tpl_vars['petition']->value->getId();?>
.html"></span>
			</div>
		</div>
		<div class="proposition_description">
			<h1 style="font-size:26px;"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['petition']->value->getTitre(), ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<div class="proposition_description_date" style="font-size:14px;">
				<i class="glyphicon glyphicon-map-marker"></i> A <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['petition']->value->getUtilisateur()->getVille()->getNom(), ENT_QUOTES, 'UTF-8', true);?>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="glyphicon glyphicon-time"></i> Le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['petition']->value->getDate(),"%d/%m/%y");?>
<br />
				<i class="glyphicon glyphicon-user"></i> Posté par <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['petition']->value->getUtilisateur()->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
<br />
				<br />
				<i class="glyphicon glyphicon-leaf"></i> Il y a actuellement <b><?php echo sizeof($_smarty_tpl->tpl_vars['signatures']->value);?>
</b> signataire<?php if (sizeof($_smarty_tpl->tpl_vars['signatures']->value)>1){?>s<?php }?>
			</div>
			<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />
			<div class="proposition_description_texte"><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['petition']->value->getDescription(), ENT_QUOTES, 'UTF-8', true));?>
</div>
			<div class="proposition_description_liens">
				
			</div>
		</div>
		<div class="clear"></div>

		<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;" id="votes" />
		<?php if (Utilisateur::estConnecte()){?>
			<div class="proposition_add_commentaire">
				<form action="<?php echo $_SERVER['REQUEST_URI'];?>
" method="POST">
					<div class="proposition_add_commentaire_titre">Signer la pétition</div>
					<table>
						<tr style="vertical-align:top;">
							<td>
								<input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $_smarty_tpl->tpl_vars['global_utilisateur']->value->getPseudo();?>
" readonly="readonly" /><br /><br />
								<input type="text" name="pseudo" placeholder="Âge" value="<?php echo $_smarty_tpl->tpl_vars['global_utilisateur']->value->getAge();?>
 ans" readonly="readonly" /><br />
							</td>
							<td style="padding-left:20px;">
								<textarea name="message"></textarea>
							</td>
						</tr>
						<tr><td colspan="2">
							<div style="text-align:right; margin-top:10px;"><?php if (isset($_smarty_tpl->tpl_vars['deja_vote']->value)&&$_smarty_tpl->tpl_vars['deja_vote']->value){?>Vous avez déjà voté<?php }else{ ?><input type="image" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_signer_petition.png" /><?php }?></div>
						</td></tr>
					</table>
				</form>
			</div>
		<?php }else{ ?>
			<?php /*  Call merged included template "error_access.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("error_access.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '4327592875aff54024ab645-52140168');
content_5aff54025bf984_95262873($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "error_access.tpl" */?>
		<?php }?>
		<h3>Les signatures (<?php echo sizeof($_smarty_tpl->tpl_vars['signatures']->value);?>
)</h3>
		<?php  $_smarty_tpl->tpl_vars['signature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['signature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['signatures']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['signature']->key => $_smarty_tpl->tpl_vars['signature']->value){
$_smarty_tpl->tpl_vars['signature']->_loop = true;
?>
			<div class="mur" style="margin:auto; margin-bottom:15px;">
				<div class="top"></div>
				<div class="body">
					<div class="posteur">
						<div class="pseudo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['signature']->value->getUtilisateur()->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</div>
						<div class="heure"><span data-livestamp="<?php echo $_smarty_tpl->tpl_vars['signature']->value->getDate();?>
"><?php echo smarty_modifier_relative_date($_smarty_tpl->tpl_vars['signature']->value->getDate());?>
</span></div>
						<div class="clear"></div>
					</div>
					<div class="message">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['signature']->value->getMessage(), ENT_QUOTES, 'UTF-8', true);?>

					</div>
				</div>
				<div class="foot"></div>
			</div>
		<?php } ?>
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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 00:30:26
         compiled from "/home/livedem/www/templates/modal_share.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5aff5402555e01_92462512')) {function content_5aff5402555e01_92462512($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
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
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2018-05-19 00:30:26
         compiled from "/home/livedem/www/templates/error_access.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5aff54025bf984_95262873')) {function content_5aff54025bf984_95262873($_smarty_tpl) {?><div style="padding:15px; border:1px solid #A3A3A3; margin:10px 0; background:#FAFAFA;">
	<div class="info">Cette fonctionnalité est réservé aux membres inscrits et connectés</div>
	<div style="text-align:center; padding-top:15px;">
		<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-red">Se connecter</a>
	</div>
	<div style="text-align:center; padding-top:20px;">
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
inscription.html">S'inscrire</a> - <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
pass.html">Mot de passe perdu</a>
	</div>
</div><?php }} ?>