<?php /* Smarty version Smarty-3.1.14, created on 2019-06-04 20:02:17
         compiled from "/home/livedem/www/templates/inscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18573239165cf6b229671649-93713723%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dffc89ec48f75b70bac1266b0a61e4676b802305' => 
    array (
      0 => '/home/livedem/www/templates/inscription.tpl',
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
  'nocache_hash' => '18573239165cf6b229671649-93713723',
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
  'unifunc' => 'content_5cf6b2297e1f19_78606012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cf6b2297e1f19_78606012')) {function content_5cf6b2297e1f19_78606012($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_select_date')) include '/home/livedem/www/lib/Smarty/plugins/function.html_select_date.php';
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
    $('#inscriptionform').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pseudo: {
                validators: {
                    notEmpty: {
                        message: 'Le pseudo est obligatoire'
                    },

                }
            },
            nom: {
                validators: {
                    notEmpty: {
                        message: 'Le nom est obligatoire'
                    },

                }
            },
            prenom: {
                validators: {
                    notEmpty: {
                        message: 'Le prénom est obligatoire'
                    },

                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'L\'adresse e-mail est obligatoire'
                    },
                    emailAddress: {
                            message: 'L\'adresse e-mail n\'est pas valide'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir un mot de passe'
                    }
                }
            },
            passwordc: {
	            validators: {
	                identical: {
	                    field: 'password',
	                    message: 'La confirmation du mot de passe est incorrecte'
	                }
	            }
	        },
	        adresse: {
                validators: {
                    notEmpty: {
                        message: 'L\'adresse est obligatoire'
                    },

                }
            }
        }
    });
	$('.selectpicker').selectpicker({
	  size: 6
	});
});
</script>


<ol class="breadcrumb">
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
">Accueil</a></li>
	<li class="active">Inscription</li>
</ol>

	<h1 class="titre">Inscription</h1>
	<?php if (isset($_smarty_tpl->tpl_vars['success']->value)&&$_smarty_tpl->tpl_vars['success']->value){?>
		<div class="alert alert-success">
			Votre inscription a bien été prise en compte. Vous devez maintenant valider votre compte<br />
			Consultez votre boîte e-mail, nous vous avons envoyé un message pour terminer votre inscription<br />
			(<i>Si vous ne recevez pas d'e-mail dans les prochaines minutes, pensez à vérifier le dossier de vos courriers indésirables</i>)
		</div>
	<?php }else{ ?>
		<?php if (isset($_smarty_tpl->tpl_vars['error']->value)&&!empty($_smarty_tpl->tpl_vars['error']->value)){?>
			<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
		<?php }?>
		<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
			<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8', true);?>
" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group <?php if (in_array('pseudo',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
					<div class="col-sm-8">
						<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="<?php if (isset($_POST['pseudo'])){?><?php echo $_POST['pseudo'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('nom',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="nom" class="col-sm-4 control-label">Nom * : </label>
					<div class="col-sm-8">
						<input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if (isset($_POST['nom'])){?><?php echo $_POST['nom'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('prenom',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="prenom" class="col-sm-4 control-label">Prénom * : </label>
					<div class="col-sm-8">
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if (isset($_POST['prenom'])){?><?php echo $_POST['prenom'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('email',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="email" class="col-sm-4 control-label">E-mail * : </label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="<?php if (isset($_POST['email'])){?><?php echo $_POST['email'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('password',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="password" class="col-sm-4 control-label">Mot de passe * : </label>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])){?><?php echo $_POST['password'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('passwordc',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="passwordc" class="col-sm-4 control-label">Confirmer le mot de passe * : </label>
					<div class="col-sm-8">
						<input type="password" name="passwordc" id="passwordc" value="<?php if (isset($_POST['passwordc'])){?><?php echo $_POST['passwordc'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('dateNaissance1',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="dateNaissance1" class="col-sm-4 control-label">Date de naissance * : </label>
					<div class="col-sm-8">
						<?php if (isset($_POST['dateNaissance1'])&&!empty($_POST['dateNaissance1'])&&!empty($_POST['dateNaissance1']['Day'])&&!empty($_POST['dateNaissance1']['Month'])&&!empty($_POST['dateNaissance1']['Year'])){?>
							<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'all_empty'=>'--','time'=>$_POST['dateNaissance1'],'start_year'=>'-100','field_array'=>'dateNaissance1','field_order'=>'DMY','month_format'=>'%m','prefix'=>'','style'=>'border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php echo smarty_function_html_select_date(array('reverse_years'=>true,'time'=>null,'all_empty'=>'--','start_year'=>'-100','field_array'=>'dateNaissance1','field_order'=>'DMY','month_format'=>'%m','prefix'=>'','style'=>'border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'),$_smarty_tpl);?>

						<?php }?>
					</div>
				</div>
				<div class="form-group <?php if (in_array('adresse',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="adresse" class="col-sm-4 control-label">Adresse * : </label>
					<div class="col-sm-8">
						<input type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?php if (isset($_POST['adresse'])){?><?php echo $_POST['adresse'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('ville_codepostal',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="codepostal" class="col-sm-4 control-label">Code postal * : </label>
					<div class="col-sm-8">
						<input type="text" name="ville_codepostal" id="codepostal" placeholder="Code Postal" value="<?php if (isset($_POST['ville_codepostal'])){?><?php echo $_POST['ville_codepostal'];?>
<?php }?>"  class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('villeId',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="villeId" class="col-sm-4 control-label">Ville * : </label>
					<div class="col-sm-8">
						<select name="villeId" id="villeId" class="form-control">
							<option value="<?php if (isset($_POST['villeId'])){?><?php echo $_POST['villeId'];?>
<?php }?>"><?php if (isset($_POST['villeId'])&&!empty($_POST['villeId'])){?><?php echo Ville::selectVille($_POST['villeId'])->getNom();?>
<?php }else{ ?>Choisissez ...<?php }?></option>
						</select>
					</div>
				</div>
				<div class="form-group <?php if (in_array('telFixe',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="telFixe" class="col-sm-4 control-label">Téléphone fixe : </label>
					<div class="col-sm-8">
						<input type="text" name="telFixe" id="telFixe" placeholder="Téléphone fixe" value="<?php if (isset($_POST['telFixe'])){?><?php echo $_POST['telFixe'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>
				<div class="form-group <?php if (in_array('telPort',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" >
					<label for="telPort" class="col-sm-4 control-label">Téléphone portable : </label>
					<div class="col-sm-8">
						<input type="text" name="telPort" id="telPort" placeholder="Téléphone portable" value="<?php if (isset($_POST['telPort'])){?><?php echo $_POST['telPort'];?>
<?php }?>" class="form-control"/>
					</div>
				</div>

				<div class="checkbox <?php if (in_array('cgu',$_smarty_tpl->tpl_vars['errorChamps']->value)){?>has-error<?php }?>" id="cgu">
					<div class="col-sm-8 col-sm-offset-4"  style="padding:0 0 20px 0;">
						<label><input type="checkbox" name="cgu" value="1"> Je m'engage à respecter les <a href="<?php echo $_smarty_tpl->tpl_vars['ADRESSE']->value;?>
cms/reglement-interieur.html" target="_blank">conditions générales d'utilisation</a> du site.</label>
					</div>
				</div>
				<div style="text-align:center; padding-top:10px;">
					<button type="submit" class="btn btn-red" name="send">Inscription</button>
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

</body>
</html>
<?php }} ?>