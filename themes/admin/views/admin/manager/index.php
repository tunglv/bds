<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'manager-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template' => "{items} {pager}",
    'itemsCssClass' => 'table',
    'pagerCssClass' => 'pagination pagination-centered',
    'pager'=>array(
        'class'=>'CLinkPager',
        'htmlOptions' => array(
            'class' => '',
        ),
        'hiddenPageCssClass' => 'disabled',
        'selectedPageCssClass' => 'active',
        'maxButtonCount'    =>  8,
        'header'            => FALSE,

    ),
    'loadingCssClass' => '',
    'beforeAjaxUpdate'=>'function(id,options){
        $("#ajax-loading").fadeIn();    
    }',
    'afterAjaxUpdate'=>'function(id,options){
        $("#ajax-loading").fadeOut();    
    }',
    'columns'=>array(
        array(
            'name' => 'status',
            'type'      =>  'raw',
            'value' => '$data->statusLabel',
            'filter' => Manager::model()->statusData,
        ),
        array(
            'name' => 'email',
            'type'      =>  'raw',
            'value' => '$data->email',
        ),
        array(
            'name' => 'name',
            'value' => '$data->name',
            'type' => 'html',
        ),
        array(
            'name' => 'phone',
            'value' => '$data->phone',
            'type' => 'html',
        ),
        array(
            'name' => 'yahoo',
            'value' => '$data->yahoo',
            'type' => 'html',
        ),
        array(
            'name' => 'skype',
            'value' => '$data->skype',
            'type' => 'html',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
            'buttons' => array(
                'update' => array(
                    'url'=>'$data->getAdminUrl("update")',
                    'visible'=>'

                    (Yii::app()->controller->manager->id == $data->id) || 
                    (Yii::app()->controller->manager->isAdmin && $data->isManager) || 
                    $data->isStaffOnly || $data->isDisable

                    '
                ),
                'delete' => array(
                    'url'=>'$data->getAdminUrl("delete")',
                    'visible'=>'

                        (Yii::app()->controller->manager->isAdmin && $data->isManagerOnly) || 
                        $data->isStaffOnly || $data->isDisable

                    ',
                    'click' => "function() {
                        if(!confirm('Bạn có chắc là muốn xóa không?')) return false;
                        var th=this;
                        var afterDelete=function(){};
                        $.fn.yiiGridView.update('manager-grid', {
                            type:'POST',
                            url:$(this).attr('href'),
                            success:function(data) {
                                $.fn.yiiGridView.update('manager-grid');
                                afterDelete(th,true,data);
                                $.jGrowl(data, {
                                    header: 'Xóa thành công!',
                                    position: 'bottom-right',
                                    life: 5000
                                });
                            },
                            error:function(XHR) {
                                return afterDelete(th,false,XHR);
                            }
                        });
                        return false;
                    }",
                ),
            ),
        ),
    ),
)); ?>             