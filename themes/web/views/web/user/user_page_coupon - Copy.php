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
					<div class="coupon-content-items span17">
						<div class="coupon-date-line"></div>	
						<!--					
						<div class="coupon-date-line coupon-end-date"></div>
						<div class="coupon-date-line coupon-free"></div>-->
					    <div class="coupon-item-view">
					        <div class="bg_coupon">
					            <div class="coupon-row clearfix">
					                <div class="span12 coupon-name"><strong>Quán tổ chức các buổi biểu diễn nhạc cụ dân tộc định kỳ từ 20h30 tới 22h các ngày thứ 4 và thứ 7 hàng tuầnQuán tổ chức các buổi biểu diễn nhạc cụ dân tộc định kỳ từ 20h30 tới 22h các ngày thứ 4 và thứ 7 hàng tuần</strong></div>
					                <div class="span4 coupon-detail">
					                    <a href="/web/branch/viewDetailCoupon?b_id=3698&amp;al_b=tu-diep-thao&amp;page=coupon&amp;al_c=kem-soi" class="btn btn-large btn-more">Chi tiết
					                    <i class="ic-btn"></i></a>
					                </div>
					            </div>
					            <div class="coupon-tab">
					                <ul>
					                    <li><i class="ic-14-number"></i>Số lượng: /1234566</li>
					                    <li><i class="ic-14-time"></i>Thời gian: 06/06/13-14/06/13</li>
					                    <li><i class="ic-14-code"></i>Mã: 123DS</li>
					                    <li><i class="ic-view"></i>Lượt xem: 0</li>
					                </ul>
					            </div>
					        </div><!--End bg_coupon -->
					    </div><!--End content-->
					    <div class="clearfix coupon-supplied">
					    	<span class="restaurant-supplied">Coupon cung cấp bởi Sumo BBQ - Huỳnh Thúc Kháng</span>
					    	<span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây 2 ngày</span>
					    </div>
					</div><!--End .coupon-content-items-->
					<div class="coupon-content-items span17">
						<div class="coupon-date-line coupon-end-date"></div>
					    <div class="coupon-item-view">
					        <div class="bg_coupon">
					            <div class="coupon-row clearfix">
					                <div class="span12 coupon-name"><strong>Kem sôi</strong></div>
					                <div class="span4 coupon-detail">
					                    <a href="/web/branch/viewDetailCoupon?b_id=3698&amp;al_b=tu-diep-thao&amp;page=coupon&amp;al_c=kem-soi" class="btn btn-large btn-more">Chi tiết
					                     <i class="ic-btn"></i></a>
					                </div>
					            </div>
					            <div class="coupon-tab">
					                <ul>
					                    <li><i class="ic-14-number"></i>Số lượng: /1234566</li>
					                    <li><i class="ic-14-time"></i>Thời gian: 06/06/13-14/06/13</li>
					                    <li><i class="ic-14-code"></i>Mã: 123DS</li>
					                    <li><i class="ic-view"></i>Lượt xem: 0</li>
					                </ul>
					            </div>
					        </div><!--End bg_coupon -->
					    </div><!--End content-->
					    <div class="clearfix coupon-supplied">
					    	<span class="restaurant-supplied">Coupon cung cấp bởi Sumo BBQ - Huỳnh Thúc Kháng</span>
					    	<span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây 2 ngày</span>
					    </div>
					</div><!--End .coupon-content-items-->
					<div class="coupon-content-items span17">
						<div class="coupon-date-line"></div>
					    <div class="coupon-item-view">
					        <div class="bg_coupon">
					            <div class="coupon-row clearfix">
					                <div class="span12 coupon-name"><strong>Kem sôi</strong></div>
					                <div class="span4 coupon-detail">
					                    <a href="/web/branch/viewDetailCoupon?b_id=3698&amp;al_b=tu-diep-thao&amp;page=coupon&amp;al_c=kem-soi" class="btn btn-large btn-more">Chi tiết
					                     <i class="ic-btn"></i></a>
					                </div>
					            </div>
					            <div class="coupon-tab">
					                <ul>
					                    <li><i class="ic-14-number"></i>Số lượng: /1234566</li>
					                    <li><i class="ic-14-time"></i>Thời gian: 06/06/13-14/06/13</li>
					                    <li><i class="ic-14-code"></i>Mã: 123DS</li>
					                    <li><i class="ic-view"></i>Lượt xem: 0</li>
					                </ul>
					            </div>
					        </div><!--End bg_coupon -->
					    </div><!--End content-->
					    <div class="clearfix coupon-supplied">
					    	<span class="restaurant-supplied">Coupon cung cấp bởi Sumo BBQ - Huỳnh Thúc Kháng</span>
					    	<span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây 2 ngày</span>
					    </div>
					</div><!--End .coupon-content-items-->
					<div class="coupon-content-items span17">
						<div class="coupon-date-line coupon-end-date"></div>
					    <div class="coupon-item-view">
					        <div class="bg_coupon">
					            <div class="coupon-row clearfix">
					                <div class="span12 coupon-name"><strong>Kem sôi</strong></div>
					                <div class="span4 coupon-detail">
					                    <a href="/web/branch/viewDetailCoupon?b_id=3698&amp;al_b=tu-diep-thao&amp;page=coupon&amp;al_c=kem-soi" class="btn btn-large btn-more">Chi tiết
					                     <i class="ic-btn"></i></a>
					                </div>
					            </div>
					            <div class="coupon-tab">
					                <ul>
					                    <li><i class="ic-14-number"></i>Số lượng: /1234566</li>
					                    <li><i class="ic-14-time"></i>Thời gian: 06/06/13-14/06/13</li>
					                    <li><i class="ic-14-code"></i>Mã: 123DS</li>
					                    <li><i class="ic-view"></i>Lượt xem: 0</li>
					                </ul>
					            </div>
					        </div><!--End bg_coupon -->
					    </div><!--End content-->
					    <div class="clearfix coupon-supplied">
					    	<span class="restaurant-supplied">Coupon cung cấp bởi Sumo BBQ - Huỳnh Thúc Kháng</span>
					    	<span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây 2 ngày</span>
					    </div>
					</div><!--End .coupon-content-items-->
					<div class="coupon-content-items span17">
						<div class="coupon-date-line"></div>						
						<div class="coupon-date-line coupon-end-date"></div>
						<div class="coupon-date-line coupon-free"></div>
					    <div class="coupon-item-view">
					        <div class="bg_coupon">
					            <div class="coupon-row clearfix">
					                <div class="span12 coupon-name"><strong>Kem sôi</strong></div>
					                <div class="span4 coupon-detail">
					                    <a href="/web/branch/viewDetailCoupon?b_id=3698&amp;al_b=tu-diep-thao&amp;page=coupon&amp;al_c=kem-soi" class="btn btn-large btn-more">Chi tiết
					                     <i class="ic-btn"></i></a>
					                </div>
					            </div>
					            <div class="coupon-tab">
					                <ul>
					                    <li><i class="ic-14-number"></i>Số lượng: /1234566</li>
					                    <li><i class="ic-14-time"></i>Thời gian: 06/06/13-14/06/13</li>
					                    <li><i class="ic-14-code"></i>Mã: 123DS</li>
					                    <li><i class="ic-view"></i>Lượt xem: 0</li>
					                </ul>
					            </div>
					        </div><!--End bg_coupon -->
					    </div><!--End content-->
					    <div class="clearfix coupon-supplied">
					    	<span class="restaurant-supplied">Coupon cung cấp bởi Sumo BBQ - Huỳnh Thúc Kháng</span>
					    	<span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây 2 ngày</span>
					    </div>
					</div><!--End .coupon-content-items-->
										
					
				</div>									
			</div><!--End #user-right-->
		</div>
 	</div>
</div><!--End #main-->