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
                Bán nhà đất
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
                <h4 class="widgettitle">Nội dung</h4>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'title', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'title',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'title', array('class' => 'help-inline error'));?>
                        <?php echo $form->textField($model,'alias',array('maxlength'=>255, 'class' => 'input-large', 'placeholder' => 'Url Post Name')); ?>
                    </div>
                    <small class="desc">Name should be 255 chars <span id="name_char_count"></span></small>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'location', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'location',array('maxlength'=> 1000, 'style' => 'height: 80px;width: 625px;', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'location', array('class' => 'help-inline error'));?>
                     </div>
                </div>
<!--                <div class="par control-group">-->
<!--                    --><?php //echo $form->labelEx($model,'made_by', array('class' => 'control-label')); ?>
<!--                    <div class="controls">-->
<!--                        --><?php //echo $form->textField($model,'made_by',array('maxlength'=>255, 'class' => 'input-large')); ?>
<!--                        --><?php //echo $form->error($model,'made_by', array('class' => 'help-inline error'));?>
<!--                    </div>-->
<!--                    <small class="desc">Chất liệu should be 255 chars <span id="made_by_char_count"></span></small>-->
<!--                </div>-->
<!--                <div class="par control-group">-->
<!--                    --><?php //echo $form->labelEx($model,'number', array('class' => 'control-label')); ?>
<!--                    <div class="controls">-->
<!--                        --><?php //echo $form->textField($model,'number',array('maxlength'=>255, 'class' => 'input-small input numeric format')); ?><!-- cái-->
<!--                        --><?php //echo $form->error($model,'number', array('class' => 'help-inline error'));?>
<!--                    </div>-->
<!--                    <small class="desc">Number should be 255 chars <span id="number_char_count"></span></small>-->
<!--                </div>-->
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'price', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'price',array('maxlength'=>255, 'class' => 'input-small input numeric format')); ?>
                        <?php echo $form->textField($model,'price_type',array('maxlength'=>255, 'class' => 'input-small', 'placeholder' => 'VND')); ?>
                        <?php echo $form->error($model,'price', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Number should be 255 chars <span id="price_char_count"></span></small>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'area', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'area',array('maxlength'=>255, 'class' => 'input-small input numeric format')); ?>m2
                        <?php echo $form->error($model,'area', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Number should be 255 chars <span id="price_char_count"></span></small>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'status', BdsSale::model()->getStatusData()); ?>
                        <?php echo $form->error($model,'status', array('class' => 'help-inline error'));?>
                    </div>
                </div>
<!--                <div class="par control-group">-->
<!--                    --><?php //echo $form->labelEx($model,'catagory', array('class' => 'control-label')); ?>
<!--                    <div class="controls">-->
<!--                        --><?php //echo $form->dropDownList($model,'catagory', Catagory::model()->getData()); ?>
<!--                        --><?php //echo $form->error($model,'type', array('class' => 'help-inline error'));?>
<!--                    </div>-->
<!--                </div>-->
                <div class="row-fluid">
                    <div class="par control-group">
                        <label class="control-label">Ảnh nhà, đất</label>
                        <div class="controls">
                            <div class="widgetcontent" style="padding-left: 210px;width: 640px;">
                                <?php echo $form->error($model,'imagesProducts', array('style' => 'margin-left: 0px'));?>

                                <link rel="stylesheet" href="/files/js/jquery.file.upload/css/bootstrap-image-gallery.min.css">
                                <link rel="stylesheet" href="/files/js/jquery.file.upload/css/jquery.fileupload-ui.css">
                                <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
                                <!-- The template to display files available for upload -->
                                <script id="template-upload" type="text/x-tmpl">
                                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                                    <tr class="template-upload fade">
                                        <td style="width: 0px"></td>
                                        <td class="preview"><span class="fade"></span></td>
                                        {% if (file.error) { %}
                                        <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
                                        {% } else if (o.files.valid && !i) { %}
                                        <td colspan="2">
                                            <div style="width: 120px" class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
                                            <div>{%=o.formatFileSize(file.size)%}</div>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary start" style="width: 82px">
                                                <i class="icon-upload icon-white"></i>
                                                <span>Upload</span>
                                            </button>
                                            {% if (!o.options.autoUpload) { %}
                                            <br/>
                                            <br/>
                                            <button class="btn btn-warning cancel" style="width: 82px">
                                                <i class="icon-ban-circle icon-white"></i>
                                                <span>Dừng</span>
                                            </button>
                                            {% } %}
                                        </td>
                                        {% } %}
                                    </tr>
                                    {% } %}
                                </script>

                                <!-- The template to display files available for download -->
                                <script id="template-download" type="text/x-tmpl">
                                    {% for (var i=0, file; file=o.files[i]; i++) { %}
                                    <tr class="group {%=file.group%} template-download fade ">
                                        {% if (file.error) { %}
                                        <td class="error" colspan="3"><span class="label label-important">Error</span> {%=file.error%}</td>
                                        {% } else { %}
                                        <td style="width: 0px"><input class="image_cover" {% if (file.name == $.cookie('product_form_img_cover')) { %} checked = "checked" {% }%}  type="radio" name="is_cover" value="{%=file.name%}" title="Chọn làm ảnh đại diện" /></td>
                                        <td class="preview">
                                            {% if (file.thumbnail_url) { %}
                                            <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
                                            {% } %}
                                        </td>
<!--                                        <td class="image_karaoke">-->
<!--                                            <input type="checkbox" {% if (file.checked_image_karaoke == 1) { %} checked = "checked" {% }%} class="image_enable" name="image_karaoke[]" value="{%=file.branch_image_id%}" title="Chọn làm ảnh phòng hát"/>-->
<!--                                        </td>-->
                                        {% } %}

                                        <td colspan="2">
                                            <button class="badge badge-important delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                            <i class="icon-trash icon-white"></i> <span>Xóa</span>
                                            </button>
                                            <input type="checkbox" name="delete" value="1" class="toggle">
                                        </td>
                                    </tr>
                                    {% } %}
                                </script>


                                <script src="/files/js/jquery.file.upload/js/vendor/jquery.ui.widget.js"></script>
                                <script src="/files/js/jquery.file.upload/js/vendor/tmpl.min.js"></script>
                                <script src="/files/js/jquery.file.upload/js/vendor/load-image.min.js"></script>
                                <script src="/files/js/jquery.file.upload/js/vendor/canvas-to-blob.min.js"></script>

                                <script src="/files/js/jquery.file.upload/js/vendor/bootstrap-image-gallery.min.js"></script>

                                <script src="/files/js/jquery.file.upload/js/jquery.iframe-transport.js"></script>
                                <script src="/files/js/jquery.file.upload/js/jquery.fileupload.js"></script>
                                <script src="/files/js/jquery.file.upload/js/jquery.fileupload-fp.js"></script>
                                <script src="/files/js/jquery.file.upload/js/jquery.fileupload-ui.js"></script>

                                <!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->
                                <script>
                                    $(function () {

                                        'use strict';

                                        // Initialize the jQuery File Upload widget:
                                        $('#product-form').fileupload({
                                            // Uncomment the following to send cross-domain cookies:
                                            xhrFields: {withCredentials: true},
                                            url: '<?php $params = array();
                                            if($product_id = Yii::app()->request->getQuery('id')) $params['id'] = $product_id;
//                                            if($karaoke_id = Yii::app()->request->getQuery('branch_karaoke_id')) $params['branch_karaoke_id'] = $karaoke_id;
                                            echo $this->createUrl('/admin/sale/uploadImages', $params)?>'
                                        });

                                        // Load existing files:
                                        $.ajax({
                                            // Uncomment the following to send cross-domain cookies:
                                            //xhrFields: {withCredentials: true},
                                            url: $('#product-form').fileupload('option', 'url'),
                                            dataType: 'json',
                                            context: $('#product-form')[0]
                                        }).done(function (result) {
                                                $(this).fileupload('option', 'done')
                                                    .call(this, null, {result: result});
                                            });

                                        var branch_form_img_group = ($.cookie('branch_form_img_group') != undefined) ? JSON.parse($.cookie('branch_form_img_group')) : {};
                                        $('select[id^="image_group_"]').live('change', function(){
                                            branch_form_img_group[$(this).attr('img_id')] = $(this).val();
                                            $.cookie('branch_form_img_group', JSON.stringify(branch_form_img_group));
                                        });

                                    });
                                </script>


                                <div class="fileupload-buttonbar clearfix">
                                <span class="btn btn-success fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span>Lấy ảnh từ máy tính...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                                    <button type="button" class="btn btn-primary start">
                                        <i class="icon-upload icon-white"></i>
                                        <span>Upload tất cả</span>
                                    </button>
                                    <?php /*
                                    <button type="reset" class="btn btn-warning cancel">
                                    <i class="icon-ban-circle icon-white"></i>
                                    <span>Dừng Upload</span>
                                    </button>
                                */?>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="icon-trash icon-white"></i>
                                        <span>Xóa</span>
                                    </button>
                                    <input type="checkbox" class="toggle">


                                    <?php /*
                                    <div class="span5 fileupload-progress fade">
                                    <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    <div class="bar" style="width:0%;"></div>
                                    </div>
                                    <div class="progress-extended">&nbsp;</div>
                                    </div>
                                */?>
                                </div>

                                <div class="fileupload-loading"></div>

<!--                                <ul class="nav nav-tabs tab-upload-image">-->
<!--                                    <li class="active"><a group="DECORATION">Ảnh spanr phẩm</a></li>-->
<!--                                </ul>-->
                                <div class="shop-form-grid-images">
                                    <table role="presentation" class="table table-striped">
                                        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
                                        <tr class="group template-download">
                                            <td>Chọn ảnh đại diện</td>
                                            <td></td>
                                            <td></td>
<!--                                            <td colspan="4"><input title="check/uncheck all" type="checkbox" id="enable_all_image"/></td>-->
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'content', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'content',array('class'=> 'mce_editor', 'style' => 'height: 300px;')); ?>
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

    $('#BdsSale_title').bind('blur keyup', function() {
        $('#BdsSale_alias').val($(this).val().toAlias().replaceAll(' ', '-').toLowerCase());
    });
//
    $("#BdsSale_name").keyup(function(){
        $('#name_char_count').text($(this).val().length);
    }).keyup();
//
//    $("#Product_model").keyup(function(){
//        $('#model_char_count').text($(this).val().length);
//    }).keyup();
//
//    $("#Product_made_by").keyup(function(){
//        $('#made_by_char_count').text($(this).val().length);
//    }).keyup();
</script>
