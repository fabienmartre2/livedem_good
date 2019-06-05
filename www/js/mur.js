var updateInProgress = false;
var postType = 1;
var showlike = false;
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25};

function updateMur(){

	if(!updateInProgress){
		updateInProgress = true;
		if(typeof(typeConteneur) =="undefined"){
			typeConteneur = "";
			conteneurId = "";
		}
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/updatemur.php',
			data:{'lastVerif': lastVerif, 'typeConteneur': typeConteneur, 'conteneurId':conteneurId},
			success: function(data){
				retour = data;
				//alert(retour.lastVerif);
				if(retour.data != '')
					lastVerif = retour.lastVerif;
				
				$.each(retour.data, function( index, element ) {
					if(element.type == 1){
						$('#mymur').prepend(element.html);
					}
					if(element.type == 2){
						$('#mymur').prepend(element.html);
					}
					if(element.type == 4){
						$('#mymur').prepend(element.html);
					}
					else if(element.type == 3){
						$('#feed'+element.parenttype+'-'+element.parent+' .commentaires').append(element.html);
					}
					else if(element.type == 5){
						$('#like'+element.parenttype+'-'+element.parent).html(element.html);
					}
					else if(element.type == 6){
						$('#dislike'+element.parenttype+'-'+element.parent).html(element.html);
					}
					
				});
				updateInProgress = false;
			}
		});
	}
}

function share(typeID, objetID){
	$.ajax({
		type:'POST',
		url: ADRESSE+'ajax/share.php',
		data:{'typeId': typeID, 'objetId': objetID},
		success: function(data){
			retour = $.parseJSON(data);
			if(retour.error){
				alert(retour.error)
			}
			else{
				updateMur();
			}
		}
	});
}

function supprimer(type, objetID){
	var res = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
	if (res == true) {
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/supprimer.php',
			data:{'type': type, 'objetId': objetID},
			success: function(data){
				retour = $.parseJSON(data);
				if(retour.error){
					alert(retour.error)
				}
				else{
					if(type == "mur"){
						$("#feed1-"+objetID).remove()
					}
					if(type == "photo"){
						$("#feed2-"+objetID).remove()
					}
					if(type == "commentaire"){
						$("#feed3-"+objetID).remove()
					}
				}
			}
		});
	}
}

function signaler(typeID, objetID){
	var res = confirm("Souhaitez-vous avertir un administrateur ?");
	if (res == true) {
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/signalement.php',
			data:{'typeId': typeID, 'objetId': objetID},
			success: function(data){
				retour = $.parseJSON(data);
				if(retour.error){
					alert(retour.error)
				}
				else{
					alert("Merci, votre signalement a été transmis");
				}
			}
		});
	}
}


function like(typeID, objetID, interactionType){
	$.ajax({
		type:'POST',
		url: ADRESSE+'ajax/like.php',
		data:{'typeId': typeID, 'objetId': objetID, 'interactionType' : interactionType},
		success: function(data){
			retour = $.parseJSON(data);
			if(retour.error){
				alert(retour.error)
			}
			else{
				$('#aimer'+typeID+'-'+objetID+'-'+interactionType+' a').html(retour.interaction);
				updateMur();
			}
		}
	});
}

function showlikes(typeID, objetID){
	$("#masque").hide();
	$(".window").remove();
	if(!showlike){
		$.ajax({
			url: ADRESSE+'ajax/showlike.php',
			data:{'typeID': typeID, 'objetID': objetID},
			success: function(data){
				$('body').append(data);
				inscription = true;
				//Récupération des dimensions de la page
				var xHeight = $(document).height();
				var xWidth = $(window).width();
				//Dimensionnement du masque recouvrant la page
				$("#masque").css({"width":xWidth,"height":xHeight});
				//Apparition du masque
				$("#masque").fadeIn();
				//Attribution à celui-ci d’une transparence de
				//façon à laisser la page légèrement visible
				$("#masque").fadeTo("fast",0.4);
				var xH = $(window).height();
				var xW = $(window).width();
				//Centrage de la shadow box
				$("#box").css("top", $(window).scrollTop()+(xH/2-$("#box").height()/2));
				$("#box").css("left", xW/2-$("#box").width()/2);
				//Apparition de la shadow box
				$("#box").fadeIn();
				//Apparition de la shadow box
				$("#box").fadeIn();
				showlike = true;
			}
		});
	}
}

$(document).on('click', '.close', function(ev){
	ev.preventDefault();
	$("#masque").hide();
	$(".window").remove();
	showlike = false;
});

$(document).ready(function() {
	$('form[name="form_postermur"]').submit(function(ev){
		ev.preventDefault();
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/postermur.php',
			data:$('form[name="form_postermur"]').serialize(),
			success: function(data){
				retour = $.parseJSON(data);
				if(retour.error){
					alert(retour.error)
				}
				else{
					$('form[name="form_postermur"]').get(0).reset();
					updateMur();
				}
			}
		});
	});


	$('form[name="form_posterphoto"]').ajaxForm({
		dataType:'json',
		type:'POST',
		url: ADRESSE+'ajax/posterphoto.php',
	    beforeSend: function() {
	        var percentVal = '0%';
	        $('.percent').html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        $('.percent').html(percentVal);
	    },
	    success: function(data) {
	        var percentVal = '100%';
	        $('.percent').html(percentVal);
			if(data.error){
				alert(data.error)
			}
			else{
				$('form[name="form_posterphoto"]').get(0).reset();
				updateMur();
			}
	    }
	}); 


	$(document).on('submit', '.form_commenter', function(ev){
		ev.preventDefault();
		var myform = $(this);
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/commenter.php',
			data:myform.serialize(),
			success: function(data){
				retour = $.parseJSON(data);
				if(retour.error){
					alert(retour.error)
				}
				else{
					myform.get(0).reset();
					updateMur();
				}
			}
		});
	});
	$(document).on('submit', '.form_commenter_sortie', function(ev){
		ev.preventDefault();
		var myform = $(this);
		$.ajax({
			type:'POST',
			url: ADRESSE+'ajax/commenter.php',
			data:myform.serialize(),
			success: function(data){
				retour = $.parseJSON(data);
				if(retour.error){
					alert(retour.error)
				}
				else{
					myform.get(0).reset();
					updateMur();
				}
			}
		});
	});

	$(document).on('click', '.commenter', function(ev){
		ev.preventDefault();
		$(this).parent().parent().children('.form_commenter').slideToggle();
	});

	$('.post_mur').on('click', function(ev){
		ev.preventDefault();
		if(postType != 1){
			postType = 1;
			$('#postphoto').css('display', 'none');
			$('#postmur').css('display', 'block');
		}
	});


	$('.post_photo').on('click', function(ev){
		ev.preventDefault();
		if(postType != 2){
			postType = 2;
			$('#postmur').css('display', 'none');
			$('#postphoto').css('display', 'block');
		}
	});
	
	$('.postmur').on('click', function(ev){
		ev.preventDefault();
		if(postType != 1){
			postType = 1;
			$('#postmur_sortie').css('display', 'block');
			$('#postphoto_sortie').css('display', 'none');
			$('#postvideo_sortie').css('display', 'none');
		}
	});
	
	$('.postphoto').on('click', function(ev){
		ev.preventDefault();
		if(postType != 2){
			postType = 2;
			$('#postmur_sortie').css('display', 'none');
			$('#postphoto_sortie').css('display', 'block');
			$('#postvideo_sortie').css('display', 'none');
		}
	});
	
	$('.postvideo').on('click', function(ev){
		ev.preventDefault();
		if(postType != 3){
			postType = 3;
			$('#postmur_sortie').css('display', 'none');
			$('#postphoto_sortie').css('display', 'none');
			$('#postvideo_sortie').css('display', 'block');
		}
	});

	


	var updateIntervalMur = setInterval('updateMur();',5000); 
});

