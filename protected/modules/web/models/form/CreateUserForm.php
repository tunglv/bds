<?php
    class CreateUserForm extends CFormModel
    {
        public $name;
        public $username; // email or phone
        public $isEmail;
        
        public $password;
        public $rePassword;
        
        public $verifyCode;
        public $condition;

        public function rules()
        {
            return array(
                array('password, rePassword, name, username', 'required'),
                array('username', 'checkUsername'), 
                array('condition', 'required'),
                array('condition', 'checkCondition'),
                array('verifyCode', 'required'), 
                array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements()),  
            );
        }

        public function attributeLabels()
        {
            return array(
                'name'=> 'Họ & Tên',
                'username'=> 'Số ĐTDĐ/Email',
                'password'=> 'Mật khẩu',
                'rePassword'=> 'Nhập lại mật khẩu',
                'verifyCode'    =>  'Mã xác nhận',
            );
        }
        
        public function checkCondition($attribute,$params) {
            if($this->condition != 1)
                $this->addError('condition', "Bạn phải đồng với các điều khoản của chúng tôi"); 
        }
        
        public function checkUsername($attribute,$params)
        {
            $this->isEmail = preg_match('/@/', $this->username);
            
            // check email
            if($this->isEmail){
                $emailValidator = new CEmailValidator;
                if(!$emailValidator->validateValue($this->username))
                {
                    $this->addError('username', "Email Không hợp lệ"); 
                }
                else if(UserEmail::model()->exists("email = '{$this->username}'"))
                {
                    $this->addError('username', "Email đã được sử dụng");   
                }
                
            // check phone
            }else{
                if(!preg_match('/^(09\d{8}|01\d{9})$/', $this->username))
                {
                    $this->addError('username', "SĐT phải đúng định dạng 09xxxxxxxx hoặc 01xxxxxxxxx"); 
                }   
                else if(UserPhone::model()->exists("phone = '{$this->username}'"))
                {
                    $this->addError('username', "SĐT đã được sử dụng");   
                }
            }
            
            
        }

    }
