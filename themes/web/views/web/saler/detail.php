<style>
    #content-saler img{
        width: 100%;
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
<div id="ctl27_BodyContainer">
<link href="./Công ty Cổ phần Đầu tư Xây dựng Thế giới Bất động sản   Công ty môi giới_files/style(1).css" rel="stylesheet" type="text/css">

<div class="broker-detail">
    <h1 class="list-title-detail">
        <?php echo $saler->name?>
    </h1>

    <div>
        <div class="avamg">
            <img id="ctl27_ctl01_imgLogo" title="<?php echo $saler->name?>" class="img_detail" src="<?php echo $saler->getImageUrl()?>">

            <div class="lienhemg"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-binh-thanh/cong-ty-co-ec1953">Liên hệ</a></div>
        </div>
        <div class="ttmg">
            <div class="left">Địa chỉ</div>
            <div class="right">: <strong><?php echo $saler->address?></strong></div>
            <div class="clear"></div>
            <div class="left">ĐT</div>
            <div class="right">: <?php echo $saler->mobile?></div>
            <div class="clear"></div>
            <div class="left">Fax</div>
            <div class="right">: <?php echo $saler->fax?></div>
            <div class="clear"></div>
            <div class="left">Email</div>
            <div class="right">: <?php echo $saler->email?></div>
            <div class="clear"></div>
            <div class="left">Mã số thuế</div>
            <div class="right">: <?php echo $saler->MST?></div>
            <div class="clear"></div>

            <div class="left">Website</div>
            <div class="right">: <a href="<?php echo $saler->website?>" target="_blank" rel="nofollow"><?php echo $saler->website?></a>
            </div>
            <div class="clear"></div>
            <div class="list-row-detail">
                <div class="info">
            <span class="chat">
                <img alt="Chat" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/icon_chat.gif.png">
                Chat với nhà môi giới
            </span><span class="nickchat">
                <img alt="Yahoo" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/yahoo.gif">
                <a id="ctl27_ctl01_hplChat"></a>
                Nick chat chưa được cập nhật!
            </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="border2px"></div>
<div class="clear10"></div>
<input type="hidden" name="ctl00$ctl27$ctl01$hdfAdmin" id="ctl27_ctl01_hdfAdmin" value="341030">
<div id="broker_intro" style="border: 0px !important;">
    <div class="introtitle">
        <h2>
            <span class="bluetextwhite">Khu vực công ty môi giới</span></h2>

        <div class="clear10"></div>
    </div>
    <div class="ltrAreaIntro">
        <div><strong><?php echo $saler->name?> môi giới ở những khu vực sau:</strong></div>
        <ul>
            <li><span><?php echo $saler->area?></span></li>
        </ul>
    </div>

    <h2><span class="bluetextwhite">Giới thiệu công ty</span></h2>

    <div class="clear10"></div>
    <div id="content-saler">
        <?php echo $saler->content?>
    </div>
</div>
<div class="clear"></div>
<script language="javascript" type="text/javascript">

    $(".btClean").click(function () {
        $("#txtTitle").val("");
        $("#txtName").val("");
        $("#txtContent").val("");
        $(".email").val("");
        $("#txtCode").val("");
        //alert("ok");
    });

    function checkEmail(emai) {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(emai)) {
            alert('Email nhập không chính xác!!');
            //email.focus;
            return false;
        }
        else
            return true;
    }

    function CheckForm() {
        if ($(".email").val() != '') {
            var a = checkEmail($(".email").val());
            if (!a)
                return false;
        }

        var check = true;
        for (var i = 0; i < $(".required").length; i++) {
            if ($(".required").eq(i).val().trim() == "" || $(".required").eq(i).val() == 0) {
                $(".required").eq(i).addClass("error-ms");
                if (check == true)
                    check = false;
            }
            else if ($(".required").eq(i).hasClass("error-ms")) {
                $(".required").eq(i).removeClass("error-ms");
            }
        }
        return check;
    }


</script>
</div>

</div>
<!--//Modules/BrokeEnterprise/Viewer/Details/DetailsBrokeEnterprise.ascx-->

<div class="container-default">
    <div id="ctl33_BodyContainer"></div>

</div>
<!--//Modules/Search/SearchResult/ucProductListByBroker.ascx-->

<div class="container-default">
    <div id="ctl35_BodyContainer">
        <script type="text/javascript"
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jcarousellite_1.0.1.pack.js"></script>
        <div id="plOtherBrokers">
            <div class="mgk">
                <div>
                    <div class="left"><strong>Các nhà môi giới khác</strong></div>
                    <div class="right"><a id="ctl35_ctl01_hplTolist" class="normalblue" rel="nofollow" href="http://batdongsan.com.vn/moi-gioi-ban-can-ho-chung-cu" target="_blank">Xem thêm nhà môi giới</a></div>
                </div>
                <div class="otherslide">

                    <ul class="mgklist">

                        <li>
                            <div><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cau-giay/vuong-hung-manh-ib1450"
                                    rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.261161.vuong-hung-manh.jpg"
                                         alt="Vương Hùng Mạnh">
                                </a></div>

                            <div><strong>
                                    <a title="Vương Hùng Mạnh"
                                       href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cau-giay/vuong-hung-manh-ib1450"
                                       rel="nofollow">Vương Hùng Mạnh</a>
                                </strong></div>
                        </li>


                        <li>
                            <div><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-10/vuong-hoang-quan-ib1024"
                                    rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.261161.vuong-hoang-quan.jpg"
                                         alt="Vương Hoàng Quân">
                                </a></div>

                            <div><strong>
                                    <a title="Vương Hoàng Quân"
                                       href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-10/vuong-hoang-quan-ib1024"
                                       rel="nofollow">Vương Hoàng Quân</a>
                                </strong></div>
                        </li>


                        <li>
                            <div><a href="http://batdongsan.com.vn/ban-dat-quan-1/vu-van-sang-ib367" rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.332.vu-van-sang.jpg"
                                         alt="Vũ Văn Sáng">
                                </a></div>

                            <div><strong>
                                    <a title="Vũ Văn Sáng"
                                       href="http://batdongsan.com.vn/ban-dat-quan-1/vu-van-sang-ib367"
                                       rel="nofollow">Vũ Văn Sáng</a>
                                </strong></div>
                        </li>


                        <li>
                            <div>
                                <a href="http://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-bien-hoa-dna/vu-van-huy-ib398"
                                   rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.261669.vu-van-huy.jpg"
                                         alt="Vũ Văn Huy">
                                </a></div>

                            <div><strong>
                                    <a title="Vũ Văn Huy"
                                       href="http://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-bien-hoa-dna/vu-van-huy-ib398"
                                       rel="nofollow">Vũ Văn Huy</a>
                                </strong></div>
                        </li>


                        <li>
                            <div><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cau-giay/vu-van-dang-ib1043"
                                    rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.261444.vu-van-dang.jpg"
                                         alt="Vũ Văn Đảng">
                                </a></div>

                            <div><strong>
                                    <a title="Vũ Văn Đảng"
                                       href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cau-giay/vu-van-dang-ib1043"
                                       rel="nofollow">Vũ Văn Đảng</a>
                                </strong></div>
                        </li>


                        <li>
                            <div><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-dong-da/vu-tuan-hung-ib376"
                                    rel="nofollow">
                                    <img class="img"
                                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb79x81.261669.vu-tuan-hung.jpg"
                                         alt="Vũ Tuấn Hùng">
                                </a></div>

                            <div><strong>
                                    <a title="Vũ Tuấn Hùng"
                                       href="http://batdongsan.com.vn/ban-can-ho-chung-cu-dong-da/vu-tuan-hung-ib376"
                                       rel="nofollow">Vũ Tuấn Hùng</a>
                                </strong></div>
                        </li>


                    </ul>


                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

</div>
<!--//Modules/Broker/OtherBrokers/OtherBrokers.ascx--></div>
</div>
<?php $this->renderPartial('_right_content'); ?>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer">
    <ul>
        <li><a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-cau-giay/grand-plaza-pj384">Grand Plaza</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-discovery-complex">Discovery Complex</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-phuc-thinh-tower">Chung cư Phúc Thịnh</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-can-ho-chung-cu-vincom-village">Biệt thự vincom village</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-moi-duong-noi">Bán chung cư Dương Nội</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-vp5-linh-dam">VP5 Linh Đàm</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-quan-2/tropic-garden-pj765">Tropic Garden</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-mulberry-lane">Mulberry Lane</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-quan-7/him-lam-riverside-pj360">Him Lam Riverside</a></li>
        <li><a href="http://batdongsan.com.vn/khu-do-thi-moi-binh-chanh/happy-city-khu-do-thi-hanh-phuc-pj766">Happy
                City</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-thanh-xuan/golden-land-pj741">Golden Land</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-nen-du-an-golden-bay">Golden Bay</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-emerald">Emerald</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-dolphin-plaza">Dolphin Plaza</a></li>
        <li><a href="http://batdongsan.com.vn/khu-do-thi-moi-tay-ho/khu-do-thi-nam-thang-long-ciputra-ha-noi-pj2">Ciputra</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-moi-duong-noi">Chung cư Dương Nội</a></li>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-bac-ninh">Nhà đất Bắc Ninh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-usilk-city">Usilk City</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-kim-van-kim-lu-golden-silk">Kim Văn Kim
                Lũ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-ehome-4">EHome 4</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-golden-land">Chung cư Golden Land</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-celadon-city">Celadon City</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sunrise-city">Căn hộ Sunrise City</a></li>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-thai-nguyen">Nhà đất Thái Nguyên</a></li>
        <li><a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-long-bien/vincom-center-long-bien-pj994">Vincom
                Long Bien</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sunview-1-2">Sunview Town</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-times-city">Chung cư Times City</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-golden-west-le-van-thiem">Chung cư Golden
                West</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-golden-palace">Chung cư Golden Palace</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-discovery-complex">Chung cư Discovery Complex</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-nam-dinh">Nhà đất Nam Định</a></li>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-hai-phong">Nhà đất Hải Phòng</a></li>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-hai-duong">Nhà đất Hải Dương</a></li>
        <li><a href="http://batdongsan.com.vn/nha-dat-ban-can-tho">Nhà đất Cần Thơ</a></li>
        <li><a href="http://batdongsan.com.vn/khu-do-thi-moi-long-bien/vincom-village-pj761">Vincom Village</a></li>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-binh-thanh/saigon-pearl-pj84">Saigon Pearl</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-can-ho-ehome-3">EHome 3</a></li>
        <li><a href="http://batdongsan.com.vn/tags/cho-thue/Sang-quan-cafe">Sang quán café</a></li>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-cau-giay/khu-phuc-hop-mandarin-garden-pj612">Mandarin
                Garden</a></li>
        <li><a href="http://batdongsan.com.vn/khu-can-ho-tu-liem/golden-palace-pj720">Golden Palace</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/tags/cho-thue/Saigon-square">Saigon square</a></li>
        <li>
            <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-resort-spa-pj638">Vinpearl</a>
        </li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-the-garden">The Garden</a></li>
        <li><a href="http://batdongsan.com.vn/khu-phuc-hop-quan-7/sunrise-city-pj527">Sunrise City</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-ecopark">Ecopark</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-vp5-linh-dam">Chung cư VP5 Linh Đàm</a></li>
        <li><a href="http://batdongsan.com.vn/cho-thue-can-ho-chung-cu-keangnam-hanoi-landmark-tower">Keangnam</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-kim-van-kim-lu-golden-silk">Chung cư Kim
                Văn Kim Lũ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-times-city">Times City</a></li>
        <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-royal-city">Royal City</a></li>
    </ul>
</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>