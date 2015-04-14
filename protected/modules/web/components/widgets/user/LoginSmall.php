<?php

    class LoginSmall extends CWidget
    {
        public function run() {

//            return Yii::app()->clientScript->registerScript('loadCities', '
//                $.showListCities = function() {
//                    $("#all-city-list").slideToggle("fast");
//                }
//                ', CClientScript::POS_END);


            Yii::import('web.models.form.LoginForm');

            $model = new LoginForm();

            $this->render('login_small', array('model' => $model));
        }

    }

