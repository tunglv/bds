<script type="text/javascript" src="/files/editors/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/files/editors/tiny_mce/editor_admin.js"></script>
<script type="text/javascript" src="/files/js/relCopy.jquery.js"></script>
<style>
    .checkbocklist {
        width:100px;
        float:left;
        overflow:hidden;
    }
    .checkbocklist label{
        width: 50px;
    }
    label.required {
        float:left;
    }
    .ui-datepicker {
        width: 232px;
    }
    .upload_method{
        cursor: pointer;
    }
    .upload_method.selected{
        text-decoration: underline;
        font-weight: bold;
    }
    #img_file {
        margin-top: 5px;
    }
    #image_file, #image_url, #img_file, #img_url{
        margin-left: 220px;
    }
    #image_file, #image_url{
        display: none;
    }

</style>
<div class="grid_4">       
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                Tin tức
            </span>
        </div>

        <div id="da-ex-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
            <?php // $this->renderPartial('_tabs', array('model' => $model))?>
            <div style="padding-bottom: 20px;">

                <?php $this->widget('admin.components.widgets.AlertWidget');?>

                <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'product-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        //'enableAjaxValidation'=>true,
                        'htmlOptions' => array('class' => 'stdform', 'enctype' => 'multipart/form-data')
                    )); ?>
                <h4 class="widgettitle">Tin tức</h4>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'name', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'name',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'name', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Name should be 255 chars <span id="name_char_count"></span></small>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'address', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('maxlength'=>500, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'address', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'province_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'province_id', Province::model()->getData(), array('empty'=>'--Tỉnh/Tp--')); ?>
                        <?php echo $form->textField($model,'province_name',array('maxlength'=>255, 'style'=>'display: none','class' => 'input-large')); ?>
                        <?php echo $form->error($model,'province_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'district_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php if($this->action->id == 'update'):?>
                            <?php echo $form->dropDownList($model,'district_id', District::model()->getData($model->province_id), array('empty'=>'--Quận/huyện--')); ?>
                        <?php else:?>
                            <?php echo $form->dropDownList($model,'district_id', array(), array('empty'=>'--Quận/huyện--')); ?>
                        <?php endif;?>
                        <?php echo $form->textField($model,'district_name',array('maxlength'=>255, 'style'=>'display: none', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'district_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'ward_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php if($this->action->id == 'update'):?>
                            <?php echo $form->dropDownList($model,'ward_id', Ward::model()->getData($model->district_id), array('empty'=>'--Phường/Xã--')); ?>
                        <?php else:?>
                            <?php echo $form->dropDownList($model,'ward_id', array(), array('empty'=>'--Phường/Xã--')); ?>
                        <?php endif;?>
                        <?php echo $form->textField($model,'ward_name',array('maxlength'=>255, 'style'=>'display: none', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'ward_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'mobile', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'mobile',array('maxlength'=>15, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'mobile', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'email', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'email',array('maxlength'=>50, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'email', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'website', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'website',array('maxlength'=>50, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'website', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'yahoo', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'yahoo',array('maxlength'=>25, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'yahoo', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'type', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'type', $model->typeData); ?>
                        <?php echo $form->error($model,'type', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'saler_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'saler_id', Saler::model()->getData()); ?>
                        <?php echo $form->error($model,'saler_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <script>
                    $(function(){
                        $("#a_url").click(function(){
                            $('#a_file').removeClass('selected');    
                            $('#a_url').addClass('selected');    
                            $('#image_url').show();    
                            $('#image_file').hide();
                            $("#img_url").show();
                            $('#img_file').hide();
                            $('#Pt_upload_method').val('url');    
                        });
                        $("#a_file").click(function(){
                            $('#a_url').removeClass('selected');    
                            $('#a_file').addClass('selected');    
                            $('#image_file').show();    
                            $('#image_url').hide();
                            $("#img_url").hide();
                            $('#img_file').show();
                            $('#Pt_upload_method').val('file');    
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

                        $("#Pt_image_url").bind('change keyup blur', function(evt){
                            var method = $('#Pt_upload_method').val();
                            var ext = $(this).val().split('.').pop().toLowerCase(); 
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
                <div class="par control-group">
                    <label>Cover Image <span class="required">*</span> </label>
                    <div class="controls">
                        <div style="float: left;">
                            <a id="a_file" class="upload_method">Từ máy tính</a> &nbsp;|&nbsp; 
                            <a id="a_url" class="upload_method">Từ URL</a>
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
                    <div class="controls">
                        <?php if($this->action->id == 'update'):?>
                            <img id="img_file" style="display: none; height: 60px; width: auto; margin-left: 220px;" /> 
                            <img id="img_url" style="height: 60px; width: auto; margin-left: 220px;" src="<?php echo Project::model()->getImageUrl( $model->id , '90');?>"/>
                            <!--<img style="height: 60px; width: auto;margin-left: 220px;" src="<?php // echo Pt::model()->getImgUrl($model->id, $model->image.'_small.jpg');?>" />-->
                            <?php else:?> 
                            <img id="img_file" style="display: none; height: 60px; width: auto; margin-left: 220px;" /> 
                            <img id="img_url" style="display: none; height: 60px; width: auto; margin-left: 220px;" />
                            <?php endif?> 
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'overview', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'overview',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'ha_tang', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'ha_tang',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'thiet_ke', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'thiet_ke',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'location', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'location',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'ban_hang', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'ban_hang',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'video', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'video',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'images', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'images',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'chu_dau_tu', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'chu_dau_tu',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
                    </div>
                </div>

                <p class="stdformbutton">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
                </p>
                <?php $this->endWidget(); ?>
            </div>
        </div>
</div>
<script>
    $("#Project_title").keyup(function(){
        $('#name_char_count').text($(this).val().length);
    }).keyup();
    $("#Project_province_id").on('change', function(){

        $('#Project_province_name').val($(this).find(":selected").text());

        $.post( "/admin/saler/getDistrict", { provinceid: $(this).val()})
            .done(function( data ) {
                data = jQuery.parseJSON(data);
                var html = '<option value="">--Quận/huyện--</option>';
                $.each(data, function( index, value ) {
                    html += '<option value="'+index+'">'+value+'</option>';
                });

                $('#Project_district_id').html(html);
            });
    });
    $("#Project_district_id").on('change', function(){

        $('#Project_district_name').val($(this).find(":selected").text());

        $.post( "/admin/saler/getWard", { districtid: $(this).val()})
            .done(function( data ) {
                data = jQuery.parseJSON(data);
                var html = '<option value="">--Phường/Xã--</option>';
                $.each(data, function( index, value ) {
                    html += '<option value="'+index+'">'+value+'</option>';
                });

                $('#Project_ward_id').html(html);
            });
    });

    $("#Project_ward_id").on('change', function() {
        $('#Project_ward_name').val($(this).find(":selected").text());
    });
</script>
