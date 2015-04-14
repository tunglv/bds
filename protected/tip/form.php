<script type="text/javascript" src="/files/editors/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/files/editors/tiny_mce/editor_admin.js"></script>
<script type="text/javascript" src="/files/js/relCopy.jquery.js"></script>
<style>
    #Movie_type input[type=radio]{
        float: left;   
        margin: 7px 5px 0 0;
    }
    #Movie_type label{
        float: left;    
    }
</style>
<div class="grid_4">       
    <div class="da-panel">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img alt="" src="<?php echo $this->themeUrl; ?>/files/theme/images/icons/color/monitor.png">
                Post
            </span>
        </div>

        <div id="da-ex-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
            <?php $this->renderPartial('_tabs', array('model' => $model))?>
            <div style="padding-bottom: 20px;">

                <?php $this->widget('admin.components.widgets.AlertWidget');?>

                <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'movie-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                            //'enableAjaxValidation'=>true,
                            'htmlOptions' => array('class' => 'da-form', 'enctype' => 'multipart/form-data')
                        )); ?>

                <?php //echo $form->errorSummary($model); ?>

                <div class="da-form-inline">
                    <div class="da-form-row" style="margin-top: 15px;">
                        <div class="da-form-col-4-8">
                            <?php echo $form->labelEx($model,'title'); ?>
                            <div class="da-form-item large">
                                <span class="formNote">(Title should be 50-64 chars) | <span id="title_char_count"></span> chars</span>
                                <?php echo $form->textField($model,'title',array('maxlength'=>64)); ?>
                                <?php echo $form->error($model,'title');?>
                            </div>
                        </div>
                        <div class="da-form-col-4-8">
                            <?php echo $form->textField($model,'alias',array('maxlength'=>250, 'placeholder' => 'Url Post Name')); ?>
                            <?php echo $form->error($model,'alias');?>
                        </div>
                    </div>
                    <div class="da-form-row">
                        <div class="da-form-col-4-8">
                            <?php echo $form->labelEx($model,'cat_id'); ?>
                            <div class="da-form-item large">
                                <?php echo $form->dropDownList($model, 'cat_id', PostCat::model()->data); ?>
                                <?php echo $form->error($model,'cat_id');?>
                            </div>
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
                                        $('#image_file').hide();    
                                        $('#Post_upload_method').val('url');    
                                });
                                $("#a_file").click(function(){
                                        $('#a_url').removeClass('selected');    
                                        $('#a_file').addClass('selected');    
                                        $('#image_file').show();    
                                        $('#image_url').hide();
                                        $('#Post_upload_method').val('file');    
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

                                $("#Post_image_url").bind('change keyup blur', function(evt){
                                        var method = $('#Post_upload_method').val();
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
                    <div class="da-form-row">
                        <div class="da-form-col-4-8">
                            <label>Cover Image <span class="required">*</span> </label>
                            <div class="da-form-item large">
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
                        </div>
                        <div class="da-form-col-3-8">
                            <div class="da-form-item large" id="div_image_preview" style="margin-left: 0;">
                                <?php if($this->action->id == 'update'):?>
                                    <img style="height: 60px; width: auto;" src="<?php echo $model->imageUrlSmall.'?'.uniqid()?>" />
                                    <?php else:?> 
                                    <img id="img_file" style="display: none; height: 60px; width: auto;" /> 
                                    <img id="img_url" style="display: none; height: 60px; width: auto;" />
                                    <?php endif?> 
                            </div>
                        </div>
                    </div>

                    <div class="da-form-row" style="margin-top: 10px;">
                        <div class="da-form-col-4-8">
                            <?php echo $form->labelEx($model,'desc'); ?>
                            <div class="da-form-item large">
                                <span class="formNote">(Description should be 130-160 chars) | <span id="desc_char_count"></span> chars</span>
                                <?php echo $form->textArea($model,'desc', array('maxlength' => 160, 'style' => 'height: 80px')); ?>
                                <?php echo $form->error($model,'desc');?>
                            </div>
                        </div>
                    </div>

                    <div class="da-form-row">
                        <div class="da-form-col-8-8"> 
                            <?php echo $form->labelEx($model,'content'); ?>
                            <div class="da-form-item large">
                                <?php echo $form->textArea($model,'content',array('class'=>'mce_editor', 'style' => 'height: 300px;')); ?>
                                <?php echo $form->error($model,'content');?>
                            </div>
                        </div>
                    </div>


                    <fieldset>
                        <legend>Paragraphs</legend>


                        <div class="da-form-row" style="margin-top: 15px;">
                            <div class="da-form-col-2-8">
                                <b>Name</b>
                            </div>
                            <div class="da-form-col-5-8">
                                <b>Content</b>
                            </div>
                        </div>

                    <?php if($ps):?>
                    <?php foreach($ps as $i => $p):?>
                        <div id="p_copy<?php if($i>0) echo $i?>" class="da-form-row copy" style="margin-top: 5px;">
                            <div class="da-form-col-2-8">
                                <?php echo CHtml::textField('Post[p_title][]', $p['title'], array('placeholder' => 'Paragraph Name', 'id' => 'Post_p_title'.($i ? $i :'')));?>
                            </div>
                            <div class="da-form-col-5-8">
                                <?php echo CHtml::textArea('Post[p_content][]', $p['content'], array('placeholder' => 'Paragraph Content', 'style' => 'margin: 0', 'class' => 'mce_editor', 'id' => 'Post_p_content'.($i ? $i :'')));?>
                            </div>
                            <div class="da-form-col-1-8" style="text-align: right;">
                                <img id="p_remove<?php if($i>0) echo $i?>" title="Xóa server phim này" style="cursor: pointer; <?php if($i==0) echo 'display: none'?>" src="/files/img/delete_12.png">
                            </div>
                        </div>
                    <?php endforeach?>
                    <?php else:?>
                        <div id="p_copy" class="da-form-row copy" style="margin-top: 5px;">
                            <div class="da-form-col-2-8">
                                <?php echo $form->textField($model, 'p_title[]', array('placeholder' => 'Paragraph Name'));?>
                            </div>
                            <div class="da-form-col-5-8">
                                <?php echo $form->textArea($model, 'p_content[]', array('placeholder' => 'Paragraph Content', 'style' => 'margin: 0', 'class' => 'mce_editor'));?>
                            </div>
                            <div class="da-form-col-1-8" style="text-align: right;">
                                <img id="p_remove" title="Xóa server phim này" style="cursor: pointer; display: none" src="/files/img/delete_12.png">
                            </div>
                        </div>
                    <?php endif?>
                        
                        



                        <div class="da-form-row">
                            <div class="da-form-col-2-8">&nbsp;</div>
                            <div class="da-form-col-2-8">
                                <div>
                                    <button class="da-button gray" style="cursor: pointer;" id="copyBtn" rel=".copy"><img src="/files/img/add_14.png" style="vertical-align: -2px;"> Add more paragraph</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="da-form-row">
                        <div class="da-form-col-8-8">
                            <?php echo $form->labelEx($model,'source'); ?>
                            <div class="da-form-item large">
                                <?php echo $form->textArea($model, 'source', array('style' => 'height: 50px')); ?>
                                <?php echo $form->error($model,'source');?>
                            </div>
                        </div>
                    </div>


                    <div class="da-form-row">
                        <div class="da-form-col-4-8">
                            <?php echo $form->labelEx($model,'status'); ?>
                            <div class="da-form-item large">
                                <?php echo $form->dropDownList($model, 'status', Post::model()->statusData); ?>
                                <?php echo $form->error($model,'status');?>
                            </div>
                        </div>
                    </div>

                    <div class="da-form-row">
                        <div class="da-form-col-4-8">
                            <label>Publish time</label>
                            <div class="da-form-item large">
                                <?php echo $form->textField($model, 'created', array('class' => 'datetimepicker')); ?>
                                <?php echo $form->error($model,'created');?>
                            </div>
                        </div>
                        <div class="da-form-col-4-8">
                            Server current time: <b><?php echo MyDateTime::getCurrentTime();?></b> <br/>
                            <?php if($model->isNewRecord):?>If leave blank, the system will retrieve the current time.<?php endif?>
                        </div>
                    </div>

                    <?php /*
                    <div class="da-form-row">
                        <div class="da-form-col-8-8">
                            <label>Post to FB Page</label>
                            <div class="da-form-item large">
                                <?php echo $form->checkbox($model, 'post_fb', array('style' => 'margin: 8px 0 0;width: auto;')); ?>
                                <?php if($model->fb_posted):?>This Post was posted to facebook page at <?php echo $model->fb_posted?>.<?php endif?>
                            </div>
                        </div>
                    </div>
                    <div class="da-form-row">
                        <div class="da-form-col-8-8">
                            <label>Post to Twitter</label>
                            <div class="da-form-item large">
                                <?php echo $form->checkbox($model, 'post_twitter', array('style' => 'margin: 8px 0 0;width: auto;')); ?>
                                <?php if($model->twitter_posted):?>This Post was posted to twitter at <?php echo $model->twitter_posted?>.<?php endif?>
                            </div>
                        </div>
                    </div>
                    */?>

                    <?php $this->renderPartial('_form_offer', array('model' => $model, 'form' => $form));?>

                    <div class="da-form-row">
                        <div class="da-form-col-4-8">
                            <?php echo $form->labelEx($model,'manager_id'); ?>
                            <div class="da-form-item large">
                                <?php echo $form->dropDownList($model, 'manager_id', Manager::model()->dataStaff, array('empty' => 'Current Manager')); ?>
                                <?php echo $form->error($model,'manager_id');?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="da-form-row">
                        <div class="da-form-col-3-8">
                            <label></label>
                            <div class="da-form-item">
                                <button type="submit" class="da-button blue">
                                    <?php echo $model->isNewRecord ? 'Add New':'Update'?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>


            </div>
        </div>

    </div>
</div>       


<script>
    $(function(){
            $("input.datetimepicker").datetimepicker({ dateFormat: 'yy-mm-dd' });
        
            <?php if($model->isNewRecord):?>
            $('#Post_title').bind('blur keyup', function() {
                    $('#Post_alias').val($(this).val().toAlias().replaceAll(' ', '-').toLowerCase());
            });

            $('#Post_offer_name').bind('blur keyup', function() {
                    $('#Post_offer_alias').val($(this).val().toAlias().replaceAll(' ', '-').toLowerCase());
            });
            <?php endif?>
        
        
            $("#Post_desc").keyup(function(){
                    $('#desc_char_count').text($(this).val().length);
            }).keyup();
            
            $("#Post_title").keyup(function(){
                    $('#title_char_count').text($(this).val().length);
            }).keyup();

            // add more p
            $('#copyBtn').relCopy({limit: 100}).click(function(){
                    var num = $("div[id^='p_copy']:last").attr('id').replace('p_copy','');
                    $("#Post_p_content_parent"+num).remove();

                    $("#Post_p_content"+num).show();
                    tinyMCE.execCommand('mceAddControl', true, "Post_p_content"+num);

                    $('img#p_remove'+num).show();
            });


            $("img[id^='p_remove']").live("click", function(){
                    $(this).parent().parent().remove();
            });


    });   
</script>