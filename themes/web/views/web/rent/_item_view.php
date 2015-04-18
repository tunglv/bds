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
            <div class="p-main-text" style="text-rendering: optimizelegibility;">Với vị trí đắc địa, dự án ĐÔNG TĂNG
                LONG Q9 được rất nhiều người mua để ở cũng như đầu tư.. Khách hàng hoàn toàn yên tâm khi mua dự án ĐÔNG
                TĂNG LONG vì chủ đầu tư uy tín cũng như tài chính vững mạnh trên thị trường. Thương hiệu cty được khách
                hàng ...
            </div>
        </div>
        <div class="clear"></div>
        <div class="p-bottom-crop fix-p-bottom-crop">
            <div class="floatleft">
                Giá:
                <span class="product-price"><?php echo $data->price ?> <?php echo $data->price_type ?></span>&nbsp;
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