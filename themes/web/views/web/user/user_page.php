
<style type="text/css">
  .wrap-restaurant{
      margin-bottom: 10px;
  }
</style>

<div id="main">
    <div class="container" id="user-info">
        <div class="row user-info-fluid">
            <div class="span24 user-info-head">
                <div class="span3 avata">

                    <img src="" alt="" />
                </div>
                <div class="span21 user-action">
                    <h1 class="user-name"><?php  echo $user_info->getName(); ?></h1>

                    <span class="user-des">Ăn uống vui chơi có thưởng</span>
                    <div class="table-bordered user-table-count">
                        <div class="user-col">
                            <p>
                                <span>Sưu tập</span>
                                <span class="user-count">15</span>    
                            </p>                            
                        </div>
                        <div class="user-col">
                            <p>
                                <span>Hình ảnh</span>
                                <span class="user-count"><?php  echo $user_info->getBranchImageCount(); ?></span>    
                            </p>                            
                        </div>
                        <div class="user-col">
                            <p>
                                <span>Bình luận</span>
                                <span class="user-count"><?php echo $user_info->getComment_count() ?></span>    
                            </p>                            
                        </div>
                        <div class="user-col">
                            <p>
                                <span>Sự kiện</span>
                                <span class="user-count"><?php echo $user_info->getEvent_count() ?></span>    
                            </p>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row user-info-fluid">
            <div class="span5" id="user-left">
                <ul class="nav-user-info">
                    <li><a href="#" title="Hoạt động">Hoạt động</a></li>
                    <li><a href="#" title="Thông tin cá nhân">Thông tin cá nhân</a></li>
                </ul>
                <ul class="nav-user-action">
                    <li><a href="#" title="Hoạt động">Coupon đã nhận</a></li>
                    <li><a href="#" title="Thông tin cá nhân">Sự kiện tham gia</a></li>
                </ul>
                <div class="banner">
                    <a href="#">
                        <img src="/themes/web/files/images/product/banner/adv.jpg" />
                    </a>
                </div>
                <div class="banner">
                    <a href="#">
                        <img src="/themes/web/files/images/product/banner/adv.jpg" />
                    </a>
                </div>
                <div class="banner">
                    <a href="#">
                        <img src="/themes/web/files/images/product/banner/adv.jpg" />
                    </a>
                </div>
            </div>
            <div class="span19" id="user-right">
                <div class="span18 user-info-views">
                    <div class="user-info-view clearfix">
                        <div class="user-bg user-bg-comment">						
                        </div>
                        <div class="span17 user-action-title">
                            Viết bình luận tại
                        </div>



                        <?php

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,     
                                'itemView'=>'_view_user_comment',
                                'id'=>'handbook-items',
                                'template' => "{items} {pager}",
                                // 'itemsCssClass' => 'handbook-items',
                                'enablePagination'=>true,
                                'ajaxUpdate'=>true,

                                //'pagerCssClass' => 'pagination',

                                'pagerCssClass' => 'pagination paging pagination-centered',
                                'pager' => Array(
                                    'id'=>'',
                                    //'class'=>'',
                                    'internalPageCssClass'=>'',
                                    'cssFile'=>'', 
                                    'header'=>'',
                                    // 'currentPage '=>3,
                                    'hiddenPageCssClass'=>'hidden',
                                    'selectedPageCssClass'=>'active',
                                    'nextPageLabel'=>'Next',
                                    'maxButtonCount'=>3,
                                    //'offset'=>2
                                ),   
                            ));     

                        ?>





                        <!-- <div>    



                        </div>    -->



                    </div>					
                </div><!--End .user-info-views-->

                <div class="span18 user-info-views">
                    <div class="user-info-view clearfix">
                        <div class="user-bg user-bg-event">						
                        </div>
                        <div class="span17 user-action-title">
                            Tham gia sự kiện
                        </div>


                        <?php foreach($events as $event) : ?>
                            <div class="span15 wrap-restaurant">
                                <a href="#" class="link-event">
                                    <div class="thumb bg-date user-date">								
                                        <span class="year"><?php echo Myext::getYear(strtotime($event->event->created))  ?></span>
                                        <span class="date-month"><?php echo Myext::getDateMonth(strtotime($event->event->created))?></span>
                                        <span class="date"><?php echo Myext::getDay(strtotime($event->created))?></span>																	
                                    </div>
                                </a>
                                <div class="clearfix user-info-views-right">						
                                    <div class="user-restaurant">
                                        <a href="<?php echo $event->event->title ?>" class="name-restaurant link-blue" title="<?php echo $event->event->title ?>"><?php echo $event->event->title?></a>
                                        <span class="time"><i class="ic-14-time"></i>Thời gian: <?php echo $event->event->start ?> <?php if($event->event->start) echo '-' ?> <?php $event->event->end;?></span>								
                                        <span class="address"><i class="ic-14-address"></i></span>
                                    </div>
                                    <ul class="nav-action clearfix">
                                        <li>
                                            <a href="#">12 bình luận </a>
                                        </li>
                                        <li>
                                            <a href="#">21 ảnh</a>
                                        </li>
                                        <li>
                                            <a href="#">4321 lượt quan tâm</a>
                                        </li>
                                    </ul>	
                                </div>	
                            </div>
                            <div class="user-date-time-action"> 
                                <span class="action-time"><?php echo Myext::getHourMinutes(strtotime($event->created))?></span>
                                <span class="action-date"><?php echo Myext::getDateMonthYear(strtotime($event->created));?></span>
                            </div>

                            <?php endforeach ; ?>							
                    </div>					
                </div><!--End .user-info-views-->

                <div class="span18 user-info-views">
                    <div class="user-info-view clearfix">
                        <div class="user-bg user-bg-up-img">						
                        </div>
                      

                        <?php

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider_images,     
                                'itemView'=>'_view_user_images',
                               // 'id'=>'handbook-items',
                                'template' => "{items} {pager}",
                                // 'itemsCssClass' => 'handbook-items',
                                'enablePagination'=>true,
                                'ajaxUpdate'=>true,

                                //'pagerCssClass' => 'pagination',

                                'pagerCssClass' => 'pagination paging pagination-centered',
                                'pager' => Array(
                                    'id'=>'',
                                    //'class'=>'',
                                    'internalPageCssClass'=>'',
                                    'cssFile'=>'', 
                                    'header'=>'',
                                    // 'currentPage '=>3,
                                    'hiddenPageCssClass'=>'hidden',
                                    'selectedPageCssClass'=>'active',
                                    'nextPageLabel'=>'Next',
                                    'maxButtonCount'=>3,
                                    //'offset'=>2
                                ),   
                            ));     

                        ?>
   
                    </div>					
                </div><!--End .user-info-views-->
                
                
                
              <?php
                        // TODO: làm bộ sưu tập
                    ?>  	
               <!-- <div class="span18 user-info-views">
                    <div class="user-info-view user-info-up-img clearfix">
                        <div class="user-bg user-bg-collect">						
                        </div>
                        <div class="span17 user-action-title">
                            Tạo/Cập nhập bộ sưu tập
                        </div>
                        <div class="span15 wrap-restaurant">
                            <div class="thumb">
                                <a href="#" class="" title="Phúc Long Cafe Takeaway - Mạc thị Bưởi">
                                    <img src="/themes/web/files/images/product/thumb/up-img-pizza-23.jpg" alt="húc Long Cafe Takeaway" >
                                </a>	
                            </div>	
                            <div class="clearfix user-info-views-right">						
                                <div class="user-restaurant">
                                    <a href="#" class="name-restaurant link-blue" title="Các món ăn ngon để tiếp khách hàng Nhật Bản">Các món ăn ngon để tiếp khách hàng Nhật Bản</a>															
                                </div>
                                <ul class="nav-action clearfix">
                                    <li>
                                        <a href="#">35 địa điểm</a>
                                    </li>
                                </ul>	
                            </div>	
                        </div>
                        <div class="user-date-time-action">
                            <span class="action-time">8:00</span>
                            <span class="action-date">12/8/2013</span>
                        </div>	
                    </div>					
                </div>--><!--End .user-info-views-->			
            </div><!--End #user-right-->
        </div>
    </div>
</div><!--End #main-->