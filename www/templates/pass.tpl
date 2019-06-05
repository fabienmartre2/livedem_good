{extends file='base.tpl'}
{block name=body}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Mot de passe perdu</li>
</ol>

	<h1 class="titre">Mot de passe perdu</h1>
	<div class="clear" style="height:20px;"></div>
	{if isset($success) && $success}
		<div class="alert alert-success">
			Nous vous avons envoyé un nouveau mot de passe par e-mail.
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="alert alert-danger">{$error}</div>
		{/if}

		<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group {if in_array('email', $errorChamps)}has-error{/if}" >
					<label for="email" class="col-sm-4 control-label">Adresse e-mail * : </label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="E-Mail" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('nom', $errorChamps)}has-error{/if}" >
					<label for="nom" class="col-sm-4 control-label">Code de confirmation :</label>
					<div class="col-sm-8">
						<img src="{$ADRESSE}modules/anti_spam.php?name=contact&strlen=6" alt="anti-flood" align="middle" style="margin-bottom:2px;"/>
					</div>
				</div>
				<div class="form-group {if in_array('spam', $errorChamps)}has-error{/if}" >
					<label for="spam" class="col-sm-4 control-label">A recopier ci-contre * : </label>
					<div class="col-sm-8">
						<input type="text" name="spam" id="spam" placeholder="" value="{if isset($smarty.post.spam)}{$smarty.post.spam}{/if}" class="form-control"/>
					</div>
				</div>
				<div style="text-align:center; padding-top:10px;">
					<input type="submit" name="connexion" value="Recevoir un mot de passe" class="btn button" /><br />
				</div>
			</form>
		</div>
		<div class="clear"></div>
		<div style="text-align:center; padding-top:20px;">
			<a href="{$ADRESSE}inscription.html">S'inscrire</a> - <a href="{$ADRESSE}connexion.html">Connexion</a>
		</div>
	{/if}
{/block}