<div class="borderpad10 mar-bot">
    <div class="ttmgl">
        <div class="tenmg">
            <h3>
                <a id="ctl28_ctl01_repBrokes_HyperLink1_0" title="<?php echo $data->name?>" href="http://batdongsan.com.vn/ban-can-ho-chung-cu-binh-thanh/cong-ty-co-eb1953"><?php echo $data->name?></a>
            </h3>
        </div>
        <div class="avamg">
            <div>
                <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-binh-thanh/cong-ty-co-eb1953">
                    <img src="<?php echo $data->getImageUrl()?>" alt="<?php echo $data->name?>">
                </a>
            </div>
            <div class="lienhemg">
                <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-binh-thanh/cong-ty-co-ec1953">Liên hệ</a></div>
        </div>
        <div class="ttmg">
            <div class="left">
                Địa chỉ:
            </div>
            <div class="right">
                <strong><?php echo $data->address?></strong></div>
            <div class="clear">
            </div>
            <div class="left">
                Số bàn:
            </div>
            <div class="right">
                <?php echo $data->phone?>
            </div>
            <div class="clear">
            </div>
            <div class="left">
                Di động:
            </div>
            <div class="right">
                <?php echo $data->mobile?>
            </div>
            <div class="clear">
            </div>
            <div class="left">
                Email
            </div>
            <div class="right">
                <?php echo $data->email?>
            </div>
            <div class="clear">
            </div>
            <div class="left">
                Website
            </div>
            <div class="right">
                <a href="<?php echo $data->website?>" target="_blank" rel="nofollow"><?php echo $data->website?></a>

            </div>
        </div>
    </div>
    <div class="kvmg">
        <div class="header">
            Khu vực
            công ty
            môi giới
        </div>
        <div class="arrow">
            &nbsp;</div>
        <div>
            <ul>
                <li><?php echo $data->area?></li>
            </ul>
        </div>
    </div>
    <div class="clear10">
    </div>
</div>