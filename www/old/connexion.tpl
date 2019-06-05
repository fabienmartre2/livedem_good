{extends file='base.tpl'}
{block name=body}

<ol class="breadcrumb">
	<li><a href="{$ADRESSE}">Accueil</a></li>
	<li class="active">Connexion</li>
</ol>

	<h1 class="titre">Connexion</h1>

	{if isset($success) && $success}
		<div class="success">
			Connexion réussie !
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="error">{$error}</div>
		{/if}

		<form action="{$smarty.server.REQUEST_URI}" method="POST"  class="form-horizontal">
			<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
				<div class="form-group {if in_array('pseudo', $errorChamps)}has-error{/if}" >
					<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
					<div class="col-sm-8">
						<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" value="{if isset($smarty.post.pseudo)}{$smarty.post.pseudo}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('password', $errorChamps)}has-error{/if}" >
					<label for="password" class="col-sm-4 control-label">Mot de passe * : </label>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" placeholder="Mot de passe" value="{if isset($smarty.post.password)}{$smarty.post.password}{/if}" class="form-control"/>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div style="text-align:center;">
				<input type="hidden" name="connexion" value="1" />
				<button type="submit" class="design"><div class="data">Connexion</div></button>
			</div>
		</form>

		<div style="text-align:center; padding-top:20px;">
			<a href="{$ADRESSE}inscription.html">S'inscrire</a> - <a href="{$ADRESSE}pass.html">Mot de passe perdu</a>
		</div>
	{/if}
{/block}