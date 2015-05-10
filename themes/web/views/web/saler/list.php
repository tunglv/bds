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
        background-color: #008b33;
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
<div>
    <div class="listcompany">
        <h1><span>DANH BẠ NHÀ MÔI GIỚI</span></h1>
    </div>
    <div class="searchCondition">
        <div class="codition">

        </div>
    </div>
</div>
<h4 class="totalbroker">
</h4>


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


<!--<div class="pager-block" style="float: right; margin-right: 5px; margin-top: 5px;">-->
<!--    <a href="./Môi giới nhà đất   Các cá nhân, công ty môi giới nhà đất_files/Môi giới nhà đất   Các cá nhân, công ty môi giới nhà đất.html">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            width: auto;-->
<!--            color: #000000;-->
<!--            text-decoration: none;-->
<!--            height: 23px;-->
<!--            line-height: 23px;-->
<!--            float: left;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px;-->
<!--            border: 1px solid #ccc;" class="style-pager-row-selected" align="center">1-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p2">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            width: auto;-->
<!--            color: #000000;-->
<!--            text-decoration: none;-->
<!--            height: 23px;-->
<!--            line-height: 23px;-->
<!--            float: left;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px;-->
<!--            border: 1px solid #ccc;" align="center">2-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p3">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            width: auto;-->
<!--            color: #000000;-->
<!--            text-decoration: none;-->
<!--            height: 23px;-->
<!--            line-height: 23px;-->
<!--            float: left;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px;-->
<!--            border: 1px solid #ccc;" align="center">3-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p4">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            width: auto;-->
<!--            color: #000000;-->
<!--            text-decoration: none;-->
<!--            height: 23px;-->
<!--            line-height: 23px;-->
<!--            float: left;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px;-->
<!--            border: 1px solid #ccc;" align="center">4-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p5">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            width: auto;-->
<!--            color: #000000;-->
<!--            text-decoration: none;-->
<!--            height: 23px;-->
<!--            line-height: 23px;-->
<!--            float: left;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px;-->
<!--            border: 1px solid #ccc;" align="center">5-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p2">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            margin-right: 2px;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px ;-->
<!--            width: auto;-->
<!--            height: 23px;-->
<!--            color: #000000  ;-->
<!--            text-decoration: none ;-->
<!--            line-height: 23px ;-->
<!--            float: left;-->
<!--            border: 1px solid #ccc;" align="center">...-->
<!--        </div>-->
<!--    </a><a href="http://batdongsan.com.vn/nha-moi-gioi/p116">-->
<!--        <div style="-->
<!--            margin-left: 2px;-->
<!--            margin-right: 2px;-->
<!--            padding-left: 6px;-->
<!--            padding-right: 6px ;-->
<!--            width: auto;-->
<!--            height: 23px;-->
<!--            color: #000000  ;-->
<!--            text-decoration: none ;-->
<!--            line-height: 23px ;-->
<!--            float: left;-->
<!--            border: 1px solid #ccc;" align="center">&gt;</div>-->
<!--    </a><span id="ctl28_ctl01_BrokeEnterprisePager"></span>-->
<!--</div>-->
<div id="ctl28_ctl01_plhInform" class="enterprise-search-noresult">


</div>
<div class="class-clear">
</div>
</div>

</div>
<!--//Modules/Broker/View/Brokers.ascx--></div>
</div>
<?php $this->renderPartial('_right_content', array('saler'=>$saler, 'group'=>$group)); ?>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer">
    <ul>
        <li><a href="http://batdongsan.com.vn/tags/ban/ban-nha-ngo-35-cat-linh">bán nhà ngõ 35 cát linh</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/Ban-nha-Khu-tap-the-Thanh-Cong">Bán nhà Khu tập thể Thành
                Công</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-dat-duong-hoang-quoc-viet-7">Bán nhà khu hoàng quốc việt</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-nguyen-trong-tuyen-phuong-8-13">Bán nhà đường Nguyễn
                Trọng Tuyên</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-ba-hom-58">Bán nhà đường Bà Hom Quận 6</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-dich-vong-7">Bán nhà Dịch Vọng Cầu Giấy</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-chu-van-an-66">Bán nhà Chu Văn An Bình Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-bui-dinh-tuy-66">Bán nhà Bùi Đình Túy Bình Thạnh</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-au-co-6">Bán nhà Âu Cơ Tây Hồ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-an-phu-dong-64">Bán nhà An Phú Đông Quận 12</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/tags/ban/ban-chung-cu-royal-city-cat-lo">bán chung cư royal city cắt
                lỗ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-duong-thuy-linh-phuong-linh-nam">Bán đất Thúy Lĩnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-tam-ky-qna">Bán đất tam kỳ quảng nam</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-duong-lang-hoa-lac-22">Bán đất Láng Hòa Lạc</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/Ban-dat-lang-Dai-Hoc">Bán đất làng Đại Học</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-dai-kim">Bán đất Đại Từ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-bo-de">Bán đất bồ đề gia lâm</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-duong-binh-quoi-66">Bán đất Bình Quới</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-duong-nguyen-huy-tuong-5">Bán chung cư nguyễn huy
                tưởng</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/Ban-chung-cu-cuu-long">Bán chung cư cửu long</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/tags/ban/Ban-can-ho-Son-Thinh-Vung-Tau">Bán căn hộ Sơn Thịnh Vũng Tàu</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-yen-hoa-thang-long">Yên Hòa Thăng Long</a>
        </li>
        <li><a href="http://batdongsan.com.vn/cao-oc-van-phong-cau-giay/vimeco-building-pj987">Vimeco Building</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-tuong-binh-hiep">Tương Bình Hiệp</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-kien-an-hp/tinh-thanh-quoc-te-pj967">Tinh Thành Quốc tế</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-thien-nam-apartment">Thiên Nam Apartment</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-the-van-phu-victoria">The Van Phu Victoria</a></li>
        <li><a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-dan-phuong/the-phoenix-garden-pj553">The Phoenix
                Garden</a></li>
        <li><a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-ba-dinh/the-lancaster-ha-noi-pj289">The Lancaster
                Hà Nội</a></li>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-tu-liem/thang-long-mansion-pj806">Thang Long Mansion</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/khu-cong-nghiep-duc-hoa-la/khu-cong-nghiep-tan-do-pj1284">Tân Đô</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/mua-dat-trang-trai-gia-re">mua đất trang trại giá rẻ</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-ba-dinh/chung-cu-so-6-doi-nhan-pj1401">Số 6 Đội Nhân</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sky-city-towers-88-lang-ha">Sky City Towers</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-ba-ria-vt/saigonres-tower-pj376">Saigonres Tower</a></li>
        <li><a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-quan-7/sai-gon-paragon-pj541">Sài Gòn Paragon</a>
        </li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-quan-9/river-valley-pj1005">River Valley</a></li>
        <li><a href="http://batdongsan.com.vn/cao-oc-van-phong-ba-dinh/resco-tower-pj187">Resco Tower</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-nhat-lan">Nhất Lan</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-nen-du-an-khu-do-thi-my-gia">Mỹ Gia</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-m3-m4-nguyen-chi-thanh">M3 M4 Nguyễn Chí
                Thanh</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-quan-1/sai-gon-luxury-apartment-pj694">Luxury Apartment</a>
        </li>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-hoang-mai/to-hop-van-phong-va-nha-o-licogi-12-pj305">Licogi
                12</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-van-khe">KĐT Văn Khê</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-can-ho-chung-cu-indochina-riverside-towers">Indochina
                Riverside</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-go-vap/i-home-1-pj1293">I Home 1</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hung-ngan-garden">Hưng Ngân Garden</a></li>
        <li><a href="http://batdongsan.com.vn/cao-oc-van-phong-ba-dinh/hittc-building-pj1474">HITTC</a></li>
        <li><a href="http://batdongsan.com.vn/cao-oc-van-phong-tu-liem/hh3-tower-pj1465">HH3</a></li>
        <li><a href="http://batdongsan.com.vn/khu-dan-cu-thu-dau-mot-bd/green-pearl-pj934">Green Pearl</a></li>
    </ul>
</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>