<?php if($index == 0):?>
    <div class="tt-thumb-img">
        <a href="<?php echo $data->url?>"><img width="216px" height="152px" src="<?php echo $data->getImageUrl()?>" alt="<?php echo $data->title?>" class="bor_img"></a>&nbsp;&nbsp;
    </div>
    <div class="tt-thumb-cnt">
        <h2>
            <a class="link_blue" href="<?php echo$data->url?>" title="<?php echo $data->title?>"><?php echo $data->title?></a>
        </h2>
        <div class="datetime"><?php echo date("d/m/Y H:i", $data->created)?></div>
        <p style="text-rendering:geometricPrecision;"><?php echo $data->desc?></p>
    </div>

    <div class="clear line"></div>
<?php else:?>
    <div class="tintuc-row1 tintuc-list tc-tit">
        <div class="tc-img list-pt-image-title">
            <a href="<?php echo $data->url?>">
                <img class="bor_img" style="width: 132px; height: 100px;" alt="<?php echo $data->title?>" src="<?php echo $data->getImageUrl()?>">
            </a>&nbsp;&nbsp;
        </div>
        <h3>
            <a class="link_blue"
               href="<?php echo $data->url?>"
               title="<?php echo $data->title?>">
                <?php echo $data->title?>
            </a>
        </h3>

        <div class="datetime">
            <?php echo date("d/m/Y H:i", $data->created)?>
        </div>
        <p style="text-rendering:geometricPrecision;">
            <?php echo $data->desc?>
        </p>
    </div>
<?php endif;?>