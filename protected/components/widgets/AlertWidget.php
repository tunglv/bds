<?php
    class AlertWidget extends CWidget
    {
        public function run()
        {        
            $keys = array(      
                'success' => 'Success',
                'info' => 'Info',
                'warning' => 'Warning',
                'error' => 'Error',
            );

            foreach($keys as $k => $title){
                if($msg = Yii::app()->user->getFlash($k)){
                    Yii::app()->clientScript->registerScript('myGrow', "myGrowl('{$msg}');");
                    break;
                }

            }

        }
    }
?>
