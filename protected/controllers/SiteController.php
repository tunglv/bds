<?php

    class SiteController extends Controller
    {
        /**
        * Declares class-based actions.
        */
        public function actions()
        {
            return parent::actions();
        }
        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
            );
        }
        public function accessRules()
        {
            return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('index'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array(),
                    'users'=>array('@'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
        }

        /**
        * This is the action to handle external exceptions.
        */
        public function actionError()
        {
            $this->layout = 'error';
            if($error=Yii::app()->errorHandler->error)
            {
                if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('error', $error);
            }
        }

        public function actionIndex()
        {
            $this->layout = "//layouts/column3";
            $this->render('test');
        }
    }
