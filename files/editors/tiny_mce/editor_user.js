tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	skin : "o2k7",
	plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
    //imagemanager,

	// Theme options
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,|,link,unlink,anchor,image,insertimage,|,hr,sub,sup,charmap,|,bullist,numlist,|,outdent,indent,blockquote,|,cleanup,removeformat,code,|,preview,print,fullscreen",
    theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
    editor_selector : "mce_editor",
});