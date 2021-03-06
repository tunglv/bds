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
            'name' => 'address',
            'type'      =>  'raw',
            'value' => '$data->address',
        ),
        array(
            'name' => 'phone',
            'type'      =>  'raw',
            'value' => '$data->phone ." - ". $data->mobile',
            'filter' => FALSE
        ),
        array(
            'name' => 'fax',
            'type'      =>  'raw',
            'value' => '$data->fax',
            'filter' => FALSE
        ),
        array(
            'name' => 'email',
            'type'      =>  'raw',
            'value' => '$data->email',
        ),
        array(
            'name' => 'website',
            'type'      =>  'raw',
            'value' => '$data->website',
        ),
        array(
            'name' => 'MST',
            'type'      =>  'raw',
            'value' => '$data->MST',
            'filter' => FALSE
        ),
        array(
            'name' => 'skyper',
            'type'      =>  'raw',
            'value' => '$data->skyper',
        ),
        array(
            'name' => 'yahoo',
            'type'      =>  'raw',
            'value' => '$data->yahoo',
        ),
        array(
            'name' => 'area',
            'type'      =>  'raw',
            'value' => '$data->area ." - ".$data->district_name." - ".$data->province_name',
            'filter' => FALSE
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