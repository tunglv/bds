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
            'value' => 'CHtml::image($data->getImageUrl($data->id,"85"), "", array("style" => "width: 100px"))',
        ),
        array(
            'name' => 'title',
            'type'      =>  'raw',
            'value' => '$data->title',
        ),
        array(
            'name' => 'manager_id',
            'type'      =>  'raw',
            'value' => '$data->manager["name"]',
        ),
        array(
            'name' => 'number',
            'type'      =>  'raw',
            'value' => '$data->number'
        ),
        array(
            'name' => 'productInColors',
            'type'      =>  'raw',
            'value' => '$data->getColorLabelList()',
            'filter' => FALSE
        ),
        array(
            'name' => 'productInSizes',
            'type'      =>  'raw',
            'value' => '$data->getSizeLabelList()',
            'filter' => FALSE
        ),
        array(
            'name' => 'is_viewed',
            'type'      =>  'raw',
            'value' => '"<a href=\'/admin/product/statistics?id=".$data->id."\'>".$data->is_viewed."</a>"'
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