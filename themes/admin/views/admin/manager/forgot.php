<h1 class="logintitle">
    <span class="iconfa-lock"></span> Quên mật khẩu 
    <?php if($success = Yii::app()->user->getFlash('success')):?>
        <span class="subtitle success"><?php echo $success?></span>
        <?php elseif($error = Yii::app()->user->getFlash('error')):?>
        <span class="subtitle success"><?php echo $error?></span>
        <?php else:?>
        <span class="subtitle">Điền email của bạn để tiến hành lấy lại mật khẩu</span>
        <?php endif?>
</h1>
<div class="loginwrapperinner">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'forgot-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions' => array('method' => 'post')
            //'enableAjaxValidation'=>true,
        )); ?>

    <p class="animate4 bounceIn">
        <?php echo $form->textField($model,'username_email', array('id' => 'username', 'placeholder' => 'Email')); ?>
    </p>
    <p class="animate5 bounceIn">
        <label>Mã xác nhận <span class="required">*</span></label>

        <?php echo $form->textField($model,'verifyCode', array('id' => 'password', 'style' => 'width: 120px')); ?>
        <?php $this->widget('CCaptcha', Yii::app()->params['captcha_view']); ?>
        <?php echo $form->error($model,'verifyCode'); ?>
    </p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Reset mật khẩu</button></p>
    <p class="animate7 fadeIn"><a href="<?php echo $this->createUrl('/admin/manager/login')?>"><span class="icon-user icon-white"></span> Đăng nhập</a></p>
    <?php $this->endWidget(); ?>

</div><!--loginwrapperinner-->