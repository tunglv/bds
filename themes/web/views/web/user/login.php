<style>
    .user-line  {
        padding: 6px 0;
    }
    .controls .button {
        font-size: 14px;
        margin: 10px 10px 8px 120px;
        padding: 8px 22px;
    }
    #user-main {
        padding-top: 25px;
    }
    #user-main > h1 {
        padding-bottom: 20px;
    }
    .open-id-face {
        background-image: url('<?php echo Yii::app()->baseUrl.'/files/img/auth/facebook_64.png'?>');
        width: 64px;
        height: 64px;
        display: block;
        float:right;
    }
    .open-id-google {
        background-image: url('<?php echo Yii::app()->baseUrl.'/files/img/auth/google_64.png'?>');
        width: 64px;
        height: 64px;
        display: block;
    }
    .user-title {
        font-size: 15px;
        padding-bottom: 15px;
    }
</style>
<div class="container clearfix" id="user-main">
    <h1 class="sixteen columns user-head-title">ĐĂNG NHẬP</h1>
    <?php $form = $this->beginWidget('CActiveForm', array('id' => 'login-form', 'enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => true,), 'enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'two-thirds column'))); ?>

    <div class="span12 user-left">			
        <div class="two-thirds column user-line">
            <?php echo $form->labelEx($model, 'username', array('class' => 'two columns')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'username', array('autocomplete' => 'off', 'maxlength' => 255, 'class' => 'text','style'=>'padding: 5px 10px; width: 318px;')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
        </div>

        <div class="two-thirds column user-line">
            <?php echo $form->labelEx($model, 'password', array('class' => 'two columns')); ?>
            <div class="controls">
                <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off', 'maxlength' => 255, 'class' => 'text', 'style'=>'padding: 5px 10px; width: 318px;')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
        </div>
        <div class="two-thirds column user-line">
            <div class="controls">
                <button type="submit" class="button">
                    Đăng nhập
                </button>
            </div>
        </div>
        <div class="two-thirds column user-line" style="padding-left: 120px;">
            <?php $this->endWidget(); ?>
            <?php $this->renderPartial('_links')
				?>
        </div>

    </div>

    <div class="one-third column user-right">
        <div class="login-open-id">
            <span class="one-third column user-title">ĐĂNG NHẬP QUA</span>
            <a class="two columns login-face openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Facebook" href="<?php echo $this->createUrl('/web/user/login', array('service' => 'facebook')) ?>"><i class="open-id-face"></i></a>
            <a class="one column login-google openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Google" href="<?php echo $this->createUrl('/web/user/login', array('service' => 'google')) ?>"><i class="open-id-google"></i></a>
        </div>
    </div>
</div>