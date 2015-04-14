<?php

    class CommonController extends Controller
    {
        public function actionShopImageThumb($path, $w = 160, $h = 120){
            Yii::import('ext.wideimage.lib.WideImage');   
            $img = WideImage::load($path);

            // fix height and crop width
            // fix height
            //$img = $img->resize(NULL, $h, 'outside', 'down');
            // crop width
            //$img = $img->crop('center', 'center', $w, $h);


            $img = $img->resize($w, $h, 'outside', 'down');
            $img = $img->resizeCanvas($w, $h,'center','center', null, 'down');
            $img->output('jpg', 90);
        }
    }
