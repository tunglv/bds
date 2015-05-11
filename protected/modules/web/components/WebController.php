<?php
    class WebController extends Controller
    {
        /**
        * Đối tượng User. Nếu chưa đăng nhập thì là NULL
        */
        public $user;
        /**
        * Đối tượng Manager. Nếu chưa đăng nhập thì là NULL
        */
        public $manager;

        //title, desc for site
        public $title;
        public $desc;

        public $hotline;

        public function init(){
            parent::init();
            $this->hotline = Hotline::model()->find();
//            $this->user = Yii::app()->user->user;
//            $this->manager = Yii::app()->userAdmin->manager;
//            $this->catagory = Catagory::model()->findAll('status=:status', array(':status'=>'ENABLE'));
//            $this->_lessc();

        }
        
        private function _lessc(){
            Yii::import('ext.lessc');   
            $less = new lessc;
            $inputFile = "themes/web/files/less/app.less";
            $outputFile = "themes/web/files/less/app.css";
            // create a new cache object, and compile
            $cache = $less->cachedCompile($inputFile);
            file_put_contents($outputFile, $cache["compiled"]);

            // the next time we run, write only if it has updated
            $last_updated = $cache["updated"];
            $cache = $less->cachedCompile($cache);
            if ($cache["updated"] > $last_updated) {
                file_put_contents($outputFile, $cache["compiled"]);
            }
        }

}