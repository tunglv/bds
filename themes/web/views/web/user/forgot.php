<style>
    .user-line  {
        padding: 6px 0;
    }
    .controls .button {
        font-size: 14px;
        margin: 10px 10px 8px 130px;
        padding: 8px 22px;
    }
    #user-main {
        padding-top: 25px;
    }
    #user-main > h1 {
        padding-bottom: 20px;
    }
    .link-switch {
        padding: 20px 0 0 130px;
    }
</style>
<div class="container clearfix" id="user-main">
    <h1 class="sixteen columns">ĐIỀN EMAIL CỦA BẠN ĐỂ LẤY LẠI MẬT KHẨU</h1>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'forgot-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('method' => 'post','class'=>'two-thirds column')
            //'enableAjaxValidation'=>true,
            ));
    ?>



    <div class="two-thirds column user-line">
        <?php echo $form->labelEx($model, 'username', array('class' => 'two columns')); ?>
        <div>
            <?php echo $form->textField($model, 'username', array('class'=>'text', 'size' => 60, 'maxlength' => 255, 'style'=>'padding: 5px 10px; width: 318px;')); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>
    </div>
    <?php /*
      <div>
      <label>Mã xác nhận <span class="required">*</span></label>

      <?php echo $form->textField($model,'verifyCode', array('id' => 'password', 'style' => 'width: 120px')); ?>
      <?php $this->widget('CCaptcha', Yii::app()->params['captcha_view']); ?>
      <?php echo $form->error($model,'verifyCode'); ?>
      </div>
     */ ?>
    <div class="controls">
        <button class="button">Reset mật khẩu</button>
    </div>

<?php $this->endWidget(); ?>
    <div class="sixteen columns link-switch">
        <?php $this->renderPartial('_links') ?>
    </div>
</div>