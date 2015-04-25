<div id="RightMainContent" class="body-right">

<div class="container-common">
<div id="ctl30_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>TÌM KIẾM MÔ GIỚI TẠI KHU VỰC</div>
    </div>
</div>
<div id="ctl30_BodyContainer" class="bor_box">

<form id="form-search-project" action="<?php echo Yii::app()->createUrl('/web/saler/result')?>" method="GET">
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
                Dự án
            </div>
            <div id="divWard" class="searchrow advance-select-box" style="margin:0px;">
                <?php $province_id_ = isset(Yii::app()->request->cookies['s-pro-p']) ? Yii::app()->request->cookies['s-pro-p']->value : '';$province_id = isset(Yii::app()->request->cookies['s-pro-d']) ? Yii::app()->request->cookies['s-pro-d']->value : '';$distric_id = '';if(isset(Yii::app()->request->cookies['s-pro-proj']->value)) $distric_id = Yii::app()->request->cookies['s-pro-proj']->value;if($province_id && $province_id_):?>
                    <select name="wardid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                        <option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>
                        <?php foreach(Project::model()->getAll($province_id) as $_key => $_val):?>
                            <option value="<?php echo $_val->id?>" <?php if($_val->id == $distric_id) echo 'selected'?> class="advance-options current" style="min-width: 156px;"><?php echo $_val->name?></option>
                        <?php endforeach;?>
                    </select>
                <?php else:?>
                    <select name="wardid" class="advance-options" style="min-width: 188px;padding: 4px;" id="choise_ward">
                        <option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>
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

            var val1 = $("#choise_province").val() ? $("#choise_province").val() : 0,
                val2 = $("#choise_district").val() ? $("#choise_district").val() : 0,
                val3 = $("#choise_ward").val() ? $("#choise_ward").val() : 0;

            var url = "/nha-mo-gioi/ket-qua-tim-kiem."+
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

    $("#choise_ward").on('change', function() {
        setCookie('s-pro-proj', $(this).val());
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
            $.post("/web/project/getProject", {districtid: $(this).val()})
                .done(function (data) {
                    data = jQuery.parseJSON(data);
                    var html = '<option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>';
                    $.each(data, function (index, value) {
                        html += '<option value="' + index + '">' + value + '</option>';
                    });
                    $('#choise_ward').html(html);
                });
        }else{
            $('#choise_ward').html('<option value="" class="advance-options current" style="min-width: 156px;">--Chọn dự án--</option>');
        }
    });

    $(function () {
        var s_pro_p = getCookie('s-pro-p');
        var s_pro_d = getCookie('s-pro-d');
        var s_pro_w = getCookie('s-pro-proj');

        $('#city-label').val('noname');
        $('#district-label').val('noname');
        $('#ward-label').val('noname');

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
        <div class="divIndividual">
            <div class="childIndividual individualActive">
                <div>
                    <?php foreach($saler as $_key => $_val):?>
                        <div class="vip-row" style="overflow: hidden">
                            <div class="avatar">
                                <a href="<?php echo $_val->url?>" rel="nofollow">
                                    <img class="img" style="float: left;" src="<?php echo $_val->getImageUrl()?>">
                                </a>
                            </div>
                            <a class="link colorboldblue" href="<?php echo $_val->url?>" rel="nofollow">
                                <?php echo $_val->name?>
                            </a>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <a href="<?php echo Yii::app()->createUrl('/web/saler/list')?>" class="linktoall" rel="nofollow">Xem tất cả</a>
    </div>
</div>

<style type="text/css">
    .fone {
        color: #e70404;
        line-height: 20px;
    }

    /*.divIndividual {*/
        /*position: relative;*/
        /*overflow: hidden;*/
        /*width: 203px;*/
    /*}*/

    /*.divIndividual div.childIndividual {*/
        /*position: absolute;*/
        /*width: 203px;*/
        /*top: 0;*/
    /*}*/
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
                <?php foreach($group as $_key => $_val):?>
                    <ul>
                        <li class="menu-inactive"><a href="<?php echo $_val->cUrl?>" title="<?php echo $_val->province_name?>"><?php echo $_val->province_name?> (<?php echo $_val->created?>)</a></li>
                    </ul>
                <?php endforeach;?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>

</div>
<!--//Modules/Broker/CitiesMenu/CitiesMenu.ascx--></div>