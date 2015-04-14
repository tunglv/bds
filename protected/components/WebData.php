<?php
    /**
    * Store global variables [get from cache]
    *
    * @property City $city
    */
    class WebData extends CApplicationComponent
    {
        public $city;

        public function init(){
            $this->setCity();
        }

        /**
        * detect and set city, cookie
        * 
        * @param mixed $city_alias
        */
        public function setCity($city_alias = NULL){

            $cities = Yii::app()->cacheData->cities;
            
            $city_alias = $city_alias ? $city_alias : Yii::app()->request->getQuery('city_alias');

            // set city, cookie  by city_alias
            if($city_alias && isset($cities[$city_alias])){
                $this->city = $cities[$city_alias];  

                // init city, cookie
            }else{  

                $city_alias_cookie = Yii::app()->request->cookies['city_alias'];
                if($city_alias_cookie && isset($cities[$city_alias_cookie->value])){
                    $this->city = $cities[$city_alias_cookie->value];
                }else{
                    $ip = (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') ? 
                    $_SERVER['REMOTE_ADDR'] : '113.161.77.185';
                    $this->city = Geo::model()->getCityDataByIp($ip);
                }     
            }
            Yii::app()->request->cookies['city_alias'] = new CHttpCookie('city_alias', $this->city->alias);
        }


}