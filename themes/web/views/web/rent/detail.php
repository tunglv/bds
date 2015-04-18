<div id="MainContent"></div>
<div class="clear">
</div>


<!--content-->

<div class="body-left">
<div id="Breadcrumb"></div>
<div id="TopContent"></div>

<div style="clear: both;">
</div>
<div id="LeftMainContent">

<div class="container-default">
<div id="ctl27_BodyContainer">

<div id="product-detail">
<div class="pm-title">
    <h1><?php echo $sale->title?></h1>
</div>

<div class="kqchitiet">
        <span class="diadiem-title mar-right-15">
            <b>Khu vực:</b> <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-scenic-valley">Bán căn hộ chung cư tại Scenic Valley</a> - Quận 7 - Hồ Chí Minh</span>
        <span style="display: inline-block;"><span class="gia-title mar-right-15">
            <b>Giá:</b>
            <strong>
                <?php echo $sale->price .' '.$sale->price_type?>&nbsp;
            </strong>
        </span>

            <span class="gia-title">
                <b>Diện tích:</b>
                <strong><?php echo $sale->area?></strong>
            </span></span>

</div>
<div class="pm-mota">
    Thông tin mô tả
</div>
<div class="pm-content stat" ct="2" ac="2" cid="6532059">
    <?php echo $sale->content?>
</div>

<div class="pm-middle-content">

    <ul class="detail-more-info">
        <li><a href="javascript:void(0);" onclick="showPhoto(this)" rel="nofollow" class="active" title="Xem Ảnh"><span>Xem Ảnh</span></a></li>
        <li><a href="javascript:void(0);" onclick="showMap(this)" rel="nofollow" class="view-map"
               title="Xem Bản đồ"><span>Xem Bản đồ</span></a></li>
    </ul>

    <?php $productImage = $sale->imagesProducts;?>
    <div class="img-map">
        <div id="photoSlide" class="photo" style="position: relative;">
            <div id="divPhotoActive" class="show-img" style="display: table-row; cursor: pointer; height: 510px;">
                <div style="display: table-cell; vertical-align: middle; min-height: 326px; width:745px; border: 0px; text-align: center">
                    <img src="<?php echo $productImage[0]->getUrl('856')?>" alt="<?php echo $sale->title?>" style="width:auto; height:auto;" id="imgSlide1">
                    <img style="width:auto; height:auto;display: none" id="imgSlide2" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/no-photo.jpg">
                </div>
            </div>
            <div id="autoplay" ac="manual"><span>Xem tự động</span></div>
            <div class="list-img">
                <ul id="thumbs">
                    <?php foreach($productImage as $_key => $_val):?>
                    <li class="<?php if($_key == 0):?>current<?php endif;?>">
                        <img onmouseover="this.style.cursor='pointer'" alt="<?php echo $sale->title?>" title="<?php echo $sale->title?>" src="<?php echo $_val->getUrl('856')?>">
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <img src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb-back1.png" class="slideshow-icon-back" id="icon-back">
            <img src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb-next1.png" class="slideshow-icon-next" id="icon-next">
        </div>
    </div>
</div>
<div style="clear: both">
</div>
<!-- begin content-detail-->
<div class="pm-content-detail">
    <table border="0" cellspacing="5" width="100%">
        <tbody>
        <tr>
            <td style="width: 360px; border: 1px solid #D7D7D7; vertical-align: top">
                <!--begin left-->
                <div class="left">
                    <div class="left-title">
                        Đặc điểm bất động sản
                    </div>
                    <div class="left-detail">
                        <div id="ctl27_ctl01_project" style="background: #ededed; padding-left: 10px;">
                            <div class="left">
                                Thuộc dự án
                            </div>
                            <div class="right">
                                <a href="http://batdongsan.com.vn/scenic-valley-pj1860"><?php echo $sale->project_name?></a>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                        <div style="padding-left: 10px;">
                            <div class="left">
                                Địa chỉ
                            </div>
                            <div class="right">
                                <?php echo $sale->address?>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                        <div style="background: #ededed; padding-left: 10px;">
                            <div class="left">
                                Mã số
                            </div>
                            <div class="right">
                                <?php echo $sale->code?>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                        <div style="padding-left: 10px;">
                            <div class="left">
                                Loại tin rao
                            </div>
                            <div class="right">
                                <?php echo $sale->typeLabel?>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                        <div style="background: #ededed; padding-left: 10px;">
                            <div class="left">
                                Ngày đăng tin
                            </div>
                            <div class="right">
                                <?php echo date('m-d-Y', $sale->created)?>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>
                        <div style="padding-left: 10px;">
                            <div class="left">
                                Ngày hết hạn
                            </div>
                            <div class="right">
                                <?php echo date('m-d-Y', ($sale->created + 604800))?>
                            </div>
                            <div style="clear: both">
                            </div>
                        </div>


                    </div>
                </div>
                <!--end left-->
            </td>
            <td style="width: 365px; border: 1px solid #d7d7d7; vertical-align: top">

                <!--begin right-->
                <div id="divCustomerInfo" style="float: left;">
                    <div id="ctl27_ctl01_contactInfo" class="right-title">
                        Liên hệ
                    </div>
                    <div id="ctl27_ctl01_contactName" class="right-content">
                        <div class="normalblue left">
                            Tên liên lạc
                        </div>
                        <div class="right">
                            <?php echo $sale->name_contact?>
                        </div>
                        <div style="clear: both">
                        </div>
                    </div>

                    <div id="ctl27_ctl01_contactPhone" class="right-content">
                        <div class="normalblue left">
                            Điện thoại
                        </div>
                        <div class="right">
                            <?php echo $sale->phone_contact?>
                        </div>
                        <div style="clear: both">
                        </div>
                    </div>
                    <div id="ctl27_ctl01_contactEmail" class="right-content">
                        <div class="normalblue left">
                            Email
                        </div>
                        <div class="right">
                            <?php echo $sale->email_contact?>
                        </div>
                        <div style="clear: both">
                        </div>
                    </div>
                </div>
                <!--end right-->
            </td>
        </tr>
        </tbody>
    </table>
    <div style="clear: both">
    </div>
</div>
<!--end content-detail-->

<br>

<div class="clear"></div>
<br>

</div>

<input type="hidden" name="ctl00$ctl27$ctl01$hdLat" id="hdLat" value="10.730989456176758">
<input type="hidden" name="ctl00$ctl27$ctl01$hdLong" id="hdLong" value="106.71733856201172">
<input type="hidden" name="ctl00$ctl27$ctl01$hdAddress" id="hdAddress" value="Dự án Scenic Valley, Quận 7, Hồ Chí Minh">
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/jquery.BlcokUI.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/geometry.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/jquery.tooltipmarker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/jquery.scrollto.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/InfoBox.js"></script>


<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/themes/web/files/js/ProductDetail.js"></script>

<script type="text/javascript">

    $(document).ready(function () {

        //if (getCookie('setted') == null) {

        //setCookie('setted', 1);

        var cookieName = 'USER_SEARCH_PRODUCT_CONTEXT';
        setCookie(cookieName, '38|324|SG|59|0|278|1860,6532059', 1);
        //}
    });

    function linkPostAdNewClick(data) {
        setCookie('POST_ADNEW_LOCATION', data, 1);
        return true;
    }
</script>
</div>

</div>
<!--//Modules/Product/FrontEndProduct/ProductDetail.ascx-->

<div class="container-default">
<div id="ctl31_BodyContainer">
<div class="product-list other-product">
<div class="viewmore">
    Xem thêm các bất động sản khác
</div>
<div class="Main" id="lstProductSimilar">
<div class="Header">
    <div class="Left">
    </div>
    <div class="Repeat">
        <h2><?php echo $sale->typeLabel?> <?php echo $sale->project_name?></h2>
    </div>
    <div class="Right"></div>
</div>
<?php foreach($same as $_key => $_val):?>
    <div class="<?php echo $_key==0 ? 'vip1' : 'vip5'?>">
        <div class="p-title">
            <a href="<?php echo $_val->url?>" title="<?php echo $_val->title?>" style="text-rendering: optimizeLegibility;"><?php echo $_val->title?></a>
        </div>
        <div class="p-main">
            <div class="p-main-image-crop">
                <a class="product-avatar" href="<?php echo $_val->url?>" onclick="">
                    <img class="product-avatar-img" src="<?php echo $_val->getImageUrl()?>" alt="<?php echo $_val->title?>">
                </a>
            </div>

            <div class="p-content">
                <div class="p-main-text" style="text-rendering: optimizeLegibility;">
                    Scenic Valley là căn hộ cuối cùng của Phú Mỹ Hưng đối diện sân golf và dòng sông cảnh quan.. . Vị trí
                    trung tâm Đô thị, chỉ mất 2 phút tản bộ đến SECC, hồ Bán Nguyệt, Crescent Mall, khu thương mại tài chính
                    Quốc Tế... . . Kiến trúc Singapore do Công <a rel="nofollow" target="_blank" href="http://www.canhoscenicvalley.net/"></a><a href="mailto:khanhvanpmh@gmail.com" rel="nofollow"></a>...
                </div>
            </div>
            <div class="clear"></div>
            <div class="p-bottom-crop">
                <div class="floatleft">
                    Giá:
                                            <span class="product-price">
                                                <?php echo $_val->price?> <?php echo $_val->price_type?>
                                            </span>&nbsp;
                    Diện tích:
                                            <span class="product-area">
                                                <?php echo $_val->area?> m²</span>&nbsp;
                    Quận/huyện:
                                            <span class="product-city-dist">
                                                Quận 7,
                                                Hồ Chí Minh
                                            </span>
                </div>
                <div class="floatright" style="padding-right: 10px;">
                    <?php echo date('d/m/Y', $_val->created)?>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clear10"></div>
    </div>
<?php endforeach?>

</div>
</div>
<div class="clear">
</div>
<p id="view_other_product">
    <a id="ctl31_ctl01_lnkSimilar" rel="nofollow"
       href="http://batdongsan.com.vn/ban-can-ho-chung-cu-duong-nguyen-van-linh-prj-scenic-valley">Xem thêm các tin khác tại khu vực này</a>
</p>

<div class="separable">
</div>
</div>

</div>
<!--//Modules/Views/Product/ucProductList.ascx--></div>
</div>
<div id="RightMainContent" class="body-right">

<div class="container-default">
<div id="ctl28_BodyContainer">
<div id="content-main-right">
<div id="column-right">
<div>
<div id="product_search" class="box-left">
<div class="box-title">
    Tìm kiếm trong 1.000.000 tin rao
</div>
<div id="searchcp">
<div class="result"></div>
<div class="searchrow"
     style="position: relative; z-index: 100; text-align: left !important;">
    <div class="newicon"
         style="width: 213px !important; padding-left: 5px; border: 1px solid #ccc;clear: both;">
        <input type="text" id="txtAutoComplete"
               placeholder="Nhập địa điểm, vd: Sunrise City"
               style="border: 0;width: 187px; padding: 0" class="ui-autocomplete-input"
               autocomplete="off" role="textbox" aria-autocomplete="list"
               aria-haspopup="true">
    </div>
    <div class="suggestTT">
        <div class="arr"><img
                src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/greyarrow.png">
        </div>
        <div class="greencolor goiy"><strong>Gợi ý</strong></div>
        <ul>
            <li>Nhập tên tỉnh/thành phố, quận/huyện, phường/xã, đường/phố, dự án; ví dụ:
                Sunrise City
            </li>
            <li>Phải chọn các gợi ý chúng tôi đề xuất bên dưới để kết quả chính xác nhất
            </li>
            <li>Nếu không nhập địa điểm ở đây, Quý vị có thể chọn lựa khu vực bằng các ô
                phía dưới trong công cụ tìm kiếm này
            </li>
        </ul>
        <div class="closeTT"><img
                src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/close.png">
        </div>
    </div>
</div>
<div id="divCategory" class="searchrow advance-select-box">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">Nhà đất bán</span>
                        </span>
    <input type="hidden" name="cboCategory" id="hdCboCatagory" value="38">

    <div id="divCatagoryOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="0" class="advance-options" style="min-width: 186px;">--Chọn loại tin
                rao--
            </li>
            <li vl="38" class="advance-options current" style="min-width: 186px;">Nhà đất
                bán
            </li>
            <li vl="49" class="advance-options" style="min-width: 186px;">Nhà đất cho thuê
            </li>
        </ul>
    </div>
</div>
<div id="divCategoryRe" class="searchrow advance-select-box">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">- Bán căn hộ chung cư</span>
                        </span>
    <input type="hidden" name="cboTypeRe" id="hdCboCatagoryRe" value="324">

    <div id="divCatagoryReOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li class="advance-options" vl="0">--Chọn loại nhà đất--</li>
            <li class="advance-options" vl="324">- Bán căn hộ chung cư</li>
            <li class="advance-options" vl="362">- Tất cả các loại nhà bán</li>
            <li class="advance-options" vl="41">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà riêng</li>
            <li class="advance-options" vl="325">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà biệt thự,
                liền kề
            </li>
            <li class="advance-options" vl="163">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán nhà mặt phố
            </li>
            <li class="advance-options" vl="361">- Tất cả các loại đất bán</li>
            <li class="advance-options" vl="40">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất nền dự
                án
            </li>
            <li class="advance-options" vl="283">&nbsp;&nbsp;&nbsp;&nbsp;+ Bán đất</li>
            <li class="advance-options" vl="44">- Bán trang trại, khu nghỉ dưỡng</li>
            <li class="advance-options" vl="45">- Bán kho, nhà xưởng</li>
            <li class="advance-options" vl="48">- Bán loại bất động sản khác</li>
        </ul>
    </div>
</div>
<div id="divCity" class="searchrow advance-select-box">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">Hồ Chí Minh</span>
                        </span>
    <input type="hidden" name="cboCity" id="hdCboCity" value="SG">

    <div id="divCityOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="CN" class="advance-options" style="min-width: 186px;">--Chọn Tỉnh/Thành
                phố--
            </li>
            <li vl="SG" class="advance-options current" style="min-width: 186px;">Hồ Chí
                Minh
            </li>
            <li vl="HN" class="advance-options" style="min-width: 186px;">Hà Nội</li>
            <li vl="BD" class="advance-options" style="min-width: 186px;">Bình Dương</li>
            <li vl="DDN" class="advance-options" style="min-width: 186px;">Đà Nẵng</li>
            <li vl="HP" class="advance-options" style="min-width: 186px;">Hải Phòng</li>
            <li vl="LA" class="advance-options" style="min-width: 186px;">Long An</li>
            <li vl="VT" class="advance-options" style="min-width: 186px;">Bà Rịa Vũng Tàu
            </li>
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
            <li vl="TTH" class="advance-options" style="min-width: 186px;">Thừa Thiên Huế
            </li>
            <li vl="TG" class="advance-options" style="min-width: 186px;">Tiền Giang</li>
            <li vl="TV" class="advance-options" style="min-width: 186px;">Trà Vinh</li>
            <li vl="TQ" class="advance-options" style="min-width: 186px;">Tuyên Quang</li>
            <li vl="VL" class="advance-options" style="min-width: 186px;">Vĩnh Long</li>
            <li vl="VP" class="advance-options" style="min-width: 186px;">Vĩnh Phúc</li>
            <li vl="YB" class="advance-options" style="min-width: 186px;">Yên Bái</li>
        </ul>
    </div>
</div>
<div id="divDistrict" class="searchrow advance-select-box" title="">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">Quận 7</span>
                        </span>
    <input type="hidden" name="cboDistrict" id="hdCboDistrict" value="59">

    <div id="divDistrictOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="0" class="advance-options" style="min-width: 186px;">--Chọn
                Quận/Huyện--
            </li>
            <li vl="72" class="advance-options" style="min-width: 186px;">Bình Chánh</li>
            <li vl="65" class="advance-options" style="min-width: 186px;">Bình Tân</li>
            <li vl="66" class="advance-options" style="min-width: 186px;">Bình Thạnh</li>
            <li vl="73" class="advance-options" style="min-width: 186px;">Cần Giờ</li>
            <li vl="74" class="advance-options" style="min-width: 186px;">Củ Chi</li>
            <li vl="67" class="advance-options" style="min-width: 186px;">Gò Vấp</li>
            <li vl="75" class="advance-options" style="min-width: 186px;">Hóc Môn</li>
            <li vl="76" class="advance-options" style="min-width: 186px;">Nhà Bè</li>
            <li vl="68" class="advance-options" style="min-width: 186px;">Phú Nhuận</li>
            <li vl="53" class="advance-options" style="min-width: 186px;">Quận 1</li>
            <li vl="62" class="advance-options" style="min-width: 186px;">Quận 10</li>
            <li vl="63" class="advance-options" style="min-width: 186px;">Quận 11</li>
            <li vl="64" class="advance-options" style="min-width: 186px;">Quận 12</li>
            <li vl="54" class="advance-options" style="min-width: 186px;">Quận 2</li>
            <li vl="55" class="advance-options" style="min-width: 186px;">Quận 3</li>
            <li vl="56" class="advance-options" style="min-width: 186px;">Quận 4</li>
            <li vl="57" class="advance-options" style="min-width: 186px;">Quận 5</li>
            <li vl="58" class="advance-options" style="min-width: 186px;">Quận 6</li>
            <li vl="59" class="advance-options current" style="min-width: 186px;">Quận 7
            </li>
            <li vl="60" class="advance-options" style="min-width: 186px;">Quận 8</li>
            <li vl="61" class="advance-options" style="min-width: 186px;">Quận 9</li>
            <li vl="69" class="advance-options" style="min-width: 186px;">Tân Bình</li>
            <li vl="70" class="advance-options" style="min-width: 186px;">Tân Phú</li>
            <li vl="71" class="advance-options" style="min-width: 186px;">Thủ Đức</li>
        </ul>
    </div>
</div>
<div id="divArea" class="searchrow advance-select-box ">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">--Chọn Diện tích--</span>
                        </span>
    <input type="hidden" id="hdCboArea" name="cboArea" value="-1">

    <div id="divAreaOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <table class="header-options options">
            <tbody>
            <tr class="advance-options">
                <td class="advance-options"><input type="text" id="txtAreaMinValue"
                                                   name="areamin" placeholder="Từ"
                                                   class="min-value advance-options"
                                                   maxlength="6" numbersonly="true"
                                                   decimal="false" value=""></td>
                <td class="advance-options"><span class="advance-options">- </span></td>
                <td class="advance-options"><input type="text" id="txtAreaMaxValue"
                                                   name="areamax" placeholder="Đến"
                                                   class="max-value advance-options"
                                                   maxlength="6" numbersonly="true"
                                                   decimal="false" value=""></td>
                <td class="advance-options"><span class="advance-options">m2</span></td>
            </tr>
            </tbody>
        </table>
        <ul name="cboArea" id="cboArea" class="advance-options" style="min-width: 218px;">
            <li vl="-1" class="advance-options" style="min-width: 186px;">--Chọn Diện
                tích--
            </li>
            <li vl="0" class="advance-options" style="min-width: 186px;">Chưa xác định</li>
            <li vl="1" class="advance-options" style="min-width: 186px;">&lt;= 30 m2</li>
            <li vl="2" class="advance-options" style="min-width: 186px;">30 - 50 m2</li>
            <li vl="3" class="advance-options" style="min-width: 186px;">50 - 80 m2</li>
            <li vl="4" class="advance-options" style="min-width: 186px;">80 - 100 m2</li>
            <li vl="5" class="advance-options" style="min-width: 186px;">100 - 150 m2</li>
            <li vl="6" class="advance-options" style="min-width: 186px;">150 - 200 m2</li>
            <li vl="7" class="advance-options" style="min-width: 186px;">200 - 250 m2</li>
            <li vl="8" class="advance-options" style="min-width: 186px;">250 - 300 m2</li>
            <li vl="9" class="advance-options" style="min-width: 186px;">300 - 500 m2</li>
            <li vl="10" class="advance-options" style="min-width: 186px;">&gt;= 500 m2</li>
        </ul>
    </div>
</div>
<div id="divPrice" class="searchrow advance-select-box">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">--Chọn mức giá--</span>
                        </span>
    <input type="hidden" id="hdCboPrice" name="cboPrice" value="-1">

    <div id="divPriceOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <table class="header-options options">
            <tbody>
            <tr class="advance-options">
                <td class="advance-options"><input type="text" id="txtPriceMinValue"
                                                   name="pricemin" placeholder="Từ"
                                                   class="min-value advance-options"
                                                   maxlength="6" numbersonly="true"
                                                   decimal="true" value="">

                    <div id="lblPriceMin"></div>
                </td>
                <td class="advance-options"><span class="advance-options">- </span></td>
                <td class="advance-options"><input type="text" id="txtPriceMaxValue"
                                                   name="pricemax" placeholder="Đến"
                                                   class="max-value advance-options"
                                                   maxlength="6" numbersonly="true"
                                                   decimal="true" value="">

                    <div id="lblPriceMax"></div>
                </td>
            </tr>
            </tbody>
        </table>
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="-1" class="advance-options" style="min-width: 186px;">--Chọn mức giá--
            </li>
            <li vl="0" class="advance-options" style="min-width: 186px;">Thỏa thuận</li>
            <li vl="1" class="advance-options" style="min-width: 186px;">&lt; 500 triệu</li>
            <li vl="2" class="advance-options" style="min-width: 186px;">500 - 800 triệu
            </li>
            <li vl="3" class="advance-options" style="min-width: 186px;">800 triệu - 1 tỷ
            </li>
            <li vl="4" class="advance-options" style="min-width: 186px;">1 - 2 tỷ</li>
            <li vl="5" class="advance-options" style="min-width: 186px;">2 - 3 tỷ</li>
            <li vl="6" class="advance-options" style="min-width: 186px;">3 - 5 tỷ</li>
            <li vl="7" class="advance-options" style="min-width: 186px;">5 - 7 tỷ</li>
            <li vl="8" class="advance-options" style="min-width: 186px;">7 - 10 tỷ</li>
            <li vl="9" class="advance-options" style="min-width: 186px;">10 - 20 tỷ</li>
            <li vl="10" class="advance-options" style="min-width: 186px;">20 - 30 tỷ</li>
            <li vl="11" class="advance-options" style="min-width: 186px;">&gt; 30 tỷ</li>
        </ul>
    </div>
</div>
<div id="divWard" class="searchrow adv-search advance-select-box" title=""
     style="display: block;">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">--Chọn Phường/Xã--</span>
                        </span>
    <input type="hidden" name="cboWard" id="hdCboWard" value="0">

    <div id="divWardOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="0" class="advance-options" style="min-width: 186px;">--Chọn
                Phường/Xã--
            </li>
            <li vl="8753" class="advance-options" style="min-width: 186px;">Bình Thuận</li>
            <li vl="8754" class="advance-options" style="min-width: 186px;">Phú Mỹ</li>
            <li vl="8755" class="advance-options" style="min-width: 186px;">Phú Thuận</li>
            <li vl="8759" class="advance-options" style="min-width: 186px;">Tân Hưng</li>
            <li vl="8761" class="advance-options" style="min-width: 186px;">Tân Kiểng</li>
            <li vl="8773" class="advance-options" style="min-width: 186px;">Tân Phong</li>
            <li vl="8774" class="advance-options" style="min-width: 186px;">Tân Phú</li>
            <li vl="11902" class="advance-options" style="min-width: 186px;">Tân Quy</li>
            <li vl="8776" class="advance-options" style="min-width: 186px;">Tân Thuận Đông
            </li>
            <li vl="8778" class="advance-options" style="min-width: 186px;">Tân Thuận Tây
            </li>
        </ul>
    </div>
</div>
<div id="divStreet" class="searchrow adv-search advance-select-box" title=""
     style="display: block;">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">Nguyễn Văn Linh</span>
                        </span>
                        <input type="hidden" name="cboStreet" id="hdCboStreet" value="278">

                        <div id="divStreetOptions"
                             class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 218px;">
                        <li vl="0" class="advance-options" style="min-width: 186px;">--Chọn
                            Đường/Phố--
                        </li>
                        <li vl="3789" class="advance-options" style="min-width: 186px;">1</li>
                        <li vl="3780" class="advance-options" style="min-width: 186px;">10</li>
                        <li vl="1998" class="advance-options" style="min-width: 186px;">11</li>
                        <li vl="4311" class="advance-options" style="min-width: 186px;">11N</li>
                        <li vl="1999" class="advance-options" style="min-width: 186px;">12</li>
                        <li vl="2647" class="advance-options" style="min-width: 186px;">12B</li>
                        <li vl="4781" class="advance-options" style="min-width: 186px;">13</li>
                        <li vl="2001" class="advance-options" style="min-width: 186px;">14</li>
                        <li vl="5780" class="advance-options" style="min-width: 186px;">14A</li>
                        <li vl="2002" class="advance-options" style="min-width: 186px;">15</li>
                        <li vl="8244" class="advance-options" style="min-width: 186px;">15B</li>
                        <li vl="4187" class="advance-options" style="min-width: 186px;">16</li>
                        <li vl="2850" class="advance-options" style="min-width: 186px;">17</li>
                        <li vl="2095" class="advance-options" style="min-width: 186px;">18</li>
                        <li vl="5707" class="advance-options" style="min-width: 186px;">19</li>
                        <li vl="3788" class="advance-options" style="min-width: 186px;">2</li>
                        <li vl="4991" class="advance-options" style="min-width: 186px;">20</li>
                        <li vl="3631" class="advance-options" style="min-width: 186px;">21</li>
                        <li vl="2773" class="advance-options" style="min-width: 186px;">22</li>
                        <li vl="709" class="advance-options" style="min-width: 186px;">23</li>
                        <li vl="2869" class="advance-options" style="min-width: 186px;">24</li>
                        <li vl="2870" class="advance-options" style="min-width: 186px;">25</li>
                        <li vl="4281" class="advance-options" style="min-width: 186px;">25A</li>
                        <li vl="4766" class="advance-options" style="min-width: 186px;">27</li>
                        <li vl="2165" class="advance-options" style="min-width: 186px;">28</li>
                        <li vl="2166" class="advance-options" style="min-width: 186px;">29</li>
                        <li vl="689" class="advance-options" style="min-width: 186px;">3</li>
                        <li vl="4196" class="advance-options" style="min-width: 186px;">30</li>
                        <li vl="4416" class="advance-options" style="min-width: 186px;">31</li>
                        <li vl="7772" class="advance-options" style="min-width: 186px;">32</li>
                        <li vl="4265" class="advance-options" style="min-width: 186px;">33</li>
                        <li vl="2876" class="advance-options" style="min-width: 186px;">34</li>
                        <li vl="6346" class="advance-options" style="min-width: 186px;">35</li>
                        <li vl="2878" class="advance-options" style="min-width: 186px;">36</li>
                        <li vl="2879" class="advance-options" style="min-width: 186px;">37</li>
                        <li vl="2167" class="advance-options" style="min-width: 186px;">38</li>
                        <li vl="2520" class="advance-options" style="min-width: 186px;">39</li>
                        <li vl="1990" class="advance-options" style="min-width: 186px;">4</li>
                        <li vl="4672" class="advance-options" style="min-width: 186px;">40</li>
                        <li vl="4211" class="advance-options" style="min-width: 186px;">41</li>
                        <li vl="4213" class="advance-options" style="min-width: 186px;">43</li>
                        <li vl="3061" class="advance-options" style="min-width: 186px;">44</li>
                        <li vl="2889" class="advance-options" style="min-width: 186px;">45</li>
                        <li vl="2263" class="advance-options" style="min-width: 186px;">47</li>
                        <li vl="2894" class="advance-options" style="min-width: 186px;">48</li>
                        <li vl="2895" class="advance-options" style="min-width: 186px;">49</li>
                        <li vl="5263" class="advance-options" style="min-width: 186px;">4A</li>
                        <li vl="3786" class="advance-options" style="min-width: 186px;">5</li>
                        <li vl="6272" class="advance-options" style="min-width: 186px;">51</li>
                        <li vl="4472" class="advance-options" style="min-width: 186px;">53</li>
                        <li vl="2840" class="advance-options" style="min-width: 186px;">6</li>
                        <li vl="2252" class="advance-options" style="min-width: 186px;">61</li>
                        <li vl="8036" class="advance-options" style="min-width: 186px;">62</li>
                        <li vl="8689" class="advance-options" style="min-width: 186px;">63</li>
                        <li vl="2915" class="advance-options" style="min-width: 186px;">65</li>
                        <li vl="2916" class="advance-options" style="min-width: 186px;">66</li>
                        <li vl="2917" class="advance-options" style="min-width: 186px;">67</li>
                        <li vl="4291" class="advance-options" style="min-width: 186px;">69</li>
                        <li vl="1994" class="advance-options" style="min-width: 186px;">7</li>
                        <li vl="7957" class="advance-options" style="min-width: 186px;">71</li>
                        <li vl="2925" class="advance-options" style="min-width: 186px;">75</li>
                        <li vl="4294" class="advance-options" style="min-width: 186px;">77</li>
                        <li vl="7118" class="advance-options" style="min-width: 186px;">78</li>
                        <li vl="4295" class="advance-options" style="min-width: 186px;">79</li>
                        <li vl="4309" class="advance-options" style="min-width: 186px;">7L</li>
                        <li vl="2841" class="advance-options" style="min-width: 186px;">8</li>
                        <li vl="4297" class="advance-options" style="min-width: 186px;">81</li>
                        <li vl="4299" class="advance-options" style="min-width: 186px;">83</li>
                        <li vl="4300" class="advance-options" style="min-width: 186px;">85</li>
                        <li vl="2842" class="advance-options" style="min-width: 186px;">9</li>
                        <li vl="4310" class="advance-options" style="min-width: 186px;">9M</li>
                        <li vl="4273" class="advance-options" style="min-width: 186px;">Bế Văn Cấm</li>
                        <li vl="3858" class="advance-options" style="min-width: 186px;">Bến Nghé</li>
                        <li vl="335" class="advance-options" style="min-width: 186px;">Bùi Bằng Đoàn
                        </li>
                        <li vl="5592" class="advance-options" style="min-width: 186px;">Bùi Văn Ba</li>
                        <li vl="3070" class="advance-options" style="min-width: 186px;">Cao Triều Phát
                        </li>
                        <li vl="7192" class="advance-options" style="min-width: 186px;">Chuyên Dùng</li>
                        <li vl="7431" class="advance-options" style="min-width: 186px;">Chuyên Dùng 9
                        </li>
                        <li vl="1985" class="advance-options" style="min-width: 186px;">D1</li>
                        <li vl="2599" class="advance-options" style="min-width: 186px;">D4</li>
                        <li vl="5722" class="advance-options" style="min-width: 186px;">Đặng Đức Thuật
                        </li>
                        <li vl="6503" class="advance-options" style="min-width: 186px;">Đào Tông
                            Nguyên
                        </li>
                        <li vl="5715" class="advance-options" style="min-width: 186px;">Đào Trí</li>
                        <li vl="310" class="advance-options" style="min-width: 186px;">Giải Phóng</li>
                        <li vl="5685" class="advance-options" style="min-width: 186px;">Gò Lu</li>
                        <li vl="6202" class="advance-options" style="min-width: 186px;">Gò Ô Môi</li>
                        <li vl="755" class="advance-options" style="min-width: 186px;">Hà Huy Tập</li>
                        <li vl="7708" class="advance-options" style="min-width: 186px;">Him Lam</li>
                        <li vl="616" class="advance-options" style="min-width: 186px;">Hoàng Quốc Việt
                        </li>
                        <li vl="300" class="advance-options" style="min-width: 186px;">Hoàng Văn Thái
                        </li>
                        <li vl="7552" class="advance-options" style="min-width: 186px;">Hưng Gia 5</li>
                        <li vl="5718" class="advance-options" style="min-width: 186px;">Hưng Phước</li>
                        <li vl="7926" class="advance-options" style="min-width: 186px;">Hưng Thái</li>
                        <li vl="3010" class="advance-options" style="min-width: 186px;">Huỳnh Tấn Phát
                        </li>
                        <li vl="6789" class="advance-options" style="min-width: 186px;">Kiều Đàm</li>
                        <li vl="4266" class="advance-options" style="min-width: 186px;">Lâm Văn Bền</li>
                        <li vl="5678" class="advance-options" style="min-width: 186px;">Lãnh Binh
                            Thăng
                        </li>
                        <li vl="314" class="advance-options" style="min-width: 186px;">Lê Văn Lương</li>
                        <li vl="5679" class="advance-options" style="min-width: 186px;">Lê Văn Thêm</li>
                        <li vl="325" class="advance-options" style="min-width: 186px;">Lê Văn Thiêm</li>
                        <li vl="3026" class="advance-options" style="min-width: 186px;">Lưu Trọng Lư
                        </li>
                        <li vl="7349" class="advance-options" style="min-width: 186px;">Lý Long Tường
                        </li>
                        <li vl="4262" class="advance-options" style="min-width: 186px;">Lý Phục Man</li>
                        <li vl="4163" class="advance-options" style="min-width: 186px;">Mai Chí Thọ</li>
                        <li vl="5713" class="advance-options" style="min-width: 186px;">Mai Văn Vĩnh
                        </li>
                        <li vl="7622" class="advance-options" style="min-width: 186px;">Mỹ Hưng</li>
                        <li vl="7650" class="advance-options" style="min-width: 186px;">Mỹ Phú 1</li>
                        <li vl="8590" class="advance-options" style="min-width: 186px;">Mỹ Tú Cảnh
                            Quan
                        </li>
                        <li vl="2251" class="advance-options" style="min-width: 186px;">Nguyễn Bính</li>
                        <li vl="8905" class="advance-options" style="min-width: 186px;">Nguyễn Cao Nam
                        </li>
                        <li vl="479" class="advance-options" style="min-width: 186px;">Nguyễn Đức Cảnh
                        </li>
                        <li vl="458" class="advance-options" style="min-width: 186px;">Nguyễn Hữu Thọ
                        </li>
                        <li vl="1476" class="advance-options" style="min-width: 186px;">Nguyễn Khắc
                            Viện
                        </li>
                        <li vl="394" class="advance-options" style="min-width: 186px;">Nguyễn Lương
                            Bằng
                        </li>
                        <li vl="615" class="advance-options" style="min-width: 186px;">Nguyễn Thị Thập
                        </li>
                        <li vl="8383" class="advance-options" style="min-width: 186px;">Nguyễn Văn
                            Bính
                        </li>
                        <li vl="278" class="advance-options current" style="min-width: 186px;">Nguyễn
                            Văn Linh
                        </li>
                        <li vl="4274" class="advance-options" style="min-width: 186px;">Nguyễn Văn
                            Luông
                        </li>
                        <li vl="5680" class="advance-options" style="min-width: 186px;">Nguyễn Văn Quỳ
                        </li>
                        <li vl="3505" class="advance-options" style="min-width: 186px;">Phạm Hữu Lầu
                        </li>
                        <li vl="3586" class="advance-options" style="min-width: 186px;">Phạm Thái
                            Bường
                        </li>
                        <li vl="2664" class="advance-options" style="min-width: 186px;">Phạm Văn Nghị
                        </li>
                        <li vl="2233" class="advance-options" style="min-width: 186px;">Phan Huy Thực.
                        </li>
                        <li vl="6463" class="advance-options" style="min-width: 186px;">Phan Khiêm Ích
                        </li>
                        <li vl="5693" class="advance-options" style="min-width: 186px;">Phú Thuận</li>
                        <li vl="6006" class="advance-options" style="min-width: 186px;">Quốc lộ 32</li>
                        <li vl="597" class="advance-options" style="min-width: 186px;">Quốc lộ 71</li>
                        <li vl="7981" class="advance-options" style="min-width: 186px;">Tân An Huy</li>
                        <li vl="2968" class="advance-options" style="min-width: 186px;">Tân Mỹ</li>
                        <li vl="8676" class="advance-options" style="min-width: 186px;">Tân Phú</li>
                        <li vl="6989" class="advance-options" style="min-width: 186px;">Tân Quy</li>
                        <li vl="5714" class="advance-options" style="min-width: 186px;">Tân Quý</li>
                        <li vl="6813" class="advance-options" style="min-width: 186px;">Tân Quy Đông
                        </li>
                        <li vl="6713" class="advance-options" style="min-width: 186px;">Tân Thuận Tây
                        </li>
                        <li vl="2427" class="advance-options" style="min-width: 186px;">Tân Trào</li>
                        <li vl="7640" class="advance-options" style="min-width: 186px;">Tân Văn Khánh
                        </li>
                        <li vl="7935" class="advance-options" style="min-width: 186px;">Thái Văn Bương
                        </li>
                        <li vl="6502" class="advance-options" style="min-width: 186px;">Thới An 22</li>
                        <li vl="4625" class="advance-options" style="min-width: 186px;">Tỉnh lộ 15B</li>
                        <li vl="599" class="advance-options" style="min-width: 186px;">Tỉnh lộ 73</li>
                        <li vl="5784" class="advance-options" style="min-width: 186px;">Tôn Dật Tiên
                        </li>
                        <li vl="5694" class="advance-options" style="min-width: 186px;">Trần Đức Lương
                        </li>
                        <li vl="219" class="advance-options" style="min-width: 186px;">Trần Quốc Toản
                        </li>
                        <li vl="5754" class="advance-options" style="min-width: 186px;">Trần Trọng
                            Cung
                        </li>
                        <li vl="6883" class="advance-options" style="min-width: 186px;">Trần Văn Khánh
                        </li>
                        <li vl="2468" class="advance-options" style="min-width: 186px;">Trần Văn Trà
                        </li>
                        <li vl="510" class="advance-options" style="min-width: 186px;">Trần Xuân Soạn
                        </li>
                        <li vl="6758" class="advance-options" style="min-width: 186px;">Vườn Điều</li>
                        </ul>
                        </div>
</div>
<div id="divBedRoom" class="searchrow adv-search advance-select-box"
     style="display: block;">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">--Chọn số phòng ngủ--</span>
                        </span>
    <input type="hidden" name="cboBedRoom" id="hdCboBedRoom" value="-1">

    <div id="divBedRoomOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="-1" class="advance-options" style="min-width: 186px;">--Chọn số phòng
                ngủ--
            </li>
            <li vl="0" class="advance-options" style="min-width: 186px;">Không xác định</li>
            <li vl="1" class="advance-options" style="min-width: 186px;">1+</li>
            <li vl="2" class="advance-options" style="min-width: 186px;">2+</li>
            <li vl="3" class="advance-options" style="min-width: 186px;">3+</li>
            <li vl="4" class="advance-options" style="min-width: 186px;">4+</li>
            <li vl="5" class="advance-options" style="min-width: 186px;">5+</li>
        </ul>
    </div>
</div>
<div id="divHomeDirection" class="searchrow adv-search advance-select-box"
     style="display: block;">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">--Chọn hướng nhà--</span>
                        </span>
    <input type="hidden" name="cboHomeDirection" id="hdCboHomeDirection" value="-1">

    <div id="divHomeDirectionOptions"
         class="advance-select-options advance-options advance-select-options-2">
        <ul class="advance-options" style="min-width: 218px;">
            <li vl="-1" class="advance-options" style="min-width: 186px;">--Chọn hướng
                nhà--
            </li>
            <li vl="0" class="advance-options" style="min-width: 186px;">KXĐ</li>
            <li vl="1" class="advance-options" style="min-width: 186px;">Đông</li>
            <li vl="2" class="advance-options" style="min-width: 186px;">Tây</li>
            <li vl="3" class="advance-options" style="min-width: 186px;">Nam</li>
            <li vl="4" class="advance-options" style="min-width: 186px;">Bắc</li>
            <li vl="5" class="advance-options" style="min-width: 186px;">Đông-Bắc</li>
            <li vl="6" class="advance-options" style="min-width: 186px;">Tây-Bắc</li>
            <li vl="7" class="advance-options" style="min-width: 186px;">Tây-Nam</li>
            <li vl="8" class="advance-options" style="min-width: 186px;">Đông-Nam</li>
        </ul>
    </div>
</div>
<div id="divProject" class="searchrow adv-search advance-select-box" title=""
     style="display: block;">
                        <span class="select-text">
                            <span class="select-text-content" style="width: 193px;">Scenic Valley</span>
                        </span>
                        <input type="hidden" name="cboListProj" id="hdCboProject" value="1860">

                        <div id="divProjectOptions"
                             class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 218px;">
                        <li vl="0" class="advance-options" style="min-width: 186px;">--Chọn dự án bất
                            động sản--
                        </li>
                        <li vl="320" class="advance-options" style="min-width: 186px;">Belleza
                            Apartment
                        </li>
                        <li vl="1909" class="advance-options" style="min-width: 186px;">Biệt thự Lam
                            Thiên Lục Địa
                        </li>
                        <li vl="1078" class="advance-options" style="min-width: 186px;">Biệt thự lâu đài
                            Chateau
                        </li>
                        <li vl="847" class="advance-options" style="min-width: 186px;">Bình An
                            Apartment
                        </li>
                        <li vl="1676" class="advance-options" style="min-width: 186px;">Căn hộ An Viên
                        </li>
                        <li vl="672" class="advance-options" style="min-width: 186px;">Căn hộ Incomex
                        </li>
                        <li vl="1895" class="advance-options" style="min-width: 186px;">Căn hộ Phú Mỹ
                            An
                        </li>
                        <li vl="1646" class="advance-options" style="min-width: 186px;">Cảnh Viên 1</li>
                        <li vl="1648" class="advance-options" style="min-width: 186px;">Cảnh Viên 2</li>
                        <li vl="485" class="advance-options" style="min-width: 186px;">Cảnh Viên 3</li>
                        <li vl="1533" class="advance-options" style="min-width: 186px;">Chung cư Hoàng
                            Kim
                        </li>
                        <li vl="1382" class="advance-options" style="min-width: 186px;">Chung cư Minh
                            Thành
                        </li>
                        <li vl="90" class="advance-options" style="min-width: 186px;">Chung cư Phú Mỹ
                        </li>
                        <li vl="1585" class="advance-options" style="min-width: 186px;">Chung cư Tân
                            Mỹ
                        </li>
                        <li vl="1326" class="advance-options" style="min-width: 186px;">CityLand
                            Riverside
                        </li>
                        <li vl="1881" class="advance-options" style="min-width: 186px;">Docklands Sài
                            Gòn
                        </li>
                        <li vl="842" class="advance-options" style="min-width: 186px;">Dự án Seven
                            Diamond
                        </li>
                        <li vl="1320" class="advance-options" style="min-width: 186px;">Ehome 5 - The
                            Bridgeview
                        </li>
                        <li vl="1308" class="advance-options" style="min-width: 186px;">Garden Court 1
                        </li>
                        <li vl="1642" class="advance-options" style="min-width: 186px;">Garden Court 2
                        </li>
                        <li vl="1310" class="advance-options" style="min-width: 186px;">Garden Plaza 1
                        </li>
                        <li vl="1783" class="advance-options" style="min-width: 186px;">Garden Plaza 2
                        </li>
                        <li vl="1117" class="advance-options" style="min-width: 186px;">Grand View</li>
                        <li vl="1464" class="advance-options" style="min-width: 186px;">Green Valley
                        </li>
                        <li vl="1655" class="advance-options" style="min-width: 186px;">Green View</li>
                        <li vl="1194" class="advance-options" style="min-width: 186px;">Happy Valley
                        </li>
                        <li vl="1597" class="advance-options" style="min-width: 186px;">Hemera
                            Building
                        </li>
                        <li vl="360" class="advance-options" style="min-width: 186px;">Him Lam
                            Riverside
                        </li>
                        <li vl="1324" class="advance-options" style="min-width: 186px;">Hoàng Anh Thanh
                            Bình
                        </li>
                        <li vl="1309" class="advance-options" style="min-width: 186px;">Hưng Gia 3</li>
                        <li vl="1632" class="advance-options" style="min-width: 186px;">Hưng Thái</li>
                        <li vl="1633" class="advance-options" style="min-width: 186px;">Hưng Vượng 1
                        </li>
                        <li vl="1635" class="advance-options" style="min-width: 186px;">Hưng Vượng 2
                        </li>
                        <li vl="1637" class="advance-options" style="min-width: 186px;">Hưng Vượng 3
                        </li>
                        <li vl="1028" class="advance-options" style="min-width: 186px;">Jamona City</li>
                        <li vl="1877" class="advance-options" style="min-width: 186px;">KDC Nam Long Phú
                            Thuận
                        </li>
                        <li vl="1822" class="advance-options" style="min-width: 186px;">KDC Thiên Phú
                            Gia
                        </li>
                        <li vl="1768" class="advance-options" style="min-width: 186px;">Khu biệt thự Mỹ
                            Hoàng
                        </li>
                        <li vl="1313" class="advance-options" style="min-width: 186px;">Khu Biệt Thự Mỹ
                            Kim 1,2
                        </li>
                        <li vl="1899" class="advance-options" style="min-width: 186px;">Khu Biệt thự Mỹ
                            Kim 3
                        </li>
                        <li vl="1831" class="advance-options" style="min-width: 186px;">Khu biệt thự Mỹ
                            Quang
                        </li>
                        <li vl="1569" class="advance-options" style="min-width: 186px;">Khu biệt thự Mỹ
                            Văn
                        </li>
                        <li vl="1784" class="advance-options" style="min-width: 186px;">Khu biệt thự Nam
                            Đô
                        </li>
                        <li vl="1720" class="advance-options" style="min-width: 186px;">Khu biệt thự Phú
                            Gia
                        </li>
                        <li vl="336" class="advance-options" style="min-width: 186px;">Khu căn hộ Mỹ
                            Đức
                        </li>
                        <li vl="1546" class="advance-options" style="min-width: 186px;">Khu căn hộ An
                            Hòa
                        </li>
                        <li vl="108" class="advance-options" style="min-width: 186px;">Khu căn hộ cao
                            cấp Lê Văn Lương (Hoàng Anh 1)
                        </li>
                        <li vl="109" class="advance-options" style="min-width: 186px;">Khu căn hộ cao
                            cấp Trần Xuân Soạn (Hoàng Anh 2)
                        </li>
                        <li vl="949" class="advance-options" style="min-width: 186px;">Khu căn hộ Res
                            III
                        </li>
                        <li vl="1669" class="advance-options" style="min-width: 186px;">Khu dân cư Kim
                            Sơn
                        </li>
                        <li vl="1341" class="advance-options" style="min-width: 186px;">Khu dân cư Nam
                            Viên
                        </li>
                        <li vl="1174" class="advance-options" style="min-width: 186px;">Khu dân cư Phú
                            Mỹ
                        </li>
                        <li vl="1894" class="advance-options" style="min-width: 186px;">Khu dân cư Phú
                            Mỹ Chợ Lớn
                        </li>
                        <li vl="1809" class="advance-options" style="min-width: 186px;">Khu dân cư
                            Savimex
                        </li>
                        <li vl="1724" class="advance-options" style="min-width: 186px;">Khu dân cư Tân
                            An Huy
                        </li>
                        <li vl="1525" class="advance-options" style="min-width: 186px;">Khu dân cư Tân
                            Thành lập
                        </li>
                        <li vl="1584" class="advance-options" style="min-width: 186px;">Khu dân cư Tấn
                            Trường
                        </li>
                        <li vl="1261" class="advance-options" style="min-width: 186px;">Khu dân cư Ven
                            Sông Sadeco
                        </li>
                        <li vl="493" class="advance-options" style="min-width: 186px;">Khu đô thị Him
                            Lam Kênh Tẻ
                        </li>
                        <li vl="1291" class="advance-options" style="min-width: 186px;">Khu đô thị Nam
                            Long
                        </li>
                        <li vl="1681" class="advance-options" style="min-width: 186px;">Khu nhà phố Hưng
                            Gia
                        </li>
                        <li vl="1679" class="advance-options" style="min-width: 186px;">Khu nhà phố Hưng
                            Phước
                        </li>
                        <li vl="1311" class="advance-options" style="min-width: 186px;">Khu phố Mỹ Toàn
                            2
                        </li>
                        <li vl="1578" class="advance-options" style="min-width: 186px;">Khu phố Nam
                            Thiên 1,2,3
                        </li>
                        <li vl="1312" class="advance-options" style="min-width: 186px;">Khu phố Nam
                            Thông I
                        </li>
                        <li vl="1364" class="advance-options" style="min-width: 186px;">Khu phố Nam
                            Thông II
                        </li>
                        <li vl="1452" class="advance-options" style="min-width: 186px;">Khu tái định cư
                            Phú Mỹ 2
                        </li>
                        <li vl="1045" class="advance-options" style="min-width: 186px;">La Casa</li>
                        <li vl="2066" class="advance-options" style="min-width: 186px;">Lotus City</li>
                        <li vl="1905" class="advance-options" style="min-width: 186px;">Mỹ Cảnh</li>
                        <li vl="1694" class="advance-options" style="min-width: 186px;">Mỹ Gia 1</li>
                        <li vl="1719" class="advance-options" style="min-width: 186px;">Mỹ Gia 2</li>
                        <li vl="1718" class="advance-options" style="min-width: 186px;">Mỹ Giang</li>
                        <li vl="1652" class="advance-options" style="min-width: 186px;">Mỹ Hào</li>
                        <li vl="1660" class="advance-options" style="min-width: 186px;">Mỹ Hưng</li>
                        <li vl="1641" class="advance-options" style="min-width: 186px;">Mỹ Khang</li>
                        <li vl="1715" class="advance-options" style="min-width: 186px;">Mỹ Khánh 1</li>
                        <li vl="1714" class="advance-options" style="min-width: 186px;">Mỹ Khánh 2</li>
                        <li vl="1717" class="advance-options" style="min-width: 186px;">Mỹ Khánh 3</li>
                        <li vl="1454" class="advance-options" style="min-width: 186px;">Mỹ Khánh 4</li>
                        <li vl="1630" class="advance-options" style="min-width: 186px;">Mỹ Phát</li>
                        <li vl="1697" class="advance-options" style="min-width: 186px;">Mỹ Phú 1</li>
                        <li vl="1698" class="advance-options" style="min-width: 186px;">Mỹ Phú 2</li>
                        <li vl="1175" class="advance-options" style="min-width: 186px;">Mỹ Phú 3</li>
                        <li vl="639" class="advance-options" style="min-width: 186px;">Mỹ Phú
                            Apartment
                        </li>
                        <li vl="1611" class="advance-options" style="min-width: 186px;">Mỹ Phúc</li>
                        <li vl="1617" class="advance-options" style="min-width: 186px;">Mỹ Phước</li>
                        <li vl="1667" class="advance-options" style="min-width: 186px;">Mỹ Thái 1</li>
                        <li vl="1692" class="advance-options" style="min-width: 186px;">Mỹ Thái 2</li>
                        <li vl="1693" class="advance-options" style="min-width: 186px;">Mỹ Thái 3</li>
                        <li vl="1664" class="advance-options" style="min-width: 186px;">Mỹ Toàn 1</li>
                        <li vl="1858" class="advance-options" style="min-width: 186px;">Mỹ Toàn 3</li>
                        <li vl="1722" class="advance-options" style="min-width: 186px;">Mỹ Tú 1</li>
                        <li vl="1723" class="advance-options" style="min-width: 186px;">Mỹ Tú 2</li>
                        <li vl="1810" class="advance-options" style="min-width: 186px;">Mỹ Tú 3</li>
                        <li vl="1668" class="advance-options" style="min-width: 186px;">Mỹ Viên</li>
                        <li vl="1639" class="advance-options" style="min-width: 186px;">Nam Khang</li>
                        <li vl="1682" class="advance-options" style="min-width: 186px;">Nam Long 1</li>
                        <li vl="1663" class="advance-options" style="min-width: 186px;">Nam Long 2</li>
                        <li vl="1684" class="advance-options" style="min-width: 186px;">Nam Long 3</li>
                        <li vl="1136" class="advance-options" style="min-width: 186px;">Nam Phú Villas
                        </li>
                        <li vl="1670" class="advance-options" style="min-width: 186px;">Nam Quang 1</li>
                        <li vl="1751" class="advance-options" style="min-width: 186px;">Nam Quang 2</li>
                        <li vl="1120" class="advance-options" style="min-width: 186px;">Nam Thông</li>
                        <li vl="1703" class="advance-options" style="min-width: 186px;">Nam Thông 3</li>
                        <li vl="598" class="advance-options" style="min-width: 186px;">Ngọc Lan
                            Apartment
                        </li>
                        <li vl="1662" class="advance-options" style="min-width: 186px;">Park View</li>
                        <li vl="1163" class="advance-options" style="min-width: 186px;">PetroLand
                            Tower
                        </li>
                        <li vl="82" class="advance-options" style="min-width: 186px;">Phú Mỹ Hưng</li>
                        <li vl="472" class="advance-options" style="min-width: 186px;">Quốc Cường Gia
                            Lai 1
                        </li>
                        <li vl="487" class="advance-options" style="min-width: 186px;">Riverpark
                            Residence
                        </li>
                        <li vl="991" class="advance-options" style="min-width: 186px;">Riverside
                            Residence
                        </li>
                        <li vl="837" class="advance-options" style="min-width: 186px;">Riviera Point
                        </li>
                        <li vl="619" class="advance-options" style="min-width: 186px;">Royal Tower</li>
                        <li vl="541" class="advance-options" style="min-width: 186px;">Sài Gòn Paragon
                        </li>
                        <li vl="538" class="advance-options" style="min-width: 186px;">SC VivoCity</li>
                        <li vl="1860" class="advance-options current" style="min-width: 186px;">Scenic
                            Valley
                        </li>
                        <li vl="488" class="advance-options" style="min-width: 186px;">Sky Garden 3</li>
                        <li vl="1340" class="advance-options" style="min-width: 186px;">Sky Garden I
                        </li>
                        <li vl="1342" class="advance-options" style="min-width: 186px;">Sky Garden II
                        </li>
                        <li vl="712" class="advance-options" style="min-width: 186px;">Southern Palace -
                            Căn hộ hoàng gia
                        </li>
                        <li vl="365" class="advance-options" style="min-width: 186px;">Star Hill</li>
                        <li vl="527" class="advance-options" style="min-width: 186px;">Sunrise City</li>
                        <li vl="103" class="advance-options" style="min-width: 186px;">The Era Town</li>
                        <li vl="536" class="advance-options" style="min-width: 186px;">The EverRich II
                        </li>
                        <li vl="958" class="advance-options" style="min-width: 186px;">The EverRich
                            III
                        </li>
                        <li vl="705" class="advance-options" style="min-width: 186px;">The Mark</li>
                        <li vl="992" class="advance-options" style="min-width: 186px;">The Panorama</li>
                        <li vl="622" class="advance-options" style="min-width: 186px;">Thiên Sơn Plaza -
                            Hồ Chí Minh
                        </li>
                        <li vl="1379" class="advance-options" style="min-width: 186px;">USilk
                            Apartment
                        </li>
                        <li vl="144" class="advance-options" style="min-width: 186px;">V-Star</li>
                        </ul>
                        </div>
</div>
<div class="searchbtn">
    <input type="image" name="btnSearch" id="btnSearchContext"
           onmouseover="this.src=&#39;/Images/search2.jpg&#39;"
           onmouseout="this.src=&#39;/Images/search1.jpg&#39;"
           src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/search1.jpg">
</div>
<div id="divLabelSearchAdv">
    <span class="box-sub-title advance" id="lblSearch">Bỏ tìm nâng cao</span>
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

    $("#btnSearchContext").click(function () {
        $('form').attr('action', '/HandlerWeb/redirect.ashx?IsMainSearch=true');
    });

    $(document).ready(function () {

        ChangeCategoryContext(38, 324);

        //$('#cboTypeRe').bt('Chọn loại giao dịch để hiện ra danh sách loại nhà đất', { trigger: 'hover', positions: 'left', width: '170px', fill: '#ffff99', showTip: function (box) { if ($('#cboTypeRe').children().length == 1) $(box).show(); else $(box).hide(); } });
        //$('#cboPrice').bt('Chọn Loại tin rao để hiện ra danh sách bảng giá', { trigger: 'hover', positions: 'left', width: '170px', fill: '#ffff99', showTip: function (box) { if ($('#cboPrice').children().length == 1) $(box).show(); else $(box).hide(); } });

    });

</script>
</div>

</div>
<!--//Modules/Search/ucSearchContext.ascx--><input type="hidden" name="ctl00$ctl32$ctl01$areaCount" id="areaCount">
<input type="hidden" name="ctl00$ctl32$ctl01$priceCount" id="priceCount">
<input type="hidden" name="ctl00$ctl32$ctl01$roomCount" id="roomCount">

<div id="ctl32_ctl01_HeaderContainer" class="box-header1">
    <div align="center" class="name_tit1 new-header">
        Bán căn hộ chung cư theo dự án tại 7
    </div>
</div>
<div id="ctl32_ctl01_bodyContainer" class="bor_box">
<div id="div_count_product">
<div id="divCountByAreas">

</div>
<div class="Project">

<ul>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-an-vien">
        Căn hộ An Viên</a> (1)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-can-ho-phu-my-an">
        Căn hộ Phú Mỹ An</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-canh-vien-1">
        Cảnh Viên 1</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-canh-vien-2">
        Cảnh Viên 2</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-hoang-kim">
        Chung cư Hoàng Kim</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-minh-thanh">
        Chung cư Minh Thành</a> (1)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-chung-cu-tan-my">
        Chung cư Tân Mỹ</a> (15)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-cityland-riverside">
        CityLand Riverside</a> (3)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-docklands-sai-gon">
        Docklands Sài Gòn</a> (6)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-ehome-5-the-bridgeview">
        Ehome 5 - The Bridgeview</a> (14)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-garden-court-1">
        Garden Court 1</a> (20)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-garden-court-2">
        Garden Court 2</a> (20)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-garden-plaza-1">
        Garden Plaza 1</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-garden-plaza-2">
        Garden Plaza 2</a> (12)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-grand-view">
        Grand View</a> (2)
</li>

<li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-green-valley">
        Green Valley</a> (5)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-green-view">
        Green View</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-happy-valley">
        Happy Valley</a> (6)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hoang-anh-thanh-binh">
        Hoàng Anh Thanh Bình</a> (4)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hung-vuong-1">
        Hưng Vượng 1</a> (4)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hung-vuong-2">
        Hưng Vượng 2</a> (1)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hung-vuong-3">
        Hưng Vượng 3</a> (3)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-jamona-city">
        Jamona City</a> (31)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-biet-thu-phu-gia">
        Khu biệt thự Phú Gia</a> (1)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-can-ho-an-hoa">
        Khu căn hộ An Hòa</a> (3)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-dan-cu-nam-vien">
        Khu dân cư Nam Viên</a> (1)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-dan-cu-phu-my">
        Khu dân cư Phú Mỹ</a> (4)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-do-thi-nam-long">
        Khu đô thị Nam Long</a> (1)
</li>

<li style="display: none;"><a
        href="http://batdongsan.com.vn/ban-can-ho-chung-cu-khu-tai-dinh-cu-phu-my-2">
        Khu tái định cư Phú Mỹ 2</a> (2)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-la-casa">
        La Casa</a> (7)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-canh">
        Mỹ Cảnh</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-hung">
        Mỹ Hưng</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-khang">
        Mỹ Khang</a> (4)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-khanh-1">
        Mỹ Khánh 1</a> (2)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-khanh-2">
        Mỹ Khánh 2</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-khanh-3">
        Mỹ Khánh 3</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-khanh-4">
        Mỹ Khánh 4</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-phat">
        Mỹ Phát</a> (1)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-phu-1">
        Mỹ Phú 1</a> (2)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-phuc">
        Mỹ Phúc</a> (3)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-phuoc">
        Mỹ Phước</a> (9)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-tu-1">
        Mỹ Tú 1</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-my-vien">
        Mỹ Viên</a> (2)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-nam-khang">
        Nam Khang</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-nam-long-1">
        Nam Long 1</a> (2)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-park-view">
        Park View</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-petroland-tower">
        PetroLand Tower</a> (11)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-riverside-residence">
        Riverside Residence</a> (20)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sky-garden-i">
        Sky Garden I</a> (13)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sky-garden-ii">
        Sky Garden II</a> (3)
</li>

<li style="display: none;"><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-the-panorama">
        The Panorama</a> (4)
</li>

</ul>
<p style="text-align:right;">
    <a href="javascript:void(0)" rel="nofollow" class="show_p"
       style="font-style:italic;text-decoration:underline;">Xem thêm»</a>
</p>

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
<!--//Modules/Views/Product/ucProductCountByContext2.ascx--><input type="hidden" name="ctl00$ctl33$ctl01$areaCount"
                                                                   id="areaCount">
<input type="hidden" name="ctl00$ctl33$ctl01$priceCount" id="priceCount">
<input type="hidden" name="ctl00$ctl33$ctl01$roomCount" id="roomCount">

<div id="ctl33_ctl01_HeaderContainer" class="box-header1 checkrun">
    <div align="center" class="name_tit1 new-header">
        LIÊN KẾT NỔI BẬT
    </div>
</div>
<div id="ctl33_ctl01_bodyContainer" class="bor_box checkrun">
    <div id="div_count_product">
        <div id="divCountByAreas">


            <ul>

                <li><a href="http://batdongsan.com.vn/ban-nha-rieng-phuong-phu-thuan-3">
                        Bán nhà Phường Phú Thuận</a></li>

                <li><a href="http://batdongsan.com.vn/ban-dat-phuong-tan-phong-9">
                        Bán đất Phường Tân Phong</a></li>

                <li><a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-hoang-anh-thanh-binh">
                        Bán căn hộ chung cư Hoàng Anh Thanh Bình</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-can-ho-chung-cu-garden-court-1">
                        Cho thuê căn hộ Garden Court 1</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-bui-van-ba-59">
                        Bán nhà Bùi Văn Ba</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-81-59">
                        Bán nhà Đường 81</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-kieu-dam-59">
                        Bán nhà Kiều Đàm</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-rieng-duong-43-1-59">
                        Bán nhà Đường 43</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-lam-van-ben-59">
                        Cho thuê nhà mặt tiền Lâm Văn Bền</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-79-1-59">
                        Cho thuê nhà mặt tiền 79</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-pham-huu-lau-59">
                        Cho thuê nhà mặt tiền Phạm Hữu Lầu</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-15-59">
                        Cho thuê nhà mặt tiền 15</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-mat-pho-duong-bui-van-ba-59">
                        Cho thuê nhà mặt tiền Bùi Văn Ba</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-rieng-duong-nguyen-thi-thap-59">
                        Cho thuê nhà Nguyễn Thị Thập</a></li>

                <li><a href="http://batdongsan.com.vn/cho-thue-nha-rieng-duong-mai-van-vinh-59">
                        Cho thuê nhà Mai Văn Vĩnh</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-huynh-tan-phat-59">
                        Bán nhà mặt tiền Huỳnh Tấn Phát</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-ly-phuc-man-59">
                        Bán nhà mặt tiền Lý Phục Man</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-49-1-59">
                        Bán nhà mặt tiền 49</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-phu-thuan-59">
                        Bán nhà mặt tiền Phú Thuận</a></li>

                <li><a href="http://batdongsan.com.vn/ban-nha-mat-pho-duong-77-59">
                        Bán nhà mặt tiền 77</a></li>

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


<div class="container-default">
    <div id="ctl36_BodyContainer">

        <div class="enterprise-rightContent">
            <div class="rc11">
                <div class="title-style">
                    <span id="ctl36_ctl01_lblTitle">Các nhà môi giới Bán căn hộ chung cư khu vực Quận 7, Hồ Chí Minh</span>
                </div>
            </div>
            <div class="rc12">

                <div class="broker-view">
                    <div class="broker-ava">
                        <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-1/dia-oc-him-eb1218" rel="nofollow">
                            <img class="img"
                                 src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb80x80.325591.jpg"></a>
                    </div>
                    <div style="line-height: 20px; float: right; width: 140px; ">
                        <a style="font-size: 12px; text-decoration: none;" class="colorboldblue" rel="nofollow"
                           href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-1/dia-oc-him-eb1218">Địa Ốc Him
                            Lam</a>
                        <br>
                        0907888918<br>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="broker-view">
                    <div class="broker-ava">
                        <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-7/cong-ty-tn-eb1939" rel="nofollow">
                            <img class="img"
                                 src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb80x80.503895.jpg"></a>
                    </div>
                    <div style="line-height: 20px; float: right; width: 140px; ">
                        <a style="font-size: 12px; text-decoration: none;" class="colorboldblue" rel="nofollow"
                           href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-7/cong-ty-tn-eb1939">Công ty TNHH
                            Dịch vụ Bất động sản Tân Hưng</a>
                        <br>
                        0908555888<br>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="broker-view">
                    <div class="broker-ava">
                        <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-nha-be/san-giao-d-eb1124" rel="nofollow">
                            <img class="img"
                                 src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb80x80.278584.jpg"></a>
                    </div>
                    <div style="line-height: 20px; float: right; width: 140px; ">
                        <a style="font-size: 12px; text-decoration: none;" class="colorboldblue" rel="nofollow"
                           href="http://batdongsan.com.vn/ban-can-ho-chung-cu-nha-be/san-giao-d-eb1124">Sàn Giao dịch
                            bất động sản Thành Đô</a>
                        <br>
                        0937668393<br>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="broker-view">
                    <div class="broker-ava">
                        <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-tan-binh/cong-ty-co-eb1152"
                           rel="nofollow">
                            <img class="img"
                                 src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb80x80.296801.jpg"></a>
                    </div>
                    <div style="line-height: 20px; float: right; width: 140px; ">
                        <a style="font-size: 12px; text-decoration: none;" class="colorboldblue" rel="nofollow"
                           href="http://batdongsan.com.vn/ban-can-ho-chung-cu-tan-binh/cong-ty-co-eb1152">Công ty Cổ
                            Phần Địa Ốc Thắng Lợi</a>
                        <br>
                        0944888753<br>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="broker-view">
                    <div class="broker-ava">
                        <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-8/cong-ty-co-eb1071" rel="nofollow">
                            <img class="img"
                                 src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/thumb80x80.2431.jpg"></a>
                    </div>
                    <div style="line-height: 20px; float: right; width: 140px; ">
                        <a style="font-size: 12px; text-decoration: none;" class="colorboldblue" rel="nofollow"
                           href="http://batdongsan.com.vn/ban-can-ho-chung-cu-quan-8/cong-ty-co-eb1071">Công ty cổ phần
                            thương mại địa ốc Điền Phát</a>
                        <br>
                        0939969969<br>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <a id="ctl36_ctl01_hplToSearch" class="viewmore normalblue"
                   href="http://batdongsan.com.vn/moi-gioi-ban-can-ho-chung-cu-quan-7">Xem thêm nhà môi giới khác</a>
            </div>
        </div>
    </div>

</div>
<!--//Modules/Product/FrontEndProduct/ViewBrokerByProduct.ascx-->
<div id="bannerfix">
    <div class="adPosition" positioncode="" stylex="position:fixed; bottom:0px; right:0px; z-index:100;"></div>
</div>


<div style="clear:both;"></div>
<!--//Modules/Banner/Preview/BottomFix/BannerPreviewBottomFix.ascx-->
<div id="bannerfix">
    <div class="adPosition" positioncode="BANNER_POSITION_FIX"
         stylex="position:fixed; bottom:0px; right:0px; z-index:100;"></div>
</div>


<div style="clear:both;"></div>
<!--//Modules/Banner/Preview/BottomFix/BannerPreviewBottomFix.ascx--></div>

<!--end content-->

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>