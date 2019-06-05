function confirmation(){
	choix = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
	if (choix == true)
		document.formulaire.submit();
	else
		return false;
}
$jquery = jQuery.noConflict();

$jquery(document).ready( function () {
	$jquery('#boutonlangueEN').click(function() {
		if($jquery('#langueEN').css("display") == "block"){
			$jquery('#langueEN').css("display", "none");
		}
		else{
			$jquery('#langueEN').css("display", "block");
		}
	});
	$jquery('#boutonlangueES').click(function() {
		if($jquery('#langueES').css("display") == "block"){
			$jquery('#langueES').css("display", "none");
		}
		else{
			$jquery('#langueES').css("display", "block");
		}
	});
	$jquery('#boutonlangueCH').click(function() {
		if($jquery('#langueCH').css("display") == "block"){
			$jquery('#langueCH').css("display", "none");
		}
		else{
			$jquery('#langueCH').css("display", "block");
		}
	});
	$jquery('#boutonlangueJP').click(function() {
		if($jquery('#langueJP').css("display") == "block"){
			$jquery('#langueJP').css("display", "none");
		}
		else{
			$jquery('#langueJP').css("display", "block");
		}
	});
	
});