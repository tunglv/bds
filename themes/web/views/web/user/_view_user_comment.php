                  
                        <div class="span15 wrap-restaurant">
                        
                            <div class="thumb">
                            
                                <a href="<?php echo $data['url']?>" class="" title="<?php echo $data['name'] ?>">
                                    <img src="<?php echo $data['image']?>" alt="<?php echo $data['name'] ?>" >
                                </a>    
                            </div>    
                            <div class="clearfix user-info-views-right">                        
                                <div class="user-restaurant">
                                    <a href="<?php echo $data['url']?>" class="name-restaurant link-blue" title="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></a>                            
                                    <span class="address"><i class="ic-14-address"></i><?php echo $data['address'] ?></span>
                                </div>
                                <ul class="nav-action clearfix">
                                    <li>
                                        <a href="#"><?php echo $data['count_comment'] ?> bình luận</a>
                                    </li>
                                    <li>
                                        <a href="#"><?php echo $data['count_branch_image'] ?>&nbsp; ảnh</a>
                                    </li>
                                    <li>
                                        <a href="#">4321 lượt quan tâm</a>
                                    </li>
                                </ul>    
                            </div>    
                        </div>
                         
                         <?php  
                         $a =   $data['comment'][0];
                        // print_r($a) ; die;
                         $key = 'created';
                         $value = $a[$key];
                          ?>
                        <div class="user-date-time-action">
                            <span class="action-time"><?php echo Myext::getHourMinutes(strtotime($value)) ?></span>
                            <span class="action-date"><?php echo Myext::getDateMonthYear(strtotime($value)) ?></span>
                        </div>
                        
                        
                         
                          <?php  foreach($data['comment'] as  $comment) : ?>
                        <div class="span15 user-content">
                            <p><?php echo  $comment['content']?></p>
                            <!--<img src="/themes/web/files/images/product/pizza.jpg" alt="Trà sữa đào uống cũng ngon nhưng hơi mặn và nhiều nước đá" title="Trà sữa đào uống cũng ngon nhưng hơi mặn và nhiều nước đá" /> -->
                        </div> 
                        
                        <?php endforeach ; ?>
                        
