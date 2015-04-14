<style>
    .field-form  {
        padding: 6px 0;
    }
    .bt-create .button {
        font-size: 14px;
        margin: 10px 10px 8px 132px;
        padding: 8px 22px;
    }
    #yw0_button {
        position: absolute;
        right: 10px;
        top: 17px;
    }
    #user-main {
        padding-top: 25px;
    }
    #user-main > h1 {
        padding-bottom: 20px;
    }
    .open-id-face {
        background-image: url('<?php echo Yii::app()->baseUrl.'/files/img/auth/facebook_128.png'?>');
        width: 128px;
        height: 128px;
        display: block;
        float:right;
    }
    .open-id-google {
        background-image: url('<?php echo Yii::app()->baseUrl.'/files/img/auth/google_128.png'?>');
        width: 128px;
        height: 128px;
        display: block;
    }
    .user-title {
        font-size: 15px;
        padding-bottom: 15px;
    }
</style>
<div class="container clearfix create-account" id="user-main">
		<h1 class="sixteen columns user-head-title">ĐĂNG KÝ TÀI KHOẢN</h1>
		<?php $form = $this->beginWidget('CActiveForm', array('id' => 'create-user-form', 'enableClientValidation' => true, 'clientOptions' => array('validateOnSubmit' => true, 'validateOnChange' => FALSE, ), 'enableAjaxValidation' => true, 'htmlOptions' => array('class' => 'two-thirds column user-left'))); ?>
		<div  class="field-form two-thirds column user-line">
			<?php // echo $form->errorSummary($model); ?>
			<?php echo $form -> labelEx($model, 'name', array('class' => 'two columns')); ?>
                        <div class="six columns">
				<?php echo $form -> textField($model, 'name', array('class'=>'text', 'maxlength' => 255, 'style'=>'padding: 5px 10px; width: 318px;')); ?>
				<?php echo $form -> error($model, 'name'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<?php echo $form -> labelEx($model, 'username', array('class' => 'two columns')); ?>
			<div class="six columns">
				<?php echo $form -> textField($model, 'username', array('class'=>'text', 'maxlength' => 255, 'style'=>'padding: 5px 10px; width: 318px;')); ?>
				<?php echo $form -> error($model, 'username'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<?php echo $form -> labelEx($model, 'password', array('class' => 'two columns')); ?>
			<div class="six columns">
				<?php echo $form -> passwordField($model, 'password', array('class'=>'text','autocomplete' => 'off', 'maxlength' => 255, 'style'=>'padding: 5px 10px; width: 317px;')); ?>
				<?php echo $form -> error($model, 'password'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<?php echo $form -> labelEx($model, 'rePassword', array('class' => 'two columns')); ?>
			<div class="six columns">
				<?php echo $form -> passwordField($model, 'rePassword', array('class'=>'text','autocomplete' => 'off', 'maxlength' => 255,'style'=>'padding: 5px 10px; width: 317px;')); ?>
				<?php echo $form -> error($model, 'rePassword'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<label class="two columns">Mã xác nhận <span class="required">*</span></label>
			<div class="six columns" style="position: relative;">
				<?php echo $form -> textField($model, 'verifyCode', array('class' => 'two columns text','style'=>'padding: 5px 10px;margin-left:0')); ?>
				<?php $this -> widget('CCaptcha', Yii::app() -> params['captcha_view']); ?>
				<?php echo $form -> error($model, 'verifyCode'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<label class="two columns">&nbsp;</label>
			<div class="six columns">
				<label class="checkbox">
					<?php echo $form->checkBox($model,'condition')?>
                                    <p class="four columns" style="float: right;margin-right: 85px;">Tôi đồng ý với
					<a href="<?php echo $this->createUrl('')?>">điều khoản sử dụng</a><br/>
					của Mẹo hay
                                    </p> 
                                </label>
				<?php echo $form -> error($model, 'condition'); ?>
			</div>
		</div>
	
		<div class="field-form two-thirds column user-line">
			<div class="bt-create">
				<button type="submit" class="button">
					Đăng ký
				</button>
			</div>
		</div>
		<?php $this -> endWidget(); ?>
		<div class="one-third column user-right">
			<div class="login-open-id">
				<span class="one-third column user-title">ĐĂNG NHẬP QUA</span>
				<a class="three columns login-face openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Facebook" href="<?php echo $this->createUrl('/web/user/login', array('service' => 'facebook'))?>"><i class="open-id-face"></i></a>
				<a class="two columns login-google openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Google" href="<?php echo $this->createUrl('/web/user/login', array('service' => 'google'))?>"><i class="open-id-google"></i></a>
			</div>
		</div>
</div>