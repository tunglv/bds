<div class="container" id="user-main">
	<div class="span24 path">
		<a class="first" href="#"><i class="icon-home"></i> Trang chủ </a>						
		<a class="end" href="#">Đăng nhập</a>
	</div>
	<div class="span23 user-update">
		<div class="nav clearfix nav-tabs user-nav-tab">	
			<?php $this->renderPartial('_tabs')?>
		</div>	
		<div id="phone_list">
		<?php $this->renderPartial('manage_phone_list', array('userPhones' => $this->user->userPhones))?>
		</div>   
	
		<script>
		$('input[name="is_main"]').live('change', function(){
		    $('#ajax-loading').fadeIn();
		    $('#phone_list').load('<?php echo $this->createUrl('/web/user/ajaxUpdatePhoneList')?>', {action: 'update_main', phone_id: $(this).val()}, function(){
		        $('#ajax-loading').fadeOut();    
		    });    
		}); 
		$('.phone_remove a').live('click', function(e){
		    e.preventDefault();
		    
		    if(confirm('Bạn có chắc chắn muốn loại bỏ SĐT '+ $(this).attr('email') + ' ?')){
		        $('#ajax-loading').fadeIn();
		        $('#phone_list').load('<?php echo $this->createUrl('/web/user/ajaxUpdatePhoneList')?>', {action: 'remove', phone_id: $(this).attr('phone_id')}, function(){
		            $('#ajax-loading').fadeOut();    
		        }); 
		    }
		                                                                                                                                                  
		});                                                                                                                                                 
		</script>
		<hr/>			
		<div class="">
		<?php $form=$this->beginWidget('CActiveForm', array(
		        'id'=>'add-phone-form',
		        'enableClientValidation'=>true,
		        'clientOptions'=>array(
		            'validateOnSubmit' => true,
		            'validateOnChange' => true,
		        ),
		        'enableAjaxValidation'=>true,
		        'htmlOptions' => array()
		   	));?>
		            <?php //echo $form->errorSummary($emailModel);?>
		            <div class="control-group"> 
				        <?php echo $form->labelEx($phoneModel,'phone', array('class' => 'control-label')); ?>
				        <div class="controls">
				            <?php echo $form->textField($phoneModel,'phone',array('class'=>'numeric','maxlength'=>255)); ?>
				            <?php echo $form->error($phoneModel,'phone');?>
				        </div>
		        	</div>
		        	<div class="control-group btn-user-update">
			        	<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Thêm SĐT di động</button>
			        </div>
		<?php $this->endWidget(); ?>
		</div>
	</div>
</div>