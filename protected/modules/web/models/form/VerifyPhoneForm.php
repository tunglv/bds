<?php
    class VerifyPhoneForm extends CFormModel
    {
        public $code;
        public $upc;
        public $user;

        public function rules()
        {
            return array(
                array('code', 'required'),
                array('code', 'match', 'pattern' => '/^\d{4}$/', 'message' => '{attribute} không hợp lệ'), 
                array('code', 'checkCode'), // clear expire code and check code is exists 
                
                array('code', 'checkPhoneForgot', 'on' => 'forgot'), // validation code and phone on forgot action
                array('code', 'checkPhoneExists', 'on' => 'create, add'), // check exists user phone on add and create action
                array('code', 'checkPhoneAdd', 'on' => 'add'), // check phone with user_id
                array('code', 'checkPhoneCreate', 'on' => 'create'), // check phone, name, password
            );
        }

        public function attributeLabels()
        {
            return array(
                'code'    =>  'Mã xác nhận SĐT',
            );
        }
        
        public function checkCode($attribute,$params)
        {   
            // clear code expire
            $expireTime = strtotime(MyDateTime::getCurrentTime()) - Yii::app()->params->userPhoneEmailExpire - 3600;
            $expireDateTime = date('Y-m-d H:i:s', $expireTime);
            UserPhoneCode::model()->deleteAll("created < '{$expireDateTime}'");
            
            
            // check code exists and expire
            $this->upc = UserPhoneCode::model()->findByAttributes(array('code' => $this->code));
            if(!$this->upc || strtotime(MyDateTime::getCurrentTime()) > strtotime($this->upc->created) + Yii::app()->params->userPhoneEmailExpire){
                $this->addError('code', "Mã {$this->code} không tồn tại hoặc đã hết hạn"); 
            }
        }

        
        public function checkPhoneForgot($attribute,$params)
        {   
            if(!$this->hasErrors()){
                $userPhone = UserPhone::model()->with('user')->findByAttributes(array('user_id' => $this->upc->user_id, 'phone' => $this->upc->phone));
                if(!$userPhone){
                    $this->addError('code', "Mã {$this->code} không hợp lệ với số ĐT {$userPhone->phoneLabel}"); 
                }
                $this->user = $userPhone->user;
            }

        }

        
        public function checkPhoneExists($attribute,$params)
        {   
            if(UserPhone::model()->exists("phone = {$this->upc->phone}")){
                $this->addError('code', "Mã {$this->code} đã được xác nhận."); 
            }
        }
        
        public function checkPhoneAdd($attribute,$params)
        {   
            if(!$this->upc->user_id){
                $this->addError('code', "Mã {$this->code} không hợp lệ."); 
            }
        }
        
        public function checkPhoneCreate($attribute,$params)
        {   
            if(!$this->upc->name || !$this->upc->password){
                $this->addError('code', "Mã {$this->code} không hợp lệ."); 
            }
        }
}