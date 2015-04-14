<?php
    class LoginForm extends CFormModel
    {
        public $username; // email or password
        public $password;
        public $rememberMe;
        
        private $_identity;

        public function init(){

        }


        public function rules()
        {
            return array(
                array('username, password', 'required'),
                array('rememberMe', 'boolean'),
                array('password', 'authenticate'),
            );
        }

        public function attributeLabels()
        {
            return array(
                'username'    =>  'Email/Số ĐT',
                'password'    =>  'Mật khẩu',
            );
        }

        public function authenticate($attribute,$params)
        {
            if(!$this->hasErrors()){
                $this->_identity=new UserIdentity($this->username,$this->password);
                if(!$this->_identity->authenticate())
                    $this->addError('password', $this->_identity->errorMessage);
            }
        }


        public function login()
        {
            if($this->_identity===null)
            {
                $this->_identity=new UserIdentity($this->username,$this->password);
                $this->_identity->authenticate();
            }
            
            if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
            {
                $duration=$this->rememberMe ? Yii::app()->params->userRemember : 0; // 30 days
//                $duration=Yii::app()->params->userRemember;
                Yii::app()->user->login($this->_identity, $duration);
                return true;
            }
            else
                return false;
        } 


}