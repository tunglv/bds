tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    //skin : "o2k7",
    //skin : "cirkuit",
    plugins : "jqueryinlinepopups,youtubeIframe,imagemanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,autosave",

    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontsizeselect,|,link,unlink,anchor,image,insertimage,|,hr,sub,sup",
    theme_advanced_buttons2 : "youtubeIframe,charmap,bullist,numlist,|,outdent,indent,blockquote,|,tablecontrols,cleanup,removeformat,code,|,preview,print,fullscreen",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,
    editor_selector : "mce_editor",
    relative_urls : false,
});

//plugins : "youtubeIframe",
//theme_advanced_buttons1 : "youtubeIframe",
//valid_elements:"iframe[src|title|width|height|allowfullscreen|frameborder|class|id],object[classid|width|height|codebase|*],param[name|value|_value|*],embed[type|width|height|src|*]"
