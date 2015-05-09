<div class="header-top">
    <div class="header-top-left">

        <div style="padding-top: 5px;">


            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/logo-bds.jpg" alt="Nhà đất"
                 style="padding-top: 2px;">


        </div>
    </div>
    <div class="header-top-right">
        <div id="TopBanner">

            <div class="container-default">
                <div id="ctl25_BodyContainer">
                    <div class="adPosition" positioncode="BANNER_POSITION_TOP" stylex="" hasshare="True"
                         hasnotshare="False">
                        <div class="adshared">
                            <div class="adshareditem aditem" time="10" style="display: block"
                                 src="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228100005-TruongNM_CuongDM_150228_746x96.swf"
                                 altsrc="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228100012-7b97.jpg"
                                 link="http://namtien.vn/" bid="2611" tip="" tp="6" w="746" h="96">
                                <object id="obj2611" width="746px" border="0" height="96px" class="view-count"
                                        bannerid="2611"
                                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                                        classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
                                    <param
                                        value="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228100005-TruongNM_CuongDM_150228_746x96.swf"
                                        name="movie">
                                    <param value="link=http://batdongsan.com.vn/click.aspx?bannerid=2611"
                                           name="flashvars">
                                    <param value="always" name="AllowScriptAccess">
                                    <param value="High" name="quality">
                                    <param value="transparent" name="wmode">
                                    <embed name="obj2611" width="746px" height="96px" allowscriptaccess="always"
                                           wmode="transparent" loop="true" play="true"
                                           type="application/x-shockwave-flash"
                                           pluginspage="http://www.macromedia.com/go/getflashplayer"
                                           src="http://file4.batdongsan.com.vn/2015/02/28/V5fQl2m0/20150228100005-TruongNM_CuongDM_150228_746x96.swf"
                                           flashvars="link=http://batdongsan.com.vn/click.aspx?bannerid=2611">
                                </object>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--//Modules/Banner/Preview/Top/BannerPreviewTop.ascx--></div>
    </div>
</div>

<div class="header-menu" style="margin-bottom: 20px;">
<div id="left-page-nav"></div>
<div class="menupad"></div>
<div id="page-navigative-menu">
<div class="ihome">
    <a href="http://<?php echo $this->domain?>"><img
            src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/homea.gif"></a>
</div>
<ul class="dropdown-navigative-menu">
<li class="lv0"><a href="<?php echo Yii::app()->createUrl('/web/sale/list', array('typeOf' => 'tong-hop'));?>" class="haslink ">Nhà đất bán</a>
    <ul>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/sale/list', array('typeOf' => 'ban-chung-cu'))?>" class="haslink ">Bán căn hộ chung cư</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/sale/list', array('typeOf' => 'ban-nha-rieng'))?>" class="haslink ">Bán nhà riêng</a></li>
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/sale/list', array('typeOf' => 'ban-khu-lien-ke'))?><!--" class="haslink ">Bán căn hộ chung cư</a></li>-->
    </ul>
</li>
<li class="lv0"><a href="<?php echo Yii::app()->createUrl('/web/rent/list', array('typeOf' => 'tong-hop'));?>" class="haslink ">Nhà đất cho thuê</a>
    <ul>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/rent/list', array('typeOf' => 'cho-thue-can-ho-chung-cu'))?>" class="haslink ">Cho thuê căn hộ chung cư</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/rent/list', array('typeOf' => 'cho-thue-nha-rieng'))?>" class="haslink ">Cho thuê nhà riêng</a></li>
    </ul>
</li>
<li class="lv0"><a href="<?php echo Yii::app()->createUrl('/tin-tuc');?>" class="haslink ">Tin tức</a>
    <ul>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/news/list', array('alias' => 'tin-tuc-thi-truong'))?>" class="haslink ">Tin thị
                trường</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/news/list', array('alias' => 'chinh-sach-quan-ly'))?>" class="haslink ">Chính sách -
                Quản lý</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/news/list', array('alias' => 'thong-tin-quy-hoach'))?>" class="haslink ">Thông tin
                quy hoạch</a></li>
    </ul>
</li>
<li class="lv0"><a href="javascript:;" class="nolink ">Kiến trúc</a>
    <ul>
        <li class="lv2"><a href="<?php echo Yii::app()->createUrl('/web/architecture/list', array('alias' => 'tu-van-thiet-ke'))?>" class="haslink ">Tư vấn
                thiết kế</a></li>
        <li class="lv2"><a href="<?php echo Yii::app()->createUrl('/web/architecture/list', array('alias' => 'nha-dep'))?>" class="haslink ">Nhà đẹp</a></li>
    </ul>
</li>
<li class="lv0"><a href="<?php echo Yii::app()->createUrl('/noi-ngoai-that');?>" class="haslink ">Nội - Ngoại thất</a>
    <ul>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'ngoai-that'))?>" class="haslink ">Ngoại thất</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'noi-that'))?>" class="haslink">Nội thất</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'tu-van-noi-ngoai-that'))?>" class="haslink ">Tư vấn nội ngoại thất</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'mach-ban'))?>" class="haslink ">Mách bạn</a></li>
    </ul>
</li>
<li class="lv0"><a href="" class="nolink">Phong thủy</a>
    <ul>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/pt/list', array('alias' => 'mach-ban'))?>" class="haslink ">Phong thủy</a></li>
        <li class="lv1"><a href="<?php echo Yii::app()->createUrl('/web/pt/list', array('alias' => 'tu-van-phong-thuy'))?>" class="haslink ">Tư vấn phong thủy</a></li>
    </ul>
</li>
<li class="lv0"><a class="haslink" href="<?php echo Yii::app()->createUrl('/web/project/group')?>">Danh sách dự án</a>
<!--    <ul>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'cao-oc-van-phong'))?><!--" class="haslink ">Cao ốc văn phòng</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-can-ho'))?><!--" class="haslink ">Khu căn hộ</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-do-thi-moi'))?><!--" class="haslink ">Khu đô thị mới</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-thuong-mai-dich-vu'))?><!--" class="haslink ">Khu thương mại - dịch vụ</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-phuc-hop'))?><!--" class="haslink ">Khu phức hợp</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-dan-cu'))?><!--" class="haslink ">Khu dân cư</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-du-lich-nghi-duong'))?><!--" class="haslink ">Khu du lịch - nghỉ dưỡng</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'khu-cong-nghiep'))?><!--" class="haslink ">Khu công nghiệp</a></li>-->
<!--        <li class="lv1"><a href="--><?php //echo Yii::app()->createUrl('/web/project/list', array('alias'=>'du-an-khac'))?><!--" class="haslink ">Dự án khác</a></li>-->
<!--    </ul>-->
</li>
<!--<li class="lv0"><a href="--><?php //echo Yii::app()->createUrl('/web/saler/list')?><!--" class="haslink ">Nhà mô giới tiêu biểu</a></li>-->
<li class="lv0"><a href="/lien-he-toi-chung-toi" class="haslink ">Liên hệ</a></li>
</ul>
</div>
<div class="menupad"></div>
<div id="right-page-nav"></div>
</div>