<h1 class="logintitle">
    <span class="iconfa-lock"></span> Đổi mật khẩu 
    <?php if($success = Yii::app()->user->getFlash('success')):?>
        <span class="subtitle success"><?php echo $success?></span>
        <?php elseif($error = Yii::app()->user->getFlash('error')):?>
        <span class="subtitle success"><?php echo $error?></span>
        <?php else:?>
        <span class="subtitle">Nhập mật khẩu mới cho tài khoản của bạn</span>
        <?php endif?>
</h1>
<div class="loginwrapperinner">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'reset-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions' => array('method' => 'post')
            //'enableAjaxValidation'=>true,
        )); ?>

    <p class="animate4 bounceIn">
        <?php echo $form->passwordField($model,'password',array('id' => 'password', 'maxlength'=>128, 'placeholder' => 'Mật khẩu mới'));?>
        <?php echo $form->error($model,'password'); ?>
    </p>
    <p class="animate5 bounceIn">                                   , 
        <?php echo $form->passwordField($model,'rePassword',array('id' => 'password', 'maxlength'=>128, 'placeholder' => 'Nhập lại mật khẩu mới')); ?>
        <?php echo $form->error($model,'rePassword'); ?>
    </p>
    <p class="animate6 bounceIn"><button class="btn btn-default btn-block">Đặt mật khẩu mới</button></p>
    <?php $this->endWidget(); ?>

</div><!--loginwrapperinner-->