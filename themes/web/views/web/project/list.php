<style>
    .hidden {
        display: none;
    }
    .pagination{
        clear: both;
        height: 24px;
    }
    .pagination a:hover{
        color: #000 !important;
        font-weight: bold;
    }
    .pagination li.active{
        color: #000 !important;
        font-weight: bold;
    }
    .pagination.paging.pagination-centered {
        background-color: #ececec;
        line-height: 30px;
        height: 30px;
        margin-top: 5px;
    }
    .yiiPager{
        float: right;
        margin-top: 5px;
    }
    .yiiPager li{
        margin-left: 2px;
        width: auto;
        color: #000000;
        text-decoration: none;
        height: 23px;
        line-height: 23px;
        float: left;
        padding-left: 6px;
        padding-right: 6px;
        border: 1px solid #ccc;
        list-style: none;
    }
    .yiiPager li.active{
        text-align: center !important;
        background-color: #055699;
        margin-left: 2px !important;
        width: auto !important;
        color: White !important;
        text-decoration: none !important;
        height: 23px !important;
        line-height: 23px !important;
        float: left !important;
        padding-left: 6px !important;
        padding-right: 6px !important;
        border: 1px solid #ccc !important;
        font-weight: bold !important;
    }
</style>
<div id="MainContent"></div>
<div class="clear">
</div>

<div class="body-left">
<div id="Breadcrumb"></div>
<div id="TopContent"></div>
<div>
    <div id="TopContentLeft" class="SubTopContent"></div>
    <div id="TopContentRight" class="SubTopContent"></div>
</div>
<div style="clear: both;">
</div>
<div id="LeftMainContent">

<div class="container-default">
<div id="ctl28_BodyContainer">
<div class="project-by-cate-list">
<div class="pad-bot-10">
    <h1 class="tit_l line_gr">
        <a href="javascript:void(0)"><span style="white-space:nowrap;"><?php echo $label?></span></a>
<!--        <a href="http://batdongsan.com.vn/ban-do-du-an-khu-do-thi-moi" id="ctl28_ctl01_lnkToMap" class="notab project-map-link" title="Xem trên bản đồ"><img src="--><?php //echo Yii::app()->baseUrl ?><!--/themes/web/files/images/xemtrenbando-duan.png" alt="Xem trên bản đồ" width="131" height="24"></a>-->
    </h1>
</div>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_item_view',
        'template'=>'{items}{pager}',
        'enableSorting' => true,

        'pagerCssClass' => 'pagination paging pagination-centered',
        'pager' => Array(
            'id'=>'',
            //'class'=>'',
            'internalPageCssClass'=>'',
            'cssFile'=>'',
            'header'=>'',

            'hiddenPageCssClass'=>'hidden',
            'selectedPageCssClass'=>'active',
            'nextPageLabel'=>'Sau',
            'prevPageLabel'=>'Trước',
            'maxButtonCount'=>5
        ),
        'emptyText'=>'Hiện chưa có sản phẩm nào, bạn hãy là người đầu tiên đăng sản phẩm trên meonho.net',
    )); ?>

<div class="clear">
</div>
</div>
</div>

</div>
<!--//Modules/Project/ProjectByCategory.ascx--></div>
</div>
<div id="RightMainContent" class="body-right">
<div class="container-common">
    <div id="ctl30_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>tìm kiếm dự án</div>
        </div>
    </div>
    <div id="ctl30_BodyContainer" class="bor_box">

        <form id="form-search-project" action="<?php echo Yii::app()->createUrl('/web/project/result')?>" method="GET">
            <div>
                <div class="pad" id="searchcp">
                    <div class="t_gr">
                        Tìm kiếm theo lĩnh vực
                    </div>
                    <div id="divCategory" class="searchrow advance-select-box" style="margin:0px;">
                        <select name="typeid" id="choise-type" class="advance-options" style="min-width: 188px;padding: 4px;">
                            <option value="1" class="advance-options" style="min-width: 156px;">Cao ốc văn phòng</option>
                            <option value="2" class="advance-options" style="min-width: 156px;">Khu căn hộ</option>
                            <option value="3" class="advance-options" style="min-width: 156px;">Khu đô thị mới</option>
                            <option value="4" class="advance-options" style="min-width: 156px;">Khu thương mại dịch vụ</option>
                            <option value="5" class="advance-options" style="min-width: 156px;">Khu phức hợp</option>
                            <option value="6" class="advance-options" style="min-width: 156px;">Khu dân cư</option>
                            <option value="7" class="advance-options" style="min-width: 156px;">Khu du lịch- nghỉ dưỡng</option>
                            <option value="8" class="advance-options" style="min-width: 156px;">Khu công nghiệp</option>
                            <option value="9" class="advance-options" style="min-width: 156px;">Dự án khác</option>
                        </select>
                        <input type="hidden" name="typeLabel" id="type-label" value="">
                    </div>
                    <div class="t_gr">
                        Tỉnh/ Thành phố
                    </div>
                    <div id="divCity" class="searchrow advance-select-box" style="margin:0px;">
                        <select name="cityid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_province">
                            <option value=""  class="advance-options current" style="min-width: 156px;">--Tỉnh/Tp--</option>
                            <?php foreach(Province::model()->getAll() as $_key => $_val):?>
                                <option value="<?php echo $_val->provinceid?>" class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                            <?php endforeach;?>
                        </select>
                        <input type="hidden" name="cityLabel" id="city-label" value="">
                    </div>
                    <div class="t_gr">
                        Quận/ Huyện
                    </div>
                    <div id="divDistrict" class="searchrow advance-select-box" style="margin:0px;">
                        <?php $province_id = isset(Yii::app()->request->cookies['s-pro-p']) ? Yii::app()->request->cookies['s-pro-p']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-d']->value)) $distric_id = Yii::app()->request->cookies['s-pro-d']->value;if($province_id):?>
                            <select name="distid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_district">
                                <option value="" class="advance-options current" style="min-width: 156px;">--Quận/Huyện--</option>
                                <?php foreach(District::model()->getAll($province_id) as $_key => $_val):?>
                                    <option value="<?php echo $_val->districtid?>" <?php if($_val->districtid == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                                <?php endforeach;?>
                            </select>
                        <?php else:?>
                            <select name="distid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_district">
                                <option value="" class="advance-options current" style="min-width: 156px;">--Quận/Huyện--</option>
                            </select>
                        <?php endif;?>
                        <input type="hidden" name="districtLabel" id="district-label" value="">
                    </div>

                    <div class="t_gr">
                        Phường/Xã
                    </div>
                    <div id="divWard" class="searchrow advance-select-box" style="margin:0px;">
                        <?php $province_id_ = isset(Yii::app()->request->cookies['s-pro-p']) ? Yii::app()->request->cookies['s-pro-p']->value : '';$province_id = isset(Yii::app()->request->cookies['s-pro-d']) ? Yii::app()->request->cookies['s-pro-d']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-w']->value)) $distric_id = Yii::app()->request->cookies['s-pro-w']->value;if($province_id && $province_id_):?>
                            <select name="wardid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                                <option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>
                                <?php foreach(Ward::model()->getAll($province_id) as $_key => $_val):?>
                                    <option value="<?php echo $_val->wardid?>" <?php if($_val->wardid == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                                <?php endforeach;?>
                            </select>
                        <?php else:?>
                            <select name="wardid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                                <option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>
                            </select>
                        <?php endif;?>
                        <input type="hidden" name="wardLabel" id="ward-label" value="">
                    </div>
                    <div class="t_gr" style="text-align: center;">
                        <input type="submit" name="ctl00$ctl30$ctl01$btnSearch" value="Tìm kiếm" id="ctl30_ctl01_btnSearch" class="searchbutton">
                    </div>
                </div>
            </div>
        </form>
        <style type="text/css">
            .searchbutton {
                margin: 0 !important;
                margin-top: 10px !important;
            }
        </style>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jquery.AdvanceHiddenDropbox(1).js"></script>
        <script type="text/javascript">
            function slug (str) {
                // str = str.toLowerCase();
                str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
                str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
                str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
                str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
                str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
                str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
                str = str.replace(/đ/g,"d");

                str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g,"A");
                str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g,"E");
                str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g,"I");
                str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g,"O");
                str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g,"U");
                str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g,"Y");
                str = str.replace(/Đ/g,"D");

                // remove domain extends
                str = str.replace(/\.+([\w-]{2,4})?/g,"-");
                str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.| |\:|\;|\"|\&|\#|\[|\]|~|$|_/g," ");
                /* tìm và thay thế các kí tự đặc biệt va khoang trang trong chuỗi sang kí tự khoang trang */
                str = str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
                str = str.replace(/^\-+|\-+$/g,"");
                str = str.replace(/^\s+|\s+$/g,"");
                //cắt bỏ ký tự - ở đầu và cuối chuỗi
                return str.replace(/ /g, '-').toLowerCase();
            }
//            $('#BdsSale_alias').val($(this).val().toAlias().replaceAll(' ', '-').toLowerCase());
            $(function() {
                $("#form-search-project").submit( function (e)
                {
                    e.preventDefault();

                    var val0 = $("#choise-type").val() ? $("#choise-type").val() : 0,
                        val1 = $("#choise_province").val() ? $("#choise_province").val() : 0,
                        val2 = $("#choise_district").val() ? $("#choise_district").val() : 0,
                        val3 = $("#choise_ward").val() ? $("#choise_ward").val() : 0;

                    var url = "/ket-qua-tim-kiem-du-an."+
                        slug($('#type-label').val())+
                        "-"+
                        val0+','+
                        slug($('#city-label').val())+
                        "-"+
                        val1+','+
                        slug($('#district-label').val())+
                        "-"+
                        val2+','+
                        slug($('#ward-label').val())+
                        "-"+
                        val3
                        ;

                    window.location = url;
                });
            });

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

            $("#choise-type").on('change', function() {
                setCookie('s-pro-t', $(this).val());
                $('#type-label').val($(this).find(":selected").text());
            });

            $("#choise_ward").on('change', function() {
                setCookie('s-pro-w', $(this).val());
                $('#ward-label').val($(this).find(":selected").text());
            });

            $("#choise_province").on('change', function() {
                setCookie('s-pro-p', $(this).val());
                $('#city-label').val($(this).find(":selected").text());

                if ($(this).val()) {
                    $.post("/web/project/getDistrict", {provinceid: $(this).val()})
                        .done(function (data) {
                            data = jQuery.parseJSON(data);
                            var html = '<option value="" class="advance-options current" style="min-width: 156px;">--Quận/Huyện--</option>';
                            $.each(data, function (index, value) {
                                html += '<option value="' + index + '">' + value + '</option>';
                            });

                            $('#choise_district').html(html);
                        });
                }else{
                    $('#choise_district').html('<option value="" class="advance-options current" style="min-width: 156px;">--Quận/Huyện--</option>');
                }
            });

            $("#choise_district").on('change', function(){
                setCookie('s-pro-d', $(this).val());
                $('#district-label').val($(this).find(":selected").text());

                if($(this).val()) {
                    $.post("/web/project/getWard", {districtid: $(this).val()})
                        .done(function (data) {
                            data = jQuery.parseJSON(data);
                            var html = '<option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>';
                            $.each(data, function (index, value) {
                                html += '<option value="' + index + '">' + value + '</option>';
                            });

                            $('#choise_ward').html(html);
                        });
                }else{
                    $('#choise_ward').html('<option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>');
                }
            });

            $(function () {
                var s_pro_t = getCookie('s-pro-t');
                var s_pro_p = getCookie('s-pro-p');
                var s_pro_d = getCookie('s-pro-d');
                var s_pro_w = getCookie('s-pro-w');

                $('#type-label').val('noname');
                $('#city-label').val('noname');
                $('#district-label').val('noname');
                $('#ward-label').val('noname');

                if(s_pro_t){
                    $('#choise-type option[value='+s_pro_t+']').attr('selected','selected');
                    $('#type-label').val($('#choise-type option[value='+s_pro_t+']').text());
                }
                if(s_pro_p){
                    $('#choise_province option[value='+s_pro_p+']').attr('selected', 'selected');
                    $('#city-label').val($('#choise_province option[value='+s_pro_p+']').text());
                }
                if(s_pro_d && s_pro_p){
                    $('#district-label').val($('#choise_district option[value='+s_pro_d+']').text());
                }
                if(s_pro_w && s_pro_d && s_pro_p){
                    $('#ward-label').val($('#choise_ward option[value='+s_pro_w+']').text());
                }
            });
        </script>
    </div>
    <div id="ctl30_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/Project/ProjectSearchBox.ascx-->

<div class="container-default">
<div id="ctl33_BodyContainer">

<div class="body-right">

    <?php foreach($group_type as $_k => $_v):?>
        <div class="caooc-right-top">
            <div class="caooc-right-top-header"><a href="<?php echo $_v->getUrlList()?>"><?php echo $_v->getTypeLabel()?> (<?php echo $_v->viewed?>)</a></div>
            <div class="caooc-right-top-drop">
                <?php if($_v->type == $type):?>
                <?php foreach($group_province as $_key => $_val):?>
                    <div class="caooc-right-top-cap1">
                        <a style="color: black" href="<?php echo $_val->cUrl?>">
                            <?php echo $_val->province_name?>
                            (<span class="countValue"><?php echo $_val->viewed?></span>)</a>
                    </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    <?php endforeach;?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".caooc-right-top-cap2:first").addClass("caooc-right-top").removeClass("caooc-right-top-cap2");
        $('.caooc-right-top a:first').replaceWith("<div class='caooc-right-top-header'><a href='" + $('.caooc-right-top a:first').attr('href') + "'>" + $('.caooc-right-top a:first').text() + "</a></div>");
        var url = window.location.toString();
        var lstLink = $('.caooc-right-top-drop').find("a");
        for (var i = 0; i < lstLink.length; i++) {
            if (url.indexOf($(lstLink[i]).attr("href")) > 0) {
                $(lstLink[i]).addClass('active');
                break;
            }
        }
    })
</script>
</div>

</div>
<!--//Modules/Project/ProjectCountByCategory.ascx-->
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.343517.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://kientrucvip.com/" bid="1351" tip="" tp="7"
         w="240" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=1351" target="_blank" title=""
                           rel="nofollow"><img
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.343517.jpg"
                style="width: 100%; height:90px;" class="view-count click-count"
                bannerid="1351"></a></div>
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.245648.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://thanglonglaw.com.vn" bid="643" tip="" tp="7"
         w="210" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=643" target="_blank" title=""
                           rel="nofollow"><img
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.245648.jpg"
                style="width: 100%; height:90px;" class="view-count click-count"
                bannerid="643"></a></div>
</div>

<div style="clear:both;"></div>
<!--//Modules/Banner/Preview/MainRight/BannerPreviewMainRight.ascx-->
<div class="container-common">
    <div id="ctl33_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>Dự án nổi bật</div>
        </div>
    </div>
    <div id="ctl33_BodyContainer" class="bor_box">


        <div style="text-align: center; margin-top:5px;height:365px;overflow:auto;"
             class="customeScrollbar mCustomScrollbar _mCS_1">
            <div class="mCustomScrollBox mCS-light" id="mCSB_1"
                 style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                <div class="mCSB_container" style="position: relative;">
                    <?php foreach($hot_project as $_key => $_val):?>
                        <div>
                            <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                                <img src="<?php echo $_val->getImageUrl()?>" width="156" height="100" alt="<?php echo $_val->name?>">
                            </a>
                        </div>
                        <div class="prj_vip">
                            <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                                <?php echo $_val->name?>
                            </a>
                        </div>
                        <div class="line_separate">
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div id="ctl33_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;"></div>
<!--//Modules/Project/ProjectHighlights.ascx-->
<div class="container-common">
    <div id="ctl36_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>Chủ đề được quan tâm</div>
        </div>
    </div>
    <div id="ctl36_BodyContainer" class="bor_box">

        <div class="list">
            <ul>
                <?php foreach($hot_topic as $_key => $_val):?>
                    <li><a href="<?php echo $_val->url?>" title="<?php echo $_val->title?>"><?php echo $_val->title?></a></li>
                <?php endforeach;?>
            </ul>

        </div>


    </div>
    <div id="ctl36_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;"></div>
<!--//Modules/SubjectLink/View.ascx-->

<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/FaqViewList/FAQOptionList.ascx--></div>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer">

</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>