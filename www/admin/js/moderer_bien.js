
function moderer_bien(bouton_moderer)
{
	var url = $(bouton_moderer).attr("href");
	var prefixe_id_bien = "bouton_aff_modo_bien_";
	var id_bien = $(bouton_moderer).attr("id").substr(prefixe_id_bien.length);
	var parent = $(bouton_moderer).parent();
	
	parent.html("");
	
	$.ajax({
		url: url,
		dataType: "html",
		success: function (data)
		{
			if (data=="success_modo")
			{
				$(bouton_moderer).html("Afficher");
				var new_href = url.replace(/^(.*\.php).*$/, "$1?mode=aff&id="+id_bien);
				$(bouton_moderer).attr("href", new_href);
				
				parent.append(bouton_moderer);
			}
			else if (data=="success_aff")
			{
				$(bouton_moderer).html("Modérer");
				var new_href = url.replace(/^(.*\.php).*$/, "$1?mode=modo&id="+id_bien);
				$(bouton_moderer).attr("href", new_href);
				
				parent.append(bouton_moderer);
			}
			$(bouton_moderer).bind("click", function(ev) {
		
				ev.preventDefault();
				ev.stopPropagation();
				
				moderer_bien(this);		
			});
		}
	});
}

$(document).ready(function () {
	$('.bouton_aff_modo_bien').bind("click", function(ev) {
		
		ev.preventDefault();
		ev.stopPropagation();
		
		moderer_bien(this);
		
	});
	
});
