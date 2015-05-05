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
        background-color: #055699;
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
<div class="clear"></div>

<div class="body-left">
    <?php if(isset($topic)):?>
        <div id="ctl27_ctl01_panelSubject" class="subject-title-head-list">

            <h1 class="font-title-list-pt">
                <?php echo $topic->title?>
            </h1>
            <p>
                <?php echo $topic->desc?>
            </p>
            <p class="title">
                Các bài viết thuộc chủ đề <?php echo $topic->title?>
            </p>

        </div>
    <?php endif;?>
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
<div class="body-left">
<div id="ctl27_ctl01_panelCate" class="detailsView-title-style"><div class="font-title-list-pt"></div></div>

<!--    <div class="tt-thumb-img">-->
<!--        <a href="http://batdongsan.com.vn/tin-thi-truong/luong-nguoi-tim-mua-thue-bds-tang-vot-ngay-nhung-ngay-dau-nam-moi-am-lich-2015-ar67131"><img width="216px" height="152px" src="--><?php //echo Yii::app()->baseUrl ?><!--/themes/web/files/images/20150303162239-1448.jpg" alt="Lượng người tìm mua, thuê BĐS tăng vọt ngay những ngày đầu năm mới âm lịch 2015" class="bor_img"></a>&nbsp;&nbsp;-->
<!--    </div>-->
<!--    <div class="tt-thumb-cnt">-->
<!--        <h2>-->
<!--            <a class="link_blue" href="http://batdongsan.com.vn/tin-thi-truong/luong-nguoi-tim-mua-thue-bds-tang-vot-ngay-nhung-ngay-dau-nam-moi-am-lich-2015-ar67131" title="Lượng người tìm mua, thuê BĐS tăng vọt ngay những ngày đầu năm mới âm lịch 2015">Lượng người tìm mua, thuê BĐS tăng vọt ngay những ngày đầu năm mới âm lịch 2015</a>-->
<!--        </h2>-->
<!--        <div class="datetime">16:23 03/03/2015</div>-->
<!--        <p style="text-rendering:geometricPrecision;">-->
<!--            Theo số liệu cập nhật mới nhất từ Batdongsan.com.vn, ngay từ những ngày đầu năm mới, từ 22/2-2/3/2015 (tức ngày-->
<!--            4-12/1 âm lịch), khi các doanh nghiệp BĐS mới bắt đầu hoạt động trở lại, thậm chí một số đơn vị vẫn chưa khai-->
<!--            xuân, chưa có dự án mở bán mới nhưng lượng tìm kiếm BĐS bán và BĐS cho thuê trên website Batdongsan.com.vn đã-->
<!--            tăng vọt, lập kỷ lục mới với bước nhảy hơn 20% so với thời điểm đạt đỉnh của năm 2014. </p>-->
<!--    </div>-->
<!---->
<!--    <div class="clear line"></div>-->

<!--pt-->
<!--    <div class="tintuc-row1 tintuc-list tc-tit">-->
<!--        <div class="tc-img list-pt-image-title">-->
<!--            <a href="http://batdongsan.com.vn/tin-thi-truong/dong-thap-khoi-cong-du-an-nha-o-xa-hoi-gia-tu-300-trieu-dong-can-ar67129">-->
<!--                <img class="bor_img" style="width: 132px; height: 100px;" alt="Đồng Tháp: Khởi công dự án nhà ở xã hội giá từ 300 triệu đồng/căn" src="--><?php //echo Yii::app()->baseUrl ?><!--/themes/web/files/images/crop132x100.20150303032150563.dong-thap-khoi-cong-du-an-nha-o-xa-hoi-gia-tu-300-trieu-dong-can.jpg">-->
<!--            </a>&nbsp;&nbsp;-->
<!--        </div>-->
<!--        <h3>-->
<!--            <a class="link_blue"-->
<!--               href="http://batdongsan.com.vn/tin-thi-truong/dong-thap-khoi-cong-du-an-nha-o-xa-hoi-gia-tu-300-trieu-dong-can-ar67129"-->
<!--               title="Đồng Tháp: Khởi công dự án nhà ở xã hội giá từ 300 triệu đồng/căn">-->
<!--                Đồng Tháp: Khởi công dự án nhà ở xã hội giá từ 300 triệu đồng/căn-->
<!--            </a>-->
<!--        </h3>-->
<!---->
<!--        <div class="datetime">-->
<!--            15:19 03/03/2015-->
<!--        </div>-->
<!--        <p style="text-rendering:geometricPrecision;">-->
<!--            Dự án nhà ở xã hội với quy mô 500 căn hộ vừa được chủ đầu tư là Công ty CP Đầu tư Sen Vàng tiến hành khởi công-->
<!--            xây dựng tại thành phố Cao Lãnh, tỉnh Đồng Tháp.-->
<!--        </p>-->
<!--    </div>-->
<!--end pt-->
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
<!--    <div class="clear">-->
<!--    </div>-->
<!--    //paging-->
<!--    <div id="ctl27_ctl01_panelPager">-->
<!---->
<!--        <div class="background-pager-controls">-->
<!--            <div class="background-pager-right-controls">-->
<!--                <a href="./Tình hình bất động sản Việt Nam hiện nay   Tin tức thị trường địa ốc_files/Tình hình bất động sản Việt Nam hiện nay   Tin tức thị trường địa ốc.html">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                width: auto;-->
<!--                color: #000000;-->
<!--                text-decoration: none;-->
<!--                height: 23px;-->
<!--                line-height: 23px;-->
<!--                float: left;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px;-->
<!--                border: 1px solid #ccc;" class="style-pager-row-selected" align="center">1-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p2">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                width: auto;-->
<!--                color: #000000;-->
<!--                text-decoration: none;-->
<!--                height: 23px;-->
<!--                line-height: 23px;-->
<!--                float: left;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px;-->
<!--                border: 1px solid #ccc;" align="center">2-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p3">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                width: auto;-->
<!--                color: #000000;-->
<!--                text-decoration: none;-->
<!--                height: 23px;-->
<!--                line-height: 23px;-->
<!--                float: left;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px;-->
<!--                border: 1px solid #ccc;" align="center">3-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p4">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                width: auto;-->
<!--                color: #000000;-->
<!--                text-decoration: none;-->
<!--                height: 23px;-->
<!--                line-height: 23px;-->
<!--                float: left;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px;-->
<!--                border: 1px solid #ccc;" align="center">4-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p5">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                width: auto;-->
<!--                color: #000000;-->
<!--                text-decoration: none;-->
<!--                height: 23px;-->
<!--                line-height: 23px;-->
<!--                float: left;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px;-->
<!--                border: 1px solid #ccc;" align="center">5-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p2">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                margin-right: 2px;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px ;-->
<!--                width: auto;-->
<!--                height: 23px;-->
<!--                color: #000000  ;-->
<!--                text-decoration: none ;-->
<!--                line-height: 23px ;-->
<!--                float: left;-->
<!--                border: 1px solid #ccc;" align="center">...-->
<!--                    </div>-->
<!--                </a><a href="http://batdongsan.com.vn/tin-thi-truong/p1295">-->
<!--                    <div style="-->
<!--                margin-left: 2px;-->
<!--                margin-right: 2px;-->
<!--                padding-left: 6px;-->
<!--                padding-right: 6px ;-->
<!--                width: auto;-->
<!--                height: 23px;-->
<!--                color: #000000  ;-->
<!--                text-decoration: none ;-->
<!--                line-height: 23px ;-->
<!--                float: left;-->
<!--                border: 1px solid #ccc;" align="center">&gt;</div>-->
<!--                </a><span id="ctl27_ctl01_ArticlesPager"></span>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--    end paging-->
</div>
</div>

</div>
<!--//Modules/Pt/ViewerPt/PtList/ListPt.ascx--></div>
</div>

<!--Right Main-->
<?php $this->renderPartial('_right_content', array('viewed'=>$viewed, 'top_topic'=>$top_topic)); ?>

<!--END RIGHT Main-->
<div class="banner-bottom">
    <div id="SubBottomLeftMainContent" style="float: left; width: 560px"></div>
    <div id="SubBottomRightMainContent" style="float: left; width: 430px;
                margin-left: 5px"></div>
</div>