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