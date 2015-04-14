<?php $this->renderPartial('_tabs')?>

    
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'verify-phone-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit' => true,
            'validateOnChange' => true,
        ),
        'enableAjaxValidation'=>true,
        'htmlOptions' => array()
    )); ?>


<?php echo $form->errorSummary($model);?>

<div id="email_field">
    <?php echo $form->labelEx($model,'code'); ?>
    <div>
        <?php echo $form->textField($model,'code',array('maxlength'=>4)); ?>
        <?php echo $form->error($model,'code');?>
    </div>
</div>

<div>
    <div>
        <button type="submit" class="btn"><i class="icon-ok"></i> Xác nhận SĐT</button>
    </div>
</div>
<?php $this->endWidget(); ?>
