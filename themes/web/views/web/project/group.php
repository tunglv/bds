<div id="MainContent" xmlns="http://www.w3.org/1999/html"></div>
<div class="parent-main-left">
<!-- begin breakcrum-->

<!-- end breakcrum-->
<div id="TopContent" class="div_2col1"></div>

<div class="div_2col1">
<div class="clear">
</div>
<div id="LeftMainContent" class="t_left1">

<div class="container-default">
<div id="ctl28_BodyContainer">
<div>
<h1 class="tc-duan-title bluebg">
    Các dự án bất động sản hàng đầu</h1>

<div class="clear10"></div>

<div class="tc-duan-img">

    <?php foreach ($project as $_key => $_val): ?>
        <div class="tc-duan-img-<?php echo $_key ?>" style="display: none;">
            <div>
                <a href="<?php echo $_val->url?>" title="<?php echo $_val->name ?>">
                    <img src="<?php echo $_val->getImageUrl('', '530') ?>" width="530px" height="345px"
                         alt="<?php echo $_val->name ?>">
                </a>
            </div>
            <div class="tc-duan-tit1">
                <h3 class="title-tt"><a href="<?php echo $_val->url?>" title="<?php echo $_val->name ?>"><?php echo $_val->name ?></a></h3>
                <span><?php echo $_val->address ?></span>
            </div>
        </div>
    <?php endforeach; ?>

</div>
<div class="clear"></div>
<div class="tc-duan-2" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 540px;">
    <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 1980px; left: -720px;">
        <?php foreach ($project as $_key => $_val): ?>
            <li id="item_<?php echo $_key ?>" style="overflow: hidden; float: left; width: 170px; height: 168px;">
                <div style="background-color: #CFE5F7;">
                    <div class="tc-duan-tit2-content-img">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('', '170')?>" width="170px" height="100px" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div style="text-align: center; margin-top: 5px;">
                        <div>
                            <strong><a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>"><?php echo $_val->name?></a></strong>
                        </div>
                        <div class="tc-duan-tit2-content-text">
                            <p class="pad-bot-10"><?php echo $_val->address?></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="bar bar_<?php echo $_key?>" style="display: none;"><img style="width: 170px;" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/bar-arrow.jpg">
                    </div>
                </div>
            </li>
        <?php endforeach ?>
    </ul>

    <div class="btnnext"><img
            src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/next.png"></div>
    <div class="btnprev"><img
            src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/prev.png"></div>
    <input type="hidden" id="currPrj" value="0">
</div>


<style type="text/css">

</style>

<script type="text/javascript">
    $(document).ready(function () {
        $(".tc-duan-img-0").css("display", "block");
        $(".bar_0").css("display", "block");

        // $(function () {
        $(".tc-duan-2").jCarouselLite({
            vertical: false,
            visible: 3,
            auto: 4000,
            speed: 1500,
            btnNext: ".btnnext",
            btnPrev: ".btnprev",
            afterEnd: function (a) {
                var id = parseInt(a.attr("id").split("_")[1]);
                var curId = parseInt($("#currPrj").val());

                if (curId <= id || (curId == 4 && id == 0)) {
                    $("#currPrj").val(id);
                    $(".bar_" + id).css("display", "block");
                    $(".bar_" + curId).css("display", "none");
                    $(".tc-duan-img-" + id).fadeIn(500, function () {
                        $(".tc-duan-img-" + id).css("display", "block");
                    });
                    $(".tc-duan-img-" + curId).css("display", "none");
                } else {
                    $("#currPrj").val(id);
                    $(".bar_" + id).css("display", "block");
                    $(".bar_" + curId).css("display", "none");
                    $(".tc-duan-img-" + id).fadeIn(500, function () {
                        $(".tc-duan-img-" + id).css("display", "block");
                    });
                    $(".tc-duan-img-" + curId).css("display", "none");
                }

            }
        });
        // });
    });
</script>
<?php if(count($project_1) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'cao-oc-van-phong'))?>" title="Cao ốc văn phòng"><span style="white-space:nowrap;">Cao ốc văn phòng</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_1 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->name?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if(count($project_2) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-can-ho'))?>" title="Khu căn hộ"><span style="white-space:nowrap;">Khu căn hộ</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_2 as $_key=>$_val):?>
            <div class="parentitem">
                <div class="ava">
                    <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                        <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                </div>
            </div>
            <?php endforeach;?>

            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if(count($project_3) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-do-thi-moi'))?>" title="Khu đô thị mới"><span style="white-space:nowrap;">Khu đô thị mới</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_3 as $_key => $_val):?>
            <div class="parentitem">
                <div class="ava">
                    <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                        <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                </div>
            </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if(count($project_4) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-thuong-mai-dich-vu'))?>" title="Khu thương mại dịch vụ"><span style="white-space:nowrap;">Khu thương mại dịch vụ</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_5 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if(count($project_5) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-phuc-hop'))?>" title="Khu phức hợp"><span style="white-space:nowrap;">Khu phức hợp</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_5 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if(count($project_6) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-dan-cu'))?>" title="Khu dân cư"><span style="white-space:nowrap;">Khu dân cư</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_6 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>

<?php if(count($project_7) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-du-lich-nghi-duong'))?>" title="Khu du lịch- nghỉ dưỡng"><span style="white-space:nowrap;">Khu du lịch- nghỉ dưỡng</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_7 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if(count($project_8) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-cong-nghiep'))?>" title="Khu công nghiệp"><span style="white-space:nowrap;">Khu công nghiệp</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_8 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if(count($project_9) > 0):?>
<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="<?php echo Yii::app()->createUrl('/web/project/list', array('alias'=>'du-an-khac'))?>" title="Dự án khác"><span style="white-space:nowrap;">Dự án khác</span></a>
    </h2>
    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_9 as $_key => $_val):?>
                <div class="parentitem">
                    <div class="ava">
                        <a href="<?php echo $_val->url?>" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="<?php echo $_val->url?>"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->address?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#TopContentLeft').parent().remove();
    })
</script>
</div>

</div>
<!--//Modules/Project/Project.ascx--></div>
<div id="MiddleMainContent" class="t_right">
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

<!--//Modules/Project/ProjectHighlights.ascx-->
<div class="container-common">
    <div id="ctl35_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>TIN TỨC LIÊN QUAN</div>
        </div>
    </div>
    <div id="ctl35_BodyContainer" class="bor_box">
        <?php foreach($hot_news as $_key => $_val):?>
            <div style="padding: 5px; width: 60px; height: 60px; float: left;">
                <div class="many-readers-title-icon"><a title="<?php echo $_val->title?>" href="<?php echo $_val->url?>">
                        <img style="width: 60px; height: 60px;" src="<?php echo $_val->getImageUrl()?>">
                    </a>
                </div>
            </div>
            <div class="data-default-CSSClass">
                <p style="padding: 0px; margin: 5px 5px 0 0;">
                    <a class="controls-view-date-contents-link" href="<?php echo $_val->url?>" title="<?php echo $_val->title?>"><?php echo $_val->title?></a>
                </p>
            </div>
            <div style="clear: both;"></div>
        <?php endforeach;?>

        <div style="clear: both;"></div>
    </div>
    <div id="ctl35_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/News/ViewerNews/TopMostRead/ManyReaders.ascx-->
<div class="container-common">
    <div id="ctl36_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>Chủ đề được quan tâm</div>
        </div>
    </div>
    <div id="ctl36_BodyContainer" class="bor_box">

        <div class="list">
            <ul>
                <?php foreach($hot_topic as $_key => $_val):?>
                <li><a href="<?php echo $_val->url?>" title="<?php echo $_val->title?>"><?php echo $_val->title?></a></li>
                <?php endforeach;?>
            </ul>

        </div>


    </div>
    <div id="ctl36_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;"></div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/FaqViewList/FAQOptionList.ascx--></div>
<div class="clear">
</div>
</div>
</div>
<div id="RightMainContent" class="col_right parent-main-right">
    <div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
        <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.343517.jpg"
             altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://kientrucvip.com/" bid="1351" tip="" tp="7"
             w="240" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=1351" target="_blank" title=""
                               rel="nofollow"><img
                    src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.343517.jpg"
                    style="width: 100%; height:90px;" class="view-count click-count" bannerid="1351"></a></div>
        <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.245648.jpg"
             altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://thanglonglaw.com.vn" bid="643" tip=""
             tp="7" w="210" h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=643" target="_blank" title=""
                                      rel="nofollow"><img
                    src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.245648.jpg"
                    style="width: 100%; height:90px;" class="view-count click-count" bannerid="643"></a></div>
    </div>

    <div style="clear:both;"></div>
    <!--//Modules/Banner/Preview/MainRight/BannerPreviewMainRight.ascx--></div>
<div class="clear">
</div>

<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>
<div id="boxLinkFooter_boxLink" class="footer-link-other boxlink-footer">
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-binh-minh-13">Bán đất Bình Minh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-duong-xa">Bán đất Dương Xá</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-quan-tru">Bán đất Quán Trữ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-phu-lo">Bán đất Phù Lỗ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-doi-can">Bán đất Đội Cấn</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-lam-ha">Bán đất Lãm Hà</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-15-5">Bán đất Phường 15 Bình Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-du-hang-kenh">Bán đất Dư Hàng Kênh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-phu-minh-2">Bán đất Phú Minh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-quang-trung-17">Bán đất Quang Trung</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-tam-hung-1">Bán đất Tam Hưng</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-nhan-chinh">Bán đất Nhân Chính</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-quan-hoa">Bán đất Quan Hoa</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-trang-cat">Bán đất Tràng Cát</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-co-loa">Bán đất Cổ Loa</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-chuong-duong-1">Bán đất Chương Dương</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-phuc-la">Bán đất Phúc La</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-can-thanh">Bán đất Cần Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-hiep-tan">Bán đất Hiệp Tân</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-hung-vuong">Bán đất Hùng Vương</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-an-hai-dong">Bán đất An Hải Đông</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/ban-chung-cu-mini-tu-liem">bán chung cư mini từ liêm</a></li>
        <li><a href="http://batdongsan.com.vn/tags/cho-thue/thue-nha-nguyen-can-o-thu-duc">thuê nhà nguyên căn ở thủ
                đức</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-an-tay">Bán đất An Tây</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-co-bi-1">Bán đất Cổ Bi</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-17-1">Bán đất Phường 17 Bình Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-tien-duoc">Bán đất Tiên Dược</a></li>
        <li><a href="http://batdongsan.com.vn/tags/ban/mua-chung-cu-gia-re-ha-noi">mua chung cư giá rẻ hà nội</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-kim-son-7">Bán đất Kim Sơn</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-yen-thuong-1">Bán đất Yên Thường</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-thinh-liet">Bán đất Thịnh Liệt</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-thuong-mo">Bán đất Thượng Mỗ</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-phu-thanh">Bán đất Phú Thạnh</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-man-thai">Bán đất Mân Thái</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-dong-hoa-1">Bán đất Đồng Hòa</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-dong-hai-3">Bán đất Đông Hải 1</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-hoa-phong">Bán đất Hòa Phong</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-tam-hiep-6">Bán đất Tam Hiệp</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-tan-thuan-dong-1">Bán đất Tân Thuận Đông</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-bich-hoa">Bán đất Bích Hòa</a></li>
    </ul>
    <ul>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-hoa-phu">Bán đất Hòa Phú</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-binh-loi-1">Bán đất Bình Lợi</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-tan-quy-tay">Bán đất Tân Quý Tây</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-pham-ngu-lao-1">Bán đất Phạm Ngũ Lão</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-thuy-phuong">Bán đất Thụy Phương</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-tan-kieng">Bán đất Tân Kiểng</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-nghia-do-1">Bán đất Nghĩa Đô</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-dong-xuan-2">Bán đất Đông Xuân</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-phuong-13-8">Bán đất Phường 13 Gò Vấp</a></li>
        <li><a href="http://batdongsan.com.vn/ban-dat-xa-dai-mach">Bán đất Đại Mạch</a></li>
    </ul>
</div>
<script type="text/javascript">
    if ($("#boxLinkFooter_boxLink").height() >= 240) {
        $("#boxLinkFooter_boxLink").css("height", "240px");
        $("#boxLinkFooter_boxLink").css("overflow", "hidden")
    }
</script>