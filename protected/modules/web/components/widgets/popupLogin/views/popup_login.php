<div id="popup-login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Đăng nhập</h3>
        </div>
        <div class="modal-body">
             <div class="form-login">
                            <i class="arrow"></i>
                            <div class="fields-login clearfix">
                                <!--form login-->
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'login-form-popup',
                                    'action'=> Yii::app()->createUrl('user/login'),
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array(
                                        'validateOnSubmit' => true,
                                        'validateOnChange' => true,
                                    ),
                                    'enableAjaxValidation'=>false,
                                    'htmlOptions' => array()
                                )); ?>
                                <!--<input id="LoginForm_username" type="text" placeholder="Email hoặc số ĐTDĐ" class="input-large" name="LoginForm[username]">-->
                                <?php echo $form->textField($model,'username',array('autocomplete'=>'off','maxlength'=>255,'placeholder'=>'Email hoặc số ĐTDĐ')); ?>
                                <?php echo $form->error($model,'username');?>
                                <!--<input id="LoginForm_password" type="password" placeholder="Mật khẩu" class="input-large" name="LoginForm[password]">-->
                                <?php echo $form->passwordField($model,'password',array('autocomplete'=>'off','maxlength'=>255,'placeholder'=>'Mật khẩu')); ?>
                                <?php echo $form->error($model,'password');?>
                                <label class="checkbox">
                                    <input type="checkbox" value="1" name="LoginForm[rememberMe]" checked="checked" id="remember-account"> Nhớ tài khoản
                                </label>
                                <a class="btn" id="button-login">Đăng ký</a>
                                <button type="submit" class="btn" class="button-login">Đăng nhập</button> 
                                <a class="clearfix forget-account" href="<?php echo Yii::app()->createUrl('/web/user/forget')?>">Quên mật khẩu</a>
                                <?php $this->endWidget(); ?>
                                <div class="clearfix"></div>
                                <output id="error-form-login"></output>
                                <!--end form login-->
                            </div>
                            <div class="social-login">
                                <span class="title-login-social clearfix">Đăng nhập nhanh bằng tài khoản</span>
                                <a class="openid_popup" rel="tooltip" data-placement="right" title="Đăng nhập bằng tài khoản Facebook" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'facebook'))?>"><i class="open-id-face"></i></a>
                                <a class="openid_popup" rel="tooltip" data-placement="right" title="Đăng nhập bằng tài khoản Google" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'google'))?>"><i class="open-id-google"></i></a>
                                <a class="openid_popup" rel="tooltip" data-placement="right" title="Đăng nhập bằng tài khoản Yahoo" href="<?php echo Yii::app()->createUrl('/web/user/login', array('service' => 'yahoo'))?>"><i class="open-id-yahoo"></i></a>
                            </div>
                        </div>
        </div>
<!--        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Save changes</button>
        </div>-->
    </div>