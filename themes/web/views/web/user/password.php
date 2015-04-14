<div class="container" id="user-main">
	<div class="span24 path">
		<a class="first" href="#"><i class="icon-home"></i> Trang chủ </a>						
		<a class="end" href="#">Đăng nhập</a>
	</div>
	<div class="span23 user-update">
		<div class="nav clearfix nav-tabs user-nav-tab">	
			<?php $this->renderPartial('_tabs')?>
		</div>
		<?php $form=$this->beginWidget('CActiveForm', array(
		        'id'=>'password-form',
		        'enableClientValidation'=>true,
		        'clientOptions'=>array(
		            'validateOnSubmit' => true,
		            'validateOnChange' => true,
		        ),
		        'enableAjaxValidation'=>false,
		        'htmlOptions' => array()
		    )); ?>
		    
		
		<?php if($this->user->password):?>
		    <div class="control-group">
		        <?php echo $form->labelEx($model,'oldPassword', array('class' => 'control-label')); ?>
		        <div class="controls">
		            <?php echo $form->passwordField($model,'oldPassword',array('autocomplete'=>'off','maxlength'=>255)); ?>
		            <?php echo $form->error($model,'oldPassword');?>
		        </div>
		    </div> 
		    <?php endif?>
		
		<div class="control-group">
		    <?php echo $form->labelEx($model,'newPassword', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->passwordField($model,'newPassword',array('autocomplete'=>'off','maxlength'=>255)); ?>
		        <?php echo $form->error($model,'newPassword');?>
		    </div>
		</div> 
		
		<div class="control-group">
		    <?php echo $form->labelEx($model,'reNewPassword', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->passwordField($model,'reNewPassword',array('autocomplete'=>'off','maxlength'=>255)); ?>
		        <?php echo $form->error($model,'reNewPassword');?>
		    </div>
		</div> 
		<div class="control-group">
		    <div class="controls">
		        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> 
		        	<?php echo $passwordActionName?>
		        </button>
		    </div>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
