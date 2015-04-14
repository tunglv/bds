<div id="popup-create" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="title-popup-create">Đăng ký</h3>
    </div>
    <div class="modal-body">
        <div class="form-login">
            <i class="arrow"></i>
            <div class="fields-login clearfix">
                <!--form create-->
                <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'create-user-form',
                        'action'=> Yii::app()->createUrl('user/create'),
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit' => true,
                            'validateOnChange' => true,
                        ),
                        'enableAjaxValidation'=>FALSE,
                        'htmlOptions' => array('class' => 'form-horizontal')
                    )); ?>

                <?php echo $form->textField($model_create,'name',array('size'=>60,'maxlength'=>255,'placeholder'=>'Họ tên')); ?>
                <?php echo $form->error($model_create,'name');?>


                <?php echo $form->textField($model_create,'username',array('size'=>60,'maxlength'=>255,'placeholder'=>'Số ĐTDĐ/Email')); ?>
                <?php echo $form->error($model_create,'username');?>

                <?php echo $form->passwordField($model_create,'password',array('autocomplete'=>'off','maxlength'=>255,'placeholder'=>'Mật khẩu')); ?>
                <?php echo $form->error($model_create,'password');?>

                <?php echo $form->passwordField($model_create,'rePassword',array('autocomplete'=>'off','maxlength'=>255,'placeholder'=>'Nhập lại mật khẩu')); ?>
                <?php echo $form->error($model_create,'rePassword');?>

                <?php echo $form->textField($model_create,'verifyCode', array('id' => 'password', 'class' => 'input-small')); ?>
                <?php $this->widget('CCaptcha', Yii::app()->params['captcha_view']); ?>
                <?php echo $form->error($model_create,'verifyCode'); ?>

                <label class="checkbox">
                    <?php echo $form->checkBox($model_create,'condition')?><p>Tôi đồng ý với
                        <a href="<?php echo Yii::app()->createUrl('vl')?>">điều khoản sử dụng</a><br/>
                        của Ăn uống</p>
                </label>
                <?php echo $form->error($model_create,'condition'); ?>

                <button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>
                <button type="submit" class="btn">Đăng ký</button>

                <?php $this->endWidget(); ?>
                <div class="clearfix"></div>
                <output id="error-form-login"></output>
                <!--end form login-->
            </div>
            <div class="social-login-">
                <span class="title-login-social clearfix">Đăng nhập nhanh bằng tài khoản</span>
                <a class="login-face openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Facebook" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'facebook'))?>"><i class="open-id-face"></i></a>
                <a class="login-google openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Google" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'google'))?>"><i class="open-id-google"></i></a>
                <a class="login-yahoo openid_popup" data-placement="right" title="Đăng nhập bằng tài khoản Yahoo" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'yahoo'))?>"><i class="open-id-yahoo"></i></a>
            </div>
        </div>
    </div>
    <!--        <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
    </div>-->
</div>