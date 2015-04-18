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
<div id="ctl29_BodyContainer">

<div class="product-list product-list-page">
<div class="Title">
    <h1>
        Nhà đất bán tại Việt Nam</h1>

    <div class="Footer">
        Có <span class="greencolor"><strong>58,753</strong></span> bất động sản.
    </div>
</div>
<div id="bannerQC">
    <div class="adPosition" positioncode="BANNER_POSITION_HORIZONTAL_MAIN_CONTENT" stylex="" hasshare="True"
         hasnotshare="True"></div>
</div>

<div class="Main">
<div class="Header">
    <ul class="header-tab filter">
        <li class="active" rel="all"><span><span style="white-space:nowrap;">
                    <a onclick="ChangeTypeListProduct(&#39;all&#39;);" id="ctl29_ctl01_blFilterAll"
                       href="javascript:__doPostBack('ctl00$ctl29$ctl01$blFilterAll','')">Tất cả tin rao</a>
                    (58753) </span></span></li>
    </ul>
    <input type="hidden" name="ctl00$ctl29$ctl01$hddFilter" id="ctl29_ctl01_hddFilter">

    <div class="Repeat">
        <h2>
            Nhà đất bán Việt Nam</h2>

        <div class="order">
            <span>Sắp xếp theo: </span>
            <select name="ctl00$ctl29$ctl01$ddlSortReult"
                    onchange="sortchange();setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl29$ctl01$ddlSortReult\&#39;,\&#39;\&#39;)&#39;, 0)"
                    id="ddlSortReult">
                <option value="0">Thông thường</option>
                <option value="1">Tin mới nhất</option>
                <option value="2">Giá thấp nhất</option>
                <option value="3">Giá cao nhất</option>
                <option value="4">Diện tích nhỏ nhất</option>
                <option value="5">Diện tích lớn nhất</option>

            </select></div>
    </div>
</div>
<div class="clear">
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


</div>
</div>
<div class="clear">
</div>
<div class="tagpanel"> Tìm kiếm theo từ khóa: &nbsp;<a title="Bán đất nền giá rẻ"
                                                       href="http://batdongsan.com.vn/tags/ban/ban-dat-nen-gia-re">Bán
        đất nền giá rẻ</a>,&nbsp;<a title="Bán đất gần chợ Lái Thiêu"
                                    href="http://batdongsan.com.vn/tags/ban/ban-dat-gan-cho-lai-thieu">Bán đất gần chợ Lái
        Thiêu</a>,&nbsp;<a title="Bán đất nền giá rẻ Quận 7"
                           href="http://batdongsan.com.vn/tags/ban/ban-dat-nen-gia-re-quan-7">Bán đất nền giá rẻ Quận 7</a>,&nbsp;<a
        title="Bán đất nền giá rẻ Tp.HCM" href="http://batdongsan.com.vn/tags/ban/ban-dat-nen-gia-re-tphcm">Bán đất nền
        giá rẻ Tp.HCM</a>,&nbsp;<a title="Bán đất giá rẻ Bình Dương"
                                   href="http://batdongsan.com.vn/tags/ban/ban-dat-gia-re-binh-duong">Bán đất giá rẻ Bình
        Dương</a>,&nbsp;<a title="Bán đất giá rẻ Quận 8" href="http://batdongsan.com.vn/tags/ban/ban-dat-gia-re-quan-8">Bán
        đất giá rẻ Quận 8</a></div>
<div class="separable">
</div>

<style>
    #div_linkPostAdNews {
        color: #3e9c10;
        font-family: arial;
        font-size: 12px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #div_linkPostAdNews a {
        background: url("/images/bg-btn-postAdNew-Details.png") no-repeat scroll 0 0 #fff;
        color: #fff;
        display: inline-block;
        font-family: arial;
        font-size: 12px;
        font-weight: bold;
        line-height: 29px;
        margin: 0;
        padding: 0;
        width: 365px;
        text-align: center;
    }

</style>


<script type="text/javascript">

    function sortchange() {
        setCookie('psortfilter', $('#ddlSortReult').val() + '$' + $('ul.filter > li.active').attr('rel') + '$' + '/nha-dat-ban', 1);
    }

    function ChangeTypeListProduct(type) {
        setCookie('psortfilter', $('#ddlSortReult').val() + '$' + type + '$' + '/nha-dat-ban', 1);
    }

    function linkPostAdNewClick(data) {
        setCookie('POST_ADNEW_LOCATION', data, 1);
        return true;
    }

    function displayProjectInfo() {
        $(".project-container").css("display", "block");
        $("#ctl29_ctl01_ltrTagsLocation").hide();
        $(".search-productItem").hide();
        $("#ctl29_ctl01_pnlNotFound").hide();
        //$(".Repeat").hide();
        $("ul.header-tab li").removeClass("active");
        $("#liProjectInfo").addClass("active");
    }
</script>

<style>

    .project-container {
        display: none;
    }

    .divProjectInfo {
        /*display: none;*/
        padding: 8px;
        margin: 0px;
        border: 1px solid #d7d7d7;
        border-width: 0 1px 1px;
        min-height: 150px;
    }

    .divProjectInfo-left {
        float: left;
        width: 200px;
        height: 150px;
    }

    .divProjectInfo-left img {
        width: 200px;
        height: 150px;
    }

    .divProjectInfo-right {
        float: left;
        padding-left: 10px;
    }

    .divProjectInfo-right > div {
        padding: 3px 2px;
    }

    .divProjectInfo-right .infoName {
        color: #055699;
    }

    .divProjectInfo-right #ProjName {
        color: #055699;
        font-size: 18px;
        font-weight: bold;
    }

    .project-container a.lnkProjectDetail {
        color: #055699;
        background: url("/Images/project-details-icon.png") no-repeat 0 0 #ffffff;
        width: 96px;
        height: 25px;
        display: inline-block;
        line-height: 25px;
        margin-top: 10px;
    }
</style>
</div>

</div>
<!--//Modules/Search/SearchResult/ucProductSearchResult.ascx--></div>
</div>
<div id="RightMainContent" class="body-right">

<!--//Modules/Search/ucSearchContext.ascx--><input type="hidden" name="ctl00$ctl31$ctl01$areaCount" id="areaCount">
<input type="hidden" name="ctl00$ctl31$ctl01$priceCount" id="priceCount">
<input type="hidden" name="ctl00$ctl31$ctl01$roomCount" id="roomCount">

<div id="ctl31_ctl01_HeaderContainer" class="box-header1">
    <div align="center" class="name_tit1 new-header">
        Nhà đất bán
    </div>
</div>
<div id="ctl31_ctl01_bodyContainer" class="bor_box">
    <div id="div_count_product">
        <div id="divCountByAreas">

            <ul>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-tp-hcm">
                        Hồ Chí Minh</a> (16428)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-ha-noi">
                        Hà Nội</a> (11818)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-binh-duong">
                        Bình Dương</a> (1052)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-da-nang">
                        Đà Nẵng</a> (2195)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-hai-phong">
                        Hải Phòng</a> (1652)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-ha-tinh">
                        Hà Tĩnh</a> (37)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-quang-tri">
                        Quảng Trị</a> (37)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-vinh-long">
                        Vĩnh Long</a> (52)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-dak-nong">
                        Đắk Nông</a> (26)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-an-giang">
                        An Giang</a> (79)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-hau-giang">
                        Hậu Giang</a> (25)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-long-an">
                        Long An</a> (680)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-ninh-thuan">
                        Ninh Thuận</a> (47)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-dien-bien">
                        Điện Biên</a> (7)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-ha-nam">
                        Hà Nam</a> (50)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-quang-ninh">
                        Quảng Ninh</a> (176)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-vinh-phuc">
                        Vĩnh Phúc</a> (74)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-gia-lai">
                        Gia Lai</a> (65)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-ha-giang">
                        Hà Giang</a> (6)
                </li>

                <li><a href="http://batdongsan.com.vn/nha-dat-ban-can-tho">
                        Cần Thơ</a> (170)
                </li>

            </ul>

        </div>
        <div class="Project">

        </div>
        <div class="show3">
        </div>
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<script>
    var p_leng = $(".Project ul li").length;
    if (p_leng > 15) {
        for (var i = 14; i < p_leng; i++) {
            if (i > 15) {
                $(".Project ul li").eq(i).css("display", "none");
            }
        }
    }
    else
        $(".show_p").hide();


    $(function () {
        $(".show_p").click(function () {
            $(this).hide();
            $(".Project ul li").css("display", "block");
        });
    });

</script>


<div style="clear:both;"></div>
<!--//Modules/Views/Product/ucProductCountByContext2.ascx--><input type="hidden" name="ctl00$ctl32$ctl01$areaCount"
                                                                   id="areaCount">
<input type="hidden" name="ctl00$ctl32$ctl01$priceCount" id="priceCount">
<input type="hidden" name="ctl00$ctl32$ctl01$roomCount" id="roomCount">

<div id="ctl32_ctl01_HeaderContainer" class="box-header1 checkrun">
    <div align="center" class="name_tit1 new-header">
        LIÊN KẾT NỔI BẬT
    </div>
</div>
<div id="ctl32_ctl01_bodyContainer" class="bor_box checkrun">
    <div id="div_count_product">
        <div id="divCountByAreas">

            <ul>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hh4-linh-dam">
                        Chung cư HH4 Linh Đàm</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-green-stars">
                        Chung cư Green Stars</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-89-phung-hung">
                        Chung cư 89 Phùng Hưng</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-8x-plus-truong-chinh">
                        Căn hộ 8x Plus</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-vista-verde">
                        Căn hộ Vista Verde</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hh3-linh-dam">
                        Chung cư HH3 Linh đàm</a></li>

            </ul>


        </div>
        <div class="show3">
        </div>
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>


<div style="clear:both;"></div>
<!--//Modules/Views/Product/BoxKeyword.ascx-->
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;"></div>

<div style="clear:both;"></div>
<!--//Modules/Banner/Preview/MainRight/BannerPreviewMainRight.ascx-->

<div class="container-default">
    <div id="ctl34_BodyContainer">
        <div class="box-bg-right">
            <ul>
                <li>
                    <a href="http://batdongsan.com.vn/phong-thuy-theo-tuoi/phong-thuy-theo-tuoi-ft0"
                       onclick="SetType(&#39;2&#39;)" style="white-space: nowrap;font-size: 11.5px;">
                        <img alt="Xem phong thủy theo tuổi"
                             src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/batquai.png" width="24px">XEM PHONG THỦY
                        THEO TUỔI
                    </a>
                </li>
                <li>
                    <a id="ctl46_ctl01_LinkButton1"
                       href="http://batdongsan.com.vn/phong-thuy-theo-tuoi/phong-thuy-theo-tuoi-ft0#cost"
                       onclick="SetType(&#39;3&#39;)">
                        <img alt="Tính lãi suất" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/Info.png">TÍNH LÃI
                        SUẤT
                    </a>
                </li>
            </ul>
        </div>
        <script type="text/javascript">
            function SetType(t) {
                if (localStorage) localStorage["FSType"] = t;
            }
        </script>

    </div>

</div>
<!--//Modules/FengShui/FengShuiLink/View.ascx-->

<div class="container-default">
    <div id="ctl35_BodyContainer">
        <div id="bannerfix">
            <div class="adPosition" positioncode="BANNER_POSITION_FIX"
                 stylex="position:fixed; bottom:0px; right:0px; z-index:100;"></div>
        </div>

    </div>

</div>
<!--//Modules/Banner/Preview/BottomFix/BannerPreviewBottomFix.ascx-->

<link href="<?php echo Yii::app()->baseUrl?>/themes/web/files/css//home.css" rel="stylesheet" type="text/css">
<div class="box1">
    <h3 class="h1">
        Thông tin hỗ trợ</h3>
    <ul>
        <li><a href="http://batdongsan.com.vn/trang-bang-gia-du-an" title="Bảng giá dự án" rel="nofollow">Bảng giá dự
                án</a></li>

        <li><a href="http://batdongsan.com.vn/bang-gia-dat" title="Bảng giá đất 2015" rel="nofollow">Bảng giá đất
                2015</a></li>
        <li class="last"><a href="http://batdongsan.com.vn/van-ban-nganh-xay-dung" title="Văn bản ngành xây dựng"
                            rel="nofollow">Văn bản ngành xây dựng</a></li>
    </ul>
    <div class="clear">
    </div>
</div>
<div class="box1">
    <h3 class="h1">
        Dành cho người xây nhà</h3>
    <ul>
        <li><a href="http://batdongsan.com.vn/trang-vat-lieu-xay-dung" title="Cập nhật giá Vật liệu xây dựng"
               rel="nofollow">Cập nhật giá VLXD</a></li>
        <li><a href="http://batdongsan.com.vn/quy-trinh-xay-nha" title="Quy trình xây nhà" rel="nofollow">Quy trình xây
                nhà</a></li>
        <li><a href="http://batdongsan.com.vn/phong-thuy-theo-tuoi#chiphi" title="Dự tính chi phí xây dựng"
               rel="nofollow">Dự tính chi phí xây dựng</a></li>
        <li class="last"><a href="http://batdongsan.com.vn/phong-thuy-theo-tuoi" title="Xem tuổi làm nhà"
                            rel="nofollow">Xem tuổi làm nhà</a></li>
    </ul>
    <div class="clear">
    </div>
</div>
<!--/#box1-->


<div style="clear:both;"></div>
<!--//Modules/Support/FrontEnd/common/SupportInfo.ascx--></div>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>