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
        background-color: #006478;
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
        Nhà đất cho thuê tại Việt Nam</h1>

    <div class="Footer">
        Có <span class="greencolor"><strong><?php echo $dataProvider->totalItemCount?></strong></span> bất động sản.
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
                    (<?php echo $dataProvider->totalItemCount?>) </span></span></li>
    </ul>
    <input type="hidden" name="ctl00$ctl29$ctl01$hddFilter" id="ctl29_ctl01_hddFilter">

    <div class="Repeat">
        <h2>
            Nhà đất cho thuê Việt Nam</h2>

        <div class="order">
            <span>Sắp xếp theo: </span>
            <select id="choise-type" class="choise-number">
                <option value="0">Thông thường</option>
                <option value="1">Tin mới nhất</option>
                <option value="2">Giá thấp nhất</option>
                <option value="3">Giá cao nhất</option>
                <option value="4">Diện tích nhỏ nhất</option>
                <option value="5">Diện tích lớn nhất</option>
            </select>
<!--            <select name="ctl00$ctl29$ctl01$ddlSortReult"-->
<!--                    onchange="sortchange();setTimeout(&#39;__doPostBack(\&#39;ctl00$ctl29$ctl01$ddlSortReult\&#39;,\&#39;\&#39;)&#39;, 0)"-->
<!--                    id="ddlSortReult">-->
<!--                <option value="0">Thông thường</option>-->
<!--                <option value="1">Tin mới nhất</option>-->
<!--                <option value="2">Giá thấp nhất</option>-->
<!--                <option value="3">Giá cao nhất</option>-->
<!--                <option value="4">Diện tích nhỏ nhất</option>-->
<!--                <option value="5">Diện tích lớn nhất</option>-->
<!---->
<!--</select>-->
</div>
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
        color: #006478;
    }

    .divProjectInfo-right #ProjName {
        color: #006478;
        font-size: 18px;
        font-weight: bold;
    }

    .project-container a.lnkProjectDetail {
        color: #006478;
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
<div class="container-common">
<div id="ctl30_HeaderContainer" class="box-header">
    <div class="name_tit" align="center">
        <div>tìm kiếm nhà đất cho thuê</div>
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
                    <option value="1" class="advance-options" style="min-width: 186px;">&lt; 1 triệu</option>
                    <option value="2" class="advance-options" style="min-width: 186px;">1 - 3 triệu</option>
                    <option value="3" class="advance-options" style="min-width: 186px;">3 - 5 triệu</option>
                    <option value="4" class="advance-options current" style="min-width: 186px;">5 - 10 triệu</option>
                    <option value="5" class="advance-options" style="min-width: 186px;">10 - 40 triệu</option>
                    <option value="6" class="advance-options" style="min-width: 186px;">40 - 70 triệu</option>
                    <option value="7" class="advance-options" style="min-width: 186px;">70 - 100 triệu</option>
                    <option value="8" class="advance-options" style="min-width: 186px;">&gt; 100 triệu</option>
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

            var url = "/tim-kiem-nha-dat-thue."+
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
<!--//Modules/Search/ucSearchContext.ascx--><input type="hidden" name="ctl00$ctl31$ctl01$areaCount" id="areaCount">
<input type="hidden" name="ctl00$ctl31$ctl01$priceCount" id="priceCount">
<input type="hidden" name="ctl00$ctl31$ctl01$roomCount" id="roomCount">

<div id="ctl31_ctl01_HeaderContainer" class="box-header1">
    <div align="center" class="name_tit1 new-header">
        Nhà đất cho thuê
    </div>
</div>
<div id="ctl31_ctl01_bodyContainer" class="bor_box">
    <div id="div_count_product">
        <div id="divCountByAreas">

            <ul>
                <?php foreach($group as $_key => $_val):?>
                    <li><a href="<?php echo $_val->getUrlC()?>"><?php echo $_val->province_name?></a> (<?php echo $_val->created?>)</li>
                <?php endforeach;?>
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
<!--//Modules/Support/FrontEnd/common/SupportInfo.ascx--></div>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/files/js/jquery.cookie.js"></script>
<script>
    if($.cookie('choise-type')){
        $("#choise-type").val($.cookie('choise-type'));
    };
    $('#choise-type').on('change', function(){
        var type = $(this).val();
        $.cookie("choise-type", type, { expires : 1 });
        location.reload();
    });
</script>