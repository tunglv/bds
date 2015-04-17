<div class="list2item2 <?php if($index%2 == 0):?>clearboth mar-right<?php endif?>">
    <div class="">
        <div class="tc-img">
            <a href="<?php echo $data->url?>" title="<?php echo $data->name?>">
                <img src="<?php echo $data->getImageUrl('','530')?>" width="365px" height="230px" alt="<?php echo $data->name?>" class="borderccc">
            </a>
        </div>
        <h2 class="largefont"><a href="http://batdongsan.com.vn/khu-do-thi-moi-gia-lam/lam-vien-villas-pj2098"><?php echo $data->name?></a></h2><div>
            <div><span class="colorblue">Địa chỉ: </span><?php echo $data->address?></div>
            <div><span class="colorblue">Số điện thoại: </span><?php echo $data->mobile?></div>
            <div><span class="colorblue">Website: </span><a href="<?php echo $data->website?>" target="_blank" rel="nofollow"><?php echo $data->website?></a>
            </div>
            <div><span class="colorblue">Email: </span><?php echo $data->email?></div>
        </div>
    </div>
</div>