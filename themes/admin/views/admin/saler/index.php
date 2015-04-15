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
            'value' => 'CHtml::image($data->getImageUrl($data->id,"200"), "", array("style" => "width: 100px"))',
            'filter' => FALSE
        ),
        array(
            'name' => 'name',
            'type'      =>  'raw',
            'value' => '$data->name',
        ),
        array(
            'name' => 'created',
            'type'      =>  'raw',
            'value' => 'date("h:s d-m-y",$data->created)',
            'filter' => FALSE
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
        ),
    ),
)); ?>    