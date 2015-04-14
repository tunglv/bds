<?php
class WebUser extends CWebUser
{      
    public $user;
    
    public function init(){
        parent::init();
        if($this->id){
            $this->user = User::model()->with(array('userEmails', 'userPhones'))->findByPk($this->id);

            if(!$this->user || $this->user->status != 'ENABLE'){
                $this->logout();
            }
        }
    }
}
