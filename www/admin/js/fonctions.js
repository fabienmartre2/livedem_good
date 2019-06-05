function confirmation(){
	choix = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
	if (choix == true)
		document.formulaire.submit();
	else
		return false;
}

$(document).ready( function () {
	
});
