<div id="RightMainContent" class="<?php echo isset($t_right) ? 't_right' : 'body-right'?>">
<div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
    <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.251391.jpg"
         altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://simulation.vn" bid="684" tip="" tp="7" w="240"
         h="90"><a href="http://batdongsan.com.vn/click.aspx?bannerid=684" target="_blank" title="" rel="nofollow"><img
                src="<?php echo Yii::app()->baseUrl ?>/themes/web/files/images/file.251391.jpg"
                style="width: 100%; height:90px;" class="view-count click-count" bannerid="684"></a></div>
</div>

<div style="clear:both;"></div>
<!--//Modules/Banner/Preview/MainRight/BannerPreviewMainRight.ascx-->
<?php if(count($viewed)):?>
    <div class="container-common">
        <div id="ctl32_HeaderContainer" class="box-header">
            <div class="name_tit" align="center">
                <div>Tin nhiều người đọc</div>
            </div>
        </div>
        <div id="ctl32_BodyContainer" class="bor_box">
            <?php foreach($viewed as $_key_view => $_val_viewed):?>
                <div style="padding: 5px; width: 60px; height: 60px; float: left;">
                    <div class="many-readers-title-icon">
                        <a title="<?php echo $_val_viewed->title?>"
                           href="<?php echo Yii::app()->createUrl('/web/decorate/detail', array('alias'=>$_val_viewed->alias,'id' => $_val_viewed->id))?>">
                            <img style="width: 60px; height: 60px;"
                                 src="<?php echo $_val_viewed->getImageUrl()?>">
                        </a>
                    </div>
                </div>
                <div class="data-default-CSSClass">
                    <p style="padding: 0px; margin: 5px 5px 0 0;">
                        <a class="controls-view-date-contents-link"
                           href="<?php echo Yii::app()->createUrl('/web/decorate/detail', array('alias'=>$_val_viewed->alias,'id' => $_val_viewed->id))?>" title="<?php echo $_val_viewed->title?>">
                            <?php echo $_val_viewed->title?></a>
                    </p>
                </div>
                <div style="clear: both;"></div>
            <?php endforeach;?>
            <div style="clear: both;"></div>
        </div>
        <div id="ctl32_FooterContainer">
        </div>
    </div>
    <div style="clear: both; margin-bottom: 10px;">
    </div>
<?php endif?>
<!--//Modules/News/ViewerNews/TopMostRead/ManyReaders.ascx-->
<div class="container-common">
    <div id="ctl33_HeaderContainer" class="box-header">
        <div class="name_tit" align="center">
            <div>Chủ đề được quan tâm</div>
        </div>
    </div>
    <div id="ctl33_BodyContainer" class="bor_box">

        <div class="list">
            <ul>
                <?php foreach($top_topic as $_key_top_topic => $_val_top_topic):?>
                    <li><a href="<?php echo Yii::app()->createUrl('/web/decorate/topic', array('alias'=>$_val_top_topic->alias,'id' => $_val_top_topic->id))?>" title="<?php echo $_val_top_topic->title?>">
                            <?php echo $_val_top_topic->title?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div style="padding-left: 20px; padding-top: 5px; border-top: 1px solid #ccc; margin-top: 10px;">
            <a href="<?php echo Yii::app()->createUrl('/web/decorate/listTopic')?>" class="linktoall">Xem tất
                cả</a>
        </div>
    </div>
    <div id="ctl33_FooterContainer">
    </div>
</div>
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/SubjectLink/View.ascx-->
<div style="clear: both; margin-bottom: 10px;">
</div>
<!--//Modules/FaqViewList/FAQOptionList.ascx--></div>