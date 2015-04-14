<script type="text/javascript" src="/files/editors/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/files/editors/tiny_mce/editor_admin.js"></script>
<script type="text/javascript" src="/files/js/relCopy.jquery.js"></script>
<style>
    .checkbocklist {
        width:100px;
        float:left;
        overflow:hidden;
    }
    .checkbocklist label{
        width: 50px;
    }
    label.required {
        float:left;
    }
    .ui-datepicker {
        width: 232px;
    }
    .upload_method{
        cursor: pointer;
    }
    .upload_method.selected{
        text-decoration: underline;
        font-weight: bold;
    }
    #img_file {
        margin-top: 5px;
    }
    #image_file, #image_url, #img_file, #img_url{
        margin-left: 220px;
    }
    #image_file, #image_url{
        display: none;
    }

</style>
<div class="grid_4">       
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                Danh mục SP mới
            </span>
        </div>

        <div id="da-ex-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
            <?php // $this->renderPartial('_tabs', array('model' => $model))?>
            <div style="padding-bottom: 20px;">

                <?php $this->widget('admin.components.widgets.AlertWidget');?>

                <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'catagory-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        //'enableAjaxValidation'=>true,
                        'htmlOptions' => array('class' => 'stdform', 'enctype' => 'multipart/form-data')
                    )); ?>
                <h4 class="widgettitle">Nội dung danh mục</h4>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('maxlength'=>64, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'title', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Name should be 50-64 chars <span id="name_char_count"></span></small>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'parent_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model, 'parent_id', Catagory::model()->getParentLabel(), array('empty' => 'Menu', 'class' => 'control-label')); ?>
                        <?php echo $form->error($model,'parent_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <p class="stdformbutton">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
                </p>
                <?php $this->endWidget(); ?>
            </div>
        </div>
</div>
<script>
        $("#Catagory_title").keyup(function(){
                $('#name_char_count').text($(this).val().length);
        }).keyup();
</script>
