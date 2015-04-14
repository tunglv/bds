<?php
    class UserIdentity extends CUserIdentity
    {
        public function authenticate()
        {
            $isEmail = preg_match('{@}', $this->username);

            if($isEmail) $userEmailPhone = UserEmail::model()->findByAttributes(array('email' => $this->username));
            else         $userEmailPhone = UserPhone::model()->findByAttributes(array('phone' => $this->username));



            if(!$userEmailPhone){
                $this->errorMessage='Thông tin đăng nhập không chính xác';    
            }else{

                $user = $userEmailPhone->user;
                
                if(!$user->password)
                {
                    if($user->userEmails){
                        try {
                            $services = array();
                            foreach($user->userEmails as $email){
                                if($email->openid_service){
                                    $services[] = CHtml::link($email->openIdServiceLabel, Yii::app()->createUrl('/web/user/login', array('service' => strtolower($email->openid_service))), array('class' => 'openid_popup'));
                                }
                            }
                            $serviceStr = implode(', ', $services);  
                            $this->errorMessage= "Tài khoản {$this->username} chưa đặt mật khẩu. Hãy đăng nhập bằng OpenID: {$serviceStr} và tạo mật khẩu";
               
                        } catch (Exception $exc) {
                            echo $exc->getTraceAsString();
                        }
                    }else{
                        
                        $this->errorMessage= "Tài khoản {$this->username} chưa đặt mật khẩu. ".CHtml::link('Bạn hãy reset mật khẩu tại đây', $this->createUrl('/web/user/forgot'));
                    }
                    

                    
                    
                }elseif(!$user->checkPassword($this->password, $user->password))
                {  
                    $this->errorMessage='Thông tin đăng nhập không chính xác';  
                }elseif($user->status == 'DISABLE')
                {
                    $this->errorMessage="Tài khoản {$this->username} đang bị khóa";    
                }else
                {
                    $this->errorCode = self::ERROR_NONE;
                    $this->setState('id', $user->id);
                    $this->setState('name', $user->name);
                }


            }
            return !$this->errorMessage;
        }
}