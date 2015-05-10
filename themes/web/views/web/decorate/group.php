<div id="MainContent"></div>
<div class="parent-main-left">
    <!-- begin breakcrum-->

    <!-- end breakcrum-->
    <div class="div_2col1">
        <div class="clear"></div>
        <div id="LeftMainContent" class="t_left1">
            <div class="t_left1">
                <div class="container-default">
                    <div id="ctl31_BodyContainer">
                        <?php if(count($decorate_1) > 0):?>
                        <div class="tc-duan-tin parent-cate-news">
                            <h2 class="tit_l borderbold">
                                <a class="news-category-root-box-title-link" href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'ngoai-that'))?>" title="Ngoại thất"><span style="white-space:nowrap;">Ngoại thất</span></a>
                            </h2>
                            <?php foreach($decorate_1 as $_key_news_1 => $_val_news_1):?>
                                <?php if($_key_news_1 == 0):?>
                                    <div class="tintuc-row1 tc-tit">
                                        <a class="avatar" title="<?php echo $_val_news_1->url?>">
                                            <img src="<?php echo $_val_news_1->getImageUrl()?>" alt="<?php echo $_val_news_1->title?>">
                                        </a>
                                        <h3>
                                            <a class="font-link-news-parent" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                                <span style="font-weight: bold; color: #008b33"><?php echo $_val_news_1->title?></span>
                                            </a>
                                        </h3><br>
                                        <p><?php echo $_val_news_1->desc?></p>
                                    </div>
                                    <div class="tc-duan-tin-thumnai">
                                <?php elseif($_key_news_1 == 1):?>
                                    <div class="tc-duan-tin-thumnai-row1">
                                        <a class="tc-duan-tin-thumnai-img" title="<?php echo $_val_news_1->title?>" href="<?php echo $_val_news_1->url?>">
                                            <img alt="<?php echo $_val_news_1->title?>" src="<?php echo $_val_news_1->getImageUrl()?>">
                                        </a>
                                        <a class="tc-duan-tin-thumnai-link" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <?php echo $_val_news_1->title?>
                                        </a>
                                    </div>
                                    <div class="tc-tin-3cot-tit1-right-link2">
                                <?php else:?>
                                    <ul>
                                        <li>
                                            <a class="font-link-box-item" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>"><?php echo $_val_news_1->title?></a>
                                        </li>
                                    </ul>
                                <?php endif;?>
                            <?php endforeach;?>
                                <?php if(count($decorate_1) > 0):?></div><?php endif;?>
                                <?php if(count($decorate_1) > 1):?></div><?php endif;?>
                            <div class="clear"></div>
                        </div>
                        <?php endif;?>
<!--                        news_2-->
                        <?php if(count($decorate_2) > 0):?>
                            <div class="tc-duan-tin parent-cate-news">
                                <h2 class="tit_l borderbold">
                                    <a class="news-category-root-box-title-link" href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'noi-that'))?>" title="Chính sách quản lý"><span style="white-space:nowrap;">Nội thất</span></a>
                                </h2>
                                <?php foreach($decorate_2 as $_key_news_1 => $_val_news_1):?>
                                <?php if($_key_news_1 == 0):?>
                                <div class="tintuc-row1 tc-tit">
                                    <a class="avatar" title="<?php echo $_val_news_1->url?>">
                                        <img src="<?php echo $_val_news_1->getImageUrl()?>" alt="<?php echo $_val_news_1->title?>">
                                    </a>
                                    <h3>
                                        <a class="font-link-news-parent" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <span style="font-weight: bold; color: #008b33"><?php echo $_val_news_1->title?></span>
                                        </a>
                                    </h3><br>
                                    <p><?php echo $_val_news_1->desc?></p>
                                </div>
                                <div class="tc-duan-tin-thumnai">
                                    <?php elseif($_key_news_1 == 1):?>
                                    <div class="tc-duan-tin-thumnai-row1">
                                        <a class="tc-duan-tin-thumnai-img" title="<?php echo $_val_news_1->title?>" href="<?php echo $_val_news_1->url?>">
                                            <img alt="<?php echo $_val_news_1->title?>" src="<?php echo $_val_news_1->getImageUrl()?>">
                                        </a>
                                        <a class="tc-duan-tin-thumnai-link" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <?php echo $_val_news_1->title?>
                                        </a>
                                    </div>
                                    <div class="tc-tin-3cot-tit1-right-link2">
                                        <?php else:?>
                                            <ul>
                                                <li>
                                                    <a class="font-link-box-item" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>"><?php echo $_val_news_1->title?></a>
                                                </li>
                                            </ul>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                        <?php if(count($decorate_2) > 0):?></div><?php endif;?>
                                    <?php if(count($decorate_2) > 1):?></div><?php endif;?>
                                <div class="clear"></div>
                            </div>
                        <?php endif;?>
<!--                        news_3-->
                        <?php if(count($decorate_3) > 0):?>
                            <div class="tc-duan-tin parent-cate-news">
                                <h2 class="tit_l borderbold">
                                    <a class="news-category-root-box-title-link" href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'mach-ban'))?>" title="Thông tin quy hoạch"><span style="white-space:nowrap;">Mách bạn</span></a>
                                </h2>
                                <?php foreach($decorate_3 as $_key_news_1 => $_val_news_1):?>
                                <?php if($_key_news_1 == 0):?>
                                <div class="tintuc-row1 tc-tit">
                                    <a class="avatar" title="<?php echo $_val_news_1->url?>">
                                        <img src="<?php echo $_val_news_1->getImageUrl()?>" alt="<?php echo $_val_news_1->title?>">
                                    </a>
                                    <h3>
                                        <a class="font-link-news-parent" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <span style="font-weight: bold; color: #008b33"><?php echo $_val_news_1->title?></span>
                                        </a>
                                    </h3><br>
                                    <p><?php echo $_val_news_1->desc?></p>
                                </div>
                                <div class="tc-duan-tin-thumnai">
                                    <?php elseif($_key_news_1 == 1):?>
                                    <div class="tc-duan-tin-thumnai-row1">
                                        <a class="tc-duan-tin-thumnai-img" title="<?php echo $_val_news_1->title?>" href="<?php echo $_val_news_1->url?>">
                                            <img alt="<?php echo $_val_news_1->title?>" src="<?php echo $_val_news_1->getImageUrl()?>">
                                        </a>
                                        <a class="tc-duan-tin-thumnai-link" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <?php echo $_val_news_1->title?>
                                        </a>
                                    </div>
                                    <div class="tc-tin-3cot-tit1-right-link2">
                                        <?php else:?>
                                            <ul>
                                                <li>
                                                    <a class="font-link-box-item" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>"><?php echo $_val_news_1->title?></a>
                                                </li>
                                            </ul>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                        <?php if(count($decorate_3) > 0):?></div><?php endif;?>
                                    <?php if(count($decorate_3) > 1):?></div><?php endif;?>
                                <div class="clear"></div>
                            </div>
                        <?php endif;?>
<!--                        news 4-->
                        <?php if(count($decorate_4) > 0):?>
                            <div class="tc-duan-tin parent-cate-news">
                                <h2 class="tit_l borderbold">
                                    <a class="news-category-root-box-title-link" href="<?php echo Yii::app()->createUrl('/web/decorate/list', array('alias' => 'tu-van-noi-ngoai-that'))?>" title="Thông tin quy hoạch"><span style="white-space:nowrap;">Tư vấn nội ngoại thất</span></a>
                                </h2>
                                <?php foreach($decorate_4 as $_key_news_1 => $_val_news_1):?>
                            <?php if($_key_news_1 == 0):?>
                                <div class="tintuc-row1 tc-tit">
                                    <a class="avatar" title="<?php echo $_val_news_1->url?>">
                                        <img src="<?php echo $_val_news_1->getImageUrl()?>" alt="<?php echo $_val_news_1->title?>">
                                    </a>
                                    <h3>
                                        <a class="font-link-news-parent" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <span style="font-weight: bold; color: #008b33"><?php echo $_val_news_1->title?></span>
                                        </a>
                                    </h3><br>
                                    <p><?php echo $_val_news_1->desc?></p>
                                </div>
                                <div class="tc-duan-tin-thumnai">
                                    <?php elseif($_key_news_1 == 1):?>
                                    <div class="tc-duan-tin-thumnai-row1">
                                        <a class="tc-duan-tin-thumnai-img" title="<?php echo $_val_news_1->title?>" href="<?php echo $_val_news_1->url?>">
                                            <img alt="<?php echo $_val_news_1->title?>" src="<?php echo $_val_news_1->getImageUrl()?>">
                                        </a>
                                        <a class="tc-duan-tin-thumnai-link" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>">
                                            <?php echo $_val_news_1->title?>
                                        </a>
                                    </div>
                                    <div class="tc-tin-3cot-tit1-right-link2">
                                        <?php else:?>
                                            <ul>
                                                <li>
                                                    <a class="font-link-box-item" href="<?php echo $_val_news_1->url?>" title="<?php echo $_val_news_1->title?>"><?php echo $_val_news_1->title?></a>
                                                </li>
                                            </ul>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                        <?php if(count($decorate_4) > 0):?></div><?php endif;?>
                                    <?php if(count($decorate_4) > 1):?></div><?php endif;?>
                                <div class="clear"></div>
                            </div>
                        <?php endif;?>
                    </div>
            </div>
        </div>
        </div>
        <?php $this->renderPartial('_right_content', array('viewed'=>$viewed, 'top_topic'=>$top_topic, 't_right'=>1)); ?>
    </div>
    <div class="clear"></div>
</div>
<div id="RightMainContent" class="col_right parent-main-right">
    <div class="adPosition" positioncode="BANNER_POSITION_RIGHT_MAIN_CONTENT" stylex="margin-bottom: 10px;">
        <div class="aditem" time="10" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.251391.jpg" altsrc="http://file1.batdongsan.com.vn/file.0.jpg" link="http://simulation.vn" bid="684" tip="" tp="7" w="240" h="90">
            <a href="http://batdongsan.com.vn/click.aspx?bannerid=684" target="_blank" title=""rel="nofollow">
                <img src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/file.251391.jpg" style="width: 100%; height:90px;" class="view-count click-count" bannerid="684">
            </a>
        </div>
        <div class="aditem" time="5" style="margin-bottom: 10px;" src="http://file1.batdongsan.com.vn/file.294221.jpg" alt src="http://file1.batdongsan.com.vn/file.294221.jpg" link="http://batdongsan.com.vn/noi-ngoai-that" bid="663" tip="" tp="7" w="210" h="150">
            <a href="http://batdongsan.com.vn/click.aspx?bannerid=663" target="_blank" title="" rel="nofollow">
                <img src="<?php echo Yii::app()->baseUrl?>/themes/web/files/images/file.294221.jpg" style="width: 100%; height:150px;" class="view-count click-count" bannerid="663">
            </a>
        </div>
    </div>
</div>
<div style="clear:both;"></div>