<script type="text/javascript" src="<?php echo $this->baseUrl ?>/files/js/jGrowl/jquery.jgrowl.min.js"></script>
<style>
    .jGrowl {
        z-index: 9999;
        position: absolute
    }

    body > .jGrowl {
        position: fixed
    }

    .jGrowl.top-left {
        top: 0;
        left: 0
    }

    .jGrowl.top-right {
        top: 0;
        right: 0
    }

    .jGrowl.bottom-left {
        bottom: 0;
        left: 0
    }

    .jGrowl.bottom-right {
        right: 0;
        bottom: 0
    }

    .jGrowl.center {
        top: 50%;
        left: 50%;
        width: 0;
        margin-left: -170px
    }

    .center .jGrowl-closer, .center .jGrowl-notification {
        margin-right: auto;
        margin-left: auto
    }

    .jGrowl .jGrowl-closer, .jGrowl .jGrowl-notification {
        font-size: 12px;
        display: none;
        zoom: 1;
        width: 300px;
        padding: 10px 15px;
        white-space: normal;
        opacity: .95;
        filter: alpha(Opacity=95)
    }

    .jGrowl .jGrowl-notification:hover {
        opacity: 1;
        filter: alpha(Opacity=100)
    }

    .jGrowl .jGrowl-notification {
        min-height: 20px
    }

    .jGrowl .jGrowl-closer, .jGrowl .jGrowl-notification {
        margin: 10px
    }

    .jGrowl .jGrowl-notification .jGrowl-header {
        font-size: .85em;
        font-weight: 700
    }

    .jGrowl .jGrowl-notification .jGrowl-close {
        font-weight: 700;
        z-index: 99;
        float: right;
        cursor: pointer
    }

    .jGrowl .jGrowl-closer {
        font-weight: 700;
        cursor: pointer;
        text-align: center
    }

    /*.bg-red{*/
    /*color:#fff;border-color:#f33;background:#ff5757}*/
    /*}*/
    .success.bg-blue-alt {
        color: #fff;
        border-color: #65a6ff;
        background: #65a6ff;
    }

    .failt.bg-blue-alt {
        color: #fff;
        border-color: #f33;
        background: #ff5757
    }
</style>
<!--<link rel="stylesheet" type="text/css" href="http://demo.agileui.com/bratilius-theme-package/assets-minified/all-demo.css">-->
<script>
    function setCookie(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value = value + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
        //c/onsole.log(c_name + "=" + c_value + " ;path=/");
        document.cookie = c_name + "=" + c_value + " ;path=/";
    }
    function getCookie(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
            c_value = null;
        }
        else {
            c_start = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length;
            }
            c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
    }
</script>
<div id="MainContent"></div>
<div class="div_2col">

<div id="TopRightMainContent" class="col_cent" style="width: 968px;">

    <div class="news-list-border-background">
        <ul class="news-list-thumb">
            <?php foreach ($news as $_key => $_vale): ?>
                <?php if ($_key < 6): ?>
                    <li style="display: <?php echo $_key == 0 ? "block" : "none" ?>;" id="li_<?php echo $_key ?>">
                        <a href="<?php echo $_vale->url ?>" title="<?php echo $_vale->title ?>">
                            <img class="imagethumbnail" alt="<?php echo $_vale->title ?>"
                                 src="<?php echo $_vale->getImageUrl() ?>" style="float:left;">
                        </a>

                        <div class="thumb-title">
                            <a href="<?php echo $_vale->url ?>"
                               title="<?php echo $_vale->title ?>"><?php echo $_vale->title ?></a>
                        </div>
                        <div class="thumb-summary"><?php echo $_vale->desc ?></div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>

        </ul>

        <div style="clear: both;">
        </div>
        <div class="news-slide-show-item">
            <div class="news-list"
                 style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 185px;">
                <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 407px; top: -185px;">
                    <?php foreach ($news as $_ky => $_val): ?>
                        <?php if ($_key < 6): ?>
                            <li class="li_<?php echo $_ky ?>"
                                style="overflow: hidden; float: none; width: 968px; height: 20px;">
                                <a href="<?php echo $_val->url ?>"
                                   title="<?php echo $_val->title ?>"><?php echo $_val->title ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        if ($("#news-list-content").html() != "") {
            $(function () {
                var i = 0;
                var len = <?php echo count($news) < 7 ? count($news) - 1 : 5 ?>;
                var first = true;

                var o = $(".news-list").jCarouselLite({
                    vertical: true,
                    hoverPause: false,
                    visible: len,
                    start: 0,
                    warp: "circle",
                    auto: 1,
                    speed: 1000,
                    beforeStart: function (a) {
                        if (!first)
                            $(a).parent().delay(1000);
                    },
                    afterEnd: function (a) {
                        if (first) {
                            first = false;
                        }
                        else {
                            $("#li_" + i).css("display", "none");
                            i++;
                            if (i > len) i = 0;
                            $("#li_" + i).css("display", "block");
                        }
                        $(a).parent().delay(6500);
                    }
                });
            });
        }
    </script>


    <div style="clear:both;"></div>
    <!--//Modules/News/ViewerNews/NewsSlideShow/SlideshowNews.ascx--></div>
<div id="MiddleBanner">
    <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_MAIN_CONTENT" stylex="" hasshare="True"
         hasnotshare="True">
        <div class="adshared">
            <div class="adshareditem aditem" time="10" style="display: none;"
                 src="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228091714-TruongNM_TrangTT2_150226_780x90.swf"
                 altsrc="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228091727-7d88.jpg"
                 link="http://skycenter.com.vn/" bid="2610" tip="" tp="6" w="780" h="90">
                <center>
                    <object id="obj2610" width="780px" border="0" height="90px" class="view-count" bannerid="2610"
                            codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                            classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                        <param
                            value="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228091714-TruongNM_TrangTT2_150226_780x90.swf"
                            name="movie">
                        <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2610" name="flashvars">
                        <param value="always" name="AllowScriptAccess">
                        <param value="High" name="quality">
                        <param value="transparent" name="wmode">
                        <embed name="obj2610" width="780px" height="90px" allowscriptaccess="always" wmode="transparent"
                               loop="true" play="true" type="application/x-shockwave-flash"
                               pluginspage="http://www.macromedia.com/go/getflashplayer"
                               src="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228091714-TruongNM_TrangTT2_150226_780x90.swf"
                               flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2610">
                    </object>
                </center>
            </div>
            <div class="adshareditem aditem" time="10" style="display: block;"
                 src="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081057-TruongNM_NienPTN_150227_780x90.swf"
                 altsrc="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081106-739f.jpg"
                 link="http://sunviewtown.vn/tin-tuc--su-kien/chuong-trinh-vui-xuan-cung-sunview-town.html" bid="2613"
                 tip="" tp="6" w="780" h="90">
                <center>
                    <object id="obj2613" width="780px" border="0" height="90px" class="view-count" bannerid="2613"
                            codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                            classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                        <param
                            value="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081057-TruongNM_NienPTN_150227_780x90.swf"
                            name="movie">
                        <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2613" name="flashvars">
                        <param value="always" name="AllowScriptAccess">
                        <param value="High" name="quality">
                        <param value="transparent" name="wmode">
                        <embed name="obj2613" width="780px" height="90px" allowscriptaccess="always" wmode="transparent"
                               loop="true" play="true" type="application/x-shockwave-flash"
                               pluginspage="http://www.macromedia.com/go/getflashplayer"
                               src="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081057-TruongNM_NienPTN_150227_780x90.swf"
                               flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2613">
                    </object>
                </center>
            </div>
        </div>
    </div>

    <div style="clear:both;"></div>
    <!--//Modules/Banner/Preview/Horizontal/BannerPreviewHorizontal.ascx--></div>
<div class="t_left">
    <div id="MiddleLeftMainContent">

        <div>
            <div id="ctl38_HeaderContainer" class="tit_l">
                <h2><a><span style="white-space:nowrap;">Giới thiệu dự án</span></a></h2>
            </div>
            <div style="clear: both;"></div>
            <div class="line_gr"></div>
            <div id="ctl38_BodyContainer">

                <div class="product-list tin-danh-cho-ban" style="padding-top: 10px;overflow: hidden;">
                    <style>
                        #header-product_list li {
                            background-color: #006478;
                            color: #fff;
                            cursor: pointer;
                        }

                        #header-product_list li.active, #header-product_list li:hover {
                            border: 1px solid #006478;
                            color: #000;
                            background-color: transparent;
                        }

                        .product-list.tin-danh-cho-ban img {
                            max-width: 100%;
                            height: auto;
                            display: block;
                            margin: 0 auto;
                        }
                        .product-list.tin-danh-cho-ban span{
                            color: #006478;
                        }
                        .product-list.tin-danh-cho-ban h3 span strong{
                            font-size: medium;
                        }
                        .product-list.tin-danh-cho-ban ul {
                            list-style: none;
                        }
                    </style>
                    <ul id="header-product_list"
                        style="list-style: none;text-align: center;height: 55px;display: block;padding-left: 5px;margin-bottom: 10px;">
                        <li project="overview-project" class="detail-project active"
                            style="width: 11%;display: inline-block;clear: both;height: 55px;float: left;border-radius: 10px;line-height: 28px;box-shadow: 1px 1px 1px #000;">
                            Giới thiệu chung
                        </li>
                        <li project="boss-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;line-height: 50px;border-radius: 10px;box-shadow: 1px 1px 1px #000;">
                            Chủ đầu tư
                        </li>
                        <li project="desgin-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;box-shadow: 1px 1px 1px #000;line-height: 28px">
                            Mặt bằng và thiết kế căn hộ
                        </li>
                        <li project="quote-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">
                            Bảng giá
                        </li>
                        <li project="process-pay-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 28px;box-shadow: 1px 1px 1px #000;">
                            Tiến độ thanh toán
                        </li>
                        <li project="bonus-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">
                            Ưu đãi
                        </li>
                        <li project="loan-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;box-shadow: 1px 1px 1px #000;line-height: 28px;">
                            Hỗ trợ vay vốn ngân hàng
                        </li>
                        <li project="process-submit-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;line-height: 28px;border-radius: 10px;box-shadow: 1px 1px 1px #000;">
                            Tiến độ thi công
                        </li>
                        <li project="contract-project" class="detail-project"
                            style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">
                            Hợp đồng
                        </li>
                    </ul>
                    <hr style="width: 80%;">
                    <div style="clear:both;margin-bottom: 10px;"></div>

                    <div id="infor-project" style="margin-top:5px;height:720px;overflow:auto;margin-left: 10px;"
                         class="customeScrollbar mCustomScrollbar _mCS_1">
                        <div class="infor-project" id="overview-project"
                             style="display: block;clear:both;margin: 0 5px 10px;"><?php echo $project_home->overview ?></div>
                        <div class="infor-project" id="boss-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->chu_dau_tu ?></div>
                        <div class="infor-project" id="desgin-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->thiet_ke ?></div>
                        <div class="infor-project" id="quote-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->bang_gia ?></div>
                        <div class="infor-project" id="process-pay-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->tien_do_thanh_toan ?></div>
                        <div class="infor-project" id="bonus-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->uu_dai ?></div>
                        <div class="infor-project" id="loan-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->ho_tro_vay_von ?></div>
                        <div class="infor-project" id="process-submit-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->tien_do ?></div>
                        <div class="infor-project" id="contract-project"
                             style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->hop_dong ?></div>
                    </div>
                </div>

                <div id="om-s2xymi2yl8-lightbox" class="optin-monster-overlay"
                     style="position: fixed; z-index: 7371832; top: 0px; left: 0px; zoom: 1; width: 100%; height: 100%; margin: 0px; padding: 0px;display: none;">
                    <script type="text/javascript"
                            src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
                    <style type="text/css" class="om-theme-case-study-styles">.optin-monster-success-message {
                            font-size: 21px;
                            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                            color: #282828;
                            font-weight: 300;
                            text-align: center;
                            margin: 0 auto;
                        }

                        .optin-monster-success-overlay .om-success-close {
                            font-size: 32px !important;
                            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif !important;
                            color: #282828 !important;
                            font-weight: 300 !important;
                            position: absolute !important;
                            top: 0px !important;
                            right: 10px !important;
                            background: none !important;
                            text-decoration: none !important;
                            width: auto !important;
                            height: auto !important;
                            display: block !important;
                            line-height: 32px !important;
                            padding: 0 !important;
                        }

                        .om-helper-field {
                            display: none !important;
                            visibility: hidden !important;
                            opacity: 0 !important;
                            height: 0 !important;
                            line-height: 0 !important;
                        }

                        html div#om-s2xymi2yl8-lightbox * {
                            box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                        }

                        html div#om-s2xymi2yl8-lightbox {
                            background: none;
                            border: 0;
                            border-radius: 0;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            float: none;
                            -webkit-font-smoothing: antialiased;
                            -moz-osx-font-smoothing: grayscale;
                            height: auto;
                            letter-spacing: normal;
                            outline: none;
                            position: static;
                            text-decoration: none;
                            text-indent: 0;
                            text-shadow: none;
                            text-transform: none;
                            width: auto;
                            visibility: visible;
                            overflow: visible;
                            margin: 0;
                            padding: 0;
                            line-height: 1;
                            box-sizing: border-box;
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            -webkit-box-shadow: none;
                            -moz-box-shadow: none;
                            -ms-box-shadow: none;
                            -o-box-shadow: none;
                            box-shadow: none;
                            -webkit-appearance: none;
                        }

                        html div#om-s2xymi2yl8-lightbox {
                            background: rgb(0, 0, 0);
                            background: rgba(0, 0, 0, .7);
                            font-family: helvetica, arial, sans-serif;
                            -moz-osx-font-smoothing: grayscale;
                            -webkit-font-smoothing: antialiased;
                            line-height: 1;
                            width: 100%;
                            height: 100%;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-clearfix {
                            clear: both;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-clearfix:after {
                            clear: both;
                            content: ".";
                            display: block;
                            height: 0;
                            line-height: 0;
                            overflow: auto;
                            visibility: hidden;
                            zoom: 1;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin {
                            background: #fff;
                            display: none;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            min-height: 175px;
                            max-width: 700px;
                            width: 100%;
                            z-index: 734626274;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-wrap {
                            position: relative;
                            height: 100%;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-close {
                            position: absolute;
                            top: -12px;
                            right: -12px;
                            text-decoration: none !important;
                            display: block;
                            width: 35px;
                            height: 35px;
                            background: url("http://timescityminhkhai.com/wp-content/plugins/optin-monster/assets/css/images/close.png") no-repeat scroll 0 0;
                            z-index: 1500;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-bar {
                            margin-bottom: 10px;
                            clear: both;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-bar {
                            float: left;
                            width: 25%;
                            height: 11px;
                            display: block;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-red-bar {
                            background-color: #ef3e36;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-green-bar {
                            background-color: #abb92e;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-orange-bar {
                            background-color: #f57826;
                        }

                        html div#om-s2xymi2yl8-lightbox .om-blue-bar {
                            background-color: #17b4e9;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-header {
                            min-height: 30px;
                            padding: 15px;
                            width: 100%;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-title {
                            font-size: 24px;
                            color: #484848;
                            width: 100%;
                            margin-bottom: 15px;
                            text-shadow: 0 1px #fff;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-content {
                            padding: 15px;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-left {
                            float: left;
                            max-width: 280px;
                            width: 100%;
                            position: relative;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-image-container {
                            position: relative;
                            max-width: 280px;
                            max-height: 245px;
                            margin: 0 auto;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-image-container img {
                            display: block;
                            margin: 0 auto;
                            text-align: center;
                            height: auto;
                            max-width: 100%;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-right {
                            float: right;
                            max-width: 370px;
                            width: 100%;
                            background-color: #dadada;
                            margin-right: -15px;
                            padding: 20px;
                            position: relative;
                        }

                        html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-arrow {
                            position: absolute;
                            width: 49px;
                            height: 56px;
                            left: -40px;
                            top: -40px;
                        }

                        html div#om-s2xymi2yl8-lightbox label {
                            color: #333;
                        }

                        html div#om-s2xymi2yl8-lightbox input, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-name, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-email {
                            background-color: #fff;
                            width: 100%;
                            border: 1px solid #ccc;
                            font-size: 16px;
                            line-height: 24px;
                            padding: 10px 6px;
                            overflow: hidden;
                            outline: none;
                            margin: 0 0 15px;
                            vertical-align: middle;
                            height: 46px;
                        }

                        html div#om-s2xymi2yl8-lightbox input[type=submit], html div#om-s2xymi2yl8-lightbox button, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-submit {
                            background: #484848;
                            border: 1px solid #484848;
                            width: 100%;
                            color: #fff;
                            font-size: 20px;
                            padding: 12px 6px;
                            line-height: 28px;
                            text-align: center;
                            vertical-align: middle;
                            cursor: pointer;
                            margin: 0;
                            height: 54px;
                        }

                        html div#om-s2xymi2yl8-lightbox input[type=checkbox], html div#om-s2xymi2yl8-lightbox input[type=radio] {
                            -webkit-appearance: checkbox;
                            width: auto;
                            outline: invert none medium;
                            padding: 0;
                            margin: 0;
                        }

                        @media (max-width: 700px) {
                            html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin[style] {
                                width: 100%;
                                position: relative;
                            }

                            html div#om-s2xymi2yl8-lightbox .om-close {
                                right: 9px;
                            }

                            html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-left, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-right, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-name, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-email, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-submit, html div#om-s2xymi2yl8-lightbox .om-has-email #om-lightbox-case-study-optin-email {
                                float: none;
                                width: 100%;
                                max-width: 100%;
                            }

                            html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-left, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-name, html div#om-s2xymi2yl8-lightbox #om-lightbox-case-study-optin-email {
                                margin-bottom: 15px;
                            }
                        }

                        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                            html div#om-s2xymi2yl8-lightbox .om-close {

                            background-image:

                        url("http://timescityminhkhai.com/wp-content/plugins/optin-monster/assets/css/images/<a class="__cf_email__" href="/cdn-cgi/l/email-protection" data-cfemail="c7a4aba8b4a287f5bfe9b7a9a0">[email&#160;protected]</a><script cf-hash='f9e31' type="text/javascript">
                        /* <![CDATA[ */!function() {
                            try {

                            var t

                        ="currentScript"in document? document.currentScript:function() {
                                        for(var t = document . getElementsByTagName("script"), e = t . length;
                                            e--;
                                        ) if(t [ e ] . getAttribute("cf-hash")) return t [ e ]
                                        }

                        ();if(t&

                        &t.previousSibling

                        ) {
                            var e, r, n, i, c = t . previousSibling, a = c . getAttribute("data-cfemail");if(a

                        ) {
                        for(e="", r=parseInt(a.substr(0,2),16), n=2;
                            a . length-n;
                            n +=2)i=parseInt(a.substr(n,2),16)^r, e+=String.fromCharCode(i);
                            e = document . createTextNode(e), c . parentNode . replaceChild(e, c)
                        }
                        }

                        }
                        catch
                        (
                        u

                        )
                        {
                        }
                        }
                        (
                        )
                        ;
                        /* ]]> */
                        <
                        /
                        script >

                        ");background-size: 35px 35px;}}</style>
                    <style type="text/css" id="om-effects-lightbox-case-study"
                           class="om-effect-output">@-webkit-keyframes slideInRight {
                                                        0% {
                                                            opacity: 0;
                                                            -webkit-transform: translateX(2000px);
                                                            transform: translateX(2000px)
                                                        }
                                                        100% {
                                                            -webkit-transform: translateX(0);
                                                            transform: translateX(0)
                                                        }
                                                    }

                        @keyframes slideInRight {
                            0% {
                                opacity: 0;
                                -webkit-transform: translateX(2000px);
                                -ms-transform: translateX(2000px);
                                transform: translateX(2000px)
                            }
                            100% {
                                -webkit-transform: translateX(0);
                                -ms-transform: translateX(0);
                                transform: translateX(0)
                            }
                        }

                        #om-lightbox-case-study-optin {
                            -webkit-animation-duration: 1s;
                            animation-duration: 1s;
                            -webkit-animation-name: slideInRight;
                            animation-name: slideInRight;
                        }</style>
                    <div id="om-lightbox-case-study-optin"
                         class="om-lightbox-case-study om-clearfix om-theme-case-study om-custom-html-form"
                         style="display: block; top: 12%; left: 25%;">
                        <div id="om-lightbox-case-study-optin-wrap" class="om-clearfix"><a
                                onclick="$('#om-s2xymi2yl8-lightbox').hide()" class="om-close" title="Close"></a>

                            <div id="om-lightbox-case-study-optin-bar" class="om-clearfix" style="background-color: #006478;height: 15px;"></div>
                            <div id="om-lightbox-case-study-header" class="om-clearfix">
                                <div id="om-lightbox-case-study-optin-title" data-om-action="editable"
                                     data-om-field="title"
                                     style="color:#484848;font-family:Bree Serif;font-size:32px;text-align:center;">
                                    <span style="color:#FF8C00;"><span style="font-size:14px;"><span
                                                style="font-weight:bold;"><span style="font-size:18px;">
                                                    <span style="font-family:roboto; font-size: 28px;">QUÝ KHÁCH QUAN TÂM DỰ ÁN?&#8203;</span></span></span></span></span>

                                    <p><br>
                <span style="color:#669933;"><span style="font-size:26px;"><span style="font-family:roboto slab;"><span
                                style="font-weight:bold;">LIÊN HỆ ĐẶT CHỖ NGAY ĐỂ CHỌN ĐƯỢC<br>
                CĂN TẦNG NHƯ Ý</span></span></span></span></p>
                                </div>
                            </div>
                            <div id="om-lightbox-case-study-content" class="om-clearfix">
                                <div id="om-lightbox-case-study-left">
                                    <div id="om-lightbox-case-study-optin-image-container"
                                         class="om-image-container om-clearfix"><img
                                            class="optin-monster-image optin-monster-image-lightbox-case-study"
                                            src="http://timescityminhkhai.com/wp-content/uploads/sites/17/2014/10/Chung-cu-Ecopark.jpg"
                                            alt="Chung cư Rừng Cọ Ecopark" title="Chung cư Rừng Cọ Ecopark"></div>
                                </div>
                                <div id="om-lightbox-case-study-right">

                                    <form id="form_first_register" action="/web/page/registered" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <input type="hidden" name="__vtrftk" value="sid:a6ec68deefb5651e2c563eedf2fa57bce887495c,1426837912">
                                        <input type="hidden" name="publicid" value="54ff6a002afb57390dbf22d0c5084080">
                                        <input type="hidden" name="name" value="timescityminhkhai.com">
                                        <input type="hidden" name="VTIGER_RECAPTCHA_PUBLIC_KEY"
                                               value="RECAPTCHA PUBLIC KEY FOR THIS DOMAIN">
                                        <table style="width:100%;border:none;">
                                            <tbody>
                                            <tr>

                                                <td>
                                                    <input type="text" placeholder="Họ tên*" name="name" value=""
                                                           required=""></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <input type="text" placeholder="Điện thoại*" name="phone" value=""
                                                           required=""></td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <input type="email" placeholder="Địa chỉ email" name="email"
                                                           value=""></td>
                                            </tr>
                                            <tr style="display:none">

                                                <td>
                                                    <select name="leadsource" hidden="">
                                                        <option value="">Select Value</option>

                                                        <option value="Website" selected="">Website</option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr style="display:none">

                                                <td>
                                                    <select name="label:Product_Project" hidden="">
                                                        <option value="">Select Value</option>

                                                        <option value="Times City Minh Khai" selected="">Times City Minh
                                                            Khai
                                                        </option>
                                                    </select>

                                                </td>
                                            </tr>
                                            <tr style="display:none">

                                                <td>
                                                    <input type="hidden" placeholder="Campaign URL"
                                                           name="label:Campaign_URL" value="timescityminhkhai.com"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" value="ĐĂNG KÝ NHẬN THÔNG TIN">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <input type="email" name="email" value="" class="om-helper-field"><input type="text"
                                                                                                 name="website" value=""
                                                                                                 class="om-helper-field">
                    </div>
                    <script type="text/javascript">jQuery(document).ready(function ($) {
                            WebFont.load({google: {families: ['Open+Sans%7CRoboto%7CRoboto+Slab%7CBree+Serif']}});
                        });</script>
                </div>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#header-product_list li.detail-project').click(function () {
                            $("#infor-project .mCSB_container").css('top', '0');
                            $("#infor-project .mCSB_dragger").css('top', '0');
                            $('#header-product_list li.detail-project').removeClass('active');
                            $(this).addClass('active');
                            $('.infor-project').hide();
                            $('#' + $(this).attr('project')).show();
//            alert($(this).attr('project'));
                        })
                    });
                </script>
            </div>

        </div>
        <div style="clear:both;margin-bottom:5px;"></div>
        <div style="clear:both;"></div>
        <!--//Modules/HtmlGeneric/View.ascx--></div>
</div>
<div id="MiddleRightMainContent" class="t_right">
    <?php if (count($project) > 0): ?>
        <!--//Modules/Banner/Preview/MainRight/BannerPreviewMainRight.ascx-->
        <div class="container-common">
            <div id="ctl44_HeaderContainer" class="box-header">
                <div class="name_tit" align="center">
                    <h4>Dự án nổi bật</h4>
                </div>
            </div>
            <div id="ctl44_BodyContainer" class="bor_box">
                <div style="text-align: center; margin-top:5px;height:365px;overflow:auto;"
                     class="customeScrollbar mCustomScrollbar _mCS_1">
                    <div class="mCustomScrollBox mCS-light" id="mCSB_1"
                         style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                        <div class="mCSB_container" style="position: relative; top: 0px;">
                            <?php foreach ($project as $_key => $_val): ?>
                                <div>
                                    <a href="<?php echo $_val->url ?>" title="<?php echo $_val->name ?>">
                                        <img src="<?php echo $_val->getImageUrl() ?>" width="156" height="100"
                                             alt="<?php echo $_val->name ?>">
                                    </a>
                                </div>
                                <div class="prj_vip">
                                    <a href="<?php echo $_val->name ?>" title="<?php echo $_val->name ?>">
                                        <?php echo $_val->name ?>
                                    </a>
                                </div>
                                <div class="line_separate">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="mCSB_scrollTools" style="position: absolute; display: block;">
                            <div class="mCSB_draggerContainer">
                                <div class="mCSB_draggerRail"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
            <div id="ctl44_FooterContainer">
            </div>
        </div>
        <div style="clear: both; margin-bottom: 10px;"></div>
    <?php endif; ?>
    <div class="container-common">
        <div id="ctl36_HeaderContainer" class="box-header">
            <div class="name_tit" align="center">
                <h3 style="color: White;">
                    Tiêu điểm tuần qua</h3>
            </div>
        </div>
        <div id="ctl36_BodyContainer" class="bor_box">

            <div class="list">
                <ul>
                    <?php foreach ($news_viewest as $_key => $_val): ?>
                        <li>
                            <a class="controls-view-date-contents-link" title="<?php echo $_val->title ?>"
                               href="<?php echo $_val->url ?>"><?php echo $_val->title ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="ctl36_FooterContainer">
        </div>
    </div>
    <div style="clear: both; margin-bottom: 10px;">
    </div>
    <!--//Modules/News/ViewerNews/NewsTopList/ViewerList.ascx-->

    <?php //if(count($news_rule) > 0):?>
    <!--<div class="container-common">-->
    <!--    <div id="ctl41_HeaderContainer" class="box-header">-->
    <!--        <div class="name_tit" align="center">-->
    <!--            <h3 style="color: White;">Thông tin quy hoạch</h3>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div id="ctl41_BodyContainer" class="bor_box">-->
    <!---->
    <!--        <div class="list">-->
    <!--            <ul>-->
    <!--                --><?php //foreach($news_rule as $_key => $_val):?>
    <!--                <li>-->
    <!--                    <a class="controls-view-date-contents-link" title="-->
    <?php //echo $_val->title?><!--" href="--><?php //echo $_val->url?><!--">-->
    <!--                        --><?php //echo $_val->title?>
    <!--                    </a>-->
    <!--                </li>-->
    <!--                --><?php //endforeach?>
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div id="ctl41_FooterContainer">-->
    <!--    </div>-->
    <!--</div>-->
    <?php //endif;?>

    <div style="clear: both; margin-bottom: 10px;">
    </div>
    <!--//Modules/News/ViewerNews/NewsTopList/ViewerList.ascx-->
    <?php if (count($pt) > 0): ?>
        <div class="container-common">
            <div id="ctl47_HeaderContainer" class="box-header">
                <div class="name_tit" align="center">
                    <h3 style="color: White;">Phong thủy nhà bạn</h3>
                </div>
            </div>
            <div id="ctl47_BodyContainer" class="bor_box">
                <div style="text-align: center; padding-top: 5px;">
                </div>
                <div class="list">
                    <div class="aligncenter"><a href="<?php echo $pt[0]->url ?>"><img style="width: 100%"
                                                                                      src="<?php echo $pt[0]->getImageUrl() ?>"
                                                                                      alt="<?php echo $pt[0]->title ?>"></a>
                    </div>
                    <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                        <a href="<?php echo $pt[0]->url ?>"
                           style="color:  #006478 !important; font-weight: bold;"><?php echo $pt[0]->title ?></a></div>
                    <ul>
                        <?php foreach ($pt as $_key => $_val): ?>
                            <?php if ($_key != 0): ?>
                                <li>
                                    <a href="<?php echo $_val->url ?>"
                                       title="<?php echo $_val->title ?>"><?php echo $_val->title ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div id="ctl47_FooterContainer">
            </div>
        </div>
    <?php endif; ?>
    <div style="clear: both; margin-bottom: 10px;">
    </div>
    <!--//Modules/News/ViewerNews/ViewerSubjects/NewsBySubject.ascx-->
    <?php //if(count($architecture) > 0):?>
    <!--<div class="container-common">-->
    <!--    <div id="ctl49_HeaderContainer" class="box-header">-->
    <!--        <div class="name_tit" align="center">-->
    <!--            <h4>TƯ VẤN NỘI - NGOẠI THẤT</h4>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div id="ctl49_BodyContainer" class="bor_box">-->
    <!---->
    <!--        <div class="tuvan">-->
    <!--            <img src="-->
    <?php //echo Yii::app()->baseUrl?><!--/themes/web/files/images/icon_user.png" alt="">-->
    <!---->
    <!--            <p>-->
    <!--                <strong>Tư vấn nội - ngoại thất từ chuyên gia</strong>-->
    <!--            </p>-->
    <!---->
    <!--            <div>&nbsp;</div>-->
    <!--        </div>-->
    <!--        <div class="list">-->
    <!--            <ul>-->
    <!--                --><?php //foreach($architecture as $_key => $_val):?>
    <!--                    <li>-->
    <!--                        <a href="--><?php //echo $_val->url?><!--" title="-->
    <?php //echo $_val->title?><!--">--><?php //echo $_val->title?><!--</a>-->
    <!--                    </li>-->
    <!--                --><?php //endforeach;?>
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div id="ctl49_FooterContainer">-->
    <!--    </div>-->
    <!--</div>-->
    <?php //endif;?>

    <!--//Modules/HtmlGeneric/View.ascx--></div>
<div class="clear">
</div>
</div>
<div id="MainRight" class="col_right">
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
    <div class="adshared">
        <div class="adshareditem aditem" time="10" style="margin-bottom: 10px;"
             src="http://file4.batdongsan.com.vn/2015/02/13/V5fQl2m0/20150213143804-021315_ThuanNQ_210x300.swf"
             altsrc="http://file4.batdongsan.com.vn/2015/02/13/V5fQl2m0/20150213143826-b418.jpg"
             link="http://www.daiphuc.com.vn/Project_Duong-Hong-Garden-House_C83_D41_T0.htm" bid="2289" tip="" tp="6"
             w="210" h="300">
            <object id="obj2289" width="210px" border="0" height="300px" class="view-count" bannerid="2289"
                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                    classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                <param
                    value="http://file4.batdongsan.com.vn/2015/02/13/V5fQl2m0/20150213143804-021315_ThuanNQ_210x300.swf"
                    name="movie">
                <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2289" name="flashvars">
                <param value="always" name="AllowScriptAccess">
                <param value="High" name="quality">
                <param value="transparent" name="wmode">
                <embed name="obj2289" width="210px" height="300px" allowscriptaccess="always" wmode="transparent"
                       loop="true" play="true" type="application/x-shockwave-flash"
                       pluginspage="http://www.macromedia.com/go/getflashplayer"
                       src="http://file4.batdongsan.com.vn/2015/02/13/V5fQl2m0/20150213143804-021315_ThuanNQ_210x300.swf"
                       flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2289">
            </object>
        </div>
        <div class="adshareditem aditem" time="10" style="margin-bottom: 10px; display: none;"
             src="http://file4.batdongsan.com.vn/2015/02/26/V5fQl2m0/20150226152614-022615_ThuanNQ_210x300.swf"
             altsrc="http://file4.batdongsan.com.vn/2015/02/26/V5fQl2m0/20150226152635-3098.jpg"
             link="http://www.daiphuc.com.vn/Cac-vi-tri-tuyen-dung_C59.htm" bid="2606" tip="" tp="6" w="210" h="300">
            <object id="obj2606" width="210px" border="0" height="300px" class="view-count" bannerid="2606"
                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                    classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                <param
                    value="http://file4.batdongsan.com.vn/2015/02/26/V5fQl2m0/20150226152614-022615_ThuanNQ_210x300.swf"
                    name="movie">
                <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2606" name="flashvars">
                <param value="always" name="AllowScriptAccess">
                <param value="High" name="quality">
                <param value="transparent" name="wmode">
                <embed name="obj2606" width="210px" height="300px" allowscriptaccess="always" wmode="transparent"
                       loop="true" play="true" type="application/x-shockwave-flash"
                       pluginspage="http://www.macromedia.com/go/getflashplayer"
                       src="http://file4.batdongsan.com.vn/2015/02/26/V5fQl2m0/20150226152614-022615_ThuanNQ_210x300.swf"
                       flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2606">
            </object>
        </div>
    </div>
    <div class="adshared">
        <div class="adshareditem aditem" time="10" style="margin-bottom: 10px;display: block"
             src="http://file4.batdongsan.com.vn/2015/02/25/V5fQl2m0/20150225173548-TruongNM_PhuongBTL_150224_210x150.swf"
             altsrc="http://file4.batdongsan.com.vn/2015/02/25/V5fQl2m0/20150225173601-b707.jpg"
             link="http://www.vietdo.vn/thong-bao-tuyen-dung-va-dao-tao-n51" bid="2603" tip="" tp="6" w="210" h="150">
            <object id="obj2603" width="210px" border="0" height="150px" class="view-count" bannerid="2603"
                    codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                    classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                <param
                    value="http://file4.batdongsan.com.vn/2015/02/25/V5fQl2m0/20150225173548-TruongNM_PhuongBTL_150224_210x150.swf"
                    name="movie">
                <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2603" name="flashvars">
                <param value="always" name="AllowScriptAccess">
                <param value="High" name="quality">
                <param value="transparent" name="wmode">
                <embed name="obj2603" width="210px" height="150px" allowscriptaccess="always" wmode="transparent"
                       loop="true" play="true" type="application/x-shockwave-flash"
                       pluginspage="http://www.macromedia.com/go/getflashplayer"
                       src="http://file4.batdongsan.com.vn/2015/02/25/V5fQl2m0/20150225173548-TruongNM_PhuongBTL_150224_210x150.swf"
                       flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2603">
            </object>
        </div>
    </div>
</div>

<div style="clear:both;"></div>

<div class="container-common">
    <div id="ctl49_HeaderContainer" class="box-header" style="height: auto;">
        <div class="name_tit" align="center" style="margin-bottom: 0;">
            <h4>Đăng ký nhận thông tin dự án</h4>
        </div>
    </div>
    <div id="ctl49_BodyContainer" class="bor_box">
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;">
            <input id="customer-name" type="text" placeholder="HỌ VÀ TÊN"
                   style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid  #006478;padding: 5px;">
            <span id="error-customer-name"
                  style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Họ tên không được để trống</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;">
            <input id="customer-phone" type="text" onkeydown="inputNumeric(event)" placeholder="SỐ ĐIỆN THOẠI"
                   style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid  #006478;padding: 5px;">
            <span id="error-customer-phone"
                  style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Số điện thoại không hợp lệ</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;">
            <input id="customer-email" type="text" placeholder="ĐỊA CHỈ EMAIL"
                   style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid  #006478;padding: 5px;">
            <span id="error-customer-email"
                  style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Email không hợp lệ</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;"><span
                id="submit_customer_registered" onclick="customer_registered()"
                style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid  #006478;padding: 2px;background-color:  #006478;color: #fff;font-weight: bold;text-align: center;cursor: pointer;">ĐĂNG KÝ</span>
        </div>
    </div>
    <div id="ctl49_FooterContainer">
    </div>
</div>

<script>

    function myGrowl(msg, type, title) {
        msg = typeof msg !== 'undefined' ? msg : 'Thống báo';
        type = typeof type !== 'undefined' ? type : 'success';
        title = typeof title !== 'undefined' ? title : '';

        $.jGrowl(msg, {
            header: title,
            position: "bottom-right",
            life: 10000,
            closerTemplate: "Đóng tất cả",
            group: type,
            theme: "bg-blue-alt",
//            themeState: "my-growl-state",
            corners: "5px"
        });
    }

    $("#customer-name").focus(function () {
        $('#error-customer-name').hide();
    });

    $("#customer-phone").focus(function () {
        $('#error-customer-phone').hide();
    });

    $("#customer-email").focus(function () {
        $('#error-customer-email').hide();
    });

    var test_submit = 0;

    function customer_registered() {
        if (test_submit) return false;
        $('#submit_customer_registered').html('Đang xử lý<img src="/files/img/loader.gif" style="height: 10px;padding-left: 4px;">');

        var name = $('#customer-name').val(),
            phone = $('#customer-phone').val(),
            email = $('#customer-email').val();

        if (name == "") {
            $('#error-customer-name').show();
            return false;
        }
        else if (phone.length > 12 || phone.length < 10) {
            $('#error-customer-phone').show();
            return false;
        }
        else if (!validateEmail(email)) {
            $('#error-customer-email').show();
            return false;
        }
        else {
            test_submit = 1;
            $.post("/web/page/registered", {name: name, phone: phone, email: email})
                .done(function (data) {
                    if (data == 0) {
                        test_submit = 0;
                        myGrowl('Bạn đăng ký bị lỗi ! Vui lòng thử lại', 'failt');
                        $('#submit_customer_registered').html('Đăng ký lại');
                    } else {
                        $('#submit_customer_registered').html('Đăng ký thành công');
                        myGrowl('Bạn đã đăng ký thành công');
                        $('#customer-name').val('');
                        $('#customer-phone').val('');
                        $('#customer-email').val('');
                    }
                });
        }

    }

    function validateEmail(email) {
        var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
        var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;
        if (email == "" || !emailFilter.test(email) || email.match(illegalChars)) {
            return false;
        }
        return true;
    }

    function inputNumeric(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        //key = String.fromCharCode( key );
        var regex = /[0-9]/;
        /*if( !regex.test(String.fromCharCode(key)) && (key != 37 && key != 39 &&
         key != 8 && key != 46))*/
        var keyExplode = [8, 43, 37, 39, 46, 9, 35, 36];
        if (!regex.test(String.fromCharCode(key)) && keyExplode.indexOf(key) < 0) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

<div style="clear: both; margin-bottom: 10px;">
</div>

<iframe style="width: 100%;height: auto" src="https://www.youtube.com/embed/poAQThYmzvU?rel=0&autoplay=1"
        frameborder="0" allowfullscreen></iframe>

<div style="clear: both; margin-bottom: 10px;">
</div>
<div class="container-common" style="margin-bottom: 10px;">
    <div id="ctl44_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <h4>Hỗ trợ trực tuyến</h4>
        </div>
    </div>
    <div id="ctl44_BodyContainer" class="bor_box">
        <div class="content">
            <div id="suport">
                <div class="widget-content">
                    <center><h3 style="font-size: 14px;padding-top: 20px;">Hot line</h3></center>
                    <center><span
                            style="font-weight: bold;color:  #006478;">0976.078.988 - 0936.404.616 - 0986.616.445</span>
                    </center>
                    <!--                        <center><a href="Skype:utlethi_hua?chat"> <img src="https://images-blogger-opensocial.googleusercontent.com/gadgets/proxy?url=http%3A%2F%2F3.bp.blogspot.com%2F-t7osA3Ikqa4%2FVG9y1yaBtpI%2FAAAAAAAAAsg%2FcoB5nR17IDM%2Fs1600%2FdSTsg.png&amp;container=blogger&amp;gadget=a&amp;rewriteMime=image%2F*" title="Lê Út luôn sẵn sàng hỗ trợ bạn" width="160" height="50" alt=""> </a><br></center>-->
                    <!--                        <center><p><span style="font-size: medium; font-family: arial, helvetica, sans-serif;"><strong><span style="color: #0000ff;">Mrs:</span> <span style="color: #ff0000;">Lê Út</span></strong></span></p></center>-->

                    <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                    <center>
                        <div id="SkypeButton_Call_utlethi_hua_1">
                            <script type="text/javascript">
                                Skype.ui({
                                    "name": "dropdown",
                                    "element": "SkypeButton_Call_utlethi_hua_1",
                                    "participants": ["utlethi_hua"],
                                    "imageSize": 32
                                });
                            </script>
                        </div>
                    </center>

                    <center><a href="ymsgr:sendim?phaletrangnd90" mce_href="ymsgr:sendim?phaletrangnd90" border="0"><img
                                src="http://opi.yahoo.com/online?u=phaletrangnd90&amp;m=g&amp;t=2"
                                mce_src="http://opi.yahoo.com/online?u=phaletrangnd90&amp;m=g&amp;t=2"></a>
                        <center>
                            <center><p><span
                                        style="font-size: medium; font-family: arial, helvetica, sans-serif;"><strong><span
                                                style="color: #0000ff;">Mrs:</span> <span
                                                style="color: #ff0000;">Lê Út</span></strong></span></p></center>
                        </center>
                    </center>

                    <center><a href="mailto:levy.hua@gmail.com?subject=Liên hệ mua bán chung cư"
                               style="font-size: 14px;font-weight: bold;margin: 20px;display: block;color:  #006478">levy.hua@gmail.com</a>
                    </center>
                </div>
            </div>
        </div>

    </div>
</div>
<div style="clear:both;"></div>
<!--//Modules/Project/ProjectHighlights.ascx-->
<?php //if(count($saler) > 0):?>
<!--<div class="enterprise-rightContent">-->
<!--    <div class="rc11">-->
<!--        <div class="title-style">-->
<!--            <h3>-->
<!--                NHÀ MÔI GIỚI TIÊU BIỂU</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="rc12">-->
<!--        <div class="divIndividual">-->
<!--            <div class="childIndividual individualActive">-->
<!--                <div>-->
<!--                    --><?php //foreach($saler as $_key => $_val):?>
<!--                            <div class="vip-row" style="overflow: hidden">-->
<!--                                <div class="avatar">-->
<!--                                    <a href="--><?php //echo $_val->url?><!--" rel="nofollow">-->
<!--                                        <img class="img" style="float: left;" src="-->
<?php //echo $_val->getImageUrl()?><!--">-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <a class="link colorboldblue" href="-->
<?php //echo $_val->url?><!--" rel="nofollow">-->
<!--                                    --><?php //echo $_val->name?>
<!--                                </a>-->
<!--                            </div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <a href="-->
<?php //echo Yii::app()->createUrl('/web/saler/list')?><!--" class="linktoall" rel="nofollow">Xem tất cả</a>-->
<!--    </div>-->
<!--</div>-->
<?php //endif;?>
<style type="text/css">
    .fone {
        color: #e70404;
        line-height: 20px;
    }

    /*.divIndividual {*/
    /*position: relative;*/
    /*overflow: hidden;*/
    /*width: 203px;*/
    /*}*/

    /*.divIndividual div.childIndividual {*/
    /*position: absolute;*/
    /*width: 203px;*/
    /*top: 0;*/
    /*}*/
</style>

<script>
    function slideSwitchIndividual() {
        var active = $('.divIndividual div.individualActive');
        var notActive = $('.divIndividual div.notIndividualActive');

        active.animate({
            "left": (-200)
        }, 1000, function () {
            $(this).css('left', '200px');
            $(this).toggleClass('individualActive');
            $(this).toggleClass('notIndividualActive');
        });

        notActive.animate({
            "left": (0)
        }, 1000, function () {
            $(this).toggleClass('individualActive');
            $(this).toggleClass('notIndividualActive');
        });
    }

    var individualInterval;

    function SetInterValIndividual() {
        if ($('.divIndividual .childIndividual').length > 1) {
            individualInterval = setInterval("slideSwitchIndividual()", 5000);
        }
    }

    function ClearInterValIndividual() {
        if (individualInterval != undefined) {
            clearInterval(individualInterval);
        }
    }

    function RenderIndividuals(individualJsons) {
        if (individualJsons != undefined && individualJsons.length > 0) {
            var limit = individualJsons.length,
                lower_bound = 0,
                upper_bound = individualJsons.length - 1,
                unique_random_numbers = [];
            while (unique_random_numbers.length < limit) {
                var random_number = Math.round(Math.random() * (upper_bound - lower_bound) + lower_bound);
                if (jQuery.inArray(random_number, unique_random_numbers) == -1) {
                    unique_random_numbers.push(random_number);
                }
            }

            for (var i = 0; i < unique_random_numbers.length; i++) {
                if (i < 3) {
                    AddItem('#repIndividualFirst', individualJsons[unique_random_numbers[i]]);
                } else {
                    AddItem('#repIndividualSecond', individualJsons[unique_random_numbers[i]]);
                }
            }
        }
    }

    function AddItem(control, individuaValue) {
        $(control).html($(control).html() + '<div class="vip-row" style="height: 105px; overflow: hidden">'
        + '<div class="avatar">'
        + '<a href="' + individuaValue.Url + '" rel="nofollow"><img class="img" style="float: left;" src="' + individuaValue.Avatar + '" /></a>'
        + '</div>'
        + '<a class="link colorboldblue" href="' + individuaValue.Url + '" rel="nofollow">' + individuaValue.Name + '</a>'
        + '<div class="fone">' + individuaValue.Mobile + '</div>' + individuaValue.ShortDesc
        + '</div>');
    }

    //    $(function () {
    //        var individualJsons = [
    //            <?php //foreach($saler as $_key => $_val):?>
    <!--            --><?php //if($_key > 9):?>
    //                {
    //                    "Url": "<?php //echo $_val->url?>//",
    //                    "Avatar": "<?php //echo $_val->getImageUrl()?>//",
    //                    "Name": "<?php //echo $_val->name?>//",
    //                    "Mobile": "<?php //echo $_val->mobile?>//",
    //                    "ShortDesc": "<?php //echo $_val->area?>//"
    //                },
    //            <?php //endif;?>
    <!--            --><?php //endforeach?>
    //        ];
    //        RenderIndividuals(individualJsons);
    //        SetInterValIndividual();
    //        if ($('.divIndividual .childIndividual').length > 1) {
    //            $('.divIndividual').mouseover(function () {
    //                ClearInterValIndividual();
    //            });
    //
    //            $('.divIndividual').mouseout(function () {
    //                SetInterValIndividual();
    //            });
    //        }
    //    });

    function setCookie(c_name, value, exdays) {
        var exdate = new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value = value + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
        //c/onsole.log(c_name + "=" + c_value + " ;path=/");
        document.cookie = c_name + "=" + c_value + " ;path=/";
    }
    function getCookie(c_name) {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
            c_value = null;
        }
        else {
            c_start = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length;
            }
            c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
    }

    $(function () {
        var first_register = getCookie('first_register');

        if(!first_register){
            $('#om-s2xymi2yl8-lightbox').show();
            setCookie('first_register', 'true');
        }

        var frm = $('#form_first_register');
        frm.submit(function (ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                    $('#om-s2xymi2yl8-lightbox').hide();
                    if (data == 0) {
                        myGrowl('Bạn đăng ký bị lỗi ! Vui lòng thử lại', 'failt');
                    } else {
                        myGrowl('Bạn đã đăng ký thành công');
                    }
                }
            });

            ev.preventDefault();
        });

    });
</script>


<div style="clear:both;"></div>
<!--//Modules/BrokeEnterprise/Viewer/Typical/TypicalBrokeEnterprise.ascx-->

<div class="container-default">
    <div id="ctl53_BodyContainer">
        <div id="bannerfix">
            <div class="adPosition" positioncode="BANNER_POSITION_FIX"
                 stylex="position:fixed; bottom:0px; right:0px; z-index:100;"></div>
        </div>

    </div>

</div>

<!--//Modules/HtmlGeneric/View.ascx--></div>
<p align="center"><small><a href="https://www.onlinecasino.us/let-it-ride/" target="_blank">Let it ride game - OC</a></small></p>
