<div class="header-top">
    <div class="header-top-left">

        <div style="padding-top: 5px;">


            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/logo-bds.png" alt="Nhà đất"
                 style="padding-top: 2px;">


        </div>
    </div>
    <div class="header-top-right">
        <div id="TopBanner">
            <img src="/themes/web/files/images/park-hill.jpg" alt="park hill, chung cu cao cap" style="width: 100%">
            <!--//Modules/Banner/Preview/Top/BannerPreviewTop.ascx-->
        </div>
    </div>
</div>

<div class="header-menu" style="margin-bottom: 20px;">
<div id="left-page-nav"></div>
<div class="menupad"></div>
<div id="page-navigative-menu">
<div class="ihome">
    <h2><a href="http://<?php echo $this->domain?>"><img style="height: 27px;padding: 1px 10px;" src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/homea.gif"></a></h2>
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
<li class="lv0" style="border: none; padding-top: 5px;padding-right: 5px;">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=614276168689514";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="fb-share-button" data-href="<?php echo $page?>" data-layout="button"></div>
</li>
<li class="lv0" style="border: none;padding-top: 5px;padding-left: 5px;">
    <!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
    <script src="https://apis.google.com/js/platform.js" async defer>
        {lang: 'vi'}
    </script>
    <!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
    <div class="g-plus" data-action="share" data-annotation="none" data-href="http://chungcuvn.com.vn/"></div>
</li>
</ul>
</div>
<div class="menupad"></div>
<div id="right-page-nav"></div>
</div>