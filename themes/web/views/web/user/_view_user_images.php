   <div class="span17 user-action-title">
                            Thêm <?php echo $data['count_images'] ?> ảnh tại
                        </div>
<div class="span15 wrap-restaurant">
                            <div class="thumb">
                                <a href="<?php echo $data['url'] ?>" class="" title="<?php echo $data['name'] ?>">
                                    <img src="<?php echo $data['image'] ?>" alt="húc Long Cafe Takeaway" >
                                </a>    
                            </div>    
                            <div class="clearfix user-info-views-right">                        
                                <div class="user-restaurant">
                                    <a href="<?php echo $data['url'] ?>" class="name-restaurant link-blue" title="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></a>                            
                                    <span class="address"><i class="ic-14-address"></i><?php echo $data['address'] ?></span>
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
                        
                            <span class="action-time"><?php echo Myext::getHourMinutes(strtotime($data['images'][0]['created'])) ?></span>
                            <span class="action-date"><?php echo Myext::getDateMonthYear(strtotime($data['images'][0]['created'])) ?></span>
                        </div>
                        <div class="span15 user-content">
                            <ul class="thumbnails img-upload">
                          <?php foreach($data['images'] as $images ) : ?>  
                                <li><img src="/themes/web/files/images/product/thumb/up-img-pizza-234.jpg" alt="<?php echo $images['image'] ?>" /></li>
                               <!-- <li><img src="/themes/web/files/images/product/thumb/up-img-pizza.jpg" alt="" /></li>
                                <li><img src="/themes/web/files/images/product/thumb/up-img-pizza-23.jpg" alt="" /></li>
                                <li><img src="/themes/web/files/images/product/thumb/up-img-pizza-234.jpg" alt="" /></li>
                                <li><img src="/themes/web/files/images/product/thumb/up-img-pizza.jpg" alt="" /></li> 
                                <li class="end-more"><a class="view-more">+6</a></li> -->
                           <?php endforeach ; ?>     
                            </ul>
                        </div>