<?php /* Smarty version Smarty-3.1.14, created on 2019-01-11 00:32:35
         compiled from "/home/livedem/www/templates/proposition_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14559485485c37d61388a290-08506163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9869365dec930b1e9bdb74c35f0cdaace9d00bb1' => 
    array (
      0 => '/home/livedem/www/templates/proposition_add.tpl',
      1 => 1452615091,
      2 => 'file',
    ),
    '111fe13ef0e640cf72f4ad7b205effe1c019168d' => 
    array (
      0 => '/home/livedem/www/templates/base.tpl',
      1 => 1451900657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14559485485c37d61388a290-08506163',
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
  'unifunc' => 'content_5c37d613a9f658_78045856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37d613a9f658_78045856')) {function content_5c37d613a9f658_78045856($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/livedem/www/lib/Smarty/plugins/function.html_options.php';
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
			

<script type="text/javascript">
$(document).ready(function() {
	$("#photo").fileinput({'showUpload':false, 'browseLabel':'Parcourir', 'removeLabel':'Supprimer'});
    $('#inscriptionform').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            titre: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir un titre'
                    },

                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir une description'
                    },

                }
            },
            categorieId: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez choisir une catégorie'
                    },

                }
            },
            niveauId: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez choisir un niveau électoral'
                    },

                }
            }
        }
    });
});
</script>
<script type="text/javascript">
	function typeNiveau(){
		if($("select[name='niveauId']").val() == 1){
			$('#choixVille').css('display', 'block');
			$('#choixDepartement').css('display', 'none');
			$('#choixRegion').css('display', 'none');
		}
		else if($("select[name='niveauId']").val() == 2){
			$('#choixVille').css('display', 'none');
			$('#choixDepartement').css('display', 'block');
			$('#choixRegion').css('display', 'none');
		}
		else if($("select[name='niveauId']").val() == 3){
			$('#choixVille').css('display', 'none');
			$('#choixDepartement').css('display', 'none');
			$('#choixRegion').css('display', 'block');
		}
		else {
			$('#choixVille').css('display', 'none');
			$('#choixDepartement').css('display', 'none');
			$('#choixRegion').css('display', 'none');
		}
	}

	$(document).ready( function () {
		typeNiveau();

		$("select[name=niveauId]").change(function(ev){
			typeNiveau();
		});
		$('.selectpicker').selectpicker({
		  size: 6
		});
	});
</script>



<ol class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html">Propositions</a></li>
	<li class="active">Soumettre une proposition</li>
</ol>

	<h1 class="titre">Soumettre une proposition</h1>
	<?php if (isset($_smarty_tpl->tpl_vars['success']->value)&&$_smarty_tpl->tpl_vars['success']->value){?>
		<div class="alert alert-success">
			Votre proposition a bien été prise en compte.<br />
			Elle sera visible une fois approuvée par 2 citoyens référents.
		</div>
	<?php }else{ ?>
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)&&!empty($_smarty_tpl->tpl_vars['error']->value)){?>
			<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
		<?php }?>
		<div class="clear" style="height:20px;"></div>
		<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8', true);?>
" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="panel panel-default" id="panel2">
					<div class="panel-heading">
						<h4 class="panel-title">
							Description de votre proposition
						</h4>
					</div>
					<div id="panel_description">
						<div class="panel-body">
							<div class="form-group <?php if (in_array('titre',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="titre" class="col-sm-4 control-label">Titre * : </label>
								<div class="col-sm-8">
									<input type="text" name="titre" id="titre" placeholder="Titre" value="<?php if (isset($_POST['titre'])){?><?php echo $_POST['titre'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('description',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="description" class="col-sm-4 control-label">Description * : </label>
								<div class="col-sm-8">
									<textarea type="text" name="description" id="description" placeholder="Description" class="form-control" rows="10"><?php if (isset($_POST['description'])){?><?php echo $_POST['description'];?>
<?php }?></textarea>
								</div>
							</div>
							<div class="form-group <?php if (in_array('categorieId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="categorieId" class="col-sm-4 control-label">Catégorie * : </label>
								<div class="col-sm-8">
									<select name="categorieId" id="categorieId" class="selectpicker show-tick form-control">
										<?php if (isset($_POST['categorieId'])){?>
											<?php echo smarty_function_html_options(array('options'=>Categorie::selectArray(),'selected'=>$_POST['categorieId']),$_smarty_tpl);?>

										<?php }else{ ?>
											<?php echo smarty_function_html_options(array('options'=>Categorie::selectArray()),$_smarty_tpl);?>

										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group <?php if (in_array('niveauId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="niveauId" class="col-sm-4 control-label">Niveau Electoral * : </label>
								<div class="col-sm-8 selectContainer">
									<select name="niveauId" id="niveauId" class="selectpicker show-tick form-control">
										<option value="">Choisissez ...</option>
										<?php if (isset($_POST['niveauId'])){?>
											<?php echo smarty_function_html_options(array('options'=>Niveau::selectArray(),'selected'=>$_POST['niveauId']),$_smarty_tpl);?>

										<?php }else{ ?>
											<?php echo smarty_function_html_options(array('options'=>Niveau::selectArray()),$_smarty_tpl);?>

										<?php }?>
									</select>
								</div>
							</div>
							<div id="choixVille">
								<div class="form-group <?php if (in_array('ville_codepostal',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
									<label for="codepostal" class="col-sm-4 control-label">Code postal * : </label>
									<div class="col-sm-8">
										<input type="text" name="ville_codepostal" id="codepostal" placeholder="Code Postal" value="<?php if (isset($_POST['ville_codepostal'])){?><?php echo $_POST['ville_codepostal'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['utilisateur']->value->getVille()->getCodePostal();?>
<?php }?>"  class="form-control"/>
									</div>
								</div>
								<div class="form-group <?php if (in_array('villeId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
									<label for="villeId" class="col-sm-4 control-label">Ville * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="villeId" id="villeId">
											<option value="">Choisissez ...</option>
											<?php  $_smarty_tpl->tpl_vars['ville'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ville']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['villes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ville']->key => $_smarty_tpl->tpl_vars['ville']->value){
$_smarty_tpl->tpl_vars['ville']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['ville']->value->getId();?>
" <?php if ((isset($_POST['villeId'])&&$_POST['villeId']==$_smarty_tpl->tpl_vars['ville']->value->getId())||($_smarty_tpl->tpl_vars['utilisateur']->value->getVilleId()==$_smarty_tpl->tpl_vars['ville']->value->getId())){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['ville']->value->getNom();?>
</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div id="choixDepartement">
								<div class="form-group <?php if (in_array('departementId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
									<label for="departementId" class="col-sm-4 control-label">Département * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="departementId" id="departementId">
											<option value="">Choisissez ...</option>
											<?php  $_smarty_tpl->tpl_vars['departement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['departement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['departements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['departement']->key => $_smarty_tpl->tpl_vars['departement']->value){
$_smarty_tpl->tpl_vars['departement']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['departement']->value->getId();?>
" <?php if ((isset($_POST['departementId'])&&$_POST['departementId']==$_smarty_tpl->tpl_vars['departement']->value->getId())||($_smarty_tpl->tpl_vars['utilisateur']->value->getDepartement()->getId()==$_smarty_tpl->tpl_vars['departement']->value->getId())){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['departement']->value->getNom();?>
</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div id="choixRegion">
								<div class="form-group <?php if (in_array('regionId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
									<label for="regionId" class="col-sm-4 control-label">Région * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="regionId" id="regionId">
											<option value="">Choisissez ...</option>
											<?php  $_smarty_tpl->tpl_vars['region'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['region']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['regions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['region']->key => $_smarty_tpl->tpl_vars['region']->value){
$_smarty_tpl->tpl_vars['region']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['region']->value->getId();?>
" <?php if ((isset($_POST['regionId'])&&$_POST['regionId']==$_smarty_tpl->tpl_vars['region']->value->getId())||($_smarty_tpl->tpl_vars['utilisateur']->value->getRegion()->getId()==$_smarty_tpl->tpl_vars['region']->value->getId())){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['region']->value->getNom();?>
</option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group <?php if (in_array('dureeVote',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="dureeVote" class="col-sm-4 control-label">Illustration : </label>
								<div class="col-sm-8">
									<input type="file" name="vignette" id="photo" />
									<p class="help-block">Format conseillé : 350px x 300px - Max : 3Mo</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default" id="panel2">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-target="#panel_details" href="#panel_details" class="collapsed">
								Options avancées
							</a>
						</h4>
					</div>
					<div id="panel_details" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="form-group <?php if (in_array('cout',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="cout" class="col-sm-4 control-label">Coût : </label>
								<div class="col-sm-8">
									<input type="text" name="cout" id="cout" placeholder="Coût de votre proposition" value="<?php if (isset($_POST['cout'])){?><?php echo $_POST['cout'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('zone',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="zone" class="col-sm-4 control-label">Zone géographique impactée : </label>
								<div class="col-sm-8">
									<input type="text" name="zone" id="zone" placeholder="Zone géographique impactée" value="<?php if (isset($_POST['zone'])){?><?php echo $_POST['zone'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('financement',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="financement" class="col-sm-4 control-label">Source de financement : </label>
								<div class="col-sm-8">
									<input type="text" name="financement" id="financement" placeholder="Source de financement" value="<?php if (isset($_POST['financement'])){?><?php echo $_POST['financement'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('impact',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="impact" class="col-sm-4 control-label">Population impactée : </label>
								<div class="col-sm-8">
									<input type="text" name="impact" id="impact" placeholder="Population impactée" value="<?php if (isset($_POST['impact'])){?><?php echo $_POST['impact'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('delai',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="delai" class="col-sm-4 control-label">Délai de mise en place : </label>
								<div class="col-sm-8">
									<input type="text" name="delai" id="delai" placeholder="Délai de mise en place" value="<?php if (isset($_POST['delai'])){?><?php echo $_POST['delai'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('periode',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="periode" class="col-sm-4 control-label">Période d'application : </label>
								<div class="col-sm-8">
									<input type="text" name="periode" id="periode" placeholder="Période d'application" value="<?php if (isset($_POST['periode'])){?><?php echo $_POST['periode'];?>
<?php }?>" class="form-control"/>
								</div>
							</div>
							<div class="form-group <?php if (in_array('periode',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="periode" class="col-sm-4 control-label">Durée de soutien : </label>
								<div class="col-sm-8">
									<select name="dureeSoutien" class="selectpicker show-tick form-control">
										<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = -1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (Config::get('duree_soutien')) : Config::get('duree_soutien')-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = Config::get('duree_soutien'), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
											<option value="$i" <?php if (isset($_GET['dureeSoutien'])&&$_GET['dureeSoutien']==$_smarty_tpl->tpl_vars['i']->value){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 semaines</option>
										<?php }} ?>
									</select>
								</div>
							</div>
							<div class="form-group <?php if (in_array('dureeSoutien',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="dureeSoutien" class="col-sm-4 control-label">Durée des débats : </label>
								<div class="col-sm-8">
									<select name="dureeSoutien" class="selectpicker show-tick form-control">
										<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = -1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (Config::get('duree_debat')) : Config::get('duree_debat')-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = Config::get('duree_debat'), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
											<option value="$i" <?php if (isset($_GET['dureeSoutien'])&&$_GET['dureeSoutien']==$_smarty_tpl->tpl_vars['i']->value){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 semaines</option>
										<?php }} ?>
									</select>
								</div>
							</div>
							<div class="form-group <?php if (in_array('dureeVote',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
								<label for="dureeVote" class="col-sm-4 control-label">Durée du votes : </label>
								<div class="col-sm-8">
									<select name="dureeVote" class="selectpicker show-tick form-control">
										<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = -1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (Config::get('duree_vote')) : Config::get('duree_vote')-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = Config::get('duree_vote'), $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
											<option value="$i" <?php if (isset($_GET['dureeVote'])&&$_GET['dureeVote']==$_smarty_tpl->tpl_vars['i']->value){?>SELECTED<?php }?>><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 semaines</option>
										<?php }} ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear" style="height:20px;"></div>
				<div style="text-align:center;">
					<label style="font-size:14px;"><input type="checkbox" name="verif" value="1" /> J'ai vérifié que cette proposition n'existe pas déjà (<a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
propositions.html" target="_blank">Voir liste des proposition</a>).</label>
					<br /><br />
					<button type="submit" name="send" class="btn btn-red">Soumettre</button>
				</div>
			</form>
			<div class="clear" style="height:20px;"></div>
			<div style="text-align:right;">
				<i>* : Champs obligatoire</i>
			</div>
		</div>
	<?php }?>
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
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/formvalidation/css/formValidation.min.css" media="screen" />
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/formvalidation/js/formValidation.min.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/formvalidation/js/framework/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/bootstrap-select.min.css" />
	<script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput.min.css" />
	<script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput.min.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
js/fileinput_locale_fr.js"></script>

</body>
</html>
<?php }} ?>