<?php
    class ForgotForm extends CFormModel
    {
        public $username;  // email or phone 
        public $isEmail;

        public $verifyCode;

        public $user;

        public function rules()
        {
            return array(
                array('username', 'required'),
                array('username', 'checkUsername'), 

                //                array('verifyCode', 'required'), 
                //                array('verifyCode', 'CaptchaExtendedValidator', 'allowEmpty'=>!CCaptcha::checkRequirements()),  
            );
        }

        public function attributeLabels()
        {
            return array(
                'username'=> 'Email hoặc SĐT di động',
                'verifyCode'    =>  'Mã xác nhận',
            );
        }

        public function checkUsername($attribute,$params)
        {
            $this->isEmail = preg_match('/@/', $this->username);

            // check email
            if($this->isEmail){
                $emailValidator = new CEmailValidator;
                if(!$emailValidator->validateValue($this->username)){
                    $this->addError('username', "Email Không hợp lệ");
                    return; 
                }

                $userUsername = UserEmail::model()->with('user')->findByAttributes(array('email' => $this->username));
                if(!$userUsername){
                    $this->addError('username', "Không tồn tại email {$this->username}");
                    return;
                } 

                // check phone
            }else{
                if(!preg_match('/^(09\d{8}|01\d{9})$/', $this->username)){
                    $this->addError('username', "SĐT phải đúng định dạng 09xxxxxxxx hoặc 01xxxxxxxxx");
                    return; 
                }   

                $userUsername = UserPhone::model()->with('user')->findByAttributes(array('phone' => $this->username));

                if(!$userUsername){{
                        $this->addError('username', "Không tồn tại SĐT {$this->phone}");
                        return;   
                    }
                }

                $this->user = $userUsername->user;
            }


        }


    }
