<?php
    class AdminController extends Controller
    {
        public $manager;

        // menu selected
        public $menu_parent_selected;
        public $menu_child_selected;
        public $menu_sub_selected;

        public function init(){ 
            parent::init();
//            Yii::app()->clientScript->registerCssFile(
//                Yii::app()->clientScript->getCoreScriptUrl().
//                '/jui/css/base/jquery-ui.css'
//            );
            //            Yii::app()->clientScript->registerCssFile('/files/css/jquery-ui-mac/style.css');
            // init properties 
            $this->manager = Yii::app()->user->isGuest ? NULL : Yii::app()->user->manager;




        }

}