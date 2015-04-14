<?php
    /**
    * $bm = new Benmark;
    * $bm->getTime();
    */
    class Benmark {

        public $start;
        public $end;
        public $time;

        public function __construct(){
            $this->start = microtime(true);
        }
        
        public function getTime(){
            $this->end = microtime(true);
            return $this->time = round($this->end - $this->start, 3);
        }
        
    }
?>
