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
            'type'      =>  'html',
            'value' => '$data->title',
        ),
        array(
            'name' => 'author',
            'type'      =>  'html',
            'value' => '$data->author',
        ),
        array(
            'name' => 'job',
            'type'      =>  'html',
            'value' => '$data->job',
            'filter' => FALSE
        ),
        array(
            'name' => 'link',
            'type'      =>  'html',
            'value' => 'CHtml::link("Link tài liệu", Yii::app()->createUrl("/upload/document/{$data->id}/{$data->link}"))',
            'filter' => FALSE
        ),
        array(
            'name' => 'type',
            'type'      =>  'raw',
            'value' => '$data->typeLabel',
            'filter' => $model->typeData
        ),
        array(
            'name' => 'desc',
            'type'      =>  'html',
            'value' => '$data->desc',
            'filter' => FALSE
        ),
        array(
            'name' => 'manager_id',
            'type'      =>  'raw',
            'value' => '$data->manager["name"]',
            'filter' => FALSE
        ),

        array(
            'name' => 'catagory_parent',
            'type'      =>  'raw',
            'value' => 'Catagory::model()->getParentById($data->catagory_parent)',
            'filter' => Catagory::model()->getParentLabel()
        ),
        array(
            'name' => 'catagory_id',
            'type'      =>  'raw',
            'value' => 'Catagory::model()->getParentById($data->catagory_id)',
            'filter' => Catagory::model()->getChildLabel(1)
        ),
        array(
            'name' => 'status',
            'type'      =>  'raw',
            'value' => '$data->statusLabel',
            'filter' => $model->statusData
        ),
        array(
            'name' => 'created',
            'type'      =>  'raw',
            'value' => '$data->created',
            'filter' => FALSE
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
        ),
    ),
)); ?>    