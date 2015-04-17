<?php  
$array_base = array(

    '/<module:(admin|gii)>' => '/<module>',

//    '/<city_alias:[\w\-]+>' => '/web/page/index',
    
    // user
    '/tai-khoan/dang-nhap-voi-<service:(google|facebook)>' => '/web/user/login',
    '/tai-khoan/dang-nhap' => '/web/user/login',
    '/tai-khoan/quen-mat-khau' => '/web/user/forgot',
    '/tai-khoan/dang-ky' => '/web/user/create',
    '/tai-khoan/them-tai-khoan-<service:(google|facebook)>' => '/web/user/manageEmail',
    '/tai-khoan/them-email' => '/web/user/manageEmail',
    '/tai-khoan/them-sdt' => '/web/user/managePhone',

    //sản phẩn
    '/tin-tuc'=>'/web/news/group',
    '/chuyen-muc-tin-tuc/<alias:[\w\-]+>'=>'/web/news/list',
    '/chu-de/<alias:[\w\-]+>-<id:\d+>' => '/web/news/topic',
    '/cac-chu-de-tin-tuc' => '/web/news/listTopic',
    '/tin-tuc/<alias:[\w\-]+>-<id:\d+>' => '/web/news/detail',

    '/noi-ngoai-that'=>'/web/decorate/group',
    '/chuyen-muc/<alias:[\w\-]+>'=>'/web/decorate/list',
    '/chu-de/<alias:[\w\-]+>-<id:\d+>' => '/web/decorate/topic',
    '/cac-chu-de' => '/web/decorate/listTopic',
    '/noi-ngoai-that/<alias:[\w\-]+>-<id:\d+>' => '/web/decorate/detail',

    '/chuyen-muc/<alias:[\w\-]+>'=>'/web/pt/list',
    '/chu-de/<alias:[\w\-]+>-<id:\d+>' => '/web/pt/topic',
    '/cac-chu-de-phong-thuy' => '/web/pt/listTopic',
    '/phong-thuy/<alias:[\w\-]+>-<id:\d+>' => '/web/pt/detail',

    '/chuyen-muc/<alias:[\w\-]+>'=>'/web/architecture/list',
    '/chu-de/<alias:[\w\-]+>-<id:\d+>' => '/web/architecture/topic',
    '/cac-chu-de-phong-thuy' => '/web/architecture/listTopic',
    '/phong-thuy/<alias:[\w\-]+>-<id:\d+>' => '/web/architecture/detail',

    '/nha-mo-gioi' => '/web/saler/list',
    '/nha-mo-gioi/<alias:[\w\-]+>-<id:\d+>'=>'/web/saler/detail',

    '/du-an' => '/web/project/group',
    '/du-an/<alias:[\w\-]+>' => '/web/project/list',
    '/du-an/<type:[\w\-]+>/<alias:[\w\-]+>-<id:\d+>' => '/web/project/detail',

    '/nha-dat-ban'=>'/web/sale/list',
    '/nha-cho-thue'=>'/web/rent/list',

    // branch
    '/<city_alias:[\w\-]+>/<alias:[\w\-]+>-<id:\d+>' => '/web/branch/view',
    
    // event
    '/<city_alias:[\w\-]+>/<branch_alias:[\w\-]+>-<branch_id:\d+>/<event_alias:[\w\-]+>-<event_id:\d+>' => '/web/branch/viewDetailEvent',
    
    // branch search
    '/<city_alias:[\w\-]+>/tim-kiem/<get:.+>/trang-<page:\d+>' => '/web/branch/search',
    '/<city_alias:[\w\-]+>/tim-kiem/<get:.+>' => '/web/branch/search',
    '/<city_alias:[\w\-]+>/tim-kiem' => '/web/branch/search',

    // crawl foody
    '/foody/<foody_city_alias>/<page_from>/<page_to>'   => '/crawlFoody/run',
    '/fa/<f>/<t>'   => '/crawlFoody/analyze',
    '/fa'   => '/crawlFoody/analyze',

    '<_p1:\w+>'=>'<_p1>',
    '<_p1:\w+>/<_p2:\w+>'=>'<_p1>/<_p2>',
    '<_p1:\w+>/<_p2:\w+>/<_p3:\w+>'=>'<_p1>/<_p2>/<_p3>',
    '<_p1:\w+>/<_p2:\w+>/<_p3:\w+>/<_p4:\w+>'=>'<_p1>/<_p2>/<_p3>/<_p4>',
);
//$array_domain = require(dirname(__FILE__).'/domain.php');
//$array_base = array_merge($array_domain, $array_base);

return $array_base;