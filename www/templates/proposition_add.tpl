{extends file='base.tpl'}
{block name=foot}
	<link rel="stylesheet" type="text/css" href="{$ADRESSE}js/formvalidation/css/formValidation.min.css" media="screen" />
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/formValidation.min.js"></script>
	<script type="text/javascript" src="{$ADRESSE}js/formvalidation/js/framework/bootstrap.min.js"></script>
	<link rel="stylesheet" href="{$ADRESSE}js/bootstrap-select.min.css" />
	<script src="{$ADRESSE}js/bootstrap-select.min.js"></script>
	<link rel="stylesheet" href="{$ADRESSE}js/fileinput.min.css" />
	<script src="{$ADRESSE}js/fileinput.min.js"></script>
	<script src="{$ADRESSE}js/fileinput_locale_fr.js"></script>
{/block}

{block name=body}
{literal}
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
{/literal}


<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li><a href="{$ADRESSE}propositions.html">Propositions</a></li>
	<li class="active">Soumettre une proposition</li>
</ol>

	<h1 class="titre">Soumettre une proposition</h1>
	{if isset($success) && $success}
		<div class="alert alert-success">
			Votre proposition a bien été prise en compte.<br />
			Elle sera visible une fois approuvée par 2 citoyens référents.
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="alert alert-danger">{$error}</div>
		{/if}
		<div class="clear" style="height:20px;"></div>
		<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="panel panel-default" id="panel2">
					<div class="panel-heading">
						<h4 class="panel-title">
							Description de votre proposition
						</h4>
					</div>
					<div id="panel_description">
						<div class="panel-body">
							<div class="form-group {if in_array('titre', $errorChamps)}has-error{/if}" >
								<label for="titre" class="col-sm-4 control-label">Titre * : </label>
								<div class="col-sm-8">
									<input type="text" name="titre" id="titre" placeholder="Titre" value="{if isset($smarty.post.titre)}{$smarty.post.titre}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('description', $errorChamps)}has-error{/if}" >
								<label for="description" class="col-sm-4 control-label">Description * : </label>
								<div class="col-sm-8">
									<textarea type="text" name="description" id="description" placeholder="Description" class="form-control" rows="10">{if isset($smarty.post.description)}{$smarty.post.description}{/if}</textarea>
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
							<div class="form-group {if in_array('niveauId', $errorChamps)}has-error{/if}" >
								<label for="niveauId" class="col-sm-4 control-label">Niveau Electoral * : </label>
								<div class="col-sm-8 selectContainer">
									<select name="niveauId" id="niveauId" class="selectpicker show-tick form-control">
										<option value="">Choisissez ...</option>
										{if isset($smarty.post.niveauId)}
											{html_options  options=Niveau::selectArray() selected=$smarty.post.niveauId }
										{else}
											{html_options options=Niveau::selectArray()}
										{/if}
									</select>
								</div>
							</div>
							<div id="choixVille">
								<div class="form-group {if in_array('ville_codepostal', $errorChamps)}has-error{/if}" >
									<label for="codepostal" class="col-sm-4 control-label">Code postal * : </label>
									<div class="col-sm-8">
										<input type="text" name="ville_codepostal" id="codepostal" placeholder="Code Postal" value="{if isset($smarty.post.ville_codepostal)}{$smarty.post.ville_codepostal}{else}{$utilisateur->getVille()->getCodePostal()}{/if}"  class="form-control"/>
									</div>
								</div>
								<div class="form-group {if in_array('villeId', $errorChamps)}has-error{/if}" >
									<label for="villeId" class="col-sm-4 control-label">Ville * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="villeId" id="villeId">
											<option value="">Choisissez ...</option>
											{foreach from=$villes item=ville name=boucle}
												<option value="{$ville->getId()}" {if (isset($smarty.post.villeId) && $smarty.post.villeId == $ville->getId()) || ($utilisateur->getVilleId() == $ville->getId() )}SELECTED{/if}>{$ville->getNom()}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</div>
							<div id="choixDepartement">
								<div class="form-group {if in_array('departementId', $errorChamps)}has-error{/if}" >
									<label for="departementId" class="col-sm-4 control-label">Département * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="departementId" id="departementId">
											<option value="">Choisissez ...</option>
											{foreach from=$departements item=departement name=boucle}
												<option value="{$departement->getId()}" {if (isset($smarty.post.departementId) && $smarty.post.departementId == $departement->getId()) || ($utilisateur->getDepartement()->getId() == $departement->getId() )}SELECTED{/if}>{$departement->getNom()}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</div>
							<div id="choixRegion">
								<div class="form-group {if in_array('regionId', $errorChamps)}has-error{/if}" >
									<label for="regionId" class="col-sm-4 control-label">Région * : </label>
									<div class="col-sm-8">
										<select class="selectpicker show-tick form-control" name="regionId" id="regionId">
											<option value="">Choisissez ...</option>
											{foreach from=$regions item=region name=boucle}
												<option value="{$region->getId()}" {if (isset($smarty.post.regionId) && $smarty.post.regionId == $region->getId()) || ($utilisateur->getRegion()->getId() == $region->getId() )}SELECTED{/if}>{$region->getNom()}</option>
											{/foreach}
										</select>
									</div>
								</div>
							</div>
							<div class="form-group {if in_array('dureeVote', $errorChamps)}has-error{/if}" >
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
							<div class="form-group {if in_array('cout', $errorChamps)}has-error{/if}" >
								<label for="cout" class="col-sm-4 control-label">Coût : </label>
								<div class="col-sm-8">
									<input type="text" name="cout" id="cout" placeholder="Coût de votre proposition" value="{if isset($smarty.post.cout)}{$smarty.post.cout}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('zone', $errorChamps)}has-error{/if}" >
								<label for="zone" class="col-sm-4 control-label">Zone géographique impactée : </label>
								<div class="col-sm-8">
									<input type="text" name="zone" id="zone" placeholder="Zone géographique impactée" value="{if isset($smarty.post.zone)}{$smarty.post.zone}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('financement', $errorChamps)}has-error{/if}" >
								<label for="financement" class="col-sm-4 control-label">Source de financement : </label>
								<div class="col-sm-8">
									<input type="text" name="financement" id="financement" placeholder="Source de financement" value="{if isset($smarty.post.financement)}{$smarty.post.financement}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('impact', $errorChamps)}has-error{/if}" >
								<label for="impact" class="col-sm-4 control-label">Population impactée : </label>
								<div class="col-sm-8">
									<input type="text" name="impact" id="impact" placeholder="Population impactée" value="{if isset($smarty.post.impact)}{$smarty.post.impact}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('delai', $errorChamps)}has-error{/if}" >
								<label for="delai" class="col-sm-4 control-label">Délai de mise en place : </label>
								<div class="col-sm-8">
									<input type="text" name="delai" id="delai" placeholder="Délai de mise en place" value="{if isset($smarty.post.delai)}{$smarty.post.delai}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('periode', $errorChamps)}has-error{/if}" >
								<label for="periode" class="col-sm-4 control-label">Période d'application : </label>
								<div class="col-sm-8">
									<input type="text" name="periode" id="periode" placeholder="Période d'application" value="{if isset($smarty.post.periode)}{$smarty.post.periode}{/if}" class="form-control"/>
								</div>
							</div>
							<div class="form-group {if in_array('periode', $errorChamps)}has-error{/if}" >
								<label for="periode" class="col-sm-4 control-label">Durée de soutien : </label>
								<div class="col-sm-8">
									<select name="dureeSoutien" class="selectpicker show-tick form-control">
										{for $i=Config::get('duree_soutien') to 1 step -1}
											<option value="$i" {if isset($smarty.get.dureeSoutien) && $smarty.get.dureeSoutien == $i}SELECTED{/if}>{$i} semaines</option>
										{/for}
									</select>
								</div>
							</div>
							<div class="form-group {if in_array('dureeSoutien', $errorChamps)}has-error{/if}" >
								<label for="dureeSoutien" class="col-sm-4 control-label">Durée des débats : </label>
								<div class="col-sm-8">
									<select name="dureeSoutien" class="selectpicker show-tick form-control">
										{for $i=Config::get('duree_debat') to 1 step -1}
											<option value="$i" {if isset($smarty.get.dureeSoutien) && $smarty.get.dureeSoutien == $i}SELECTED{/if}>{$i} semaines</option>
										{/for}
									</select>
								</div>
							</div>
							<div class="form-group {if in_array('dureeVote', $errorChamps)}has-error{/if}" >
								<label for="dureeVote" class="col-sm-4 control-label">Durée du votes : </label>
								<div class="col-sm-8">
									<select name="dureeVote" class="selectpicker show-tick form-control">
										{for $i=Config::get('duree_vote') to 1 step -1}
											<option value="$i" {if isset($smarty.get.dureeVote) && $smarty.get.dureeVote == $i}SELECTED{/if}>{$i} semaines</option>
										{/for}
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear" style="height:20px;"></div>
				<div style="text-align:center;">
					<label style="font-size:14px;"><input type="checkbox" name="verif" value="1" /> J'ai vérifié que cette proposition n'existe pas déjà (<a href="{$ADRESSE}propositions.html" target="_blank">Voir liste des proposition</a>).</label>
					<br /><br />
					<button type="submit" name="send" class="btn btn-red">Soumettre</button>
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
