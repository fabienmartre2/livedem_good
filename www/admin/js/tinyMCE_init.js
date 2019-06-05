
$(document).ready(function () {
	
	tinyMCE.init({
		mode : "exact",
		elements : "tMCE_news, tMCE_qui_sommes_nous, tMCE_cgu, tMCE_mentions, tMCE_fonctionnement",
		relative_urls: false, 
		theme : "advanced",
		language : "fr",
		valid_elements: "*[*]",
		plugins : "autolink, lists, spellchecker, pagebreak, style, layer, table, save, advhr, advimage, advlink, emotions, iespell, inlinepopups, insertdatetime, preview, media, searchreplace, print, contextmenu, paste, directionality, fullscreen, noneditable, visualchars, nonbreaking, template",
		
		// Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer, moveforward, movebackward, absolute, |, styleprops, spellchecker, |, cite, abbr, acronym, del, ins, attribs, |, visualchars, nonbreaking, template, blockquote, pagebreak",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        width : 760,
		height : 400,
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",
		
		// Date options		
		plugin_insertdate_dateFormat : "%d/%m/%Y",
		plugin_insertdate_timeFormat : "%H:%M:%S", 
		
	});
	
});
