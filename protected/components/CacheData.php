<?php
    /**
    * Phục vụ cho việc cache dữ liệu
    */
    class CacheData extends CApplicationComponent
    {

        const MEOHAY = 'meohay';
        const KNOWLEDGE =  'knowledge';
        const TODAY = 'today';
        const MarketPrices = 'marketprices';
         
        public static $functions = array(
            'getMeohay',
            'getKnowledge',
            'getToday',
            'getMarketPrices'
        );
        
        public function init(){
            parent::init();
            Myext::createDir(Yii::app()->cache->cachePath);
        }

        //meohay
        private $_meohays;
        public function getMeohay($id, $refresh = false, $expire = 0){
            $key = __CLASS__.__FUNCTION__.$id;
            
            if($refresh){
                Yii::app()->cache->delete($key);
                if(empty($this->_meohays[$id])) unset($this->_meohays[$id]);
            }        
             
            if(!empty($this->_meohays[$id]))    return $this->_meohays[$id];            
            $this->_meohays[$id] = Yii::app()->cache->get($key);

            if($this->_meohays[$id] === false){
                $this->_meohays[$id] = Meohay::model()->getMeohay($id, false);
                Yii::app()->cache->set($key, $this->_meohays[$id], $expire);
            }

            return $this->_meohays[$id];
        }

        //knowledge
        private $_knowledges;
        public function getKnowledge($id, $refresh = false, $expire = 0){
            $key = __CLASS__.__FUNCTION__.$id;

            if($refresh){
                Yii::app()->cache->delete($key);
                if(empty($this->_knowledges[$id])) unset($this->_knowledges[$id]);
            }

            if(!empty($this->_knowledges[$id]))    return $this->_knowledges[$id];
            $this->_knowledges[$id] = Yii::app()->cache->get($key);

            if($this->_knowledges[$id] === false){
                $this->_knowledges[$id] = NewKnowledge::model()->getKnowledge($id, false);
                Yii::app()->cache->set($key, $this->_knowledges[$id], $expire);
            }

            return $this->_knowledges[$id];
        }

        //today
        private $_today;
        public function getToday($id, $refresh = false, $expire = 0){
            $key = __CLASS__.__FUNCTION__.$id;

            if($refresh){
                Yii::app()->cache->delete($key);
                if(empty($this->_today[$id])) unset($this->_today[$id]);
            }

            if(!empty($this->_today[$id]))    return $this->_today[$id];
            $this->_today[$id] = Yii::app()->cache->get($key);

            if($this->_today[$id] === false){
                $this->_today[$id] = Today::model()->getToday($id, false);
                Yii::app()->cache->set($key, $this->_today[$id], $expire);
            }

            return $this->_today[$id];
        }

        //today
        private $_marketprices;
        public function getMarketPrices($id, $refresh = false, $expire = 86400){
            $key = __CLASS__.__FUNCTION__.$id;

            if($refresh){
                Yii::app()->cache->delete($key);
                if(empty($this->_marketprices[$id])) unset($this->_marketprices[$id]);
            }

            if(!empty($this->_marketprices[$id]))    return $this->_marketprices[$id];
            $this->_marketprices[$id] = Yii::app()->cache->get($key);

            if($this->_marketprices[$id] === false){
                $this->_marketprices[$id] = MarketPrices::model()->getMarketPrices($id, false);
                Yii::app()->cache->set($key, $this->_marketprices[$id], $expire);
            }

            return $this->_marketprices[$id];
        }
}