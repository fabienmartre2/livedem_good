<div id="shadowbox">
	<div id="box" class="window">
		<div class="close"><img src="{$ADRESSE}images/close_box.png"  title="Fermer la fenêtre" alt="X" /></div>
		<div id="showlike">
			<div id="contenu">
				<table>
				{foreach from=$utilisateurs item=data name=boucle}
				{$utilisateur = Utilisateur::selectUtilisateur($data)}
				<tr>
					<td>{$utilisateur->getPseudo()}</td>
				</tr>
				{foreachelse}
				<tr>
					<td colspan="2" style="text-align:center;">Cette publication n'a pas encore reçu de J'aime</td>
				</tr>
				{/foreach}
				</table>
			</div>
		</div>
	</div>
</div>