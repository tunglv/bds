<?php
    class Controller extends CController
    {
        public $layout='//layouts/main';
        public $menu=array();
        public $breadcrumbs=array();

        public $pageTitle;
        public $pageDesc;
        public $pageKeywords;

        public $siteName = 'Meonho.net';
        public $siteSlogan = 'Cuộc sống tươi đẹp';

        public $baseUrl;
        public $themeUrl;
        public $themePathViews;
        public $domain = 'http://bds.tung/';

        public function actions()
        {
            return array(
                'captcha'=>array(
                    'class'=>'CaptchaExtendedAction',
                    //'class'=>'CCaptchaAction',

                    'testLimit'=>0, // how many times should the same CAPTCHA be displayed. Defaults to 3. A value less than or equal to 0 means the test is unlimited
                    'backColor'=>0xFFFFFF,
                    'foreColor'=>0x477fdc,
                    'minLength'=>3,
                    'maxLength'=>3,
                    'padding'   => 2, // padding around the text
                    'density' => 2, // dots density 0 - 100%
                    'mode' => 'default', // Captcha mode, supported values are [logical, words, mathverbal, math, default]
                    'lines' => 2, // The number of lines drawn through the generated captcha picture
                    'fillSections' => 5, //The number of sections to be filled with random flood color
                )
            );
        }

        public function init(){ 
            // register files
            Yii::app()->clientScript->registerCoreScript('jquery');
            Yii::app()->clientScript->registerCoreScript('jquery.ui');
            //        Yii::app()->clientScript->registerCssFile(
            //                Yii::app()->clientScript->getCoreScriptUrl().
            //                '/jui/css/base/jquery-ui.css'
            //        );
            //Yii::app()->clientScript->registerCssFile('/files/css/jquery-ui-mac/style.css');

            // register class paths for extension captcha extended
            Yii::$classMap = array_merge( Yii::$classMap, array(
                'CaptchaExtendedAction' => Yii::getPathOfAlias('ext.captchaExtended').DIRECTORY_SEPARATOR.'CaptchaExtendedAction.php',
                'CaptchaExtendedValidator' => Yii::getPathOfAlias('ext.captchaExtended').DIRECTORY_SEPARATOR.'CaptchaExtendedValidator.php'
            ));


            // init properties 
            $this->pageTitle = "{$this->siteName} - {$this->siteSlogan}";
            
            $this->baseUrl = Yii::app()->request->getBaseUrl(TRUE);
            $this->themeUrl = Yii::app()->theme->baseUrl;
            $this->themePathViews = 'webroot.themes.'.Yii::app()->theme->name.'.views/';
            $this->domain = preg_replace('{https?://(.+)}', '$1', $this->baseUrl);
        }
        
        


}