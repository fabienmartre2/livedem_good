{extends file='base.tpl'}
{block name=body}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> {$page->getTitre()}
</div>

	<h1 class="titre">{$page->getTitre()}</h1>

	{$page->getContenu()}
	
{/block}