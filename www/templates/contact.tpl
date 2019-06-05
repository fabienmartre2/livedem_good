{extends file='base.tpl'}

{block name=body}
<div class="ariane">
	<a href="{$ADRESSE}">Accueil</a>
	> Contact
</div>
<h1 class="titre">Contact</h1>
		{if isset($error) && $error}
			<div class="error">{$error}</div>
		{/if}
		{if isset($success) && $success}
			<div class="success">Votre message a correctement été envoyé</div>
		{/if}
		<form action="{$ADRESSE}contact.html" method="post">
			<table style="margin:auto;">
			<tr>
				<td style="vertical-align:middle;">Civilité * : </td><td style="vertical-align:middle;">
					<input type="radio" class="type" name="type" value="Mme." {if isset($smarty.post.type) && $smarty.post.type == "Mme."}CHECKED{/if} style="margin-right:4px;"/>Mme
					<input type="radio" class="type" name="type" value="Mlle." {if isset($smarty.post.type) && $smarty.post.type == "Mlle."}CHECKED{/if} style="margin-right:4px; margin-left:8px;"/>Mle
					<input type="radio" class="type" name="type" value="M." {if isset($smarty.post.type) && $smarty.post.type == "M."}CHECKED{/if} style="margin-right:4px; margin-left:8px;" />M
				</td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Nom * : </td><td style="vertical-align:middle;"><input type="text" name="nom" style="width:239px; margin-bottom:2px;" value="{if isset($smarty.post.nom)}{stripslashes($smarty.post.nom)|escape:'html'}{/if}" /></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Email * : </td><td style="vertical-align:middle;"><input type="text" name="email" style="width:239px; margin-bottom:2px;" value="{if isset($smarty.post.email)}{stripslashes($smarty.post.email)|escape:'html'}{/if}" /></td>
			</tr>
			<tr>
				<td style="padding-right:5px;">Objet * : </td><td style="vertical-align:middle;"><input type="text" name="objet" style="width:239px; margin-bottom:2px;" value="{if isset($smarty.post.objet)}{stripslashes($smarty.post.objet)|escape:'html'}{/if}" /></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Message * : </td><td style="vertical-align:middle;"><textarea name="message" style="width:239px; margin-bottom:2px;" rows="10" cols="35">{if isset($smarty.post.message)}{stripslashes($smarty.post.message)|escape:'html'}{/if}</textarea></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">Code de confirmation :</td>
				<td style="vertical-align:middle;"><img src="{$ADRESSE}modules/anti_spam.php?name=contact&strlen=6" alt="anti-flood" align="middle" style="margin-bottom:2px;"/></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;">A recopier ci-contre * : </td><td style="vertical-align:middle;"><input type="text" name="spam" size="8" maxlength="6" id="spam" style="margin-bottom:2px;"/></td>
			</tr>
			<tr>
				<td></td><td style="text-align:left; padding-top:15px;"><button type="submit" class="design" name="send">Envoyer</button></td>
			</tr>
			
		</table>
	</form>		
{/block}