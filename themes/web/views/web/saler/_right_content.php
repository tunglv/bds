<div id="RightMainContent" class="body-right">

<div class="container-common">
<div id="ctl30_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>TÌM KIẾM MÔ GIỚI TẠI KHU VỰC</div>
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
                    var html = '';
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
                    var html = '';
                    $.each(data, function (index, value) {
                        html += '<option value="' + index + '">' + value + '</option>';
                    });

                    $('#choise_ward').html('<option value="" class="advance-options current" style="min-width: 156px;">--Phường/Xã--</option>');
                });
        }else{
            $('#choise_ward').html(html);
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
<!--//Modules/Broker/Search/Search.ascx-->
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.343517.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://kientrucvip.com/" bid="1351" tip="" tp="7"
         w="240" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=1351" target="_blank" title=""
                           rel="nofollow"><img src="/themes/web/files/images/file.343517.jpg"
                                               style="width: 100%; height:90px;" class="view-count click-count"
                                               bannerid="1351"></a></div>
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.245648.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://thanglonglaw.com.vn" bid="643" tip="" tp="7"
         w="210" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=643" target="_blank" title=""
                           rel="nofollow"><img src="/themes/web/files/images/file.245648.jpg"
                                               style="width: 100%; height:90px;" class="view-count click-count"
                                               bannerid="643"></a></div>
</div>

<div style="clear:both;"></div>
<!--//Modules/Broker/CategoriesMenu/CategoriesMenu.ascx-->

<div class="container-default">
<div id="ctl34_BodyContainer">
<div class="enterprise-rightContent">
<div class="rc11">
    <div class="title-style">
        <h3>
            NHÀ MÔI GIỚI TIÊU BIỂU</h3>
    </div>
</div>
<div class="rc12">
<div class="divIndividual" style="height: 790px">
<div class="childIndividual notIndividualActive" style="left: 200px;">

    <div>

        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar">
                <a href="http://batdongsan.com.vn/ban-dat-nen-du-an-cau-giay/cong-ty-co-eb1921"
                   rel="nofollow">
                    <img class="img" style="float: left;"
                         src="/themes/web/files/images/thumb200x200.478450.jpg">
                </a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-dat-nen-du-an-cau-giay/cong-ty-co-eb1921" rel="nofollow">
                Công ty Cổ phần Bất động sản VNG Việt Nam</a>
        </div>

        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar">
                <a href="http://batdongsan.com.vn/ban-dat-nen-du-an-quan-7/cong-ty-tn-eb1939"
                   rel="nofollow">
                    <img class="img" style="float: left;"
                         src="/themes/web/files/images/thumb200x200.503895.jpg">
                </a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-dat-nen-du-an-quan-7/cong-ty-tn-eb1939" rel="nofollow">
                Công ty TNHH Dịch vụ Bất động sản Tân Hưng</a>
        </div>

        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar">
                <a href="http://batdongsan.com.vn/ban-nha-rieng-quan-10/cong-ty-ba-eb1232" rel="nofollow">
                    <img class="img" style="float: left;"
                         src="/themes/web/files/images/thumb200x200.407603.jpg">
                </a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-quan-10/cong-ty-ba-eb1232" rel="nofollow">
                Công ty Bất động sản Tân Kỷ Nguyên</a>
        </div>

    </div>

    <div id="repIndividualFirst">
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thuy-phuong-ib250403"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.463269.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thuy-phuong-ib250403"
               rel="nofollow">Nguyễn Thùy Phương</a>

            <div class="fone">0983053808</div>
            Chuyên môi giới, mua bán, ký gửi bất động sản tại TPHCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-ngoc-ha-ib597"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="/themes/web/files/images/thumb200x200.553.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-ngoc-ha-ib597" rel="nofollow">Nguyễn
                Ngọc Hà</a>

            <div class="fone">0903696093</div>
            Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thanh-hien-ib181143"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.518908.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thanh-hien-ib181143"
               rel="nofollow">Nguyễn Thanh Hiền</a>

            <div class="fone">0909677159</div>
            Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM.
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-thuy-phuong-ib250403"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file1.batdongsan.com.vn/thumb200x200.463269.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-thuy-phuong-ib250403"
               rel="nofollow">Nguyễn Thùy Phương</a>

            <div class="fone">0983053808</div>
            Chuyên môi giới, mua bán, ký gửi bất động sản tại TPHCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-thi-dung-ib174925" rel="nofollow"><img
                        class="img" style="float: left;"
                        src="http://file1.batdongsan.com.vn/thumb200x200.518192.jpg"></a></div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-thi-dung-ib174925"
               rel="nofollow">Nguyễn Thị Dung</a>

            <div class="fone">0977208969</div>
            Chuyên môi giới BĐS, nhận ký gửi và xây dựng nhà TP HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-thanh-hien-ib181143"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file1.batdongsan.com.vn/thumb200x200.518908.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-thanh-hien-ib181143"
               rel="nofollow">Nguyễn Thanh Hiền</a>

            <div class="fone">0909677159</div>
            Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM.
        </div>
    </div>
</div>
<div class="childIndividual individualActive" style="left: 0px;">
    <div id="repIndividualSecond">
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-ngoc-hong-ib279416"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.511700.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-ngoc-hong-ib279416"
               rel="nofollow">Nguyễn Ngọc Hồng</a>

            <div class="fone">0915555847</div>
            Chuyên môi giới và nhận ký gửi Bất động sản tại TPHCM.
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-hong-trang-ib198588"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/20150210084217-efd7.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-hong-trang-ib198588"
               rel="nofollow">Nguyễn Hồng Trang</a>

            <div class="fone">0919910070</div>
            Chuyên môi giới và nhận ký gửi BĐS tại TP.HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-dat-nen-du-an-quan-9/dinh-tien-manh-ib268496"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.493382.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-dat-nen-du-an-quan-9/dinh-tien-manh-ib268496"
               rel="nofollow">Đinh Tiến Mạnh</a>

            <div class="fone">0906348283</div>
            Chuyên tư vấn, môi giới BĐS tại Quận 9
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-mat-pho-thuan-an-bd/dia-oc-thanh-hung-ib270357"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.484856.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-mat-pho-thuan-an-bd/dia-oc-thanh-hung-ib270357"
               rel="nofollow">Nguyễn Hùng</a>

            <div class="fone">0944156575</div>
            Mua bán ký gửi nhà và đất Bình Dương
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a
                    href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thi-dung-ib174925"
                    rel="nofollow"><img class="img" style="float: left;"
                                        src="/themes/web/files/images/thumb200x200.518192.jpg"></a>
            </div>
            <a class="link colorboldblue"
               href="http://batdongsan.com.vn/ban-nha-rieng-go-vap/nguyen-thi-dung-ib174925" rel="nofollow">Nguyễn
                Thị Dung</a>

            <div class="fone">0977208969</div>
            Chuyên môi giới BĐS, nhận ký gửi và xây dựng nhà TP HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-hong-trang-ib198588"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file4.batdongsan.com.vn/resize/200x200/2015/02/10/JGcIp0rf/20150210084217-efd7.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-hong-trang-ib198588"
               rel="nofollow">Nguyễn Hồng Trang</a>

            <div class="fone">0919910070</div>
            Chuyên môi giới và nhận ký gửi BĐS tại TP.HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-mat-pho-thuan-an-bd/dia-oc-thanh-hung-ib270357"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file1.batdongsan.com.vn/thumb200x200.484856.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-nha-mat-pho-thuan-an-bd/dia-oc-thanh-hung-ib270357"
               rel="nofollow">Nguyễn Hùng</a>

            <div class="fone">0944156575</div>
            Mua bán ký gửi nhà và đất Bình Dương
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-ngoc-hong-ib279416"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file1.batdongsan.com.vn/thumb200x200.511700.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-ngoc-hong-ib279416"
               rel="nofollow">Nguyễn Ngọc Hồng</a>

            <div class="fone">0915555847</div>
            Chuyên môi giới và nhận ký gửi Bất động sản tại TPHCM.
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-nha-rieng-go-vap/nguyen-ngoc-ha-ib597" rel="nofollow"><img
                        class="img" style="float: left;"
                        src="http://file1.batdongsan.com.vn/thumb200x200.553.jpg"></a></div>
            <a class="link colorboldblue" href="/ban-nha-rieng-go-vap/nguyen-ngoc-ha-ib597" rel="nofollow">Nguyễn
                Ngọc Hà</a>

            <div class="fone">0903696093</div>
            Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM
        </div>
        <div class="vip-row" style="height: 105px; overflow: hidden">
            <div class="avatar"><a href="/ban-dat-nen-du-an-quan-9/dinh-tien-manh-ib268496"
                                   rel="nofollow"><img class="img" style="float: left;"
                                                       src="http://file1.batdongsan.com.vn/thumb200x200.493382.jpg"></a>
            </div>
            <a class="link colorboldblue" href="/ban-dat-nen-du-an-quan-9/dinh-tien-manh-ib268496"
               rel="nofollow">Đinh Tiến Mạnh</a>

            <div class="fone">0906348283</div>
            Chuyên tư vấn, môi giới BĐS tại Quận 9
        </div>
    </div>
</div>
</div>
<a href="./Môi giới nhà đất   Các cá nhân, công ty môi giới nhà đất_files/Môi giới nhà đất   Các cá nhân, công ty môi giới nhà đất.html"
   class="linktoall" rel="nofollow">Xem tất cả</a>
</div>
</div>

<style type="text/css">
    .fone {
        color: #e70404;
        line-height: 20px;
    }

    .divIndividual {
        position: relative;
        overflow: hidden;
        width: 203px;
    }

    .divIndividual div.childIndividual {
        position: absolute;
        width: 203px;
        top: 0;
    }
</style>

<script>
    function slideSwitchIndividual() {
        var active = $('.divIndividual div.individualActive');
        var notActive = $('.divIndividual div.notIndividualActive');

        active.animate({
            "left": (-200)
        }, 1000, function () {
            $(this).css('left', '200px');
            $(this).toggleClass('individualActive');
            $(this).toggleClass('notIndividualActive');
        });

        notActive.animate({
            "left": (0)
        }, 1000, function () {
            $(this).toggleClass('individualActive');
            $(this).toggleClass('notIndividualActive');
        });
    }

    var individualInterval;

    function SetInterValIndividual() {
        if ($('.divIndividual .childIndividual').length > 1) {
            individualInterval = setInterval("slideSwitchIndividual()", 5000);
        }
    }

    function ClearInterValIndividual() {
        if (individualInterval != undefined) {
            clearInterval(individualInterval);
        }
    }

    function RenderIndividuals(individualJsons) {
        if (individualJsons != undefined && individualJsons.length > 0) {
            var limit = individualJsons.length,
                lower_bound = 0,
                upper_bound = individualJsons.length - 1,
                unique_random_numbers = [];
            while (unique_random_numbers.length < limit) {
                var random_number = Math.round(Math.random() * (upper_bound - lower_bound) + lower_bound);
                if (jQuery.inArray(random_number, unique_random_numbers) == -1) {
                    unique_random_numbers.push(random_number);
                }
            }

            for (var i = 0; i < unique_random_numbers.length; i++) {
                if (i < 3) {
                    AddItem('#repIndividualFirst', individualJsons[unique_random_numbers[i]]);
                } else {
                    AddItem('#repIndividualSecond', individualJsons[unique_random_numbers[i]]);
                }
            }
        }
    }

    function AddItem(control, individuaValue) {
        $(control).html($(control).html() + '<div class="vip-row" style="height: 105px; overflow: hidden">'
        + '<div class="avatar">'
        + '<a href="' + individuaValue.Url + '" rel="nofollow"><img class="img" style="float: left;" src="' + individuaValue.Avatar + '" /></a>'
        + '</div>'
        + '<a class="link colorboldblue" href="' + individuaValue.Url + '" rel="nofollow">' + individuaValue.Name + '</a>'
        + '<div class="fone">' + individuaValue.Mobile + '</div>' + individuaValue.ShortDesc
        + '</div>');
    }

    $(function () {
        var individualJsons = [{
            "Url": "/ban-nha-rieng-go-vap/nguyen-ngoc-ha-ib597",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.553.jpg",
            "Name": "Nguyễn Ngọc Hà",
            "Mobile": "0903696093",
            "ShortDesc": "Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM"
        }, {
            "Url": "/ban-nha-rieng-go-vap/nguyen-thi-dung-ib174925",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.518192.jpg",
            "Name": "Nguyễn Thị Dung",
            "Mobile": "0977208969",
            "ShortDesc": "Chuyên môi giới BĐS, nhận ký gửi và xây dựng nhà TP HCM"
        }, {
            "Url": "/ban-nha-rieng-go-vap/nguyen-thanh-hien-ib181143",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.518908.jpg",
            "Name": "Nguyễn Thanh Hiền",
            "Mobile": "0909677159",
            "ShortDesc": "Chuyên môi giới và nhận ký gửi Bất Động Sản tại TP.HCM."
        }, {
            "Url": "/ban-nha-rieng-go-vap/nguyen-hong-trang-ib198588",
            "Avatar": "http://file4.batdongsan.com.vn/resize/200x200/2015/02/10/JGcIp0rf/20150210084217-efd7.jpg",
            "Name": "Nguyễn Hồng Trang",
            "Mobile": "0919910070",
            "ShortDesc": "Chuyên môi giới và nhận ký gửi BĐS tại TP.HCM"
        }, {
            "Url": "/ban-nha-rieng-go-vap/nguyen-thuy-phuong-ib250403",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.463269.jpg",
            "Name": "Nguyễn Thùy Phương",
            "Mobile": "0983053808",
            "ShortDesc": "Chuyên môi giới, mua bán, ký gửi bất động sản tại TPHCM"
        }, {
            "Url": "/ban-dat-nen-du-an-quan-9/dinh-tien-manh-ib268496",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.493382.jpg",
            "Name": "Đinh Tiến Mạnh",
            "Mobile": "0906348283",
            "ShortDesc": "Chuyên tư vấn, môi giới BĐS tại Quận 9"
        }, {
            "Url": "/ban-nha-mat-pho-thuan-an-bd/dia-oc-thanh-hung-ib270357",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.484856.jpg",
            "Name": "Nguyễn Hùng",
            "Mobile": "0944156575",
            "ShortDesc": "Mua bán ký gửi nhà và đất Bình Dương"
        }, {
            "Url": "/ban-nha-rieng-go-vap/nguyen-ngoc-hong-ib279416",
            "Avatar": "http://file1.batdongsan.com.vn/thumb200x200.511700.jpg",
            "Name": "Nguyễn Ngọc Hồng",
            "Mobile": "0915555847",
            "ShortDesc": "Chuyên môi giới và nhận ký gửi Bất động sản tại TPHCM."
        }];
        RenderIndividuals(individualJsons);
        SetInterValIndividual();
        if ($('.divIndividual .childIndividual').length > 1) {
            $('.divIndividual').mouseover(function () {
                ClearInterValIndividual();
            });

            $('.divIndividual').mouseout(function () {
                SetInterValIndividual();
            });
        }
    });
</script>
</div>

</div>
<!--//Modules/BrokeEnterprise/Viewer/Typical/TypicalBrokeEnterprise.ascx-->

<div class="container-default">
    <div id="ctl35_BodyContainer">
        <div id="leftMenu">
            <div class="menu-title"><h3
                    style=" font-weight: bold !important;color: white !important;font-family: tahoma !important;font-size: 12px !important;">
                    THEO TỈNH / TP</h3></div>
            <div class="menu-right">
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-ninh-binh"
                                                 title="Ninh Bình">Ninh Bình (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-hai-phong"
                                                 title="Hải Phòng">Hải Phòng (36)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-tay-ninh" title="Tây Ninh">Tây
                            Ninh (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-lang-son" title="Lạng Sơn">Lạng
                            Sơn (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-quang-ninh"
                                                 title="Quảng Ninh">Quảng Ninh (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-hung-yen" title="Hưng Yên">Hưng
                            Yên (3)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-hoa-binh" title="Hòa Bình">Hòa
                            Bình (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-vinh-phuc"
                                                 title="Vĩnh Phúc">Vĩnh Phúc (5)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-an-giang" title="An Giang">An
                            Giang (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-binh-dinh"
                                                 title="Bình Định">Bình Định (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-nam-dinh" title="Nam Định">Nam
                            Định (5)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-ha-noi" title="Hà Nội">Hà
                            Nội (712)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-can-tho" title="Cần Thơ">Cần
                            Thơ (7)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-dong-thap"
                                                 title="Đồng Tháp">Đồng Tháp (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-long-an" title="Long An">Long
                            An (4)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-thai-binh"
                                                 title="Thái Bình">Thái Bình (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-khanh-hoa"
                                                 title="Khánh Hòa">Khánh Hòa (20)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-bac-giang"
                                                 title="Bắc Giang">Bắc Giang (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-thua-thien-hue"
                                                 title="Thừa Thiên Huế">Thừa Thiên Huế (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-dak-lak" title="Đắk Lắk">Đắk
                            Lắk (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-dong-nai" title="Đồng Nai">Đồng
                            Nai (35)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-thanh-hoa"
                                                 title="Thanh Hóa">Thanh Hóa (3)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-bac-ninh" title="Bắc Ninh">Bắc
                            Ninh (3)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-ba-ria-vung-tau"
                                                 title="Bà Rịa Vũng Tàu">Bà Rịa Vũng Tàu (25)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-binh-thuan"
                                                 title="Bình Thuận  ">Bình Thuận (7)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-bac-lieu" title="Bạc Liêu">Bạc
                            Liêu (2)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-da-nang" title="Đà Nẵng">Đà
                            Nẵng (72)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-tien-giang"
                                                 title="Tiền Giang">Tiền Giang (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-lam-dong" title="Lâm Đồng">Lâm
                            Đồng (7)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-binh-duong"
                                                 title="Bình Dương">Bình Dương (111)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-ben-tre" title="Bến Tre">Bến
                            Tre (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-thai-nguyen"
                                                 title="Thái Nguyên">Thái Nguyên (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-quang-nam"
                                                 title="Quảng Nam">Quảng Nam (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-hai-duong"
                                                 title="Hải Dương">Hải Dương (3)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-vinh-long"
                                                 title="Vĩnh Long">Vĩnh Long (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-kien-giang"
                                                 title="Kiên Giang">Kiên Giang (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-nghe-an" title="Nghệ An">Nghệ
                            An (3)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-ha-tinh" title="Hà Tĩnh">Hà
                            Tĩnh (1)</a></li>
                </ul>
                <ul>
                    <li class="menu-inactive"><a href="http://batdongsan.com.vn/nha-moi-gioi-tp-hcm"
                                                 title="Hồ Chí Minh">Hồ Chí Minh (1642)</a></li>
                </ul>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

</div>
<!--//Modules/Broker/CitiesMenu/CitiesMenu.ascx--></div>