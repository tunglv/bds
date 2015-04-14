<?php
class AdminUserIdentity extends CUserIdentity
{
    public function authenticate()
    {
        $manager = Manager::model()->findByAttributes(array('email' => $this->username));
        if(!$manager || !$manager->checkPassword($this->password, $manager->password)){
            $this->errorMessage='Thông tin đăng nhập không chính xác';
        }
        elseif($manager->isDisable){
            $this->errorMessage='Tài khoản đang bị khóa';
        }
        else{
            $this->errorCode = self::ERROR_NONE;
            $this->setState('id', $manager->id);
            $this->setState('name', $manager->email);
        }
        return !$this->errorMessage;
    }
}