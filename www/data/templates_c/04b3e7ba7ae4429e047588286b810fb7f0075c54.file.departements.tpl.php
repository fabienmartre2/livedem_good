<?php /* Smarty version Smarty-3.1.14, created on 2019-06-04 20:26:46
         compiled from "/home/livedem/www/templates/departements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19205880125cf6b7e629aee9-48811070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04b3e7ba7ae4429e047588286b810fb7f0075c54' => 
    array (
      0 => '/home/livedem/www/templates/departements.tpl',
      1 => 1452615091,
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
    'da2461ae4b4abfbfe3171664c1cbf585cb0ee08c' => 
    array (
      0 => '/home/livedem/www/templates/menu_droit.tpl',
      1 => 1452615091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19205880125cf6b7e629aee9-48811070',
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
  'unifunc' => 'content_5cf6b7e64da5a5_84580071',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cf6b7e64da5a5_84580071')) {function content_5cf6b7e64da5a5_84580071($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('search_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '19205880125cf6b7e629aee9-48811070');
content_5cf6b7e638c734_58307875($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "search_bar.tpl" */?>

<div class="home_body">
	<h1>Recherche par département</h1>

	<div style="background:transparent url('<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/cartes/departements.png')no-repeat;padding:0;margin:0;width:556px;height:688px; margin:auto;">
		<div id="mapDepartement" style="background: transparent url('<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/cartes/map_blank2.png')">
			<img border="0" usemap="#Map" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/cartes/map_blank2.png">
		</div>
	</div>
	<map name="Map" id="Map">
			<area shape="poly" coords="283,51,303,44,308,56,314,58,312,62,325,67,327,69,340,78,340,86,345,93,344,103,336,104,327,100,316,99,316,91,305,93,296,86,282,80" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/pas-de-calais.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('pas-de-calais')" title="pas-de-calais">
			<area shape="poly" coords="304,44,321,39,325,47,323,50,336,62,337,59,345,59,349,65,351,74,359,74,365,80,366,86,377,85,386,88,386,108,373,103,346,105,347,97,346,91,342,86,341,77,336,74,328,68,316,63,314,59,307,52" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/nord.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('nord')" title="nord">
			<area shape="poly" coords="276,102,281,93,282,81,303,94,313,93,314,100,335,105,344,105,344,112,342,116,342,123,335,125,327,131,310,127,290,122" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/somme.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('somme')" title="somme">
			<area shape="poly" coords="346,107,360,105,371,104,386,109,389,118,384,128,383,145,368,147,367,168,360,177,344,162,339,149,344,142,344,122" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/aisne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('aisne')" title="aisne">
			<area shape="poly" coords="289,122,287,143,291,152,287,154,289,157,302,157,314,158,329,163,343,162,338,150,342,143,343,125,337,128,331,131" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/oise.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('oise')" title="oise">
			<area shape="poly" coords="388,108,396,109,401,109,411,95,415,116,435,126,432,130,426,131,420,152,385,143,385,127" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/ardennes.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('ardennes')" title="ardennes">
			<area shape="poly" coords="427,132,436,128,440,141,447,140,453,148,453,163,454,180,452,197,442,201,422,192,421,184,416,179,417,171,420,164,420,150" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/meuse.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('meuse')" title="meuse">
			<area shape="poly" coords="441,134,451,131,457,134,459,144,461,148,463,162,468,167,475,168,476,174,479,178,502,185,509,192,502,201,489,196,472,205,465,205,458,196,454,196,454,173,454,164,453,145,445,139,442,141,440,139" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/meurthe-et-moselle.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('meurthe-et-moselle')" title="meurthe-et-moselle">
			<area shape="poly" coords="458,136,463,138,467,138,469,134,475,134,481,136,486,140,487,148,492,153,497,153,497,150,502,150,505,154,518,154,520,151,524,154,529,159,527,164,522,165,518,165,507,160,502,167,505,172,507,176,511,173,516,175,519,178,515,182,516,185,516,189,511,191,504,185,479,177,477,169,470,167,464,163,460,146" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/moselle.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('moselle')" title="moselle">
			<area shape="poly" coords="530,159,552,161,539,185,531,213,513,203,511,195,517,186,518,177,514,173,507,173,505,164,512,164,523,165,528,163" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/bas-rhin.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('bas-rhin')" title="bas-rhin">
			<area shape="poly" coords="514,205,530,214,533,224,531,244,532,247,529,254,517,258,512,250,511,244,502,237,505,231" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haut-rhin.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haut-rhin')" title="haut-rhin">
			<area shape="poly" coords="442,202,455,197,458,198,463,205,472,205,488,197,498,200,501,201,508,193,511,204,512,205,502,236,491,230,486,232,483,230,475,230,470,225,460,230,455,224,452,214,440,205" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/vosges.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('vosges')" title="vosges">
			<area shape="poly" coords="421,189,421,193,439,201,439,205,452,221,459,231,455,239,452,247,441,249,435,255,429,250,421,244,422,240,412,229,414,223,418,220,415,208,406,199" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-marne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-marne')" title="haute-marne">
			<area shape="poly" coords="361,195,370,197,376,197,382,190,391,188,400,196,405,198,411,205,417,218,412,224,408,229,397,234,390,233,377,232,372,223,368,218,366,211,358,207" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/aube.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('aube')" title="aube">
			<area shape="poly" coords="369,149,383,144,396,147,418,152,419,165,415,175,419,182,419,187,406,196,393,188,381,191,371,196,363,193,359,183,362,177,366,171,368,164" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/marne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('marne')" title="marne">
			<area shape="poly" coords="222,135,225,125,244,116,262,111,276,103,288,122,286,142,275,140,267,146,259,151,251,144,233,141" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/seine-maritime.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('seine-maritime')" title="seine-maritime">
			<area shape="poly" coords="230,141,231,151,234,157,233,169,236,173,240,173,243,179,251,187,264,181,272,179,277,173,274,164,281,164,285,155,287,150,285,144,273,144,264,151,260,152,252,146,240,144" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/eure.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('eure')" title="eure">
			<area shape="poly" coords="181,180,187,175,200,175,207,177,209,179,220,171,230,171,236,175,241,176,249,187,251,191,256,195,256,203,248,208,250,219,246,219,236,212,232,208,231,202,227,200,218,205,211,202,210,195,204,194,202,197,194,197,188,198,182,197,186,193,184,186" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/orne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('orne')" title="orne">
			<area shape="poly" coords="172,142,177,141,185,144,201,145,208,149,216,149,228,141,230,151,232,159,232,166,232,170,220,171,216,175,207,176,201,175,188,174,182,179,172,175,173,169,179,166,182,160,177,153,172,150" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/calvados.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('calvados')" title="calvados">
			<area shape="poly" coords="141,119,150,124,154,124,165,122,165,131,170,143,171,151,177,155,179,162,173,169,171,176,179,179,180,185,182,193,173,194,164,193,155,198,153,190,158,189,152,179,153,151,143,133" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/manche.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('manche')" title="manche">
			<area shape="poly" coords="251,187,263,182,271,181,278,174,282,189,292,202,296,203,298,211,298,218,292,224,285,225,277,229,274,231,266,231,260,225,253,222,250,216,250,209,256,205,258,200,253,193" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/eure-et-loir.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('eure-et-loir')" title="eure-et-loir">
			<area shape="poly" coords="285,164,292,167,299,167,303,171,307,172,314,170,322,167,320,162,297,158,291,159,288,157,284,160" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/val-d-oise.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('val-d-oise')" title="val-d-oise">
			<area shape="poly" coords="322,163,327,164,336,164,345,164,356,176,357,182,359,192,359,197,357,204,357,208,341,207,339,218,334,222,330,221,320,222,318,216,316,210,319,206,320,192,324,186,324,171" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/seine-et-marne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('seine-et-marne')" title="seine-et-marne">
			<area shape="poly" coords="307,184,318,186,320,186,318,202,315,208,301,211,297,203,298,192,300,186" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/essonne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('essonne')" title="essonne">
			<area shape="poly" coords="278,165,282,187,290,199,295,200,300,186,305,183,304,173,297,169,285,166" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/yvelines.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('yvelines')" title="yvelines">
			<area shape="poly" coords="342,209,358,209,365,217,368,222,373,229,378,233,395,235,390,255,387,271,381,272,364,260,357,262,339,256,334,246,339,245,341,238,345,234,345,226,337,220" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/yonne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('yonne')" title="yonne">
			<area shape="poly" coords="395,236,410,229,420,241,420,244,424,250,431,252,441,253,444,260,443,265,446,267,442,284,436,293,414,297,394,282,388,273" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/cote-d-or.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('cote-d-or')" title="cote-d-or">
			<area shape="poly" coords="447,272,453,274,461,271,469,268,483,257,497,255,500,239,494,234,489,233,478,232,468,228,460,234,454,245,449,249,443,250,443,256" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-saone.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-saone')" title="haute-saone">
			<area shape="poly" coords="501,240,500,250,504,254,511,256,512,251,509,243,505,240" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/territoire-de-belfort.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('territoire-de-belfort')" title="territoire-de-belfort">
			<area shape="poly" coords="456,274,461,278,460,285,467,291,472,298,477,300,477,306,474,313,487,303,487,291,495,286,510,266,506,263,506,259,501,255,496,257,484,258,469,268" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/doubs.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('doubs')" title="doubs">
			<area shape="poly" coords="445,280,446,273,451,275,458,277,459,284,463,290,470,299,475,301,473,309,474,313,473,322,466,333,457,334,455,332,448,333,441,325,443,323,443,318,443,315,440,303,444,300,437,295,440,288" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/jura.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('jura')" title="jura">
			<area shape="poly" coords="441,324,442,320,442,317,439,306,442,300,435,295,414,298,394,283,386,285,385,299,388,302,388,305,382,306,379,310,373,308,370,309,373,320,380,321,385,327,385,333,381,338,383,343,391,343,397,343,400,336,409,336,417,340,420,332,423,321,427,322,435,322" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/saone-et-loire.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('saone-et-loire')" title="saone-et-loire">
			<area shape="poly" coords="340,258,349,261,358,262,366,262,371,269,381,272,386,272,391,281,386,283,384,287,384,297,386,303,380,306,375,308,373,307,362,311,358,309,349,312,345,307,345,292,340,287,340,276,338,272,337,266,336,262" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/nievre.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('nievre')" title="nievre">
			<area shape="poly" coords="299,213,313,211,318,222,332,221,339,222,343,230,339,237,339,243,335,247,338,256,335,260,319,256,311,255,308,252,297,250,289,252,280,244,280,238,279,231,288,230,296,223" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/loiret.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('loiret')" title="loiret">
			<area shape="poly" coords="251,223,257,226,264,231,268,233,278,229,289,225,294,225,280,231,279,239,284,248,293,252,300,250,305,253,305,258,307,265,303,270,295,275,289,278,279,274,274,279,265,273,260,262,253,254,247,249,241,248,251,233" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/loir-et-cher.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('loir-et-cher')" title="loir-et-cher">
			<area shape="poly" coords="306,257,307,253,311,256,322,258,334,261,336,270,338,276,339,286,343,291,345,304,340,305,336,309,329,310,323,314,322,321,315,322,308,327,305,311,302,303,304,299,301,283,291,284,292,278,305,270,309,264" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/cher.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('cher')" title="cher">
			<area shape="poly" coords="251,308,256,307,258,294,267,291,270,286,270,281,278,276,288,278,291,281,288,284,300,284,303,298,302,301,304,308,307,326,291,326,283,331,276,329,272,331,265,330,262,324,252,317" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/indre.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('indre')" title="indre">
			<area shape="poly" coords="231,256,232,251,241,247,247,252,259,261,264,273,270,277,272,280,269,285,266,291,258,293,255,305,251,307,245,298,244,292,239,292,226,295,226,289,217,282,222,263,223,254" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/indre-et-loire.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('indre-et-loire')" title="indre-et-loire">
			<area shape="poly" coords="17,195,19,183,28,180,50,177,56,181,63,177,65,185,69,188,67,192,68,207,62,212,64,220,72,224,73,228,67,234,53,230,48,227,38,231,19,214" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/finistere.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('finistere')" title="finistere">
			<area shape="poly" coords="65,178,69,179,71,171,90,170,107,193,117,184,126,189,135,193,133,199,133,209,122,209,118,216,113,214,106,220,101,216,70,208,69,194,70,189,66,184" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/cotes-d-armor.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('cotes-d-armor')" title="cotes-d-armor">
			<area shape="poly" coords="128,186,134,187,134,183,141,184,141,188,152,190,154,197,158,197,167,195,172,200,171,209,173,227,167,228,163,241,155,238,144,243,137,244,126,248,127,235,128,229,122,225,122,214,128,210,134,210,135,201,137,193,131,190" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/ille-et-vilaine.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('ille-et-vilaine')" title="ille-et-vilaine">
			<area shape="poly" coords="65,220,63,213,67,211,81,212,97,216,103,219,109,218,114,215,120,218,121,225,124,228,126,235,126,248,126,253,113,258,95,253,102,251,99,249,84,249,79,242,71,238,71,232,74,227,71,222" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/morbihan.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('morbihan')" title="morbihan">
			<area shape="poly" coords="172,198,180,198,186,202,207,196,211,205,208,215,204,220,199,234,194,242,181,243,167,239,166,229,172,229,173,212" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/mayenne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('mayenne')" title="mayenne">
			<area shape="poly" coords="213,206,221,207,226,202,230,206,232,213,249,220,249,231,246,238,238,246,230,252,223,254,213,254,201,246,197,243,200,231" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/sarthe.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('sarthe')" title="sarthe">
			<area shape="poly" coords="166,239,179,243,189,245,194,244,202,249,213,254,221,255,218,271,215,282,209,285,206,282,197,285,188,286,186,291,172,290,166,287,162,278,158,270,173,266,166,257,171,254,166,247" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/maine-et-loire.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('maine-et-loire')" title="maine-et-loire">
			<area shape="poly" coords="125,256,128,249,139,245,149,244,157,240,163,246,167,252,165,255,167,261,168,266,162,268,159,269,161,281,160,286,155,291,152,287,146,290,147,298,138,293,124,279,126,272,130,269,126,269,117,270,109,264,110,260" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/loire-atlantique.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('loire-atlantique')" title="loire-atlantique">
			<area shape="poly" coords="128,289,121,295,127,306,135,318,147,325,154,331,165,331,173,330,179,332,188,328,186,318,181,300,175,291,164,287,157,291,151,288,150,291,149,298,144,296,133,290" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/vendee.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('vendee')" title="vendee">
			<area shape="poly" coords="468,344,484,338,482,328,495,324,504,326,506,335,506,341,517,352,508,358,506,364,501,366,494,353,491,361,481,369,474,364,467,358,465,349" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-savoie.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-savoie')" title="haute-savoie">
			<area shape="poly" coords="425,323,419,340,419,352,417,358,426,363,435,366,443,362,458,374,462,366,467,343,471,336,477,328,468,333,462,335,455,335,451,336,442,329,440,325,435,325" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/ain.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('ain')" title="ain">
			<area shape="poly" coords="402,338,411,338,417,343,418,358,429,366,434,367,430,376,420,379,421,385,416,381,411,378,400,367,397,348" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/rhone.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('rhone')" title="rhone">
			<area shape="poly" coords="458,376,464,365,465,360,471,368,479,369,484,369,491,363,494,357,497,365,501,367,506,365,510,370,515,371,516,381,523,383,520,389,520,395,513,400,504,402,498,406,493,407,489,403,484,402,482,391,481,386,472,382,471,388,467,389,463,383" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/savoie.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('savoie')" title="savoie">
			<area shape="poly" coords="436,367,441,366,443,364,456,376,464,388,469,390,473,384,479,388,483,395,483,402,484,407,485,412,487,415,487,420,477,423,472,427,467,432,455,427,452,410,440,410,437,400,430,393,421,396,419,387,422,380,429,377" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/isere.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('isere')" title="isere">
			<area shape="poly" coords="324,320,327,312,338,308,343,308,349,313,361,312,369,312,372,322,383,324,383,332,377,339,376,340,377,353,374,357,367,354,349,352,338,346,339,339,325,347,319,336,313,332,312,325" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/allier.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('allier')" title="allier">
			<area shape="poly" coords="324,349,339,341,338,346,349,352,366,356,371,357,373,366,377,373,386,385,382,394,372,395,363,390,349,394,342,398,337,392,320,389,319,382,324,377,316,370,320,361,324,355" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/puy-de-dome.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('puy-de-dome')" title="puy-de-dome">
			<area shape="poly" coords="379,339,384,344,391,344,397,344,398,351,400,361,401,369,406,377,414,383,419,389,410,399,398,392,383,394,386,388,379,377,374,365,375,357,378,350" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/loire.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('loire')" title="loire">
			<area shape="poly" coords="320,391,316,395,307,403,306,413,303,420,304,433,306,439,316,439,320,434,324,425,330,422,336,429,341,436,346,425,353,422,356,417,350,398,342,399,337,393,329,393" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/cantal.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('cantal')" title="cantal">
			<area shape="poly" coords="347,397,362,392,368,395,379,395,391,394,399,394,405,400,407,402,400,414,395,424,389,426,383,432,373,425,366,427,359,420" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-loire.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-loire')" title="haute-loire">
			<area shape="poly" coords="410,400,418,393,422,403,425,420,422,429,421,440,412,457,407,458,404,456,400,459,395,456,391,455,386,443,382,434,392,427,398,420,404,410" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/ardeche.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('ardeche')" title="ardeche">
			<area shape="poly" coords="414,456,423,456,430,452,434,454,435,459,441,459,445,465,457,469,461,462,455,455,450,451,452,446,456,444,460,434,468,434,455,428,450,415,445,410,438,411,435,400,429,396,423,397,424,410,425,419,424,432,420,444" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/drome.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('drome')" title="drome">
			<area shape="poly" coords="453,447,460,441,461,439,467,435,473,429,480,424,487,422,489,415,485,405,496,408,501,406,510,416,519,420,521,428,511,437,504,443,496,444,490,442,486,449,482,444,472,453,469,459,466,463,463,457,454,454" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/hautes-alpes.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('hautes-alpes')" title="hautes-alpes">
			<area shape="poly" coords="518,433,515,445,516,450,512,456,508,464,513,473,518,478,508,484,498,488,491,488,481,491,477,493,468,490,462,484,459,474,464,464,472,459,482,448,486,451,489,445" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/alpes-de-haute-provence.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('alpes-de-haute-provence')" title="alpes-de-haute-provence">
			<area shape="poly" coords="516,451,526,460,540,464,549,462,553,465,551,472,545,479,547,486,522,502,516,495,509,485,519,478,516,474,510,466,510,458" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/alpes-maritimes.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('alpes-maritimes')" title="alpes-maritimes">
			<area shape="poly" coords="469,492,465,500,468,508,468,513,466,514,466,520,466,526,469,531,477,531,485,531,502,526,509,525,508,515,517,507,516,499,510,488,497,488,486,492" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/var.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('var')" title="var">
			<area shape="poly" coords="415,457,424,457,426,463,436,461,443,466,454,471,457,480,464,492,463,496,451,496,440,493,425,484,424,478,420,474" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/vaucluse.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('vaucluse')" title="vaucluse">
			<area shape="poly" coords="421,481,417,487,417,493,410,498,408,505,401,511,413,514,428,518,430,515,449,519,456,527,464,525,465,514,467,509,462,498,451,498,444,496,432,492,427,487" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/bouches-du-rhone.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('bouches-du-rhone')" title="bouches-du-rhone">
			<area shape="poly" coords="388,451,391,457,395,460,404,459,415,459,418,472,422,479,417,484,413,494,408,499,400,509,396,507,398,500,388,486,379,482,370,486,364,485,363,477,358,472,366,472,377,471,383,471,385,462,384,454" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/gard.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('gard')" title="gard">
			<area shape="poly" coords="358,421,362,429,370,427,375,430,381,436,381,442,385,450,383,455,383,467,375,468,364,471,359,468,351,464,349,454,343,441,346,429" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/lozere.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('lozere')" title="lozere">
			<area shape="poly" coords="329,502,336,501,343,498,346,494,347,490,358,485,369,488,378,485,385,488,394,495,394,504,384,508,374,517,359,524,353,527,345,521,340,520,331,525,322,519,329,511" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/herault.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('herault')" title="herault">
			<area shape="poly" coords="331,423,340,436,346,453,349,465,356,472,360,479,352,487,343,490,343,496,334,494,329,494,322,478,312,472,301,468,292,459,294,455,294,447,306,441,315,442,322,438,325,428" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/aveyron.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('aveyron')" title="aveyron">
			<area shape="poly" coords="282,415,287,421,294,419,301,421,302,432,304,438,314,440,312,441,305,442,295,446,289,451,292,458,278,460,268,465,257,455,255,446,271,430,272,418" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/lot.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('lot')" title="lot">
			<area shape="poly" coords="249,456,257,455,264,464,277,464,290,459,295,469,283,473,283,478,277,485,270,488,266,491,257,491,249,491,245,482,243,478,245,470,251,463" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/tarn-et-garonne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('tarn-et-garonne')" title="tarn-et-garonne">
			<area shape="poly" coords="291,471,301,468,311,472,323,480,327,495,339,495,340,498,328,500,326,506,326,513,318,516,311,513,305,517,299,514,296,509,283,502,276,487,283,479,283,475" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/tarn.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('tarn')" title="tarn">
			<area shape="poly" coords="314,516,320,517,331,526,341,522,351,528,344,539,345,547,337,547,330,552,312,551,311,561,303,560,296,557,292,552,298,548,294,536,288,531,284,526,289,515,299,519,310,516" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/aude.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('aude')" title="aude">
			<area shape="poly" coords="325,552,332,552,340,548,346,554,346,568,350,574,340,573,329,579,316,579,310,576,296,581,285,571,297,565,308,564,312,558,314,553" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/pyrenees-orientales.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('pyrenees-orientales')" title="pyrenees-orientales">
			<area shape="poly" coords="244,551,244,545,251,541,255,532,264,535,265,530,268,522,272,528,279,526,286,530,290,535,294,538,294,548,292,551,292,556,295,558,305,561,297,563,291,568,284,564,271,564,266,559,260,560,249,554" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/ariege.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('ariege')" title="ariege">
			<area shape="poly" coords="250,493,256,491,262,493,269,492,275,488,279,498,282,505,294,508,297,514,292,515,283,525,273,524,269,521,264,526,263,532,254,532,251,540,243,546,240,550,236,551,235,558,228,558,227,551,233,546,231,538,229,530,236,523,242,518,250,516,253,512,256,507,259,505,254,498" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-garonne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-garonne')" title="haute-garonne">
			<area shape="poly" coords="204,502,209,503,215,517,224,518,235,522,229,527,226,532,230,538,229,548,225,557,218,557,208,555,202,556,194,548,195,538,202,532,207,522,206,512,203,508" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/hautes-pyrenees.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('hautes-pyrenees')" title="hautes-pyrenees">
			<area shape="poly" coords="210,482,214,480,225,478,234,476,241,479,245,485,253,498,256,503,248,513,240,518,230,518,221,517,216,512,211,505,205,501,198,502,197,496,200,483,205,481" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/gers.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('gers')" title="gers">
			<area shape="poly" coords="125,515,135,510,138,506,144,507,155,505,170,506,184,503,190,504,199,504,205,514,205,523,199,532,194,537,191,547,186,551,180,550,175,546,174,542,165,542,154,537,148,533,143,533,140,532,143,525,139,520,130,520" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/pyrenees-atlantiques.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('pyrenees-atlantique')" title="pyrenees-atlantique">
			<area shape="poly" coords="154,446,164,444,167,450,180,450,189,459,192,466,200,461,203,469,212,472,212,478,204,480,201,482,198,491,195,501,181,502,167,502,150,504,140,503" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/landes.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('landes')" title="landes">
			<area shape="poly" coords="223,432,224,437,235,435,241,437,246,441,256,439,253,447,254,452,249,455,249,460,249,464,245,468,241,473,237,474,226,476,213,479,213,473,206,467,204,463,207,454,206,446,211,445,215,434" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/lot-et-garonne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('lot-et-garonne')" title="lot-et-garonne">
			<area shape="poly" coords="162,382,177,398,181,394,187,397,193,405,202,410,209,409,211,414,209,424,217,425,220,428,217,432,212,435,210,443,206,447,205,457,203,463,201,459,196,462,193,463,189,457,183,450,176,448,167,448,165,443,153,446,156,438,162,436,161,429,154,429" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/gironde.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('gironde')" title="gironde">
			<area shape="poly" coords="208,407,209,403,216,403,222,398,225,387,231,384,234,378,241,375,246,379,260,382,260,390,266,392,266,400,265,409,271,410,272,417,269,430,259,440,256,438,246,438,241,435,234,434,229,434,226,432,222,426,216,424,212,423,212,413" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/dordogne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('dordogne')" title="dordogne">
			<area shape="poly" coords="265,389,276,383,284,378,294,371,307,373,320,375,320,380,319,386,318,393,310,399,304,413,301,417,292,418,283,415,277,414,272,411,267,407" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/correze.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('correze')" title="correze">
			<area shape="poly" coords="273,331,276,330,282,332,286,331,292,329,304,329,312,330,321,340,324,351,321,359,317,364,316,369,314,373,298,370,291,366,282,364,278,354,271,341" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/creuse.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('creuse')" title="creuse">
			<area shape="poly" coords="247,340,265,331,271,333,271,341,279,357,282,363,294,368,280,379,265,389,259,381,246,377,241,373,242,365,252,358,248,352" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-vienne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-vienne')" title="haute-vienne">
			<area shape="poly" coords="206,364,207,357,208,350,216,348,222,350,229,349,243,346,247,353,249,358,245,361,242,368,238,375,231,380,224,387,221,394,213,403,209,402,198,396,199,388,195,379,190,374,192,368,200,368" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/charente.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('charente')" title="charente">
			<area shape="poly" coords="208,407,206,402,198,398,197,392,196,385,190,374,191,366,199,366,205,363,206,353,194,349,183,342,177,334,169,332,162,337,158,341,162,347,162,360,158,368,172,380,178,391,187,397,194,405,199,408" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/charente-maritime.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('charente-maritime')" title="charente-maritime">
			<area shape="poly" coords="209,288,215,283,219,284,223,291,226,296,235,296,240,294,245,302,249,309,253,319,259,323,262,329,257,334,250,338,246,340,245,345,242,344,230,347,224,347,220,343,220,334,215,333,212,326,216,315,213,299" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/vienne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('vienne')" title="vienne">
			<area shape="poly" coords="177,292,185,292,189,290,194,287,204,287,209,292,212,301,214,315,210,323,215,333,218,335,219,342,223,347,214,348,208,348,203,349,191,343,184,340,180,334,188,330,188,324,186,309,184,300" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/deux-sevres.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('deux-sevres')" title="deux-sevres">
			<area shape="poly" coords="533,553,534,532,538,534,547,588,540,599,530,599,502,577,502,569,522,553" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/haute-corse.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('haute-corse')" title="haute-corse">
			<area shape="poly" coords="502,580,528,599,539,601,536,633,520,628,517,616,510,612,511,603" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/corse-du-sud.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('corse-du-sud')" title="corse-du-sud">
			<area shape="poly" coords="23,644,25,634,34,629,38,642,50,644,52,654,48,662,53,671,48,685,25,671,31,663,28,650" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/mayotte.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('mayotte')" title="mayotte">
			<area shape="poly" coords="31,564,50,566,52,573,61,584,57,595,43,598,29,594,20,578,22,568" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/la-reunion.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('la-reunion')" title="la-reunion">
			<area shape="poly" coords="31,481,40,485,44,485,62,495,64,503,55,514,44,532,38,530,22,530,30,511,23,500,21,489" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/guyane.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('guyane')" title="guyane">
			<area shape="poly" coords="17,411,30,415,41,430,46,443,43,448,23,442,16,422" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/martinique.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('martinique')" title="martinique">
			<area shape="poly" coords="27,356,33,348,45,353,47,338,62,340,74,352,91,347,83,357,71,362,75,386,62,381,66,365,66,357,51,364,48,372,44,381,31,374" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/guadeloupe.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('guadeloupe')" title="guadeloupe">
			<area shape="poly" coords="43,8,42,21,27,30,28,36,42,48,41,64,21,53,14,41,22,21" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/hauts-de-seine.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('hauts-de-seine')" title="hauts-de-seine">
			<area shape="poly" coords="44,8,65,10,76,1,85,15,83,45,75,36,63,35,55,24,43,21" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/seine-saint-denis.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('seine-saint-denis')" title="seine-saint-denis">
			<area shape="poly" coords="42,48,61,44,63,36,74,38,83,47,84,55,73,67,43,64" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/val-de-marne.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('val-de-marne')" title="val-de-marne">
			<area shape="poly" coords="42,47,29,37,29,30,38,24,53,24,60,33,63,39,59,43" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
localite/departement/paris.html" onmouseout="javascript:hideAlt2()" onmouseover="javascript:showAlt2('paris')" title="paris">
	</map>
</div>

<div class="home_menu">
	<?php /*  Call merged included template "menu_droit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("menu_droit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '19205880125cf6b7e629aee9-48811070');
content_5cf6b7e647e3f6_27426746($_smarty_tpl);
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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-06-04 20:26:46
         compiled from "/home/livedem/www/templates/search_bar.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5cf6b7e638c734_58307875')) {function content_5cf6b7e638c734_58307875($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/livedem/www/lib/Smarty/plugins/function.html_options.php';
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
</div><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-06-04 20:26:46
         compiled from "/home/livedem/www/templates/menu_droit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5cf6b7e647e3f6_27426746')) {function content_5cf6b7e647e3f6_27426746($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['home_question']->value)&&$_smarty_tpl->tpl_vars['home_question']->value){?>
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