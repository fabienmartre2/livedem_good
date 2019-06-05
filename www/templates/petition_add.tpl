{extends file='base.tpl'}
{block name=foot}
	<link rel="stylesheet" type="text/css" href="{$ADRESSE}js/formvalidation/css/formValidation.min.css" media="screen" />
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/formValidation.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/framework/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{$ADRESSE}js/bootstrap-select.min.css" />
	<script src="{$ADRESSE}js/bootstrap-select.min.js"></script>
	<script src="{$ADRESSE}js/gallery-form.js"></script>
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
            titre: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir un titre'
                    },

                }
            },
            sujet: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir une description'
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
	<li><a href="{$ADRESSE}petitions.html">Discussions</a></li>
	<li class="active">Soumettre une pétition</li>
</ol>


	{if isset($success) && $success}
		<div class="alert alert-success">
			Toutes les informations ont été correctement enregistrées. Votre pétition a été créée.<br />
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="alert alert-danger">{$error}</div>
		{/if}
		<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group {if in_array('titre', $errorChamps)}has-error{/if}" >
					<label for="titre" class="col-sm-4 control-label">Titre * : </label>
					<div class="col-sm-8">
						<input type="text" name="titre" id="titre" placeholder="Titre de votre pétition" value="{if isset($smarty.post.titre)}{$smarty.post.titre}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('description', $errorChamps)}has-error{/if}" >
					<label for="description" class="col-sm-4 control-label">Description * : </label>
					<div class="col-sm-8">
						<textarea type="text" name="description" id="description" placeholder="Description l'objet de votre pétition" class="form-control" rows="10">{if isset($smarty.post.description)}{$smarty.post.description}{/if}</textarea>
					</div>
				</div>
				<div class="form-group {if in_array('categorieId', $errorChamps)}has-error{/if}" >
					<label for="categorieId" class="col-sm-4 control-label">Catégorie * : </label>
					<div class="col-sm-8">
						<select name="categorieId" id="categorieId" class="selectpicker show-tick form-control">
							{if isset($smarty.post.categorieId)}
								{html_options options=Categorie::selectArray() selected=$smarty.post.categorieId }
							{else}
								{html_options options=Categorie::selectArray()}
							{/if}
						</select>
					</div>
				</div>
				<div class="form-group {if in_array('vignette', $errorChamps)}has-error{/if}" >
					<label for="photo" class="col-sm-4 control-label">Illustration * : </label>
					<div class="col-sm-8">
						<input type="file" name="vignette" id="photo" /><div id="gallery"></div>
						<p class="help-block">Format conseillé : 350px x 300px - Max : 3Mo</p>
					</div>
				</div>
				<div class="clear" style="height:20px;"></div>
				<div style="text-align:center;">
					<label style="font-size:14px;"><input type="checkbox" name="verif" value="1" /> J'ai vérifié que cette petition n'existe pas déjà.</label>
					<div class="clear"></div>
					<button type="submit" name="send" class="btn btn-red">Créer la pétition</button>
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
