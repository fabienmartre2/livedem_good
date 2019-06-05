
function valider_paiement(bouton_valider)
{
	var url = $(bouton_valider).attr("href");
	var prefixe_id_paiement = "bouton_valider_paiement_";
	var id_paiement = $(bouton_valider).attr("id").substr(prefixe_id_paiement.length);
	
	$.ajax({
		url: url,
		dataType: "html",
		success: function (data)
		{
			if (data=="success")
			{
				/* Modif du texte de la cellule du bouton valider */
				var parent = $(bouton_valider).parent();
				$(parent).html("Déjà validé");
				
				/* Modif du texte de la cellule du statut */
				var td_statut = $("#td_paiement_statut_"+id_paiement);
				td_statut.html("Accepté");
			}
			else
			{
				alert("Erreur de validation. Le mail a pu ne pas bien être envoyé.");
			}
		}
	});
}

$(document).ready(function () {
	$('.bouton_valider_paiement').bind("click", function(ev) {
		
		ev.preventDefault();
		ev.stopPropagation();
		
		valider_paiement(this);
		
	});
	
});
