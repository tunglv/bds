<?php
    class ForgotForm extends CFormModel
    {
        public $username_email;
        public $verifyCode;

        public function rules()
        {
            return array(
                array('username_email, verifyCode', 'required'),
                array('username_email', 'email'), 
                array('username_email', 'checkExist'), 
                array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements()),  
            );
        }

        public function attributeLabels()
        {
            return array(
                'username_email'=> 'Email',
                'verifyCode'    =>  'Mã xác nhận',
            );
        }

        public function checkExist($attribute,$params)
        {
            $manager = Manager::model()->findByAttributes(array('email' => $this->username_email));

            if(!$manager){
                $this->addError('username_email', "Không tồn tại tài khoản {$this->username_email}");
            }

        }

    }
