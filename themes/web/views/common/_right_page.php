<div class="one-third column">
    <div class="right-box">
        <?php if(count($new_knowledge) > 0):?>
            <h2 class="title">Bạn có biết ?<span class="line"></span></h2>

            <div role="tablist" class="ui-accordion ui-widget ui-helper-reset ui-accordion-icons" id="accordion">
                <?php foreach($new_knowledge as $knowledge):?>
                    <h3 role="tab" class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all"><a href=""><?php echo $knowledge['title']?></a></h3>
                    <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom"><p><?php echo $knowledge['desc']?></p></div>
                <?php endforeach;?>
            </div><!-- End accordion -->
        <?php endif;?>
    </div><!-- End our services -->

    <div class="right-box">
        <?php if(count($new_today)>0):?>
            <h2 class="title">Làm gì hôm nay<span class="line"></span></h2>
            <ul class="whyus">
                <li>
                    <a href="<?php echo Yii::app()->baseUrl.'/web/othertip/today?id='.$new_today[0]['id']?>"><img width="265" src="<?php echo $new_today[0]['image']['410']?>" alt="<?php echo $new_today[0]['title']?>" class="border"></a>
                    <p><?php echo $new_today[0]['desc']?></p>
                    <span class="more2"><a href="<?php echo Yii::app()->baseUrl.'/web/othertip/today?id='.$new_today[0]['id']?>">xem thêm</a></span>
                </li>
            </ul>
        <?php endif;?>
    </div><!-- End choose us -->

    <div class="right-box">
        <?php if(count($market_price) > 0):?>
            <div role="application" style="overflow: hidden; width: 100.2%;" class="slidewrap2">
                <ul class="slidecontrols" role="navigation">
                    <li role="presentation"><a href="#sliderName2" class="carousel2-next">Next</a></li>
                    <li role="presentation"><a aria-disabled="true" href="#sliderName2" class="carousel2-prev carousel2-disabled">Prev</a></li>
                </ul>

                <h2 class="title">Giá cả thị trường<span class="line"></span></h2>

                <div class="recent-blog">
                    <div class="recent-blog2">

                        <ul class="slider" id="sliderName2">
                            <?php if(count($market_price['today']) > 0):?>
                                <li id="carousel-2-0-slide0" role="tabpanel document" class="slide">
                                    <div class=" blog-item vertical">
                                        <div class="date3"><span class="day"><?php echo date('d',time());?></span><span class="month">T.<?php echo date('m',time());?></span></div>
                                        <div class="detail-price" id="detail-price">
                                            <?php $tmp = '';$check = 0;?>
                                            <?php foreach($market_price['today'] as $key => $val):?>
                                                <?php if($key == 0){$tmp = $val['type'];}?>
                                                <?php if($val['type'] == $tmp):?>
                                                    <?php if($check == 0):?>
                                                        <h3><a href=""><?php echo $tmp;?></a></h3>
                                                        <ul>
                                                    <?php endif;?>
                                                    <li><?php echo $val['name']?><span class="price"><?php echo $val['price']?> vnđ/kg</span></li>
                                                <?php else:?>
                                                    <?php $tmp = $val['type'];$check = 0;?>
                                                    <?php if($check ==0):?>
                                                        </ul>
                                                        <h3><a href=""><?php echo $tmp;?></a></h3>
                                                        <ul>
                                                    <?php endif;?>
                                                    <li><?php echo $val['name']?><span class="price"><?php echo $val['price']?> vnđ/kg</span></li>
                                                <?php endif;?>
                                                <?php $check++;?>
                                            <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- End slide -->
                            <?php endif;?>
                            <?php if(count($market_price['yesterday']) >0) :?>
                                <li id="carousel-2-0-slide1" role="tabpanel document" class="slide">
                                    <div class=" blog-item vertical">
                                        <div class="date3"><span class="day"><?php echo date('d',strtotime(' -1 day'));?></span><span class="month">T.<?php echo date('m',strtotime(' -1 day'));?></span></div>
                                        <div class="detail-price">
                                            <?php $tmp = '';$check = 0;?>
                                            <?php foreach($market_price['yesterday'] as $key => $val):?>
                                                <?php if($key == 0){$tmp = $val['type'];}?>
                                                <?php if($val['type'] == $tmp):?>
                                                    <?php if($check ==0):?>
                                                        <h3><a href=""><?php echo $tmp;?></a></h3>
                                                        <ul>
                                                    <?php endif;?>
                                                            <li><?php echo $val['name']?><span class="price"><?php echo $val['price']?> vnđ/kg</span></li>
                                                <?php else:?>
                                                    <?php $tmp = $val['type'];$check = 0;?>
                                                    <?php if($check ==0):?>
                                                        </ul>
                                                        <h3><a href=""><?php echo $tmp;?></a></h3>
                                                        <ul>
                                                    <?php endif;?>
                                                        <li><?php echo $val['name']?><span class="price"><?php echo $val['price']?> vnđ/kg</span></li>
                                                <?php endif;?>
                                                <?php $check++;?>
                                            <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </li><!-- End slide -->
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div><!-- End slidewrap -->
        <?php endif;?>
    </div><!-- End recent blog -->
</div>