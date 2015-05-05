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

<div class="container-common">
<div id="ctl30_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>tìm kiếm nhà đất bán</div>
    </div>
</div>
<div id="ctl30_BodyContainer" class="bor_box">

<form id="form-search-project" action="<?php echo Yii::app()->createUrl('/web/project/result')?>" method="GET">
    <div>
        <div class="pad" id="searchcp">
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

            <div class="t_gr">
                Dự án
            </div>
            <div id="divProject" class="searchrow advance-select-box" style="margin:0px;">
                <?php $province_id_ = isset(Yii::app()->request->cookies['s-pro-d']) ? Yii::app()->request->cookies['s-pro-d']->value : '';$province_id = isset(Yii::app()->request->cookies['s-pro-w']) ? Yii::app()->request->cookies['s-pro-w']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-proj']->value)) $distric_id = Yii::app()->request->cookies['s-pro-proj']->value;if($province_id && $province_id_):?>
                    <select name="projectid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_project">
                        <option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>
                        <?php foreach(Project::model()->getAll('',$province_id) as $_key => $_val):?>
                            <option value="<?php echo $_val->id?>" <?php if($_val->id == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                        <?php endforeach;?>
                    </select>
                <?php else:?>
                    <select name="projectid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_project">
                        <option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>
                    </select>
                <?php endif;?>
                <input type="hidden" name="projectLabel" id="project-label" value="">
            </div>

            <div class="t_gr">
                Diện tích
            </div>
            <div id="divArea" class="searchrow advance-select-box" style="margin:0px;">
                <select name="cboArea" id="cboArea" class="advance-options" style="min-width: 188px;padding: 4px;">
                    <option value="999" class="advance-options" style="min-width: 186px;">--Chọn Diện tích--</option>
                    <option value="0" class="advance-options" style="min-width: 186px;">Chưa xác định</option>
                    <option value="1" class="advance-options" style="min-width: 186px;">&lt;= 30 m2</option>
                    <option value="2" class="advance-options" style="min-width: 186px;">30 - 50 m2</option>
                    <option value="3" class="advance-options" style="min-width: 186px;">50 - 80 m2</option>
                    <option value="4" class="advance-options" style="min-width: 186px;">80 - 100 m2</option>
                    <option value="5" class="advance-options" style="min-width: 186px;">100 - 150 m2</option>
                    <option value="6" class="advance-options" style="min-width: 186px;">150 - 200 m2</option>
                    <option value="7" class="advance-options" style="min-width: 186px;">200 - 250 m2</option>
                    <option value="8" class="advance-options" style="min-width: 186px;">250 - 300 m2</option>
                    <option value="9" class="advance-options" style="min-width: 186px;">300 - 500 m2</option>
                    <option value="10" class="advance-options" style="min-width: 186px;">&gt;= 500 m2</option>
                </select>
            </div>

            <div class="t_gr">
                Giá
            </div>
            <div id="divPrice" class="searchrow advance-select-box" style="margin:0px;">
                <select name="cboPrice" id="cboPrice" class="advance-options" style="min-width: 188px;padding: 4px;">
                    <option value="999" class="advance-options" style="min-width: 186px;">--Chọn mức giá--</option>
                    <option value="0" class="advance-options" style="min-width: 186px;">Thỏa thuận</option>
                    <option value="1" class="advance-options" style="min-width: 186px;">&lt; 500 triệu</option>
                    <option value="2" class="advance-options" style="min-width: 186px;">500 - 800 triệu</option>
                    <option value="3" class="advance-options" style="min-width: 186px;">800 triệu - 1 tỷ</option>
                    <option value="4" class="advance-options current" style="min-width: 186px;">1 - 2 tỷ</option>
                    <option value="5" class="advance-options" style="min-width: 186px;">2 - 3 tỷ</option>
                    <option value="6" class="advance-options" style="min-width: 186px;">3 - 5 tỷ</option>
                    <option value="7" class="advance-options" style="min-width: 186px;">5 - 7 tỷ</option>
                    <option value="8" class="advance-options" style="min-width: 186px;">7 - 10 tỷ</option>
                    <option value="9" class="advance-options" style="min-width: 186px;">10 - 20 tỷ</option>
                    <option value="10" class="advance-options" style="min-width: 186px;">20 - 30 tỷ</option>
                    <option value="11" class="advance-options" style="min-width: 186px;">&gt; 30 tỷ</option>
                </select>
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

            var val0 = $('#choise_project').val() ? $('#choise_project').val() : 0,
                val1 = $("#choise_province").val() ? $("#choise_province").val() : 0,
                val2 = $("#choise_district").val() ? $("#choise_district").val() : 0,
                val3 = $("#choise_ward").val() ? $("#choise_ward").val() : 0,
                val4 = $('#cboArea').val() ? $('#cboArea').val() : 0,
                val5 = $('#cboPrice').val() ? $('#cboPrice').val() : 0;

            var url = "/tim-kiem-nha-dat-ban."+
                    slug($('#city-label').val())+
                    "-"+
                    val1+','+
                    slug($('#district-label').val())+
                    "-"+
                    val2+','+
                    slug($('#ward-label').val())+
                    "-"+
                    val3+','+
                    slug($('#project-label').val())+
                    "-"+
                    val0+','+val4+','+val5
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

    $("#cboArea").on('change', function() {
        setCookie('s-pro-a', $(this).val());
    });
    $("#cboPrice").on('change', function() {
        setCookie('s-pro-c', $(this).val());
    });


    $("#choise_project").on('change', function() {
        setCookie('s-pro-proj', $(this).val());
        $('#project-label').val($(this).find(":selected").text());
    });

    $("#choise_ward").on('change', function() {
        setCookie('s-pro-w', $(this).val());
        $('#ward-label').val($(this).find(":selected").text());

        if($(this).val()) {
            $.post("/web/project/getProject", {wardid: $(this).val()})
                .done(function (data) {
                    data = jQuery.parseJSON(data);
                    var html = '<option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>';
                    $.each(data, function (index, value) {
                        html += '<option value="' + index + '">' + value + '</option>';
                    });
                    $('#choise_project').html(html);
                });
        }else{
            $('#choise_project').html('<option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>');
        }
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
        var s_pro_p = getCookie('s-pro-p');
        var s_pro_d = getCookie('s-pro-d');
        var s_pro_w = getCookie('s-pro-w');
        var s_pro_pro = getCookie('s-pro-proj');
        var s_pro_c = getCookie('s-pro-c');
        var s_pro_a = getCookie('s-pro-a');


        $('#city-label').val('noname');
        $('#district-label').val('noname');
        $('#ward-label').val('noname');
        $('#project-label').val('noname');

        if(s_pro_a){
            $('#cboArea option[value='+s_pro_a+']').attr('selected','selected');
        }
        if(s_pro_c){
            $('#cboPrice option[value='+s_pro_c+']').attr('selected','selected');
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
        if(s_pro_pro && s_pro_d && s_pro_w && s_pro_p){
            $('#project-label').val($('#choise_project option[value='+s_pro_pro+']').text());
        }
    });
</script>
</div>
<div id="ctl30_FooterContainer">
</div>
</div>
<div style="clear: both; margin-bottom: 10px;">
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