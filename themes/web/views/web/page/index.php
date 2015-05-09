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

<div id="TopRightMainContent" class="col_cent" style="width: 768px;">

<div class="news-list-border-background">
    <ul class="news-list-thumb">
        <?php foreach($news as $_key => $_vale):?>
            <?php if($_key < 6):?>
                <li style="display: <?php echo $_key == 0 ? "block" : "none"?>;" id="li_<?php echo $_key?>">
                    <a href="<?php echo $_vale->url?>" title="<?php echo $_vale->title?>">
                        <img class="imagethumbnail" alt="<?php echo $_vale->title?>" src="<?php echo $_vale->getImageUrl()?>" style="float:left;">
                    </a>

                    <div class="thumb-title">
                        <a href="<?php echo $_vale->url?>" title="<?php echo $_vale->title?>"><?php echo $_vale->title?></a>
                    </div>
                    <div class="thumb-summary"><?php echo $_vale->desc?></div>
                </li>
            <?php endif;?>
        <?php endforeach;?>

    </ul>

    <div style="clear: both;">
    </div>
    <div class="news-slide-show-item">
        <div class="news-list"
             style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 185px;">
            <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 407px; top: -185px;">
                <?php foreach($news as $_ky => $_val):?>
                    <?php if($_key < 6):?>
                        <li class="li_<?php echo $_ky?>" style="overflow: hidden; float: none; width: 768px; height: 20px;">
                            <a href="<?php echo $_val->url?>" title="<?php echo $_val->title?>"><?php echo $_val->title?></a>
                        </li>
                    <?php endif;?>
                <?php endforeach;?>
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
                <object id="obj2610" width="780px" border="0" height="90px" class="view-count" bannerid="2610"
                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                        classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                    <param value="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228091714-TruongNM_TrangTT2_150226_780x90.swf"
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
            </div>
            <div class="adshareditem aditem" time="10" style="display: block;"
                 src="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081057-TruongNM_NienPTN_150227_780x90.swf"
                 altsrc="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081106-739f.jpg"
                 link="http://sunviewtown.vn/tin-tuc--su-kien/chuong-trinh-vui-xuan-cung-sunview-town.html" bid="2613"
                 tip="" tp="6" w="780" h="90">
                <object id="obj2613" width="780px" border="0" height="90px" class="view-count" bannerid="2613"
                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                        classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                    <param value="http://file4.batdongsan.com.vn/2015/03/02/V5fQl2m0/20150302081057-TruongNM_NienPTN_150227_780x90.swf"
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

<div class="product-list tin-danh-cho-ban" style="padding-top: 10px;">
    <style>
        #header-product_list li{
            background-color: #055699;color: #fff;
            cursor: pointer;
        }
        #header-product_list li.active, #header-product_list li:hover{
            border: 1px solid #055699;color: #000;background-color: transparent;
        }
    </style>
    <ul id="header-product_list" style="list-style: none;text-align: center;height: 55px;display: block;padding-left: 5px;margin-bottom: 10px;">
        <li project="overview-project" class="detail-project active" style="width: 11%;display: inline-block;clear: both;height: 55px;float: left;border-radius: 10px;line-height: 28px;box-shadow: 1px 1px 1px #000;">Giới thiệu chung</li>
        <li project="boss-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;line-height: 50px;border-radius: 10px;box-shadow: 1px 1px 1px #000;">Chủ đầu tư</li>
        <li project="desgin-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;box-shadow: 1px 1px 1px #000;">Mặt bằng và thiết kế căn hộ</li>
        <li project="quote-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">Bảng giá</li>
        <li project="process-pay-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 28px;box-shadow: 1px 1px 1px #000;">Tiến độ thanh toán</li>
        <li project="bonus-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">Ưu đãi</li>
        <li project="loan-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;box-shadow: 1px 1px 1px #000;">Hỗ trợ vay vốn ngân hàng</li>
        <li project="process-submit-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;line-height: 28px;border-radius: 10px;box-shadow: 1px 1px 1px #000;">Tiến độ thi công</li>
        <li project="contract-project" class="detail-project" style="width: 11%;display: inline-block;height: 55px;float: left;border-radius: 10px;line-height: 50px;box-shadow: 1px 1px 1px #000;">Hợp đồng</li>
    </ul>
    <hr style="width: 80%;">
    <div style="clear:both;margin-bottom: 10px;"></div>

    <div class="infor-project" id="overview-project" style="display: block;clear:both;margin: 0 5px 10px;"><?php echo $project_home->overview?></div>
    <div class="infor-project" id="boss-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->chu_dau_tu?></div>
    <div class="infor-project" id="desgin-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->thiet_ke?></div>
    <div class="infor-project" id="quote-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->bang_gia?></div>
    <div class="infor-project" id="process-pay-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->tien_do_thanh_toan?></div>
    <div class="infor-project" id="bonus-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->uu_dai?></div>
    <div class="infor-project" id="loan-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->ho_tro_vay_von?></div>
    <div class="infor-project" id="process-submit-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->tien_do?></div>
    <div class="infor-project" id="contract-project" style="display: none;clear:both;margin: 0 5px 10px;"><?php echo $project_home->hop_dong?></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#header-product_list li.detail-project').click(function(){
            $('#header-product_list li.detail-project').removeClass('active');
            $(this).addClass('active');
            $('.infor-project').hide();
            $('#'+$(this).attr('project')).show();
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
<?php if(count($project) > 0):?>
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
                        <?php foreach($project as $_key => $_val):?>
                            <div>
                                <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                                    <img src="<?php echo $_val->getImageUrl()?>" width="156" height="100" alt="<?php echo $_val->name?>">
                                </a>
                            </div>
                            <div class="prj_vip">
                                <a href="<?php echo $_val->name?>" title="<?php echo $_val->name?>">
                                    <?php echo $_val->name?>
                                </a>
                            </div>
                            <div class="line_separate">
                            </div>
                        <?php endforeach;?>
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
<?php endif;?>
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
                <?php foreach($news_viewest as $_key => $_val):?>
                <li>
                    <a class="controls-view-date-contents-link" title="<?php echo $_val->title?>" href="<?php echo $_val->url?>"><?php echo $_val->title?></a>
                </li>
                <?php endforeach;?>
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
<!--                    <a class="controls-view-date-contents-link" title="--><?php //echo $_val->title?><!--" href="--><?php //echo $_val->url?><!--">-->
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
<?php //if(count($pt) > 0):?>
<!--<div class="container-common">-->
<!--    <div id="ctl47_HeaderContainer" class="box-header">-->
<!--        <div class="name_tit" align="center">-->
<!--            <h3 style="color: White;">Phong thủy nhà bạn</h3>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="ctl47_BodyContainer" class="bor_box">-->
<!--        <div style="text-align: center; padding-top: 5px;">-->
<!--        </div>-->
<!--        <div class="list">-->
<!--            <div class="aligncenter"><a href="--><?php //echo $pt[0]->url?><!--"><img style="width: 100%" src="--><?php //echo $pt[0]->getImageUrl()?><!--" alt="--><?php //echo $pt[0]->title?><!--"></a></div>-->
<!--            <div style="display: block; margin: 5px 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;"><a href="--><?php //echo $pt[0]->url?><!--" style="color: #055699 !important; font-weight: bold;">--><?php //echo $pt[0]->title?><!--</a></div>-->
<!--            <ul>-->
<!--                --><?php //foreach($pt as $_key => $_val):?>
<!--                    --><?php //if($_key != 0):?>
<!--                        <li>-->
<!--                            <a href="--><?php //echo $_val->url?><!--" title="--><?php //echo $_val->title?><!--">--><?php //echo $_val->title?><!--</a>-->
<!--                        </li>-->
<!--                    --><?php //endif;?>
<!--                --><?php //endforeach;?>
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="ctl47_FooterContainer">-->
<!--    </div>-->
<!--</div>-->
<?php //endif;?>
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
<!--            <img src="--><?php //echo Yii::app()->baseUrl?><!--/themes/web/files/images/icon_user.png" alt="">-->
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
<!--                        <a href="--><?php //echo $_val->url?><!--" title="--><?php //echo $_val->title?><!--">--><?php //echo $_val->title?><!--</a>-->
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
                <param value="http://file4.batdongsan.com.vn/2015/02/13/V5fQl2m0/20150213143804-021315_ThuanNQ_210x300.swf"
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
                <param value="http://file4.batdongsan.com.vn/2015/02/26/V5fQl2m0/20150226152614-022615_ThuanNQ_210x300.swf"
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
                <param value="http://file4.batdongsan.com.vn/2015/02/25/V5fQl2m0/20150225173548-TruongNM_PhuongBTL_150224_210x150.swf"
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
            <input id="customer-name" type="text" placeholder="HỌ VÀ TÊN" style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid #055699;padding: 5px;">
            <span id="error-customer-name" style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Họ tên không được để trống</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;">
            <input id="customer-phone" type="text" onkeydown="inputNumeric(event)" placeholder="SỐ ĐIỆN THOẠI" style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid #055699;padding: 5px;">
            <span id="error-customer-phone" style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Số điện thoại không hợp lệ</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;">
            <input id="customer-email" type="text" placeholder="ĐỊA CHỈ EMAIL" style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid #055699;padding: 5px;">
            <span id="error-customer-email" style="display: none;clear:both;color: #f00;font-size: 11px;text-align: center;">Email không hợp lệ</span>
        </div>
        <div class="customer-name" style="display: block;margin: 0 auto;padding-top: 10px;"><span onclick="customer_registered()" style="border-radius: 5px;width: 90%;margin: 0 auto;display: block;border: 1px solid #055699;padding: 2px;background-color: #055699;color: #fff;font-weight: bold;text-align: center;cursor: pointer;">ĐĂNG KÝ</span></div>
    </div>
    <div id="ctl49_FooterContainer">
    </div>
</div>

<script>
    $( "#customer-name" ).focus(function() {
        $('#error-customer-name').hide();
    });

    $( "#customer-phone" ).focus(function() {
        $('#error-customer-phone').hide();
    });

    $( "#customer-email" ).focus(function() {
        $('#error-customer-email').hide();
    });

    function customer_registered(){
        var name = $('#customer-name').val(),
            phone = $('#customer-phone').val(),
            email = $('#customer-email').val();

        if(name == "") {$('#error-customer-name').show();return false;}
        else if(phone.length > 12 || phone.length < 10) {$('#error-customer-phone').show();return false;}
        else if(!validateEmail(email)) {$('#error-customer-email').show();return false;}
        else{
            $.post( "/web/page/registered", { name: name, phone: phone, email: email})
                .done(function( data ) {
                    if(!data){
                        alert("Bạn đăng ký bị lỗi ! Vui lòng thử lại")
                    }else{
                        alert( "Bạn đã đăng ký thành công");
                    }
                });
        }

    }

    function validateEmail(email) {
        var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
        var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/;
        if (email == "" || !emailFilter.test(email) || email.match(illegalChars)) {
            return false;
        }
        return true;
    }

    function inputNumeric(evt)
    {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        //key = String.fromCharCode( key );
        var regex = /[0-9]/;
        /*if( !regex.test(String.fromCharCode(key)) && (key != 37 && key != 39 &&
         key != 8 && key != 46))*/
        var keyExplode = [8, 43, 37, 39, 46, 9, 35, 36];
        if( !regex.test(String.fromCharCode(key)) && keyExplode.indexOf(key) < 0)
        {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

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
                    <center><span style="font-weight: bold;color: #055699;">0976.078.988 - 0936.404.616 - 0986.616.445</span></center>
                    <!--                        <center><a href="Skype:utlethi_hua?chat"> <img src="https://images-blogger-opensocial.googleusercontent.com/gadgets/proxy?url=http%3A%2F%2F3.bp.blogspot.com%2F-t7osA3Ikqa4%2FVG9y1yaBtpI%2FAAAAAAAAAsg%2FcoB5nR17IDM%2Fs1600%2FdSTsg.png&amp;container=blogger&amp;gadget=a&amp;rewriteMime=image%2F*" title="Lê Út luôn sẵn sàng hỗ trợ bạn" width="160" height="50" alt=""> </a><br></center>-->
                    <!--                        <center><p><span style="font-size: medium; font-family: arial, helvetica, sans-serif;"><strong><span style="color: #0000ff;">Mrs:</span> <span style="color: #ff0000;">Lê Út</span></strong></span></p></center>-->

                    <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                    <center><div id="SkypeButton_Call_utlethi_hua_1">
                            <script type="text/javascript">
                                Skype.ui({
                                    "name": "dropdown",
                                    "element": "SkypeButton_Call_utlethi_hua_1",
                                    "participants": ["utlethi_hua"],
                                    "imageSize": 32
                                });
                            </script>
                        </div></center>

                    <center><a href="ymsgr:sendim?phaletrangnd90" mce_href="ymsgr:sendim?phaletrangnd90" border="0"><img src="http://opi.yahoo.com/online?u=phaletrangnd90&amp;m=g&amp;t=2" mce_src="http://opi.yahoo.com/online?u=phaletrangnd90&amp;m=g&amp;t=2"></a><center>
                            <center><p><span style="font-size: medium; font-family: arial, helvetica, sans-serif;"><strong><span style="color: #0000ff;">Mrs:</span> <span style="color: #ff0000;">Lê Út</span></strong></span></p></center></center></center>

                    <center><a href="mailto:levy.hua@gmail.com?subject=Liên hệ mua bán chung cư" style="font-size: 14px;font-weight: bold;margin: 20px;display: block;color: #055699">levy.hua@gmail.com</a></center>
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
<!--                                        <img class="img" style="float: left;" src="--><?php //echo $_val->getImageUrl()?><!--">-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                                <a class="link colorboldblue" href="--><?php //echo $_val->url?><!--" rel="nofollow">-->
<!--                                    --><?php //echo $_val->name?>
<!--                                </a>-->
<!--                            </div>-->
<!--                    --><?php //endforeach;?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <a href="--><?php //echo Yii::app()->createUrl('/web/saler/list')?><!--" class="linktoall" rel="nofollow">Xem tất cả</a>-->
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
