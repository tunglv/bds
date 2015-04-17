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

<div class="container-default">
    <div id="ctl28_BodyContainer">
        <div id="ctl28_ctl01_projectOther" class="body-right">
            <div class="caooc-right-top">
                <div class="caooc-right-top-header" style="text-align: center; text-transform: uppercase">
                    <h2>Dự án KĐT Làng Sen Việt Nam</h2></div>
            </div>
            <div class="caooc-right-top-cap2 bgblue" style="color: white;">
                <a href="http://batdongsan.com.vn/cong-ty-cp-dau-tu-va-xay-dung-phuc-khang-eb687"
                   style="color: white; font-weight: normal;"><strong>Giới thiệu</strong></a>

                <div class="caooc-right-top-drop">
                </div>
            </div>
            <div class="caooc-right-top-cap2">
                <a href="http://batdongsan.com.vn/cong-ty-cp-dau-tu-va-xay-dung-phuc-khang-ec687"
                   style="color: black"><strong>Liên hệ</strong></a>

                <div class="caooc-right-top-drop">
                </div>
            </div>


            <div class="caooc-right-top">
                <div class="caooc-right-top-cap2">
                    <strong>Các dự án khác</strong></div>
            </div>

            <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                <a href="./KĐT Làng Sen Việt Nam   Dự án Khu đô thị mới KĐT Làng Sen Việt Nam_files/KĐT Làng Sen Việt Nam   Dự án Khu đô thị mới KĐT Làng Sen Việt Nam.html"
                   title="KĐT Làng Sen Việt Nam" style="color: black; font-weight: normal">
                    KĐT Làng Sen Việt Nam</a>

                <div class="caooc-right-top-drop">
                </div>
            </div>

            <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                <a href="http://batdongsan.com.vn/khu-do-thi-moi-duc-hoa-la/eco-sun-pj1415" title="Eco Sun"
                   style="color: black; font-weight: normal">
                    Eco Sun</a>

                <div class="caooc-right-top-drop">
                </div>
            </div>

            <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                <a href="http://batdongsan.com.vn/khu-do-thi-moi-duc-hoa-la/eco-town-pj1270" title="Eco Town"
                   style="color: black; font-weight: normal">
                    Eco Town</a>

                <div class="caooc-right-top-drop">
                </div>
            </div>

            <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                <a href="http://batdongsan.com.vn/khu-do-thi-moi-duc-hoa-la/sunflower-city-pj1084"
                   title="Sunflower City" style="color: black; font-weight: normal">
                    Sunflower City</a>

                <div class="caooc-right-top-drop">
                </div>
            </div>

            <div class="caooc-right-top-cap2" style="padding-left: 30px;">
                <a href="http://batdongsan.com.vn/khu-do-thi-moi-duc-hoa-la/lang-sinh-thai-du-lich-eco-village-pj940"
                   title="Làng sinh thái du lịch – Eco Village" style="color: black; font-weight: normal">
                    Làng sinh thái du lịch – Eco Village</a>

                <div class="caooc-right-top-drop">
                </div>
            </div>


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
<!--//Modules/Project/ProjectOther.ascx-->
<div class="container-common">
<div id="ctl32_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>tìm kiếm dự án</div>
    </div>
</div>
<div id="ctl32_BodyContainer" class="bor_box">

    <div>
        <div class="pad" id="searchcp">
            <div class="t_gr">
                Tìm kiếm theo lĩnh vực
            </div>
            <div id="divCategory" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 193px;">Khu đô thị mới</span>
            </span>
                <input type="hidden" name="ddlCategoriess" id="hdCategory" value="150">

                <div id="divCatagoryOptions"
                     class="advance-select-options advance-options advance-select-options-2">
                    <ul class="advance-options" style="min-width: 218px;">

                        <li vl="148" class="advance-options" style="min-width: 186px;">Khu dân cư</li>
                        <li vl="150" class="advance-options current" style="min-width: 186px;">Khu đô thị mới</li>
                        <li vl="155" class="advance-options" style="min-width: 186px;">Khu căn hộ</li>
                        <li vl="156" class="advance-options" style="min-width: 186px;">Cao ốc văn phòng</li>
                        <li vl="157" class="advance-options" style="min-width: 186px;">Khu thương mại dịch vụ</li>
                        <li vl="158" class="advance-options" style="min-width: 186px;">Khu du lịch- nghỉ dưỡng</li>
                        <li vl="159" class="advance-options" style="min-width: 186px;">Khu công nghiệp</li>
                        <li vl="160" class="advance-options" style="min-width: 186px;">Khu phức hợp</li>
                        <li vl="161" class="advance-options" style="min-width: 186px;">Dự án khác</li>
                    </ul>
                </div>
            </div>
            <div class="t_gr">
                Tỉnh/ Thành phố
            </div>
            <div id="divCity" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 193px;">Long An</span>
            </span>
                <input type="hidden" name="ddlCities" id="hdCity" value="LA">

                <div id="divCityOptions" class="advance-select-options advance-options advance-select-options-2">
                    <ul class="advance-options" style="min-width: 218px;">

                        <li vl="CN" class="advance-options" style="min-width: 186px;">Chọn tỉnh thành</li>
                        <li vl="SG" class="advance-options" style="min-width: 186px;">Hồ Chí Minh</li>
                        <li vl="HN" class="advance-options" style="min-width: 186px;">Hà Nội</li>
                        <li vl="BD" class="advance-options" style="min-width: 186px;">Bình Dương</li>
                        <li vl="DDN" class="advance-options" style="min-width: 186px;">Đà Nẵng</li>
                        <li vl="HP" class="advance-options" style="min-width: 186px;">Hải Phòng</li>
                        <li vl="LA" class="advance-options current" style="min-width: 186px;">Long An</li>
                        <li vl="VT" class="advance-options" style="min-width: 186px;">Bà Rịa Vũng Tàu</li>
                        <li vl="AG" class="advance-options" style="min-width: 186px;">An Giang</li>
                        <li vl="BG" class="advance-options" style="min-width: 186px;">Bắc Giang</li>
                        <li vl="BK" class="advance-options" style="min-width: 186px;">Bắc Kạn</li>
                        <li vl="BL" class="advance-options" style="min-width: 186px;">Bạc Liêu</li>
                        <li vl="BN" class="advance-options" style="min-width: 186px;">Bắc Ninh</li>
                        <li vl="BTR" class="advance-options" style="min-width: 186px;">Bến Tre</li>
                        <li vl="BDD" class="advance-options" style="min-width: 186px;">Bình Định</li>
                        <li vl="BP" class="advance-options" style="min-width: 186px;">Bình Phước</li>
                        <li vl="BTH" class="advance-options" style="min-width: 186px;">Bình Thuận</li>
                        <li vl="CM" class="advance-options" style="min-width: 186px;">Cà Mau</li>
                        <li vl="CT" class="advance-options" style="min-width: 186px;">Cần Thơ</li>
                        <li vl="CB" class="advance-options" style="min-width: 186px;">Cao Bằng</li>
                        <li vl="DDL" class="advance-options" style="min-width: 186px;">Đắk Lắk</li>
                        <li vl="DNO" class="advance-options" style="min-width: 186px;">Đắk Nông</li>
                        <li vl="DDB" class="advance-options" style="min-width: 186px;">Điện Biên</li>
                        <li vl="DNA" class="advance-options" style="min-width: 186px;">Đồng Nai</li>
                        <li vl="DDT" class="advance-options" style="min-width: 186px;">Đồng Tháp</li>
                        <li vl="GL" class="advance-options" style="min-width: 186px;">Gia Lai</li>
                        <li vl="HG" class="advance-options" style="min-width: 186px;">Hà Giang</li>
                        <li vl="HNA" class="advance-options" style="min-width: 186px;">Hà Nam</li>
                        <li vl="HT" class="advance-options" style="min-width: 186px;">Hà Tĩnh</li>
                        <li vl="HD" class="advance-options" style="min-width: 186px;">Hải Dương</li>
                        <li vl="HGI" class="advance-options" style="min-width: 186px;">Hậu Giang</li>
                        <li vl="HB" class="advance-options" style="min-width: 186px;">Hòa Bình</li>
                        <li vl="HY" class="advance-options" style="min-width: 186px;">Hưng Yên</li>
                        <li vl="KH" class="advance-options" style="min-width: 186px;">Khánh Hòa</li>
                        <li vl="KG" class="advance-options" style="min-width: 186px;">Kiên Giang</li>
                        <li vl="KT" class="advance-options" style="min-width: 186px;">Kon Tum</li>
                        <li vl="LCH" class="advance-options" style="min-width: 186px;">Lai Châu</li>
                        <li vl="LDD" class="advance-options" style="min-width: 186px;">Lâm Đồng</li>
                        <li vl="LS" class="advance-options" style="min-width: 186px;">Lạng Sơn</li>
                        <li vl="LCA" class="advance-options" style="min-width: 186px;">Lào Cai</li>
                        <li vl="NDD" class="advance-options" style="min-width: 186px;">Nam Định</li>
                        <li vl="NA" class="advance-options" style="min-width: 186px;">Nghệ An</li>
                        <li vl="NB" class="advance-options" style="min-width: 186px;">Ninh Bình</li>
                        <li vl="NT" class="advance-options" style="min-width: 186px;">Ninh Thuận</li>
                        <li vl="PT" class="advance-options" style="min-width: 186px;">Phú Thọ</li>
                        <li vl="PY" class="advance-options" style="min-width: 186px;">Phú Yên</li>
                        <li vl="QB" class="advance-options" style="min-width: 186px;">Quảng Bình</li>
                        <li vl="QNA" class="advance-options" style="min-width: 186px;">Quảng Nam</li>
                        <li vl="QNG" class="advance-options" style="min-width: 186px;">Quảng Ngãi</li>
                        <li vl="QNI" class="advance-options" style="min-width: 186px;">Quảng Ninh</li>
                        <li vl="QT" class="advance-options" style="min-width: 186px;">Quảng Trị</li>
                        <li vl="ST" class="advance-options" style="min-width: 186px;">Sóc Trăng</li>
                        <li vl="SL" class="advance-options" style="min-width: 186px;">Sơn La</li>
                        <li vl="TNI" class="advance-options" style="min-width: 186px;">Tây Ninh</li>
                        <li vl="TB" class="advance-options" style="min-width: 186px;">Thái Bình</li>
                        <li vl="TN" class="advance-options" style="min-width: 186px;">Thái Nguyên</li>
                        <li vl="TH" class="advance-options" style="min-width: 186px;">Thanh Hóa</li>
                        <li vl="TTH" class="advance-options" style="min-width: 186px;">Thừa Thiên Huế</li>
                        <li vl="TG" class="advance-options" style="min-width: 186px;">Tiền Giang</li>
                        <li vl="TV" class="advance-options" style="min-width: 186px;">Trà Vinh</li>
                        <li vl="TQ" class="advance-options" style="min-width: 186px;">Tuyên Quang</li>
                        <li vl="VL" class="advance-options" style="min-width: 186px;">Vĩnh Long</li>
                        <li vl="VP" class="advance-options" style="min-width: 186px;">Vĩnh Phúc</li>
                        <li vl="YB" class="advance-options" style="min-width: 186px;">Yên Bái</li>
                    </ul>
                </div>
            </div>
            <div class="t_gr">
                Quận/ Huyện
            </div>
            <div id="divDistrict" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 193px;">Đức Hòa</span>
            </span>
                <input type="hidden" name="ddlDistricts" id="hdDistrict" value="419">

                <div id="divDistrictOptions"
                     class="advance-select-options advance-options advance-select-options-2">
                    <ul class="advance-options" style="min-width: 218px;">

                        <li vl="0" class="advance-options" style="min-width: 186px;">Chọn quận huyện</li>
                        <li vl="415" class="advance-options" style="min-width: 186px;">Bến Lức</li>
                        <li vl="416" class="advance-options" style="min-width: 186px;">Cần Đước</li>
                        <li vl="417" class="advance-options" style="min-width: 186px;">Cần Giuộc</li>
                        <li vl="418" class="advance-options" style="min-width: 186px;">Châu Thành</li>
                        <li vl="419" class="advance-options current" style="min-width: 186px;">Đức Hòa</li>
                        <li vl="420" class="advance-options" style="min-width: 186px;">Đức Huệ</li>
                        <li vl="421" class="advance-options" style="min-width: 186px;">Mộc Hóa</li>
                        <li vl="422" class="advance-options" style="min-width: 186px;">Tân Hưng</li>
                        <li vl="423" class="advance-options" style="min-width: 186px;">Tân Thạnh</li>
                        <li vl="424" class="advance-options" style="min-width: 186px;">Tân Trụ</li>
                        <li vl="425" class="advance-options" style="min-width: 186px;">Thạnh Hóa</li>
                        <li vl="426" class="advance-options" style="min-width: 186px;">Thủ Thừa</li>
                        <li vl="427" class="advance-options" style="min-width: 186px;">Vĩnh Hưng</li>
                        <li vl="429" class="advance-options" style="min-width: 186px;">Tân An</li>
                        <li vl="724" class="advance-options" style="min-width: 186px;">Kiến Tường</li>
                    </ul>
                </div>
            </div>
            <div class="t_gr" style="text-align: center;">
                <input type="submit" name="ctl00$ctl32$ctl01$btnSearch" value="Tìm kiếm" id="ctl32_ctl01_btnSearch"
                       class="searchbutton">
            </div>
        </div>
    </div>
    <style type="text/css">
        .searchbutton {
            margin: 0 !important;
            margin-top: 10px !important;
        }
    </style>
    <script type="text/javascript"
            src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jquery.AdvanceHiddenDropbox(1).js"></script>
    <script type="text/javascript">

        var hdbCategory = $('#divCategory').AdvanceHiddenDropbox({
            id: 'divCatagoryOptions',
            hddValue: 'hdCategory'
        });

        var hdbCity = $('#divCity').AdvanceHiddenDropbox({
            id: 'divCityOptions',
            hddValue: 'hdCity'
        });

        var hdbDistrict = $('#divDistrict').AdvanceHiddenDropbox({
            id: 'divDistrictOptions',
            hddValue: 'hdDistrict'
        });

        $(function () {

            hdbCity.BindChangeEvent({city: hdbCity, distr: hdbDistrict}, function (_scope) {

                var cityCode = _scope.city.GetValue();
                if (cityCode.length > 0) {
                    $.get("/HandlerWeb/AddressHandler.ashx?type=district&code=" + cityCode, function (data) {
                        if (data != null) {
                            var _html = '';
                            _html += '<li vl="0" class="advance-options">Chọn quận huyện</li>';

                            $.each(data, function (index, item) {
                                _html += '<li vl="' + item.id + '" class="advance-options">' + item.name + '</li>';
                            });

                            _scope.distr.UpdateOptions(_html);
                            _scope.distr.SetValue(0);
                        }
                    });
                }

            });
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
<div class="enterprise-rightContent">
    <div class="rc11">
        <div class="title-style">
            <h3>DOANH NGHIỆP TIÊU BIỂU</h3>
        </div>
    </div>
    <div class="rc12">

        <div class="vip-row">
            <div class="enterprise-vip-img">
                <a href="http://batdongsan.com.vn/dau-tu-du-an-quan-3/cong-ty-co-phan-dau-tu-phat-trien-song-da-ep499">
                    <img class="img"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.1887.jpg"
                         alt="Công ty Cổ phần Đầu tư Phát triển Sông Đà">
                </a>
            </div>
            <div class="enterprise-vip-link">
                <a href="http://batdongsan.com.vn/dau-tu-du-an-quan-3/cong-ty-co-phan-dau-tu-phat-trien-song-da-ep499"
                   title="Công ty Cổ phần Đầu tư Phát triển Sông Đà"> Công ty Cổ phần Đầu tư Phát triển Sông Đà</a>
            </div>
        </div>
        <div class="clear">
        </div>

        <div class="vip-row">
            <div class="enterprise-vip-img">
                <a href="http://batdongsan.com.vn/dau-tu-du-an-dong-da/tong-cong-ep38">
                    <img class="img"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.442353.jpg"
                         alt="Tổng Công ty Đầu tư Phát triển Nhà và Đô thị HUD">
                </a>
            </div>
            <div class="enterprise-vip-link">
                <a href="http://batdongsan.com.vn/dau-tu-du-an-dong-da/tong-cong-ep38"
                   title="Tổng Công ty Đầu tư Phát triển Nhà và Đô thị HUD"> Tổng Công ty Đầu tư Phát triển Nhà và Đô
                    thị HUD</a>
            </div>
        </div>
        <div class="clear">
        </div>

        <div class="vip-row">
            <div class="enterprise-vip-img">
                <a href="http://batdongsan.com.vn/tu-van-moi-gioi-bat-dong-san-quan-1/cong-ty-cb-ep68">
                    <img class="img"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.327785.jpg"
                         alt="Công ty CB Richard Ellis Việt Nam (CBRE)">
                </a>
            </div>
            <div class="enterprise-vip-link">
                <a href="http://batdongsan.com.vn/tu-van-moi-gioi-bat-dong-san-quan-1/cong-ty-cb-ep68"
                   title="Công ty CB Richard Ellis Việt Nam (CBRE)"> Công ty CB Richard Ellis Việt Nam (CBRE)</a>
            </div>
        </div>
        <div class="clear">
        </div>

        <div class="vip-row">
            <div class="enterprise-vip-img">
                <a href="http://batdongsan.com.vn/xay-dung-dau-tu-bds-dong-da/tong-cong-ty-cp-xuat-nhap-khau-va-xay-dung-viet-nam-ep279">
                    <img class="img"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.1679.jpg"
                         alt="Tổng công ty CP Xuất nhập khẩu và Xây dựng Việt Nam">
                </a>
            </div>
            <div class="enterprise-vip-link">
                <a href="http://batdongsan.com.vn/xay-dung-dau-tu-bds-dong-da/tong-cong-ty-cp-xuat-nhap-khau-va-xay-dung-viet-nam-ep279"
                   title="Tổng công ty CP Xuất nhập khẩu và Xây dựng Việt Nam"> Tổng công ty CP Xuất nhập khẩu và Xây
                    dựng Việt Nam</a>
            </div>
        </div>
        <div class="clear">
        </div>

        <div class="vip-row">
            <div class="enterprise-vip-img">
                <a href="http://batdongsan.com.vn/tu-van-moi-gioi-bat-dong-san-cau-giay/cong-ty-co-ep288">
                    <img class="img"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.1686.jpg"
                         alt="Công ty Cổ phần Bất động sản B.D.S">
                </a>
            </div>
            <div class="enterprise-vip-link">
                <a href="http://batdongsan.com.vn/tu-van-moi-gioi-bat-dong-san-cau-giay/cong-ty-co-ep288"
                   title="Công ty Cổ phần Bất động sản B.D.S"> Công ty Cổ phần Bất động sản B.D.S</a>
            </div>
        </div>
        <div class="clear">
        </div>

    </div>
</div>

<div style="clear:both;"></div>
<!--//Modules/Enterprise/Viewer/TypicalEnterprise/TypicalEnterprise.ascx-->
<div class="container-common">
    <div id="ctl35_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>HỎI - ĐÁP</div>
        </div>
    </div>
    <div id="ctl35_BodyContainer" class="bor_box">

        <div class="list">
            <ul>

                <li>
                    <a href="http://batdongsan.com.vn/hd-bai-tri-nha-cua-theo-phong-thuy/xin-hoi-cach-chon-va-bo-tri-den-cho-khu-vuon-them-dep-fq44660"
                       title="Xin hỏi cách chọn và bố trí đèn cho khu vườn thêm đẹp?"><span class="faq-name">
            Xin hỏi cách chọn và bố trí đèn cho khu vườn thêm đẹp?</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-nha-pho/tu-van-xay-nha-khoang-120m2-fq44657"
                       title="Tư vấn xây nhà khoảng 120m2"><span class="faq-name">
            Tư vấn xây nhà khoảng 120m2</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-nha-pho/tu-van-xay-nha-3-tang-dien-tich-7-5m-x-4-3-m-fq44655"
                       title="Tư vấn xây nhà 3 tầng, diện tích 7.5m x 4.3 m"><span class="faq-name">
            Tư vấn xây nhà 3 tầng, diện tích 7.5m x 4.3 m</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-thiet-ke-khac/thiet-ke-sua-lai-nha-cap-4-fq44651"
                       title="Thiết kế sửa lại nhà cấp 4"><span class="faq-name">
            Thiết kế sửa lại nhà cấp 4</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-xay-dung-hoan-cong/quy-hoach-duong-vanh-dai-fq44650"
                       title="Quy hoạch đường vành đai"><span class="faq-name">
            Quy hoạch đường vành đai</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-giai-phap-xay-dung/tu-van-xay-nha-4x12m-fq44648"
                       title="Tư vấn xây nhà 4x12m"><span class="faq-name">
            Tư vấn xây nhà 4x12m</span> </a></li>

            </ul>
        </div>


        <div class="faq_box">
            <label>Gửi câu hỏi của bạn tại đây</label>
            <textarea name="txtContent" rows="2" cols="20" id="txtContent"></textarea>

            <div>
                <input type="button" name="btnSend" value="Gửi câu hỏi" id="btnSend" class="buttonSend"
                       onclick="SendFAQ();">
            </div>
        </div>

        <script language="javascript">
            function SendFAQ() {
                var content = $("#txtContent").val();
                if (content != "") {
                    if (localStorage) {
                        localStorage["FAQQuestion"] = content;
                    }

                    window.location.href = "/dang-tin-hoi-dap";
                }

                return false;
            }
        </script>

    </div>
    <div id="ctl35_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
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