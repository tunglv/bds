<?php
$domain = $_SERVER['SERVER_NAME'];
$array_domain = array();

$db = require(dirname(__FILE__).'/db.php');
preg_match('{^mysql:host=([\.\w]+);dbname=([\w]+)$}', $db['connectionString'], $m); //mysql:host=123.30.186.71;dbname=mwebsite_dev
$mysqli = new mysqli($m[1], $db['username'], $db['password'], $m[2]);
$result = $mysqli->query("SELECT * FROM shop WHERE domain = '{$domain}'");
if($result->num_rows){
    $shop = $result->fetch_object();
    if($shop->domain == $domain){

        $array_domain["http://{$domain}/<_c:\w+>/<_a:\w+>"] = array('/web/<_c>/<_a>', 'defaultParams' => array('alias' => $shop->alias));
        
        $array_domain["http://{$domain}"] = array('/web/site', 'defaultParams' => array('alias' => $shop->alias));
        
        $array_domain["http://{$domain}/admin/<_c:\w+>/<_a:\w+>"] = array('/admin/<_c>/<_a>', 'defaultParams' => array('alias' => $shop->alias));
        $array_domain["http://{$domain}/admin/<_c:\w+>"] = array('/admin/<_c>', 'defaultParams' => array('alias' => $shop->alias));
        $array_domain["http://{$domain}/admin"] = array('/admin', 'defaultParams' => array('alias' => $shop->alias));

    }
    $result->close();
    $mysqli->close();
}
return $array_domain;