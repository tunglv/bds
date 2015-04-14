<?php
class AlertWidget extends CWidget
{
    public function run()
    {
        $keys = array(      
            'success',
            'info',
            'warning',
            'error',
        );              

        foreach($keys as $k){
            if($msg = Yii::app()->user->getFlash($k)){
                echo '<div class="alert alert-'.$k.' fade in">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            '.$msg.'
                      </div>';
                break;
            }
        }
    }
}
?>
