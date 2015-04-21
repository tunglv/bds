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
            'name' => 'image',
            'type'      =>  'html',
            'value' => 'CHtml::image($data->getImageUrl($data->id,"122"), "", array("style" => "width: 100px"))',
        ),
        array(
            'name' => 'title',
            'type'      =>  'raw',
            'value' => '$data->title',
        ),
        array(
            'name' => 'price',
            'type'      =>  'raw',
            'value' => 'number_format($data->price, 0, \'\', \'.\')." ".$data->price_type'
        ),
        array(
            'name' => 'project_name',
            'type'      =>  'raw',
            'value' => '$data->project_name',
        ),
        array(
            'name' => 'area',
            'type'      =>  'raw',
            'value' => '$data->area',
        ),
        array(
            'name' => 'code',
            'type'      =>  'raw',
            'value' => '$data->code',
        ),
        array(
            'name' => 'type',
            'type'      =>  'raw',
            'value' => '$data->getTypeLabel()',
            'filter' => $model->typeData
        ),
        array(
            'name' => 'address',
            'type'      =>  'raw',
            'value' => '$data->address." - ".$data->district_name." - ".$data->province_name',
        ),
        array(
            'name' => 'created',
            'type'      =>  'raw',
            'value' => '$data->created'
        ),
        array(
            'name' => 'status',
            'type'      =>  'raw',
            'value' => '$data->statusLabel',
            'filter' => $model->statusData
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
        ),
    ),
)); ?>    