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
                    <?php echo $form->labelEx($model,'desc', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'desc',array('maxlength'=> 1000, 'style' => 'height: 80px;width: 625px;', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'desc', array('class' => 'help-inline error'));?>
                    </div>
                    <small class="desc">Description should be 1000 chars <span id="desc_char_count"></span></small>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'project_id', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'project_id', Project::model()->getData(), array('empty'=>'--Dự án--')); ?>
                        <?php echo $form->textField($model,'project_name',array('maxlength'=> 500, 'style' => 'display: none;', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'project_id', array('class' => 'help-inline error'));?>
                    </div>
                </div>

                <div class="par control-group">
                    <?php echo $form->labelEx($model,'address', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'address',array('maxlength'=> 500, 'class' => 'input-large')); ?>
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
                        <?php echo $form->textField($model,'district_name',array('maxlength'=>255, 'style'=>'display: none','class' => 'input-large')); ?>
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
                        <?php echo $form->textField($model,'ward_name',array('maxlength'=>255, 'style'=>'display: none','class' => 'input-large')); ?>
                        <?php echo $form->error($model,'ward_id', array('class' => 'help-inline error'));?>
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
                        <?php echo $form->textField($model,'price_type',array('maxlength'=>255, 'class' => 'input-small', 'placeholder' => 'vd: VND')); ?>
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
                    <?php echo $form->labelEx($model,'floor', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'floor',array('maxlength'=>255, 'class' => 'input-small input numeric')); ?>
                       <?php echo $form->error($model,'floor', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'room', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'room',array('maxlength'=>255, 'class' => 'input-small input numeric')); ?>
                       <?php echo $form->error($model,'room', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'befor', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'befor',array('maxlength'=>255, 'class' => 'input-small input numeric')); ?>
                       <?php echo $form->error($model,'befor', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'way', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'way',array('maxlength'=>255, 'class' => 'input-small input numeric')); ?>
                       <?php echo $form->error($model,'way', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'toilet', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'toilet',array('maxlength'=>255, 'class' => 'input-small input numeric')); ?>
                       <?php echo $form->error($model,'toilet', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'furniture', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textArea($model,'furniture',array('maxlength'=> 255, 'style' => 'height: 80px;width: 625px;', 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'furniture', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'status', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'status', BdsSale::model()->getStatusData()); ?>
                        <?php echo $form->error($model,'status', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'type', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->dropDownList($model,'type', BdsSale::model()->getTypeData()); ?>
                        <?php echo $form->error($model,'type', array('class' => 'help-inline error'));?>
                    </div>
                </div>
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

                <h4 class="widgettitle">Thông tin người liên lạc</h4>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'name_contact', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'name_contact',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'name_contact', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'address_contact', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'address_contact',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'address_contact', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'phone_contact', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'phone_contact',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'phone_contact', array('class' => 'help-inline error'));?>
                    </div>
                </div>
                <div class="par control-group">
                    <?php echo $form->labelEx($model,'email_contact', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $form->textField($model,'email_contact',array('maxlength'=>255, 'class' => 'input-large')); ?>
                        <?php echo $form->error($model,'email_contact', array('class' => 'help-inline error'));?>
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
    $("#BdsSale_province_id").on('change', function(){
        $('#BdsSale_province_name').val($(this).find(":selected").text());
        $.post( "/admin/saler/getDistrict", { provinceid: $(this).val()})
            .done(function( data ) {
                data = jQuery.parseJSON(data);
                var html = '<option value="">--Quận/huyện--</option>';
                $.each(data, function( index, value ) {
                    html += '<option value="'+index+'">'+value+'</option>';
                });

                $('#BdsSale_district_id').html(html);
            });
    });
    $("#BdsSale_district_id").on('change', function(){
        $('#BdsSale_district_name').val($(this).find(":selected").text());
        $.post( "/admin/saler/getWard", { districtid: $(this).val()})
            .done(function( data ) {
                data = jQuery.parseJSON(data);
                var html = '<option value="">--Phường/Xã--</option>';
                $.each(data, function( index, value ) {
                    html += '<option value="'+index+'">'+value+'</option>';
                });

                $('#BdsSale_ward_id').html(html);
            });
    });

    $("#BdsSale_project_id").on('change', function(){
        $('#BdsSale_project_name').val($(this).find(":selected").text());
    });
//
    $("#BdsSale_title").keyup(function(){
        $('#name_char_count').text($(this).val().length);
    }).keyup();

    function format(number, n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return number.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
    };

    $("#BdsSale_ward_id").on('change', function() {
        $('#BdsSale_ward_name').val($(this).find(":selected").text());
    });

    $(function() {
        var price = $('#BdsSale_price').val();

        if(price) $('#BdsSale_price').val(format(parseInt(price)));
    });
    //
//
//    $("#Product_model").keyup(function(){
//        $('#model_char_count').text($(this).val().length);
//    }).keyup();
//
//    $("#Product_made_by").keyup(function(){
//        $('#made_by_char_count').text($(this).val().length);
//    }).keyup();
</script>
