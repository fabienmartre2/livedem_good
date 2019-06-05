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
            nom: {
                validators: {
                    notEmpty: {
                        message: 'Vous devez saisir un sujet'
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
});
</script>
{/literal}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li><a href="{$ADRESSE}discussions.html">Discussions</a></li>
	<li class="active">Créer une discussion</li>
</ol>


	<h1 class="titre">Créer une discussion</h1>
	{if isset($success) && $success}
		<div class="alert alert-success">
			Toutes les informations ont été correctement enregistrées. Votre discussion a été créée.<br />
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="alert alert-danger">{$error}</div>
		{/if}
		<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group {if in_array('titre', $errorChamps)}has-error{/if}" >
					<label for="nom" class="col-sm-4 control-label">Sujet * : </label>
					<div class="col-sm-8">
						<input type="text" name="nom" id="nom" placeholder="Sujet de votre discussion" value="{if isset($smarty.post.nom)}{$smarty.post.nom}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('sujet', $errorChamps)}has-error{/if}" >
					<label for="sujet" class="col-sm-4 control-label">Description * : </label>
					<div class="col-sm-8">
						<textarea type="text" name="sujet" id="sujet" placeholder="Description de votre sujet de discussion" class="form-control" rows="10">{if isset($smarty.post.sujet)}{$smarty.post.sujet}{/if}</textarea>
					</div>
				</div>
				<div class="clear" style="height:20px;"></div>
				<div style="text-align:center;">
					<button type="submit" name="send" class="btn btn-red">Créer la discussion</button>
				</div>
			</form>
		</div>
	{/if}
	<div class="clear"></div>
{/block}
