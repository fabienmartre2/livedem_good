{extends file='base.tpl'}
{block name=body}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}inscription.html">Inscription</a>
	> Validation
</div>

	<h1 class="titre">Inscription</h1>
	{if isset($success) && $success}
		<div class="success">
			Votre compte est maintenant validé et votre inscription terminée<br />
			Vous pouvez dès à présent vous connecter avec votre adresse e-mail et votre mot de passe.
		</div>
	{else}
		{if isset($error) && !empty($error)}
			<div class="error">{$error}</div>
		{/if}
	{/if}
	<div class="clear"></div>
{/block}
