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
        <a href="javascript:void(0)"><span style="white-space:nowrap;">Khu đô thị mới</span></a>
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
                <span class="select-text-content" style="width: 193px;">Chọn tỉnh thành</span>
            </span>
                    <input type="hidden" name="ddlCities" id="hdCity" value="CN">

                    <div id="divCityOptions" class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 218px;">

                            <li vl="CN" class="advance-options current" style="min-width: 186px;">Chọn tỉnh thành</li>
                            <li vl="SG" class="advance-options" style="min-width: 186px;">Hồ Chí Minh</li>
                            <li vl="HN" class="advance-options" style="min-width: 186px;">Hà Nội</li>
                            <li vl="BD" class="advance-options" style="min-width: 186px;">Bình Dương</li>
                            <li vl="DDN" class="advance-options" style="min-width: 186px;">Đà Nẵng</li>
                            <li vl="HP" class="advance-options" style="min-width: 186px;">Hải Phòng</li>
                            <li vl="LA" class="advance-options" style="min-width: 186px;">Long An</li>
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
                <span class="select-text-content" style="width: 193px;">Chọn quận huyện</span>
            </span>
                    <input type="hidden" name="ddlDistricts" id="hdDistrict" value="0">

                    <div id="divDistrictOptions"
                         class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 218px;">

                            <li vl="0" class="advance-options current" style="min-width: 186px;">Chọn quận huyện</li>
                        </ul>
                    </div>
                </div>
                <div class="t_gr" style="text-align: center;">
                    <input type="submit" name="ctl00$ctl30$ctl01$btnSearch" value="Tìm kiếm" id="ctl30_ctl01_btnSearch"
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
    <div id="ctl30_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/Project/ProjectSearchBox.ascx-->

<div class="container-default">
<div id="ctl33_BodyContainer">

<div class="body-right">

<div class="caooc-right-top">
    <div class="caooc-right-top-header"><a
            href="./Dự án Khu đô thị mới   Khu đô thị mới_files/Dự án Khu đô thị mới   Khu đô thị mới.html">
            Khu đô thị mới
            (308)</a></div>
    <div class="caooc-right-top-drop">

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-an-giang">
                An Giang
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-binh-duong">
                Bình Dương
                (<span class="countValue">23</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-binh-dinh">
                Bình Định
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-bac-ninh">
                Bắc Ninh
                (<span class="countValue">6</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-can-tho">
                Cần Thơ
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-da-nang">
                Đà Nẵng
                (<span class="countValue">17</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-dong-nai">
                Đồng Nai
                (<span class="countValue">16</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-hoa-binh">
                Hòa Bình
                (<span class="countValue">3</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-ha-noi">
                Hà Nội
                (<span class="countValue">105</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-ha-nam">
                Hà Nam
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-hai-phong">
                Hải Phòng
                (<span class="countValue">7</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-hung-yen">
                Hưng Yên
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-kien-giang">
                Kiên Giang
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-khanh-hoa">
                Khánh Hòa
                (<span class="countValue">14</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-long-an">
                Long An
                (<span class="countValue">8</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-lao-cai">
                Lào Cai
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-lam-dong">
                Lâm Đồng
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-lang-son">
                Lạng Sơn
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-nghe-an">
                Nghệ An
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-nam-dinh">
                Nam Định
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-ninh-thuan">
                Ninh Thuận
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-phu-tho">
                Phú Thọ
                (<span class="countValue">3</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-quang-nam">
                Quảng Nam
                (<span class="countValue">7</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-quang-ngai">
                Quảng Ngãi
                (<span class="countValue">2</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-quang-ninh">
                Quảng Ninh
                (<span class="countValue">5</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-tp-hcm">
                Hồ Chí Minh
                (<span class="countValue">61</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-thanh-hoa">
                Thanh Hóa
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-thai-nguyen">
                Thái Nguyên
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-thua-thien-hue">
                Thừa Thiên Huế
                (<span class="countValue">4</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-vinh-long">
                Vĩnh Long
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-vinh-phuc">
                Vĩnh Phúc
                (<span class="countValue">1</span>)</a>
        </div>

        <div class="caooc-right-top-cap1">
            <a style="color: black" href="http://batdongsan.com.vn/khu-do-thi-moi-ba-ria-vung-tau">
                Bà Rịa Vũng Tàu
                (<span class="countValue">3</span>)</a>
        </div>

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-dan-cu">
        Khu dân cư
        (214)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-can-ho">
        Khu căn hộ
        (673)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu">
        Khu thương mại dịch vụ
        (59)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-du-lich-nghi-duong">
        Khu du lịch- nghỉ dưỡng
        (109)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-cong-nghiep">
        Khu công nghiệp
        (22)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/khu-phuc-hop">
        Khu phức hợp
        (187)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/du-an-khac">
        Dự án khác
        (59)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

<div class="caooc-right-top-cap2">
    <a style="color: black" href="http://batdongsan.com.vn/cao-oc-van-phong">
        Cao ốc văn phòng
        (211)</a>

    <div class="caooc-right-top-drop">

    </div>
</div>

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
    <div id="ctl36_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <h3 style="color: White;">
                Dự án nổi bật</h3>
        </div>
    </div>
    <div id="ctl36_BodyContainer" class="bor_box">


        <div style="text-align: center; margin-top:5px;height:365px;overflow:auto;"
             class="customeScrollbar mCustomScrollbar _mCS_1">
            <div class="mCustomScrollBox mCS-light" id="mCSB_1"
                 style="position:relative; height:100%; overflow:hidden; max-width:100%;">
                <div class="mCSB_container" style="position: relative; top: 0px;">

                    <div>
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                           title="Lâm Viên Villas">
                            <img
                                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/20150211150707-fc33(1).jpg"
                                width="156" height="100" alt="Lâm Viên Villas">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                           title="Lâm Viên Villas">
                            Lâm Viên Villas
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/du-an/dragon-city.html"
                           title="Dragon Parc" target="_blank" rel="nofollow">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.509866.jpg"
                                 width="156"
                                 height="100" alt="Dragon Parc">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/du-an/dragon-city.html"
                           title="Dragon Parc" target="_blank" rel="nofollow">
                            Dragon Parc
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/HTML_ThaoNTT_TAN%20PHUOC/TanPhuoc.html"
                           title="Tân Phước Plaza" target="_blank" rel="nofollow">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.439843.jpg"
                                 width="156"
                                 height="100" alt="Tân Phước Plaza">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/HTML_ThaoNTT_TAN%20PHUOC/TanPhuoc.html"
                           title="Tân Phước Plaza" target="_blank" rel="nofollow">
                            Tân Phước Plaza
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-can-ho-son-tra-ddn/can-ho-cao-cap-azura-pj1015"
                           title="Căn hộ cao cấp Azura">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.508252.jpg"
                                 width="156"
                                 height="100" alt="Căn hộ cao cấp Azura">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-can-ho-son-tra-ddn/can-ho-cao-cap-azura-pj1015"
                           title="Căn hộ cao cấp Azura">
                            Căn hộ cao cấp Azura
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-can-ho-quan-8/chanh-hung-apartment-pj2062"
                           title="Chánh Hưng Apartment">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.504461.jpg"
                                 width="156"
                                 height="100" alt="Chánh Hưng Apartment">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-can-ho-quan-8/chanh-hung-apartment-pj2062"
                           title="Chánh Hưng Apartment">
                            Chánh Hưng Apartment
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070"
                           title="The Mall City II">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.505796.jpg"
                                 width="156"
                                 height="100" alt="The Mall City II">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070"
                           title="The Mall City II">
                            The Mall City II
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-hoi-an-qna/khu-nghi-duong-cam-anhoi-an-pj2045"
                           title="Khu nghỉ dưỡng Cẩm An–Hội An">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.490898.jpg"
                                 width="156"
                                 height="100" alt="Khu nghỉ dưỡng Cẩm An–Hội An">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-hoi-an-qna/khu-nghi-duong-cam-anhoi-an-pj2045"
                           title="Khu nghỉ dưỡng Cẩm An–Hội An">
                            Khu nghỉ dưỡng Cẩm An–Hội An
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-chanh/duong-hong-garden-house-pj1695"
                           title="Dương Hồng Garden House">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.490297.jpg"
                                 width="156"
                                 height="100" alt="Dương Hồng Garden House">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-chanh/duong-hong-garden-house-pj1695"
                           title="Dương Hồng Garden House">
                            Dương Hồng Garden House
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-thanh/dai-phuc-river-view-pj1511"
                           title="Đại Phúc River View">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.424550.jpg"
                                 width="156"
                                 height="100" alt="Đại Phúc River View">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-thanh/dai-phuc-river-view-pj1511"
                           title="Đại Phúc River View">
                            Đại Phúc River View
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-ruby-pj1956" title="Mega Ruby">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.475326.jpg"
                                 width="156"
                                 height="100" alt="Mega Ruby">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-ruby-pj1956" title="Mega Ruby">
                            Mega Ruby
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                </div>
                <div class="mCSB_scrollTools" style="position: absolute; display: block;">
                    <div class="mCSB_draggerContainer">
                        <div class="mCSB_dragger" style="position: absolute; height: 113px; top: 0px;"
                             oncontextmenu="return false;">
                            <div class="mCSB_dragger_bar" style="position: relative; line-height: 113px;"></div>
                        </div>
                        <div class="mCSB_draggerRail"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div id="ctl36_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/Project/ProjectHighlights.ascx-->
<div class="container-common">
    <div id="ctl37_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>CHỦ ĐỀ ĐƯỢC QUAN TÂM</div>
        </div>
    </div>
    <div id="ctl37_BodyContainer" class="bor_box">

        <div class="list">
            <ul>

                <li><a href="http://batdongsan.com.vn/goi-ho-tro-30000-ty-dong" title="Gói hỗ trợ 30.000 tỷ đồng">
                        Gói hỗ trợ 30.000 tỷ đồng</a></li>

                <li><a href="http://batdongsan.com.vn/cap-nhat-tien-do-du-an" title="Cập nhật tiến độ dự án">
                        Cập nhật tiến độ dự án</a></li>

                <li><a href="http://batdongsan.com.vn/bang-gia-dat-nam-2015" title="Bảng giá đất năm 2015">
                        Bảng giá đất năm 2015</a></li>

                <li><a href="http://batdongsan.com.vn/thi-truong-bds-2015" title="Thị trường BĐS 2015">
                        Thị trường BĐS 2015</a></li>

                <li><a href="http://batdongsan.com.vn/bat-dong-san-ha-noi" title="Bất động sản Hà Nội">
                        Bất động sản Hà Nội</a></li>

                <li><a href="http://batdongsan.com.vn/bat-dong-san-tp-hcm" title="Bất động sản Tp.HCM">
                        Bất động sản Tp.HCM</a></li>

                <li><a href="http://batdongsan.com.vn/thi-truong-can-ho-cao-cap" title="Thị trường căn hộ cao cấp">
                        Thị trường căn hộ cao cấp</a></li>

                <li><a href="http://batdongsan.com.vn/thi-truong-can-ho-cho-thue" title="Thị trường căn hộ cho thuê">
                        Thị trường căn hộ cho thuê</a></li>

            </ul>

        </div>


        <div style="padding-left: 20px; padding-top: 5px; border-top: 1px solid #ccc; margin-top: 10px;">
            <a href="http://batdongsan.com.vn/chu-de-trong-chu-de-ve-thong-tin-thi-truong" class="linktoall">Xem tất
                cả</a>
        </div>
    </div>
    <div id="ctl37_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/SubjectLink/View.ascx-->
<div class="container-faq">
    <div id="ctl39_HeaderContainer" class="box-header box-header-bg" style="margin-top: 1px;">
        <div class="name_tit" align="center" style="padding-top: 0px;">
            <h3>Hỏi - đáp</h3>
        </div>
    </div>
    <div id="ctl39_BodyContainer" class="bor_box box-content-bg" style="line-height: 18px;">

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
    <div id="ctl39_FooterContainer" class="Footer">
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
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer">

</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>