
<div class="coupon-content-items span17">


    <div class="coupon-date-line"></div>                        
    <div class="coupon-date-line coupon-end-date"></div>
    <div class="coupon-date-line coupon-free"></div>
    <div class="coupon-item-view">
        <div class="bg_coupon">
            <div class="coupon-row clearfix">
                <div class="span12 coupon-name"><strong><?php echo $data -> coupon -> name ?></strong></div>
                <div class="span4 coupon-detail">
                    <a href="<?php echo  $data -> coupon -> url?>" class="btn btn-large btn-more">Chi tiết
                        <i class="ic-btn"></i></a>
                </div>
            </div>
            <div class="coupon-tab">
                <ul>
                    <li><i class="ic-14-number"></i>Số lượng:<?php echo $data -> coupon -> used_number ?> /<?php echo $data -> coupon -> use_number ?></li>
                    <li><i class="ic-14-time"></i>Thời gian: <?php echo Myext::getDateMonthYear(strtotime($data->coupon->start))?>-<?php echo Myext::getDateMonthYear(strtotime($data->coupon->end))?></li>
                    <li><i class="ic-14-code"></i>Mã: <?php echo $data -> coupon -> code ?></li>
                    <li><i class="ic-view"></i>Lượt xem: 0</li>
                </ul>
            </div>
        </div><!--End bg_coupon -->
    </div><!--End content-->
    <div class="clearfix coupon-supplied">
        <span class="restaurant-supplied">Coupon cung cấp bởi <?php echo $data -> coupon ->shop -> name ?></span>
        <span class="date-received"><i class="ic-14-transmission"></i>Nhận cách đây <?php echo MyDateTime::relative($data -> created,false,false)?></span>
    </div>
                    </div>