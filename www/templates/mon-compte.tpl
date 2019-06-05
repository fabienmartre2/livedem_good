{extends file='base.tpl'}
{block name=body}

<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> <a href="{$ADRESSE}inscription.html">Mon compte</a>
</div>

	<h1 class="titre">Mon compte</h1>
		{if isset($success) && $success}
		<div class="success">
			Votre inscription ont été mise à jour.<br />
		</div>
		{/if}
		{if isset($error) && !empty($error)}
			<div class="error">{$error}</div>
		{/if}
		<div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 col-sm-12 col-xs-12">
			<form action="{$smarty.server.REQUEST_URI|escape:'html'}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="inscription" id="inscriptionform">
				<div class="form-group {if in_array('pseudo', $errorChamps)}has-error{/if}" >
					<label for="pseudo" class="col-sm-4 control-label">Pseudo * : </label>
					<div class="col-sm-8">
						<p class="help-block">{$utilisateur->getPseudo()|escape:'html'}</p>
					</div>
				</div>
				<div class="form-group {if in_array('nom', $errorChamps)}has-error{/if}" >
					<label for="nom" class="col-sm-4 control-label">Nom * : </label>
					<div class="col-sm-8">
						<input type="text" name="nom" id="nom" placeholder="Nom" value="{if isset($smarty.post.nom)}{$smarty.post.nom}{else}{$utilisateur->getNom()|escape:'html'}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('prenom', $errorChamps)}has-error{/if}" >
					<label for="prenom" class="col-sm-4 control-label">Prénom * : </label>
					<div class="col-sm-8">
						<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="{if isset($smarty.post.prenom)}{$smarty.post.prenom}{else}{$utilisateur->getPrenom()|escape:'html'}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('email', $errorChamps)}has-error{/if}" >
					<label for="email" class="col-sm-4 control-label">E-mail * : </label>
					<div class="col-sm-8">
						<input type="text" name="email" id="email" placeholder="Adresse e-mail" value="{if isset($smarty.post.email)}{$smarty.post.email}{else}{$utilisateur->getEmail()|escape:'html'}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('password', $errorChamps)}has-error{/if}" >
					<label for="password" class="col-sm-4 control-label">Mot de passe : </label>
					<div class="col-sm-8">
						<input type="password" name="password" id="password" value="" class="form-control"/>
						<p class="help-block">Laissez vide pour ne pas modifier</p>
					</div>
				</div>
				<div class="form-group {if in_array('passwordc', $errorChamps)}has-error{/if}" >
					<label for="passwordc" class="col-sm-4 control-label">Confirmer le mot de passe : </label>
					<div class="col-sm-8">
						<input type="password" name="passwordc" id="passwordc" value="" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('datenaissance', $errorChamps)}has-error{/if}" >
					<label for="datenaissance" class="col-sm-4 control-label">Date de naissance : </label>
					<div class="col-sm-8">
						{if isset($smarty.post.dateNaissance) && !empty($smarty.post.dateNaissance) && !empty($smarty.post.dateNaissance.Day) && !empty($smarty.post.dateNaissance.Month) && !empty($smarty.post.dateNaissance.Year)}
								{html_select_date reverse_years=true all_empty='--' time=$smarty.post.dateNaissance start_year='-100' field_array='dateNaissance' field_order='DMY' month_format='%m' prefix='' style='border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'}
							{else}
								{html_select_date reverse_years=true time=strtotime($utilisateur->getDatenaissance()) all_empty='--'  start_year='-100' field_array='dateNaissance' field_order='DMY' month_format='%m' prefix='' style='border-radius:6px; border:1px solid #d2d8d8; margin-top:5px; width:88px; padding:8px 5px'}
							{/if}
					</div>
				</div>
				<div class="form-group {if in_array('telFixe', $errorChamps)}has-error{/if}" >
					<label for="telFixe" class="col-sm-4 control-label">Téléphone fixe : </label>
					<div class="col-sm-8">
						<input type="text" name="telFixe" id="telFixe" placeholder="Téléphone fixe" value="{if isset($smarty.post.telFixe)}{$smarty.post.telFixe}{stripslashes($smarty.post.telFixe)|escape:'html'}{/if}" class="form-control"/>
					</div>
				</div>
				<div class="form-group {if in_array('telPort', $errorChamps)}has-error{/if}" >
					<label for="telPort" class="col-sm-4 control-label">Téléphone portable : </label>
					<div class="col-sm-8">
						<input type="text" name="telPort" id="telPort" placeholder="Téléphone portable" value="{if isset($smarty.post.telPort)}{$smarty.post.telPort}{stripslashes($smarty.post.telPort)|escape:'html'}{/if}" class="form-control"/>
					</div>
				</div>
		
			<div class="clear" style="height:20px;"></div>
			<div style="text-align:center;">
				<button type="submit" name="send" class="btn btn-red">Mettre à jour</button>
			</div>
		</form>
	</div>
	<div class="clear" style="height:30px;"></div>
	
	<div class="titre_moncompte">Les propositions que j'ai émises</div>
	<div class="data_moncompte">
		{foreach from=$prop_cree item=proposition name=boucle}
			{include file='propositions_view.tpl' proposition=$proposition}
		{foreachelse}
			<b>Vous n'avez pas créé de propositions</b>
		{/foreach}
	</div>

	<div class="titre_moncompte">Les propositions que j'ai soutenues</div>
	<div class="data_moncompte">
		{foreach from=$prop2 item=proposition name=boucle}
			{include file='propositions_view.tpl' proposition=$proposition}
		{foreachelse}
			<b>Vous n'avez pas soutenu de propositions</b>
		{/foreach}
	</div>

	<div class="titre_moncompte">Les débats auxquels j'ai participé</div>
	<div class="data_moncompte">
		{foreach from=$prop3 item=proposition name=boucle}
			{include file='propositions_view.tpl' proposition=$proposition}
		{foreachelse}
			<b>Vous n'avez pas participé à des débats</b>
		{/foreach}
	</div>

	<div class="titre_moncompte">Les votes auxquels j'ai participé</div>
	<div class="data_moncompte">
		{foreach from=$prop4 item=proposition name=boucle}
			{include file='propositions_view.tpl' proposition=$proposition}
		{foreachelse}
			<b>Vous n'avez pas voté de propositions</b>
		{/foreach}
	</div>

	<div class="clear"></div>
{/block}
