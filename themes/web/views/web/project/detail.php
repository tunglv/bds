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
<div id="ctl27_BodyContainer">


<div id="detail">
<div>
    <div id="ctl27_ctl01_ProjectInfomation1_infoDetail">
        <div class="prjava">
            <img src="<?php echo $project->getImageUrl('','170')?>" width="200px" height="150px">
        </div>
        <div class="prjinfo">
            <ul>
                <li>
                    <h1><?php echo $project->name?></h1>
                </li>
                <li>
                    <label>Địa chỉ:</label> <?php echo $project->address?>
                </li>
                <li>
                    <label>Số điện thoại:</label> <?php echo $project->mobile?>|<label>Fax:</label> <?php echo $project->fax?>
                </li>
                <li>
                    <label>Website:</label><a href="<?php echo $project->website?>" target="_blank" rel="nofollow"> <?php echo $project->website?></a>
                </li>
                <li>
                    <label>Email:</label> <?php echo $project->email?>
                </li>
                <li>
                    <label>Nick chat yahoo:</label> <?php echo $project->yahoo?>
                </li>
            </ul>
        </div>
        <div class="clear">
        </div>
    </div>
</div>

<ul class="tabProject">

    <li value="1" class="tabActiveProject">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Tổng quan</a>
    </li>

    <li value="2">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Hạ tầng - Quy hoạch</a>
    </li>

    <li value="3">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Thiết kế - Mẫu nhà</a>
    </li>

    <li value="4">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Vị trí</a>
    </li>

    <li value="5">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Bán hàng</a>
    </li>
    <li value="6">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Video</a>
    </li>
    <li value="7">
        <a href="javascript:void(0)" rel="nofollow" style="white-space:nowrap;">Hình ảnh</a>
    </li>

    <li onclick="showFckContente(this)" style="" value="10"><a>Chủ đầu tư</a></li>
</ul>

<div class="clear"></div>

<div class="editor" style="clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl00$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_0" value="1">

    <?php echo $project->overview?>
</div>

<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl01$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_1" value="2">

    <?php echo $project->ha_tang?>
</div>

<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl02$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_2" value="3">

    <?php echo $project->thiet_ke?>
</div>

<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl03$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_3" value="4">

    <?php echo $project->location?>
</div>

<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl04$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_4" value="5">

    <?php echo $project->ban_hang?>
</div>

<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl05$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_5" value="6">

    <?php echo $project->video?>
</div>
<div class="editor" style="display:none;clear: both">
    <input type="hidden" name="ctl00$ctl27$ctl01$RptVale$ctl05$hdProjectId" id="ctl27_ctl01_RptVale_hdProjectId_5" value="7">

    <?php echo $project->images?>
</div>
<div id="googleMap" style="display: none; clear: both" class="MapProjectDetail">
    <strong>Tiện ích trên bản đồ:</strong><br>

    <div class="utilityform">

        <span class="utility-header">Chọn bán kính</span>

        <div class="utilityradius">

            <label for="rad200">
                <input type="radio" name="radius" checked="checked" id="rad200" value="200">
                200 m</label>

            <label for="rad500">
                <input type="radio" name="radius" id="rad500" value="500">
                500 m</label>

            <label for="rad1000">
                <input type="radio" name="radius" id="rad1000" value="1000">
                1 km</label>

            <label for="rad2000">
                <input type="radio" name="radius" id="rad2000" value="2000">
                2 km</label>

            <label for="rad5000">
                <input type="radio" name="radius" id="rad5000" value="5000">
                5 km</label>

            <label for="rad10000">
                <input type="radio" name="radius" id="rad10000" value="10000">
                10 km</label>

        </div>


        <span class="utility-header">Chọn loại tiện ích</span>

        <div class="utilitylist">

            <label for="util4">
                <input type="checkbox" checked="checked" id="util4" value="4">
                Trường học</label>

            <label for="util10">
                <input type="checkbox" id="util10" value="10">
                Dự án</label>

            <label for="util5">
                <input type="checkbox" id="util5" value="5">
                Cơ sở y tế</label>

            <label for="util3">
                <input type="checkbox" id="util3" value="3">
                Cơ quan hành chính</label>

            <label for="util2">
                <input type="checkbox" id="util2" value="2">
                TT thể thao, giải trí</label>

            <label for="util1">
                <input type="checkbox" id="util1" value="1">
                Địa điểm mua sắm</label>

            <label for="util6">
                <input type="checkbox" id="util6" value="6">
                Bến xe, trạm xe</label>

            <label for="util7">
                <input type="checkbox" id="util7" value="7">
                Công trình công cộng</label>

            <label for="util0">
                <input type="checkbox" id="util0" value="0">
                Nhà hàng</label>

            <label for="util8">
                <input type="checkbox" id="util8" value="8">
                Khách sạn</label>

            <label for="util9">
                <input type="checkbox" id="util9" value="9">
                Tiện ích khác</label>

        </div>

    </div>
    <div id="maputility"></div>
    <div class="utilityResult">
        <div class="utilityResultHeader">
        </div>
        <div class="utilityResultList">
        </div>
    </div>
</div>
<br>

<div id="enterpriseInfo" class="editor" style="display: none;">
    <?php echo $project->chu_dau_tu?>

</div>
</div>
<h3 style="color: black">
    Các dự án khác:
</h3>

<div id="otherProject">
    <ul>

        <li><a href="http://batdongsan.com.vn/eco-sun-pj1415" title="Eco Sun">
                Eco Sun</a></li>

        <li><a href="http://batdongsan.com.vn/eco-town-pj1270" title="Eco Town">
                Eco Town</a></li>

        <li><a href="http://batdongsan.com.vn/sunflower-city-pj1084" title="Sunflower City">
                Sunflower City</a></li>

        <li><a href="http://batdongsan.com.vn/lang-sinh-thai-du-lich-eco-village-pj940"
               title="Làng sinh thái du lịch – Eco Village">
                Làng sinh thái du lịch – Eco Village</a></li>

    </ul>
</div>
<div class="other-info">

    <div class="list">
        <span>Các tin rao </span><a href="http://batdongsan.com.vn/ban-nha-rieng-kdt-lang-sen-viet-nam">
            bán nhà riêng
            tại <strong>
                KĐT Làng Sen Việt Nam
            </strong></a>
    </div>

    <div class="list">
        <span>Các tin rao </span><a href="http://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-kdt-lang-sen-viet-nam">
            bán nhà biệt thự, liền kề
            tại <strong>
                KĐT Làng Sen Việt Nam
            </strong></a>
    </div>

    <div class="list">
        <span>Các tin rao </span><a href="http://batdongsan.com.vn/ban-dat-nen-du-an-kdt-lang-sen-viet-nam">
            bán đất nền dự án
            tại <strong>
                KĐT Làng Sen Việt Nam
            </strong></a>
    </div>

</div>
<div class="other-info">
    <div class="list">

    </div>
</div>
<input type="hidden" name="ctl00$ctl27$ctl01$hdLat" id="hdLat" value="10.8116865158081">
<input type="hidden" name="ctl00$ctl27$ctl01$hdLong" id="hdLong" value="106.497550964355">
<input type="hidden" name="ctl00$ctl27$ctl01$hdAddress" id="hdAddress"
       value="Đường Tỉnh Lộ 10, Xã Đức Hoà Đông, Đức Hòa, Long An">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jquery.BlcokUI.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/geometry.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jquery.tooltipmarker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/InfoBox.js"></script>


<script type="text/javascript"
        src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/ProjectDetail.ascx.js"></script>
<!--Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36-->
</div>

</div>
<!--//Modules/Project/ProjectDetail.ascx--></div>
</div>
<div id="RightMainContent" class="body-right">

<?php if(count($same_project) > 0):?>
<div class="container-default">
    <div id="ctl28_BodyContainer">
        <div id="ctl28_ctl01_projectOther" class="body-right">
            <div class="caooc-right-top">
                <div class="caooc-right-top-header" style="text-align: center; text-transform: uppercase">
                    <h2>Các dự án cùng Quận/Huyện</h2></div>
            </div>

            <?php foreach($same_project as $_key => $_val):?>
                <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                    <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>" style="color: black; font-weight: normal"><?php echo $_val->name?></a>
                    <div class="caooc-right-top-drop"></div>
                </div>
            <?php endforeach;?>

        </div>
        <script type="text/javascript">
            $(function () {
                $('.body-right .caooc-right-top-cap2:first').css({'color': 'white'});
                $('.body-right .caooc-right-top-cap2:first').addClass('bgblue');
                $('.body-right .caooc-right-top-cap2:first a').css({'color': 'white', 'font-weight': 'normal'});
            });
        </script>
    </div>

</div>
<?php endif;?>
<!--//Modules/Project/ProjectOther.ascx-->
<div class="container-common">
<div id="ctl32_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>tìm kiếm dự án</div>
    </div>
</div>
<div id="ctl32_BodyContainer" class="bor_box">

    <form action="<?php echo Yii::app()->createUrl('/web/project/result')?>" method="POST">
        <div>
            <div class="pad" id="searchcp">
                <div class="t_gr">
                    Tìm kiếm theo lĩnh vực
                </div>
                <div id="divCategory" class="searchrow advance-select-box" style="margin:0px;">
                    <select name="choise-type" id="choise-type" class="advance-options" style="min-width: 188px;padding: 4px;">
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
                    <input type="hidden" name="type-label" id="type-label" value="Cao ốc văn phòng">
                </div>
                <div class="t_gr">
                    Tỉnh/ Thành phố
                </div>
                <div id="divCity" class="searchrow advance-select-box" style="margin:0px;">
                    <select name="choise-city" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_province">
                        <option value=""  class="advance-options current" style="min-width: 156px;">--Tỉnh/Tp--</option>
                        <?php foreach(Province::model()->getAll() as $_key => $_val):?>
                            <option value="<?php echo $_val->provinceid?>" class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="hidden" name="city-label" id="city-label" value="">
                </div>
                <div class="t_gr">
                    Quận/ Huyện
                </div>
                <div id="divDistrict" class="searchrow advance-select-box" style="margin:0px;">
                    <?php $province_id = isset(Yii::app()->request->cookies['s-pro-p']) ? Yii::app()->request->cookies['s-pro-p']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-d']->value)) $distric_id = Yii::app()->request->cookies['s-pro-d']->value;if($province_id):?>
                        <select name="choise-district" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_district">
                            <?php foreach(District::model()->getAll($province_id) as $_key => $_val):?>
                                <option value="<?php echo $_val->districtid?>" <?php if($_val->districtid == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                            <?php endforeach;?>
                        </select>
                    <?php else:?>
                        <select name="choise-district" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_district">
                            <option value="" class="advance-options current" style="min-width: 156px;">--Quận/Huyện--</option>
                        </select>
                    <?php endif;?>
                    <input type="hidden" name="district-label" id="district-label" value="">
                </div>

                <div class="t_gr">
                    Phường/Xã
                </div>
                <div id="divWard" class="searchrow advance-select-box" style="margin:0px;">
                    <?php $province_id = isset(Yii::app()->request->cookies['s-pro-d']) ? Yii::app()->request->cookies['s-pro-d']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-w']->value)) $distric_id = Yii::app()->request->cookies['s-pro-w']->value;if($province_id):?>
                        <select name="choise-ward" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                            <?php foreach(Ward::model()->getAll($province_id) as $_key => $_val):?>
                                <option value="<?php echo $_val->wardid?>" <?php if($_val->wardid == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                            <?php endforeach;?>
                        </select>
                    <?php else:?>
                        <select name="choise-ward" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                            <option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>
                        </select>
                    <?php endif;?>
                    <input type="hidden" name="ward-label" id="ward-label" value="">
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

        $("#choise_province").on('change', function(){
            setCookie('s-pro-p', $(this).val());
            $('#city-label').val($(this).find(":selected").text());
            $.post( "/admin/saler/getDistrict", { provinceid: $(this).val()})
                .done(function( data ) {
                    data = jQuery.parseJSON(data);
                    var html = '';
                    $.each(data, function( index, value ) {
                        html += '<option value="'+index+'">'+value+'</option>';
                    });

                    $('#choise_district').html(html);
                });
        });

        $("#choise_district").on('change', function(){
            setCookie('s-pro-d', $(this).val());
            $('#district-label').val($(this).find(":selected").text());
            $.post( "/admin/saler/getWard", { districtid: $(this).val()})
                .done(function( data ) {
                    data = jQuery.parseJSON(data);
                    var html = '';
                    $.each(data, function( index, value ) {
                        html += '<option value="'+index+'">'+value+'</option>';
                    });

                    $('#choise_ward').html(html);
                });
        });

        $(function () {
            var s_pro_t = getCookie('s-pro-t');
            var s_pro_p = getCookie('s-pro-p');
            var s_pro_d = getCookie('s-pro-d');
            var s_pro_w = getCookie('s-pro-w');

            if(s_pro_t){
                $('#choise-type option[value='+s_pro_t+']').attr('selected','selected');
            }
            if(s_pro_p){
                $('#choise_province option[value='+s_pro_p+']').attr('selected', 'selected');
            }
        });
    </script>
</div>
<div id="ctl32_FooterContainer">
</div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/Project/ProjectSearchBox.ascx-->
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.343517.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://kientrucvip.com/" bid="1351" tip="" tp="7"
         w="240" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=1351" target="_blank" title=""
                           rel="nofollow"><img
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.343517.jpg"
                style="width: 100%; height:90px;" class="view-count click-count" bannerid="1351"></a></div>
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.245648.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://thanglonglaw.com.vn" bid="643" tip="" tp="7"
         w="210" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=643" target="_blank" title=""
                           rel="nofollow"><img
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.245648.jpg"
                style="width: 100%; height:90px;" class="view-count click-count" bannerid="643"></a></div>
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
<!--//Modules/FaqViewList/FAQOptionList.ascx--></div>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer" style="height: 240px; overflow: hidden;">
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-times-city">Times City</a></li>
        <li><a href="http://batdongsan.com.vn/khu-do-thi-nam-thang-long-ciputra-ha-noi-pj2">Ciputra</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-khang-gia">Căn hộ Khang Gia</a></li>
        <li><a href="http://batdongsan.com.vn/sai-gon-airport-plaza-pj913">Sài Gòn Airport Plaza</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-cao-cap-hoang-thap-plaza">Hoàng Tháp Plaza</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-dat-duong-nhan-my-xa-my-dinh">Bán đất Nhân Mỹ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-pho-hoa-lu-4">Chung cư Hoa Lư</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-nui-truc-2">Bán nhà Núi Trúc</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-nen-du-an-khu-do-thi-dong-sai-gon">Khu đô thị Đông Sài Gòn</a>
        </li>
        <li><a href="http://batdongsan.com.vn/lan-phuong-mhbr-tower-pj318">Lan Phương MHBR Tower</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cao-oc-pho-dong-hoa-sen">Bán căn hộ Phố Đông Hoa
                Sen</a></li>
        <li><a href="http://batdongsan.com.vn/tags/cho-thue/Cho-thue-chung-cu-mini-quan-ba-dinh">Cho thuê chung cư mini
                quận ba đình</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-phuong-tan-phong-9">Bán nhà Phường Tân Phong Quận 7</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-d2-66">Bán nhà Đường D2</a></li>
        <li><a href="http://batdongsan.com.vn/cao-oc-van-phong-ba-dinh/flamingo-tower-pj212">Flamingo Tower</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-cua-hang-ki-ot-duong-nguyen-hong-3">Cho thuê cửa hàng phố Nguyên
                Hồng</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-lac-long-quan-63">Bán nhà Lạc Long Quân Quận 11</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-topaz-garden">Căn hộ chung cư Topaz Garden</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-an-thuong-1">Bán đất Xã An Thượng</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-cao-thang-55">Bán nhà Cao Thắng Quận 3</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-6-4-71">Bán nhà Đường số 6 Thủ Đức</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-phuong-khuong-mai">Bán nhà Phường Khương Mai</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-nha-rieng-duong-nguyen-van-dau-66">Cho thuê nhà Nguyễn Văn Đậu
                Bình Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-khuong-viet_1-70">Bán nhà Khuông Việt Tân Phú</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-thi-tran-trau-quy">Bán đất Thị trấn Trâu Quỳ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-tran-van-on-70">Bán nhà Trần Văn Ơn Tân Phú</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-an-da-36">Bán nhà Đường An Đà</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-tdc-plaza">Bán chung cư TDC Plaza</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-xa-tan-thoi-nhi">Bán nhà Xã Tân Thới Nhì</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-dinh-cong-ha-8">Bán nhà Định Công Hạ</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-le-hong-phong-15">Bán nhà Lê Hồng Phong Hà Đông</a>
        </li>
        <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-nguyen-chi-thanh-57">Cho thuê nhà mặt tiền
                Nguyễn Chí Thanh Quận 5</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-tay-hoa-61">Bán nhà Tây Hòa</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-pham-phu-thu-58">Bán nhà Phạm Phú Thứ Quận 6</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-nguyen-van-cu-1-53">Bán nhà mặt tiền Nguyễn Văn Cừ
                Quận 1</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-nha-rieng-duong-tran-quoc-thao_1-55">Cho thuê nhà Trần Quốc
                Thảo</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-10-71">Bán nhà Đường số 10 Thủ Đức</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-nguyen-van-linh-9">Bán nhà Nguyễn Văn Linh Long
                Biên</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-van-cao-2">Cho thuê nhà mặt phố Văn Cao Ba
                Đình</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-nguyen-tu-gian_1-67">Bán nhà mặt tiền Nguyễn Tư
                Giản</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/cho-thue-van-phong-keangnam-hanoi-landmark-tower">Văn phòng Keangnam</a>
        </li>
        <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-luong-ngoc-quyen-1">Cho thuê nhà mặt phố Lương
                Ngọc Quyến</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-kho-nha-xuong-dat-buon-ma-thuot-ddl">Cho thuê đất Buôn Ma
                Thuột</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-green-valley">Chung cư Green Valley</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-nguyen-tam-trinh-8">Bán nhà Nguyễn Tam Trinh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-7-59">Bán nhà Đường số 7 Quận 7</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-nen-du-an-kdc-phuoc-long-b-phu-nhuan">KDC Phước Long B Phú
                Nhuận</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-cua-hang-ki-ot-duong-cach-mang-thang-tam-53">Cho thuê cửa hàng
                Cách Mạng Tháng Tám Quận 1</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-hoang-dao-thanh-5">Bán nhà mặt phố Hoàng Đạo
                Thành</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-khu-do-thi-moi-cau-buou">Liền kề Cầu Bươu</a>
        </li>
    </ul>
</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>