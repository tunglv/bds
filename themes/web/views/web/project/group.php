<div id="MainContent"></div>
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
                <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                   title="<?php echo $_val->name ?>">
                    <img src="<?php echo $_val->getImageUrl('', '530') ?>" width="530px" height="345px"
                         alt="<?php echo $_val->name ?>">
                </a>
            </div>
            <div class="tc-duan-tit1">
                <h3 class="title-tt"><a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                                        title="<?php echo $_val->name ?>"><?php echo $_val->name ?></a></h3>
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
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('', '170')?>" width="170px" height="100px" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div style="text-align: center; margin-top: 5px;">
                        <div>
                            <strong><a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098" title="<?php echo $_val->name?>"><?php echo $_val->name?></a></strong>
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

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-dan-cu" title="Khu dân cư"><span style="white-space:nowrap;">Khu dân cư</span></a>
    </h2>

    <div class="clear10"></div>
    <div class="">
        <div class="listcompanyitem">
            <?php foreach($project_1 as $_key => $_val):?>
                <div class="parentitem clearboth">
                    <div class="ava">
                        <a href="http://batdongsan.com.vn/khu-dan-cu-quan-8/kdc-truong-dinh-hoi-3-pj2093" title="<?php echo $_val->name?>">
                            <img src="<?php echo $_val->getImageUrl('','90')?>" class="bor-none" alt="<?php echo $_val->name?>">
                        </a>
                    </div>
                    <div class="link">
                        <div class="mar-bot"><strong><a title="<?php echo $_val->name?>" href="http://batdongsan.com.vn/khu-dan-cu-quan-8/kdc-truong-dinh-hoi-3-pj2093"><?php echo $_val->name?></a></strong></div>
                        <div><span class="colorboldblue">Địa chỉ: </span><?php echo $_val->name?></div>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-do-thi-moi" title="Khu đô thị mới">
                        <span style="white-space:nowrap;">
                            Khu đô thị mới</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                       title="Lâm Viên Villas">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/no-photo.jpg"
                             class="bor-none" alt="Lâm Viên Villas">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Lâm Viên Villas"
                                                    href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098">
                                Lâm Viên Villas</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Xã Đặng Xá, Gia Lâm, Hà Nội</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070"
                       title="The Mall City II">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.505796.jpg"
                             class="bor-none" alt="The Mall City II">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="The Mall City II"
                                                    href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070">
                                The Mall City II</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Xã Vĩnh Tân, Tân Uyên, Bình Dương</div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-do-thi-moi-nha-trang-kh/khu-do-thi-vcn-phuoc-hai-pj2067"
                       title="Khu đô thị VCN Phước Hải">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.504696.jpg"
                             class="bor-none" alt="Khu đô thị VCN Phước Hải">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu đô thị VCN Phước Hải"
                                                    href="http://batdongsan.com.vn/khu-do-thi-moi-nha-trang-kh/khu-do-thi-vcn-phuoc-hai-pj2067">
                                Khu đô thị VCN Phước Hải</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Phước Hải, Nha Trang, Khánh Hòa</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-do-thi-moi-can-giuoc-la/khu-do-thi-south-center-pj2061"
                       title="Khu đô thị South Center">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.503383.jpg"
                             class="bor-none" alt="Khu đô thị South Center">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu đô thị South Center"
                                                    href="http://batdongsan.com.vn/khu-do-thi-moi-can-giuoc-la/khu-do-thi-south-center-pj2061">
                                Khu đô thị South Center</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Nguyễn Thị Bẹ, Thị trấn Cần Giuộc, Cần Giuộc,
                        Long An
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-can-ho" title="Khu căn hộ">
                        <span style="white-space:nowrap;">
                            Khu căn hộ</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-can-ho-binh-thanh/saigonres-nguyen-xi-pj2101"
                       title="Saigonres Nguyễn Xí">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.439821.jpg"
                             class="bor-none" alt="Saigonres Nguyễn Xí">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Saigonres Nguyễn Xí"
                                                    href="http://batdongsan.com.vn/khu-can-ho-binh-thanh/saigonres-nguyen-xi-pj2101">
                                Saigonres Nguyễn Xí</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>79-81 Nguyễn Xí, Phường 26, Bình Thạnh, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-can-ho-quan-2/the-krista-pj2100" title="The Krista">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/no-photo.jpg"
                             class="bor-none" alt="The Krista">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="The Krista"
                                                    href="http://batdongsan.com.vn/khu-can-ho-quan-2/the-krista-pj2100">
                                The Krista</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>537 Nguyễn Duy Trinh, Phường Bình Trưng Đông, Quận
                        2, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-can-ho-quan-2/chung-cu-bo-cong-an-pj2099"
                       title="Chung cư Bộ Công An">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/no-photo.jpg"
                             class="bor-none" alt="Chung cư Bộ Công An">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Chung cư Bộ Công An"
                                                    href="http://batdongsan.com.vn/khu-can-ho-quan-2/chung-cu-bo-cong-an-pj2099">
                                Chung cư Bộ Công An</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường 3, Phường Bình An, Quận 2, Hồ Chí Minh</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-can-ho-quan-2/binh-an-pearl-pj2097" title="Bình An Pearl">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/no-photo.jpg"
                             class="bor-none" alt="Bình An Pearl">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Bình An Pearl"
                                                    href="http://batdongsan.com.vn/khu-can-ho-quan-2/binh-an-pearl-pj2097">
                                Bình An Pearl</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>02 Trần Não, Phường Bình An, Quận 2, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/cao-oc-van-phong" title="Cao ốc văn phòng">
                        <span style="white-space:nowrap;">
                            Cao ốc văn phòng</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/cao-oc-van-phong-cau-giay/pv-oil-tower-pj2075"
                       title="PV Oil Tower">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.509963.jpg"
                             class="bor-none" alt="PV Oil Tower">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="PV Oil Tower"
                                                    href="http://batdongsan.com.vn/cao-oc-van-phong-cau-giay/pv-oil-tower-pj2075">
                                PV Oil Tower</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Hoàng Quốc Việt, Cầu Giấy, Hà Nội</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/cao-oc-van-phong-quan-1/smart-view-building-pj1994"
                       title="Smart View Building">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.470507.jpg"
                             class="bor-none" alt="Smart View Building">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Smart View Building"
                                                    href="http://batdongsan.com.vn/cao-oc-van-phong-quan-1/smart-view-building-pj1994">
                                Smart View Building</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>163 Đường Trần Hưng Đạo, Phường Cô Giang, Quận 1,
                        Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/cao-oc-van-phong-quan-1/abacus-tower-pj1992" title="Abacus Tower">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.470483.jpg"
                             class="bor-none" alt="Abacus Tower">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Abacus Tower"
                                                    href="http://batdongsan.com.vn/cao-oc-van-phong-quan-1/abacus-tower-pj1992">
                                Abacus Tower</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>58 Đường Nguyễn Đình Chiểu, Phường Đa Kao, Quận 1,
                        Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/cao-oc-van-phong-quan-3/idc-building-pj1991" title="IDC Building">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.470442.jpg"
                             class="bor-none" alt="IDC Building">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="IDC Building"
                                                    href="http://batdongsan.com.vn/cao-oc-van-phong-quan-3/idc-building-pj1991">
                                IDC Building</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>163 Phố Hai Bà Trưng, Phường 6, Quận 3, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu" title="Khu thương mại dịch vụ">
                        <span style="white-space:nowrap;">
                            Khu thương mại dịch vụ</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-quan-8/city-mall-pj2036" title="City Mall">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.481524.jpg"
                             class="bor-none" alt="City Mall">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="City Mall"
                                                    href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-quan-8/city-mall-pj2036">
                                City Mall</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Nguyễn Văn Linh, Phường 7, Quận 8, Hồ Chí
                        Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-di-an-bd/the-mall-city-pj1857"
                       title="The Mall City">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.439674.jpg"
                             class="bor-none" alt="The Mall City">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="The Mall City"
                                                    href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-di-an-bd/the-mall-city-pj1857">
                                The Mall City</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường 743, Phường Dĩ An, Dĩ An, Bình Dương</div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-binh-tan/an-lac-plaza-pj1853"
                       title="An Lạc Plaza">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.437419.jpg"
                             class="bor-none" alt="An Lạc Plaza">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="An Lạc Plaza"
                                                    href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-binh-tan/an-lac-plaza-pj1853">
                                An Lạc Plaza</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường 7, Phường An Lạc A, Bình Tân, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-tan-uyen-bd/khu-do-thi-thuong-mai-ijc-vsip-pj1762"
                       title="Khu đô thị thương mại IJC@VSIP">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.406723.jpg"
                             class="bor-none" alt="Khu đô thị thương mại IJC@VSIP">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu đô thị thương mại IJC@VSIP"
                                                    href="http://batdongsan.com.vn/khu-thuong-mai-dich-vu-tan-uyen-bd/khu-do-thi-thuong-mai-ijc-vsip-pj1762">
                                Khu đô thị thương mại IJC@VSIP</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Dân Chủ, Xã Vĩnh Tân, Tân Uyên, Bình Dương
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong" title="Khu du lịch- nghỉ dưỡng">
                        <span style="white-space:nowrap;">
                            Khu du lịch- nghỉ dưỡng</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-ngu-hanh-son-ddn/vinpearl-premium-da-nang-pj2084"
                       title="Vinpearl Premium Đà Nẵng">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.511381.jpg"
                             class="bor-none" alt="Vinpearl Premium Đà Nẵng">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Vinpearl Premium Đà Nẵng"
                                                    href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-ngu-hanh-son-ddn/vinpearl-premium-da-nang-pj2084">
                                Vinpearl Premium Đà Nẵng</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Trường Sa, Phường Hòa Hải, Ngũ Hành Sơn, Đà
                        Nẵng
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-premium-golf-land-pj2083"
                       title="Vinpearl Premium Golf Land">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.511322.jpg"
                             class="bor-none" alt="Vinpearl Premium Golf Land">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Vinpearl Premium Golf Land"
                                                    href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-premium-golf-land-pj2083">
                                Vinpearl Premium Golf Land</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Vĩnh Nguyên, Nha Trang, Khánh Hòa</div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-premium-nha-trang-bay-pj2082"
                       title="Vinpearl Premium Nha Trang Bay">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.511203.jpg"
                             class="bor-none" alt="Vinpearl Premium Nha Trang Bay">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Vinpearl Premium Nha Trang Bay"
                                                    href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-premium-nha-trang-bay-pj2082">
                                Vinpearl Premium Nha Trang Bay</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Vĩnh Nguyên, Nha Trang, Khánh Hòa</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-luxury-nha-trang-pj2081"
                       title="Vinpearl Luxury Nha Trang">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.511119.jpg"
                             class="bor-none" alt="Vinpearl Luxury Nha Trang">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Vinpearl Luxury Nha Trang"
                                                    href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-nha-trang-kh/vinpearl-luxury-nha-trang-pj2081">
                                Vinpearl Luxury Nha Trang</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Vĩnh Nguyên, Nha Trang, Khánh Hòa</div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-cong-nghiep" title="Khu công nghiệp">
                        <span style="white-space:nowrap;">
                            Khu công nghiệp</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-cong-nghiep-binh-tan/khu-cong-nghiep-tan-tao-pj2024"
                       title="Khu công nghiệp Tân Tạo">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.479471.jpg"
                             class="bor-none" alt="Khu công nghiệp Tân Tạo">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu công nghiệp Tân Tạo"
                                                    href="http://batdongsan.com.vn/khu-cong-nghiep-binh-tan/khu-cong-nghiep-tan-tao-pj2024">
                                Khu công nghiệp Tân Tạo</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường 2, Phường Tân Tạo A, Bình Tân, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-iii-pj2021"
                       title="Khu công nghiệp Quế Võ III">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.478984.jpg"
                             class="bor-none" alt="Khu công nghiệp Quế Võ III">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu công nghiệp Quế Võ III"
                                                    href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-iii-pj2021">
                                Khu công nghiệp Quế Võ III</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Quốc lộ 18, Quế Võ, Bắc Ninh</div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-ii-pj2020"
                       title="Khu công nghiệp Quế Võ II">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.478883.jpg"
                             class="bor-none" alt="Khu công nghiệp Quế Võ II">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu công nghiệp Quế Võ II"
                                                    href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-ii-pj2020">
                                Khu công nghiệp Quế Võ II</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Quốc lộ 18, Xã Ngọc Xá, Quế Võ, Bắc Ninh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-pj2019"
                       title="Khu công nghiệp Quế Võ">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.478834.jpg"
                             class="bor-none" alt="Khu công nghiệp Quế Võ">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Khu công nghiệp Quế Võ"
                                                    href="http://batdongsan.com.vn/khu-cong-nghiep-que-vo-bn/khu-cong-nghiep-que-vo-pj2019">
                                Khu công nghiệp Quế Võ</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Quốc lộ 18, Xã Phương Liễu, Quế Võ, Bắc Ninh
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/khu-phuc-hop" title="Khu phức hợp">
                        <span style="white-space:nowrap;">
                            Khu phức hợp</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-phuc-hop-thanh-xuan/handico-le-van-luong-pj2038"
                       title="Handico Lê Văn Lương">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.484094.jpg"
                             class="bor-none" alt="Handico Lê Văn Lương">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Handico Lê Văn Lương"
                                                    href="http://batdongsan.com.vn/khu-phuc-hop-thanh-xuan/handico-le-van-luong-pj2038">
                                Handico Lê Văn Lương</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Lê Văn Lương, Phường Nhân Chính, Thanh Xuân,
                        Hà Nội
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-phuc-hop-vung-tau-vt/the-imperial-complex-pj2027"
                       title="The Imperial Complex">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.479842.jpg"
                             class="bor-none" alt="The Imperial Complex">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="The Imperial Complex"
                                                    href="http://batdongsan.com.vn/khu-phuc-hop-vung-tau-vt/the-imperial-complex-pj2027">
                                The Imperial Complex</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>159-163 Thùy Vân, Phường Thắng Tam, Vũng Tàu, Bà
                        Rịa Vũng Tàu
                    </div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-phuc-hop-quan-10/viettel-complex-pj2026"
                       title="Viettel Complex">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.479738.jpg"
                             class="bor-none" alt="Viettel Complex">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Viettel Complex"
                                                    href="http://batdongsan.com.vn/khu-phuc-hop-quan-10/viettel-complex-pj2026">
                                Viettel Complex</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Cách Mạng Tháng Tám, Phường 12, Quận 10, Hồ
                        Chí Minh
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/khu-phuc-hop-quan-1/saigon-centre-pj2025" title="Saigon Centre">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.479580.jpg"
                             class="bor-none" alt="Saigon Centre">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Saigon Centre"
                                                    href="http://batdongsan.com.vn/khu-phuc-hop-quan-1/saigon-centre-pj2025">
                                Saigon Centre</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Lê Lợi, Phường Bến Nghé, Quận 1, Hồ Chí Minh
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

<div class="tc-duan-tin project-parent-cate-list">
    <h2 class="tit_l borderbold">
        <a href="http://batdongsan.com.vn/du-an-khac" title="Dự án khác">
                        <span style="white-space:nowrap;">
                            Dự án khác</span></a>
    </h2>

    <div class="clear10"></div>


    <div class="">

        <div class="listcompanyitem">

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/du-an-khac-hoai-duc/westpoint-pj2095" title="Westpoint">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.519448.jpg"
                             class="bor-none" alt="Westpoint">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Westpoint"
                                                    href="http://batdongsan.com.vn/du-an-khac-hoai-duc/westpoint-pj2095">
                                Westpoint</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Thị trấn Trạm Trôi, xã Đức Giang và xã Đức Thượng,
                        Hoài Đức, Hà Nội
                    </div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-sapphire-pj2090" title="Mega Sapphire">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.517769.jpg"
                             class="bor-none" alt="Mega Sapphire">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Mega Sapphire"
                                                    href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-sapphire-pj2090">
                                Mega Sapphire</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Phú Hữu, Quận 9, Hồ Chí Minh</div>
                </div>
            </div>

            <div class="parentitem clearboth">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/du-an-khac-di-an-bd/him-lam-phu-dong-pj2086"
                       title="Him Lam Phú Đông">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.514790.jpg"
                             class="bor-none" alt="Him Lam Phú Đông">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Him Lam Phú Đông"
                                                    href="http://batdongsan.com.vn/du-an-khac-di-an-bd/him-lam-phu-dong-pj2086">
                                Him Lam Phú Đông</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Phường Bình Thắng, Dĩ An, Bình Dương</div>
                </div>
            </div>

            <div class="parentitem ">
                <div class="ava">
                    <a href="http://batdongsan.com.vn/du-an-khac-quan-7/lotus-city-pj2066" title="Lotus City">
                        <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop90x90.439820.jpg"
                             class="bor-none" alt="Lotus City">
                    </a>
                </div>
                <div class="link">
                    <div class="mar-bot"><strong><a title="Lotus City"
                                                    href="http://batdongsan.com.vn/du-an-khac-quan-7/lotus-city-pj2066">
                                Lotus City</a></strong></div>
                    <div><span class="colorboldblue">Địa chỉ: </span>Đường Hoàng Quốc Việt, Phường Phú Thuận, Quận 7, Hồ
                        Chí Minh
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>

</div>

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
            <div>Tìm kiếm dự án</div>
        </div>
    </div>
    <div id="ctl30_BodyContainer" class="bor_box">

        <div>
            <div class="pad" id="searchcp">
                <div class="t_gr">
                    Tìm kiếm theo lĩnh vực
                </div>
                <div id="divCategory" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 163px;">Khu dân cư</span>
            </span>
                    <input type="hidden" name="ddlCategoriess" id="hdCategory" value="148">

                    <div id="divCatagoryOptions"
                         class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 188px;">

                            <li vl="148" class="advance-options" style="min-width: 156px;">Khu dân cư</li>
                            <li vl="150" class="advance-options" style="min-width: 156px;">Khu đô thị mới</li>
                            <li vl="155" class="advance-options" style="min-width: 156px;">Khu căn hộ</li>
                            <li vl="156" class="advance-options" style="min-width: 156px;">Cao ốc văn phòng</li>
                            <li vl="157" class="advance-options" style="min-width: 156px;">Khu thương mại dịch vụ</li>
                            <li vl="158" class="advance-options" style="min-width: 156px;">Khu du lịch- nghỉ dưỡng</li>
                            <li vl="159" class="advance-options" style="min-width: 156px;">Khu công nghiệp</li>
                            <li vl="160" class="advance-options" style="min-width: 156px;">Khu phức hợp</li>
                            <li vl="161" class="advance-options" style="min-width: 156px;">Dự án khác</li>
                        </ul>
                    </div>
                </div>
                <div class="t_gr">
                    Tỉnh/ Thành phố
                </div>
                <div id="divCity" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 163px;">Chọn tỉnh thành</span>
            </span>
                    <input type="hidden" name="ddlCities" id="hdCity" value="CN">

                    <div id="divCityOptions" class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 188px;">

                            <li vl="CN" class="advance-options current" style="min-width: 156px;">Chọn tỉnh thành</li>
                            <li vl="SG" class="advance-options" style="min-width: 156px;">Hồ Chí Minh</li>
                            <li vl="HN" class="advance-options" style="min-width: 156px;">Hà Nội</li>
                            <li vl="BD" class="advance-options" style="min-width: 156px;">Bình Dương</li>
                            <li vl="DDN" class="advance-options" style="min-width: 156px;">Đà Nẵng</li>
                            <li vl="HP" class="advance-options" style="min-width: 156px;">Hải Phòng</li>
                            <li vl="LA" class="advance-options" style="min-width: 156px;">Long An</li>
                            <li vl="VT" class="advance-options" style="min-width: 156px;">Bà Rịa Vũng Tàu</li>
                            <li vl="AG" class="advance-options" style="min-width: 156px;">An Giang</li>
                            <li vl="BG" class="advance-options" style="min-width: 156px;">Bắc Giang</li>
                            <li vl="BK" class="advance-options" style="min-width: 156px;">Bắc Kạn</li>
                            <li vl="BL" class="advance-options" style="min-width: 156px;">Bạc Liêu</li>
                            <li vl="BN" class="advance-options" style="min-width: 156px;">Bắc Ninh</li>
                            <li vl="BTR" class="advance-options" style="min-width: 156px;">Bến Tre</li>
                            <li vl="BDD" class="advance-options" style="min-width: 156px;">Bình Định</li>
                            <li vl="BP" class="advance-options" style="min-width: 156px;">Bình Phước</li>
                            <li vl="BTH" class="advance-options" style="min-width: 156px;">Bình Thuận</li>
                            <li vl="CM" class="advance-options" style="min-width: 156px;">Cà Mau</li>
                            <li vl="CT" class="advance-options" style="min-width: 156px;">Cần Thơ</li>
                            <li vl="CB" class="advance-options" style="min-width: 156px;">Cao Bằng</li>
                            <li vl="DDL" class="advance-options" style="min-width: 156px;">Đắk Lắk</li>
                            <li vl="DNO" class="advance-options" style="min-width: 156px;">Đắk Nông</li>
                            <li vl="DDB" class="advance-options" style="min-width: 156px;">Điện Biên</li>
                            <li vl="DNA" class="advance-options" style="min-width: 156px;">Đồng Nai</li>
                            <li vl="DDT" class="advance-options" style="min-width: 156px;">Đồng Tháp</li>
                            <li vl="GL" class="advance-options" style="min-width: 156px;">Gia Lai</li>
                            <li vl="HG" class="advance-options" style="min-width: 156px;">Hà Giang</li>
                            <li vl="HNA" class="advance-options" style="min-width: 156px;">Hà Nam</li>
                            <li vl="HT" class="advance-options" style="min-width: 156px;">Hà Tĩnh</li>
                            <li vl="HD" class="advance-options" style="min-width: 156px;">Hải Dương</li>
                            <li vl="HGI" class="advance-options" style="min-width: 156px;">Hậu Giang</li>
                            <li vl="HB" class="advance-options" style="min-width: 156px;">Hòa Bình</li>
                            <li vl="HY" class="advance-options" style="min-width: 156px;">Hưng Yên</li>
                            <li vl="KH" class="advance-options" style="min-width: 156px;">Khánh Hòa</li>
                            <li vl="KG" class="advance-options" style="min-width: 156px;">Kiên Giang</li>
                            <li vl="KT" class="advance-options" style="min-width: 156px;">Kon Tum</li>
                            <li vl="LCH" class="advance-options" style="min-width: 156px;">Lai Châu</li>
                            <li vl="LDD" class="advance-options" style="min-width: 156px;">Lâm Đồng</li>
                            <li vl="LS" class="advance-options" style="min-width: 156px;">Lạng Sơn</li>
                            <li vl="LCA" class="advance-options" style="min-width: 156px;">Lào Cai</li>
                            <li vl="NDD" class="advance-options" style="min-width: 156px;">Nam Định</li>
                            <li vl="NA" class="advance-options" style="min-width: 156px;">Nghệ An</li>
                            <li vl="NB" class="advance-options" style="min-width: 156px;">Ninh Bình</li>
                            <li vl="NT" class="advance-options" style="min-width: 156px;">Ninh Thuận</li>
                            <li vl="PT" class="advance-options" style="min-width: 156px;">Phú Thọ</li>
                            <li vl="PY" class="advance-options" style="min-width: 156px;">Phú Yên</li>
                            <li vl="QB" class="advance-options" style="min-width: 156px;">Quảng Bình</li>
                            <li vl="QNA" class="advance-options" style="min-width: 156px;">Quảng Nam</li>
                            <li vl="QNG" class="advance-options" style="min-width: 156px;">Quảng Ngãi</li>
                            <li vl="QNI" class="advance-options" style="min-width: 156px;">Quảng Ninh</li>
                            <li vl="QT" class="advance-options" style="min-width: 156px;">Quảng Trị</li>
                            <li vl="ST" class="advance-options" style="min-width: 156px;">Sóc Trăng</li>
                            <li vl="SL" class="advance-options" style="min-width: 156px;">Sơn La</li>
                            <li vl="TNI" class="advance-options" style="min-width: 156px;">Tây Ninh</li>
                            <li vl="TB" class="advance-options" style="min-width: 156px;">Thái Bình</li>
                            <li vl="TN" class="advance-options" style="min-width: 156px;">Thái Nguyên</li>
                            <li vl="TH" class="advance-options" style="min-width: 156px;">Thanh Hóa</li>
                            <li vl="TTH" class="advance-options" style="min-width: 156px;">Thừa Thiên Huế</li>
                            <li vl="TG" class="advance-options" style="min-width: 156px;">Tiền Giang</li>
                            <li vl="TV" class="advance-options" style="min-width: 156px;">Trà Vinh</li>
                            <li vl="TQ" class="advance-options" style="min-width: 156px;">Tuyên Quang</li>
                            <li vl="VL" class="advance-options" style="min-width: 156px;">Vĩnh Long</li>
                            <li vl="VP" class="advance-options" style="min-width: 156px;">Vĩnh Phúc</li>
                            <li vl="YB" class="advance-options" style="min-width: 156px;">Yên Bái</li>
                        </ul>
                    </div>
                </div>
                <div class="t_gr">
                    Quận/ Huyện
                </div>
                <div id="divDistrict" class="searchrow advance-select-box" style="margin:0px;">
            <span class="select-text">
                <span class="select-text-content" style="width: 163px;">Chọn quận huyện</span>
            </span>
                    <input type="hidden" name="ddlDistricts" id="hdDistrict" value="0">

                    <div id="divDistrictOptions"
                         class="advance-select-options advance-options advance-select-options-2">
                        <ul class="advance-options" style="min-width: 188px;">

                            <li vl="0" class="advance-options current" style="min-width: 156px;">Chọn quận huyện</li>
                        </ul>
                    </div>
                </div>
                <div class="t_gr" style="text-align: center;">
                    <input type="submit" name="ctl00$ctl30$ctl01$btnSearch" value="Tìm kiếm" id="ctl30_ctl01_btnSearch"
                           class="searchbutton">
                </div>
            </div>
        </div>
        <style type="text/css">
            .searchbutton {
                margin: 0 !important;
                margin-top: 10px !important;
            }
        </style>
        <script type="text/javascript"
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/js/jquery.AdvanceHiddenDropbox(1).js"></script>
        <script type="text/javascript">

            var hdbCategory = $('#divCategory').AdvanceHiddenDropbox({
                id: 'divCatagoryOptions',
                hddValue: 'hdCategory'
            });

            var hdbCity = $('#divCity').AdvanceHiddenDropbox({
                id: 'divCityOptions',
                hddValue: 'hdCity'
            });

            var hdbDistrict = $('#divDistrict').AdvanceHiddenDropbox({
                id: 'divDistrictOptions',
                hddValue: 'hdDistrict'
            });

            $(function () {

                hdbCity.BindChangeEvent({city: hdbCity, distr: hdbDistrict}, function (_scope) {

                    var cityCode = _scope.city.GetValue();
                    if (cityCode.length > 0) {
                        $.get("/HandlerWeb/AddressHandler.ashx?type=district&code=" + cityCode, function (data) {
                            if (data != null) {
                                var _html = '';
                                _html += '<li vl="0" class="advance-options">Chọn quận huyện</li>';

                                $.each(data, function (index, item) {
                                    _html += '<li vl="' + item.id + '" class="advance-options">' + item.name + '</li>';
                                });

                                _scope.distr.UpdateOptions(_html);
                                _scope.distr.SetValue(0);
                            }
                        });
                    }

                });
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
                <div class="mCSB_container" style="position: relative; top: -347px;">

                    <div>
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                           title="Lâm Viên Villas">
                            <img
                                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/20150211150707-fc33(2).jpg"
                                width="156" height="100" alt="Lâm Viên Villas">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"
                           title="Lâm Viên Villas">
                            Lâm Viên Villas
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/du-an/dragon-city.html"
                           title="Dragon Parc" target="_blank" rel="nofollow">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.509866.jpg"
                                 width="156" height="100" alt="Dragon Parc">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/du-an/dragon-city.html"
                           title="Dragon Parc" target="_blank" rel="nofollow">
                            Dragon Parc
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/HTML_ThaoNTT_TAN%20PHUOC/TanPhuoc.html"
                           title="Tân Phước Plaza" target="_blank" rel="nofollow">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.439843.jpg"
                                 width="156" height="100" alt="Tân Phước Plaza">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://file3.batdongsan.com.vn/FileUpload/LandingPage/HTML_ThaoNTT_TAN%20PHUOC/TanPhuoc.html"
                           title="Tân Phước Plaza" target="_blank" rel="nofollow">
                            Tân Phước Plaza
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-can-ho-son-tra-ddn/can-ho-cao-cap-azura-pj1015"
                           title="Căn hộ cao cấp Azura">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.508252.jpg"
                                 width="156" height="100" alt="Căn hộ cao cấp Azura">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-can-ho-son-tra-ddn/can-ho-cao-cap-azura-pj1015"
                           title="Căn hộ cao cấp Azura">
                            Căn hộ cao cấp Azura
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-can-ho-quan-8/chanh-hung-apartment-pj2062"
                           title="Chánh Hưng Apartment">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.504461.jpg"
                                 width="156" height="100" alt="Chánh Hưng Apartment">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-can-ho-quan-8/chanh-hung-apartment-pj2062"
                           title="Chánh Hưng Apartment">
                            Chánh Hưng Apartment
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070"
                           title="The Mall City II">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.505796.jpg"
                                 width="156" height="100" alt="The Mall City II">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-do-thi-moi-tan-uyen-bd/the-mall-city-ii-pj2070"
                           title="The Mall City II">
                            The Mall City II
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-hoi-an-qna/khu-nghi-duong-cam-anhoi-an-pj2045"
                           title="Khu nghỉ dưỡng Cẩm An–Hội An">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.490898.jpg"
                                 width="156" height="100" alt="Khu nghỉ dưỡng Cẩm An–Hội An">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-du-lich-nghi-duong-hoi-an-qna/khu-nghi-duong-cam-anhoi-an-pj2045"
                           title="Khu nghỉ dưỡng Cẩm An–Hội An">
                            Khu nghỉ dưỡng Cẩm An–Hội An
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-chanh/duong-hong-garden-house-pj1695"
                           title="Dương Hồng Garden House">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.490297.jpg"
                                 width="156" height="100" alt="Dương Hồng Garden House">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-chanh/duong-hong-garden-house-pj1695"
                           title="Dương Hồng Garden House">
                            Dương Hồng Garden House
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-thanh/dai-phuc-river-view-pj1511"
                           title="Đại Phúc River View">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.424550.jpg"
                                 width="156" height="100" alt="Đại Phúc River View">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/khu-dan-cu-binh-thanh/dai-phuc-river-view-pj1511"
                           title="Đại Phúc River View">
                            Đại Phúc River View
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                    <div>
                        <a href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-ruby-pj1956" title="Mega Ruby">
                            <img src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/thumb150x150.475326.jpg"
                                 width="156" height="100" alt="Mega Ruby">
                        </a>
                    </div>
                    <div class="prj_vip">
                        <a href="http://batdongsan.com.vn/du-an-khac-quan-9/mega-ruby-pj1956" title="Mega Ruby">
                            Mega Ruby
                        </a>
                    </div>
                    <div class="line_separate">
                    </div>

                </div>
                <div class="mCSB_scrollTools" style="position: absolute; display: block;">
                    <div class="mCSB_draggerContainer">
                        <div class="mCSB_dragger" style="position: absolute; height: 113px; top: 107px;"
                             oncontextmenu="return false;">
                            <div class="mCSB_dragger_bar" style="position: relative; line-height: 113px;"></div>
                        </div>
                        <div class="mCSB_draggerRail"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div id="ctl33_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/Project/ProjectHighlights.ascx-->
<div class="container-common">
    <div id="ctl35_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>TIN TỨC LIÊN QUAN</div>
        </div>
    </div>
    <div id="ctl35_BodyContainer" class="bor_box">

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Tin tức, dự án BĐS nổi bật tuần từ 18/2 đến 23/2"
                   href="http://batdongsan.com.vn/tin-thi-truong/tin-tuc-du-an-bds-noi-bat-tuan-tu-182-den-232-ar45679">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.244078.tin-tuc-du-an-bds-noi-bat-tuan-tu-182-den-232.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/tin-thi-truong/tin-tuc-du-an-bds-noi-bat-tuan-tu-182-den-232-ar45679"
                   title="Tin tức, dự án BĐS nổi bật tuần từ 18/2 đến 23/2">
                    Tin tức, dự án BĐS nổi bật tuần từ 18/2 đến 23/2</a>
            </p>
        </div>
        <div style="clear: both;"></div>

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Doanh nghiệp “nản” với nhà ở xã hội"
                   href="http://batdongsan.com.vn/phan-tich-nhan-dinh/doanh-nghiep-nan-voi-nha-o-xa-hoi-ar46277">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.266769.doanh-nghiep-nan-voi-nha-o-xa-hoi.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/phan-tich-nhan-dinh/doanh-nghiep-nan-voi-nha-o-xa-hoi-ar46277"
                   title="Doanh nghiệp “nản” với nhà ở xã hội">
                    Doanh nghiệp “nản” với nhà ở xã hội</a>
            </p>
        </div>
        <div style="clear: both;"></div>

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Danh Khôi Á Châu mở bán thành công dự án căn hộ Nhất Lan 3"
                   href="http://batdongsan.com.vn/tin-thi-truong/danh-khoi-a-chau-mo-ban-thanh-cong-du-an-can-ho-nhat-lan-3-ar46252">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.266529.danh-khoi-a-chau-mo-ban-thanh-cong-du-an-can-ho-nhat-lan-3.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/tin-thi-truong/danh-khoi-a-chau-mo-ban-thanh-cong-du-an-can-ho-nhat-lan-3-ar46252"
                   title="Danh Khôi Á Châu mở bán thành công dự án căn hộ Nhất Lan 3">
                    Danh Khôi Á Châu mở bán thành công dự án căn hộ Nhất Lan 3</a>
            </p>
        </div>
        <div style="clear: both;"></div>

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Dự án chuyển đổi có giá bán không quá 12 triệu đồng/m2?"
                   href="http://batdongsan.com.vn/chinh-sach-quan-ly/du-an-chuyen-doi-co-gia-ban-khong-qua-12-trieu-dongm2-ar46197">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.265969.du-an-chuyen-doi-co-gia-ban-khong-qua-12-trieu-dongm2.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/chinh-sach-quan-ly/du-an-chuyen-doi-co-gia-ban-khong-qua-12-trieu-dongm2-ar46197"
                   title="Dự án chuyển đổi có giá bán không quá 12 triệu đồng/m2?">
                    Dự án chuyển đổi có giá bán không quá 12 triệu đồng/m2?</a>
            </p>
        </div>
        <div style="clear: both;"></div>

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Người thu nhập thấp khó chứng minh thu nhập để vay tiền mua nhà"
                   href="http://batdongsan.com.vn/tin-thi-truong/nguoi-thu-nhap-thap-kho-chung-minh-thu-nhap-de-vay-tien-mua-nha-ar46167">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.252693.nguoi-thu-nhap-thap-kho-chung-minh-thu-nhap-de-vay-tien-mua-nha.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/tin-thi-truong/nguoi-thu-nhap-thap-kho-chung-minh-thu-nhap-de-vay-tien-mua-nha-ar46167"
                   title="Người thu nhập thấp khó chứng minh thu nhập để vay tiền mua nhà">
                    Người thu nhập thấp khó chứng minh thu nhập để vay tiền mua nhà<img class="news-image-video-icon"
                                                                                        atl=""
                                                                                        src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/bds-video.png"></a>
            </p>
        </div>
        <div style="clear: both;"></div>

        <div style="padding: 5px; width: 60px; height: 60px; float: left;">
            <div class="many-readers-title-icon">
                <a title="Doanh nghiệp chờ giải cứu sẽ khiến thị trường khó khăn hơn"
                   href="http://batdongsan.com.vn/phan-tich-nhan-dinh/doanh-nghiep-cho-giai-cuu-se-khien-thi-truong-kho-khan-hon-ar46087">
                    <img style="width: 60px; height: 60px;"
                         src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/crop60x60.265045.doanh-nghiep-cho-giai-cuu-se-khien-thi-truong-kho-khan-hon.jpg">
                </a>
            </div>
        </div>
        <div class="data-default-CSSClass">
            <p style="padding: 0px; margin: 5px 5px 0 0;">
                <a class="controls-view-date-contents-link"
                   href="http://batdongsan.com.vn/phan-tich-nhan-dinh/doanh-nghiep-cho-giai-cuu-se-khien-thi-truong-kho-khan-hon-ar46087"
                   title="Doanh nghiệp chờ giải cứu sẽ khiến thị trường khó khăn hơn">
                    Doanh nghiệp chờ giải cứu sẽ khiến thị trường khó khăn hơn</a>
            </p>
        </div>
        <div style="clear: both;"></div>

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

                <li><a href="http://batdongsan.com.vn/bat-dong-san-ha-noi" title="Bất động sản Hà Nội">
                        Bất động sản Hà Nội</a></li>

                <li><a href="http://batdongsan.com.vn/phong-thuy-voi-nhung-dieu-kieng-ky"
                       title="Phong thủy và những điều kiêng kỵ">
                        Phong thủy và những điều kiêng kỵ</a></li>

                <li><a href="http://batdongsan.com.vn/bat-dong-san-tp-hcm" title="Bất động sản Tp.HCM">
                        Bất động sản Tp.HCM</a></li>

                <li><a href="http://batdongsan.com.vn/giai-phap-cho-khong-gian-nho-hep"
                       title="Giải pháp cho không gian nhỏ, hẹp">
                        Giải pháp cho không gian nhỏ, hẹp</a></li>

                <li><a href="http://batdongsan.com.vn/cau-thang-gieng-troi" title="Cầu thang - Giếng trời">
                        Cầu thang - Giếng trời</a></li>

                <li><a href="http://batdongsan.com.vn/thi-truong-can-ho-cao-cap" title="Thị trường căn hộ cao cấp">
                        Thị trường căn hộ cao cấp</a></li>

                <li><a href="http://batdongsan.com.vn/chuyen-muc-dich-su-dung-dat" title="Chuyển mục đích sử dụng đất">
                        Chuyển mục đích sử dụng đất</a></li>

                <li><a href="http://batdongsan.com.vn/thi-truong-can-ho-cho-thue" title="Thị trường căn hộ cho thuê">
                        Thị trường căn hộ cho thuê</a></li>

            </ul>

        </div>


    </div>
    <div id="ctl36_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/SubjectLink/View.ascx-->
<div class="container-faq">
    <div id="ctl38_HeaderContainer" class="box-header box-header-bg" style="margin-top: 1px;">
        <div class="name_tit" align="center" style="padding-top: 0px;">
            <h3>Hỏi - đáp</h3>
        </div>
    </div>
    <div id="ctl38_BodyContainer" class="bor_box box-content-bg" style="line-height: 18px;">

        <div class="list">
            <ul>

                <li>
                    <a href="http://batdongsan.com.vn/hd-bai-tri-nha-cua-theo-phong-thuy/xin-hoi-cach-chon-va-bo-tri-den-cho-khu-vuon-them-dep-fq44660"
                       title="Xin hỏi cách chọn và bố trí đèn cho khu vườn thêm đẹp?"><span class="faq-name">
            Xin hỏi cách chọn và bố trí đèn cho khu vườn thêm đẹp?</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-nha-pho/tu-van-xay-nha-khoang-120m2-fq44657"
                       title="Tư vấn xây nhà khoảng 120m2"><span class="faq-name">
            Tư vấn xây nhà khoảng 120m2</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-nha-pho/tu-van-xay-nha-3-tang-dien-tich-7-5m-x-4-3-m-fq44655"
                       title="Tư vấn xây nhà 3 tầng, diện tích 7.5m x 4.3 m"><span class="faq-name">
            Tư vấn xây nhà 3 tầng, diện tích 7.5m x 4.3 m</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-thiet-ke-khac/thiet-ke-sua-lai-nha-cap-4-fq44651"
                       title="Thiết kế sửa lại nhà cấp 4"><span class="faq-name">
            Thiết kế sửa lại nhà cấp 4</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-xay-dung-hoan-cong/quy-hoach-duong-vanh-dai-fq44650"
                       title="Quy hoạch đường vành đai"><span class="faq-name">
            Quy hoạch đường vành đai</span> </a></li>

                <li><a href="http://batdongsan.com.vn/hd-giai-phap-xay-dung/tu-van-xay-nha-4x12m-fq44648"
                       title="Tư vấn xây nhà 4x12m"><span class="faq-name">
            Tư vấn xây nhà 4x12m</span> </a></li>

            </ul>
        </div>


        <div class="faq_box">
            <label>Gửi câu hỏi của bạn tại đây</label>
            <textarea name="txtContent" rows="2" cols="20" id="txtContent"></textarea>

            <div>
                <input type="button" name="btnSend" value="Gửi câu hỏi" id="btnSend" class="buttonSend"
                       onclick="SendFAQ();">
            </div>
        </div>

        <script language="javascript">
            function SendFAQ() {
                var content = $("#txtContent").val();
                if (content != "") {
                    if (localStorage) {
                        localStorage["FAQQuestion"] = content;
                    }

                    window.location.href = "/dang-tin-hoi-dap";
                }

                return false;
            }
        </script>

    </div>
    <div id="ctl38_FooterContainer" class="Footer">
    </div>
</div>
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