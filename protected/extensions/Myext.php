<?php
    /**
    * @package    Parser
    * @subpackage    Text
    */
    class Myext
    {
        /**
        * Upload image from form post or external image url
        * 
        * @param mixed $source $_FIELDS['upload_field'] or External url
        * @param string $saved_path Path to save image, end with slash /
        * @param string $file_name Name of file
        * @param array $params Config to save image
        * @return Upload
        */
        public static function uploadImage($source, $saved_path, $file_name, array $params = array()){
            Yii::import('ext.upload.Upload');
            if(!file_exists($saved_path)) mkdir($saved_path,0777,true);


            if(isset($source['size']) && is_numeric($source['size'])){
//                $upload = new Upload($source);
                $img = WideImage::load($source);
            }else{
                $img_copy = $saved_path.$file_name.'.jpg';
                $copied = copy($source, $img_copy);
//                $upload = new Upload($img_copy);
                $img = WideImage::load($source);
            }

//            $upload->file_new_name_body = $file_name; 
//            $upload->image_convert = 'jpg';
//            $upload->jpeg_quality = 90;
//            $upload->file_overwrite = TRUE;
//
//            //$upload->image_ratio            = TRUE;
//            //$upload->image_ratio_crop       = TRUE;
//            $upload->image_resize           = TRUE;
//            $upload->image_ratio_no_zoom_in = TRUE;
//
//
//            foreach($params as $key => $value){
//                $upload->$key           = $value;
//            }    
//            $upload->process($saved_path);
                
             $img = $img->resize($params['image_x'], $params['image_y'], 'inside', 'down');
             $img = $img->resizeCanvas($params['image_x'], $params['image_y'], 'center', 'center', $img->allocateColor(255, 255, 255));
             $img->saveToFile($saved_path.$file_name.'.jpg', 90);

            return $file_name.'.jpg';
        }


        /**
        * Trả về width, height của 1 external url file
        * 
        * @param string $img_url http://image.url/file.jpg
        * @param mixed $rang Chỉ chạy đến bytes
        * @param mixed $show_time thời gian chạy
        */
        public static function getWidthHeightImage($img_url, $rang = 666, $show_time = FALSE){
            if($show_time) $start = microtime(true);

            $curl = curl_init($img_url);
            if($rang) curl_setopt($curl, CURLOPT_HTTPHEADER, array("Range: bytes=0-{$rang}"));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $img = curl_exec($curl);
            curl_close($curl);
            $im = @imagecreatefromstring($img);
            if($show_time){
                $stop = round(microtime(true) - $start, 5);
                $data['time'] = $stop;
            }
            $data['width'] = @imagesx($im);
            $data['height'] = @imagesy($im);
            return $data['width'] ? $data : NULL;
        }

        public static function saveContentImages($content, $saved_path, $params, $item_alias = ''){
            $content = trim($content);
            if(!$content) return;
            Yii::import('ext.simple_html_dom');

            $html = new simple_html_dom($content);
            $baseUrl = Yii::app()->request->getBaseUrl(TRUE);
            foreach($html->find('img') as $i => $img){
                //if(preg_match('{^http.+\.(jpg|jpeg|gif|png|bmp)(\?.+)?$}six', $img->src)/* && strpos($img->src, $baseUrl) === FALSE*/){
                if(preg_match('{^http.+$}six', $img->src)/* && strpos($img->src, $baseUrl) === FALSE*/){
                    $file_name = ($item_alias ? $item_alias.'_' : '').uniqid();
                    $size = self::getWidthHeightImage($img->src);
                    if(!$size) $size = self::getWidthHeightImage($img->src, 0);

                    if(($size && $size['width'] > 200 && $size['height'] > 150)){
                        $imgName = self::uploadImage($img->src, $saved_path, $file_name, $params);
                        $img->src = '/'.$saved_path.$imgName;

                    }
                    #$img->outertext = '<center>'.$img->outertext.'</center>';
                }
            }
            foreach($html->find('a') as $a){
                if(isset($a->find('img',0)->src) && strpos($a->find('img',0)->src, $baseUrl) !== FALSE){
                    $a->href = $a->find('img',0)->src;
                }
            }
            $content = $html->save();
            $html->clear();
            return $content;
        }

        public static function deleteDir($dir_path, $remove_dir = TRUE){
            if(file_exists($dir_path) && is_dir($dir_path)){
                if(substr($dir_path, -1) != '/') $dir_path .= '/';
                foreach(glob($dir_path.'*') as $v){
                    if(is_dir($v)){
                        self::deleteDir($v);
                    }
                    if(file_exists($v)) unlink($v);
                }
                if($remove_dir){
                    rmdir($dir_path); 
                }

            }
        }

        public static function createDir($dir_path){
            if(!file_exists($dir_path)){
                mkdir($dir_path,0777,true);
            }
            chmod($dir_path, 0777);  
        }


        private static function _adj_tree(&$tree, $index, $item, $id_key, $parent_id_key, $children_key,  $ref = FALSE) {
            $i = $item[$id_key];
            $p = $item[$parent_id_key];
            $tree[$i] = isset($tree[$i]) ? $item + $tree[$i] : $item;
            if($ref){
                $tree[$p][$children_key][$index] = &$tree[$i];
            }else{
                $tree[$p][$children_key][] = &$tree[$i];
            }
        }

        public static function arrayToTree($data, $id_key = 'id', $parent_id_key = 'parent_id', $children_key = 'children', $parent_id_value = NULl, $ref = FALSE){
            if(empty($data)) return;
            $tree = array();
            foreach($data as $index => $item){
                self::_adj_tree($tree, $index , $item, $id_key, $parent_id_key, $children_key, $ref);
            }
            return $tree[$parent_id_value][$children_key];
        }

        public static function getRandomChar($num = 6){
            $charNumArr = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9');
            $n = count($charNumArr);
            $str = "";
            for($i=0; $i<$num; $i++) {
                $str .= $charNumArr[rand(0,$n-1)];
            }
            return $str;
        }


        public static function fetchRowsToTree(array $rows, $id_field = 'id', $parent_id_field = 'parent_id', $childs_field = 'childs', $ref = FALSE){;
            $data = array();
            $ref = array();
            foreach ($rows as & $row) {
                $ref[$row[$id_field]] = & $row;
                $row[$childs_field] = array();
            }

            foreach ($rows as $index => & $row){
                if (empty($row[$parent_id_field])){
                    if($ref) $data[$index] = & $row;
                    else     $data[] = & $row;
                }
                else{
                    if($ref) $ref[$row[$parent_id_field]][$childs_field][$index] = & $row;
                    else     $ref[$row[$parent_id_field]][$childs_field][] = & $row;
                }
            }
            return $data;
        }


        # Don%26#x27;t => Don't
        public static function html_entity_decode_utf8($string){
            $string = preg_replace('~&#x([0-9a-f]+);~ei', 'self::_code2utf(hexdec("\\1"))', $string);
            $string = preg_replace('~&#([0-9]+);~e', 'self::_code2utf(\\1)', $string);
            return $string;
        }
        private static function _code2utf($num){
            if ($num < 128) return chr($num);
            if ($num < 2048) return chr(($num >> 6) + 192) . chr(($num & 63) + 128);
            if ($num < 65536) return chr(($num >> 12) + 224) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
            if ($num < 2097152) return chr(($num >> 18) + 240) . chr((($num >> 12) & 63) + 128) . chr((($num >> 6) & 63) + 128) . chr(($num & 63) + 128);
            return '';
        }



        /*
        * Convert: Ng&#7855;m c&#225;c nh&#224; l&#227;nh => Ngáº¯m cÃ¡c nhÃ  lÃ£nh
        */ 
        public static function html_to_utf8($data){
            return preg_replace("/\\&\\#([0-9]{3,10})\\;/e", '$this->_html_to_utf8("\\1")', $data);
        }
        private function _html_to_utf8($data){
            if($data > 127){
                $i = 5;
                while(($i--) > 0){
                    if($data != ($a = $data % ($p = pow(64, $i)))){
                        $ret = chr(base_convert(str_pad(str_repeat(1, $i + 1), 8, "0"), 2, 10) + (($data - $a) / $p));
                        for($i; $i > 0; $i--){
                            $ret .= chr(128 + ((($data % pow(64, $i)) - ($data % ($p = pow(64, $i - 1)))) / $p));
                        }
                        break;
                    }
                }
            }else{
                $ret = "&#{$data};";
            }
            return $ret;
        }

        public static function char_limiter($str, $limit = 100, $end_char = '...'){
            $str_sub = mb_substr($str, 0, $limit, 'UTF-8');
            if (mb_strlen($str, 'UTF-8') > $limit){
                return $str_sub.$end_char;
            }
            else{
                return $str;
            }
        }

        public static function numberFormat($number, $int = FALSE){
            if($int) return str_replace('.', '', $number);
            return number_format($number, 0, '', '.');
        }
        
        /**
         * @author tunglv Doe <tunglv.1990@gmail.com>
         * 
         * @param string: $string, int: $length, string: $elliipsis
         * @return string with length = $length
         */
        public static function word_limit($string, $length, $ellipsis="...") {
		return (count($words = explode(' ', $string)) > $length) ? implode(' ', array_slice($words, 0, $length)) . $ellipsis : $string;
	}
        
        /**
         * @author tunglv
         * @param : timestamp
         * @return : Trả lại các ngày trong tuần
         */
        public static function getDay($timestamp = null) {
            $day = date('N', $timestamp);
            
            switch ($day) {
                case 1:
                    return 'Thứ 2';
                    break;
                case 2:
                    return 'Thứ 3';
                    break;
                case 3:
                    return 'Thứ 4';
                    break;
                case 4:
                    return 'Thứ 5';
                    break;
                case 5:
                    return 'Thứ 6';
                    break;
                case 6:
                    return 'Thứ 7';
                    break;
                case 7:
                    return 'Chủ nhật';
                    break;
            }
        }
        
        /**
         * @author tunglv
         * @param : các mảng
         * @dothing : nối hai mảng với nhau. 
         *            Tham số tiếp theo sẽ được nối vào tham số đầu tiên của hàm
         *            Các key của các mảng nếu trùng nhau sẽ lấy mảng cuối
         * @return : Trả lại một mảng đã được nối
         */
        public static function array_push_associative(&$arr) {
            $ret = 0;
            $args = func_get_args();
            foreach ($args as $arg) {
                if (is_array($arg)) {
                    foreach ($arg as $key => $value) {
                        $arr[$key] = $value;
                        $ret++;
                    }
                }else{
                    $arr[$arg] = "";
                }
            }
            return $ret;
         }
         
        //echo distance('32.9697,-96.80322', '29.46786,-98.53506', "M") . " Miles<br>";
        //echo distance('32.9697,-96.80322', '29.46786,-98.53506', "K") . " Kilometers<br>";
        //echo distance('32.9697,-96.80322', '29.46786,-98.53506', "N") . " Nautical Miles<br>";
        public static function getDistanceFromLatLon($latlon1, $latlon2, $unit = 'k') {
            list($lat1, $lon1) = explode(',', $latlon1);
            list($lat2, $lon2) = explode(',', $latlon2);

            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
?>
