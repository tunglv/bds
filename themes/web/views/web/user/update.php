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
		        'id'=>'user-form',
		        'enableClientValidation'=>true,
		        'clientOptions'=>array(
		            'validateOnSubmit' => true,
		            'validateOnChange' => true,
		        ),
		        'enableAjaxValidation'=>true,
		        'htmlOptions' => array('class' => 'form-horizontal', 'enctype'=>"multipart/form-data")
		    )); ?>
		<?php if($model->email_main):?>
		    <div class="control-group">
		        <?php echo $form->labelEx($model,'email_main', array('class' => 'control-label')); ?>
		        <div class="controls">
		            <?php echo $model->email_main->email?>
		        </div>
		    </div> 
		<?php endif?>
		
		<?php if($model->phone_main):?>
		    <div class="control-group">
		        <?php echo $form->labelEx($model,'phone_main', array('class' => 'control-label')); ?>
		        <div class="controls">
		            <?php echo $model->phone_main->phoneLabel?>
		        </div>
		    </div>
		    <?php endif?>
		
		<div class="control-group">
		    <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		        <?php echo $form->error($model,'name');?>
		    </div>
		</div>
		
		
		<style>
		    .upload_method{
		        cursor: pointer;
		    }
		    .upload_method.selected{
		        text-decoration: underline;
		        font-weight: bold;
		    }
		    #image_file, #image_url{
		        display: none;
		    }
		</style>
		<script>
		    $(function(){
		        
		        $("#a_url").click(function(){
		            $('#a_file').removeClass('selected');    
		            $('#a_url').addClass('selected');    
		            $('#image_url').show();
		
		            if($('#img_url').attr('src')){
		                $('#img_url').show();    
		            }
		                  
		            $('#image_file, #img_file').hide();    
		            $('#User_upload_method').val('url');    
		        });
		        
		        $("#a_file").click(function(){
		            $('#a_url').removeClass('selected');    
		            $('#a_file').addClass('selected');    
		            $('#image_file').show();
		              
		            if($('#img_file').attr('src')){
		                $('#img_file').show();    
		            }
		              
		            $('#image_url, #img_url').hide();
		            $('#User_upload_method').val('file');    
		        });
		
		
		        $("#browse_file").change(function(evt){
		            var files = evt.target.files;
		            var f = files[0];
		
		            if(!f.type.match('image.*')) {
		                alert('File không hợp lệ. Hãy chọn 1 file ảnh khác.');
		                return false;   
		            }
		
		            var i = document.createElement('input');
		            if('multiple' in i){
		                var reader = new FileReader();
		                reader.readAsDataURL(f);
		                reader.onload = (function(){
		                    return function(e){
		                        $('#img_url').hide(); 
		                        $('#img_file').attr('src', e.target.result).show(); 
		                    };
		                })(f);
		                $('#img_review').show();
		            }
		        });
		
		        $("#User_image_url").bind('change keyup blur', function(evt){
		            var method = $('#User_upload_method').val();
		            var ext = $(this).val().split('.').pop().toLowerCase();
		            console.log(ext);
		            if(method == 'url' && $.inArray(ext, [ 'jpg', 'gif', 'png' ] >= 0)){
		                $('#img_file').hide();
		                $('#img_url').attr('src', $(this).val()).show();
		                $('#img_review').show();   
		            } 
		        });
		
		        <?php if($model->upload_method == 'file'):?>
		            $('#image_file').show();    
		            $('#image_url').hide(); 
		            $('#a_file').addClass('selected'); 
		        <?php else:?>
		            $('#image_url').show();    
		            $('#image_file').hide();
		            $('#a_url').addClass('selected');
		            <?php if($model->image_url):?>
		                $('#img_url').attr('src', '<?php echo $model->image_url?>').show();
		            <?php endif?> 
		        <?php endif?>
		    });
		</script>
		<div class="da-form-row control-group user-img-upload">
		    <div class="da-form-col-4-8">
		        <label class="control-label">Avatar <span class="required">*</span> </label>
		        <?php if($model->image):?>
		            <img style="height: 50px; width: auto;" src="<?php echo $model->avatarUrl.'?'.uniqid()?>" />
		        <?php endif?>
		        <div class="da-form-item controls large">
		            <div style="float: left;">
		                <a id="a_file" class="upload_method">From computer</a> &nbsp;|&nbsp; 
		                <a id="a_url" class="upload_method">From URL</a>
		                <?php echo $form->hiddenField($model,'upload_method'); ?>
		            </div> 
		            <div style="clear: both;"></div>
		
		            <div id="image_file">
		                <?php echo $form->fileField($model,'image_file', array('class' => 'da-custom-file', 'name' => 'browse_file')); ?>
		            </div>
		            <div id="image_url">
		                <?php echo $form->textField($model,'image_url', array('placeholder' => 'http://domain.com/path/image.jpg')); ?>
		            </div>
		            <?php echo $form->error($model,'image_file');?>
		            <?php echo $form->error($model,'upload_method');?>
		        </div>
		    </div>
		    <div class="da-form-col-3-8">
		        <div class="da-form-item large" id="div_image_preview" style="margin-left: 0;"> 
		            <img id="img_file" style="display: none; height: 50px; width: auto;" /> 
		            <img id="img_url" style="display: none; height: 50px; width: auto;" />
		        </div>
		    </div>
		</div>
		
		<div class="control-group">
		    <?php echo $form->labelEx($model,'city_id', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->dropDownList($model,'city_id', City::model()->data); ?>
		        <?php echo $form->error($model,'city_id');?>
		    </div>
		</div>
		<div class="control-group">
		    <?php echo $form->labelEx($model,'district_id', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->dropDownList($model,'district_id', $district_data); ?>
		        <?php echo $form->error($model,'district_id');?>
		    </div>
		</div>
		<div class="control-group">
		    <?php echo $form->labelEx($model,'address', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		        <?php echo $form->error($model,'address');?>
		        <div id="address_full"></div>
		    </div>
		</div>
		<div class="control-group">
		    <?php echo $form->labelEx($model,'dob', array('class' => 'control-label')); ?>
		    <div class="controls">
		    
		        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		                //'name'=>'User[dob]',
		                'attribute'=>'dob',
		                'model'=>$model,
		                'value' => $model->dob, 
		                'language'=>'vi',
		                'options'=>array(
		                    'showAnim'=>'fold',
		                    'dateFormat'=>'dd-mm-yy',
		                    'changeMonth' => 'true',
		                    'changeYear' => 'true',
		                    'yearRange' => '-90:-10',
		                    'defaultDate' => '01-01-1985'
		                ),
		                'htmlOptions'=>array(
		                    'style'=>'height:20px;',
		                ),
		            ));?>
		        <?php echo $form->error($model,'dob');?>
		    </div>
		</div>
		<div class="control-group">
		    <?php echo $form->labelEx($model,'gender', array('class' => 'control-label')); ?>
		    <div class="controls">
		        <?php echo $form->dropDownList($model,'gender', User::model()->genderData); ?>
		        <?php echo $form->error($model,'gender');?>
		    </div>
		</div>
		<div class="btn-user-update">		    
		      <button type="submit" class="btn btnmy-large"><span>Cập nhật</span></button>		    
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
<script>
    $(function(){
        var districts = $.parseJSON('<?php echo json_encode(District::model()->dataGroupByCity)?>');
        $("#User_city_id").change(function(){
            var city_id = $(this).val();
            $("#User_district_id").html('');
            $.each(districts[city_id], function(key, value){
                $("#User_district_id").append('<option value="'+key+'">'+value+'</option>');
            });
            if($("#User_address").val().length > 0){
                write_address_full();    
            }

        });

        $("#User_district_id").change(function(){
            if($("#User_address").val().length > 0){
                write_address_full();    
            }
        });

        $("#User_address").keyup(function(){
            write_address_full();
        });

        function write_address_full(){
            var city =       $("#User_city_id option:selected").text();
            var district =   $("#User_district_id option:selected").text();
            var address =   $("#User_address").val();
            var addressFull = (address != '') ? address +', '+ district + ', '+ city : '';
            $('#address_full').text(addressFull);
        }
        write_address_full();

    });   
</script>