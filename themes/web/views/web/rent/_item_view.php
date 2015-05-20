<div class="vip0 search-productItem">
    <div class="p-title">
        <a href="<?php echo $data->url?>"
           title="<?php echo $data->title ?>" style="text-rendering: optimizelegibility;">
            <?php echo $data->title ?>
        </a>
    </div>
    <div class="p-main">
        <div class="p-main-image-crop">
            <a class="product-avatar" href="<?php echo $data->url?>" title="<?php echo $data->title ?>" onclick="">
                <img class="product-avatar-img" src="<?php echo $data->getImageUrl('', '122') ?>" alt="<?php echo $data->title ?>">
            </a>
        </div>

        <div class="p-content">
            <div class="p-main-text" style="text-rendering: optimizelegibility;">
                <?php echo $data->desc?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="p-bottom-crop fix-p-bottom-crop">
            <div class="floatleft">
                Giá:
                <span class="product-price"><?php echo number_format($data->price, 0, '', '.')?> <?php echo $data->price_type ?></span>&nbsp;
                Diện tích:
                <span class="product-area"><?php echo $data->area ?></span>&nbsp;
                Quận/Huyện:
                                        <span class="product-city-dist">
                                            Quận 9, Hồ Chí Minh
                                        </span>
            </div>
            <div class="floatright mar-right-10"><?php echo date('d/m/Y', $data->created) ?></div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="clear10"></div>
</div>