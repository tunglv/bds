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
            'value' => '$data->price.$data->price_type'
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