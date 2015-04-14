$(document).ready(function () {
    $("#popup-comment").fancybox({
        'width': 550,
        'height': 530,
        'maxWidth': 550,
        'minHeight': 530,
        'autoScale': false,
        'transitionIn': 'none',
        'transitionOut': 'none',
        'type': 'iframe',
        'scrolling': 'no'
    });
});

function closeLightBox() {
    $('.fancybox-close').click();
}

function GopY() {
    var widthScreen = screen.width;
    var heightScreen = screen.height;
    var divBannerCount = $('#ban_right .adshared').length;

    if (widthScreen > 1280) {
        $('#popup-comment').removeClass("gopy-mo").addClass("gopy");

    } else if (widthScreen > 1152) {
        if (divBannerCount >= 2) {
            $('#popup-comment').removeClass("gopy").addClass("gopy-mo");
        } else if (divBannerCount == 1) {
            $('#popup-comment').removeClass("gopy-mo").addClass("gopy");
        } else {
            $('#popup-comment').removeClass("gopy-mo").addClass("gopy");
        }
    } else if (widthScreen > 1024) {
        if (divBannerCount > 0) {
            $('#popup-comment').removeClass("gopy").addClass("gopy-mo");
        } else {
            $('#popup-comment').removeClass("gopy-mo").addClass("gopy");
        }
    }
    else {
        $('#popup-comment').removeClass("gopy").addClass("gopy-mo");
    }
}