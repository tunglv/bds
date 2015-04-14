<?php

    class PopupCreateAccount extends CWidget
    {
        public function run() {

//            return Yii::app()->clientScript->registerScript('loadCities', '
//                $.showListCities = function() {
//                    $("#all-city-list").slideToggle("fast");
//                }
//                ', CClientScript::POS_END);


            Yii::import('web.models.form.CreateUserForm');
            $model = new CreateUserForm;

            $this->render('popup_create_account', array('model_create' => $model));
        }

    }

