<?php
class AdminWebUser extends CWebUser
{      
    public $manager;
    
    public function init(){
        parent::init();    
        if($this->id){
            $this->manager = Manager::model()->findByPk($this->id);
            if(!$this->manager || $this->manager->isDisable) $this->logout();
        }
    }
}
?>
