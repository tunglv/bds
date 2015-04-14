<style>
    .ui-helper-hidden-accessible {
        display: none;
    }
</style>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'event-grid',
    'dataProvider'=>$dataProvider,
    'filter'=>$model,
    'ajaxUpdate'=> true,
    'template' => "{items} {pager}",
    'itemsCssClass' => 'table table-striped table-bordered',
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
            'name' => 'id',
            'type'      =>  'html',
            'value' => '$data->id',
            'headerHtmlOptions' => array('style' => 'width: 10px'),
            'filter' => FALSE
        ),
        array(
            'name' => 'title',
            'type'      =>  'raw',
            'value' => '$data->title',
        ),
        array(
            'name' => 'created',
            'type'      =>  'raw',
            'value' => 'date("h:s d-m-y",$data->created)',
            'filter' => FALSE
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{_update} {_delete}',
            'buttons'=>array
            (
                '_update' => array
                (
                    'label'=>'Cập nhập topic này',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/themes/admin/files/img/update.png',
                    'url'=>'Yii::app()->createUrl("admin/news/updateTopic", array("id"=>$data->id))',
                ),
                '_delete' => array
                (
                    'label'=>'[x]',
                    'imageUrl'=>Yii::app()->request->baseUrl.'/themes/admin/files/img/delete.png',
                    'url'=>'Yii::app()->createUrl("admin/news/deleteTopic", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
)); ?>    