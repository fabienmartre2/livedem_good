$(document).ready(function() {
	
	// Case Ville
	function updateVille(){
		if($('#codepostal').val().length == 5){
			$.get(ADRESSE+"ajax/ville.php", { cp: $('#codepostal').val()},
			 function(data){
				 $('#villeId').html(data);
				 $('.selectpicker').selectpicker('refresh');
			 });
		}
	}
	$('#codepostal').keyup(function(){
		updateVille();
	});
	$('#codepostal').click(function(){
		updateVille();
	});
	$('#codepostal').change(function(){
		updateVille();
	});

	$('.calendrier').datepicker({
		dateFormat: 'dd/mm/yy'
	});

});

function showAlt(region) {
	document.getElementById("mapRegion").style.background = 'url('+ADRESSE+'images/cartes/'+region+'.png) no-repeat';
}
function hideAlt() {
	document.getElementById("mapRegion").style.background = 'url('+ADRESSE+'images/cartes/map_blank.png)';
}
function showAlt2(region) {
	document.getElementById("mapDepartement").style.background = 'url('+ADRESSE+'images/cartes/'+region+'.png) no-repeat';
}
function hideAlt2() {
	document.getElementById("mapDepartement").style.background = 'url('+ADRESSE+'images/cartes/map_blank.png)';
}