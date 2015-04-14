<script type="text/javascript" src="/files/js/relCopy.jquery.js"></script>
<style>
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
                Chủ đề
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
                <h4 class="widgettitle">Chủ đề</h4>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'title', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Title should be 255 chars <span id="name_char_count"></span></small>
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
                            $('#TopicNews_upload_method').val('url');
                        });
                        $("#a_file").click(function(){
                            $('#a_url').removeClass('selected');
                            $('#a_file').addClass('selected');
                            $('#image_file').show();
                            $('#image_url').hide();
                            $("#img_url").hide();
                            $('#img_file').show();
                            $('#TopicNews_upload_method').val('file');
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

                        $("#TopicNews_image_url").bind('change keyup blur', function(evt){
                            var method = $('#TopicNews_upload_method').val();
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
                        <?php if($this->action->id == 'updateTopic'):?>
                            <img id="img_file" style="display: none; height: 60px; width: auto; margin-left: 220px;" />
                            <img id="img_url" style="height: 60px; width: auto; margin-left: 220px;" src="<?php echo TopicNews::model()->getImageUrl( $model->id , '260');?>"/>
                            <!--<img style="height: 60px; width: auto;margin-left: 220px;" src="<?php // echo TopicNews::model()->getImgUrl($model->id, $model->image.'_small.jpg');?>" />-->
                        <?php else:?>
                            <img id="img_file" style="display: none; height: 60px; width: auto; margin-left: 220px;" />
                            <img id="img_url" style="display: none; height: 60px; width: auto; margin-left: 220px;" />
                        <?php endif?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'desc', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'desc',array('maxlength'=> 255, 'style' => 'height: 80px;width: 625px;', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'desc', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Description should be 1000 chars <span id="desc_char_count"></span></small>
                </div>
                <p class="stdformbutton">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-info')); ?>
                </p>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <script>
        $("#TopicNews_title").keyup(function(){
            $('#name_char_count').text($(this).val().length);
        }).keyup();
    </script>
