$(document).ready(function() {
	document.getElementById('photo').addEventListener('change', function(){
	    for(var i = 0; i<this.files.length; i++){
	        var file =  this.files[i];
	        previewImage(file)
	    }
	}, false);

	 function previewImage(input) {
        if (input) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $('#gallery').html('<img src='+e.target.result+' style="max-width:150px; max-height:150px;"/>');
            }
            
            reader.readAsDataURL(input);
        }
    }

	
});