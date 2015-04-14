<?php
class AlertWidget extends CWidget
{
    public $pop = true;
    public $div = true;
    
    public function run()
    {        
        $keys = array(      
            'success'   => 'Thành công',
            'info'      => 'Thông báo',
            'warning'   => 'Cảnh báo',
            'error'     => 'Lỗi',
        );

        foreach($keys as $k => $title){
            if($msg = Yii::app()->user->getFlash($k)){
                if($this->pop){
                    echo "<div class=\"alert alert-{$k}\">
                            <button class=\"close\" type=\"button\" data-dismiss=\"alert\">×</button>
                            <strong>{$title}!</strong>
                            {$msg}
                         </div>";    
                }
                
                if($this->div) {
                    Yii::app()->clientScript->registerScript('jGrow', '
                        $.jGrowl("'.$msg.'", {
                            header: "'.$title.'",
                            position: "bottom-right",
                            life: 5000
                        });
                    ');
                }
                break;
            }
        }
    }
}
?>

