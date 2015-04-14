/// <reference path="../../../Scripts/jquery-1.7.2.js" />

//<![CDATA[
//__bannerContext = {"cateId":null,"pageId":189,"currentPage":0,"cityCode":null,"districtId":null}
//]]>
function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

$(document).ready(function () {

    //showBannerFix();
    if (isIE() == '6') {
        $("#wrap-comment").css("display", "none");
    }

    var positionQuery = '';
    var rand = -1;

    $('.adPosition').each(function () {
        var position = $(this);
        var positionCode = position.attr('positioncode');

        if (positionQuery.length > 0)
            positionQuery += '@';
        if (position.attr('hasshare') != undefined && position.attr('hasnotshare') != undefined) {
            positionQuery += position.attr('hasshare') + '$' + position.attr('hasnotshare') + '$' + positionCode;

        } else {
            positionQuery += positionCode;
        }
    });

});

function shuffleArray(array) {
    if (array.length > 1) {
        for (var i = array.length - 1; i > 0; i--) {
            var j = Math.floor(Math.random() * (i + 1));
            var temp = array[i];
            array[i] = array[j];
            array[j] = temp;
        }
    }
    return array;
}

var AdPosition = function (postobj) {
    this._Position = $(postobj);
    this.arrRan = new Array();
    this.Length = this._Position.children().length;
    for (var i = 0; i < this.Length; i++) {
        this.arrRan[i] = i;
    }

    this.arrRan = shuffleArray(this.arrRan);
    this.currRan = -1;

    this.rotate = function () {
        var curr = this._Position.children()[this.arrRan[this.currRan]];
        var time = parseInt($(curr).attr('time')) * 1000;
        var _this = this;
        setTimeout(function () {
            _this.nextitem();
        }, time);
    };
    this.nextitem = function () {

        this.currRan++;
        if (this.currRan >= this.arrRan.length) {
            this.currRan = 0;
        }

        this._Position.children().css('display', 'none');
        //this._Position.append(this._Position.children().first());
        //this._Position.children().first().css('display', 'block');
        $(this._Position.children()[this.arrRan[this.currRan]]).show();

        this.rotate();
    };

    this.nextitem();
};

function detectmob() {
    if (navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ) {
        return true;
    }
    else {
        return false;
    }
}

function GenerateRandom(nlen) {
    
    var prevItem = null;
    var rand = Math.floor(Math.random() * nlen);
    if (localStorage) {
        prevItem = localStorage.RandomNum;
    }

    if(prevItem != null) {
         while (prevItem == rand) {
            rand = Math.floor(Math.random() * nlen);
        }
    }
    if (localStorage) {
        localStorage["RandomNum"] = rand;
    }
    
    return rand;
}

function showBannerFix() {

    var lnk = window.location.href;

    if (lnk == 'http://batdongsan.com.vn/') {
        var html = '<div id="bannerfix">';
        html += '<div stylex="position:fixed; bottom:0px; right:0px; z-index:100;"><div h="184" w="300" tp="6" tip="" bid="1024" link="" altsrc="http://file1.batdongsan.com.vn/file.0.jpg" src="http://file1.batdongsan.com.vn/file.301818.jpg" style="position: fixed; bottom: 0px; right: 0px; z-index: 100; clip: rect(0px, 300px, 184px, 0px);" time="10" class="aditem"><object id="obj' + bid + '" height="184px" border="0" width="300px" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" bannerid="1024" class="view-count"><param name="movie" value="http://file1.batdongsan.com.vn/file.301818.jpg"><param name="flashvars" value="link=http://batdongsan.com.vn/click.aspx?bannerid=1024"><param name="AllowScriptAccess" value="always"><param name="quality" value="High"><param name="wmode" value="transparent"><embed height="184px" width="300px" name="obj' + bid + '" flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=1024" src="http://file1.batdongsan.com.vn/file.301818.jpg" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" play="true" loop="true" wmode="transparent" allowscriptaccess="always"></object></div></div>';
        html += '</div>';
        $('body').append(html);
    }
}

function bannermax() {
    var wh = $("#bannerfix .aditem").attr("w");
    var ht = $("#bannerfix .aditem").attr("h");
    $("#bannerfix .aditem").css("clip", "rect(0px, " + wh + "px, " + ht + "px, 0px)");
}
function bannermin(height) {
    
    var h = isNaN(height) ? 35 : height;    
    var wh = $("#bannerfix .aditem").attr("w");
    var ht = $("#bannerfix .aditem").attr("h");
    var nht = ht - h;
    $("#bannerfix .aditem").css("clip", "rect( " + nht + "px, " + wh + "px, " + ht + "px, 0px)");
}

