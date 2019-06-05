<?php /* Smarty version Smarty-3.1.14, created on 2019-05-19 20:26:28
         compiled from "/home/livedem/www/templates/mon-compte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14182100805ce19fd4135e85-07657176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2e6eb0e02bca492e6b1f4e693f1055c703f1be2' => 
    array (
      0 => '/home/livedem/www/templates/mon-compte.tpl',
      1 => 1450454207,
      2 => 'file',
    ),
    '111fe13ef0e640cf72f4ad7b205effe1c019168d' => 
    array (
      0 => '/home/livedem/www/templates/base.tpl',
      1 => 1451900657,
      2 => 'file',
    ),
    '6eade14c28d88985cce6f64f3582e6dd0a2e9872' => 
    array (
      0 => '/home/livedem/www/templates/propositions_view.tpl',
      1 => 1450454207,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14182100805ce19fd4135e85-07657176',
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
  'unifunc' => 'content_5ce19fd4394110_00016589',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ce19fd4394110_00016589')) {function content_5ce19fd4394110_00016589($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_date')) include '/home/livedem/www/lib/Smarty/plugins/function.html_select_date.php';
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
		<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8', true);?>
" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group <?php if (in_array('pseudo',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
					<div class="col-sm-8">
						<p class="help-block"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPseudo(), ENT_QUOTES, 'UTF-8', true);?>
</p>
					</div>
				</div>
				<div class="form-group <?php if (in_array('nom',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="nom" class="col-sm-4 control-label">Nom * : </label>
					<div class="col-sm-8">
						<input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if (isset($_POST['nom'])){?><?php echo $_POST['nom'];?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getNom(), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('prenom',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="prenom" class="col-sm-4 control-label">Prénom * : </label>
					<div class="col-sm-8">
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if (isset($_POST['prenom'])){?><?php echo $_POST['prenom'];?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getPrenom(), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('email',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="email" class="col-sm-4 control-label">E-mail * : </label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }else{ ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['utilisateur']->value->getEmail(), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('password',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="password" class="col-sm-4 control-label">Mot de passe : </label>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" value="" class="form-control"/>
						<p class="help-block">Laissez vide pour ne pas modifier</p>
					</div>
				</div>
				<div class="form-group <?php if (in_array('passwordc',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="passwordc" class="col-sm-4 control-label">Confirmer le mot de passe : </label>
					<div class="col-sm-8">
						<input type="password" name="passwordc" id="passwordc" value="" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('datenaissance',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="datenaissance" class="col-sm-4 control-label">Date de naissance : </label>
					<div class="col-sm-8">
						<?php if (isset($_POST['dateNaissance'])&&!empty($_POST['dateNaissance'])&&!empty($_POST['dateNaissance']['Day'])&&!empty($_POST['dateNaissance']['Month'])&&!empty($_POST['dateNaissance']['Year'])){?>
								<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'all_empty'=>'--','time'=>$_POST['dateNaissance'],'start_year'=>'-100','field_array'=>'dateNaissance','field_order'=>'DMY','month_format'=>'%m','prefix'=>'','style'=>'border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'),$_smarty_tpl);?>

							<?php }else{ ?>
								<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'time'=>strtotime($_smarty_tpl->tpl_vars['utilisateur']->value->getDatenaissance()),'all_empty'=>'--','start_year'=>'-100','field_array'=>'dateNaissance','field_order'=>'DMY','month_format'=>'%m','prefix'=>'','style'=>'border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'),$_smarty_tpl);?>

							<?php }?>
					</div>
				</div>
				<div class="form-group <?php if (in_array('telFixe',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="telFixe" class="col-sm-4 control-label">Téléphone fixe : </label>
					<div class="col-sm-8">
						<input type="text" name="telFixe" id="telFixe" placeholder="Téléphone fixe" value="<?php if (isset($_POST['telFixe'])){?><?php echo $_POST['telFixe'];?>
<?php echo htmlspecialchars(stripslashes($_POST['telFixe']), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('telPort',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="telPort" class="col-sm-4 control-label">Téléphone portable : </label>
					<div class="col-sm-8">
						<input type="text" name="telPort" id="telPort" placeholder="Téléphone portable" value="<?php if (isset($_POST['telPort'])){?><?php echo $_POST['telPort'];?>
<?php echo htmlspecialchars(stripslashes($_POST['telPort']), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="form-control"/>
					</div>
				</div>
		
			<div class="clear" style="height:20px;"></div>
			<div style="text-align:center;">
				<button type="submit" name="send" class="btn btn-red">Mettre à jour</button>
			</div>
		</form>
	</div>
	<div class="clear" style="height:30px;"></div>
	
	<div class="titre_moncompte">Les propositions que j'ai émises</div>
	<div class="data_moncompte">
		<?php  $_smarty_tpl->tpl_vars['proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prop_cree']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proposition']->key => $_smarty_tpl->tpl_vars['proposition']->value){
$_smarty_tpl->tpl_vars['proposition']->_loop = true;
?>
			<?php /*  Call merged included template "propositions_view.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('propositions_view.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['proposition']->value), 0, '14182100805ce19fd4135e85-07657176');
content_5ce19fd42cce30_13647934($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "propositions_view.tpl" */?>
		<?php }
if (!$_smarty_tpl->tpl_vars['proposition']->_loop) {
?>
			<b>Vous n'avez pas créé de propositions</b>
		<?php } ?>
	</div>

	<div class="titre_moncompte">Les propositions que j'ai soutenues</div>
	<div class="data_moncompte">
		<?php  $_smarty_tpl->tpl_vars['proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prop2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proposition']->key => $_smarty_tpl->tpl_vars['proposition']->value){
$_smarty_tpl->tpl_vars['proposition']->_loop = true;
?>
			<?php /*  Call merged included template "propositions_view.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('propositions_view.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['proposition']->value), 0, '14182100805ce19fd4135e85-07657176');
content_5ce19fd42cce30_13647934($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "propositions_view.tpl" */?>
		<?php }
if (!$_smarty_tpl->tpl_vars['proposition']->_loop) {
?>
			<b>Vous n'avez pas soutenu de propositions</b>
		<?php } ?>
	</div>

	<div class="titre_moncompte">Les débats auxquels j'ai participé</div>
	<div class="data_moncompte">
		<?php  $_smarty_tpl->tpl_vars['proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prop3']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proposition']->key => $_smarty_tpl->tpl_vars['proposition']->value){
$_smarty_tpl->tpl_vars['proposition']->_loop = true;
?>
			<?php /*  Call merged included template "propositions_view.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('propositions_view.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['proposition']->value), 0, '14182100805ce19fd4135e85-07657176');
content_5ce19fd42cce30_13647934($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "propositions_view.tpl" */?>
		<?php }
if (!$_smarty_tpl->tpl_vars['proposition']->_loop) {
?>
			<b>Vous n'avez pas participé à des débats</b>
		<?php } ?>
	</div>

	<div class="titre_moncompte">Les votes auxquels j'ai participé</div>
	<div class="data_moncompte">
		<?php  $_smarty_tpl->tpl_vars['proposition'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['proposition']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prop4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['proposition']->key => $_smarty_tpl->tpl_vars['proposition']->value){
$_smarty_tpl->tpl_vars['proposition']->_loop = true;
?>
			<?php /*  Call merged included template "propositions_view.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('propositions_view.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('proposition'=>$_smarty_tpl->tpl_vars['proposition']->value), 0, '14182100805ce19fd4135e85-07657176');
content_5ce19fd42cce30_13647934($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "propositions_view.tpl" */?>
		<?php }
if (!$_smarty_tpl->tpl_vars['proposition']->_loop) {
?>
			<b>Vous n'avez pas voté de propositions</b>
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
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2019-05-19 20:26:28
         compiled from "/home/livedem/www/templates/propositions_view.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5ce19fd42cce30_13647934')) {function content_5ce19fd42cce30_13647934($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/livedem/www/lib/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/livedem/www/lib/Smarty/plugins/modifier.truncate.php';
?><div class="liste_proposition">
	<div class="liste_proposition_image">
		<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html<?php if (isset($_smarty_tpl->tpl_vars['statut']->value)&&$_smarty_tpl->tpl_vars['statut']->value!=$_smarty_tpl->tpl_vars['proposition']->value->getStatut()){?>?statut=<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['proposition']->value->getImage()){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/200-150/data/upload/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getImage();?>
" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getCategorie()->getImage()){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/200-150/data/categorie/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getCategorie()->getImage();?>
" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
get_fixed/200-150/images/no_photo.png" title="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" alt="<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
" />
			<?php }?>
		</a>
	</div>
	<div class="liste_proposition_description">
		<h3><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getTitre();?>
</h3>
		<div class="liste_proposition_description_date"><?php echo $_smarty_tpl->tpl_vars['proposition']->value->getUtilisateur()->getVille()->getNom();?>
, le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['proposition']->value->getDate(),"%d/%m/%y");?>
 par <?php echo $_smarty_tpl->tpl_vars['proposition']->value->getUtilisateur()->getPseudo();?>
</div>
		<div class="liste_proposition_description_texte"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['proposition']->value->getDescription(),150);?>
<br /><b>Statut : <?php echo $_smarty_tpl->tpl_vars['proposition']->value->getStatutTexte();?>
</b></div>
		<div class="liste_proposition_description_lien">
			<?php if ((isset($_smarty_tpl->tpl_vars['statut']->value)&&$_smarty_tpl->tpl_vars['statut']->value==2&&$_smarty_tpl->tpl_vars['statut']->value!=$_smarty_tpl->tpl_vars['proposition']->value->getStatut())){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html?statut=<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_proposition.png" /></a>
			<?php }elseif((isset($_smarty_tpl->tpl_vars['statut']->value)&&$_smarty_tpl->tpl_vars['statut']->value==3&&$_smarty_tpl->tpl_vars['statut']->value!=$_smarty_tpl->tpl_vars['proposition']->value->getStatut())){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html?statut=<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_debat.png" /></a>
			<?php }elseif((isset($_smarty_tpl->tpl_vars['statut']->value)&&$_smarty_tpl->tpl_vars['statut']->value==4&&$_smarty_tpl->tpl_vars['statut']->value!=$_smarty_tpl->tpl_vars['proposition']->value->getStatut())){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html?statut=<?php echo $_smarty_tpl->tpl_vars['statut']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_vote.png" /></a>
			<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==2){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_proposition.png" /></a>
			<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==3){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_debat.png" /></a>
			<?php }elseif($_smarty_tpl->tpl_vars['proposition']->value->getStatut()==4){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_vote.png" /></a>
			<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
proposition/<?php echo $_smarty_tpl->tpl_vars['proposition']->value->getId();?>
.html"><img src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
images/btn_voir_proposition.png" /></a>
			<?php }?>
			
		</div>
	</div>
	<div class="clear"></div>
</div>
<hr style="border:0; height:1px; background:#e7e7e7; margin:25px 0;"/><?php }} ?>