<?php $this->widget('admin.components.widgets.AlertWidget');?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'manager-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'enableAjaxValidation'=>true,
        'htmlOptions' => array('class' => 'stdform')
    )); ?>

<div class="par control-group">
    <?php echo $form->labelEx($model,'email', array('class' => 'control-label')); ?>

    <?php if($model->isNewRecord):?>
    <div class="controls">
        <?php echo $form->textField($model,'email',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'email', array('class' => 'help-inline error'));?>
    </div>
    <?php else:?>
    <span class="field">
        <?php echo $model->email;?>
    </span>
    <?php endif?>
</div>
<div class="par control-group">
    <?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
    <?php if($this->manager->id != $model->id):?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $this->manager->statusDataByLevel, array('empty' => 'Chọn ...', 'class' => 'input-xlarge uniformselect')); ?>
            <?php echo $form->error($model,'status', array('class' => 'help-inline error'));?>                     
        </div>
    <?php else:?>
        <span class="field">
            <?php echo $model->statusLabel;?>
        </span>
    <?php endif?>
</div>

<div class="par control-group">
    <?php echo $form->labelEx($model,'password', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'password',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'password', array('class' => 'help-inline error'));?>
    </div>
</div>



<div class="par control-group">
    <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'name',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'name', array('class' => 'help-inline error'));?>
    </div>
</div>

<div class="par control-group">
    <?php echo $form->labelEx($model,'phone', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'phone',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'phone', array('class' => 'help-inline error'));?>
    </div>
</div>

<div class="par control-group">
    <?php echo $form->labelEx($model,'skype', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'skype',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'skype', array('class' => 'help-inline error'));?>
    </div>
</div>

<div class="par control-group">
    <?php echo $form->labelEx($model,'yahoo', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'yahoo',array('maxlength'=>255, 'class' => 'input-xlarge')); ?>
        <?php echo $form->error($model,'yahoo', array('class' => 'help-inline error'));?>
    </div>
</div>

<p class="stdformbutton">
    <button class="btn btn-info" type="submit"><?php echo ($model->isNewRecord) ? 'Thêm' : 'Cập nhật';?></button>
</p>
<?php $this->endWidget(); ?>