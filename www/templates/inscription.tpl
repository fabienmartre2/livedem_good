{extends file='base.tpl'}
{block name=foot}
	<link rel="stylesheet" type="text/css" href="{$ADRESSE}js/formvalidation/css/formValidation.min.css" media="screen" />
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/formValidation.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/framework/bootstrap.min.js"></script>
{/block}

{block name=body}
{literal}
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
{/literal}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Inscription</li>
</ol>

	<h1 class="titre">Inscription</h1>
	{if isset($success) && $success}
		<div class="alert alert-success">
			Votre inscription a bien été prise en compte. Vous devez maintenant valider votre compte<br />
			Consultez votre boîte e-mail, nous vous avons envoyé un message pour terminer votre inscription<br />
			(<i>Si vous ne recevez pas d'e-mail dans les prochaines minutes, pensez à vérifier le dossier de vos courriers indésirables</i>)
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="alert alert-danger">{$error}</div>
		{/if}
		<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group {if in_array('pseudo', $errorChamps)}has-error{/if}" >
					<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
					<div class="col-sm-8">
						<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="{if isset($smarty.post.pseudo)}{$smarty.post.pseudo}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('nom', $errorChamps)}has-error{/if}" >
					<label for="nom" class="col-sm-4 control-label">Nom * : </label>
					<div class="col-sm-8">
						<input type="text" name="nom" id="nom" placeholder="Nom" value="{if isset($smarty.post.nom)}{$smarty.post.nom}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('prenom', $errorChamps)}has-error{/if}" >
					<label for="prenom" class="col-sm-4 control-label">Prénom * : </label>
					<div class="col-sm-8">
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="{if isset($smarty.post.prenom)}{$smarty.post.prenom}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('email', $errorChamps)}has-error{/if}" >
					<label for="email" class="col-sm-4 control-label">E-mail * : </label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('password', $errorChamps)}has-error{/if}" >
					<label for="password" class="col-sm-4 control-label">Mot de passe * : </label>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('passwordc', $errorChamps)}has-error{/if}" >
					<label for="passwordc" class="col-sm-4 control-label">Confirmer le mot de passe * : </label>
					<div class="col-sm-8">
						<input type="password" name="passwordc" id="passwordc" value="{if isset($smarty.post.passwordc)}{$smarty.post.passwordc}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('dateNaissance1', $errorChamps)}has-error{/if}" >
					<label for="dateNaissance1" class="col-sm-4 control-label">Date de naissance * : </label>
					<div class="col-sm-8">
						{if isset($smarty.post.dateNaissance1) && !empty($smarty.post.dateNaissance1) && !empty($smarty.post.dateNaissance1.Day) && !empty($smarty.post.dateNaissance1.Month) && !empty($smarty.post.dateNaissance1.Year)}
							{html_select_date reverse_years=true all_empty='--' time=$smarty.post.dateNaissance1 start_year='-100' field_array='dateNaissance1' field_order='DMY' month_format='%m' prefix='' style='border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'}
						{else}
							{html_select_date reverse_years=true time=NULL all_empty='--'  start_year='-100' field_array='dateNaissance1' field_order='DMY' month_format='%m' prefix='' style='border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'}
						{/if}
					</div>
				</div>
				<div class="form-group {if in_array('adresse', $errorChamps)}has-error{/if}" >
					<label for="adresse" class="col-sm-4 control-label">Adresse * : </label>
					<div class="col-sm-8">
						<input type="text" name="adresse" id="adresse" placeholder="Adresse" value="{if isset($smarty.post.adresse)}{$smarty.post.adresse}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('ville_codepostal', $errorChamps)}has-error{/if}" >
					<label for="codepostal" class="col-sm-4 control-label">Code postal * : </label>
					<div class="col-sm-8">
						<input type="text" name="ville_codepostal" id="codepostal" placeholder="Code Postal" value="{if isset($smarty.post.ville_codepostal)}{$smarty.post.ville_codepostal}{/if}"  class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('villeId', $errorChamps)}has-error{/if}" >
					<label for="villeId" class="col-sm-4 control-label">Ville * : </label>
					<div class="col-sm-8">
						<select name="villeId" id="villeId" class="form-control">
							<option value="{if isset($smarty.post.villeId)}{$smarty.post.villeId}{/if}">{if isset($smarty.post.villeId) && !empty($smarty.post.villeId)}{Ville::selectVille($smarty.post.villeId)->getNom()}{else}Choisissez ...{/if}</option>
						</select>
					</div>
				</div>
				<div class="form-group {if in_array('telFixe', $errorChamps)}has-error{/if}" >
					<label for="telFixe" class="col-sm-4 control-label">Téléphone fixe : </label>
					<div class="col-sm-8">
						<input type="text" name="telFixe" id="telFixe" placeholder="Téléphone fixe" value="{if isset($smarty.post.telFixe)}{$smarty.post.telFixe}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('telPort', $errorChamps)}has-error{/if}" >
					<label for="telPort" class="col-sm-4 control-label">Téléphone portable : </label>
					<div class="col-sm-8">
						<input type="text" name="telPort" id="telPort" placeholder="Téléphone portable" value="{if isset($smarty.post.telPort)}{$smarty.post.telPort}{/if}" class="form-control"/>
					</div>
				</div>

				<div class="checkbox {if in_array('cgu', $errorChamps)}has-error{/if}" id="cgu">
					<div class="col-sm-8 col-sm-offset-4"  style="padding:0 0 20px 0;">
						<label><input type="checkbox" name="cgu" value="1"> Je m'engage à respecter les <a href="{$ADRESSE}cms/reglement-interieur.html" target="_blank">conditions générales d'utilisation</a> du site.</label>
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
	{/if}
	<div class="clear"></div>
{/block}
