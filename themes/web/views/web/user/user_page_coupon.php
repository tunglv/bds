<div id="main">
    <div class="container" id="user-info">
    
		<div class="row user-info-fluid">
            <div class="span24 user-info-head">
                <div class="span3 avata">

                    <img src="<?php  echo $user->getAvatarImage('200'); ?>" alt="" />
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
			<div class="span19 user-info-tables" id="user-right">									
				<div class="user-info-views clearfix">
					<div class="user-action-title user-coupon-title">Danh sách Coupon đã nhận</div>
					
                     <?php

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataprovider,     
                                'itemView'=>'_view_user_page_coupon',
                                //'id'=>'handbook-items',
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
			</div><!--End #user-right-->
		</div>
 	</div>
</div><!--End #main-->