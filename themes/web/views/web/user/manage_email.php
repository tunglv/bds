<div class="container" id="user-main">
	<div class="span24 path">
		<a class="first" href="#"><i class="icon-home"></i> Trang chủ </a>						
		<a class="end" href="#">Đăng nhập</a>
	</div>
	<div class="span23 user-update">
		<div class="nav clearfix nav-tabs user-nav-tab">
			<?php $this->renderPartial('_tabs')?>
		</div>
		<div id="email_list">
			<p class="user-text-line">Email đang sử dụng</p>
			<?php $this->renderPartial('manage_email_list', array('userEmails' => $this->user->userEmails))?>
		</div>   
		
		<script>
		$('input[name="is_main"]').live('change', function(){
		    $('#ajax-loading').fadeIn();
		    $('#email_list').load('<?php echo $this->createUrl('/web/user/ajaxUpdateEmailList')?>', {action: 'update_main', email_id: $(this).val()}, function(){
		        $('#ajax-loading').fadeOut();    
		    });    
		}); 
		$('.email_remove a').live('click', function(e){
		    e.preventDefault();
		    
		    if(confirm('Bạn có chắc chắn muốn loại bỏ email '+ $(this).attr('email') + ' ?')){
		        $('#ajax-loading').fadeIn();
		        $('#email_list').load('<?php echo $this->createUrl('/web/user/ajaxUpdateEmailList')?>', {action: 'remove', email_id: $(this).attr('email_id')}, function(){
		            $('#ajax-loading').fadeOut();    
		        }); 
		    }
		                                                                                                                                                  
		});                                                                                                                                                 
		</script>
		<hr />
		<span  class="user-text-line">Thêm tài khoản OpenID</span>
		<div class="control-group control-group-open-di">			
		    <a class="openid_popup" rel="tooltip" data-placement="right" title="Thêm tài khoản Facebook" href="<?php echo $this->createUrl('/web/user/manageEmail', array('service' => 'facebook'))?>"><i class="open-id-face"></i></a> 
		    <a class="openid_popup" rel="tooltip" data-placement="right" title="Thêm tài khoản Google" href="<?php echo $this->createUrl('/web/user/manageEmail', array('service' => 'google'))?>"><i class="open-id-google"></i></a>		    
		</div>
		
		<hr />
		<span class="user-text-line">Thêm email</span>
		<div class="control-group">
		<?php $form=$this->beginWidget('CActiveForm', array(
		        'id'=>'add-email-form',
		        'enableClientValidation'=>true,
		        'clientOptions'=>array(
		            'validateOnSubmit' => true,
		            'validateOnChange' => true,
		        ),
		        'enableAjaxValidation'=>false,
		        'htmlOptions' => array()
		    ));?>
		            <?php //echo $form->errorSummary($emailModel);?>
		        <?php echo $form->labelEx($emailModel,'email', array('class' => 'control-label')); ?>
		        <div class="controls">
		            <?php echo $form->textField($emailModel,'email',array('class'=>'numeric','maxlength'=>255)); ?>
		            <?php echo $form->error($emailModel,'email');?>
		        </div>
		        <div class="btn-user-update">
		        	<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Thêm email</button>
		        </div>
		        
		<?php $this->endWidget(); ?>
		</div>
		
	</div>
</div>