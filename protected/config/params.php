<?php
    // using Yii::app()->params->shop_img['img']
    return array(
        'domain' => 'product.net',
        'userRemember' => 3600*24*365,
        'userPhoneEmailExpire' => 3600*24, // Thời gian có thể xác nhận email và phone
        'passwordKey' => '(76@I)',

        'adminEmail'=>'tunglv.1990@gmail.com',

        'user_img' => array(
            'path' => 'upload/user_image/',
            'img' => array(
                '400'       => array('width' => 400, 'height' => 400, 'quality' => 85),
                '200'       => array('width' => 200, 'height' => 200, 'quality' => 80),
                '65'       => array('width' => 65, 'height' => 65, 'quality' => 80),
                '25'       => array('width' => 25, 'height' => 25, 'quality' => 80),
            ),
        ),
        'news' => array(
            'path' => 'upload/news/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'topic_news' => array(
            'path' => 'upload/topic_news/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'topic_pt' => array(
            'path' => 'upload/topic_pt/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'topic_decorate' => array(
            'path' => 'upload/topic_decorate/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'topic_architecture' => array(
            'path' => 'upload/topic_architecture/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'architecture' => array(
            'path' => 'upload/architecture/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'decorate' => array(
            'path' => 'upload/decorate/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'pt' => array(
            'path' => 'upload/pt/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '260'       => array('width' => 220, 'height' => 260, 'quality' => 90),
            ),
        ),
        'saler' => array(
            'path' => 'upload/saler/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '200'       => array('width' => 200, 'height' => 144, 'quality' => 90),
            ),
        ),
        'project' => array(
            'path' => 'upload/project/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => '100%', 'quality' => 90),
                '530'       => array('width' => 530, 'height' => '100%', 'quality' => 90),
                '170'       => array('width' => 170, 'height' => 100, 'quality' => 90),
                '90'       => array('width' => 90, 'height' => 90, 'quality' => 90),
            ),
        ),
        'sale' => array(
            'path' => 'upload/sale/',
            'tempPath' => 'upload/temp/sale/',
            'img' => array(
                '856'       => array('width' => 747, 'height' => '100%', 'fix'=>'inside', 'quality' => 100),
                '122'       => array('width' => 122, 'height' => '100%', 'fix'=>'inside',  'quality' => 100)
            ),
        ),
        'rent' => array(
            'path' => 'upload/rent/',
            'tempPath' => 'upload/temp/rent/',
            'img' => array(
                '856'       => array('width' => 747, 'height' => '100%', 'fix'=>'inside', 'quality' => 100),
                '122'       => array('width' => 122, 'height' => '100%', 'fix'=>'inside',  'quality' => 100)
            ),
        ),
        'product' => array(
            'path' => 'upload/product/',
            'img' => array(
                '940'       => array('width' => 940, 'height' => 365, 'quality' => 85),
                '420'       => array('width' => 420, 'height' => 308, 'quality' => 80),
                '157'       => array('width' => 157, 'height' => 68, 'quality' => 80)
            ),
        ),
        'mail_receiver' => array(
            //'email' => 'noreply@emailnhanh.com',
            'email' => 'noreply@meonho.net',
            'name' => 'Mẹo nhỏ - Noreply',
        ),
        'mail_server' => array(
//            'host'  => 'smtp.gmail.com',
//            'port'  => 587,
//            'port_ssl'  => 465,
//            'username'  => 'free.send.mail.server@gmail.com',
//            'password'  => 'free.send.mail.server',
            
            'host'  => 'bluehealthbook.netfirms.com',
            'port'  => 587,
            //'port_ssl'  => 465,
            'username'  => 'support@meonho.net ',
            'password'  => 'Tunglv_90',
        ),

        'captcha_view'      => array(
            'imageOptions'=>array(
                'alt' => 'Captcha',
                'class' => 'captcha_img',
            ),
            'clickableImage'   => true,
            'buttonType'       => 'link',  // button or link
            'buttonLabel'      => '<i class="icon-refresh"></i> Lấy mã mới',
            'buttonOptions'    => array(
                'title' => 'Lấy mã mới',
                'class' => 'btn btn-small captcha_refresh',
            ),
        ),

        'fb' => array( // tunglv.1990@gmail.com
            'appId' => '175649432610986',
            'secret' => 'f739e06303679f1125da0d17312dd80b',
            'fileUpload' => true,
            'trustForwarded' => false,
        ),   
        'google' => array( // tunglv.1990@gmail.com
            'clientId' => '1026268755724-u9aud8m1lm9ansun5e1ea64ndp7jajil.apps.googleusercontent.com',
            'clientSecret' => 'ijgmguMLUAmkN_HMxN-EQbH9',
        ),
        
        'user' => array(
            'remember' => 3600*24*365,
            'phoneEmailExpire' => 3600*24, // Thời gian có thể xác nhận email và phone
        )
    );
