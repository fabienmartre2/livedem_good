{extends file='base.tpl'}
{block name=body}

<h2>Partager de "{$titre}"</h2>

{if $success}
	<div class="alert alert-success">Votre suggestion a été correctement envoyé !</div>
{/if}
{if !empty($error)}
	<div class="alert alert-danger">{$error}</div>
{/if}

{if isset($smarty.get.type) && $smarty.get.type == "fast"}
	<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{$smarty.server.REQUEST_URI|escape:'html'}">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="form-group" >
				<label for="nom" class="col-sm-4 control-label">Votre nom * : </label>
				<div class="col-sm-8">
					<input type="text" name="nom" id="nom" placeholder="Votre nom" value="{if isset($smarty.post.nom)}{$smarty.post.nom}{/if}" class="form-control"/>
				</div>
			</div>
			<div class="form-group" >
				<label for="email" class="col-sm-4 control-label">E-mail de votre ami * : </label>
				<div class="col-sm-8">
					<input type="text" name="email" id="email" placeholder="E-mail de votre ami" value="{if isset($smarty.post.email)}{$smarty.post.email}{/if}" class="form-control"/>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div style="text-align:center;">
			<button type="submit" class="btn btn-sm btn-red" name="fast"> Envoyer</button>
		</div>
	</form>
{/if}

{if isset($user_contacts)}
<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="{$smarty.server.REQUEST_URI|escape:'html'}">
	<div class="col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 col-sm-12 col-xs-12">
		<div class="form-group {if in_array('titre', $errorChamps)}has-error{/if}" >
			<label for="titre" class="col-sm-4 control-label">Vos contacts * : </label>
			<div class="col-sm-8">
				{foreach from=$user_contacts item=user_contact name=boucle}
					<input type="checkbox" name="emails[]" value="{$user_contact->email}" {if empty($user_contact->email)} DISABLED{/if} /> {$user_contact->displayName} : {if !empty($user_contact->email)}{$user_contact->email}{else}<i>e-mail masqué</i>{/if}<br />
				{foreachelse}
					<div class="alert alert-danger">Nous ne sommes pas parvenu à récupérer vos contacts</div>
				{/foreach}
			</div>
			<div class="clear" style="height:20px;"></div>
			<div style="text-align:center;">
				{if isset($user_profile) && !empty($user_profile->displayName)}
					<input type="hidden" name="expediteur" value="{$user_profile->displayName}" />
				{/if}
				<button type="submit" class="btn btn-sm btn-red" name="send"> Envoyer</button>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</form>
{/if}

<div style="text-align:center; padding:10px; font-weight:bold;">
	<a href="{$ADRESSE}proposition/{$proposition->getId()}.html">Retourner sur {$proposition->getTitre()}</a>
</div>

{/block}